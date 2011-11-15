<?php
/**
 * @package Ultimate TinyMCE
 * @version 1.1
 */
/*
Plugin Name: Ultimate TinyMCE
Plugin URI: http://www.joshlobe.com/2011/11/adding-buttons-to-tinymce-in-wordpress/
Description: Beef up your visual tinymce editor with a plethora of advanced options: Google Fonts, Emoticons, Tables, Styles, Advanced links, images, and drop-downs, too many features to list.
Author: Josh Lobe
Version: 1.1
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


	function tinymce_add_buttons($buttons) {
	 $buttons[] = 'fontselect';
	 $buttons[] = 'fontsizeselect';
	 $buttons[] = 'styleselect';
	 $buttons[] = '|';
	 $buttons[] = '|';
	 $buttons[] = 'cut';
	 $buttons[] = 'copy';
	 $buttons[] = 'paste';
	 $buttons[] = '|';
	 $buttons[] = '|';
	 $buttons[] = 'backcolorpicker';
	 $buttons[] = 'forecolorpicker';
	 $buttons[] = '|';
	 $buttons[] = '|';
	 $buttons[] = 'hr';
	 $buttons[] = 'visualaid';
	 $buttons[] = 'anchor';
	 $buttons[] = '|';
	 $buttons[] = '|';
	 $buttons[] = 'sub';
	 $buttons[] = 'sup';
	 $buttons[] = 'search';
	 $buttons[] = 'replace';
	
	 return $buttons;
	}
	
	add_filter("mce_buttons_3", "tinymce_add_buttons");
	

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
			add_filter( 'mce_buttons_4', array( $this, 'mce_buttons_4' ) );
			add_filter( 'theme_advanced_fonts', array( $this, 'theme_advanced_fonts' ) );
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
		
		function mce_buttons_4( $buttons )
		{
			array_push( $buttons, 'tablecontrols', '|', 'emotions', '|', 'image', '|', 'preview', '|','cite', 'abbr', 'acronym', 'del', 'ins', 'attribs', '|', 'styleprops', 'code');
			return $buttons;
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