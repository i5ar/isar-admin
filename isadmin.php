<?php
/*
Plugin Name: iSar Admin
Plugin URI: http://codex.wordpress.org/Writing_a_Plugin
Description: Custom Admin styles and contents. Access to plug-in panel from the Setting sub-menu
Version: 1.2
Author: iSarDesign
Author URI: http://
*/
/**
 * Languages
 */
class admin_load_language {
	public function __construct() {
		add_action( 'init', array( $this, 'load_my_transl' ) );
	}
	public function load_my_transl() {
		load_plugin_textdomain( 'isadmin', false, basename( dirname( __FILE__ ) ) . '/languages' );
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
		<p><?php echo __( 'Here is where the form would go if I actually had options.', 'isadmin' ); ?></p>
		<p><?php echo __( 'Using this option you will make a fortune!', 'isadmin' ); ?></p>
	</div>
	<?php
}
/**
 * Remove the WordPress Logo from the WordPress Admin Bar
 
function remove_wp_logo() {  
    global $wp_admin_bar;  
    $wp_admin_bar->remove_menu('wp-logo');  
}  
add_action( 'wp_before_admin_bar_render', 'remove_wp_logo' );  
 */
 
/** 
 * Remove the Howdy menu from the WordPress Admin Bar
 
function remove_my_account() {  
    global $wp_admin_bar;  
    $wp_admin_bar->remove_menu( 'my-account' );  
}  
add_action( 'wp_before_admin_bar_render', 'remove_my_account' );
 */
 
/**
 * Remove the Comment Bubble from the WordPress Admin Bar
 
function remove_comment_bubble() {  
    global $wp_admin_bar;  
    $wp_admin_bar->remove_menu('comments');  
}  
add_action( 'wp_before_admin_bar_render', 'remove_comment_bubble' ); 
 */
 
/**
 * Disable the current Site Name menu in the Admin Bar
 
function remove_this_site() {
    global $wp_admin_bar;  
    $wp_admin_bar->remove_menu('site-name');  
}  
add_action( 'wp_before_admin_bar_render', 'remove_this_site' );  
 */
 
/**
 * Disable the Add New Content menu or sub-items

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
add_action( 'wp_before_admin_bar_render', 'custom_admin_bar_edit' );
 */ 

/**
 * Remove meta box from Wordpress Dashboard for all users

function remove_dashboard_widgets() {
    // Globalize the metaboxes array, this holds all the widgets for wp-admin
    global $wp_meta_boxes;
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
}
add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );
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
	$admin_bar->add_menu( array(
		'id'    => 'my-item',
		'title' => 'Edilportale',
		'meta'  => array(
			'title' => __('Edilportale'),			
		),
	));
	$admin_bar->add_menu( array(
		'id'    => 'my-sub-item',
		'parent' => 'my-item',
		'title' => 'edilportale',
		'href'  => 'http://www.edilportale.com/',
		'meta'  => array(
			'title' => __('My Sub Menu Item'),
			'target' => '_blank',
			'class' => 'my_menu_item_class'
		),
	));
	$admin_bar->add_menu( array(
		'id'    => 'my-second-sub-item',
		'parent' => 'my-item',
		'title' => 'archiportale',
		'href'  => 'http://www.archiportale.com/',
		'meta'  => array(
			'title' => __('My Second Sub Menu Item'),
			'target' => '_blank',
			'class' => 'my_menu_item_class'
		),
	));
	$admin_bar->add_menu( array(
		'id'    => 'my-third-sub-item',
		'parent' => 'my-item',
		'title' => 'archilovers',
		'href'  => 'http://www.archilovers.com/',
		'meta'  => array(
			'title' => __('My Third Sub Menu Item'),
			'target' => '_blank',
			'class' => 'my_menu_item_class'
		),
	));
	$admin_bar->add_menu( array(
		'id'    => 'my-fourth-sub-item',
		'parent' => 'my-item',
		'title' => 'archiproducts',
		'href'  => 'http://www.archiproducts.com/',
		'meta'  => array(
			'title' => __('My Fourth Sub Menu Item'),
			'target' => '_blank',
			'class' => 'my_menu_item_class'
		),
	));
}
/**
 * Add a simple menu & link that opens in a new window 
 */
add_action( 'admin_bar_menu', 'first_custom_adminbar_menu', 15 ); // 10 before logo, 15 between logo and site, 25 after site, 100 end menu
function first_custom_adminbar_menu( $meta = TRUE ) {  
    global $wp_admin_bar;  
        if ( !is_user_logged_in() ) { return; }  
        if ( !is_super_admin() || !is_admin_bar_showing() ) { return; }  
    $wp_admin_bar->add_menu( array(  
        'id' => 'custom_menu',  
        'title' => __( 'archdaily', 'isadmin' ),
        'href' => 'http://www.archdaily.com/',  
        'meta'  => array( target => '_blank' ) )  
    );  
}
// Add second simple menu & link that opens in a new window 
add_action( 'admin_bar_menu', 'second_custom_adminbar_menu', 15 );
function second_custom_adminbar_menu( $meta = TRUE ) {  
    global $wp_admin_bar;  
        if ( !is_user_logged_in() ) { return; }  
        if ( !is_super_admin() || !is_admin_bar_showing() ) { return; }  
    $wp_admin_bar->add_menu( array(
        'id' => 'second_custom_menu',
        'title' => __( 'professionearchitetto', 'isadmin' ),
        'href' => 'http://www.professionearchitetto.it/',
		
        'meta'  => array( target => '_blank' ) )
    );
}
// Add third simple menu & link that opens in a new window
add_action( 'admin_bar_menu', 'third_custom_adminbar_menu', 15 );
function third_custom_adminbar_menu( $meta = TRUE ) {  
    global $wp_admin_bar;  
        if ( !is_user_logged_in() ) { return; }  
        if ( !is_super_admin() || !is_admin_bar_showing() ) { return; }  
    $wp_admin_bar->add_menu( array(
        'id' => 'third_custom_menu',
        'title' => __( 'europaconcorsi', 'isadmin' ),
        'href' => 'http://europaconcorsi.com/',
        'meta'  => array( target => '_blank' ) )
    );
}  
// Add fourth simple menu & link that opens in a new window
add_action( 'admin_bar_menu', 'fourth_custom_adminbar_menu', 15 ); 
function fourth_custom_adminbar_menu( $meta = TRUE ) {  
    global $wp_admin_bar;  
        if ( !is_user_logged_in() ) { return; }  
        if ( !is_super_admin() || !is_admin_bar_showing() ) { return; }  
    $wp_admin_bar->add_menu( array(
        'id' => 'fourth_custom_menu',
        'title' => __( 'architetto.info', 'isadmin' ),
        'href' => 'http://www.architetto.info/',
        'meta'  => array( target => '_blank' ) )
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
function remove_footer_admin () {
    echo '<span id="footer-thankyou">Developed by <a href="' . get_bloginfo( 'wpurl' ) . '/threex.html" target="_blank">iSarDesign</a></span>';
}
add_filter('admin_footer_text', 'remove_footer_admin');
/**
 * Add custom admin login header logo
 */
function isarch_custom_login_logo() {
//	echo '<style  type="text/css"> h1 a {  background-image:url(' . get_stylesheet_directory_uri() . '/images/logo-login.png)  !important; } </style>';
	echo '<style  type="text/css"> h1 a {  background-image:url(' . plugin_dir_url('isadmin') . 'isadmin/images/logo-login.png)  !important; } </style>';
}
add_action('login_head', 'isarch_custom_login_logo');

/**
 * Add custom Login Page styles - http://premium.wpmudev.org/blog/create-a-custom-wordpress-login-page/
 */
function isarch_custom_login_styles() {
//	echo '<link rel="stylesheet" type="text/css" href="' . get_stylesheet_directory_uri() . '/style-login.css" />';
	echo '<link rel="stylesheet" type="text/css" href="' . plugin_dir_url('isadmin') . 'isadmin/css/style-login.css" />';
}
add_action('login_head', 'isarch_custom_login_styles');

/**
 * Change the Login Logo URL - http://premium.wpmudev.org/blog/create-a-custom-wordpress-login-page/
 */
function isarch_login_logo_url() {
return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'isarch_login_logo_url' );

function isarch_login_logo_url_title() {
return 'Architetto Penne Pescara';
}
add_filter( 'login_headertitle', 'isarch_login_logo_url_title' );

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