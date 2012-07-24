<?php
/** Array of system settings for HTML Beautify package
 * @package htmlbeautify
 * @subpackage build
 */


/* This section is ONLY for new System Settings to be added to
 * The System Settings grid. If you include existing settings,
 * they will be removed on uninstall. Existing setting can be
 * set in a script resolver (see install.script.php).
 */
$settings = array();

/* Output Cleaning */
$settings['setting_htmlbeautify.convert_quotes']= $modx->newObject('modSystemSetting');
$settings['setting_htmlbeautify.convert_quotes']->fromArray(array (
    'key' => 'htmlbeautify.convert_quotes',
    'description' => 'setting_htmlbeautify.convert_quotes_desc',
    'value' => 0,
    'xtype' => 'combo-boolean',
    'namespace' => 'htmlbeautify',
    'area' => 'output-cleaning',
), '', true, true);

$settings['setting_htmlbeautify.indent_output']= $modx->newObject('modSystemSetting');
$settings['setting_htmlbeautify.indent_output']->fromArray(array (
    'key' => 'htmlbeautify.indent_output',
    'description' => 'setting_htmlbeautify.indent_output_desc',
    'value' => 1,
    'xtype' => 'combo-boolean',
    'namespace' => 'htmlbeautify',
    'area' => 'output-cleaning',
), '', true, true);

$settings['setting_htmlbeautify.remove_comments']= $modx->newObject('modSystemSetting');
$settings['setting_htmlbeautify.remove_comments']->fromArray(array (
    'key' => 'htmlbeautify.remove_comments',
    'description' => 'setting_htmlbeautify.remove_comments_desc',
    'value' => 0,
    'xtype' => 'combo-boolean',
    'namespace' => 'htmlbeautify',
    'area' => 'output-cleaning',
), '', true, true);

$settings['setting_htmlbeautify.enabled']= $modx->newObject('modSystemSetting');
$settings['setting_htmlbeautify.enabled']->fromArray(array (
    'key' => 'htmlbeautify.enabled',
    'description' => 'setting_htmlbeautify.enabled_desc',
    'value' => 1,
    'xtype' => 'combo-boolean',
    'namespace' => 'htmlbeautify',
    'area' => 'output-cleaning',
), '', true, true);

/* Ignore Settings */
$settings['setting_htmlbeautify.ignored_attributes']= $modx->newObject('modSystemSetting');
$settings['setting_htmlbeautify.ignored_attributes']->fromArray(array (
    'key' => 'htmlbeautify.ignored_attributes',
    'description' => 'setting_htmlbeautify.ignored_attributes_desc',
    'value' => "onabort, onblur, onchange, onclick, ondblclick, onerror, onfocus, onkeydown, onkeypress, onkeyup, onload, onmousedown, onmousemove, onmouseout, onmouseover, onmouseup, onreset, onselect, onsubmit, onunload",
    'xtype' => 'textarea',
    'namespace' => 'htmlbeautify',
    'area' => 'ignore-config',
), '', true, true);

$settings['setting_htmlbeautify.ignored_tags']= $modx->newObject('modSystemSetting');
$settings['setting_htmlbeautify.ignored_tags']->fromArray(array (
    'key' => 'htmlbeautify.ignored_tags',
    'description' => 'setting_htmlbeautify.ignored_tags_desc',
    'value' => "pre, script, textarea",
    'xtype' => 'textarea',
    'namespace' => 'htmlbeautify',
    'area' => 'ignore-config',
), '', true, true);

return $settings;
