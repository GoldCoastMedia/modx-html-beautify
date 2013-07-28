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

$settings['setting_xhtmlbeautify.enabled']= $modx->newObject('modSystemSetting');
$settings['setting_xhtmlbeautify.enabled']->fromArray(array (
    'key'         => 'xhtmlbeautify.enabled',
    'description' => 'setting_xhtmlbeautify.enabled_desc',
    'value'       => 1,
    'xtype'       => 'combo-boolean',
    'namespace'   => 'xhtmlbeautify',
    'area'        => 'beautify',
), '', TRUE, TRUE);

/* Output Cleaning */
$settings['setting_xhtmlbeautify.abs_url']= $modx->newObject('modSystemSetting');
$settings['setting_xhtmlbeautify.abs_url']->fromArray(array (
    'key'         => 'xhtmlbeautify.abs_url',
    'description' => 'setting_xhtmlbeautify.abs_url_desc',
    'value'       => 0,
    'xtype'       => 'numberfield',
    'namespace'   => 'xhtmlbeautify',
    'area'        => 'output-cleaning',
), '', TRUE, TRUE);

$settings['setting_xhtmlbeautify.and_mark']= $modx->newObject('modSystemSetting');
$settings['setting_xhtmlbeautify.and_mark']->fromArray(array (
    'key'         => 'xhtmlbeautify.and_mark',
    'description' => 'setting_xhtmlbeautify.and_mark_desc',
    'value'       => 0,
    'xtype'       => 'textfield',
    'namespace'   => 'xhtmlbeautify',
    'area'        => 'output-cleaning',
), '', TRUE, TRUE);

/*$settings['setting_xhtmlbeautify.anti_link_spam']= $modx->newObject('modSystemSetting');
$settings['setting_xhtmlbeautify.anti_link_spam']->fromArray(array (
    'key'         => 'xhtmlbeautify.anti_link_spam',
    'description' => 'setting_xhtmlbeautify.anti_link_spam_desc',
    'value'       => 0,
    'xtype'       => 'textfield',
    'namespace'   => 'xhtmlbeautify',
    'area'        => 'output-cleaning',
), '', TRUE, TRUE);

$settings['setting_xhtmlbeautify.anti_mail_spam']= $modx->newObject('modSystemSetting');
$settings['setting_xhtmlbeautify.anti_mail_spam']->fromArray(array (
    'key'         => 'xhtmlbeautify.anti_mail_spam',
    'description' => 'setting_xhtmlbeautify.anti_mail_spam_desc',
    'value'       => 0,
    'xtype'       => 'textfield',
    'namespace'   => 'xhtmlbeautify',
    'area'        => 'output-cleaning',
), '', TRUE, TRUE);*/

$settings['setting_xhtmlbeautify.balance']= $modx->newObject('modSystemSetting');
$settings['setting_xhtmlbeautify.balance']->fromArray(array (
    'key'         => 'xhtmlbeautify.balance',
    'description' => 'setting_xhtmlbeautify.balance_desc',
    'value'       => 0,
    'xtype'       => 'combo-boolean',
    'namespace'   => 'xhtmlbeautify',
    'area'        => 'output-cleaning',
), '', TRUE, TRUE);

$settings['setting_xhtmlbeautify.base_url']= $modx->newObject('modSystemSetting');
$settings['setting_xhtmlbeautify.base_url']->fromArray(array (
    'key'         => 'xhtmlbeautify.base_url',
    'description' => 'setting_xhtmlbeautify.base_url_desc',
    'value'       => 3,
    'xtype'       => 'numberfield',
    'namespace'   => 'xhtmlbeautify',
    'area'        => 'output-cleaning',
), '', TRUE, TRUE);

$settings['setting_xhtmlbeautify.clean_ms_char']= $modx->newObject('modSystemSetting');
$settings['setting_xhtmlbeautify.clean_ms_char']->fromArray(array (
    'key'         => 'xhtmlbeautify.clean_ms_char',
    'description' => 'setting_xhtmlbeautify.clean_ms_char_desc',
    'value'       => 0,
    'xtype'       => 'numberfield',
    'namespace'   => 'xhtmlbeautify',
    'area'        => 'output-cleaning',
), '', TRUE, TRUE);

$settings['setting_xhtmlbeautify.comment']= $modx->newObject('modSystemSetting');
$settings['setting_xhtmlbeautify.comment']->fromArray(array (
    'key'         => 'xhtmlbeautify.comment',
    'description' => 'setting_xhtmlbeautify.comment_desc',
    'value'       => 3,
    'xtype'       => 'numberfield',
    'namespace'   => 'xhtmlbeautify',
    'area'        => 'output-cleaning',
), '', TRUE, TRUE);

$settings['setting_xhtmlbeautify.css_expression']= $modx->newObject('modSystemSetting');
$settings['setting_xhtmlbeautify.css_expression']->fromArray(array (
    'key'         => 'xhtmlbeautify.css_expression',
    'description' => 'setting_xhtmlbeautify.css_expression_desc',
    'value'       => 1,
    'xtype'       => 'combo-boolean',
    'namespace'   => 'xhtmlbeautify',
    'area'        => 'output-cleaning',
), '', TRUE, TRUE);

