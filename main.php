<?php
/**
 * @package Ultimate TinyMCE
 * @version 1.5.5
 */
/*
Plugin Name: Ultimate TinyMCE
Plugin URI: http://www.joshlobe.com/2011/10/ultimate-tinymce/
Description: Beef up your visual tinymce editor with a plethora of advanced options.
Author: Josh Lobe
Version: 1.5.5
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

// this function initializes the extended elements 
/*
function jwl_change_mce_options($initArray) {
	// Comma separated string od extendes tags
	// Command separated string of extended elements
	$ext = 'pre[id|name|class|style],iframe[align|longdesc|name|width|height|frameborder|scrolling|marginheight|marginwidth|src],object[width|height|classid|codebase],param[name|value],embed[src|type|width|height|flashvars|wmode],a[class|name|href|target|title|onclick|rel],script[type|src],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name],hr[class|width|size|noshade]';
	
	if ( isset( $initArray['extended_valid_elements'] ) ) {
		$initArray['extended_valid_elements'] .= ',' . $ext;
	} else {
		$initArray['extended_valid_elements'] = $ext;
	}
	// maybe; set tiny paramter verify_html
	//$initArray['verify_html'] = false;
	return $initArray;
}
add_filter('tiny_mce_before_init', 'jwl_change_mce_options');*/

add_action( 'init', 'jwl_ultimate_tinymce' );

function jwl_ultimate_tinymce() {
 load_plugin_textdomain('jwl-ultimate-tinymce', false, basename( dirname( __FILE__ ) ) . '/languages' );
 }


// set field names 
function jwl_field_func($atts) {
   global $post;
   $name = $atts['name'];
   if (empty($name)) return;

   return get_post_meta($post->ID, $name, true);
}

add_shortcode('field', 'jwl_field_func');



//  Add settings link to plugins page menu
function add_ultimatetinymce_settings_link($links, $file) {
static $this_plugin;
if (!$this_plugin) $this_plugin = plugin_basename(__FILE__);
 
if ($file == $this_plugin){
$settings_link = '<a href="admin.php?page=ultimate-tinymce">'.__("Settings",'jwl-ultimate-tinymce').'</a>';
array_unshift($links, $settings_link);
}
return $links;
}
add_filter('plugin_action_links', 'add_ultimatetinymce_settings_link', 10, 2 );

// Call our external stylesheet
function jwl_admin_register_head() {
    $url = plugin_dir_url( __FILE__ ) . 'admin_panel.css';
    echo "<link rel='stylesheet' type='text/css' href='$url' />\n";
}
add_action('admin_head', 'jwl_admin_register_head');



// Add custom styles
add_filter( 'tiny_mce_before_init', 'josh_mce_before_init' );

