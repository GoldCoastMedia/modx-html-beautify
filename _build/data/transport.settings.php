<?php
/** Array of system settings for HTML Beautify package
 * @package xhtmlbeautify
 * @subpackage build
 */


/* This section is ONLY for new System Settings to be added to
 * The System Settings grid. If you include existing settings,
 * they will be removed on uninstall. Existing setting can be
 * set in a script resolver (see install.script.php).
 */
$settings = array();

/* Output Cleaning */
$settings['setting_xhtmlbeautify.convert_quotes']= $modx->newObject('modSystemSetting');
$settings['setting_xhtmlbeautify.convert_quotes']->fromArray(array (
    'key' => 'xhtmlbeautify.convert_quotes',
    'description' => 'setting_xhtmlbeautify.convert_quotes_desc',
    'value' => 0,
    'xtype' => 'combo-boolean',
    'namespace' => 'xhtmlbeautify',
    'area' => 'output-cleaning',
), '', true, true);

$settings['setting_xhtmlbeautify.indent_output']= $modx->newObject('modSystemSetting');
$settings['setting_xhtmlbeautify.indent_output']->fromArray(array (
    'key' => 'xhtmlbeautify.indent_output',
    'description' => 'setting_xhtmlbeautify.indent_output_desc',
    'value' => 1,
    'xtype' => 'combo-boolean',
    'namespace' => 'xhtmlbeautify',
    'area' => 'output-cleaning',
), '', true, true);

$settings['setting_xhtmlbeautify.remove_comments']= $modx->newObject('modSystemSetting');
$settings['setting_xhtmlbeautify.remove_comments']->fromArray(array (
    'key' => 'xhtmlbeautify.remove_comments',
    'description' => 'setting_xhtmlbeautify.remove_comments_desc',
    'value' => 0,
    'xtype' => 'combo-boolean',
    'namespace' => 'xhtmlbeautify',
    'area' => 'output-cleaning',
), '', true, true);

$settings['setting_xhtmlbeautify.enabled']= $modx->newObject('modSystemSetting');
$settings['setting_xhtmlbeautify.enabled']->fromArray(array (
    'key' => 'xhtmlbeautify.enabled',
    'description' => 'setting_xhtmlbeautify.enabled_desc',
    'value' => 1,
    'xtype' => 'combo-boolean',
    'namespace' => 'xhtmlbeautify',
    'area' => 'output-cleaning',
), '', true, true);

/* Ignore Settings */
$settings['setting_xhtmlbeautify.ignored_attributes']= $modx->newObject('modSystemSetting');
$settings['setting_xhtmlbeautify.ignored_attributes']->fromArray(array (
    'key' => 'xhtmlbeautify.ignored_attributes',
    'description' => 'setting_xhtmlbeautify.ignored_attributes_desc',
    'value' => "onabort, onblur, onchange, onclick, ondblclick, onerror, onfocus, onkeydown, onkeypress, onkeyup, onload, onmousedown, onmousemove, onmouseout, onmouseover, onmouseup, onreset, onselect, onsubmit, onunload",
    'xtype' => 'textarea',
    'namespace' => 'xhtmlbeautify',
    'area' => 'ignore-config',
), '', true, true);

$settings['setting_xhtmlbeautify.ignored_tags']= $modx->newObject('modSystemSetting');
$settings['setting_xhtmlbeautify.ignored_tags']->fromArray(array (
    'key' => 'xhtmlbeautify.ignored_tags',
    'description' => 'setting_xhtmlbeautify.ignored_tags_desc',
    'value' => "pre, script, textarea",
    'xtype' => 'textarea',
    'namespace' => 'xhtmlbeautify',
    'area' => 'ignore-config',
), '', true, true);

return $settings;
