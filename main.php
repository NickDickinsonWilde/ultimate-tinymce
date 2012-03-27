<?php
/**
 * @package Ultimate TinyMCE
 * @version 1.7.6.1
 */
/*
Plugin Name: Ultimate TinyMCE
Plugin URI: http://www.joshlobe.com/2011/10/ultimate-tinymce/
Description: Beef up your visual tinymce editor with a plethora of advanced options.
Author: Josh Lobe
Version: 1.7.6.1
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

/* Added by Josh for uninstalling all database values.  3-3-12
 * This function will remove all database entries created by the plugin.
 * This action is permenant, so I included an option so no information is lost accidentally.
*/

if ( isset( $_POST['uninstall'], $_POST['uninstall_confirm'] ) ) {
    ultimate_tinymce_uninstall();
}

function ultimate_tinymce_uninstall() {
	
	delete_option('jwl_fontselect_field_id');
	delete_option('jwl_fontsizeselect_field_id');
	delete_option('jwl_cut_field_id');
	delete_option('jwl_copy_field_id');
	delete_option('jwl_paste_field_id');
	delete_option('jwl_backcolorpicker_field_id');
	delete_option('jwl_forecolorpicker_field_id');
	delete_option('jwl_advhr_field_id');
	delete_option('jwl_visualaid_field_id');
	delete_option('jwl_anchor_field_id');
	delete_option('jwl_sub_field_id');
	delete_option('jwl_sup_field_id');
	delete_option('jwl_search_field_id');
	delete_option('jwl_replace_field_id');
	delete_option('jwl_datetime_field_id');
	delete_option('jwl_fontselect_dropdown');
	delete_option('jwl_fontsizeselect_dropdown');
	delete_option('jwl_cut_dropdown');
	delete_option('jwl_copy_dropdown');
	delete_option('jwl_paste_dropdown');
	delete_option('jwl_backcolorpicker_dropdown');
	delete_option('jwl_forecolorpicker_dropdown');
	delete_option('jwl_advhr_dropdown');
	delete_option('jwl_visualaid_dropdown');
	delete_option('jwl_anchor_dropdown');
	delete_option('jwl_sub_dropdown');
	delete_option('jwl_sup_dropdown');
	delete_option('jwl_search_dropdown');
	delete_option('jwl_replace_dropdown');
	delete_option('jwl_datetime_dropdown');

	delete_option('jwl_styleselect_field_id');
	delete_option('jwl_tableDropdown_field_id');
	delete_option('jwl_emotions_field_id');
	delete_option('jwl_image_field_id');
	delete_option('jwl_preview_field_id');
	delete_option('jwl_cite_field_id');
	delete_option('jwl_abbr_field_id');
	delete_option('jwl_acronym_field_id');
	delete_option('jwl_del_field_id');
	delete_option('jwl_ins_field_id');
	delete_option('jwl_attribs_field_id');
	delete_option('jwl_styleprops_field_id');
	delete_option('jwl_code_field_id');
	delete_option('jwl_codemagic_field_id');
	delete_option('jwl_media_field_id');
	delete_option('jwl_youtube_field_id');
	delete_option('jwl_imgmap_field_id');
	delete_option('jwl_visualchars_field_id');
	delete_option('jwl_print_field_id');
	delete_option('jwl_shortcodes_field_id');
	delete_option('jwl_styleselect_dropdown');
	delete_option('jwl_tableDropdown_dropdown');
	delete_option('jwl_emotions_dropdown');
	delete_option('jwl_image_dropdown');
	delete_option('jwl_preview_dropdown');
	delete_option('jwl_cite_dropdown');
	delete_option('jwl_abbr_dropdown');
	delete_option('jwl_acronym_dropdown');
	delete_option('jwl_del_dropdown');
	delete_option('jwl_ins_dropdown');
	delete_option('jwl_attribs_dropdown');
	delete_option('jwl_styleprops_dropdown');
	delete_option('jwl_code_dropdown');
	delete_option('jwl_codemagic_dropdown');
	delete_option('jwl_media_dropdown');
	delete_option('jwl_youtube_dropdown');
	delete_option('jwl_imgmap_dropdown');
	delete_option('jwl_visualchars_dropdown');
	delete_option('jwl_print_dropdown');
	delete_option('jwl_shortcodes_dropdown');
	
	delete_option('jwl_tinycolor_css_field_id');
	delete_option('jwl_tinymce_nextpage_field_id');
	delete_option('jwl_tinymce_excerpt_field_id');
	delete_option('jwl_postid_field_id');
	delete_option('jwl_shortcode_field_id');
	delete_option('jwl_php_widget_field_id');
	delete_option('jwl_linebreak_field_id');
	delete_option('jwl_columns_field_id');
	delete_option('jwl_signoff_field_id');
	
	delete_option('jwl_defaults_field_id');
	delete_option('jwl_custom_styles_field_id');
	delete_option('jwl_div_field_id');
	delete_option('jwl_autop_field_id');
 
    // Do not change (this deactivates the plugin)
    $current = get_settings('active_plugins');
    array_splice($current, array_search( $_POST['plugin'], $current), 1 ); // Array-function!
    update_option('active_plugins', $current);
    header('Location: plugins.php?deactivate=true');
}

