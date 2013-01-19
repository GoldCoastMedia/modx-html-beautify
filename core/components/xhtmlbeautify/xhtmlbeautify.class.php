<?php
/**
 * XHTML Beautify - Clean up MODx source code output
 *
 * Copyright (c) 2012 Gold Coast Media Ltd
 *
 * This file is part of XHTML Beautify.
 *
 * XHTML Beautify is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * XHTML Beautify is distributed in the hope that it will be useful, but 
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or 
 * FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more
 * details.
 *
 * You should have received a copy of the GNU General Public License along with
 * XHTML Beautify; if not, write to the Free Software Foundation, Inc., 59 
 * Temple Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package  xhtmlbeautify
 * @author   Dan Gibbs <dan@goldcoastmedia.co.uk>
 *           Till Krüss <http://tillkruess.com/projects/wordpress/wp-beautifier/>
 */

// FIXME: Improve this madness
if(class_exists('XhtmlBeautify') === TRUE) return NULL;

class XhtmlBeautify {

	protected $_modx;
	protected $_namespace = 'xhtmlbeautify.';

	public $config = array(
		'caching'            => TRUE,
		'convert_quotes'     => TRUE,
		'document'           => TRUE,
		'ignored_attributes' => 'onabort, onblur, onchange, onclick, ondblclick, onerror, onfocus, onkeydown, onkeypress, onkeyup, onload, onmousedown, onmousemove, onmouseout, onmouseover, onmouseup, onreset, onselect, onsubmit, onunload',
		'ignored_tags'       => 'pre, script, textarea',
		'indentlevel'        => 1,
		'indent_output'      => TRUE,
		'remove_comments'    => FALSE,
		'source'             => NULL,
	);

	// MODx caching options
	public $cache_opts = array(
		xPDO::OPT_CACHE_KEY => 'includes/elements/xhtmlbeautify',
	);

	public function __construct(modX &$modx, array &$config)
	{
		$this->_modx = $modx;
		$modx_config = array();
		
		// Force all parameters to lowercase
		$config = array_change_key_case($config, CASE_LOWER);

		$settings = $this->_modx->newQuery('modSystemSetting')->where(array('key:LIKE' => $this->_namespace . '%'));
		$settings = $this->_modx->getCollection('modSystemSetting', $settings);

		// Apply MODx manager settings
		foreach($settings as $key => $setting) {
			$key = str_replace($this->_namespace, '', $key);
			$modx_config[$key] = $setting->get('value');
		}

		// Merge any user defined settings FIXME: Messy
		$config = array_merge($modx_config, $config);
		$this->config = array_merge($this->config, $config);
	}

	public function run()
	{
		$resource = $this->_modx->resource;
		$content_type = $resource->get('contentType');
		$output = NULL;
		$cache = FALSE;
		$document = $this->config['document'];

		$source = ($this->config['source']) ? $this->config['source'] : $resource->_content;

		// Document based caching
		if($this->config['caching'] AND $this->config['document']) {
			
			if($cache = $this->_get_cache()) {
				$resource->_content = $cache;
			}
			else {
				$output = $this->beautify($source, $document, $content_type);
				$this->_set_cache(NULL, $output);
				
				$resource->_content = $output;
			}
		}
		else {
			if($this->config['document']) {
				// Use the entire document output when uncached
				$output = $this->beautify($resource->_output, $document, $content_type);
				$resource->_output = $output;
			}
			else {
				$output = $this->beautify($source, $document, $content_type);
				return $output;
			}
		}
	}

	/**
	 * Filter source code
	 */
	public function beautify($source = NULL, $document = TRUE, $content_type = NULL)
	{
		$output = NULL;

		$types = array(
			'text/html',
			'application/xhtml+xml',
		);

		// Full document
		if($document) {
			// Check if the content type is valid
			$content_type = ( in_array($content_type, $types) ) ? TRUE : FALSE;
			
			$less = substr(trim($source), 0, 100);

			if(stripos($less, '<!DOCTYPE html') !== FALSE) {
				$output = $this->_clean_output($source, $this->config);
			}
		}
		// HTML snippet
		else {
			$output = $this->_clean_output($source, $this->config);
		}

		return $output;
	}

	/**
	 * Get cache
	 *
	 * @param   string  $name    cache name
	 * @return  string|boolean   processed source or FALSE
	 */
	protected function _get_cache($name = NULL)
	{
		$cachename = ( !empty($name) ) ? $name: $this->_modx->resource->get('id');
	
		if($cached = $this->_modx->cacheManager->get($cachename, $this->cache_opts) AND $cached !== NULL) {
			return $cached;
		}
		else {
			return FALSE;
		}
	}

	/**
	 * Set cache
	 *
	 * @param   string  $name    cache name
	 * @param   array   $source  source code
	 * @return  string           processed source
	 */
	protected function _set_cache($name = NULL, $source = NULL)
	{
		$cachename = ( !empty($name) ) ? $name: $this->_modx->resource->get('id');
		$this->_modx->cacheManager->set($cachename, $source, 0, $this->cache_opts);
		
		return $this->_get_cache();
	}