$settings['setting_xhtmlbeautify.deny_attribute']= $modx->newObject('modSystemSetting');
$settings['setting_xhtmlbeautify.deny_attribute']->fromArray(array (
    'key'         => 'xhtmlbeautify.deny_attribute',
    'description' => 'setting_xhtmlbeautify.deny_attribute_desc',
    'value'       => 0,
    'xtype'       => 'textfield',
    'namespace'   => 'xhtmlbeautify',
    'area'        => 'output-cleaning',
), '', TRUE, TRUE);

$settings['setting_xhtmlbeautify.direct_nest_list']= $modx->newObject('modSystemSetting');
$settings['setting_xhtmlbeautify.direct_nest_list']->fromArray(array (
    'key'         => 'xhtmlbeautify.direct_nest_list',
    'description' => 'setting_xhtmlbeautify.direct_nest_list_desc',
    'value'       => 0,
    'xtype'       => 'combo-boolean',
    'namespace'   => 'xhtmlbeautify',
    'area'        => 'output-cleaning',
), '', TRUE, TRUE);

$settings['setting_xhtmlbeautify.elements']= $modx->newObject('modSystemSetting');
$settings['setting_xhtmlbeautify.elements']->fromArray(array (
    'key'         => 'xhtmlbeautify.elements',
    'description' => 'setting_xhtmlbeautify.elements_desc',
    'value'       => '',
    'xtype'       => 'textarea',
    'namespace'   => 'xhtmlbeautify',
    'area'        => 'output-cleaning',
), '', TRUE, TRUE);

$settings['setting_xhtmlbeautify.hexdec_entity']= $modx->newObject('modSystemSetting');
$settings['setting_xhtmlbeautify.hexdec_entity']->fromArray(array (
    'key'         => 'xhtmlbeautify.hexdec_entity',
    'description' => 'setting_xhtmlbeautify.hexdec_entity_desc',
    'value'       => 1,
    'xtype'       => 'textfield',
    'namespace'   => 'xhtmlbeautify',
    'area'        => 'output-cleaning',
), '', TRUE, TRUE);

/*
$settings['setting_xhtmlbeautify.hook']= $modx->newObject('modSystemSetting');
$settings['setting_xhtmlbeautify.hook']->fromArray(array (
    'key'         => 'xhtmlbeautify.hook',
    'description' => 'setting_xhtmlbeautify.hook',
    'value'       => 0,
    'xtype'       => 'textfield',
    'namespace'   => 'xhtmlbeautify',
    'area'        => 'output-cleaning',
), '', TRUE, TRUE);

$settings['setting_xhtmlbeautify.hook_tag']= $modx->newObject('modSystemSetting');
$settings['setting_xhtmlbeautify.hook_tag']->fromArray(array (
    'key'         => 'xhtmlbeautify.hook_tag',
    'description' => 'setting_xhtmlbeautify.hook_tag',
    'value'       => 0,
    'xtype'       => 'textfield',
    'namespace'   => 'xhtmlbeautify',
    'area'        => 'output-cleaning',
), '', TRUE, TRUE);

*/

$settings['setting_xhtmlbeautify.keep_bad']= $modx->newObject('modSystemSetting');
$settings['setting_xhtmlbeautify.keep_bad']->fromArray(array (
    'key'         => 'xhtmlbeautify.keep_bad',
    'description' => 'setting_xhtmlbeautify.keep_bad_desc',
    'value'       => -1,
    'xtype'       => 'textfield',
    'namespace'   => 'xhtmlbeautify',
    'area'        => 'output-cleaning',
), '', TRUE, TRUE);

$settings['setting_xhtmlbeautify.lc_std_val']= $modx->newObject('modSystemSetting');
$settings['setting_xhtmlbeautify.lc_std_val']->fromArray(array (
    'key'         => 'xhtmlbeautify.lc_std_val',
    'description' => 'setting_xhtmlbeautify.lc_std_val_desc',
    'value'       => 0,
    'xtype'       => 'combo-boolean',
    'namespace'   => 'xhtmlbeautify',
    'area'        => 'output-cleaning',
), '', TRUE, TRUE);

$settings['setting_xhtmlbeautify.make_tag_strict']= $modx->newObject('modSystemSetting');
$settings['setting_xhtmlbeautify.make_tag_strict']->fromArray(array (
    'key'         => 'xhtmlbeautify.make_tag_strict',
    'description' => 'setting_xhtmlbeautify.make_tag_strict_desc',
    'value'       => 0,
    'xtype'       => 'textfield',
    'namespace'   => 'xhtmlbeautify',
    'area'        => 'output-cleaning',
), '', TRUE, TRUE);

