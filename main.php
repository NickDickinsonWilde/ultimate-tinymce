<?php
/**
 * @package Ultimate TinyMCE
 * @version 1.5.9
 */
/*
Plugin Name: Ultimate TinyMCE
Plugin URI: http://www.joshlobe.com/2011/10/ultimate-tinymce/
Description: Beef up your visual tinymce editor with a plethora of advanced options.
Author: Josh Lobe
Version: 1.5.9
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
function fb_change_mce_options($initArray) {
    // Comma separated string od extendes tags
    // Command separated string of extended elements
    $ext = 'pre[id|name|class|style],iframe[align|longdesc|name|width|height|frameborder|scrolling|marginheight|marginwidth|src]';
    if ( isset( $initArray['extended_valid_elements'] ) ) {
    $initArray['extended_valid_elements'] .= ',' . $ext;
    } else {
    $initArray['extended_valid_elements'] = $ext;
    }
    // maybe; set tiny paramter verify_html
    //$initArray['verify_html'] = false;
    return $initArray;
    }
    add_filter('tiny_mce_before_init', 'fb_change_mce_options');
*/

// Change our default Tinymce configuration values
//function jwl_change_mce_options($initArray) {

	//$initArray['verify_html'] = false;
	//$initArray['cleanup_on_startup'] = false;
	//$initArray['cleanup'] = false;
	//$initArray['forced_root_block'] = false;
	//$initArray['validate_children'] = false;
	//$initArray['remove_redundant_brs'] = false;
	//$initArray['remove_linebreaks'] = false;
	//$initArray['force_p_newlines'] = false;
	//$initArray['force_br_newlines'] = false;
	//$initArray['fix_table_elements'] = false;
	//$initArray['extended_valid_elements'] = 'iframe[id|class|title|style|align|frameborder|height|longdesc|marginheight|marginwidth|name|scrolling|src|width]';
	//$initArray['extended_valid_elements'] = '*[*]';
	//$initArray['entities'] = '160,nbsp,38,amp,60,lt,62,gt';
	//$initArray['convert_newlines_to_brs'] = true;
	//$initArray['remove_redundant_brs'] = false;
	//$initArray['remove_linebreaks'] = false;
	//$initArray['paste_strip_class_attributes'] = 'none';

	//return $initArray;
//}

//add_filter('tiny_mce_before_init', 'jwl_change_mce_options');

// Set our language localization folder
function jwl_ultimate_tinymce() {
 load_plugin_textdomain('jwl-ultimate-tinymce', false, basename( dirname( __FILE__ ) ) . '/languages' );
}
add_action( 'init', 'jwl_ultimate_tinymce' );

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
//$settings_link2 = '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=A9E5VNRBMVBCS" target="_blank">'.__("Donate",'jwl-ultimate-timymce').'</a>';
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
add_filter( 'tiny_mce_before_init', 'josh_mce_before_init' );
// End custom styles

// Add the admin options page

function jwl_admin_add_page() {
	
		add_options_page(
						   'Ultimate TinyMCE Plugin Page', 
						   __('Ultimate TinyMCE','jwl-ultimate-tinymce'), 
						   'manage_options', 
						   'ultimate-tinymce', 
						   'jwl_options_page'
						  );
	
}
add_action('admin_menu', 'jwl_admin_add_page');

