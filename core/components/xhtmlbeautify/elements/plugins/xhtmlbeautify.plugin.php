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
 */

$modx->setLogLevel(modX::LOG_LEVEL_DEBUG);
$enabled = $modx->getOption('xhtmlbeautify.enabled');

if($modx->event->name == 'OnWebPagePrerender' AND $enabled)
{
	if(function_exists('htmLawed') !== TRUE)
		require $modx->getOption('core_path') . 'components/xhtmlbeautify/vendor/htmlawed/htmLawed.php';
		
	if(class_exists('XhtmlBeautify') !== TRUE)
		require $modx->getOption('core_path') . 'components/xhtmlbeautify/xhtmlbeautify.class.php';
	
	$xhtmlbeautify = new XhtmlBeautify($modx, $scriptProperties);
	$output = $xhtmlbeautify->run();
	
	unset($xhtmlbeautify);
	
	return $output;
}

