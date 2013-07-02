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
 * @package     xhtmlbeautify
 * @subpackage  lexicon
 * @author      Dan Gibbs <dan@goldcoastmedia.co.uk>
 * @language    en
 */

$_lang['XHTMLBeautify'] = 'XHTML Beautify';

$_lang['setting_xhtmlbeautify.enabled'] = 'Enabled';
$_lang['setting_xhtmlbeautify.enabled_desc'] = 'Enable/Disable the plugin from
taking effect.';

$_lang['setting_xhtmlbeautify.abs_url'] = 'Make URLs Absolute or Relative';
$_lang['setting_xhtmlbeautify.abs_url_desc'] = "Setting html_base_url needs
to be set.<br /><br />
-1 = make relative<br />
0 = no action (default)<br />
1 = make absolute";

$_lang['setting_xhtmlbeautify.and_mark'] = 'Mark & Characters';
$_lang['setting_xhtmlbeautify.and_mark_desc'] = "See 
<a href=\"http://www.bioinformatics.org/phplabware/internal_utilities/htmLawed/htmLawed_README.htm#s3.2\"
 target=\"_blank\">section 3.2</a>.";

$_lang['setting_xhtmlbeautify.balance'] = 'Balance Tags';
$_lang['setting_xhtmlbeautify.balance_desc'] = "Balance tags for well-formedness
 and proper nesting. See 
 <a href=\"http://www.bioinformatics.org/phplabware/internal_utilities/htmLawed/htmLawed_README.htm#s3.3.3\"
  target=\"_blank\"> section 3.3.3</a><br /><br />
0 = disabled<br />
1 = enabled";

$_lang['setting_xhtmlbeautify.balance'] = 'Balance Tags';
$_lang['setting_xhtmlbeautify.balance_desc'] = "Balance tags for well-formedness
 and proper nesting. See 
 <a href=\"http://www.bioinformatics.org/phplabware/internal_utilities/htmLawed/htmLawed_README.htm#s3.3.3\" 
 target=\"_blank\"> section 3.3.3</a><br /><br />
0 = disabled<br />
1 = enabled";

$_lang['setting_xhtmlbeautify.base_url'] = 'Base URL Value';
$_lang['setting_xhtmlbeautify.base_url_desc'] = "Base URL value that needs to be set if 
html_abs_url is not 0";

$_lang['setting_xhtmlbeautify.cdata'] = 'CDATA Handling';
$_lang['setting_xhtmlbeautify.cdata_desc'] = "Handling of CDATA sections<br /><br />
0 = don't consider CDATA sections as markup and proceed as if plain text<br />
1 = remove<br />
2 = allow, but neutralize any <, >, and & inside by converting them to named entities<br />
3 = allow (default)
";

$_lang['setting_xhtmlbeautify.clean_ms_char'] = 'Clean Microsoft Word';
$_lang['setting_xhtmlbeautify.clean_ms_char_desc'] = "Replace discouraged characters introduced by Microsoft Word<br /><br />
0 = no (default)<br />
1 = yes<br />
2 = yes, but replace special single & double quotes with ordinary ones
";

$_lang['setting_xhtmlbeautify.comment'] = 'HTML Comments';
$_lang['setting_xhtmlbeautify.comment_desc'] = "Handling of HTML comments<br /><br />
0 = don't consider comments as markup and proceed as if plain text<br />
1 = remove<br />
2 = allow, but neutralize any <, >, and & inside by converting to named entities<br />
3 = allow (default)
";

$_lang['setting_xhtmlbeautify.css_expression'] = 'CSS Expressions';
$_lang['setting_xhtmlbeautify.css_expression_desc'] = " Allow dynamic CSS 
expression by not removing the expression from CSS property values in style 
attributes<br /><br />
0 = remove<br />
1 = allow
";

$_lang['setting_xhtmlbeautify.deny_attribute'] = 'Denied HTML attributes';
$_lang['setting_xhtmlbeautify.deny_attribute_desc'] = "Denied HTML attributes;<br /><br />
0 = none (default)<br />
string - dictated by values in string<br />
on* (like onfocus) attributes not allowed
";

$_lang['setting_xhtmlbeautify.direct_nest_list'] = 'Direct List Nesting';
$_lang['setting_xhtmlbeautify.direct_nest_list_desc'] = "Allow direct nesting
 of a list within another without requiring it to be a list item<br /><br />
0 = no (default)<br />
1 = yes
";

$_lang['setting_xhtmlbeautify.elements'] = 'Elements';
$_lang['setting_xhtmlbeautify.elements_desc'] = "Allowed HTML elements<br /><br />
empty = disabled (default)<br />
* -center -dir -font -isindex -menu -s -strike -u -  ~
  applet, embed, iframe, object, script not allowed -