// Display the admin options page
	function jwl_options_page() {
	?>
	
	<div class="wrap">
		<h2><?php _e('Ultimate TinyMCE Plugin Menu','jwl-ultimate-tinymce'); ?></h2>

            <div class="metabox-holder" style="width:65%; float:left; margin-right:10px;">
            <form action="options.php" method="post">
                <div class="postbox">
                <div class="inside" style="padding:0px 0px 0px 0px;">
                	
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
                
                <div class="postbox">
                <div class="inside" style="padding:0px 0px 0px 0px;">
                	
                    <?php settings_fields('jwl_options_group'); ?>
                    <?php do_settings_sections('ultimate-tinymce3'); ?><br /> <br />
                       
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
                <img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/word.png" style="margin-bottom: -8px;" />
                <a href="../wp-content/plugins/ultimate-tinymce/ultimate_tinymce.doc" target="_blank"><?php _e('View plugin documentation (opens in Word).','jwl-ultimate-tinymce'); ?></a><br /><br />
                <img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/screencast.png" style="margin-bottom: -8px;" />
                <a href="http://www.youtube.com/watch?v=fM3CUo9MxMc" target="_blank"><?php _e('Screencast part one','jwl-ultimate-tinymce'); ?></a><br /><br />
                <img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/screencast.png" style="margin-bottom: -8px;" />
                <a href="http://www.youtube.com/watch?v=5raIBxGP17g" target="_blank"><?php _e('Screencast part two','jwl-ultimate-tinymce'); ?></a><br /><br />
                <img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/help.png" style="margin-bottom: -8px;" />
                <a href="http://www.joshlobe.com/2011/10/ultimate-tinymce/" target="_blank"><?php _e('Get help from my personal blog.','jwl-ultimate-tinymce'); ?></a><br /><br />
                <img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/thread.png" style="margin-bottom: -8px;" />
                <a href="http://wordpress.org/tags/ultimate-tinymce?forum_id=10#postform" target="_blank"><?php _e('Post a thread in the Wordpress Plugin Page.','jwl-ultimate-tinymce'); ?></a><br /><br />
                <img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/email.png" style="margin-bottom: -8px;" />
                <a href="http://www.joshlobe.com/contact-me/" target="_blank"><?php _e('Email me directly using my contact form.','jwl-ultimate-tinymce'); ?></a><br /><br />
                <img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/rss.png" style="margin-bottom: -8px;" />
                <a href="http://www.joshlobe.com/feed/" target="_blank"><?php _e('Subscribe to my RSS Feed.','jwl-ultimate-tinymce'); ?></a><br /><br />
                <img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/follow.png" style="margin-bottom: -8px;" />
                <?php _e('Follow me on ','jwl-ultimate-tinymce'); ?><a target="_blank" href="http://www.facebook.com/joshlobe"><?php _e('Facebook','jwl-ultimate-tinymce'); ?></a><?php _e(' and ','jwl-ultimate-tinymce'); ?><a target="_blank" href="http://twitter.com/#!/joshlobe"><?php _e('Twitter','jwl-ultimate-tinymce'); ?></a>.<br />
                               
                </div>
            </div>
            
            
            <div class="postbox2">
                <h3 style="cursor:default;"><?php _e('Please VOTE and click WORKS.','jwl-ultimate-tinymce'); ?></h3>
                <div class="inside2" style="padding:12px 12px 12px 12px;">
                <img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/vote.png" style="margin-bottom: -8px;" />
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
	add_settings_section('jwl_setting_section3', __('Miscellaneous Options and Features','jwl-ultimate-tinymce'), 'jwl_setting_section_callback_function3', 'ultimate-tinymce3');
 	
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
	
	// Settings for added bonuses and features
	add_settings_field('jwl_php_widget_field_id', __('Use PHP Text Widget','jwl-ultimate-tinymce'), 'jwl_php_widget_callback_function', 'ultimate-tinymce3', 'jwl_setting_section3');
	//add_settings_field('jwl_comment_tinymce_field_id', __('Enable Stripped TinyMCE','jwl-ultimate-tinymce'), 'jwl_comment_tinymce_callback_function', 'ultimate-tinymce3', 'jwl_setting_section3');
	add_settings_field('jwl_signoff_field_id', __('Add a Signoff Shortcode','jwl-ultimate-tinymce'), 'jwl_signoff_callback_function', 'ultimate-tinymce3', 'jwl_setting_section3');
 	
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
	
	// Register Settings for bonuses and features
	register_setting('jwl_options_group','jwl_php_widget_field_id');
	//register_setting('jwl_options_group','jwl_comment_tinymce_field_id');
	register_setting('jwl_options_group','jwl_signoff_field_id');

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
 
 function jwl_setting_section_callback_function3() {
 	_e('<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;These are added bonuses and features I have included.</strong></p>','jwl-ultimate-tinymce');
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
 
 // Callback functions for bonuses and features
 function jwl_php_widget_callback_function() {
 	echo '<input name="jwl_php_widget_field_id" id="media" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_php_widget_field_id'), false ) . ' /> ';
	echo '<br />This option will add a PHP widget in your admin panel widgets page.  You can use this widget to insert arbitrary PHP code.<br /><br />Note: After checking this option, de-checking it will remove the PHP widget from your page and the admin panel widget area.  Simply re-check this box to get them back.<br /><br />';
 }
 
 //function jwl_comment_tinymce_callback_function() {
 	//echo '<input name="jwl_comment_tinymce_field_id" id="media" type="checkbox" value="1" class="code" ' . checked( 1, get_option('jwl_comment_tinymce_field_id'), false ) . ' /> ';
	//echo '<br />Checking this option will allow you to use a stripped down version of the tinymce editor in your comment forms.<br /><br /><br />';
 //}
 
 function jwl_signoff_callback_function() {
 	echo '<textarea name="jwl_signoff_field_id" value=" rows="15" class="long-text" style="width:440px; height:100px;">';
	echo get_option('jwl_signoff_field_id');
	echo '</textarea><br /><br />';
	echo 'This option will allow you to enter any string of text into your editor using the [signoff] shortcode.  You may also use valid HTML elements.<br /><br />(Perfect if you always "sign" your posts at the end with the same text.)<br /><br />Just type [signoff] anywhere in your post/page editor screen to apply the text from above.';
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


// Functions for affed bonuses and features
/*function jwl_tinymce_comment_form() {
$jwl_comment_tinymce = get_option('jwl_comment_tinymce_field_id');
if ($jwl_comment_tinymce == "1"){
	?>
    <script type="text/javascript" src="<?php echo bloginfo('wpurl') ?>/wp-includes/js/tinymce/tiny_mce.js"></script>
    <script type="text/javascript" src="<?php echo bloginfo('wpurl') ?>/wp-includes/js/tinymce/langs/wp-langs-en.js"></script>
    <script type="text/javascript" src="<?php echo bloginfo('wpurl') ?>/wp-includes/js/tinymce/utils/editable_selects.js"></script>
    <script type="text/javascript" src="<?php echo bloginfo('wpurl') ?>/wp-includes/js/tinymce/utils/form_utils.js"></script>
    <script type="text/javascript" src="<?php echo bloginfo('wpurl') ?>/wp-includes/js/tinymce/utils/mctabs.js"></script>
    <script type="text/javascript" src="<?php echo bloginfo('wpurl') ?>/wp-includes/js/tinymce/utils/validate.js"></script>
    <script type="text/javascript" src="<?php echo bloginfo('wpurl') ?>/wp-includes/js/tinymce/themes/advanced/editor_template.js"></script>
    <script type="text/javascript">
        tinyMCE.init({
            theme : "advanced",
            mode: "specific_textareas",
            language: "",
            skin: "default",
            theme_advanced_buttons1: 'fontselect, fontsizeselect, bold, italic, underline, blockquote, strikethrough, bullist, numlist, undo, redo',
            theme_advanced_buttons2: '',
            theme_advanced_buttons3: '',
            theme_advanced_buttons4: '',
            elements: 'comment',
            theme_advanced_toolbar_location : "top",
        });
    </script>
<?php
}
}
add_action( 'comment_form_after', 'jwl_tinymce_comment_form' );*/

// Add a signoff shortcode for tinymce visual editor
function jwl_sign_off_text() {  
	$jwl_signoff = get_option('jwl_signoff_field_id');
    return $jwl_signoff;  
} 
add_shortcode('signoff', 'jwl_sign_off_text');


// Add the plugin array for extra features
function jwl_mce_external_plugins( $plugin_array ) {
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
add_filter( 'mce_external_plugins', 'jwl_mce_external_plugins' );

// Adding PHP text widgets
$jwl_php_widget = get_option('jwl_php_widget_field_id');
if ($jwl_php_widget == "1"){

class jwl_PHP_Code_Widget extends WP_Widget {

	function jwl_PHP_Code_Widget() {
		$widget_ops = array('classname' => 'widget_execphp', 'description' => __('Arbitrary text, HTML, or PHP Code'));
		$control_ops = array('width' => 400, 'height' => 350);
		$this->WP_Widget('execphp', __('PHP Code'), $widget_ops, $control_ops);
	}

	function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance );
		$text = apply_filters( 'widget_execphp', $instance['text'], $instance );
		echo $before_widget;
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; } 
			ob_start();
			eval('?>'.$text);
			$text = ob_get_contents();
			ob_end_clean();
			?>			
			<div class="execphpwidget"><?php echo $instance['filter'] ? wpautop($text) : $text; ?></div>
		<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( $new_instance['text'] ) );
		$instance['filter'] = isset($new_instance['filter']);
		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
		$title = strip_tags($instance['title']);
		$text = format_to_edit($instance['text']);
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		<textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>

		<p><input id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" type="checkbox" <?php checked(isset($instance['filter']) ? $instance['filter'] : 0); ?> />&nbsp;<label for="<?php echo $this->get_field_id('filter'); ?>"><?php _e('Automatically add paragraphs.'); ?></label></p>
<?php
	}
}

add_action('widgets_init', create_function('', 'return register_widget("jwl_PHP_Code_Widget");'));

// donate link on manage plugin page
add_filter('plugin_row_meta', 'jwl_execphp_donate_link', 10, 2);
function jwl_execphp_donate_link($links, $file) {
	if ($file == plugin_basename(__FILE__)) {
		$donate_link = '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=A9E5VNRBMVBCS" target="_blank">Donate</a>';
		$links[] = $donate_link;
	}
	return $links;
}

}

?>