function josh_mce_before_init( $settings ) {

    $style_formats = array(
    	//array( 'title' => 'Button', 'selector' => 'a', 'classes' => 'button' ),
        //array( 'title' => 'Callout Box', 'block' => 'div', 'classes' => 'callout', 'wrapper' => true ),
        array( 'title' => __('Bold Red Text','jwl-ultimate-tinymce'), 'inline' => 'span', 'styles' => array( 'color' => '#FF0000', 'fontWeight' => 'bold' )),
		array( 'title' => __('Bold Green Text','jwl-ultimate-tinymce'), 'inline' => 'span', 'styles' => array( 'color' => '#00FF00', 'fontWeight' => 'bold' )),
		array( 'title' => __('Bold Blue Text','jwl-ultimate-tinymce'), 'inline' => 'span', 'styles' => array( 'color' => '#0000FF', 'fontWeight' => 'bold' )),
		array( 'title' => __('Borders','jwl-ultimate-tinymce')),
		array( 'title' => __('Border Black','jwl-ultimate-tinymce'), 'inline' => 'span', 'styles' => array( 'border' => '1px solid #000000', 'padding' => '2px' )),
		array( 'title' => __('Border Red','jwl-ultimate-tinymce'), 'inline' => 'span', 'styles' => array( 'border' => '1px solid #FF0000', 'padding' => '2px' )),
		array( 'title' => __('Border Green','jwl-ultimate-tinymce'), 'inline' => 'span', 'styles' => array( 'border' => '1px solid #00FF00', 'padding' => '2px' )),
		array( 'title' => __('Border Blue','jwl-ultimate-tinymce'), 'inline' => 'span', 'styles' => array( 'border' => '1px solid #0000FF', 'padding' => '2px' )),
		array( 'title' => __('Float','jwl-ultimate-tinymce')),
		array( 'title' => __('Float Left','jwl-ultimate-tinymce'), 'block' => 'span', 'styles' => array( 'float' => 'left' )),
		array( 'title' => __('Float Right','jwl-ultimate-tinymce'), 'block' => 'span', 'styles' => array( 'float' => 'right' )),
		array( 'title' => __('Alerts','jwl-ultimate-tinymce')),
		array( 'title' => __('Normal Alert','jwl-ultimate-tinymce'), 'block' => 'p', 'styles' => array( 'border' => 'solid 1px #DEDEDE', 'background' => '#EFEFEF url('.plugin_dir_url( __FILE__ ).'img/normal.png) 8px 4px no-repeat', 'color' => '#222222' , 'padding' => '4px 4px 4px 30px' , 'text-align' => 'left'  )),
		array( 'title' => __('Green Alert','jwl-ultimate-tinymce'), 'block' => 'p', 'styles' => array( 'border' => 'solid 1px #1EDB0D', 'background' => '#A9FCA2 url('.plugin_dir_url( __FILE__ ).'img/green.png) 8px 4px no-repeat', 'color' => '#222222' , 'padding' => '4px 4px 4px 30px' , 'text-align' => 'left'  )),
		array( 'title' => __('Yellow Alert','jwl-ultimate-tinymce'), 'block' => 'p', 'styles' => array( 'border' => 'solid 1px #F5F531', 'background' => '#FAFAB9 url('.plugin_dir_url( __FILE__ ).'img/yellow.png) 8px 4px no-repeat', 'color' => '#222222' , 'padding' => '4px 4px 4px 30px' , 'text-align' => 'left'  )),
		array( 'title' => __('Red Alert','jwl-ultimate-tinymce'), 'block' => 'p', 'styles' => array( 'border' => 'solid 1px #ED220C', 'background' => '#FABDB6 url('.plugin_dir_url( __FILE__ ).'img/red.png) 8px 4px no-repeat', 'color' => '#222222' , 'padding' => '4px 4px 4px 30px' , 'text-align' => 'left'  ))
    );

    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;

}
// End custom styles

// Add the admin options page

	add_action('admin_menu', 'jwl_admin_add_page');
	
	function jwl_admin_add_page() {
	
		add_options_page(
						   'Ultimate TinyMCE Plugin Page', 
						   __('Ultimate TinyMCE','jwl-ultimate-tinymce'), 
						   'manage_options', 
						   'ultimate-tinymce', 
						   'jwl_options_page'
						  );
	
	}