	/**
	 * Clean and beautify document output
	 *
	 * @param   string  $source  source code
	 * @param   array   $config  configuration
	 * @return  string           processed source
	 */
	protected function _clean_output($source = NULL, $config)
	{
		if( (bool) $config['convert_quotes'] === TRUE) {
			$source = $this->_convert_quotes($source, $config['ignored_attributes']);
		}

		$ignored_tags_regexp = '~';
		$ignored_tags = explode(', ', $config['ignored_tags']);
		
		for ($i = 0, $size = count($ignored_tags); $i < $size; ++$i) {
			$ignored_tags_regexp .= '<' . $ignored_tags[$i] . '[^>]*>.*?<\/' . $ignored_tags[$i] . '>' . ($i < $size - 1 ? '|' : '');
		}

		$ignored_tags_regexp .= '~s';

		// store the original contents of all ignored tags
		preg_match_all($ignored_tags_regexp, $source, $original_tags);
		
		if( (bool) $config['remove_comments'] === TRUE) {
			$source = $this->_remove_comments($source);
		}

		if( (bool) $config['indent_output'] === TRUE) {
			$source = $this->_clean_whitespace($source);
			$source = $this->_add_indentation($source, $this->config['indentlevel']);
		}

		preg_match_all($ignored_tags_regexp, $source, $modified_tags);

		foreach ($modified_tags[0] as $key => $match) {
			$source = str_replace($match, $original_tags[0][$key], $source);
		}

		return $source;
	}

	/**
	 * Remove whitespace from source
	 *
	 * @param   string  $source  source code
	 * @return  string           processed source
	 */
	protected function _clean_whitespace($source = NULL)
	{
		// replace \r\n with \n
		$source = preg_replace('~\r\n~ms', "\n", $source);
		// replace \r with \n
		$source = preg_replace('~\r~ms', "\n", $source);
		// removes empty lines
		$source = preg_replace('~\n\s*(?=\n)~ms', '', $source);
		// remove whitespace from the beginnig
		$source = preg_replace('~^\s+~s', '', $source);
		// remove whitespace from the end
		$source = preg_replace('~\s+$~s', '', $source);
		// remove whitespace from the end of each line
		$source = preg_replace('~\s+$~m', '', $source);
		// remove whitespace from the beginning of each line
		$source = preg_replace('~^\s+~m', '', $source);	
		// remove whitespace from the end of each line
		$source = preg_replace('~\s+$~m', "", $source);
		// remove whitespace from the beginning of each line
		$source = preg_replace('~^\s+~m', "", $source);
		// removes whitespace between text
		$source = preg_replace('~([^>\s])(\s+)([^<\s])~', '$1 $3', $source);
		// remove tabs between tags
		$source = preg_replace('~(?:(?<=\>)|(?<=\/\>))\t+(?=\<\/?)~', '', $source);

		return $source;
	}

	/**
	 * Add line indentation to source
	 *
	 * @param   string  $source  source code
	 * @param   int     $indent  a positive level to start indentation at
	 * @return  string           processed source
	 */
	protected function _add_indentation($source = NULL, $indent = 1)
	{
		$source = explode("\n", $source);

		foreach ($source as $line_num => $line) {
			// correct indention, if line starts with closing tag
			$correction = intval(substr($line, 0, 2) == '</');
			$source[$line_num] = str_repeat("\t", $indent - $correction) . $line;
			// indent every tag
			$indent += substr_count($line, '<');
			// subtract doctype declaration and CDATA sections
			$indent -= substr_count($line, '<!');
			// subtract processing instructions
			$indent -= substr_count($line, '<?');
			// subtract self closing tags
			$indent -= substr_count($line, '/>');
			// subtract closing tags
			$indent -= substr_count($line, '</') * 2;
		}

		$source = implode("\n", $source);

		return $source;
	}

	/**
	 * Convert single quoted attributes to double quotes
	 *
	 * @param   string  $source              source code
	 * @param   array   $ignored_attributes  attributes to ignore
	 * @return  string                       processed source
	 */
	protected function _convert_quotes($source = NULL, $ignored_attributes)
	{
		$ignored_attributes = explode(', ', $ignored_attributes);
		preg_match_all("~<[a-z]+[^<>]*='[^<>]*>~i", $source, $matched_tags);

		// loop through tags that contain an attribute with single quotes
		foreach ($matched_tags[0] as $tag) {
			unset($converted_tag);
			preg_match_all("~\s([a-z]+)='(.*?)'~", $tag, $matched_attributes);

			// loop through all attributes of this tag
			foreach ($matched_attributes[0] as $key => $attributes_string) {
				// convert the attribute quotes, if it's not on our ignore list
				if (isset($matched_attributes[1][$key], $matched_attributes[2][$key]) && !in_array($matched_attributes[1][$key], $ignored_attributes)) {
					if (!isset($converted_tag)) {
						$converted_tag = $tag;
					}
					$converted_tag = str_replace(trim($attributes_string), $matched_attributes[1][$key].'="'.$matched_attributes[2][$key].'"', $converted_tag);
				}
			}

			// replace tag if we made changes to it
			if (isset($converted_tag)) {
				$source = str_replace($tag, $converted_tag, $source);
			}
		}

		return $source;
	}

	/**
	 * Remove HTML comments
	 *
	 * @param   string  $source  source code
	 * @return  string           processed source
	 */
	protected function _remove_comments($source = NULL)
	{
		return preg_replace('/<!--(?!\s*(?:\[if [^\]]+]|<!|>))(?:(?!-->).)*-->/i', '', $source);
	}
}
