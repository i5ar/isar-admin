<?php
/**
 * Plugin Name: iSar Custom Admin
 * Plugin URI: https://github.com/i5ar/isar-custom-admin
 * Description: Custom Admin styles and snippets designed for iSarch website. Access to plugin panel from the Setting sub-menu Custom Admin.
 * Version: 1.3.0
 * Author: Pierpaolo Rasicci
 * Author URI: http://isarch.it/about-me/
 * Text Domain: isar-custom-admin
 * Domain Path: /languages/
 * License: GPL
 */
 
/*  Copyright 2014 iSar (email: i5ar at live.it)

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
/**
 * Languages
 */
class admin_load_language {
	public function __construct() {
		add_action( 'init', array( $this, 'load_my_transl' ) );
	}
	public function load_my_transl() {
		load_plugin_textdomain( 'isar-custom-admin', false, basename( dirname( __FILE__ ) ) . '/languages' );
	}
}
$admin_load_language = new admin_load_language;
/**
 * Setting Panel
 */
add_action( 'admin_menu', 'ca_plugin_menu' );
function ca_plugin_menu() {
	add_options_page( 'Custom Admin Options', 'Custom Admin', 'manage_options', 'ca-unique-identifier', 'ca_options' );
}
function ca_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	} ?>
	<div class="wrap">
		<p><?php echo __( 'Here is where the form would go if I actually had options.', 'isar-custom-admin' ); ?></p>
		<p><?php echo __( 'Using this option you will make a fortune!', 'isar-custom-admin' ); ?></p>
	</div>
	<?php
}
/**
 * Remove the WordPress Logo from the WordPress Admin Bar
add_action( 'wp_before_admin_bar_render', 'remove_wp_logo' );  
function remove_wp_logo() {  
    global $wp_admin_bar;  
    $wp_admin_bar->remove_menu('wp-logo');  
}  
 */

/** 
 * Remove the Howdy menu from the WordPress Admin Bar
add_action( 'wp_before_admin_bar_render', 'remove_my_account' );
function remove_my_account() {  
    global $wp_admin_bar;  
    $wp_admin_bar->remove_menu( 'my-account' );  
}  
 */

/**
 * Remove the Comment Bubble from the WordPress Admin Bar
add_action( 'wp_before_admin_bar_render', 'remove_comment_bubble' ); 
function remove_comment_bubble() {  
    global $wp_admin_bar;  
    $wp_admin_bar->remove_menu('comments');  
}  
 */

/**
 * Disable the current Site Name menu in the Admin Bar
add_action( 'wp_before_admin_bar_render', 'remove_this_site' );  
function remove_this_site() {
    global $wp_admin_bar;  
    $wp_admin_bar->remove_menu('site-name');  
}  
 */

/**
 * Disable the Add New Content menu or sub-items
add_action( 'wp_before_admin_bar_render', 'custom_admin_bar_edit' );
function custom_admin_bar_edit() {
    global $wp_admin_bar;
	$wp_admin_bar->remove_menu('new-content');	// This removes the complete menu “Add New”. You will not require the below “remove_menu” if you using this line.
	$wp_admin_bar->remove_menu('new-post');		// This (when used individually with other “remove menu” lines removed) will hide the menu item “Post”.
	$wp_admin_bar->remove_menu('new-page');		// This (when used individually with other “remove menu” lines removed) will hide the menu item “Page”.
	$wp_admin_bar->remove_menu('new-media');	// This (when used individually with other “remove menu” lines removed) will hide the menu item “Media”.
	$wp_admin_bar->remove_menu('new-link');		// This (when used individually with other “remove menu” lines removed) will hide the menu item “Link”.
	$wp_admin_bar->remove_menu('new-user');		// This (when used individually with other “remove menu” lines removed) will hide the menu item “User”.
	$wp_admin_bar->remove_menu('new-theme');	// This (when used individually with other “remove menu” lines removed) will hide the menu item “Theme”.
	$wp_admin_bar->remove_menu('new-plugin');	// This (when used individually with other “remove menu” lines removed) will hide the menu item “Plugin”.
}
 */ 