";

$_lang['setting_xhtmlbeautify.hexdec_entity'] = 'Hexadecimal Numeric Entities ';
$_lang['setting_xhtmlbeautify.hexdec_entity_desc'] = " Allow hexadecimal numeric 
entities and do not convert to the more widely accepted decimal ones, or convert 
decimal to hexadecimal ones<br /><br />
0 = no<br />
1 = yes<br />
2 = convert decimal to hexadecimal ones
";

$_lang['setting_xhtmlbeautify.keep_bad'] = 'Keep Bad Tags';
$_lang['setting_xhtmlbeautify.keep_bad_desc'] = "Neutralize bad tags by 
converting < and > to entities, or remove them<br /><br />
0 = remove<br />
1 = neutralize both tags and element content<br />
2 = remove tags but neutralize element content<br />
3 and 4 - like 1 and 2 but remove if text (pcdata) is invalid in parent element<br />
5 and 6 * -  like 3 and 4 but line-breaks, tabs and spaces are left
";


$_lang['setting_xhtmlbeautify.lc_std_val'] = 'Lowercase Attributes';
$_lang['setting_xhtmlbeautify.lc_std_val_desc'] = "For XHTML compliance, predefined, 
standard attribute values, like get for the method attribute of form, must be 
lowercased<br /><br />
0 = no<br />
1 = yes (default)
";

$_lang['setting_xhtmlbeautify.make_tag_strict'] = 'Strict Tags';
$_lang['setting_xhtmlbeautify.make_tag_strict_desc'] = "Transform/remove these 
non-strict XHTML elements, even if they are allowed by the admin: applet 
center dir embed font isindex menu s strike u; <br /><br />
0 = no<br />
1 =  yes, but leave applet, embed and isindex elements that currently can't be transformed (default)<br />
2 =  yes, removing applet, embed and isindex elements and their contents (nested elements remain)
";

$_lang['setting_xhtmlbeautify.no_deprecated_attr'] = 'Universal HTML';
$_lang['setting_xhtmlbeautify.no_deprecated_attr_desc'] = "Allow non-universal named 
HTML entities, or convert to numeric ones<br /><br />
0 = convert<br />
1 = allow (default)
";

$_lang['setting_xhtmlbeautify.named_entity'] = 'Deprecated Attributes';
$_lang['setting_xhtmlbeautify.named_entity_desc'] = "Allow deprecated 
attributes or transform them<br /><br />
0 = allow<br />
1 = transform, but name attributes for a and map are retaine (default)<br />
2 = transform
";

$_lang['setting_xhtmlbeautify.safe'] = 'Safe';
$_lang['setting_xhtmlbeautify.safe_desc'] = "Magic parameter to make input 
the most secure against XSS<br /><br />
0 = no (default)<br />
1 = will auto-adjust other relevant parameters
";

$_lang['setting_xhtmlbeautify.style_pass'] = 'Style Pass';
$_lang['setting_xhtmlbeautify.style_pass_desc'] = "Do not look at style 
attribute values, letting them through without any alteration<br /><br />
0 = no (default)<br />
1 = let through any style value
";

$_lang['setting_xhtmlbeautify.tidy'] = 'Beautify';
$_lang['setting_xhtmlbeautify.tidy_desc'] = "Beautify or compact HTML code<br /><br />
-1 = compact<br />
0 = no<br />
1 (or string) = beautify
";

$_lang['setting_xhtmlbeautify.unique_ids'] = 'Unique ID\'s';
$_lang['setting_xhtmlbeautify.unique_ids_desc'] = "id attribute value checks to
force unique ID<br /><br />
0 = no  ^<br />
1 = remove duplicate and/or invalid ones<br />
word = remove invalid ones and replace duplicate ones with new and unique ones based on the word; the admin-specified word, like my_, should begin with a letter (a-z) and can contain letters, digits, ., _, -, and :.
";

$_lang['setting_xhtmlbeautify.valid_xhtml'] = 'Valid XHTML';
$_lang['setting_xhtmlbeautify.valid_xhtml_desc'] = "Magic parameter to make 
input the most valid XHTML without needing to specify other relevant parameters<br /><br />
0 = no (default)<br />
1 = will auto-adjust other relevant parameters (indicated by ~ in this list)
";

$_lang['setting_xhtmlbeautify.xml:lang'] = 'Add xml:lang';
$_lang['setting_xhtmlbeautify.xml:lang_desc'] = " Auto-adding xml:lang attribute<br /><br />
0 = no (default)<br />
1 = add if lang attribute is present
2 = add if lang attribute is present, and remove lang
";

$_lang['area_output-cleaning'] = 'Cleaning';
$_lang['area_beautify'] = 'Beautification';
