<?php

if (! function_exists('getSnippetContent')) {
	function getSnippetContent($filename) {
		$o = file_get_contents($filename);
		$o = str_replace('<?php','',$o);
		$o = str_replace('?>','',$o);
		$o = trim($o);
		return $o;
	}
}
$snippets = array();

$snippets[1]= $modx->newObject('modSnippet');
$snippets[1]->fromArray(array(
	'id' => 1,
	'name' => 'XHTMLBeautify',
	'description' => 'XHTML Beautify Snippet',
	'snippet' => getSnippetContent($sources['source_core'].'/elements/snippets/xhtmlbeautify.snippet.php'),
),'',true,true);
//$properties = include $sources['data'].'/properties/properties.mysnippet1.php';
//$snippets[1]->setProperties($properties);
//unset($properties);


return $snippets;