$settings['setting_xhtmlbeautify.named_entity']= $modx->newObject('modSystemSetting');
$settings['setting_xhtmlbeautify.named_entity']->fromArray(array (
    'key'         => 'xhtmlbeautify.named_entity',
    'description' => 'setting_xhtmlbeautify.named_entity_desc',
    'value'       => 0,
    'xtype'       => 'textfield',
    'namespace'   => 'xhtmlbeautify',
    'area'        => 'output-cleaning',
), '', TRUE, TRUE);

$settings['setting_xhtmlbeautify.no_deprecated_attr']= $modx->newObject('modSystemSetting');
$settings['setting_xhtmlbeautify.no_deprecated_attr']->fromArray(array (
    'key'         => 'xhtmlbeautify.no_deprecated_attr',
    'description' => 'setting_xhtmlbeautify.no_deprecated_attr_desc',
    'value'       => 1,
    'xtype'       => 'textfield',
    'namespace'   => 'xhtmlbeautify',
    'area'        => 'output-cleaning',
), '', TRUE, TRUE);

$settings['setting_xhtmlbeautify.safe']= $modx->newObject('modSystemSetting');
$settings['setting_xhtmlbeautify.safe']->fromArray(array (
    'key'         => 'xhtmlbeautify.safe',
    'description' => 'setting_xhtmlbeautify.safe_desc',
    'value'       => 0,
    'xtype'       => 'combo-boolean',
    'namespace'   => 'xhtmlbeautify',
    'area'        => 'output-cleaning',
), '', TRUE, TRUE);


$settings['setting_xhtmlbeautify.schemes']= $modx->newObject('modSystemSetting');
$settings['setting_xhtmlbeautify.schemes']->fromArray(array (
    'key'         => 'xhtmlbeautify.schemes',
    'description' => 'setting_xhtmlbeautify.schemes',
    'value'       => '*:*',
    'xtype'       => 'textarea',
    'namespace'   => 'xhtmlbeautify',
    'area'        => 'output-cleaning',
), '', TRUE, TRUE);

/*
$settings['setting_xhtmlbeautify.show_setting']= $modx->newObject('modSystemSetting');
$settings['setting_xhtmlbeautify.show_setting']->fromArray(array (
    'key'         => 'xhtmlbeautify.show_setting',
    'description' => 'setting_xhtmlbeautify.show_setting',
    'value'       => FALSE,
    'xtype'       => 'textfield',
    'namespace'   => 'xhtmlbeautify',
    'area'        => 'output-cleaning',
), '', TRUE, TRUE);
*/

$settings['setting_xhtmlbeautify.style_pass']= $modx->newObject('modSystemSetting');
$settings['setting_xhtmlbeautify.style_pass']->fromArray(array (
    'key'         => 'xhtmlbeautify.style_pass',
    'description' => 'setting_xhtmlbeautify.style_pass_desc',
    'value'       => 0,
    'xtype'       => 'combo-boolean',
    'namespace'   => 'xhtmlbeautify',
    'area'        => 'output-cleaning',
), '', TRUE, TRUE);

$settings['setting_xhtmlbeautify.tidy']= $modx->newObject('modSystemSetting');
$settings['setting_xhtmlbeautify.tidy']->fromArray(array (
    'key'         => 'xhtmlbeautify.tidy',
    'description' => 'setting_xhtmlbeautify.tidy_desc',
    'value'       => 't10n',
    'xtype'       => 'textfield',
    'namespace'   => 'xhtmlbeautify',
    'area'        => 'beautify',
), '', TRUE, TRUE);

$settings['setting_xhtmlbeautify.unique_ids']= $modx->newObject('modSystemSetting');
$settings['setting_xhtmlbeautify.unique_ids']->fromArray(array (
    'key'         => 'xhtmlbeautify.unique_ids',
    'description' => 'setting_xhtmlbeautify.unique_ids_desc',
    'value'       => 0,
    'xtype'       => 'textfield',
    'namespace'   => 'xhtmlbeautify',
    'area'        => 'output-cleaning',
), '', TRUE, TRUE);

$settings['setting_xhtmlbeautify.valid_xhtml']= $modx->newObject('modSystemSetting');
$settings['setting_xhtmlbeautify.valid_xhtml']->fromArray(array (
    'key'         => 'xhtmlbeautify.valid_xhtml',
    'description' => 'setting_xhtmlbeautify.valid_xdesc',
    'value'       => 0,
    'xtype'       => 'combo-boolean',
    'namespace'   => 'xhtmlbeautify',
    'area'        => 'output-cleaning',
), '', TRUE, TRUE);

$settings['setting_xhtmlbeautify.xml:lang']= $modx->newObject('modSystemSetting');
$settings['setting_xhtmlbeautify.xml:lang']->fromArray(array (
    'key'         => 'xhtmlbeautify.xml:lang',
    'description' => 'setting_xhtmlbeautify.xml:lang_desc',
    'value'       => 0,
    'xtype'       => 'textfield',
    'namespace'   => 'xhtmlbeautify',
    'area'        => 'output-cleaning',
), '', TRUE, TRUE);

return $settings;