// Display the admin options page
	function jwl_options_page() {
	?>
	
	<div class="wrap">
		<h2><?php _e('Ultimate TinyMCE Plugin Menu','jwl-ultimate-tinymce'); ?></h2>

            <div class="metabox-holder" style="width:65%; float:left; margin-right:10px;">
                <div class="postbox">  
                <div class="inside" style="padding:0px 0px 0px 0px;">
                	<form action="options.php" method="post">
                    <?php settings_fields('jwl_options_group'); ?>
                    <?php do_settings_sections('ultimate-tinymce'); ?><br /><br />  
                    
                   <br /><br />     
                </div>
                </div>
                
                <div class="postbox">
                <div class="inside" style="padding:0px 0px 0px 0px;">
                	
                    <?php settings_fields('jwl_options_group'); ?>
                    <?php do_settings_sections('ultimate-tinymce2'); ?><br /> <br />
                       
                    <br /><br />
                </div>
                </div>
                <center><input class="button-primary" type="submit" name="Save" value="<?php _e('Save your Selection','jwl-ultimate-tinymce'); ?>" id="submitbutton" /></center>
                </form>
            </div>
              
            
 
    		<div class="metabox-holder" style="width:30%; float:left;">
 
            
            <div class="postbox2top">
                <h3 style="cursor:default;"><?php _e('Donations','jwl-ultimate-tinymce'); ?></h3>
                <div class="inside2" style="padding:12px 12px 12px 12px;">
                <p><strong><?php _e('Even the smallest donations are gratefully accepted.','jwl-ultimate-tinymce'); ?></strong></p>
                        
                <!--  Donate Button -->
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                <input type="hidden" name="cmd" value="_s-xclick">
                <input type="hidden" name="hosted_button_id" value="A9E5VNRBMVBCS">
                <center><input type="image" src="http://www.joshlobe.com/images/donate.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!"></center>
                <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                </form>
                </div>
            </div>
            
            <div class="postbox2">
                <h3 style="cursor:default;"><?php _e('Additional Resources','jwl-ultimate-tinymce'); ?></h3>
                <div class="inside2" style="padding:12px 12px 12px 12px;">
                <a href="../wp-content/plugins/ultimate-tinymce/ultimate_tinymce.doc" target="_blank"><?php _e('View plugin documentation (opens in Word).','jwl-ultimate-tinymce'); ?></a><br /><br />
                <a href="http://www.youtube.com/watch?v=fM3CUo9MxMc" target="_blank"><?php _e('Screencast part one','jwl-ultimate-tinymce'); ?></a><br /><br />
                <a href="http://www.youtube.com/watch?v=5raIBxGP17g" target="_blank"><?php _e('Screencast part two','jwl-ultimate-tinymce'); ?></a><br /><br />
                <a href="http://www.joshlobe.com/2011/10/ultimate-tinymce/" target="_blank"><?php _e('Get help from my personal blog.','jwl-ultimate-tinymce'); ?></a><br /><br />
                <a href="http://wordpress.org/tags/ultimate-tinymce?forum_id=10#postform" target="_blank"><?php _e('Post a thread in the Wordpress Plugin Page.','jwl-ultimate-tinymce'); ?></a><br /><br />
                <a href="http://www.joshlobe.com/contact-me/" target="_blank"><?php _e('Email me directly using my contact form.','jwl-ultimate-tinymce'); ?></a><br /><br />
                <a href="http://www.joshlobe.com/feed/" target="_blank"><?php _e('Subscribe to my RSS Feed.','jwl-ultimate-tinymce'); ?></a><br /><br />
                <?php _e('Follow me on ','jwl-ultimate-tinymce'); ?><a target="_blank" href="http://www.facebook.com/joshlobe"><?php _e('Facebook','jwl-ultimate-tinymce'); ?></a><?php _e(' and ','jwl-ultimate-tinymce'); ?><a target="_blank" href="http://twitter.com/#!/joshlobe"><?php _e('Twitter','jwl-ultimate-tinymce'); ?></a>.<br />
                               
                </div>
            </div>
            
            
            <div class="postbox2">
                <h3 style="cursor:default;"><?php _e('Please VOTE and click WORKS.','jwl-ultimate-tinymce'); ?></h3>
                <div class="inside2" style="padding:12px 12px 12px 12px;">
                <a href="http://wordpress.org/extend/plugins/ultimate-tinymce/" target="_blank"><?php _e('Click Here to Vote...','jwl-ultimate-tinymce'); ?></a><br /><br /><?php _e('Voting helps my plugin get more exposure and higher rankings on the searches.','jwl-ultimate-tinymce'); ?><br /><br /><?php _e('Please help spread this wonderful plugin by showing your support.  Thank you!','jwl-ultimate-tinymce'); ?>
                
                </div>
            </div>
            
            
            <div class="postbox2">
                <h3 style="cursor:default;"><?php _e('Feedback','jwl-ultimate-tinymce'); ?></h3>
                <div class="inside2" style="padding:12px 12px 12px 12px;">
                <?php _e('Please take a moment to complete the short feedback form below.  Your input is greatly appreciated.','jwl-ultimate-tinymce'); ?><br /><br />
                <div style="border:1px solid #999999;"><script type="text/javascript" src="http://form.jotform.com/jsform/13245521214"></script></script></div>
                
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
	
 	add_settings_section('jwl_setting_section', __('Row 3 Button Settings','jwl-ultimate-tinymce'), 'jwl_setting_section_callback_function', 'ultimate-tinymce');
	add_settings_section('jwl_setting_section2', __('Row 4 Button Settings','jwl-ultimate-tinymce'), 'jwl_setting_section_callback_function2', 'ultimate-tinymce2');
 	
 	// Add the field with the names and function to use for our new
 	// settings, put it in our new section
	
	// These are the settings for Row 3
 	add_settings_field('jwl_fontselect_field_id', __('Font Select Box','jwl-ultimate-tinymce'), 'jwl_fontselect_callback_function', 'ultimate-tinymce', 'jwl_setting_section');
	add_settings_field('jwl_fontsizeselect_field_id', __('Font Size Box','jwl-ultimate-tinymce'), 'jwl_fontsizeselect_callback_function', 'ultimate-tinymce', 'jwl_setting_section');
	add_settings_field('jwl_styleselect_field_id', __('Style Select Box','jwl-ultimate-tinymce'), 'jwl_styleselect_callback_function', 'ultimate-tinymce', 'jwl_setting_section');
	add_settings_field('jwl_cut_field_id', __('Cut Box','jwl-ultimate-tinymce'), 'jwl_cut_callback_function', 'ultimate-tinymce', 'jwl_setting_section');
	add_settings_field('jwl_copy_field_id', __('Copy Box','jwl-ultimate-tinymce'), 'jwl_copy_callback_function', 'ultimate-tinymce', 'jwl_setting_section');
	add_settings_field('jwl_paste_field_id', __('Paste Box','jwl-ultimate-tinymce'), 'jwl_paste_callback_function', 'ultimate-tinymce', 'jwl_setting_section');
	add_settings_field('jwl_backcolorpicker_field_id', __('Background Color Picker Box','jwl-ultimate-tinymce'), 'jwl_backcolorpicker_callback_function', 'ultimate-tinymce', 'jwl_setting_section');
	add_settings_field('jwl_forecolorpicker_field_id', __('Foreground Color Picker Box','jwl-ultimate-tinymce'), 'jwl_forecolorpicker_callback_function', 'ultimate-tinymce', 'jwl_setting_section');
	add_settings_field('jwl_advhr_field_id', __('Horizontal Row Box','jwl-ultimate-tinymce'), 'jwl_advhr_callback_function', 'ultimate-tinymce', 'jwl_setting_section');
	add_settings_field('jwl_visualaid_field_id', __('Visual Aid Box','jwl-ultimate-tinymce'), 'jwl_visualaid_callback_function', 'ultimate-tinymce', 'jwl_setting_section');
	add_settings_field('jwl_anchor_field_id', __('Anchor Box','jwl-ultimate-tinymce'), 'jwl_anchor_callback_function', 'ultimate-tinymce', 'jwl_setting_section');
	add_settings_field('jwl_sub_field_id', __('Subscript Box','jwl-ultimate-tinymce'), 'jwl_sub_callback_function', 'ultimate-tinymce', 'jwl_setting_section');
	add_settings_field('jwl_sup_field_id', __('Superscript Box','jwl-ultimate-tinymce'), 'jwl_sup_callback_function', 'ultimate-tinymce', 'jwl_setting_section');
	add_settings_field('jwl_search_field_id', __('Search Box','jwl-ultimate-tinymce'), 'jwl_search_callback_function', 'ultimate-tinymce', 'jwl_setting_section');
	add_settings_field('jwl_replace_field_id', __('Replace Box','jwl-ultimate-tinymce'), 'jwl_replace_callback_function', 'ultimate-tinymce', 'jwl_setting_section');
	
	add_settings_field('jwl_moods_field_id', __('Josh\'s Ultimate Moods Box','jwl-ultimate-tinymce'), 'jwl_moods_callback_function', 'ultimate-tinymce', 'jwl_setting_section');
	
	// These are the settings for Row 4
	add_settings_field('jwl_tablecontrols_field_id', __('Table Controls Box','jwl-ultimate-tinymce'), 'jwl_tablecontrols_callback_function', 'ultimate-tinymce2', 'jwl_setting_section2');
	add_settings_field('jwl_emotions_field_id', __('Emotions Box','jwl-ultimate-tinymce'), 'jwl_emotions_callback_function', 'ultimate-tinymce2', 'jwl_setting_section2');
	add_settings_field('jwl_image_field_id', __('Advanced Image Box','jwl-ultimate-tinymce'), 'jwl_image_callback_function', 'ultimate-tinymce2', 'jwl_setting_section2');
	add_settings_field('jwl_preview_field_id', __('Preview Box','jwl-ultimate-tinymce'), 'jwl_preview_callback_function', 'ultimate-tinymce2', 'jwl_setting_section2');
	add_settings_field('jwl_cite_field_id', __('Citations Box','jwl-ultimate-tinymce'), 'jwl_cite_callback_function', 'ultimate-tinymce2', 'jwl_setting_section2');
	add_settings_field('jwl_abbr_field_id', __('Abbreviations Box','jwl-ultimate-tinymce'), 'jwl_abbr_callback_function', 'ultimate-tinymce2', 'jwl_setting_section2');
	add_settings_field('jwl_acronym_field_id', __('Acronym Box','jwl-ultimate-tinymce'), 'jwl_acronym_callback_function', 'ultimate-tinymce2', 'jwl_setting_section2');
	add_settings_field('jwl_del_field_id', __('Delete Box','jwl-ultimate-tinymce'), 'jwl_del_callback_function', 'ultimate-tinymce2', 'jwl_setting_section2');
	add_settings_field('jwl_ins_field_id', __('Insert Box','jwl-ultimate-tinymce'), 'jwl_ins_callback_function', 'ultimate-tinymce2', 'jwl_setting_section2');
	add_settings_field('jwl_attribs_field_id', __('Attributes Box','jwl-ultimate-tinymce'), 'jwl_attribs_callback_function', 'ultimate-tinymce2', 'jwl_setting_section2');
	add_settings_field('jwl_styleprops_field_id', __('Styleprops Box','jwl-ultimate-tinymce'), 'jwl_styleprops_callback_function', 'ultimate-tinymce2', 'jwl_setting_section2');
	add_settings_field('jwl_code_field_id', __('HTML Code Box','jwl-ultimate-tinymce'), 'jwl_code_callback_function', 'ultimate-tinymce2', 'jwl_setting_section2');
 	
	add_settings_field('jwl_media_field_id', __('Insert Media Box','jwl-ultimate-tinymce'), 'jwl_media_callback_function', 'ultimate-tinymce2', 'jwl_setting_section2');
	
 	
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
	register_setting('jwl_options_group','jwl_advhr_field_id');
	register_setting('jwl_options_group','jwl_visualaid_field_id');
	register_setting('jwl_options_group','jwl_anchor_field_id');
	register_setting('jwl_options_group','jwl_sub_field_id');
	register_setting('jwl_options_group','jwl_sup_field_id');
	register_setting('jwl_options_group','jwl_search_field_id');
	register_setting('jwl_options_group','jwl_replace_field_id');
	
	register_setting('jwl_options_group','jwl_moods_field_id');
	
	
	// Register settings for Row 4
	register_setting('jwl_options_group','jwl_tablecontrols_field_id');
	register_setting('jwl_options_group','jwl_emotions_field_id');
	register_setting('jwl_options_group','jwl_image_field_id');
	register_setting('jwl_options_group','jwl_preview_field_id');
	register_setting('jwl_options_group','jwl_cite_field_id');
	register_setting('jwl_options_group','jwl_abbr_field_id');
	register_setting('jwl_options_group','jwl_acronym_field_id');
	register_setting('jwl_options_group','jwl_del_field_id');
	register_setting('jwl_options_group','jwl_ins_field_id');
	register_setting('jwl_options_group','jwl_attribs_field_id');
	register_setting('jwl_options_group','jwl_styleprops_field_id');
	register_setting('jwl_options_group','jwl_code_field_id');
	
	register_setting('jwl_options_group','jwl_media_field_id');

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
 	_e('<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;Here you can select which buttons to include in row 3 of the TinyMCE editor.</strong></p>','jwl-ultimate-tinymce');
 }
 
 function jwl_setting_section_callback_function2() {
 	_e('<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;Here you can select which buttons to include in row 4 of the TinyMCE editor.</strong></p>','jwl-ultimate-tinymce');
 }
 


 // Callback Functions for Row 3 Buttons
 function jwl_fontselect_callback_function() {
 	echo '<input name="jwl_fontselect_field_id" id="fontselect" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_fontselect_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/fontselect.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
  
 function jwl_fontsizeselect_callback_function() {
 	echo '<input name="jwl_fontsizeselect_field_id" id="fontsize" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_fontsizeselect_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/fontsizeselect.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }

 function jwl_styleselect_callback_function() {
 	echo '<input name="jwl_styleselect_field_id" id="styleselect" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_styleselect_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/styleselect.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 function jwl_cut_callback_function() {
 	echo '<input name="jwl_cut_field_id" id="cut" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_cut_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/cut.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 function jwl_copy_callback_function() {
 	echo '<input name="jwl_copy_field_id" id="copy" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_copy_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/copy.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 function jwl_paste_callback_function() {
 	echo '<input name="jwl_paste_field_id" id="paste" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_paste_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/paste.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 function jwl_backcolorpicker_callback_function() {
 	echo '<input name="jwl_backcolorpicker_field_id" id="backcolorpicker" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_backcolorpicker_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/backcolorpicker.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 function jwl_forecolorpicker_callback_function() {
 	echo '<input name="jwl_forecolorpicker_field_id" id="forecolorpicker" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_forecolorpicker_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/forecolorpicker.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 function jwl_advhr_callback_function() {
 	echo '<input name="jwl_advhr_field_id" id="hr" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_advhr_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/hr.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 function jwl_visualaid_callback_function() {
 	echo '<input name="jwl_visualaid_field_id" id="visualaid" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_visualaid_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/visualaid.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 function jwl_anchor_callback_function() {
 	echo '<input name="jwl_anchor_field_id" id="anchor" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_anchor_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/anchor.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 function jwl_sub_callback_function() {
 	echo '<input name="jwl_sub_field_id" id="sub" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_sub_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/sub.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 function jwl_sup_callback_function() {
 	echo '<input name="jwl_sup_field_id" id="sup" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_sup_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/sup.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 function jwl_search_callback_function() {
 	echo '<input name="jwl_search_field_id" id="search" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_search_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/search.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 function jwl_replace_callback_function() {
 	echo '<input name="jwl_replace_field_id" id="replace" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_replace_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/replace.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 
 function jwl_moods_callback_function() {
 	echo '<input name="jwl_moods_field_id" id="moods" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_moods_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/moods.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 
 // Callback Functions for Row 4 Buttons
 function jwl_tablecontrols_callback_function() {
 	echo '<input name="jwl_tablecontrols_field_id" id="tablecontrols" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_tablecontrols_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/tablecontrols.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 function jwl_emotions_callback_function() {
 	echo '<input name="jwl_emotions_field_id" id="emotions" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_emotions_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/emotions.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 function jwl_image_callback_function() {
 	echo '<input name="jwl_image_field_id" id="image" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_image_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/image.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 function jwl_preview_callback_function() {
 	echo '<input name="jwl_preview_field_id" id="preview" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_preview_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/preview.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 function jwl_cite_callback_function() {
 	echo '<input name="jwl_cite_field_id" id="cite" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_cite_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/cite.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 function jwl_abbr_callback_function() {
 	echo '<input name="jwl_abbr_field_id" id="abbr" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_abbr_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/abbr.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 function jwl_acronym_callback_function() {
 	echo '<input name="jwl_acronym_field_id" id="acronym" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_acronym_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/acronym.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 function jwl_del_callback_function() {
 	echo '<input name="jwl_del_field_id" id="del" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_del_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/del.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 function jwl_ins_callback_function() {
 	echo '<input name="jwl_ins_field_id" id="ins" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_ins_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/ins.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 function jwl_attribs_callback_function() {
 	echo '<input name="jwl_attribs_field_id" id="attribs" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_attribs_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/attribs.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 function jwl_styleprops_callback_function() {
 	echo '<input name="jwl_styleprops_field_id" id="styleprops" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_styleprops_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/styleprops.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 function jwl_code_callback_function() {
 	echo '<input name="jwl_code_field_id" id="code" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_code_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/code.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
 }
 
 
 function jwl_media_callback_function() {
 	echo '<input name="jwl_media_field_id" id="media" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_media_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/media.png" style="margin-left:10px;margin-bottom:-5px;" /><?php
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

function tinymce_add_button_advhr($buttons) {
$jwl_advhr = get_option('jwl_advhr_field_id');
if ($jwl_advhr == "1")
$buttons[] = 'advhr';
return $buttons;
}
add_filter("mce_buttons_3", "tinymce_add_button_advhr");

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


function tinymce_add_button_moods($buttons) {
$jwl_moods = get_option('jwl_moods_field_id');
if ($jwl_moods == "1")
$buttons[] = 'moods';
return $buttons;
}
add_filter("mce_buttons_3", "tinymce_add_button_moods");


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


function tinymce_add_button_media($buttons) {
$jwl_media = get_option('jwl_media_field_id');
if ($jwl_media == "1")
$buttons[] = 'media';
return $buttons;
}
add_filter("mce_buttons_4", "tinymce_add_button_media");




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
				
				$plugin_array['moods'] = plugin_dir_url(__FILE__) . 'moods/editor_plugin.js';
				$plugin_array['media'] = plugin_dir_url(__FILE__) . 'media/editor_plugin.js';
				$plugin_array['advhr'] = plugin_dir_url(__FILE__) . 'advhr/editor_plugin.js';
				   
				return $plugin_array;
		}
		
	
		function content_save_pre( $content )
		{
			if ( substr( $content, -8 ) == '</table>' )
				$content = $content . "\n<br />";
			
			return $content;
		}
	}
	
	$mce_table_buttons = new mce_table_buttons;


?>