function jwl_ultimate_tinymce_form_uninstall() {
	?>
    <form method="post">
	<input id="plugin" name="plugin" type="hidden" value="ultimate-tinymce/main.php" /> <?php  // The value must match the folder/file of the plugin.
    if ( isset( $_POST['uninstall'] ) && ! isset( $_POST['uninstall_confirm'] ) ) { 
	?><div id="message" class="error">
  			<p>
    		<?php _e('You must also check the confirm box before options will be uninstalled and deleted.','jwl-ultimate-tinymce'); ?>
  			</p>
		</div>
 	  <?php
    }
	_e('The options for this plugin are not removed upon deactivation to ensure that no data is lost unintentionally.<br /><br />
	If you wish to remove all plugin information from your database be sure to run this uninstall utility first.<br /><br />
	This is a great way to "reset" the plugin, in case you experience problems with the editor.<br /><br />
    This option is NOT reversible. Ultimate Tinymce plugin settings will need to be re-configured if deleted.<br /><br />','jwl-ultimate-tinymce'); ?>
	<input name="uninstall_confirm" type="checkbox" value="1" /> <?php _e('Please confirm before proceeding<br /><br />','jwl-ultimate-tinymce'); ?>
	<input class="button-primary" name="uninstall" type="submit" value="<?php _e('Uninstall','jwl-ultimate-tinymce'); ?>" />
	</form>
<?php
}
/* End Uninstalling Database Values */

/* Display a notice that can be dismissed */
add_action('admin_notices', 'jwl_admin_notice');
function jwl_admin_notice() {
    global $current_user ;
        $user_id = $current_user->ID;
        /* Check that the user hasn't already clicked to ignore the message */
    if ( ! get_user_meta($user_id, 'jwl_ignore_notice') ) {
        echo '<div class="updated"><p>';
        printf(__('<span style="color:green;">Thank you for choosing Ultimate Tinymce.</span><br />Please visit the <a href="admin.php?page=ultimate-tinymce">Ultimate Tinymce Settings Page</a> to begin customization of your editor.<br />If you are upgrading from a previous version, you will need to <a href="admin.php?page=ultimate-tinymce">reconfigure</a> your button row settings.<span style="float:right;"><a href="%1$s">Hide Notice</a></span>'), '?jwl_nag_ignore=0');
        echo "</p></div>";
    }
}
add_action('admin_init', 'jwl_nag_ignore');
function jwl_nag_ignore() {
    global $current_user;
        $user_id = $current_user->ID;
        /* If user clicks to ignore the notice, add that to their user meta */
        if ( isset($_GET['jwl_nag_ignore']) && '0' == $_GET['jwl_nag_ignore'] ) {
             add_user_meta($user_id, 'jwl_ignore_notice', 'true', true);
    }
}

// Change our default Tinymce configuration values
function jwl_change_mce_options($initArray) {
	$initArray['popup_css'] = plugin_dir_url( __FILE__ ) . 'css/popup.css';
	$initArray['theme_advanced_font_sizes'] = '6px=6px,8px=8px,10px=10px,12px=12px,14px=14px,16px=16px,18px=18px,20px=20px,22px=22px,24px=24px,28px=28px,32px=32px,36px=36px,40px=40px,44px=44px,48px=48px,52px=52px,62px=62px,72px=72px';
	$initArray['plugin_insertdate_dateFormat'] = '%B %d, %Y';  // added for inserttimedate proper format
	$initArray['plugin_insertdate_timeFormat'] = '%I:%M:%S %p';  // added for inserttimedate proper format

	return $initArray;
}
add_filter('tiny_mce_before_init', 'jwl_change_mce_options');

// Set our language localization folder (used for adding translations)
function jwl_ultimate_tinymce() {
 load_plugin_textdomain('jwl-ultimate-tinymce', false, basename( dirname( __FILE__ ) ) . '/languages' );
}
add_action( 'init', 'jwl_ultimate_tinymce' );

// set field names for using custom fields in edit posts/pages admin panel.
function jwl_field_func($atts) {
   global $post;
   $name = $atts['name'];
   		if (empty($name)) return;
   return get_post_meta($post->ID, $name, true);
}
add_shortcode('field', 'jwl_field_func');

//  Add settings link to plugins page menu
//  This can be duplicated to add multiple links
function add_ultimatetinymce_settings_link($links, $file) {
	static $this_plugin;
	if (!$this_plugin) $this_plugin = plugin_basename(__FILE__);
 
		if ($file == $this_plugin){
		$settings_link = '<a href="admin.php?page=ultimate-tinymce">'.__("Settings",'jwl-ultimate-tinymce').'</a>';
		$settings_link2 = '<a href="http://forum.joshlobe.com/member.php?action=register&referrer=1">'.__("Support Forum",'jwl-ultimate-tinymce').'</a>';
		array_unshift($links, $settings_link, $settings_link2);
		}
	return $links;
}
add_filter('plugin_action_links', 'add_ultimatetinymce_settings_link', 10, 2 );

// Donate link on manage plugin page
function jwl_execphp_donate_link($links, $file) { if ($file == plugin_basename(__FILE__)) { $donate_link = '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=A9E5VNRBMVBCS" target="_blank">Donate</a>'; $links[] = $donate_link; } return $links; } add_filter('plugin_row_meta', 'jwl_execphp_donate_link', 10, 2);

// Add ALL our settings
function jwl_settings_api_init() {
 	// This creates each settings option group.  These are used as headers in our admin panel settings page.	
 	add_settings_section('jwl_setting_section1', '', 'jwl_setting_section_callback_function1', 'ultimate-tinymce1');
	add_settings_section('jwl_setting_section2', '', 'jwl_setting_section_callback_function2', 'ultimate-tinymce2');
	add_settings_section('jwl_setting_section3', '', 'jwl_setting_section_callback_function3', 'ultimate-tinymce3');
	add_settings_section('jwl_setting_section4', '', 'jwl_setting_section_callback_function4', 'ultimate-tinymce4');

 	
 	// This adds our individual settings to each option group defined above.	
	// These are the settings for Row 3
 	add_settings_field('jwl_fontselect_field_id', __('Font Select Box','jwl-ultimate-tinymce'), 'jwl_fontselect_callback_function', 'ultimate-tinymce1', 'jwl_setting_section1');
	add_settings_field('jwl_fontsizeselect_field_id', __('Font Size Box','jwl-ultimate-tinymce'), 'jwl_fontsizeselect_callback_function', 'ultimate-tinymce1', 'jwl_setting_section1');
	add_settings_field('jwl_cut_field_id', __('Cut Box','jwl-ultimate-tinymce'), 'jwl_cut_callback_function', 'ultimate-tinymce1', 'jwl_setting_section1');
	add_settings_field('jwl_copy_field_id', __('Copy Box','jwl-ultimate-tinymce'), 'jwl_copy_callback_function', 'ultimate-tinymce1', 'jwl_setting_section1');
	add_settings_field('jwl_paste_field_id', __('Paste Box','jwl-ultimate-tinymce'), 'jwl_paste_callback_function', 'ultimate-tinymce1', 'jwl_setting_section1');
	add_settings_field('jwl_backcolorpicker_field_id', __('Background Color Picker Box','jwl-ultimate-tinymce'), 'jwl_backcolorpicker_callback_function', 'ultimate-tinymce1', 'jwl_setting_section1');
	add_settings_field('jwl_forecolorpicker_field_id', __('Foreground Color Picker Box','jwl-ultimate-tinymce'), 'jwl_forecolorpicker_callback_function', 'ultimate-tinymce1', 'jwl_setting_section1');
	add_settings_field('jwl_advhr_field_id', __('Horizontal Rule Box','jwl-ultimate-tinymce'), 'jwl_advhr_callback_function', 'ultimate-tinymce1', 'jwl_setting_section1');
	add_settings_field('jwl_visualaid_field_id', __('Visual Aid Box','jwl-ultimate-tinymce'), 'jwl_visualaid_callback_function', 'ultimate-tinymce1', 'jwl_setting_section1');
	add_settings_field('jwl_anchor_field_id', __('Anchor Box','jwl-ultimate-tinymce'), 'jwl_anchor_callback_function', 'ultimate-tinymce1', 'jwl_setting_section1');
	add_settings_field('jwl_sub_field_id', __('Subscript Box','jwl-ultimate-tinymce'), 'jwl_sub_callback_function', 'ultimate-tinymce1', 'jwl_setting_section1');
	add_settings_field('jwl_sup_field_id', __('Superscript Box','jwl-ultimate-tinymce'), 'jwl_sup_callback_function', 'ultimate-tinymce1', 'jwl_setting_section1');
	add_settings_field('jwl_search_field_id', __('Search Box','jwl-ultimate-tinymce'), 'jwl_search_callback_function', 'ultimate-tinymce1', 'jwl_setting_section1');
	add_settings_field('jwl_replace_field_id', __('Replace Box','jwl-ultimate-tinymce'), 'jwl_replace_callback_function', 'ultimate-tinymce1', 'jwl_setting_section1');
	add_settings_field('jwl_datetime_field_id', __('Insert Date/Time Box','jwl-ultimate-tinymce'), 'jwl_datetime_callback_function', 'ultimate-tinymce1', 'jwl_setting_section1');
	
	// These are the settings for Row 4
	add_settings_field('jwl_styleselect_field_id', __('Style Select Box','jwl-ultimate-tinymce'), 'jwl_styleselect_callback_function', 'ultimate-tinymce2', 'jwl_setting_section2');
	add_settings_field('jwl_tableDropdown_field_id', __('Table Controls Dropdown Box','jwl-ultimate-tinymce'), 'jwl_tableDropdown_callback_function', 'ultimate-tinymce2', 'jwl_setting_section2');
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
	add_settings_field('jwl_codemagic_field_id', __('HTML Code Magic Box','jwl-ultimate-tinymce'), 'jwl_codemagic_callback_function', 'ultimate-tinymce2', 'jwl_setting_section2'); 	
	add_settings_field('jwl_media_field_id', __('Insert Media Box','jwl-ultimate-tinymce'), 'jwl_media_callback_function', 'ultimate-tinymce2', 'jwl_setting_section2');
	add_settings_field('jwl_youtube_field_id', __('Insert YouTube Video Box','jwl-ultimate-tinymce'), 'jwl_youtube_callback_function', 'ultimate-tinymce2', 'jwl_setting_section2');
	add_settings_field('jwl_imgmap_field_id', __('Image Map Editor Box','jwl-ultimate-tinymce'), 'jwl_imgmap_callback_function', 'ultimate-tinymce2', 'jwl_setting_section2');
	add_settings_field('jwl_visualchars_field_id', __('Toggle Visual Characters Box','jwl-ultimate-tinymce'), 'jwl_visualchars_callback_function', 'ultimate-tinymce2', 'jwl_setting_section2');
	add_settings_field('jwl_print_field_id', __('Print Box','jwl-ultimate-tinymce'), 'jwl_print_callback_function', 'ultimate-tinymce2', 'jwl_setting_section2');
	add_settings_field('jwl_shortcodes_field_id', __('Shortcodes Select Box','jwl-ultimate-tinymce'), 'jwl_shortcodes_callback_function', 'ultimate-tinymce2', 'jwl_setting_section2');
	
	// Settings for miscellaneous options and features
	add_settings_field('jwl_tinycolor_css_field_id', __('Change the color of the Editor.','jwl-ultimate-tinymce'), 'jwl_tinycolor_css_callback_function', 'ultimate-tinymce3', 'jwl_setting_section3');
	add_settings_field('jwl_tinymce_nextpage_field_id', __('Enable NextPage (PageBreak) Feature.','jwl-ultimate-tinymce'), 'jwl_tinymce_nextpage_callback_function', 'ultimate-tinymce3', 'jwl_setting_section3');
	add_settings_field('jwl_tinymce_excerpt_field_id', __('Add tinymce editor to excerpt area.','jwl-ultimate-tinymce'), 'jwl_tinymce_excerpt_callback_function', 'ultimate-tinymce3', 'jwl_setting_section3');
	add_settings_field('jwl_postid_field_id', __('Add ID Column to page/post admin list.','jwl-ultimate-tinymce'), 'jwl_postid_callback_function', 'ultimate-tinymce3', 'jwl_setting_section3');
	add_settings_field('jwl_shortcode_field_id', __('Allow shortcode usage in widget text areas.','jwl-ultimate-tinymce'), 'jwl_shortcode_callback_function', 'ultimate-tinymce3', 'jwl_setting_section3');
	add_settings_field('jwl_php_widget_field_id', __('Use PHP Text Widget','jwl-ultimate-tinymce'), 'jwl_php_widget_callback_function', 'ultimate-tinymce3', 'jwl_setting_section3');
	add_settings_field('jwl_linebreak_field_id', __('Enable Line Break Shortcode','jwl-ultimate-tinymce'), 'jwl_linebreak_callback_function', 'ultimate-tinymce3', 'jwl_setting_section3');
	add_settings_field('jwl_columns_field_id', __('Enable Columns Shortcodes','jwl-ultimate-tinymce'), 'jwl_columns_callback_function', 'ultimate-tinymce3', 'jwl_setting_section3');
	add_settings_field('jwl_signoff_field_id', __('Add a Signoff Shortcode','jwl-ultimate-tinymce'), 'jwl_signoff_callback_function', 'ultimate-tinymce3', 'jwl_setting_section3');
	
	// Settings for Advanced TinyMCE Features
	add_settings_field('jwl_defaults_field_id', __('Enable Advanced Insert/Edit Link','jwl-ultimate-tinymce'), 'jwl_defaults_callback_function', 'ultimate-tinymce4', 'jwl_setting_section4');
	add_settings_field('jwl_custom_styles_field_id', __('Enable Advanced Custom Styles','jwl-ultimate-tinymce'), 'jwl_custom_styles_callback_function', 'ultimate-tinymce4', 'jwl_setting_section4');
	add_settings_field('jwl_div_field_id', __('Enable "Div Clear" Ability','jwl-ultimate-tinymce'), 'jwl_div_callback_function', 'ultimate-tinymce4', 'jwl_setting_section4');
	add_settings_field('jwl_autop_field_id', __('Remove <b>p</b> and <b>br</b> tags','jwl-ultimate-tinymce'), 'jwl_autop_callback_function', 'ultimate-tinymce4', 'jwl_setting_section4');
	
 	
	// Register our settings so that $_POST handling is done for us and our callback function just has to echo the <input>.
	// Register settings for Row 3
 	register_setting('jwl_options_group','jwl_fontselect_field_id');
	register_setting('jwl_options_group','jwl_fontselect_dropdown');
	register_setting('jwl_options_group','jwl_fontsizeselect_field_id');
	register_setting('jwl_options_group','jwl_fontsizeselect_dropdown');
	register_setting('jwl_options_group','jwl_cut_field_id');
	register_setting('jwl_options_group','jwl_cut_dropdown');
	register_setting('jwl_options_group','jwl_copy_field_id');
	register_setting('jwl_options_group','jwl_copy_dropdown');
	register_setting('jwl_options_group','jwl_paste_field_id');
	register_setting('jwl_options_group','jwl_paste_dropdown');
	register_setting('jwl_options_group','jwl_backcolorpicker_field_id');
	register_setting('jwl_options_group','jwl_backcolorpicker_dropdown');
	register_setting('jwl_options_group','jwl_forecolorpicker_field_id');
	register_setting('jwl_options_group','jwl_forecolorpicker_dropdown');
	register_setting('jwl_options_group','jwl_advhr_field_id');
	register_setting('jwl_options_group','jwl_advhr_dropdown');
	register_setting('jwl_options_group','jwl_visualaid_field_id');
	register_setting('jwl_options_group','jwl_visualaid_dropdown');
	register_setting('jwl_options_group','jwl_anchor_field_id');
	register_setting('jwl_options_group','jwl_anchor_dropdown');
	register_setting('jwl_options_group','jwl_sub_field_id');
	register_setting('jwl_options_group','jwl_sub_dropdown');
	register_setting('jwl_options_group','jwl_sup_field_id');
	register_setting('jwl_options_group','jwl_sup_dropdown');
	register_setting('jwl_options_group','jwl_search_field_id');
	register_setting('jwl_options_group','jwl_search_dropdown');
	register_setting('jwl_options_group','jwl_replace_field_id');
	register_setting('jwl_options_group','jwl_replace_dropdown');
	register_setting('jwl_options_group','jwl_datetime_field_id');
	register_setting('jwl_options_group','jwl_datetime_dropdown');
	
	// Register settings for Row 4
	register_setting('jwl_options_group','jwl_styleselect_field_id');
	register_setting('jwl_options_group','jwl_styleselect_dropdown');
	register_setting('jwl_options_group','jwl_tableDropdown_field_id');
	register_setting('jwl_options_group','jwl_tableDropdown_dropdown');
	register_setting('jwl_options_group','jwl_emotions_field_id');
	register_setting('jwl_options_group','jwl_emotions_dropdown');
	register_setting('jwl_options_group','jwl_image_field_id');
	register_setting('jwl_options_group','jwl_image_dropdown');
	register_setting('jwl_options_group','jwl_preview_field_id');
	register_setting('jwl_options_group','jwl_preview_dropdown');
	register_setting('jwl_options_group','jwl_cite_field_id');
	register_setting('jwl_options_group','jwl_cite_dropdown');
	register_setting('jwl_options_group','jwl_abbr_field_id');
	register_setting('jwl_options_group','jwl_abbr_dropdown');
	register_setting('jwl_options_group','jwl_acronym_field_id');
	register_setting('jwl_options_group','jwl_acronym_dropdown');
	register_setting('jwl_options_group','jwl_del_field_id');
	register_setting('jwl_options_group','jwl_del_dropdown');
	register_setting('jwl_options_group','jwl_ins_field_id');
	register_setting('jwl_options_group','jwl_ins_dropdown');
	register_setting('jwl_options_group','jwl_attribs_field_id');
	register_setting('jwl_options_group','jwl_attribs_dropdown');
	register_setting('jwl_options_group','jwl_styleprops_field_id');
	register_setting('jwl_options_group','jwl_styleprops_dropdown');
	register_setting('jwl_options_group','jwl_code_field_id');
	register_setting('jwl_options_group','jwl_code_dropdown');
	register_setting('jwl_options_group','jwl_codemagic_field_id');
	register_setting('jwl_options_group','jwl_codemagic_dropdown');
	register_setting('jwl_options_group','jwl_media_field_id');
	register_setting('jwl_options_group','jwl_media_dropdown');
	register_setting('jwl_options_group','jwl_youtube_field_id');
	register_setting('jwl_options_group','jwl_youtube_dropdown');
	register_setting('jwl_options_group','jwl_imgmap_field_id');
	register_setting('jwl_options_group','jwl_imgmap_dropdown');
	register_setting('jwl_options_group','jwl_visualchars_field_id');
	register_setting('jwl_options_group','jwl_visualchars_dropdown');
	register_setting('jwl_options_group','jwl_print_field_id');
	register_setting('jwl_options_group','jwl_print_dropdown');
	register_setting('jwl_options_group','jwl_shortcodes_field_id');
	register_setting('jwl_options_group','jwl_shortcodes_dropdown');
	
	// Register Settings for miscellaneous options and features
	register_setting('jwl_options_group','jwl_tinycolor_css_field_id');
	register_setting('jwl_options_group','jwl_tinymce_nextpage_field_id');
	register_setting('jwl_options_group','jwl_tinymce_excerpt_field_id');
	register_setting('jwl_options_group','jwl_postid_field_id');
	register_setting('jwl_options_group','jwl_shortcode_field_id');
	register_setting('jwl_options_group','jwl_php_widget_field_id');
	register_setting('jwl_options_group','jwl_linebreak_field_id');
	register_setting('jwl_options_group','jwl_columns_field_id');
	register_setting('jwl_options_group','jwl_signoff_field_id');
	
	// Register Settings for Advanced TinyMCE Features
	register_setting('jwl_options_group','jwl_defaults_field_id');
	register_setting('jwl_options_group','jwl_custom_styles_field_id');
	register_setting('jwl_options_group','jwl_div_field_id');
	register_setting('jwl_options_group','jwl_autop_field_id');
	
}
add_action('admin_init', 'jwl_settings_api_init');

// Set default values for dropdown buttons (if not already selected and saved).
// Button defaults for Row 3		
//$jwl_update_fontselect = get_option('jwl_fontselect_dropdown');
	//if( !get_option('jwl_fontselect_dropdown' ) ) { update_option('jwl_fontselect_dropdown', '"Row 3"'); }

 // These are our callback functions for each settings option GROUP described above.
 function jwl_setting_section_callback_function1() {
 	_e('<p>&nbsp;&nbsp;&nbsp;&nbsp;<strong><u>Description</u></strong><span style="margin-left:140px;"><strong><u>Enable</u></strong></span><span style="margin-left:20px;"><strong><u>Image</u></strong></span><span style="margin-left:35px;"><strong><u>Help</u></strong></span><span style="margin-left:20px;"><strong><u>Row Selection</u></strong></span></p>','jwl-ultimate-tinymce');
 }
 function jwl_setting_section_callback_function2() {
 	_e('<p>&nbsp;&nbsp;&nbsp;&nbsp;<strong><u>Description</u></strong><span style="margin-left:140px;"><strong><u>Enable</u></strong></span><span style="margin-left:20px;"><strong><u>Image</u></strong></span><span style="margin-left:35px;"><strong><u>Help</u></strong></span><span style="margin-left:20px;"><strong><u>Row Selection</u></strong></span></p>','jwl-ultimate-tinymce');
 }
 function jwl_setting_section_callback_function3() {
 	_e('<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;These are added bonuses and features I have included.</strong></p>','jwl-ultimate-tinymce');
 }
 function jwl_setting_section_callback_function4() {
 	_e('<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;Here you can enable advanced features of the TinyMCE Editor.<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;NOTE:</strong><br />&nbsp;&nbsp;&nbsp;&nbsp;Checking the box "enables" the selected advanced feature.<br />&nbsp;&nbsp;&nbsp;&nbsp;De-selecting the box will restore original Wordpress default functionality for that setting.</p>','jwl-ultimate-tinymce');
 }
 
 // Begin callback functions	 
 function jwl_fontselect_callback_function() {
    echo '<input name="jwl_fontselect_field_id" id="fontselect" type="checkbox" value="1" class="one" ' . checked( 1, get_option('jwl_fontselect_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/fontselect.png" style="margin-left:10px;margin-bottom:-5px;" /><span style="margin-left:10px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/fontselect.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><?php
			$options_fontselect = get_option('jwl_fontselect_dropdown');
			$items_fontselect = array("Row 1", "Row 2", "Row 3", "Row 4");
			echo "<select id='row' style='width:80px;margin-left:27px;' name='jwl_fontselect_dropdown[row]'>";
			foreach($items_fontselect as $item_fontselect) {
				$selected_fontselect = ($options_fontselect['row']==$item_fontselect) ? 'selected="selected"' : '';
				echo "<option value='$item_fontselect' $selected_fontselect>$item_fontselect</option>";
			}
			echo "</select>";
 }
 
 function jwl_fontsizeselect_callback_function() {
 	echo '<input name="jwl_fontsizeselect_field_id" id="fontsize" type="checkbox" value="1" class="one" ' . checked( 1, get_option('jwl_fontsizeselect_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/fontsizeselect.png" style="margin-left:10px;margin-bottom:-5px;" /><span style="margin-left:10px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/fontsize.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><?php
			$options_fontsizeselect = get_option('jwl_fontsizeselect_dropdown');
			$items_fontsizeselect = array("Row 1", "Row 2", "Row 3", "Row 4");
			echo "<select id='row' style='width:80px;margin-left:27px;' name='jwl_fontsizeselect_dropdown[row]'>";
			foreach($items_fontsizeselect as $item_fontsizeselect) {
				$selected_fontsizeselect = ($options_fontsizeselect['row']==$item_fontsizeselect) ? 'selected="selected"' : '';
				echo "<option value='$item_fontsizeselect' $selected_fontsizeselect>$item_fontsizeselect</option>";
			}
			echo "</select>";
 }
 
 function jwl_cut_callback_function() {
 	echo '<input name="jwl_cut_field_id" id="cut" type="checkbox" value="1" class="one" ' . checked( 1, get_option('jwl_cut_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/cut.png" style="margin-left:10px;margin-bottom:-5px;" /><span style="margin-left:66px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/cut.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><?php
			$options_cut = get_option('jwl_cut_dropdown');
			$items_cut = array("Row 1", "Row 2", "Row 3", "Row 4");
			echo "<select id='row' style='width:80px;margin-left:27px;' name='jwl_cut_dropdown[row]'>";
			foreach($items_cut as $item_cut) {
				$selected_cut = ($options_cut['row']==$item_cut) ? 'selected="selected"' : '';
				echo "<option value='$item_cut' $selected_cut>$item_cut</option>";
			}
			echo "</select>";
 }
 
 function jwl_copy_callback_function() {
 	echo '<input name="jwl_copy_field_id" id="copy" type="checkbox" value="1" class="one" ' . checked( 1, get_option('jwl_copy_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/copy.png" style="margin-left:10px;margin-bottom:-5px;" /><span style="margin-left:66px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/copy.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><?php
			$options_copy = get_option('jwl_copy_dropdown');
			$items_copy = array("Row 1", "Row 2", "Row 3", "Row 4");
			echo "<select id='row' style='width:80px;margin-left:27px;' name='jwl_copy_dropdown[row]'>";
			foreach($items_copy as $item_copy) {
				$selected_copy = ($options_copy['row']==$item_copy) ? 'selected="selected"' : '';
				echo "<option value='$item_copy' $selected_copy>$item_copy</option>";
			}
			echo "</select>";
 }
 
 function jwl_paste_callback_function() {
 	echo '<input name="jwl_paste_field_id" id="paste" type="checkbox" value="1" class="one" ' . checked( 1, get_option('jwl_paste_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/paste.png" style="margin-left:10px;margin-bottom:-5px;" /><span style="margin-left:66px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/paste.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><?php
			$options_paste = get_option('jwl_paste_dropdown');
			$items_paste = array("Row 1", "Row 2", "Row 3", "Row 4");
			echo "<select id='row' style='width:80px;margin-left:27px;' name='jwl_paste_dropdown[row]'>";
			foreach($items_paste as $item_paste) {
				$selected_paste = ($options_paste['row']==$item_paste) ? 'selected="selected"' : '';
				echo "<option value='$item_paste' $selected_paste>$item_paste</option>";
			}
			echo "</select>";
 }
 
 function jwl_backcolorpicker_callback_function() {
 	echo '<input name="jwl_backcolorpicker_field_id" id="backcolorpicker" type="checkbox" value="1" class="one" ' . checked( 1, get_option('jwl_backcolorpicker_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/backcolorpicker.png" style="margin-left:10px;margin-bottom:-5px;" /><span style="margin-left:66px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/bg.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><?php
			$options_backcolorpicker = get_option('jwl_backcolorpicker_dropdown');
			$items_backcolorpicker = array("Row 1", "Row 2", "Row 3", "Row 4");
			echo "<select id='row' style='width:80px;margin-left:27px;' name='jwl_backcolorpicker_dropdown[row]'>";
			foreach($items_backcolorpicker as $item_backcolorpicker) {
				$selected_backcolorpicker = ($options_backcolorpicker['row']==$item_backcolorpicker) ? 'selected="selected"' : '';
				echo "<option value='$item_backcolorpicker' $selected_backcolorpicker>$item_backcolorpicker</option>";
			}
			echo "</select>";
 }
 
 function jwl_forecolorpicker_callback_function() {
 	echo '<input name="jwl_forecolorpicker_field_id" id="forecolorpicker" type="checkbox" value="1" class="one" ' . checked( 1, get_option('jwl_forecolorpicker_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/forecolorpicker.png" style="margin-left:10px;margin-bottom:-5px;" /><span style="margin-left:66px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/fg.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><?php
			$options_forecolorpicker = get_option('jwl_forecolorpicker_dropdown');
			$items_forecolorpicker = array("Row 1", "Row 2", "Row 3", "Row 4");
			echo "<select id='row' style='width:80px;margin-left:27px;' name='jwl_forecolorpicker_dropdown[row]'>";
			foreach($items_forecolorpicker as $item_forecolorpicker) {
				$selected_forecolorpicker = ($options_forecolorpicker['row']==$item_forecolorpicker) ? 'selected="selected"' : '';
				echo "<option value='$item_forecolorpicker' $selected_forecolorpicker>$item_forecolorpicker</option>";
			}
			echo "</select>";
 }
 
 function jwl_advhr_callback_function() {
 	echo '<input name="jwl_advhr_field_id" id="hr" type="checkbox" value="1" class="one" ' . checked( 1, get_option('jwl_advhr_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/hr.png" style="margin-left:10px;margin-bottom:-5px;" /><span style="margin-left:66px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/hr.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><?php
			$options_advhr = get_option('jwl_advhr_dropdown');
			$items_advhr = array("Row 1", "Row 2", "Row 3", "Row 4");
			echo "<select id='row' style='width:80px;margin-left:27px;' name='jwl_advhr_dropdown[row]'>";
			foreach($items_advhr as $item_advhr) {
				$selected_advhr = ($options_advhr['row']==$item_advhr) ? 'selected="selected"' : '';
				echo "<option value='$item_advhr' $selected_advhr>$item_advhr</option>";
			}
			echo "</select>";
 }
 
 function jwl_visualaid_callback_function() {
 	echo '<input name="jwl_visualaid_field_id" id="visualaid" type="checkbox" value="1" class="one" ' . checked( 1, get_option('jwl_visualaid_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/visualaid.png" style="margin-left:10px;margin-bottom:-5px;" /><span style="margin-left:66px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/visual.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><?php
			$options_visualaid = get_option('jwl_visualaid_dropdown');
			$items_visualaid = array("Row 1", "Row 2", "Row 3", "Row 4");
			echo "<select id='row' style='width:80px;margin-left:27px;' name='jwl_visualaid_dropdown[row]'>";
			foreach($items_visualaid as $item_visualaid) {
				$selected_visualaid = ($options_visualaid['row']==$item_visualaid) ? 'selected="selected"' : '';
				echo "<option value='$item_visualaid' $selected_visualaid>$item_visualaid</option>";
			}
			echo "</select>";
 }
 
 function jwl_anchor_callback_function() {
 	echo '<input name="jwl_anchor_field_id" id="anchor" type="checkbox" value="1" class="one" ' . checked( 1, get_option('jwl_anchor_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/anchor.png" style="margin-left:10px;margin-bottom:-5px;" /><span style="margin-left:66px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/anchor.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><?php
			$options_anchor = get_option('jwl_anchor_dropdown');
			$items_anchor = array("Row 1", "Row 2", "Row 3", "Row 4");
			echo "<select id='row' style='width:80px;margin-left:27px;' name='jwl_anchor_dropdown[row]'>";
			foreach($items_anchor as $item_anchor) {
				$selected_anchor = ($options_anchor['row']==$item_anchor) ? 'selected="selected"' : '';
				echo "<option value='$item_anchor' $selected_anchor>$item_anchor</option>";
			}
			echo "</select>";
 }
 
 function jwl_sub_callback_function() {
 	echo '<input name="jwl_sub_field_id" id="sub" type="checkbox" value="1" class="one" ' . checked( 1, get_option('jwl_sub_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/sub.png" style="margin-left:10px;margin-bottom:-5px;" /><span style="margin-left:66px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/sub.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><?php
			$options_sub = get_option('jwl_sub_dropdown');
			$items_sub = array("Row 1", "Row 2", "Row 3", "Row 4");
			echo "<select id='row' style='width:80px;margin-left:27px;' name='jwl_sub_dropdown[row]'>";
			foreach($items_sub as $item_sub) {
				$selected_sub = ($options_sub['row']==$item_sub) ? 'selected="selected"' : '';
				echo "<option value='$item_sub' $selected_sub>$item_sub</option>";
			}
			echo "</select>";
 }
 
 function jwl_sup_callback_function() {
 	echo '<input name="jwl_sup_field_id" id="sup" type="checkbox" value="1" class="one" ' . checked( 1, get_option('jwl_sup_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/sup.png" style="margin-left:10px;margin-bottom:-5px;" /><span style="margin-left:66px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/sup.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><?php
			$options_sup = get_option('jwl_sup_dropdown');
			$items_sup = array("Row 1", "Row 2", "Row 3", "Row 4");
			echo "<select id='row' style='width:80px;margin-left:27px;' name='jwl_sup_dropdown[row]'>";
			foreach($items_sup as $item_sup) {
				$selected_sup = ($options_sup['row']==$item_sup) ? 'selected="selected"' : '';
				echo "<option value='$item_sup' $selected_sup>$item_sup</option>";
			}
			echo "</select>";
 }
 
 function jwl_search_callback_function() {
 	echo '<input name="jwl_search_field_id" id="search" type="checkbox" value="1" class="one" ' . checked( 1, get_option('jwl_search_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/search.png" style="margin-left:10px;margin-bottom:-5px;" /><span style="margin-left:66px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/search.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><?php
			$options_search = get_option('jwl_search_dropdown');
			$items_search = array("Row 1", "Row 2", "Row 3", "Row 4");
			echo "<select id='row' style='width:80px;margin-left:27px;' name='jwl_search_dropdown[row]'>";
			foreach($items_search as $item_search) {
				$selected_search = ($options_search['row']==$item_search) ? 'selected="selected"' : '';
				echo "<option value='$item_search' $selected_search>$item_search</option>";
			}
			echo "</select>";
 }
 
 function jwl_replace_callback_function() {
 	echo '<input name="jwl_replace_field_id" id="replace" type="checkbox" value="1" class="one" ' . checked( 1, get_option('jwl_replace_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/replace.png" style="margin-left:10px;margin-bottom:-5px;" /><span style="margin-left:66px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/replace.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><?php
			$options_replace = get_option('jwl_replace_dropdown');
			$items_replace = array("Row 1", "Row 2", "Row 3", "Row 4");
			echo "<select id='row' style='width:80px;margin-left:27px;' name='jwl_replace_dropdown[row]'>";
			foreach($items_replace as $item_replace) {
				$selected_replace = ($options_replace['row']==$item_replace) ? 'selected="selected"' : '';
				echo "<option value='$item_replace' $selected_replace>$item_replace</option>";
			}
			echo "</select>";
 }
  
 function jwl_datetime_callback_function() {
 	echo '<input name="jwl_datetime_field_id" id="datetime" type="checkbox" value="1" class="one" ' . checked( 1, get_option('jwl_datetime_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/datetime.png" style="margin-left:10px;margin-bottom:-5px;" /><span style="margin-left:32px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/datetime.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><?php
			$options_datetime = get_option('jwl_datetime_dropdown');
			$items_datetime = array("Row 1", "Row 2", "Row 3", "Row 4");
			echo "<select id='row' style='width:80px;margin-left:27px;' name='jwl_datetime_dropdown[row]'>";
			foreach($items_datetime as $item_datetime) {
				$selected_datetime = ($options_datetime['row']==$item_datetime) ? 'selected="selected"' : '';
				echo "<option value='$item_datetime' $selected_datetime>$item_datetime</option>";
			}
			echo "</select>";
 }
 
// Begin Callback functions for each individual setting registered in code above.
// Callback Functions for Row 4 Buttons
 
 function jwl_styleselect_callback_function() {
 	echo '<input name="jwl_styleselect_field_id" id="styleselect" type="checkbox" value="1" class="two" ' . checked( 1, get_option('jwl_styleselect_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/styleselect.png" style="margin-left:10px;margin-bottom:-5px;" /><span style="margin-left:10px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/styleselect.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><?php
			$options_styleselect = get_option('jwl_styleselect_dropdown');
			$items_styleselect = array("Row 1", "Row 2", "Row 3", "Row 4");
			echo "<select id='row' style='width:80px;margin-left:27px;' name='jwl_styleselect_dropdown[row]'>";
			foreach($items_styleselect as $item_styleselect) {
				$selected_styleselect = ($options_styleselect['row']==$item_styleselect) ? 'selected="selected"' : '';
				echo "<option value='$item_styleselect' $selected_styleselect>$item_styleselect</option>";
			}
			echo "</select>";
 }
 
 function jwl_tableDropdown_callback_function() {
 	echo '<input name="jwl_tableDropdown_field_id" id="tableDropdown" type="checkbox" value="1" class="two" ' . checked( 1, get_option('jwl_tableDropdown_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/tableDropdown.png" style="margin-left:10px;margin-bottom:-5px;" /><span style="margin-left:67px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/tableDropdown.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><?php
			$options_tableDropdown = get_option('jwl_tableDropdown_dropdown');
			$items_tableDropdown = array("Row 1", "Row 2", "Row 3", "Row 4");
			echo "<select id='row' style='width:80px;margin-left:27px;' name='jwl_tableDropdown_dropdown[row]'>";
			foreach($items_tableDropdown as $item_tableDropdown) {
				$selected_tableDropdown = ($options_tableDropdown['row']==$item_tableDropdown) ? 'selected="selected"' : '';
				echo "<option value='$item_tableDropdown' $selected_tableDropdown>$item_tableDropdown</option>";
			}
			echo "</select>";
 }
 
 function jwl_emotions_callback_function() {
 	echo '<input name="jwl_emotions_field_id" id="emotions" type="checkbox" value="1" class="two" ' . checked( 1, get_option('jwl_emotions_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/emotions.png" style="margin-left:10px;margin-bottom:-5px;" /><span style="margin-left:66px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/emotions.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><?php
			$options_emotions = get_option('jwl_emotions_dropdown');
			$items_emotions = array("Row 1", "Row 2", "Row 3", "Row 4");
			echo "<select id='row' style='width:80px;margin-left:27px;' name='jwl_emotions_dropdown[row]'>";
			foreach($items_emotions as $item_emotions) {
				$selected_emotions = ($options_emotions['row']==$item_emotions) ? 'selected="selected"' : '';
				echo "<option value='$item_emotions' $selected_emotions>$item_emotions</option>";
			}
			echo "</select>";
 }
 
 function jwl_image_callback_function() {
 	echo '<input name="jwl_image_field_id" id="image" type="checkbox" value="1" class="two" ' . checked( 1, get_option('jwl_image_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/image.png" style="margin-left:10px;margin-bottom:-5px;" /><span style="margin-left:66px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/image.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><?php
			$options_image = get_option('jwl_image_dropdown');
			$items_image = array("Row 1", "Row 2", "Row 3", "Row 4");
			echo "<select id='row' style='width:80px;margin-left:27px;' name='jwl_image_dropdown[row]'>";
			foreach($items_image as $item_image) {
				$selected_image = ($options_image['row']==$item_image) ? 'selected="selected"' : '';
				echo "<option value='$item_image' $selected_image>$item_image</option>";
			}
			echo "</select>";
 }
 
 function jwl_preview_callback_function() {
 	echo '<input name="jwl_preview_field_id" id="preview" type="checkbox" value="1" class="two" ' . checked( 1, get_option('jwl_preview_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/preview.png" style="margin-left:10px;margin-bottom:-5px;" /><span style="margin-left:66px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/preview.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><?php
			$options_preview = get_option('jwl_preview_dropdown');
			$items_preview = array("Row 1", "Row 2", "Row 3", "Row 4");
			echo "<select id='row' style='width:80px;margin-left:27px;' name='jwl_preview_dropdown[row]'>";
			foreach($items_preview as $item_preview) {
				$selected_preview = ($options_preview['row']==$item_preview) ? 'selected="selected"' : '';
				echo "<option value='$item_preview' $selected_preview>$item_preview</option>";
			}
			echo "</select>";
 }
 
 function jwl_cite_callback_function() {
 	echo '<input name="jwl_cite_field_id" id="cite" type="checkbox" value="1" class="two" ' . checked( 1, get_option('jwl_cite_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/cite.png" style="margin-left:10px;margin-bottom:-5px;" /><span style="margin-left:66px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/cite.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><?php
			$options_cite = get_option('jwl_cite_dropdown');
			$items_cite = array("Row 1", "Row 2", "Row 3", "Row 4");
			echo "<select id='row' style='width:80px;margin-left:27px;' name='jwl_cite_dropdown[row]'>";
			foreach($items_cite as $item_cite) {
				$selected_cite = ($options_cite['row']==$item_cite) ? 'selected="selected"' : '';
				echo "<option value='$item_cite' $selected_cite>$item_cite</option>";
			}
			echo "</select>";
 }
 
 function jwl_abbr_callback_function() {
 	echo '<input name="jwl_abbr_field_id" id="abbr" type="checkbox" value="1" class="two" ' . checked( 1, get_option('jwl_abbr_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/abbr.png" style="margin-left:10px;margin-bottom:-5px;" /><span style="margin-left:66px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/abbr.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><?php
			$options_abbr = get_option('jwl_abbr_dropdown');
			$items_abbr = array("Row 1", "Row 2", "Row 3", "Row 4");
			echo "<select id='row' style='width:80px;margin-left:27px;' name='jwl_abbr_dropdown[row]'>";
			foreach($items_abbr as $item_abbr) {
				$selected_abbr = ($options_abbr['row']==$item_abbr) ? 'selected="selected"' : '';
				echo "<option value='$item_abbr' $selected_abbr>$item_abbr</option>";
			}
			echo "</select>";
 }
 
 function jwl_acronym_callback_function() {
 	echo '<input name="jwl_acronym_field_id" id="acronym" type="checkbox" value="1" class="two" ' . checked( 1, get_option('jwl_acronym_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/acronym.png" style="margin-left:10px;margin-bottom:-5px;" /><span style="margin-left:66px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/acronym.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><?php
			$options_acronym = get_option('jwl_acronym_dropdown');
			$items_acronym = array("Row 1", "Row 2", "Row 3", "Row 4");
			echo "<select id='row' style='width:80px;margin-left:27px;' name='jwl_acronym_dropdown[row]'>";
			foreach($items_acronym as $item_acronym) {
				$selected_acronym = ($options_acronym['row']==$item_acronym) ? 'selected="selected"' : '';
				echo "<option value='$item_acronym' $selected_acronym>$item_acronym</option>";
			}
			echo "</select>";
 }
 
 function jwl_del_callback_function() {
 	echo '<input name="jwl_del_field_id" id="del" type="checkbox" value="1" class="two" ' . checked( 1, get_option('jwl_del_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/del.png" style="margin-left:10px;margin-bottom:-5px;" /><span style="margin-left:66px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/del.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><?php
			$options_del = get_option('jwl_del_dropdown');
			$items_del = array("Row 1", "Row 2", "Row 3", "Row 4");
			echo "<select id='row' style='width:80px;margin-left:27px;' name='jwl_del_dropdown[row]'>";
			foreach($items_del as $item_del) {
				$selected_del = ($options_del['row']==$item_del) ? 'selected="selected"' : '';
				echo "<option value='$item_del' $selected_del>$item_del</option>";
			}
			echo "</select>";
 }
 
 function jwl_ins_callback_function() {
 	echo '<input name="jwl_ins_field_id" id="ins" type="checkbox" value="1" class="two" ' . checked( 1, get_option('jwl_ins_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/ins.png" style="margin-left:10px;margin-bottom:-5px;" /><span style="margin-left:66px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/ins.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><?php
			$options_ins = get_option('jwl_ins_dropdown');
			$items_ins = array("Row 1", "Row 2", "Row 3", "Row 4");
			echo "<select id='row' style='width:80px;margin-left:27px;' name='jwl_ins_dropdown[row]'>";
			foreach($items_ins as $item_ins) {
				$selected_ins = ($options_ins['row']==$item_ins) ? 'selected="selected"' : '';
				echo "<option value='$item_ins' $selected_ins>$item_ins</option>";
			}
			echo "</select>";
 }
 
 function jwl_attribs_callback_function() {
 	echo '<input name="jwl_attribs_field_id" id="attribs" type="checkbox" value="1" class="two" ' . checked( 1, get_option('jwl_attribs_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/attribs.png" style="margin-left:10px;margin-bottom:-5px;" /><span style="margin-left:66px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/attrib.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><?php
			$options_attribs = get_option('jwl_attribs_dropdown');
			$items_attribs = array("Row 1", "Row 2", "Row 3", "Row 4");
			echo "<select id='row' style='width:80px;margin-left:27px;' name='jwl_attribs_dropdown[row]'>";
			foreach($items_attribs as $item_attribs) {
				$selected_attribs = ($options_attribs['row']==$item_attribs) ? 'selected="selected"' : '';
				echo "<option value='$item_attribs' $selected_attribs>$item_attribs</option>";
			}
			echo "</select>";
 }
 
 function jwl_styleprops_callback_function() {
 	echo '<input name="jwl_styleprops_field_id" id="styleprops" type="checkbox" value="1" class="two" ' . checked( 1, get_option('jwl_styleprops_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/styleprops.png" style="margin-left:10px;margin-bottom:-5px;" /><span style="margin-left:66px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/styleprops.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><?php
			$options_styleprops = get_option('jwl_styleprops_dropdown');
			$items_styleprops = array("Row 1", "Row 2", "Row 3", "Row 4");
			echo "<select id='row' style='width:80px;margin-left:27px;' name='jwl_styleprops_dropdown[row]'>";
			foreach($items_styleprops as $item_styleprops) {
				$selected_styleprops = ($options_styleprops['row']==$item_styleprops) ? 'selected="selected"' : '';
				echo "<option value='$item_styleprops' $selected_styleprops>$item_styleprops</option>";
			}
			echo "</select>";
 }
 
 function jwl_code_callback_function() {
 	echo '<input name="jwl_code_field_id" id="code" type="checkbox" value="1" class="two" ' . checked( 1, get_option('jwl_code_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/code.png" style="margin-left:10px;margin-bottom:-5px;" /><span style="margin-left:66px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/code.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><?php
			$options_code = get_option('jwl_code_dropdown');
			$items_code = array("Row 1", "Row 2", "Row 3", "Row 4");
			echo "<select id='row' style='width:80px;margin-left:27px;' name='jwl_code_dropdown[row]'>";
			foreach($items_code as $item_code) {
				$selected_code = ($options_code['row']==$item_code) ? 'selected="selected"' : '';
				echo "<option value='$item_code' $selected_code>$item_code</option>";
			}
			echo "</select>";
 }
 
 function jwl_codemagic_callback_function() {
 	echo '<input name="jwl_codemagic_field_id" id="codemagic" type="checkbox" value="1" class="two" ' . checked( 1, get_option('jwl_codemagic_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/codemagic.png" style="margin-left:10px;margin-bottom:-5px;" /><span style="margin-left:66px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/codemagic.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><?php
			$options_codemagic = get_option('jwl_codemagic_dropdown');
			$items_codemagic = array("Row 1", "Row 2", "Row 3", "Row 4");
			echo "<select id='row' style='width:80px;margin-left:27px;' name='jwl_codemagic_dropdown[row]'>";
			foreach($items_codemagic as $item_codemagic) {
				$selected_codemagic = ($options_codemagic['row']==$item_codemagic) ? 'selected="selected"' : '';
				echo "<option value='$item_codemagic' $selected_codemagic>$item_codemagic</option>";
			}
			echo "</select>";
 }
 
 function jwl_media_callback_function() {
 	echo '<input name="jwl_media_field_id" id="media" type="checkbox" value="1" class="two" ' . checked( 1, get_option('jwl_media_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/media.png" style="margin-left:10px;margin-bottom:-5px;" /><span style="margin-left:66px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/media.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><?php
			$options_media = get_option('jwl_media_dropdown');
			$items_media = array("Row 1", "Row 2", "Row 3", "Row 4");
			echo "<select id='row' style='width:80px;margin-left:27px;' name='jwl_media_dropdown[row]'>";
			foreach($items_media as $item_media) {
				$selected_media = ($options_media['row']==$item_media) ? 'selected="selected"' : '';
				echo "<option value='$item_media' $selected_media>$item_media</option>";
			}
			echo "</select>";
 }
 
 function jwl_youtube_callback_function() {
 	echo '<input name="jwl_youtube_field_id" id="youtube" type="checkbox" value="1" class="two" ' . checked( 1, get_option('jwl_youtube_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/youtube.png" style="margin-left:10px;margin-bottom:-5px;" /><span style="margin-left:66px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/youtube.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><?php
			$options_youtube = get_option('jwl_youtube_dropdown');
			$items_youtube = array("Row 1", "Row 2", "Row 3", "Row 4");
			echo "<select id='row' style='width:80px;margin-left:27px;' name='jwl_youtube_dropdown[row]'>";
			foreach($items_youtube as $item_youtube) {
				$selected_youtube = ($options_youtube['row']==$item_youtube) ? 'selected="selected"' : '';
				echo "<option value='$item_youtube' $selected_youtube>$item_youtube</option>";
			}
			echo "</select>";
 }
 
 function jwl_imgmap_callback_function() {
 	echo '<input name="jwl_imgmap_field_id" id="imgmap" type="checkbox" value="1" class="two" ' . checked( 1, get_option('jwl_imgmap_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/imgmap.png" style="margin-left:10px;margin-bottom:-5px;" /><span style="margin-left:66px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/imgmap.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><?php
			$options_imgmap = get_option('jwl_imgmap_dropdown');
			$items_imgmap = array("Row 1", "Row 2", "Row 3", "Row 4");
			echo "<select id='row' style='width:80px;margin-left:27px;' name='jwl_imgmap_dropdown[row]'>";
			foreach($items_imgmap as $item_imgmap) {
				$selected_imgmap = ($options_imgmap['row']==$item_imgmap) ? 'selected="selected"' : '';
				echo "<option value='$item_imgmap' $selected_imgmap>$item_imgmap</option>";
			}
			echo "</select>";
 }
 
 function jwl_visualchars_callback_function() {
 	echo '<input name="jwl_visualchars_field_id" id="visualchars" type="checkbox" value="1" class="two" ' . checked( 1, get_option('jwl_visualchars_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/visualchars.png" style="margin-left:10px;margin-bottom:-5px;" /><span style="margin-left:66px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/visualchars.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><?php
			$options_visualchars = get_option('jwl_visualchars_dropdown');
			$items_visualchars = array("Row 1", "Row 2", "Row 3", "Row 4");
			echo "<select id='row' style='width:80px;margin-left:27px;' name='jwl_visualchars_dropdown[row]'>";
			foreach($items_visualchars as $item_visualchars) {
				$selected_visualchars = ($options_visualchars['row']==$item_visualchars) ? 'selected="selected"' : '';
				echo "<option value='$item_visualchars' $selected_visualchars>$item_visualchars</option>";
			}
			echo "</select>";
 }
 
 function jwl_print_callback_function() {
 	echo '<input name="jwl_print_field_id" id="print" type="checkbox" value="1" class="two" ' . checked( 1, get_option('jwl_print_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/print.png" style="margin-left:10px;margin-bottom:-5px;" /><span style="margin-left:66px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/print.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><?php
			$options_print = get_option('jwl_print_dropdown');
			$items_print = array("Row 1", "Row 2", "Row 3", "Row 4");
			echo "<select id='row' style='width:80px;margin-left:27px;' name='jwl_print_dropdown[row]'>";
			foreach($items_print as $item_print) {
				$selected_print = ($options_print['row']==$item_print) ? 'selected="selected"' : '';
				echo "<option value='$item_print' $selected_print>$item_print</option>";
			}
			echo "</select>";
 }
 
 function jwl_shortcodes_callback_function() {
 	echo '<input name="jwl_shortcodes_field_id" id="shortcodes" type="checkbox" value="1" class="two" ' . checked( 1, get_option('jwl_shortcodes_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/shortcodes.png" style="margin-left:10px;margin-bottom:-5px;" /><span style="margin-left:10px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/shortcodes.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><?php
			$options_shortcodes = get_option('jwl_shortcodes_dropdown');
			$items_shortcodes = array("Row 1", "Row 2", "Row 3", "Row 4");
			echo "<select id='row' style='width:80px;margin-left:27px;' name='jwl_shortcodes_dropdown[row]'>";
			foreach($items_shortcodes as $item_shortcodes) {
				$selected_shortcodes = ($options_shortcodes['row']==$item_shortcodes) ? 'selected="selected"' : '';
				echo "<option value='$item_shortcodes' $selected_shortcodes>$item_shortcodes</option>";
			}
			echo "</select>";
 }
 
 // Callback functions for miscellaneous options and features
 // Function and Settings for Tinymce editor color changes
 
 function jwl_tinycolor_css_callback_function() {
	$options = get_option('jwl_tinycolor_css_field_id');
	$items = array("Default", "Pink", "Green", "Dark&Green", "Dark&Pink", "Rainbow", "Steel");
	echo "<select id='tinycolor' name='jwl_tinycolor_css_field_id[tinycolor]'>";
	foreach($items as $item) {
		$selected = ($options['tinycolor']==$item) ? 'selected="selected"' : '';
		echo "<option value='$item' $selected>$item</option>";
	}
	echo "</select>";
	?><span style="margin-left:10px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/tinycolor.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><?php
 }
 
 function change_mce_colors() {
   $options2 = get_option('jwl_tinycolor_css_field_id');
   $current_option = strtolower($options2['tinycolor']);
   $colorurl = plugin_dir_url( __FILE__ ) . 'css/change_mce_'.$current_option.'.css';  // Color Options
   wp_register_style('tiny_color_mce', $colorurl, '', 1.0, 'screen');
   wp_enqueue_style('tiny_color_mce');
 }
 add_action('admin_head', 'change_mce_colors');
 
 function jwl_tinymce_nextpage_callback_function() {
 	echo '<input name="jwl_tinymce_nextpage_field_id" id="tinymce_nextpage" type="checkbox" value="1" class="three" ' . checked( 1, get_option('jwl_tinymce_nextpage_field_id'), false ) . ' /> ';
	?><span style="margin-left:10px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/nextpage.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><?php
 }
 
 function jwl_tinymce_excerpt_callback_function() {
 	echo '<input name="jwl_tinymce_excerpt_field_id" id="tinymce_excerpt" type="checkbox" value="1" class="three" ' . checked( 1, get_option('jwl_tinymce_excerpt_field_id'), false ) . ' /> ';
	?><span style="margin-left:10px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/excerpt.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><?php
 }
 
 function jwl_postid_callback_function() {
 	echo '<input name="jwl_postid_field_id" id="postid" type="checkbox" value="1" class="three" ' . checked( 1, get_option('jwl_postid_field_id'), false ) . ' /> ';
	?><span style="margin-left:10px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/postid.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><?php
 }
 
 function jwl_shortcode_callback_function() {
 	echo '<input name="jwl_shortcode_field_id" id="shortcode" type="checkbox" value="1" class="three" ' . checked( 1, get_option('jwl_shortcode_field_id'), false ) . ' /> ';
	?><span style="margin-left:10px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/widgetshortcode.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><?php
 }
 
 function jwl_php_widget_callback_function() {
 	echo '<input name="jwl_php_widget_field_id" id="media" type="checkbox" value="1" class="three" ' . checked( 1, get_option('jwl_php_widget_field_id'), false ) . ' /> ';
	?><span style="margin-left:10px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/php.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><?php
 }
 
 function jwl_linebreak_callback_function() {
 	echo '<input name="jwl_linebreak_field_id" id="linebreak" type="checkbox" value="1" class="three" ' . checked( 1, get_option('jwl_linebreak_field_id'), false ) . ' /> ';
	?><span style="margin-left:10px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/linebreak.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><span style="padding-left:10px;"><?php _e('Simply use the <b>[break]</b> shortcode');
 }
 
 function jwl_columns_callback_function() {
 	echo '<input name="jwl_columns_field_id" id="columns" type="checkbox" value="1" class="three" ' . checked( 1, get_option('jwl_columns_field_id'), false ) . ' /> ';
	?><span style="margin-left:10px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/columns.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><span style="padding-left:10px;"><?php _e('Ex. <b>[one_half]</b>This is the left column.<b>[/one_half]</b> <b>[one_half_last]</b>This is the right column.<b>[/one_half_last]</b>');
 }
 
 function jwl_signoff_callback_function() {
 	echo '<textarea name="jwl_signoff_field_id" value=" rows="15" class="long-text" style="width:400px; height:100px;">';
	echo get_option('jwl_signoff_field_id');
	echo '</textarea>';
	?><span style="margin-left:10px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/signoff.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><?php
	_e('<br />Insert the above code using the <b>[signoff]</b> shortcode within your post.');
 }
 
 // Callback functions for Advanced TinyMCE Features
 function jwl_defaults_callback_function() {
 	echo '<input name="jwl_defaults_field_id" id="defaults" type="checkbox" value="1" class="four" ' . checked( 1, get_option('jwl_defaults_field_id'), false ) . ' /> ';
	?><img src="<?php echo plugin_dir_url( __FILE__ ) ?>advlink/advlink.png" style="margin-left:10px;margin-bottom:-5px;" /><span style="margin-left:10px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/advlink.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><?php
 }
 
 function jwl_custom_styles_callback_function() {
 	echo '<input name="jwl_custom_styles_field_id" id="custom_styles" type="checkbox" value="1" class="four" ' . checked( 1, get_option('jwl_custom_styles_field_id'), false ) . ' /> ';
	?><span style="margin-left:10px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/advstyles.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><?php
 }
 
 function jwl_div_callback_function() {
 	echo '<input name="jwl_div_field_id" id="div" type="checkbox" value="1" class="four" ' . checked( 1, get_option('jwl_div_field_id'), false ) . ' /> ';
	?><span style="margin-left:10px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/divclear.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><?php
 }
 
 function jwl_autop_callback_function() {
 	echo '<input name="jwl_autop_field_id" id="autop" type="checkbox" value="1" class="four" ' . checked( 1, get_option('jwl_autop_field_id'), false ) . ' /> ';
	?><span style="margin-left:10px;"><a href="javascript:popcontact('<?php echo plugin_dir_url( __FILE__ ) ?>js/popup-help/autop.php')"><img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/popup-help.png" style="margin-bottom:-5px;" title="Click for Help" /></a></span><span style="margin-left:15px;"><?php _e('(Disable wpautop) - <b>Read the help file first</b>.'); ?></span><?php 
 }
 

// Finally, our custom functions for how we want the options to work.
// Functions for Row 3
function tinymce_add_button_fontselect($buttons) { $jwl_fontselect = get_option('jwl_fontselect_field_id'); if ($jwl_fontselect == "1") $buttons[] = 'fontselect'; return $buttons; }
$jwl_fontselect_dropdown = get_option('jwl_fontselect_dropdown');
$jwl_fontselect_dropdown2 = $jwl_fontselect_dropdown['row'];
if ($jwl_fontselect_dropdown2 == 'Row 1') { add_filter("mce_buttons", "tinymce_add_button_fontselect"); } 
if ($jwl_fontselect_dropdown2 == 'Row 2') { add_filter("mce_buttons_2", "tinymce_add_button_fontselect"); } 
if ($jwl_fontselect_dropdown2 == 'Row 3') { add_filter("mce_buttons_3", "tinymce_add_button_fontselect"); }
if ($jwl_fontselect_dropdown2 == 'Row 4') { add_filter("mce_buttons_4", "tinymce_add_button_fontselect"); }

function tinymce_add_button_fontsizeselect($buttons) { $jwl_fontsizeselect = get_option('jwl_fontsizeselect_field_id'); if ($jwl_fontsizeselect == "1") $buttons[] = 'fontsizeselect'; return $buttons; } 
$jwl_fontsizeselect_dropdown = get_option('jwl_fontsizeselect_dropdown');
$jwl_fontsizeselect_dropdown2 = $jwl_fontsizeselect_dropdown['row'];
if ($jwl_fontsizeselect_dropdown2 == 'Row 1') { add_filter("mce_buttons", "tinymce_add_button_fontsizeselect"); } 
if ($jwl_fontsizeselect_dropdown2 == 'Row 2') { add_filter("mce_buttons_2", "tinymce_add_button_fontsizeselect"); } 
if ($jwl_fontsizeselect_dropdown2 == 'Row 3') { add_filter("mce_buttons_3", "tinymce_add_button_fontsizeselect"); }
if ($jwl_fontsizeselect_dropdown2 == 'Row 4') { add_filter("mce_buttons_4", "tinymce_add_button_fontsizeselect"); }

function tinymce_add_button_cut($buttons) { $jwl_cut = get_option('jwl_cut_field_id'); if ($jwl_cut == "1") $buttons[] = 'cut'; return $buttons; } 
$jwl_cut_dropdown = get_option('jwl_cut_dropdown');
$jwl_cut_dropdown2 = $jwl_cut_dropdown['row'];
if ($jwl_cut_dropdown2 == 'Row 1') { add_filter("mce_buttons", "tinymce_add_button_cut"); } 
if ($jwl_cut_dropdown2 == 'Row 2') { add_filter("mce_buttons_2", "tinymce_add_button_cut"); } 
if ($jwl_cut_dropdown2 == 'Row 3') { add_filter("mce_buttons_3", "tinymce_add_button_cut"); }
if ($jwl_cut_dropdown2 == 'Row 4') { add_filter("mce_buttons_4", "tinymce_add_button_cut"); }

function tinymce_add_button_copy($buttons) { $jwl_copy = get_option('jwl_copy_field_id'); if ($jwl_copy == "1") $buttons[] = 'copy'; return $buttons; } 
$jwl_copy_dropdown = get_option('jwl_copy_dropdown');
$jwl_copy_dropdown2 = $jwl_copy_dropdown['row'];
if ($jwl_copy_dropdown2 == 'Row 1') { add_filter("mce_buttons", "tinymce_add_button_copy"); } 
if ($jwl_copy_dropdown2 == 'Row 2') { add_filter("mce_buttons_2", "tinymce_add_button_copy"); } 
if ($jwl_copy_dropdown2 == 'Row 3') { add_filter("mce_buttons_3", "tinymce_add_button_copy"); }
if ($jwl_copy_dropdown2 == 'Row 4') { add_filter("mce_buttons_4", "tinymce_add_button_copy"); }

function tinymce_add_button_paste($buttons) { $jwl_paste = get_option('jwl_paste_field_id'); if ($jwl_paste == "1") $buttons[] = 'paste'; return $buttons; } 
$jwl_paste_dropdown = get_option('jwl_paste_dropdown');
$jwl_paste_dropdown2 = $jwl_paste_dropdown['row'];
if ($jwl_paste_dropdown2 == 'Row 1') { add_filter("mce_buttons", "tinymce_add_button_paste"); } 
if ($jwl_paste_dropdown2 == 'Row 2') { add_filter("mce_buttons_2", "tinymce_add_button_paste"); } 
if ($jwl_paste_dropdown2 == 'Row 3') { add_filter("mce_buttons_3", "tinymce_add_button_paste"); }
if ($jwl_paste_dropdown2 == 'Row 4') { add_filter("mce_buttons_4", "tinymce_add_button_paste"); }

function tinymce_add_button_backcolorpicker($buttons) { $jwl_backcolorpicker = get_option('jwl_backcolorpicker_field_id'); if ($jwl_backcolorpicker == "1") $buttons[] = 'backcolorpicker'; return $buttons; } 
$jwl_backcolorpicker_dropdown = get_option('jwl_backcolorpicker_dropdown');
$jwl_backcolorpicker_dropdown2 = $jwl_backcolorpicker_dropdown['row'];
if ($jwl_backcolorpicker_dropdown2 == 'Row 1') { add_filter("mce_buttons", "tinymce_add_button_backcolorpicker"); } 
if ($jwl_backcolorpicker_dropdown2 == 'Row 2') { add_filter("mce_buttons_2", "tinymce_add_button_backcolorpicker"); } 
if ($jwl_backcolorpicker_dropdown2 == 'Row 3') { add_filter("mce_buttons_3", "tinymce_add_button_backcolorpicker"); }
if ($jwl_backcolorpicker_dropdown2 == 'Row 4') { add_filter("mce_buttons_4", "tinymce_add_button_backcolorpicker"); }

function tinymce_add_button_forecolorpicker($buttons) { $jwl_forecolorpicker = get_option('jwl_forecolorpicker_field_id'); if ($jwl_forecolorpicker == "1") $buttons[] = 'forecolorpicker'; return $buttons; } 
$jwl_forecolorpicker_dropdown = get_option('jwl_forecolorpicker_dropdown');
$jwl_forecolorpicker_dropdown2 = $jwl_forecolorpicker_dropdown['row'];
if ($jwl_forecolorpicker_dropdown2 == 'Row 1') { add_filter("mce_buttons", "tinymce_add_button_forecolorpicker"); } 
if ($jwl_forecolorpicker_dropdown2 == 'Row 2') { add_filter("mce_buttons_2", "tinymce_add_button_forecolorpicker"); } 
if ($jwl_forecolorpicker_dropdown2 == 'Row 3') { add_filter("mce_buttons_3", "tinymce_add_button_forecolorpicker"); }
if ($jwl_forecolorpicker_dropdown2 == 'Row 4') { add_filter("mce_buttons_4", "tinymce_add_button_forecolorpicker"); }

function tinymce_add_button_advhr($buttons) { $jwl_advhr = get_option('jwl_advhr_field_id'); if ($jwl_advhr == "1") $buttons[] = 'advhr'; return $buttons; } 
$jwl_advhr_dropdown = get_option('jwl_advhr_dropdown');
$jwl_advhr_dropdown2 = $jwl_advhr_dropdown['row'];
if ($jwl_advhr_dropdown2 == 'Row 1') { add_filter("mce_buttons", "tinymce_add_button_advhr"); } 
if ($jwl_advhr_dropdown2 == 'Row 2') { add_filter("mce_buttons_2", "tinymce_add_button_advhr"); } 
if ($jwl_advhr_dropdown2 == 'Row 3') { add_filter("mce_buttons_3", "tinymce_add_button_advhr"); }
if ($jwl_advhr_dropdown2 == 'Row 4') { add_filter("mce_buttons_4", "tinymce_add_button_advhr"); }

function tinymce_add_button_visualaid($buttons) { $jwl_visualaid = get_option('jwl_visualaid_field_id'); if ($jwl_visualaid == "1")
$buttons[] = 'visualaid'; return $buttons; } 
$jwl_visualaid_dropdown = get_option('jwl_visualaid_dropdown');
$jwl_visualaid_dropdown2 = $jwl_visualaid_dropdown['row'];
if ($jwl_visualaid_dropdown2 == 'Row 1') { add_filter("mce_buttons", "tinymce_add_button_visualaid"); } 
if ($jwl_visualaid_dropdown2 == 'Row 2') { add_filter("mce_buttons_2", "tinymce_add_button_visualaid"); } 
if ($jwl_visualaid_dropdown2 == 'Row 3') { add_filter("mce_buttons_3", "tinymce_add_button_visualaid"); }
if ($jwl_visualaid_dropdown2 == 'Row 4') { add_filter("mce_buttons_4", "tinymce_add_button_visualaid"); }

function tinymce_add_button_anchor($buttons) { $jwl_anchor = get_option('jwl_anchor_field_id'); if ($jwl_anchor == "1")
$buttons[] = 'anchor'; return $buttons; } 
$jwl_anchor_dropdown = get_option('jwl_anchor_dropdown');
$jwl_anchor_dropdown2 = $jwl_anchor_dropdown['row'];
if ($jwl_anchor_dropdown2 == 'Row 1') { add_filter("mce_buttons", "tinymce_add_button_anchor"); } 
if ($jwl_anchor_dropdown2 == 'Row 2') { add_filter("mce_buttons_2", "tinymce_add_button_anchor"); } 
if ($jwl_anchor_dropdown2 == 'Row 3') { add_filter("mce_buttons_3", "tinymce_add_button_anchor"); }
if ($jwl_anchor_dropdown2 == 'Row 4') { add_filter("mce_buttons_4", "tinymce_add_button_anchor"); }

function tinymce_add_button_sub($buttons) { $jwl_sub = get_option('jwl_sub_field_id'); if ($jwl_sub == "1") $buttons[] = 'sub'; return $buttons; } 
$jwl_sub_dropdown = get_option('jwl_sub_dropdown');
$jwl_sub_dropdown2 = $jwl_sub_dropdown['row'];
if ($jwl_sub_dropdown2 == 'Row 1') { add_filter("mce_buttons", "tinymce_add_button_sub"); } 
if ($jwl_sub_dropdown2 == 'Row 2') { add_filter("mce_buttons_2", "tinymce_add_button_sub"); } 
if ($jwl_sub_dropdown2 == 'Row 3') { add_filter("mce_buttons_3", "tinymce_add_button_sub"); }
if ($jwl_sub_dropdown2 == 'Row 4') { add_filter("mce_buttons_4", "tinymce_add_button_sub"); }

function tinymce_add_button_sup($buttons) { $jwl_sup = get_option('jwl_sup_field_id'); if ($jwl_sup == "1") $buttons[] = 'sup'; return $buttons; } 
$jwl_sup_dropdown = get_option('jwl_sup_dropdown');
$jwl_sup_dropdown2 = $jwl_sup_dropdown['row'];
if ($jwl_sup_dropdown2 == 'Row 1') { add_filter("mce_buttons", "tinymce_add_button_sup"); } 
if ($jwl_sup_dropdown2 == 'Row 2') { add_filter("mce_buttons_2", "tinymce_add_button_sup"); } 
if ($jwl_sup_dropdown2 == 'Row 3') { add_filter("mce_buttons_3", "tinymce_add_button_sup"); }
if ($jwl_sup_dropdown2 == 'Row 4') { add_filter("mce_buttons_4", "tinymce_add_button_sup"); }

function tinymce_add_button_search($buttons) { $jwl_search = get_option('jwl_search_field_id'); if ($jwl_search == "1") $buttons[] = 'search'; return $buttons; } $jwl_search_dropdown = get_option('jwl_search_dropdown');
$jwl_search_dropdown2 = $jwl_search_dropdown['row'];
if ($jwl_search_dropdown2 == 'Row 1') { add_filter("mce_buttons", "tinymce_add_button_search"); } 
if ($jwl_search_dropdown2 == 'Row 2') { add_filter("mce_buttons_2", "tinymce_add_button_search"); } 
if ($jwl_search_dropdown2 == 'Row 3') { add_filter("mce_buttons_3", "tinymce_add_button_search"); }
if ($jwl_search_dropdown2 == 'Row 4') { add_filter("mce_buttons_4", "tinymce_add_button_search"); }

function tinymce_add_button_replace($buttons) { $jwl_replace = get_option('jwl_replace_field_id'); if ($jwl_replace == "1") $buttons[] = 'replace'; return $buttons; } $jwl_replace_dropdown = get_option('jwl_replace_dropdown');
$jwl_replace_dropdown2 = $jwl_replace_dropdown['row'];
if ($jwl_replace_dropdown2 == 'Row 1') { add_filter("mce_buttons", "tinymce_add_button_replace"); } 
if ($jwl_replace_dropdown2 == 'Row 2') { add_filter("mce_buttons_2", "tinymce_add_button_replace"); } 
if ($jwl_replace_dropdown2 == 'Row 3') { add_filter("mce_buttons_3", "tinymce_add_button_replace"); }
if ($jwl_replace_dropdown2 == 'Row 4') { add_filter("mce_buttons_4", "tinymce_add_button_replace"); }

function tinymce_add_button_datetime($buttons) { $jwl_datetime = get_option('jwl_datetime_field_id'); if ($jwl_datetime == "1") $buttons[] = 'insertdate,inserttime'; return $buttons; } 
$jwl_datetime_dropdown = get_option('jwl_datetime_dropdown');
$jwl_datetime_dropdown2 = $jwl_datetime_dropdown['row'];
if ($jwl_datetime_dropdown2 == 'Row 1') { add_filter("mce_buttons", "tinymce_add_button_datetime"); } 
if ($jwl_datetime_dropdown2 == 'Row 2') { add_filter("mce_buttons_2", "tinymce_add_button_datetime"); } 
if ($jwl_datetime_dropdown2 == 'Row 3') { add_filter("mce_buttons_3", "tinymce_add_button_datetime"); }
if ($jwl_datetime_dropdown2 == 'Row 4') { add_filter("mce_buttons_4", "tinymce_add_button_datetime"); }

// Functions for Row 4
function tinymce_add_button_styleselect($buttons) { $jwl_styleselect = get_option('jwl_styleselect_field_id'); if ($jwl_styleselect == "1") $buttons[] = 'styleselect'; return $buttons; } 
$jwl_styleselect_dropdown = get_option('jwl_styleselect_dropdown');
$jwl_styleselect_dropdown2 = $jwl_styleselect_dropdown['row'];
if ($jwl_styleselect_dropdown2 == 'Row 1') { add_filter("mce_buttons", "tinymce_add_button_styleselect"); } 
if ($jwl_styleselect_dropdown2 == 'Row 2') { add_filter("mce_buttons_2", "tinymce_add_button_styleselect"); } 
if ($jwl_styleselect_dropdown2 == 'Row 3') { add_filter("mce_buttons_3", "tinymce_add_button_styleselect"); }
if ($jwl_styleselect_dropdown2 == 'Row 4') { add_filter("mce_buttons_4", "tinymce_add_button_styleselect"); }

function tinymce_add_button_tableDropdown($buttons) { $jwl_tableDropdown = get_option('jwl_tableDropdown_field_id'); if ($jwl_tableDropdown == "1") $buttons[] = 'tableDropdown'; return $buttons; } 
$jwl_tableDropdown_dropdown = get_option('jwl_tableDropdown_dropdown');
$jwl_tableDropdown_dropdown2 = $jwl_tableDropdown_dropdown['row'];
if ($jwl_tableDropdown_dropdown2 == 'Row 1') { add_filter("mce_buttons", "tinymce_add_button_tableDropdown"); } 
if ($jwl_tableDropdown_dropdown2 == 'Row 2') { add_filter("mce_buttons_2", "tinymce_add_button_tableDropdown"); } 
if ($jwl_tableDropdown_dropdown2 == 'Row 3') { add_filter("mce_buttons_3", "tinymce_add_button_tableDropdown"); }
if ($jwl_tableDropdown_dropdown2 == 'Row 4') { add_filter("mce_buttons_4", "tinymce_add_button_tableDropdown"); }

function tinymce_add_button_emotions($buttons) { $jwl_emotions = get_option('jwl_emotions_field_id'); if ($jwl_emotions == "1") $buttons[] = 'emotions'; return $buttons; } 
$jwl_emotions_dropdown = get_option('jwl_emotions_dropdown');
$jwl_emotions_dropdown2 = $jwl_emotions_dropdown['row'];
if ($jwl_emotions_dropdown2 == 'Row 1') { add_filter("mce_buttons", "tinymce_add_button_emotions"); } 
if ($jwl_emotions_dropdown2 == 'Row 2') { add_filter("mce_buttons_2", "tinymce_add_button_emotions"); } 
if ($jwl_emotions_dropdown2 == 'Row 3') { add_filter("mce_buttons_3", "tinymce_add_button_emotions"); }
if ($jwl_emotions_dropdown2 == 'Row 4') { add_filter("mce_buttons_4", "tinymce_add_button_emotions"); }

function tinymce_add_button_image($buttons) { $jwl_image = get_option('jwl_image_field_id'); if ($jwl_image == "1") $buttons[] = 'image'; return $buttons; } 
$jwl_image_dropdown = get_option('jwl_image_dropdown');
$jwl_image_dropdown2 = $jwl_image_dropdown['row'];
if ($jwl_image_dropdown2 == 'Row 1') { add_filter("mce_buttons", "tinymce_add_button_image"); } 
if ($jwl_image_dropdown2 == 'Row 2') { add_filter("mce_buttons_2", "tinymce_add_button_image"); } 
if ($jwl_image_dropdown2 == 'Row 3') { add_filter("mce_buttons_3", "tinymce_add_button_image"); }
if ($jwl_image_dropdown2 == 'Row 4') { add_filter("mce_buttons_4", "tinymce_add_button_image"); }

function tinymce_add_button_preview($buttons) { $jwl_preview = get_option('jwl_preview_field_id'); if ($jwl_preview == "1") $buttons[] = 'preview'; return $buttons; }
$jwl_preview_dropdown = get_option('jwl_preview_dropdown');
$jwl_preview_dropdown2 = $jwl_preview_dropdown['row'];
if ($jwl_preview_dropdown2 == 'Row 1') { add_filter("mce_buttons", "tinymce_add_button_preview"); } 
if ($jwl_preview_dropdown2 == 'Row 2') { add_filter("mce_buttons_2", "tinymce_add_button_preview"); } 
if ($jwl_preview_dropdown2 == 'Row 3') { add_filter("mce_buttons_3", "tinymce_add_button_preview"); }
if ($jwl_preview_dropdown2 == 'Row 4') { add_filter("mce_buttons_4", "tinymce_add_button_preview"); }

function tinymce_add_button_cite($buttons) { $jwl_cite = get_option('jwl_cite_field_id'); if ($jwl_cite == "1") $buttons[] = 'cite'; return $buttons; } 
$jwl_cite_dropdown = get_option('jwl_cite_dropdown');
$jwl_cite_dropdown2 = $jwl_cite_dropdown['row'];
if ($jwl_cite_dropdown2 == 'Row 1') { add_filter("mce_buttons", "tinymce_add_button_cite"); } 
if ($jwl_cite_dropdown2 == 'Row 2') { add_filter("mce_buttons_2", "tinymce_add_button_cite"); } 
if ($jwl_cite_dropdown2 == 'Row 3') { add_filter("mce_buttons_3", "tinymce_add_button_cite"); }
if ($jwl_cite_dropdown2 == 'Row 4') { add_filter("mce_buttons_4", "tinymce_add_button_cite"); }

function tinymce_add_button_abbr($buttons) { $jwl_abbr = get_option('jwl_abbr_field_id'); if ($jwl_abbr == "1") $buttons[] = 'abbr'; return $buttons; } 
$jwl_abbr_dropdown = get_option('jwl_abbr_dropdown');
$jwl_abbr_dropdown2 = $jwl_abbr_dropdown['row'];
if ($jwl_abbr_dropdown2 == 'Row 1') { add_filter("mce_buttons", "tinymce_add_button_abbr"); } 
if ($jwl_abbr_dropdown2 == 'Row 2') { add_filter("mce_buttons_2", "tinymce_add_button_abbr"); } 
if ($jwl_abbr_dropdown2 == 'Row 3') { add_filter("mce_buttons_3", "tinymce_add_button_abbr"); }
if ($jwl_abbr_dropdown2 == 'Row 4') { add_filter("mce_buttons_4", "tinymce_add_button_abbr"); }

function tinymce_add_button_acronym($buttons) { $jwl_acronym = get_option('jwl_acronym_field_id'); if ($jwl_acronym == "1") $buttons[] = 'acronym'; return $buttons; }
$jwl_acronym_dropdown = get_option('jwl_acronym_dropdown');
$jwl_acronym_dropdown2 = $jwl_acronym_dropdown['row'];
if ($jwl_acronym_dropdown2 == 'Row 1') { add_filter("mce_buttons", "tinymce_add_button_acronym"); } 
if ($jwl_acronym_dropdown2 == 'Row 2') { add_filter("mce_buttons_2", "tinymce_add_button_acronym"); } 
if ($jwl_acronym_dropdown2 == 'Row 3') { add_filter("mce_buttons_3", "tinymce_add_button_acronym"); }
if ($jwl_acronym_dropdown2 == 'Row 4') { add_filter("mce_buttons_4", "tinymce_add_button_acronym"); }

function tinymce_add_button_del($buttons) { $jwl_del = get_option('jwl_del_field_id'); if ($jwl_del == "1") $buttons[] = 'del'; return $buttons; }
$jwl_del_dropdown = get_option('jwl_del_dropdown');
$jwl_del_dropdown2 = $jwl_del_dropdown['row'];
if ($jwl_del_dropdown2 == 'Row 1') { add_filter("mce_buttons", "tinymce_add_button_del"); } 
if ($jwl_del_dropdown2 == 'Row 2') { add_filter("mce_buttons_2", "tinymce_add_button_del"); } 
if ($jwl_del_dropdown2 == 'Row 3') { add_filter("mce_buttons_3", "tinymce_add_button_del"); }
if ($jwl_del_dropdown2 == 'Row 4') { add_filter("mce_buttons_4", "tinymce_add_button_del"); }

function tinymce_add_button_ins($buttons) { $jwl_ins = get_option('jwl_ins_field_id'); if ($jwl_ins == "1") $buttons[] = 'ins'; return $buttons; } 
$jwl_ins_dropdown = get_option('jwl_ins_dropdown');
$jwl_ins_dropdown2 = $jwl_ins_dropdown['row'];
if ($jwl_ins_dropdown2 == 'Row 1') { add_filter("mce_buttons", "tinymce_add_button_ins"); } 
if ($jwl_ins_dropdown2 == 'Row 2') { add_filter("mce_buttons_2", "tinymce_add_button_ins"); } 
if ($jwl_ins_dropdown2 == 'Row 3') { add_filter("mce_buttons_3", "tinymce_add_button_ins"); }
if ($jwl_ins_dropdown2 == 'Row 4') { add_filter("mce_buttons_4", "tinymce_add_button_ins"); }

function tinymce_add_button_attribs($buttons) { $jwl_attribs = get_option('jwl_attribs_field_id'); if ($jwl_attribs == "1") $buttons[] = 'attribs'; return $buttons; }
$jwl_attribs_dropdown = get_option('jwl_attribs_dropdown');
$jwl_attribs_dropdown2 = $jwl_attribs_dropdown['row'];
if ($jwl_attribs_dropdown2 == 'Row 1') { add_filter("mce_buttons", "tinymce_add_button_attribs"); } 
if ($jwl_attribs_dropdown2 == 'Row 2') { add_filter("mce_buttons_2", "tinymce_add_button_attribs"); } 
if ($jwl_attribs_dropdown2 == 'Row 3') { add_filter("mce_buttons_3", "tinymce_add_button_attribs"); }
if ($jwl_attribs_dropdown2 == 'Row 4') { add_filter("mce_buttons_4", "tinymce_add_button_attribs"); }

function tinymce_add_button_styleprops($buttons) { $jwl_styleprops = get_option('jwl_styleprops_field_id'); if ($jwl_styleprops == "1") $buttons[] = 'styleprops'; return $buttons; } 
$jwl_styleprops_dropdown = get_option('jwl_styleprops_dropdown');
$jwl_styleprops_dropdown2 = $jwl_styleprops_dropdown['row'];
if ($jwl_styleprops_dropdown2 == 'Row 1') { add_filter("mce_buttons", "tinymce_add_button_styleprops"); } 
if ($jwl_styleprops_dropdown2 == 'Row 2') { add_filter("mce_buttons_2", "tinymce_add_button_styleprops"); } 
if ($jwl_styleprops_dropdown2 == 'Row 3') { add_filter("mce_buttons_3", "tinymce_add_button_styleprops"); }
if ($jwl_styleprops_dropdown2 == 'Row 4') { add_filter("mce_buttons_4", "tinymce_add_button_styleprops"); }

function tinymce_add_button_code($buttons) { $jwl_code = get_option('jwl_code_field_id'); if ($jwl_code == "1") $buttons[] = 'code'; return $buttons; } 
$jwl_code_dropdown = get_option('jwl_code_dropdown');
$jwl_code_dropdown2 = $jwl_code_dropdown['row'];
if ($jwl_code_dropdown2 == 'Row 1') { add_filter("mce_buttons", "tinymce_add_button_code"); } 
if ($jwl_code_dropdown2 == 'Row 2') { add_filter("mce_buttons_2", "tinymce_add_button_code"); } 
if ($jwl_code_dropdown2 == 'Row 3') { add_filter("mce_buttons_3", "tinymce_add_button_code"); }
if ($jwl_code_dropdown2 == 'Row 4') { add_filter("mce_buttons_4", "tinymce_add_button_code"); }

function tinymce_add_button_codemagic($buttons) { $jwl_codemagic = get_option('jwl_codemagic_field_id'); if ($jwl_codemagic == "1") $buttons[] = 'codemagic'; return $buttons; } 
$jwl_codemagic_dropdown = get_option('jwl_codemagic_dropdown');
$jwl_codemagic_dropdown2 = $jwl_codemagic_dropdown['row'];
if ($jwl_codemagic_dropdown2 == 'Row 1') { add_filter("mce_buttons", "tinymce_add_button_codemagic"); } 
if ($jwl_codemagic_dropdown2 == 'Row 2') { add_filter("mce_buttons_2", "tinymce_add_button_codemagic"); } 
if ($jwl_codemagic_dropdown2 == 'Row 3') { add_filter("mce_buttons_3", "tinymce_add_button_codemagic"); }
if ($jwl_codemagic_dropdown2 == 'Row 4') { add_filter("mce_buttons_4", "tinymce_add_button_codemagic"); }

function tinymce_add_button_media($buttons) { $jwl_media = get_option('jwl_media_field_id'); if ($jwl_media == "1") $buttons[] = 'media'; return $buttons; } 
$jwl_media_dropdown = get_option('jwl_media_dropdown');
$jwl_media_dropdown2 = $jwl_media_dropdown['row'];
if ($jwl_media_dropdown2 == 'Row 1') { add_filter("mce_buttons", "tinymce_add_button_media"); } 
if ($jwl_media_dropdown2 == 'Row 2') { add_filter("mce_buttons_2", "tinymce_add_button_media"); } 
if ($jwl_media_dropdown2 == 'Row 3') { add_filter("mce_buttons_3", "tinymce_add_button_media"); }
if ($jwl_media_dropdown2 == 'Row 4') { add_filter("mce_buttons_4", "tinymce_add_button_media"); }

function tinymce_add_button_youtube($buttons) { $jwl_youtube = get_option('jwl_youtube_field_id'); if ($jwl_youtube == "1") $buttons[] = 'youtube'; return $buttons; }
$jwl_youtube_dropdown = get_option('jwl_youtube_dropdown');
$jwl_youtube_dropdown2 = $jwl_youtube_dropdown['row'];
if ($jwl_youtube_dropdown2 == 'Row 1') { add_filter("mce_buttons", "tinymce_add_button_youtube"); } 
if ($jwl_youtube_dropdown2 == 'Row 2') { add_filter("mce_buttons_2", "tinymce_add_button_youtube"); } 
if ($jwl_youtube_dropdown2 == 'Row 3') { add_filter("mce_buttons_3", "tinymce_add_button_youtube"); }
if ($jwl_youtube_dropdown2 == 'Row 4') { add_filter("mce_buttons_4", "tinymce_add_button_youtube"); }

function tinymce_add_button_imgmap($buttons) { $jwl_imgmap = get_option('jwl_imgmap_field_id'); if ($jwl_imgmap == "1") $buttons[] = 'imgmap'; return $buttons; }
$jwl_imgmap_dropdown = get_option('jwl_imgmap_dropdown');
$jwl_imgmap_dropdown2 = $jwl_imgmap_dropdown['row'];
if ($jwl_imgmap_dropdown2 == 'Row 1') { add_filter("mce_buttons", "tinymce_add_button_imgmap"); } 
if ($jwl_imgmap_dropdown2 == 'Row 2') { add_filter("mce_buttons_2", "tinymce_add_button_imgmap"); } 
if ($jwl_imgmap_dropdown2 == 'Row 3') { add_filter("mce_buttons_3", "tinymce_add_button_imgmap"); }
if ($jwl_imgmap_dropdown2 == 'Row 4') { add_filter("mce_buttons_4", "tinymce_add_button_imgmap"); }

function tinymce_add_button_visualchars($buttons) { $jwl_visualchars = get_option('jwl_visualchars_field_id'); if ($jwl_visualchars == "1") $buttons[] = 'visualchars'; return $buttons; } 
$jwl_visualchars_dropdown = get_option('jwl_visualchars_dropdown');
$jwl_visualchars_dropdown2 = $jwl_visualchars_dropdown['row'];
if ($jwl_visualchars_dropdown2 == 'Row 1') { add_filter("mce_buttons", "tinymce_add_button_visualchars"); } 
if ($jwl_visualchars_dropdown2 == 'Row 2') { add_filter("mce_buttons_2", "tinymce_add_button_visualchars"); } 
if ($jwl_visualchars_dropdown2 == 'Row 3') { add_filter("mce_buttons_3", "tinymce_add_button_visualchars"); }
if ($jwl_visualchars_dropdown2 == 'Row 4') { add_filter("mce_buttons_4", "tinymce_add_button_visualchars"); }

function tinymce_add_button_print($buttons) { $jwl_print = get_option('jwl_print_field_id'); if ($jwl_print == "1") $buttons[] = 'print'; return $buttons; } 
$jwl_print_dropdown = get_option('jwl_print_dropdown');
$jwl_print_dropdown2 = $jwl_print_dropdown['row'];
if ($jwl_print_dropdown2 == 'Row 1') { add_filter("mce_buttons", "tinymce_add_button_print"); } 
if ($jwl_print_dropdown2 == 'Row 2') { add_filter("mce_buttons_2", "tinymce_add_button_print"); } 
if ($jwl_print_dropdown2 == 'Row 3') { add_filter("mce_buttons_3", "tinymce_add_button_print"); }
if ($jwl_print_dropdown2 == 'Row 4') { add_filter("mce_buttons_4", "tinymce_add_button_print"); }

// Add the plugin array for extra features
function jwl_mce_external_plugins( $jwl_plugin_array ) {
		$jwl_plugin_array['table'] = plugin_dir_url( __FILE__ ) . 'table/editor_plugin.js';
		$jwl_plugin_array['emotions'] = plugin_dir_url(__FILE__) . 'emotions/editor_plugin.js';
		$jwl_plugin_array['advlist'] = plugin_dir_url(__FILE__) . 'advlist/editor_plugin.js';
		$jwl_plugin_array['advimage'] = plugin_dir_url(__FILE__) . 'advimage/editor_plugin.js';
		$jwl_plugin_array['searchreplace'] = plugin_dir_url(__FILE__) . 'searchreplace/editor_plugin.js';
		$jwl_plugin_array['preview'] = plugin_dir_url(__FILE__) . 'preview/editor_plugin.js';
		$jwl_plugin_array['xhtmlxtras'] = plugin_dir_url(__FILE__) . 'xhtmlxtras/editor_plugin.js';
		$jwl_plugin_array['style'] = plugin_dir_url(__FILE__) . 'style/editor_plugin.js';
		$jwl_plugin_array['media'] = plugin_dir_url(__FILE__) . 'media/editor_plugin.js';
		$jwl_plugin_array['advhr'] = plugin_dir_url(__FILE__) . 'advhr/editor_plugin.js';
		$jwl_plugin_array['clear'] = plugin_dir_url( __FILE__ ) . 'clear/editor_plugin.js';
		$jwl_plugin_array['tableDropdown'] = plugin_dir_url( __FILE__ ) . 'tableDropdown/editor_plugin.js';
		$jwl_plugin_array['codemagic'] = plugin_dir_url( __FILE__ ) . 'codemagic/editor_plugin.js';
		$jwl_plugin_array['youtube'] = plugin_dir_url( __FILE__ ) . 'youtube/editor_plugin.js';
		$jwl_plugin_array['imgmap'] = plugin_dir_url( __FILE__ ) . 'imgmap/editor_plugin.js';
		$jwl_plugin_array['visualchars'] = plugin_dir_url( __FILE__ ) . 'visualchars/editor_plugin.js';
		$jwl_plugin_array['print'] = plugin_dir_url( __FILE__ ) . 'print/editor_plugin.js';
		$jwl_plugin_array['insertdatetime'] = plugin_dir_url( __FILE__ ) . 'insertdatetime/editor_plugin.js';
		   
		return $jwl_plugin_array;
}
add_filter( 'mce_external_plugins', 'jwl_mce_external_plugins' );

// Functions for Advanced TinyMCE Features
// Add button and array for advanced insert/edit link button.
$jwl_defaults = get_option('jwl_defaults_field_id');
if ($jwl_defaults == "1") {
	function disable_advanced_link_array( $plugin_array ) {
		$plugin_array['advlink'] = plugin_dir_url(__FILE__) . 'advlink/editor_plugin.js';
		return $plugin_array;
	}
	add_filter( 'mce_external_plugins', 'disable_advanced_link_array' );
	
	function jwl_advlink_button($mce_buttons2) {
    	$pos = array_search('unlink',$mce_buttons2,true);
    	if ($pos !== false) {
       	 $tmp_buttons2 = array_slice($mce_buttons2, 0, $pos+1);
       	 $tmp_buttons2[] = 'advlink';
       	 $mce_buttons2 = array_merge($tmp_buttons2, array_slice($mce_buttons2, $pos+1));
    	}
    	return $mce_buttons2;
	}
	add_filter('mce_buttons','jwl_advlink_button');
}


// User option for Adding in custom styles if selected.
$jwl_custom_styles = get_option('jwl_custom_styles_field_id');
if ($jwl_custom_styles == "1") {
		function josh_mce_before_init( $settings ) {
    	$style_formats = array(
        array( 'title' => __('Bold Red Text','jwl-ultimate-tinymce'), 'inline' => 'span', 'styles' => array( 'color' => '#FF0000', 'fontWeight' => 'bold' )),
		array( 'title' => __('Bold Green Text','jwl-ultimate-tinymce'), 'inline' => 'span', 'styles' => array( 'color' => '#00FF00', 'fontWeight' => 'bold' )),
		array( 'title' => __('Bold Blue Text','jwl-ultimate-tinymce'), 'inline' => 'span', 'styles' => array( 'color' => '#0000FF', 'fontWeight' => 'bold' )),
		array( 'title' => __('Italic Red Text','jwl-ultimate-tinymce'), 'inline' => 'span', 'styles' => array( 'color' => '#FF0000', 'font-style' => 'italic' )),
		array( 'title' => __('Italic Green Text','jwl-ultimate-tinymce'), 'inline' => 'span', 'styles' => array( 'color' => '#00FF00', 'font-style' => 'italic' )),
		array( 'title' => __('Italic Blue Text','jwl-ultimate-tinymce'), 'inline' => 'span', 'styles' => array( 'color' => '#0000FF', 'font-style' => 'italic' )),
		array( 'title' => __('Borders','jwl-ultimate-tinymce')),
		array( 'title' => __('Border Black','jwl-ultimate-tinymce'), 'inline' => 'span', 'styles' => array( 'border' => '1px solid #000000', 'padding' => '2px' )),
		array( 'title' => __('Border Red','jwl-ultimate-tinymce'), 'inline' => 'span', 'styles' => array( 'border' => '1px solid #FF0000', 'padding' => '2px' )),
		array( 'title' => __('Border Green','jwl-ultimate-tinymce'), 'inline' => 'span', 'styles' => array( 'border' => '1px solid #00FF00', 'padding' => '2px' )),
		array( 'title' => __('Border Blue','jwl-ultimate-tinymce'), 'inline' => 'span', 'styles' => array( 'border' => '1px solid #0000FF', 'padding' => '2px' )),
		array( 'title' => __('Float','jwl-ultimate-tinymce')),
		array( 'title' => __('Float Left','jwl-ultimate-tinymce'), 'block' => 'span', 'styles' => array( 'float' => 'left' )),
		array( 'title' => __('Float Right','jwl-ultimate-tinymce'), 'block' => 'span', 'styles' => array( 'float' => 'right' )),
		array( 'title' => __('Alerts','jwl-ultimate-tinymce')),
		array( 'title' => __('Normal Alert','jwl-ultimate-tinymce'), 'block' => 'div', 'styles' => array( 'border' => 'solid 1px #DEDEDE', 'background' => '#EFEFEF url('.plugin_dir_url( __FILE__ ).'img/normal.png) 8px 4px no-repeat', 'background-repeat' => 'no-repeat', 'color' => '#222222' , 'padding' => '4px 4px 4px 30px' , 'text-align' => 'left'  )),
		array( 'title' => __('Green Alert','jwl-ultimate-tinymce'), 'block' => 'div', 'styles' => array( 'border' => 'solid 1px #1EDB0D', 'background' => '#A9FCA2 url('.plugin_dir_url( __FILE__ ).'img/green.png) 8px 4px no-repeat', 'background-repeat' => 'no-repeat', 'color' => '#222222' , 'padding' => '4px 4px 4px 30px' , 'text-align' => 'left'  )),
		array( 'title' => __('Yellow Alert','jwl-ultimate-tinymce'), 'block' => 'div', 'styles' => array( 'border' => 'solid 1px #F5F531', 'background' => '#FAFAB9 url('.plugin_dir_url( __FILE__ ).'img/yellow.png) 8px 4px no-repeat', 'background-repeat' => 'no-repeat', 'color' => '#222222' , 'padding' => '4px 4px 4px 30px' , 'text-align' => 'left'  )),
		array( 'title' => __('Red Alert','jwl-ultimate-tinymce'), 'block' => 'div', 'styles' => array( 'border' => 'solid 1px #ED220C', 'background' => '#FABDB6 url('.plugin_dir_url( __FILE__ ).'img/red.png) 8px 4px no-repeat', 'background-repeat' => 'no-repeat', 'color' => '#222222' , 'padding' => '4px 4px 4px 30px' , 'text-align' => 'left'  ))
   	    );

    	$settings['style_formats'] = json_encode( $style_formats );
    	return $settings;
		}
		add_filter( 'tiny_mce_before_init', 'josh_mce_before_init' );
}

// User option for adding the clear div buttons in the visual editor
function tinymce_add_button_div($buttons) {
$jwl_div = get_option('jwl_div_field_id');
if ($jwl_div == "1")
array_push($buttons, "separator", "clearleft","clearright","clearboth");
   return $buttons;
}
add_filter('mce_buttons', 'tinymce_add_button_div');

// Function to remove wpautop
$jwl_autop = get_option('jwl_autop_field_id');
if ($jwl_autop == "1"){
	remove_filter ('the_content', 'wpautop');
}

// Functions for miscellaneous options and features
// Function for NextPage Feature
$jwl_tinymce_nextpage = get_option('jwl_tinymce_nextpage_field_id');
if ($jwl_tinymce_nextpage == "1"){
    add_filter('mce_buttons','jwl_nextpage_button');
    function jwl_nextpage_button($mce_buttons) {
    $pos = array_search('wp_more',$mce_buttons,true);
    if ($pos !== false) {
        $tmp_buttons = array_slice($mce_buttons, 0, $pos+1);
        $tmp_buttons[] = 'wp_page';
        $mce_buttons = array_merge($tmp_buttons, array_slice($mce_buttons, $pos+1));
    }
    return $mce_buttons;
    }
}


// Function for excerpt editor
$jwl_tinymce_excerpt = get_option('jwl_tinymce_excerpt_field_id');
if ($jwl_tinymce_excerpt == "1"){

	function jwl_tinymce_excerpt_js(){ ?>
		<script type="text/javascript">
            jQuery(document).ready( tinymce_excerpt );
                    function tinymce_excerpt() {
                jQuery("#excerpt").addClass("mceEditor");
                tinyMCE.execCommand("mceAddControl", false, "excerpt");
                }
        </script>
    <?php }
    add_action( 'admin_head-post.php', 'jwl_tinymce_excerpt_js');
    add_action( 'admin_head-post-new.php', 'jwl_tinymce_excerpt_js');
	
    function jwl_tinymce_css(){ ?>
		<style type='text/css'>
                #postexcerpt .inside{margin:0;padding:0;background:#fff;}
                #postexcerpt .inside p{padding:0px 0px 5px 10px;}
                #postexcerpt #excerpteditorcontainer { border-style: solid; padding: 0; }
        </style>
    <?php }
    add_action( 'admin_head-post.php', 'jwl_tinymce_css');
    add_action( 'admin_head-post-new.php', 'jwl_tinymce_css');
	
}


// Function to show post/page id in admin column area
$jwl_postid = get_option('jwl_postid_field_id');
if ($jwl_postid == "1"){
   		function jwl_posts_columns_id($defaults){
			$defaults['wps_post_id'] = __('ID');
			return $defaults;
		}
		add_filter('manage_posts_columns', 'jwl_posts_columns_id', 5);
		add_filter('manage_pages_columns', 'jwl_posts_columns_id', 5);
		function jwl_posts_custom_id_columns($column_name, $id){
			if($column_name === 'wps_post_id'){
					echo $id;
			}
		}
		add_action('manage_posts_custom_column', 'jwl_posts_custom_id_columns', 5, 2);
    	add_action('manage_pages_custom_column', 'jwl_posts_custom_id_columns', 5, 2);
}

// Function to show shortcodes in widget area
$jwl_shortcode = get_option('jwl_shortcode_field_id');
if ($jwl_shortcode == "1"){
   	add_filter( 'widget_text', 'shortcode_unautop');
	add_filter( 'widget_text', 'do_shortcode');
}

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
}

// Enable the linebreak shortcode
$jwl_linebreak = get_option('jwl_linebreak_field_id');
if ($jwl_linebreak == "1"){
	//[break]
	function jwl_insert_linebreak( $atts ){
 		return '<br clear="none" />';
	}
	add_shortcode( 'break', 'jwl_insert_linebreak' );
}

// User option for adding a signoff shortcode for tinymce visual editor (Goes with custom message box below)
function jwl_sign_off_text() {  
	$jwl_signoff = get_option('jwl_signoff_field_id');
    return $jwl_signoff;  
} 
add_shortcode('signoff', 'jwl_sign_off_text');

// Add column shortcodes for tinymce editor
$jwl_columns = get_option('jwl_columns_field_id');
if ($jwl_columns == "1"){
	
	function jwl_one_third( $atts, $content = null ) { return '<div class="one_third">' . do_shortcode($content) . '</div>'; }
	add_shortcode('one_third', 'jwl_one_third');
	function jwl_one_third_last( $atts, $content = null ) { return '<div class="one_third last">' . do_shortcode($content) . '</div><div class="clearboth"></div>'; }
	add_shortcode('one_third_last', 'jwl_one_third_last');
	function jwl_two_third( $atts, $content = null ) { return '<div class="two_third">' . do_shortcode($content) . '</div>'; }
	add_shortcode('two_third', 'jwl_two_third');
	function jwl_two_third_last( $atts, $content = null ) { return '<div class="two_third last">' . do_shortcode($content) . '</div><div class="clearboth"></div>'; }
	add_shortcode('two_third_last', 'jwl_two_third_last');
	function jwl_one_half( $atts, $content = null ) { return '<div class="one_half">' . do_shortcode($content) . '</div>'; }
	add_shortcode('one_half', 'jwl_one_half');
	function jwl_one_half_last( $atts, $content = null ) { return '<div class="one_half last">' . do_shortcode($content) . '</div><div class="clearboth"></div>'; }
	add_shortcode('one_half_last', 'jwl_one_half_last');
	function jwl_one_fourth( $atts, $content = null ) { return '<div class="one_fourth">' . do_shortcode($content) . '</div>'; }
	add_shortcode('one_fourth', 'jwl_one_fourth');
	function jwl_one_fourth_last( $atts, $content = null ) { return '<div class="one_fourth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>'; }
	add_shortcode('one_fourth_last', 'jwl_one_fourth_last');
	function jwl_three_fourth( $atts, $content = null ) { return '<div class="three_fourth">' . do_shortcode($content) . '</div>'; }
	add_shortcode('three_fourth', 'jwl_three_fourth');
	function jwl_three_fourth_last( $atts, $content = null ) { return '<div class="three_fourth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>'; }
	add_shortcode('three_fourth_last', 'jwl_three_fourth_last');
	function jwl_one_fifth( $atts, $content = null ) { return '<div class="one_fifth">' . do_shortcode($content) . '</div>'; }
	add_shortcode('one_fifth', 'jwl_one_fifth');
	function jwl_one_fifth_last( $atts, $content = null ) { return '<div class="one_fifth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>'; }
	add_shortcode('one_fifth_last', 'jwl_one_fifth_last');
	function jwl_two_fifth( $atts, $content = null ) { return '<div class="two_fifth">' . do_shortcode($content) . '</div>'; }
	add_shortcode('two_fifth', 'jwl_two_fifth');
	function jwl_two_fifth_last( $atts, $content = null ) { return '<div class="two_fifth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>'; }
	add_shortcode('two_fifth_last', 'jwl_two_fifth_last');
	function jwl_three_fifth( $atts, $content = null ) { return '<div class="three_fifth">' . do_shortcode($content) . '</div>'; }
	add_shortcode('three_fifth', 'jwl_three_fifth');
	function jwl_three_fifth_last( $atts, $content = null ) { return '<div class="three_fifth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>'; }
	add_shortcode('three_fifth_last', 'jwl_three_fifth_last');
	function jwl_four_fifth( $atts, $content = null ) { return '<div class="four_fifth">' . do_shortcode($content) . '</div>'; }
	add_shortcode('four_fifth', 'jwl_four_fifth');
	function jwl_four_fifth_last( $atts, $content = null ) { return '<div class="four_fifth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>'; }
	add_shortcode('four_fifth_last', 'jwl_four_fifth_last');
	function jwl_one_sixth( $atts, $content = null ) { return '<div class="one_sixth">' . do_shortcode($content) . '</div>'; }
	add_shortcode('one_sixth', 'jwl_one_sixth');
	function jwl_one_sixth_last( $atts, $content = null ) { return '<div class="one_sixth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>'; }
	add_shortcode('one_sixth_last', 'jwl_one_sixth_last');
	function jwl_five_sixth( $atts, $content = null ) { return '<div class="five_sixth">' . do_shortcode($content) . '</div>'; }
	add_shortcode('five_sixth', 'jwl_five_sixth');
	function jwl_five_sixth_last( $atts, $content = null ) { return '<div class="five_sixth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>'; }
	add_shortcode('five_sixth_last', 'jwl_five_sixth_last');

	function jwl_column_stylesheet() {
		$my_style_url = WP_PLUGIN_URL . '/ultimate-tinymce/css/column-style.css';
		$my_style_file = WP_PLUGIN_DIR . '/ultimate-tinymce/css/column-style.css';
	
		if ( file_exists($my_style_file) ) {
			wp_register_style('column-styles', $my_style_url);
			wp_enqueue_style('column-styles');
		}
	}
	add_action('wp_print_styles', 'jwl_column_stylesheet');
}

// Functions for shortcodes dropdown in editor
$jwl_shortcodes = get_option('jwl_shortcodes_field_id');
if ($jwl_shortcodes == "1") {

	if(!class_exists('ShortcodesEditorSelector')):
 
		class ShortcodesEditorSelector{
			var $buttonName = 'ShortcodeSelector';
			function addSelector(){
				// Don't bother doing this stuff if the current user lacks permissions
				if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
					return;
		 
			   // Add only in Rich Editor mode
				if ( get_user_option('rich_editing') == 'true') {
				  add_filter('mce_external_plugins', array($this, 'registerTmcePlugin'));
				  $jwl_shortcodes_dropdown = get_option('jwl_shortcodes_dropdown');
				  $jwl_shortcodes_dropdown2 = $jwl_shortcodes_dropdown['row'];
				  if ($jwl_shortcodes_dropdown2 == 'Row 1') { add_filter("mce_buttons", array($this, 'registerButton')); } 
				  if ($jwl_shortcodes_dropdown2 == 'Row 2') { add_filter("mce_buttons_2", array($this, 'registerButton')); } 
				  if ($jwl_shortcodes_dropdown2 == 'Row 3') { add_filter("mce_buttons_3", array($this, 'registerButton')); }
				  if ($jwl_shortcodes_dropdown2 == 'Row 4') { add_filter("mce_buttons_4", array($this, 'registerButton')); }
				}
			}
		 
			function registerButton($buttons){
				array_push($buttons, $this->buttonName);
				return $buttons;
			}
		 
			function registerTmcePlugin($plugin_array_shortcodes){
				$plugin_array_shortcodes[$this->buttonName] = plugin_dir_url( __FILE__ ) . 'shortcodes-editor-selector/editor_plugin.js.php';
				if ( get_user_option('rich_editing') == 'true')
				return $plugin_array_shortcodes;
			}
		}
 
	endif;
 
	if(!isset($shortcodesES)){
		$shortcodesES = new ShortcodesEditorSelector();
		add_action('admin_head', array($shortcodesES, 'addSelector'));
	}
}

/*
 * Here we are generating the admin options page.
 * This will allow us to include all scripts and code to mimic the main dashboard admin page.
*/
// Avoid direct calls to this file where wp core files not present
if (!function_exists ('add_action')) {
		header('Status: 403 Forbidden');
		header('HTTP/1.1 403 Forbidden');
		exit();
}

define('JWL_ADMIN_PAGE_NAME', 'ultimate-tinymce');

//class that reperesents the plugins complete admin options page.
class jwl_metabox_admin {

		//constructor of class, PHP4 compatible construction for backward compatibility
		function jwl_metabox_admin() {
			//add filter for WordPress 2.8 changed backend box system !
			add_filter('screen_layout_columns', array(&$this, 'on_screen_layout_columns'), 10, 2);
			//register callback for admin menu  setup
			add_action('admin_menu', array(&$this, 'on_admin_menu')); 
			//register the callback been used if options of page been submitted and needs to be processed
			add_action('admin_post_save_ultimate-tinymce-general', array(&$this, 'on_save_changes'));
		}
		
		//for WordPress 2.8 we have to tell, that we support 2 columns !
		function on_screen_layout_columns($columns, $screen) {
			if ($screen == $this->pagehook) {
				$columns[$this->pagehook] = 2;
			}
			return $columns;
		}
		
		//extend the admin menu
		function on_admin_menu() {
			//add our own option page, you can also add it to different sections or use your own one
			$this->pagehook = add_options_page('Ultimate TinyMCE Plugin Page',  __('Ultimate TinyMCE','jwl-ultimate-tinymce'), 'manage_options', JWL_ADMIN_PAGE_NAME, array(&$this, 'jwl_options_page'));
			//register  callback gets call prior your own page gets rendered
			add_action('load-'.$this->pagehook, array(&$this, 'jwl_on_load_page'));
			add_action('admin_print_styles-'.$this->pagehook, array(&$this, 'jwl_admin_register_head_styles'));
			add_action('admin_print_scripts-'.$this->pagehook, array(&$this, 'jwl_admin_register_head_scripts'));

		}
		function jwl_admin_register_head_styles() {
			/** Register */
    		wp_register_style('admin-panel-css', plugins_url('css/admin_panel.css', __FILE__), array(), '1.0.0', 'all');
			/** Enqueue */
    		wp_enqueue_style('admin-panel-css');
		}
		function jwl_admin_register_head_scripts() {
			$url2 = plugin_dir_url( __FILE__ ) . 'js/pop-up.js';  // Added for popup help javascript
			echo "<script language='JavaScript' type='text/javascript' src='$url2'></script>\n";  // Added for popup help javascript
		}

		//will be executed if wordpress core detects this page has to be rendered
		function jwl_on_load_page() {
			//ensure, that the needed javascripts been loaded to allow drag/drop, expand/collapse and hide/show of boxes
			wp_enqueue_script('common');
			wp_enqueue_script('wp-lists');
			wp_enqueue_script('postbox');
		
			//add metaboxes now, all metaboxes registered during load page can be switched off/on at "Screen Options" automatically, nothing special to do therefore
			// Can use 'normal', 'side', or 'additional' when defining metabox positions
			add_meta_box('postbox_resources', 'Additional Resources', array(&$this, 'postbox_resources'), $this->pagehook, 'side', 'core');
			add_meta_box('postbox_firefox', 'TinyMCE + Firefox = Best Experience', array(&$this, 'postbox_firefox'), $this->pagehook, 'side', 'core');
			add_meta_box('postbox_vote', 'Please VOTE and click WORKS.', array(&$this, 'postbox_vote'), $this->pagehook, 'side', 'core');
			add_meta_box('postbox_blog', 'Bloggers!!', array(&$this, 'postbox_blog'), $this->pagehook, 'side', 'core');
			add_meta_box('postbox_feedback', 'Feedback', array(&$this, 'postbox_feedback'), $this->pagehook, 'side', 'core');
			add_meta_box('postbox_poll', 'Plugin Poll', array(&$this, 'postbox_poll'), $this->pagehook, 'side', 'core');
			
			add_meta_box('jwl_metabox1', __('Buttons Group 1'), array(&$this, 'buttons_group_1'), $this->pagehook, 'normal', 'core');
			add_meta_box('jwl_metabox2', __('Buttons Group 2'), array(&$this, 'buttons_group_2'), $this->pagehook, 'normal', 'core');
			add_meta_box('jwl_metabox3', __('Enable Advanced Features'), array(&$this, 'buttons_group_3'), $this->pagehook, 'normal', 'core');
			add_meta_box('jwl_metabox4', __('Miscellaneous Features'), array(&$this, 'buttons_group_4'), $this->pagehook, 'normal', 'core');
			add_meta_box('jwl_metabox5', __('Delete Database Entries and Values &nbsp;&nbsp;(Reset Plugin Settings)'), array(&$this, 'jwl_ultimate_tinymce_form_uninstall'), $this->pagehook, 'normal', 'core');	
		}
		
		//executed to show the plugins complete admin page
		function jwl_options_page() {
			//we need the global screen column value to beable to have a sidebar in WordPress 2.8
			global $screen_layout_columns;
			//add a 3rd content box now for demonstration purpose, boxes added at start of page rendering can't be switched on/off, 
			//may be needed to ensure that a special box is always available
			add_meta_box('postbox_donate', 'Donations', array(&$this, 'postbox_donate'), $this->pagehook, 'side', 'core');
			add_meta_box('postbox_addons', 'Plugin Addons', array(&$this, 'postbox_addons'), $this->pagehook, 'side', 'core');
			//define some data can be given to each metabox during rendering
			$data = array('My Data 1', 'My Data 2', 'Available Data 1');
			?>
			<div id="ultimate-tinymce-general" class="wrap">
			<?php screen_icon('options-general'); ?>
			<h2>Ultimate Tinymce Admin Settings Page</h2>
				<form action="admin-post.php" method="post">
				<?php wp_nonce_field('ultimate-tinymce-general'); ?>
				<?php wp_nonce_field('closedpostboxes', 'closedpostboxesnonce', false ); ?>
				<?php wp_nonce_field('meta-box-order', 'meta-box-order-nonce', false ); ?>
				<input type="hidden" name="action" value="save_ultimate-tinymce_general" />
				</form>
			
				<div id="poststuff" class="metabox-holder<?php echo 2 == $screen_layout_columns ? ' has-right-sidebar' : ''; ?>">
					<div id="side-info-column" class="inner-sidebar">
						<?php do_meta_boxes($this->pagehook, 'side', $data); ?>
					</div>
					<div id="post-body" class="has-sidebar">
						<div id="post-body-content" class="has-sidebar-content">
                        	<?php do_meta_boxes($this->pagehook, 'normal', $data); ?>
							<?php do_meta_boxes($this->pagehook, 'additional', $data); ?>
                            <!--<div class="help_wrapper" style="height:440px;width:95%;"><p><center><h3>Check out these addons which will allow you even further customization over the visual editor.</h3></center><a target="_blank" href="http://www.plugins.joshlobe.com/ultimate-tinymce-custom-styles/"><div class="content_wrapper"><h3>Ultimate Tinymce Custom Styles</h3><p><img src="http://www.joshlobe.com/images/styles_addon.png"></p></div></a><a target="_blank" href="http://www.plugins.joshlobe.com/ultimate-tinymce-google-webfonts/"><div class="content_wrapper"><h3>Ultimate Tinymce Google Webfonts</h3><p><img src="http://www.joshlobe.com/images/webfonts_addon.png"></p></div></a></p></div>-->
						</div>
					</div>
					<br class="clear"/>
									
			  </div>	
			</div>
			<script type="text/javascript">
				//<![CDATA[
				jQuery(document).ready( function($) { $('.if-js-closed').removeClass('if-js-closed').addClass('closed'); postboxes.add_postbox_toggles('<?php echo $this->pagehook; ?>'); });
				//]]>
			</script>
            <script type="text/javascript"> jQuery(document).ready( function($) { $("#allsts").click(function() { $(".one").attr('checked', true); }); $("#nosts").click(function() { $(".one").attr('checked', false); }); $('.one' ).each( function() { var isitchecked = this.checked; }); });
            </script>
            <script type="text/javascript"> jQuery(document).ready( function($) { $("#allsts2").click(function() { $(".two").attr('checked', true); }); $("#nosts2").click(function() { $(".two").attr('checked', false); }); $('.two' ).each( function() { var isitchecked = this.checked; }); });
            </script>
			
			<?php
		}
		
		// Executed if the post arrives initiated by pressing the submit button of form
		function on_save_changes() {
			//user permission check
			if ( !current_user_can('manage_options') )
				wp_die( __('Cheatin&#8217; uh?') );			
			//cross check the given referer
			check_admin_referer('ultimate-tinymce-general');
		
			//process here your on $_POST validation and / or option saving
		
			//lets redirect the post request into get request (you may add additional params at the url, if you need to show save results
			wp_redirect($_POST['_wp_http_referer']);		
		}
		
		// Below you will find for each registered metabox the callback method, that produces the content inside the boxes
		function buttons_group_1($data) {
			sort($data);
			?><div id="all"><form action="options.php" method="post" name="jwl_main_options"><?php
			do_settings_sections('ultimate-tinymce1');
			settings_fields('jwl_options_group'); ?>
			<br /><div style="float:left;"><input type="button" id="allsts" value="Check All"><input type="button" id="nosts" value="UnCheck All"><span style="margin-left:130px;"><input class="button-primary" type="submit" name="Save" style="padding-left:40px;padding-right:40px;" value="<?php _e('Update Options','jwl-ultimate-tinymce'); ?>" id="submitbutton" /></span><br /><br /></div>
			</div>
			<?php
		}
		function buttons_group_2($data) {
			sort($data);
			?><div id="all"><?php
			do_settings_sections('ultimate-tinymce2');
			settings_fields('jwl_options_group'); ?>
			<br /><div style="float:left;"><input type="button" id="allsts2" value="Check All"><input type="button" id="nosts2" value="UnCheck All"><span style="margin-left:130px;"><input class="button-primary" type="submit" name="Save" style="padding-left:40px;padding-right:40px;" value="<?php _e('Update Options','jwl-ultimate-tinymce'); ?>" id="submitbutton" /></span><br /><br /></div>
			</div>
			<?php
		}
		function buttons_group_3($data) {
			sort($data);
			do_settings_sections('ultimate-tinymce4');
			settings_fields('jwl_options_group');
			?>
			<center><input class="button-primary" type="submit" name="Save" style="padding-left:40px;padding-right:40px;" value="<?php _e('Update Options','jwl-ultimate-tinymce'); ?>" id="submitbutton" /></center>
			
			<?php
		}
		function buttons_group_4($data) {
			sort($data);
			do_settings_sections('ultimate-tinymce3');
			settings_fields('jwl_options_group');
			?>
			<center><input class="button-primary" type="submit" name="Save" style="padding-left:40px;padding-right:40px;" value="<?php _e('Update Options','jwl-ultimate-tinymce'); ?>" id="submitbutton" /></center>
			</form>
			<?php
		}
		function jwl_ultimate_tinymce_form_uninstall($data) {
			sort($data);
			jwl_ultimate_tinymce_form_uninstall();
			
		}
		function postbox_donate($data) {
			?>
			<p><?php _e('Developing this awesome plugin took a lot of effort and time; months and months of continuous voluntary unpaid work.','jwl-ultimate-tinymce'); ?></p>				<!--  Donate Button -->
					<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
					<input type="hidden" name="cmd" value="_s-xclick">
					<input type="hidden" name="hosted_button_id" value="A9E5VNRBMVBCS">
					<center><input type="image" src="http://www.joshlobe.com/images/donate.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!"></center>
					<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
					</form>
			<p><?php _e('If you like this plugin or if you are using it for commercial websites, please consider a donation to the developer to help support future updates and development.','jwl-ultimate-tinymce'); ?></p><?php
		}
		function postbox_addons($data) {
			sort($data);
			?>
			<p>
					<?php _e('These addons provide additional features for Ultimate TinyMCE.  Click the title to view the download page.','jwl-ultimate-tinymce');
					echo '<br /><br /><a target="_blank" title="Add over 50 animated smilies to your content." href="http://wordpress.org/extend/plugins/moods-addon-for-ultimate-tinymce/">Ultimate Moods Addon</a> - ';
					if (is_plugin_active('moods-addon-for-ultimate-tinymce/main.php')) {
					echo '<span style="color:green;padding-left:5px;">Activated</span>';
					?> <img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/check.png" style="padding-left:5px;margin-bottom:-3px;" title="This addon has been installed and activated successfully." /><?php
					} else {
					echo '<span style="color:red;padding-left:5px;">Not Activated</span>';
					?> <img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/warning.png" style="padding-left:5px;margin-bottom:-3px;" title="This addon has NOT been activated." /><br /><br /><span class="plugin_addons"> <?php _e('Insert over 50 professionally animated smilies into your post or page content areas.'); ?> </span> <?php
					}
					
					echo '<br /><br /><a target="_blank" title="Easily Integrate Google Webfonts into your Website." href="http://www.plugins.joshlobe.com/ultimate-tinymce-google-webfonts/">Ultimate Google Webfonts</a> - ';
					if (is_plugin_active('ultimate_tinymce_google_webfonts_addon/main.php')) {
					echo '<span style="color:green;padding-left:5px;">Activated</span>';
					?> <img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/check.png" style="padding-left:5px;margin-bottom:-3px;" title="This addon has been installed and activated successfully." /> <?php
					} else {
					echo '<span style="color:red;padding-left:5px;">Not Activated</span>';
					?> <img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/warning.png" style="padding-left:5px;margin-bottom:-3px;" title="This addon has NOT been activated." /><br /><br /><span class="plugin_addons"> <?php _e('Choose any combination of Google Webfonts, and add them to the font dropdown selector.'); ?> </span> <?php
					}
					
					echo '<br /><br /><a target="_blank" title="Easily add custom styles to your content." href="http://www.plugins.joshlobe.com/ultimate-tinymce-custom-styles/">Ultimate Custom Styles</a> - ';
					if (is_plugin_active('ultimate_tinymce_custom_styles_addon/main.php')) {
					echo '<span style="color:green;padding-left:5px;">Activated</span>';
					?> <img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/check.png" style="padding-left:5px;margin-bottom:-3px;" title="This addon has been installed and activated successfully." /> <?php
					} else {
					echo '<span style="color:red;padding-left:5px;">Not Activated</span>';
					?> <img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/warning.png" style="padding-left:5px;margin-bottom:-3px;" title="This addon has NOT been activated." /><br /><br /><span class="plugin_addons"> <?php _e('Define unlimited custom styles, and add them to the styleselect dropdown list.'); ?> </span> <?php
					}
					?>
					</p>
					<?php
		}
		function postbox_resources($data) {
			sort($data);
			?>
			<img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/support.png" style="margin-bottom: -8px;" />
			<a href="http://forum.joshlobe.com/member.php?action=register&referrer=1" target="_blank"><?php _e('Get help from the Support Forum.','jwl-ultimate-tinymce'); ?></a><br /><br />
			<img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/screencast.png" style="margin-bottom: -8px;" />
			<a href="http://www.youtube.com/watch?v=fM3CUo9MxMc" target="_blank"><?php _e('Screencast part one','jwl-ultimate-tinymce'); ?></a><br /><br />
			<img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/screencast.png" style="margin-bottom: -8px;" />
			<a href="http://www.youtube.com/watch?v=5raIBxGP17g" target="_blank"><?php _e('Screencast part two','jwl-ultimate-tinymce'); ?></a><br /><br />
			<img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/help.png" style="margin-bottom: -8px;" />
			<a href="http://www.joshlobe.com/2011/10/ultimate-tinymce/" target="_blank"><?php _e('Get help from my personal blog.','jwl-ultimate-tinymce'); ?></a><br /><br />
			<img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/thread.png" style="margin-bottom: -8px;" />
			<a href="http://wordpress.org/tags/ultimate-tinymce?forum_id=10#postform" target="_blank"><?php _e('Post a thread in the Wordpress Forums.','jwl-ultimate-tinymce'); ?></a><br /><br />
			<img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/email.png" style="margin-bottom: -8px;" />
			<a href="http://www.joshlobe.com/contact-me/" target="_blank"><?php _e('Email me directly using my contact form.','jwl-ultimate-tinymce'); ?></a><br /><br />
			<img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/rss.png" style="margin-bottom: -8px;" />
			<a href="http://www.joshlobe.com/feed/" target="_blank"><?php _e('Subscribe to my RSS Feed.','jwl-ultimate-tinymce'); ?></a><br /><br />
			<img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/follow.png" style="margin-bottom: -8px;" />
			<?php _e('Follow me on ','jwl-ultimate-tinymce'); ?><a target="_blank" href="http://www.facebook.com/joshlobe"><?php _e('Facebook','jwl-ultimate-tinymce'); ?></a>    <?php _e(' and ','jwl-ultimate-tinymce'); ?><a target="_blank" href="http://twitter.com/#!/joshlobe"><?php _e('Twitter','jwl-ultimate-tinymce'); ?></a>.<br /> <?php
		}
		function postbox_firefox($data) {
			sort($data);
			_e('In all honesty, the tinymce editor works best with the Mozilla Firefox browser.  If you are not a Firefox user, you might want to consider giving it a try when creating your content.  You can download the free browser by clicking the image below.','jwl-ultimate-tinymce'); ?>
			<br /><br /><center><a target="_blank" href="http://affiliates.mozilla.org/link/banner/6906"><img src="http://affiliates.mozilla.org/media/uploads/banners/download-small-blue-EN.png" alt="Download: Fast, Fun, Awesome" /></a></center>
			<?php
		}
		function postbox_vote($data) {
			sort($data);
			?> <img src="<?php echo plugin_dir_url( __FILE__ ) ?>img/vote.png" style="margin-bottom: -8px;" /> <a href="http://wordpress.org/extend/plugins/ultimate-tinymce/" target="_blank"><?php _e('Click Here to Vote and click "Works"...','jwl-ultimate-tinymce'); ?></a><br /><br /><?php _e('Voting helps my plugin get more exposure and higher rankings on the searches.<br /><br />Clicking "Works" on the Wordpress plugin download page shows others that Ultimate TinyMCE is stable, and encourages their download.','jwl-ultimate-tinymce'); ?><br /><br /><?php _e('Please help spread this wonderful plugin by showing your support.  Thank you!','jwl-ultimate-tinymce');
		}
		function postbox_blog($data) {
		($data);
			sort($data);
			_e('Like this plugin?  Blog about it on your website, link to my plugin page on my website <a target="_blank" href="http://www.joshlobe.com/2011/10/ultimate-tinymce/">HERE</a>, and I will add your website link here.','jwl-ultimate-tinymce'); _e('<br /><br /><strong>Special Thanks to these bloggers:</strong><br /><ul><li><a href="http://www.buzzing-t.nl/" target="_blank">Buzzing-t.nl</a></li><li><a href="http://onewhole.eu/" target="_blank">Onewhole.eu</a></li><li><a href="http://www.vanytastisch.ch/" target="_blank">Vanytastisch.ch</a></li><li><a href="http://animereviews.co" target="_blank">Animereviews.co</a></li><li><a href="http://blogigs.com/how-to-make-a-attractive-blog-post/" target="_blank">Blogigs</a></li><li><a href="http://www.untetheredincome.com/articles/wordpress/best-wordpress-plugins-2012/" target="_blank">Untethered Income</a></li><li><a href="http://www.bowierocks.com" target="_blank">BowieRocks</a></li></ul>', 'jwl-ultimate-tinymce');
		}
		function postbox_feedback($data) {
			sort($data);
			_e('Please take a moment to complete the short feedback form below.  Your input is greatly appreciated.  All input fields are optional.','jwl-ultimate-tinymce'); ?><br /><br />
					<div style="border:1px solid #999999;padding:5px;"><!-- Begin Freedback Form -->
		<!-- DO NOT EDIT YOUR FORM HERE, PLEASE LOG IN AND EDIT AT FREEDBACK.COM -->
		<form enctype="multipart/form-data" method="post" action="http://www.freedback.com/mail.php" accept-charset="UTF-8">
		<div>
			<input type="hidden" name="acctid" id="acctid" value="8a44jw4rc6tihuqh" />
			<input type="hidden" name="formid" id="formid" value="1035543" />
		</div>
		<table cellspacing="2" cellpadding="2" border="0">
			<tr><td valign="top"><strong>Name: (Optional)</strong></td></tr>
			<tr><td valign="top"><input type="text" name="name" id="name" size="40" value="" /></td></tr>
			<tr><td valign="top"><strong>Email Address: (Optional)</strong></td></tr>
			<tr><td valign="top"><input type="text" name="email" id="email" size="40" value="" /></td></tr>
			<tr><td valign="top"><strong>Would you recommend this plugin to a friend?</strong></td></tr>
			<tr><td valign="top">
					<select name="field-45f3fdce1a0bc05" id="field-45f3fdce1a0bc05">
						<option value=""></option><option value="Most Definitely">Most Definitely</option><option value="Probably">Probably</option><option value="Maybe">Maybe</option><option value="Probably Not">Probably Not</option><option value="Definitely Not??">Definitely Not</option>
					</select>
			</td></tr>
			<tr><td valign="top"><strong>How would you rate this plugin?</strong></td></tr>
			<tr><td valign="top">
					<select name="field-d8c8cf7b3175e69" id="field-d8c8cf7b3175e69">
						<option value=""></option><option value="5 Stars">5 Stars</option><option value="4 Stars">4 Stars</option><option value="3 Stars">3 Stars</option><option value="2 Stars">2 Stars</option><option value="1 Star">1 Star</option><option value="0 Stars">0 Stars</option>
					</select>
			</td></tr>
			<tr><td valign="top"><strong>Do you find the new &quot;Help&quot; popups useful?</strong></td></tr>
			<tr><td valign="top">
					<select name="field-dbfb7a0c6afa91c" id="field-dbfb7a0c6afa91c">
						<option value=""></option><option value="Absolutely">Absolutely</option><option value="A Little">A Little</option><option value="Not Really">Not Really</option>
					</select>
			</td></tr>
			<tr><td valign="top"><strong>Have you rated this plugin and clicked &quot;Works&quot; on the <a target="_blank" href="http://wordpress.org/extend/plugins/ultimate-tinymce/">wordpress plugin download page</a>?</strong></td></tr>
			<tr><td valign="top">
					<select name="field-05f800de9d39cb5" id="field-05f800de9d39cb5">
						<option value=""></option><option value="I Already have.">I Already have.</option><option value="Doing it now.">Doing it now.</option><option value="No Way.">No Way.</option><option value="What&#39;s That?">What&#39;s That?</option>
					</select>
			</td></tr>
			<tr><td valign="top"><strong>Have you looked at any of these?  (Check all that apply)</strong></td></tr>
			<tr><td valign="top">
					<input type="checkbox" name="field-2a733a58a89d340[]" id="field-2a733a58a89d340_0" value="Support Forum" /> Support Forum<br/>
					<input type="checkbox" name="field-2a733a58a89d340[]" id="field-2a733a58a89d340_1" value="Microsoft Word Help Document" /> Microsoft Word Help Document<br/>
					<input type="checkbox" name="field-2a733a58a89d340[]" id="field-2a733a58a89d340_2" value="&quot;Help&quot; Popups" /> &quot;Help&quot; Popups<br/>
			</td></tr>
			<tr><td valign="top"><strong>Please feel free to leave any additional feedback here...</strong></td></tr>
			<tr><td valign="top"><center><textarea name="field-b0cb8c2a6a616ee" id="field-b0cb8c2a6a616ee" onfocus="if(this.value==this.defaultValue)this.value=''" onblur="if(this.value=='')this.value=this.defaultValue" rows="6" cols="35">Type your feedback here...</textarea></center></td></tr>
			<tr><td colspan="2" align="center"><input type="submit" value=" Submit Form " /></td></tr>
		</table>
		</form>
		<br><center><font face="Arial, Helvetica" size="1"><b>Put a <a href="http://www.freedback.com">website form</a> like this on your site.</b></font><br /><br /><strong>Please click the "Continue" text on the next page after submission to return to this page.</strong></center></div> <?php
		}
		function postbox_poll($data) {
			sort($data);
			_e('New Plugin Features...','jwl-ultimate-tinymce'); ?><br /><br /><?php _e('There are a few features I have been wanting to implement; but have found they are going to require more work than I originally anticipated.<br /><br />In the meantime, I\'d like to take a poll of which features you consider to be of a higher priority.  Please vote on your favorite requested feature.  You can vote once per day.<br /><br />','jwl-ultimate-tinymce'); ?>
					
					<!-- // Begin Pollhost.com Poll Code // -->
		<div style="border:1px solid black;">
		<form method=post action=http://poll.pollhost.com/vote.cgi><table border=0 width=100% bgcolor=#EEEEEE cellspacing=0 cellpadding=2><tr><td colspan=2><font face="Verdana" size=-1 color="#000000"><b>Which feature would you like to see?</b></font></td></tr><tr><td width=5><input type=radio name=answer value=1></td><td><font face="Verdana" size=-1 color="#000000">Better Tables Control and Usage</font></td></tr><tr><td width=5><input type=radio name=answer value=2></td><td><font face="Verdana" size=-1 color="#000000">Better Cross-Browser Compatibility</font></td></tr><tr><td width=5><input type=radio name=answer value=3></td><td><font face="Verdana" size=-1 color="#000000">More examples in the Help Popups</font></td></tr><tr><td width=5><input type=radio name=answer value=4></td><td><font face="Verdana" size=-1 color="#000000">A Shortcodes Manager</font></td></tr><tr><td width=5><input type=radio name=answer value=5></td><td><font face="Verdana" size=-1 color="#000000">A Custom Styles Manager</font></td></tr><tr><td colspan=2><input type=hidden name=config value="am9zaDQwMQkxMzI2NjkxMDQ5CUVFRUVFRQkwMDAwMDAJVmVyZGFuYQlBc3NvcnRlZA"><center><input type=submit value=Vote>&nbsp;&nbsp;<input type=submit name=view value=View></center></td></tr><tr><td bgcolor=#FFFFFF colspan=2 align=right><font face="Verdana" size=-2 color="#000000"><a href=http://www.pollhost.com/><font color=#000099>Free polls from Pollhost.com</font></a></font></td></tr></table></form>
		</div> <?php
		}
}
$my_jwl_metabox_admin = new jwl_metabox_admin();

?>