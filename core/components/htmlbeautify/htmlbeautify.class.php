<?php
/**
 * HTML Beautify - Clean up MODx source code output
 *
 * Copyright (c) 2012 Gold Coast Media Ltd
 *
 * This file is part of HTML Beautify.
 *
 * HTML Beautify is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * HTML Beautify is distributed in the hope that it will be useful, but 
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or 
 * FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more
 * details.
 *
 * You should have received a copy of the GNU General Public License along with
 * HTML Beautify; if not, write to the Free Software Foundation, Inc., 59 
 * Temple Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package  htmlbeautify
 * @author  Dan Gibbs <dan@goldcoastmedia.co.uk>
 *          Till Krüss <http://tillkruess.com/projects/wordpress/wp-beautifier/>
 */
 
class HtmlBeautify {

	protected $_modx;
	protected $_namespace = 'htmlbeautify.';

	public $config = array(
		'convert_quotes'     => TRUE,
		'ignored_attributes' => 'onabort, onblur, onchange, onclick, ondblclick, onerror, onfocus, onkeydown, onkeypress, onkeyup, onload, onmousedown, onmousemove, onmouseout, onmouseover, onmouseup, onreset, onselect, onsubmit, onunload',
		'ignored_tags'       => 'pre, script, textarea',
		'indent_output'      => TRUE,
		'remove_comments'    => FALSE,
	);

	public function __construct(modX &$modx, $config = array())
	{
		$this->_modx = $modx;
		$modx_config = array();

		$settings = $this->_modx->newQuery('modSystemSetting')->where(array('key:LIKE' => $this->_namespace . '%'));
		$settings = $this->_modx->getCollection('modSystemSetting', $settings);

		// Apply MODx manager settings
		foreach($settings as $key => $setting) {
			$key = str_replace($this->_namespace, '', $key);
			$modx_config[$key] = $setting->get('value');
		}

		// Merge any user defined settings
		$this->config = array_merge($modx_config, $config);
	}

	public function run()
	{
		$resource = $this->_modx->resource;

		// Only perform on HTML documents
		if($resource->get('contentType') === 'text/html') {
			$output = $this->_clean_output($resource->_output, $this->config);
			$resource->_content = $resource->_output = $output;
		}
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
			$ignored_tags_regexp .= '<'.$ignored_tags[$i].'[^>]*>.*?<\/'.$ignored_tags[$i].'>' . ($i < $size - 1 ? '|' : '');
		}
		$ignored_tags_regexp .= '~s';

		// store the original contents of all ignored tags
		preg_match_all($ignored_tags_regexp, $source, $original_tags);
		
		if( (bool) $config['remove_comments'] === TRUE) {
			$source = $this->_remove_comments($source);
		}

		if( (bool) $config['indent_output'] === TRUE) {
			$source = $this->_clean_whitespace($source);
			$source = $this->_add_indentation($source);
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
	 * @param   int     $indent  level to start indentation at
	 * @return  string           processed source
	 */
	protected function _add_indentation($source = NULL, $indent = 0)
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
	 * @param   array   $ignored_attributed  attributes to ignore
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
		return preg_replace('/<!--(?![\s]?\[if)(.|\s)*?-->/i', '', $source);
	}
}