/**
 * Remove meta box from Wordpress Dashboard for all users
add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );
function remove_dashboard_widgets() {
    // Globalize the metaboxes array, this holds all the widgets for wp-admin
    global $wp_meta_boxes;
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
}
 */

/**
 * Disable the Search Icon and Input within the Admin Bar 
function disable_bar_search() {  
    global $wp_admin_bar;  
    $wp_admin_bar->remove_menu('search');  
}  
add_action( 'wp_before_admin_bar_render', 'disable_bar_search' ); 
 */  

/**
 * Disable the Update Menus 
function disable_bar_updates() {  
    global $wp_admin_bar;  
    $wp_admin_bar->remove_menu('updates');  
}  
add_action( 'wp_before_admin_bar_render', 'disable_bar_updates' ); 
 */

/**
 * Add a dropdown menu & link that opens in a new window 
 */
add_action( 'admin_bar_menu', 'add_toolbar_items', 15);												
function add_toolbar_items($admin_bar){
	$admin_bar->add_menu(
		array(
			'id'    => 'my-item',
			'title' => 'Portals',
			'meta'  => array(
				'title' => __('Portals')
			),
		)
	);
	$admin_bar->add_menu(
		array(
			'id'    => 'my-sub-item',
			'parent' => 'my-item',
			'title' => 'edilportale',
			'href'  => 'http://www.edilportale.com/',
			'meta'  => array(
				'title' => __('Edilportale'),
				'target' => '_blank'
			),
		)
	);
	$admin_bar->add_menu(
		array(
			'id'    => 'my-second-sub-item',
			'parent' => 'my-item',
			'title' => 'archiportale',
			'href'  => 'http://www.archiportale.com/',
			'meta'  => array(
				'title' => __('Edilportale archiportale'),
				'target' => '_blank'
			),
		)
	);
	$admin_bar->add_menu(
		array(
			'id'    => 'my-third-sub-item',
			'parent' => 'my-item',
			'title' => 'archilovers',
			'href'  => 'http://www.archilovers.com/',
			'meta'  => array(
				'title' => __('Edilportale archilovers'),
				'target' => '_blank'
			),
		)
	);
	$admin_bar->add_menu(
		array(
			'id'    => 'my-fourth-sub-item',
			'parent' => 'my-item',
			'title' => 'archiproducts',
			'href'  => 'http://www.archiproducts.com/',
			'meta'  => array(
				'title' => __('Edilportale archiproducts'),
				'target' => '_blank'
			),
		)
	);
	$admin_bar->add_menu(
		array(
			'id'    => 'my-fiveth-sub-item',
			'parent' => 'my-item',
			'title' => 'architetto.info',
			'href'  => 'ttp://www.architetto.info/',
			'meta'  => array(
				'title' => __('Wolters Kluwer Italia'),
				'target' => '_blank'
			),
		)
	);
	$admin_bar->add_menu(
		array(
			'id'    => 'my-fiveth-sub-item',
			'parent' => 'my-item',
			'title' => 'architetto.info',
			'href'  => 'http://www.architetto.info/',
			'meta'  => array(
				'title' => __('Wolters Kluwer Italia'),
				'target' => '_blank'
			),
		)
	);
	$admin_bar->add_menu(
		array(
			'id'    => 'my-sixth-sub-item',
			'parent' => 'my-item',
			'title' => 'professionearchitetto',
			'href'  => 'http://www.professionearchitetto.it/',
			'meta'  => array(
				'title' => __('Luigi Mauro Catenacci'),
				'target' => '_blank'
			),
		)
	);
	$admin_bar->add_menu(
		array(
			'id'    => 'my-seventh-sub-item',
			'parent' => 'my-item',
			'title' => 'europaconcorsi',
			'href'  => 'http://europaconcorsi.com/',
			'meta'  => array(
				'title' => __('Europaconcorsi'),
				'target' => '_blank'
			),
		)
	);
}

/**
 * Add a simple menu & link that opens in a new window 
 */
