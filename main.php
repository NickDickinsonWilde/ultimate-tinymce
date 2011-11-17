<?php
/**
 * @package Ultimate TinyMCE
 * @version 1.5
 */
/*
Plugin Name: Ultimate TinyMCE
Plugin URI: http://www.joshlobe.com/2011/11/adding-buttons-to-tinymce-in-wordpress/
Description: Beef up your visual tinymce editor with a plethora of advanced options: Google Fonts, Emoticons, Tables, Styles, Advanced links, images, and drop-downs, too many features to list.
Author: Josh Lobe
Version: 1.5
Author URI: http://joshlobe.com

*/

/*  Copyright 2011  Josh Lobe  (email : joshlobe@joshlobe.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Call our external stylesheet
function jwl_admin_register_head() {
    $siteurl = get_option('siteurl');
    $url = $siteurl . '/wp-content/plugins/' . basename(dirname(__FILE__)) . '/admin_panel.css';
    echo "<link rel='stylesheet' type='text/css' href='$url' />\n";
}
add_action('admin_head', 'jwl_admin_register_head');



// Add the admin options page

	add_action('admin_menu', 'jwl_admin_add_page');
	
	function jwl_admin_add_page() {
	
		add_options_page(
						   'Ultimate TinyMCE Plugin Page', 
						   'Ultimate TinyMCE', 
						   'manage_options', 
						   'ultimate-tinymce', 
						   'jwl_options_page'
						  );
	
	}

// Display the admin options page
	function jwl_options_page() {
	?>
	
	<div class="wrap">
		<h2>Ultimate TinyMCE Plugin Menu</h2>

            <div class="metabox-holder" style="width:65%; float:left; margin-right:10px;">
                <div class="postbox">  
                <div class="inside" style="padding:0px 0px 0px 0px;">
                	<form action="options.php" method="post">
                    <?php settings_fields('jwl_options_group'); ?>
                    <?php do_settings_sections('ultimate-tinymce'); ?><br /><br />  
                    <center><input class="button-primary" type="submit" name="Save" value="<?php _e('Save Options'); ?>" id="submitbutton" /></center>
                    </form><br /><br />     
                </div>
                </div>
                
                <div class="postbox">
                <div class="inside" style="padding:0px 0px 0px 0px;">
                	<form action="options.php" method="post">
                    <?php settings_fields('jwl_options_group2'); ?>
                    <?php do_settings_sections('ultimate-tinymce2'); ?><br /> 
                    <center><input class="button-primary" type="submit" name="Save" value="<?php _e('Save Options'); ?>" id="submitbutton" /></center>   
                    </form><br /><br />
                </div>
                </div>
            </div>
              
            
 
    		<div class="metabox-holder" style="width:30%; float:left;">
 
            
            <div class="postbox">
                <h3 style="cursor:default;">Donations</h3>
                <div class="inside" style="padding:0px 6px 6px 6px;">
                <p><strong>&nbsp;&nbsp;Even the smallest donations are gratefully accepted.</strong></p>
                        
                <!--  Donate Button -->
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                <input type="hidden" name="cmd" value="_s-xclick">
                <input type="hidden" name="hosted_button_id" value="A9E5VNRBMVBCS">
                <center><input type="image" src="http://www.joshlobe.com/images/donate.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!"></center>
                <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                </form>
                </div>
            </div>
            
            <div class="postbox">
                <h3 style="cursor:default;">Resources</h3>
                <div class="inside" style="padding:6px 6px 6px 6px;">
                <a href="http://www.joshlobe.com/2011/10/ultimate-tinymce/" target="_blank">Get help from my personal blog.</a><br /><br />
                <a href="http://wordpress.org/tags/ultimate-tinymce?forum_id=10#postform" target="_blank">Post a thread in the Wordpress Plugin Page.</a>
                </div>
            </div>
        
              
    	</div>
               
	</div>
    
	
	<?php 
	}




// ------------------------------------------------------------------
 // Add all your sections, fields and settings during admin_init
 // ------------------------------------------------------------------
 //
 
 function jwl_settings_api_init() {
 	// Add the section to ultimate-tinymce settings so we can add our
 	// fields to it
	
 	add_settings_section('jwl_setting_section', 'Row 3 Button Settings', 'jwl_setting_section_callback_function', 'ultimate-tinymce');
	add_settings_section('jwl_setting_section2', 'Row 4 Button Settings', 'jwl_setting_section_callback_function2', 'ultimate-tinymce2');
 	
 	// Add the field with the names and function to use for our new
 	// settings, put it in our new section
	
	// These are the settings for Row 3
 	add_settings_field('jwl_fontselect_field_id', 'Font Select Box', 'jwl_fontselect_callback_function', 'ultimate-tinymce', 'jwl_setting_section');
	add_settings_field('jwl_fontsizeselect_field_id', 'Font Size Box', 'jwl_fontsizeselect_callback_function', 'ultimate-tinymce', 'jwl_setting_section');
	add_settings_field('jwl_styleselect_field_id', 'Style Select Box', 'jwl_styleselect_callback_function', 'ultimate-tinymce', 'jwl_setting_section');
	add_settings_field('jwl_cut_field_id', 'Cut Box', 'jwl_cut_callback_function', 'ultimate-tinymce', 'jwl_setting_section');
	add_settings_field('jwl_copy_field_id', 'Copy Box', 'jwl_copy_callback_function', 'ultimate-tinymce', 'jwl_setting_section');
	add_settings_field('jwl_paste_field_id', 'Paste Box', 'jwl_paste_callback_function', 'ultimate-tinymce', 'jwl_setting_section');
	add_settings_field('jwl_backcolorpicker_field_id', 'Background Color Picker Box', 'jwl_backcolorpicker_callback_function', 'ultimate-tinymce', 'jwl_setting_section');
	add_settings_field('jwl_forecolorpicker_field_id', 'Foreground Color Picker Box', 'jwl_forecolorpicker_callback_function', 'ultimate-tinymce', 'jwl_setting_section');
	add_settings_field('jwl_hr_field_id', 'Horizontal Row Box', 'jwl_hr_callback_function', 'ultimate-tinymce', 'jwl_setting_section');
	add_settings_field('jwl_visualaid_field_id', 'Visual Aid Box', 'jwl_visualaid_callback_function', 'ultimate-tinymce', 'jwl_setting_section');
	add_settings_field('jwl_anchor_field_id', 'Anchor Box', 'jwl_anchor_callback_function', 'ultimate-tinymce', 'jwl_setting_section');
	add_settings_field('jwl_sub_field_id', 'Subscript Box', 'jwl_sub_callback_function', 'ultimate-tinymce', 'jwl_setting_section');
	add_settings_field('jwl_sup_field_id', 'Superscript Box', 'jwl_sup_callback_function', 'ultimate-tinymce', 'jwl_setting_section');
	add_settings_field('jwl_search_field_id', 'Search Box', 'jwl_search_callback_function', 'ultimate-tinymce', 'jwl_setting_section');
	add_settings_field('jwl_replace_field_id', 'Replace Box', 'jwl_replace_callback_function', 'ultimate-tinymce', 'jwl_setting_section');
	
	// These are the settings for Row 4
	add_settings_field('jwl_tablecontrols_field_id', 'Table Controls Box', 'jwl_tablecontrols_callback_function', 'ultimate-tinymce2', 'jwl_setting_section2');
	add_settings_field('jwl_emotions_field_id', 'Emotions Box', 'jwl_emotions_callback_function', 'ultimate-tinymce2', 'jwl_setting_section2');
	add_settings_field('jwl_image_field_id', 'Advanced Image Box', 'jwl_image_callback_function', 'ultimate-tinymce2', 'jwl_setting_section2');
	add_settings_field('jwl_preview_field_id', 'Preview Box', 'jwl_preview_callback_function', 'ultimate-tinymce2', 'jwl_setting_section2');
	add_settings_field('jwl_cite_field_id', 'Citations Box', 'jwl_cite_callback_function', 'ultimate-tinymce2', 'jwl_setting_section2');
	add_settings_field('jwl_abbr_field_id', 'Abbreviations Box', 'jwl_abbr_callback_function', 'ultimate-tinymce2', 'jwl_setting_section2');
	add_settings_field('jwl_acronym_field_id', 'Acronym Box', 'jwl_acronym_callback_function', 'ultimate-tinymce2', 'jwl_setting_section2');
	add_settings_field('jwl_del_field_id', 'Delete Box', 'jwl_del_callback_function', 'ultimate-tinymce2', 'jwl_setting_section2');
	add_settings_field('jwl_ins_field_id', 'Insert Box', 'jwl_ins_callback_function', 'ultimate-tinymce2', 'jwl_setting_section2');
	add_settings_field('jwl_attribs_field_id', 'Attributes Box', 'jwl_attribs_callback_function', 'ultimate-tinymce2', 'jwl_setting_section2');
	add_settings_field('jwl_styleprops_field_id', 'Styleprops Box', 'jwl_styleprops_callback_function', 'ultimate-tinymce2', 'jwl_setting_section2');
	add_settings_field('jwl_code_field_id', 'HTML Code Box', 'jwl_code_callback_function', 'ultimate-tinymce2', 'jwl_setting_section2');
 	
 	
	// Register our setting so that $_POST handling is done for us and
 	// our callback function just has to echo the <input>
	
	// Register settings for Row 3
 	register_setting('jwl_options_group','jwl_fontselect_field_id');
	register_setting('jwl_options_group','jwl_fontsizeselect_field_id');
	register_setting('jwl_options_group','jwl_styleselect_field_id');
	register_setting('jwl_options_group','jwl_cut_field_id');
	register_setting('jwl_options_group','jwl_copy_field_id');
	register_setting('jwl_options_group','jwl_paste_field_id');
	register_setting('jwl_options_group','jwl_backcolorpicker_field_id');
	register_setting('jwl_options_group','jwl_forecolorpicker_field_id');
	register_setting('jwl_options_group','jwl_hr_field_id');
	register_setting('jwl_options_group','jwl_visualaid_field_id');
	register_setting('jwl_options_group','jwl_anchor_field_id');
	register_setting('jwl_options_group','jwl_sub_field_id');
	register_setting('jwl_options_group','jwl_sup_field_id');
	register_setting('jwl_options_group','jwl_search_field_id');
	register_setting('jwl_options_group','jwl_replace_field_id');
	
	
	// Register settings for Row 4
	register_setting('jwl_options_group2','jwl_tablecontrols_field_id');
	register_setting('jwl_options_group2','jwl_emotions_field_id');
	register_setting('jwl_options_group2','jwl_image_field_id');
	register_setting('jwl_options_group2','jwl_preview_field_id');
	register_setting('jwl_options_group2','jwl_cite_field_id');
	register_setting('jwl_options_group2','jwl_abbr_field_id');
	register_setting('jwl_options_group2','jwl_acronym_field_id');
	register_setting('jwl_options_group2','jwl_del_field_id');
	register_setting('jwl_options_group2','jwl_ins_field_id');
	register_setting('jwl_options_group2','jwl_attribs_field_id');
	register_setting('jwl_options_group2','jwl_styleprops_field_id');
	register_setting('jwl_options_group2','jwl_code_field_id');

 }
 
 add_action('admin_init', 'jwl_settings_api_init');  
 
  
 // ------------------------------------------------------------------
 // Settings section callback function
 // ------------------------------------------------------------------
 //
 // This function is needed if we added a new section. This function 
 // will be run at the start of our section
 //
 
 function jwl_setting_section_callback_function() {
 	echo '<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;Here you can select which buttons to include in row 3 of the TinyMCE editor.</strong></p>';
 }
 
 function jwl_setting_section_callback_function2() {
 	echo '<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;Here you can select which buttons to include in row 4 of the TinyMCE editor.</strong></p>';
 }
 
 // ------------------------------------------------------------------
 // Callback function for our example setting
 // ------------------------------------------------------------------
 //
 // creates a checkbox true/false option. Other types are surely possible
 //
 

 // Callback Functions for Row 3 Buttons
 function jwl_fontselect_callback_function() {
 	echo '<input name="jwl_fontselect_field_id" id="fontselect" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_fontselect_field_id'), false ) . ' /> ';
	?><img src="../../../../wp-content/plugins/ultimate-tinymce/img/fontselect.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
  
 function jwl_fontsizeselect_callback_function() {
 	echo '<input name="jwl_fontsizeselect_field_id" id="fontsize" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_fontsizeselect_field_id'), false ) . ' /> ';
	?><img src="../../../../wp-content/plugins/ultimate-tinymce/img/fontsizeselect.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }

 function jwl_styleselect_callback_function() {
 	echo '<input name="jwl_styleselect_field_id" id="styleselect" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_styleselect_field_id'), false ) . ' /> ';
	?><img src="../../../../wp-content/plugins/ultimate-tinymce/img/styleselect.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 function jwl_cut_callback_function() {
 	echo '<input name="jwl_cut_field_id" id="cut" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_cut_field_id'), false ) . ' /> ';
	?><img src="../../../../wp-content/plugins/ultimate-tinymce/img/cut.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 function jwl_copy_callback_function() {
 	echo '<input name="jwl_copy_field_id" id="copy" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_copy_field_id'), false ) . ' /> ';
	?><img src="../../../../wp-content/plugins/ultimate-tinymce/img/copy.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 function jwl_paste_callback_function() {
 	echo '<input name="jwl_paste_field_id" id="paste" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_paste_field_id'), false ) . ' /> ';
	?><img src="../../../../wp-content/plugins/ultimate-tinymce/img/paste.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 function jwl_backcolorpicker_callback_function() {
 	echo '<input name="jwl_backcolorpicker_field_id" id="backcolorpicker" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_backcolorpicker_field_id'), false ) . ' /> ';
	?><img src="../../../../wp-content/plugins/ultimate-tinymce/img/backcolorpicker.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 function jwl_forecolorpicker_callback_function() {
 	echo '<input name="jwl_forecolorpicker_field_id" id="forecolorpicker" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_forecolorpicker_field_id'), false ) . ' /> ';
	?><img src="../../../../wp-content/plugins/ultimate-tinymce/img/forecolorpicker.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 function jwl_hr_callback_function() {
 	echo '<input name="jwl_hr_field_id" id="hr" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_hr_field_id'), false ) . ' /> ';
	?><img src="../../../../wp-content/plugins/ultimate-tinymce/img/hr.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 function jwl_visualaid_callback_function() {
 	echo '<input name="jwl_visualaid_field_id" id="visualaid" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_visualaid_field_id'), false ) . ' /> ';
	?><img src="../../../../wp-content/plugins/ultimate-tinymce/img/visualaid.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 function jwl_anchor_callback_function() {
 	echo '<input name="jwl_anchor_field_id" id="anchor" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_anchor_field_id'), false ) . ' /> ';
	?><img src="../../../../wp-content/plugins/ultimate-tinymce/img/anchor.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 function jwl_sub_callback_function() {
 	echo '<input name="jwl_sub_field_id" id="sub" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_sub_field_id'), false ) . ' /> ';
	?><img src="../../../../wp-content/plugins/ultimate-tinymce/img/sub.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 function jwl_sup_callback_function() {
 	echo '<input name="jwl_sup_field_id" id="sup" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_sup_field_id'), false ) . ' /> ';
	?><img src="../../../../wp-content/plugins/ultimate-tinymce/img/sup.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
  function jwl_search_callback_function() {
 	echo '<input name="jwl_search_field_id" id="search" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_search_field_id'), false ) . ' /> ';
	?><img src="../../../../wp-content/plugins/ultimate-tinymce/img/search.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
  function jwl_replace_callback_function() {
 	echo '<input name="jwl_replace_field_id" id="replace" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_replace_field_id'), false ) . ' /> ';
	?><img src="../../../../wp-content/plugins/ultimate-tinymce/img/replace.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 
 // Callback Functions for Row 4 Buttons
 function jwl_tablecontrols_callback_function() {
 	echo '<input name="jwl_tablecontrols_field_id" id="replace" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_tablecontrols_field_id'), false ) . ' /> ';
	?><img src="../../../../wp-content/plugins/ultimate-tinymce/img/tablecontrols.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 function jwl_emotions_callback_function() {
 	echo '<input name="jwl_emotions_field_id" id="replace" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_emotions_field_id'), false ) . ' /> ';
	?><img src="../../../../wp-content/plugins/ultimate-tinymce/img/emotions.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 function jwl_image_callback_function() {
 	echo '<input name="jwl_image_field_id" id="replace" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_image_field_id'), false ) . ' /> ';
	?><img src="../../../../wp-content/plugins/ultimate-tinymce/img/image.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 function jwl_preview_callback_function() {
 	echo '<input name="jwl_preview_field_id" id="replace" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_preview_field_id'), false ) . ' /> ';
	?><img src="../../../../wp-content/plugins/ultimate-tinymce/img/preview.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 function jwl_cite_callback_function() {
 	echo '<input name="jwl_cite_field_id" id="replace" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_cite_field_id'), false ) . ' /> ';
	?><img src="../../../../wp-content/plugins/ultimate-tinymce/img/cite.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 function jwl_abbr_callback_function() {
 	echo '<input name="jwl_abbr_field_id" id="replace" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_abbr_field_id'), false ) . ' /> ';
	?><img src="../../../../wp-content/plugins/ultimate-tinymce/img/abbr.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 function jwl_acronym_callback_function() {
 	echo '<input name="jwl_acronym_field_id" id="replace" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_acronym_field_id'), false ) . ' /> ';
	?><img src="../../../../wp-content/plugins/ultimate-tinymce/img/acronym.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 function jwl_del_callback_function() {
 	echo '<input name="jwl_del_field_id" id="replace" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_del_field_id'), false ) . ' /> ';
	?><img src="../../../../wp-content/plugins/ultimate-tinymce/img/del.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 function jwl_ins_callback_function() {
 	echo '<input name="jwl_ins_field_id" id="replace" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_ins_field_id'), false ) . ' /> ';
	?><img src="../../../../wp-content/plugins/ultimate-tinymce/img/ins.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 function jwl_attribs_callback_function() {
 	echo '<input name="jwl_attribs_field_id" id="replace" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_attribs_field_id'), false ) . ' /> ';
	?><img src="../../../../wp-content/plugins/ultimate-tinymce/img/attribs.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 function jwl_styleprops_callback_function() {
 	echo '<input name="jwl_styleprops_field_id" id="replace" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_styleprops_field_id'), false ) . ' /> ';
	?><img src="../../../../wp-content/plugins/ultimate-tinymce/img/styleprops.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 function jwl_code_callback_function() {
 	echo '<input name="jwl_code_field_id" id="replace" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_code_field_id'), false ) . ' /> ';
	?><img src="../../../../wp-content/plugins/ultimate-tinymce/img/code.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 
 


// Functions for Getting Values for Row 3
function tinymce_add_button_fontselect($buttons) {
$jwl_fontselect = get_option('jwl_fontselect_field_id');
if ($jwl_fontselect == "1")
$buttons[] = 'fontselect';
return $buttons;
}
add_filter("mce_buttons_3", "tinymce_add_button_fontselect");

function tinymce_add_button_fontsizeselect($buttons) {
$jwl_fontsizeselect = get_option('jwl_fontsizeselect_field_id');
if ($jwl_fontsizeselect == "1")
$buttons[] = 'fontsizeselect';
return $buttons;
}
add_filter("mce_buttons_3", "tinymce_add_button_fontsizeselect");

function tinymce_add_button_styleselect($buttons) {
$jwl_styleselect = get_option('jwl_styleselect_field_id');
if ($jwl_styleselect == "1")
$buttons[] = 'styleselect';
return $buttons;
}
add_filter("mce_buttons_3", "tinymce_add_button_styleselect");

function tinymce_add_button_cut($buttons) {
$jwl_cut = get_option('jwl_cut_field_id');
if ($jwl_cut == "1")
$buttons[] = 'cut';
return $buttons;
}
add_filter("mce_buttons_3", "tinymce_add_button_cut");

function tinymce_add_button_copy($buttons) {
$jwl_copy = get_option('jwl_copy_field_id');
if ($jwl_copy == "1")
$buttons[] = 'copy';
return $buttons;
}
add_filter("mce_buttons_3", "tinymce_add_button_copy");

function tinymce_add_button_paste($buttons) {
$jwl_paste = get_option('jwl_paste_field_id');
if ($jwl_paste == "1")
$buttons[] = 'paste';
return $buttons;
}
add_filter("mce_buttons_3", "tinymce_add_button_paste");

function tinymce_add_button_backcolorpicker($buttons) {
$jwl_backcolorpicker = get_option('jwl_backcolorpicker_field_id');
if ($jwl_backcolorpicker == "1")
$buttons[] = 'backcolorpicker';
return $buttons;
}
add_filter("mce_buttons_3", "tinymce_add_button_backcolorpicker");

function tinymce_add_button_forecolorpicker($buttons) {
$jwl_forecolorpicker = get_option('jwl_forecolorpicker_field_id');
if ($jwl_forecolorpicker == "1")
$buttons[] = 'forecolorpicker';
return $buttons;
}
add_filter("mce_buttons_3", "tinymce_add_button_forecolorpicker");

function tinymce_add_button_hr($buttons) {
$jwl_hr = get_option('jwl_hr_field_id');
if ($jwl_hr == "1")
$buttons[] = 'hr';
return $buttons;
}
add_filter("mce_buttons_3", "tinymce_add_button_hr");

function tinymce_add_button_visualaid($buttons) {
$jwl_visualaid = get_option('jwl_visualaid_field_id');
if ($jwl_visualaid == "1")
$buttons[] = 'visualaid';
return $buttons;
}
add_filter("mce_buttons_3", "tinymce_add_button_visualaid");

function tinymce_add_button_anchor($buttons) {
$jwl_anchor = get_option('jwl_anchor_field_id');
if ($jwl_anchor == "1")
$buttons[] = 'anchor';
return $buttons;
}
add_filter("mce_buttons_3", "tinymce_add_button_anchor");

function tinymce_add_button_sub($buttons) {
$jwl_sub = get_option('jwl_sub_field_id');
if ($jwl_sub == "1")
$buttons[] = 'sub';
return $buttons;
}
add_filter("mce_buttons_3", "tinymce_add_button_sub");

function tinymce_add_button_sup($buttons) {
$jwl_sup = get_option('jwl_sup_field_id');
if ($jwl_sup == "1")
$buttons[] = 'sup';
return $buttons;
}
add_filter("mce_buttons_3", "tinymce_add_button_sup");

function tinymce_add_button_search($buttons) {
$jwl_search = get_option('jwl_search_field_id');
if ($jwl_search == "1")
$buttons[] = 'search';
return $buttons;
}
add_filter("mce_buttons_3", "tinymce_add_button_search");

function tinymce_add_button_replace($buttons) {
$jwl_replace = get_option('jwl_replace_field_id');
if ($jwl_replace == "1")
$buttons[] = 'replace';
return $buttons;
}
add_filter("mce_buttons_3", "tinymce_add_button_replace");


// Functions for Getting Values for Row 4
function tinymce_add_button_tablecontrols($buttons) {
$jwl_tablecontrols = get_option('jwl_tablecontrols_field_id');
if ($jwl_tablecontrols == "1")
$buttons[] = 'tablecontrols';
return $buttons;
}
add_filter("mce_buttons_4", "tinymce_add_button_tablecontrols");

function tinymce_add_button_emotions($buttons) {
$jwl_emotions = get_option('jwl_emotions_field_id');
if ($jwl_emotions == "1")
$buttons[] = 'emotions';
return $buttons;
}
add_filter("mce_buttons_4", "tinymce_add_button_emotions");

function tinymce_add_button_image($buttons) {
$jwl_image = get_option('jwl_image_field_id');
if ($jwl_image == "1")
$buttons[] = 'image';
return $buttons;
}
add_filter("mce_buttons_4", "tinymce_add_button_image");

function tinymce_add_button_preview($buttons) {
$jwl_preview = get_option('jwl_preview_field_id');
if ($jwl_preview == "1")
$buttons[] = 'preview';
return $buttons;
}
add_filter("mce_buttons_4", "tinymce_add_button_preview");

function tinymce_add_button_cite($buttons) {
$jwl_cite = get_option('jwl_cite_field_id');
if ($jwl_cite == "1")
$buttons[] = 'cite';
return $buttons;
}
add_filter("mce_buttons_4", "tinymce_add_button_cite");

function tinymce_add_button_abbr($buttons) {
$jwl_abbr = get_option('jwl_abbr_field_id');
if ($jwl_abbr == "1")
$buttons[] = 'abbr';
return $buttons;
}
add_filter("mce_buttons_4", "tinymce_add_button_abbr");

function tinymce_add_button_acronym($buttons) {
$jwl_acronym = get_option('jwl_acronym_field_id');
if ($jwl_acronym == "1")
$buttons[] = 'acronym';
return $buttons;
}
add_filter("mce_buttons_4", "tinymce_add_button_acronym");

function tinymce_add_button_del($buttons) {
$jwl_del = get_option('jwl_del_field_id');
if ($jwl_del == "1")
$buttons[] = 'del';
return $buttons;
}
add_filter("mce_buttons_4", "tinymce_add_button_del");

function tinymce_add_button_ins($buttons) {
$jwl_ins = get_option('jwl_ins_field_id');
if ($jwl_ins == "1")
$buttons[] = 'ins';
return $buttons;
}
add_filter("mce_buttons_4", "tinymce_add_button_ins");

function tinymce_add_button_attribs($buttons) {
$jwl_attribs = get_option('jwl_attribs_field_id');
if ($jwl_attribs == "1")
$buttons[] = 'attribs';
return $buttons;
}
add_filter("mce_buttons_4", "tinymce_add_button_attribs");

function tinymce_add_button_styleprops($buttons) {
$jwl_styleprops = get_option('jwl_styleprops_field_id');
if ($jwl_styleprops == "1")
$buttons[] = 'styleprops';
return $buttons;
}
add_filter("mce_buttons_4", "tinymce_add_button_styleprops");

function tinymce_add_button_code($buttons) {
$jwl_code = get_option('jwl_code_field_id');
if ($jwl_code == "1")
$buttons[] = 'code';
return $buttons;
}
add_filter("mce_buttons_4", "tinymce_add_button_code");


	class mce_table_buttons
	{
		function __construct() 
		{
			add_action( 'admin_init', array( $this, 'admin_init' ) );
			add_action( 'content_save_pre', array( $this, 'content_save_pre'), 100 ); 
		}
		
		function admin_init()
		{
			add_filter( 'mce_external_plugins', array( $this, 'mce_external_plugins' ) ); 
			//add_filter( 'mce_buttons_4', array( $this, 'mce_buttons_4' ) );
			//add_filter( 'theme_advanced_fonts', array( $this, 'theme_advanced_fonts' ) );
		}
		
		function mce_external_plugins( $plugin_array )
		{
			if ( get_option('db_version') < 17056 )
				$plugin_array['table'] = plugin_dir_url( __FILE__ ) . 'table-old/editor_plugin.js';
			else 
				$plugin_array['table'] = plugin_dir_url( __FILE__ ) . 'table/editor_plugin.js';
				$plugin_array['emotions'] = plugin_dir_url(__FILE__) . 'emotions/editor_plugin.js';
				$plugin_array['advlist'] = plugin_dir_url(__FILE__) . 'advlist/editor_plugin.js';
				$plugin_array['advlink'] = plugin_dir_url(__FILE__) . 'advlink/editor_plugin.js';
				$plugin_array['advimage'] = plugin_dir_url(__FILE__) . 'advimage/editor_plugin.js';
				$plugin_array['searchreplace'] = plugin_dir_url(__FILE__) . 'searchreplace/editor_plugin.js';
				$plugin_array['preview'] = plugin_dir_url(__FILE__) . 'preview/editor_plugin.js';
				$plugin_array['xhtmlxtras'] = plugin_dir_url(__FILE__) . 'xhtmlxtras/editor_plugin.js';
				$plugin_array['style'] = plugin_dir_url(__FILE__) . 'style/editor_plugin.js';
				   
				return $plugin_array;
		}
		
		/*
		function mce_buttons_4( $buttons )
		{
			array_push( $buttons, 'tablecontrols', '|', 'emotions', '|', 'image', '|', 'preview', '|','cite', 'abbr', 'acronym', 'del', 'ins', 'attribs', '|', 'styleprops', 'code');
			return $buttons;
		}
		*/
		
		/*
		function mce_buttons_4($buttons)
		{
		$buttons[] = 'tablecontrols';
		$buttons[] = 'emotions';
		$buttons[] = 'image';
		$buttons[] = 'preview';
		$buttons[] = 'cite';
		$buttons[] = 'abbr';
		$buttons[] = 'acronym';
		$buttons[] = 'del';
		$buttons[] = 'ins';
		$buttons[] = 'attribs';
		$buttons[] = 'styleprops';
		$buttons[] = 'code';
		
		return $buttons;
		}
		*/
		
		function content_save_pre( $content )
		{
			if ( substr( $content, -8 ) == '</table>' )
				$content = $content . "\n<br />";
			
			return $content;
		}
	}
	
	$mce_table_buttons = new mce_table_buttons;


?>