add_action( 'admin_bar_menu', 'first_custom_adminbar_menu', 15 ); // 10 before logo, 15 between logo and site, 25 after site, 100 end menu
function first_custom_adminbar_menu( $meta = TRUE ) {  
    global $wp_admin_bar;  
        if ( !is_user_logged_in() ) { return; }  
        if ( !is_super_admin() || !is_admin_bar_showing() ) { return; }  
    $wp_admin_bar->add_menu(
		array(  
			'id' => 'custom_menu',
			'title' => __( 'CNAPPC', 'isar-custom-admin' ),
			'href' => 'http://www.cnappc.it/', 
			'meta'  => array(
				'title' => __('Consiglio Nazionale Architetti'),
				'target' => '_blank'
			)
		)
    );  
}
// Add second simple menu & link that opens in a new window 
add_action( 'admin_bar_menu', 'second_custom_adminbar_menu', 15 );
function second_custom_adminbar_menu( $meta = TRUE ) {  
    global $wp_admin_bar;  
        if ( !is_user_logged_in() ) { return; }  
        if ( !is_super_admin() || !is_admin_bar_showing() ) { return; }  
    $wp_admin_bar->add_menu(
		array(
			'id' => 'second_custom_menu',
			'title' => __( 'OAPPC', 'isar-custom-admin' ),
			'href' => 'http://www.architettipescara.it/',
			'meta'  => array(
				'title' => __('OAPPC della Provincia di Pescara'),
				'target' => '_blank'
			)
		)
    );
}

/**
 * Remove the Admin Bar from the Front-end
 */
function isar_function_admin_bar(){ return false; }
add_filter( 'show_admin_bar' , 'isar_function_admin_bar');
 
/**
 * Admin footer modification
 */
add_filter('admin_footer_text', 'remove_footer_admin');
function remove_footer_admin () {
    echo '<span id="footer-thankyou">Developed by <a href="' . get_bloginfo( 'wpurl' ) . '/threex.html" target="_blank">iSarDesign</a></span>';
}

/**
 * Add custom admin login header logo
 */
add_action('login_head', 'isarch_custom_login_logo');
function isarch_custom_login_logo() {
//	echo '<style  type="text/css"> h1 a {  background-image:url(' . get_stylesheet_directory_uri() . '/images/logo-login.png)  !important; } </style>';
	echo '<style  type="text/css"> h1 a {  background-image:url(' . plugin_dir_url('isar-custom-admin') . 'isar-custom-admin/images/logo-login.png)  !important; } </style>';
}

/**
 * Add custom Login Page styles - http://premium.wpmudev.org/blog/create-a-custom-wordpress-login-page/
 */
add_action('login_head', 'isarch_custom_login_styles');
function isarch_custom_login_styles() {
//	echo '<link rel="stylesheet" type="text/css" href="' . get_stylesheet_directory_uri() . '/style-login.css" />';
	echo '<link rel="stylesheet" type="text/css" href="' . plugin_dir_url('isar-custom-admin') . 'isar-custom-admin/css/style-login.css" />';
}

/**
 * Change the Login Logo URL - http://premium.wpmudev.org/blog/create-a-custom-wordpress-login-page/
 */
add_filter( 'login_headerurl', 'isarch_login_logo_url' );
function isarch_login_logo_url() {
	return get_bloginfo( 'url' );
}
add_filter( 'login_headertitle', 'isarch_login_logo_url_title' );
function isarch_login_logo_url_title() {
return 'Architetto Penne Pescara';
}

/**
 * Add another link on the wp-login page - http://wordpress.org/support/topic/adding-another-link-on-the-wp-login-page
 */
add_action('login_footer', 'my_addition_to_login_footer');
function my_addition_to_login_footer() {
     echo '
	 <div id="featured-login">
		 <p id="featured">Made with <span class="genericon genericon-heart"></span> in Penne (PE) <a href="https://goo.gl/maps/vqYIy"><span class="dashicons dashicons-location"></span></a> by <a href="' . get_bloginfo( 'wpurl' ) . '/threex.html"><span class="isar-font">iSar</span></a></p>
	 </div>
	 ';
}







?>