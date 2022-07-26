<?php

/**
 * Do not edit anything in this file unless you know what you're doing
 */

use Roots\Sage\Config;
use Roots\Sage\Container;

/**
 * Helper function for prettying up errors
 * @param string $message
 * @param string $subtitle
 * @param string $title
 */
$sage_error = function ($message, $subtitle = '', $title = '') {
    $title = $title ?: __('Sage &rsaquo; Error', 'sage');
    $footer = '<a href="https://roots.io/sage/docs/">roots.io/sage/docs/</a>';
    $message = "<h1>{$title}<br><small>{$subtitle}</small></h1><p>{$message}</p><p>{$footer}</p>";
    wp_die($message, $title);
};

/**
 * Ensure compatible version of PHP is used
 */
if (version_compare('7.1', phpversion(), '>=')) {
    $sage_error(__('You must be using PHP 7.1 or greater.', 'sage'), __('Invalid PHP version', 'sage'));
}

/**
 * Ensure compatible version of WordPress is used
 */
if (version_compare('4.7.0', get_bloginfo('version'), '>=')) {
    $sage_error(__('You must be using WordPress 4.7.0 or greater.', 'sage'), __('Invalid WordPress version', 'sage'));
}

/**
 * Ensure dependencies are loaded
 */
if (!class_exists('Roots\\Sage\\Container')) {
    if (!file_exists($composer = __DIR__.'/../vendor/autoload.php')) {
        $sage_error(
            __('You must run <code>composer install</code> from the Sage directory.', 'sage'),
            __('Autoloader not found.', 'sage')
        );
    }
    require_once $composer;
}

/**
 * Sage required files
 *
 * The mapped array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 */
array_map(function ($file) use ($sage_error) {
    $file = "../app/{$file}.php";
    if (!locate_template($file, true, true)) {
        $sage_error(sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file), 'File not found');
    }
}, ['helpers', 'setup', 'filters', 'admin', 'walker']);

/**
 * Here's what's happening with these hooks:
 * 1. WordPress initially detects theme in themes/sage/resources
 * 2. Upon activation, we tell WordPress that the theme is actually in themes/sage/resources/views
 * 3. When we call get_template_directory() or get_template_directory_uri(), we point it back to themes/sage/resources
 *
 * We do this so that the Template Hierarchy will look in themes/sage/resources/views for core WordPress themes
 * But functions.php, style.css, and index.php are all still located in themes/sage/resources
 *
 * This is not compatible with the WordPress Customizer theme preview prior to theme activation
 *
 * get_template_directory()   -> /srv/www/example.com/current/web/app/themes/sage/resources
 * get_stylesheet_directory() -> /srv/www/example.com/current/web/app/themes/sage/resources
 * locate_template()
 * ├── STYLESHEETPATH         -> /srv/www/example.com/current/web/app/themes/sage/resources/views
 * └── TEMPLATEPATH           -> /srv/www/example.com/current/web/app/themes/sage/resources
 */
array_map(
    'add_filter',
    ['theme_file_path', 'theme_file_uri', 'parent_theme_file_path', 'parent_theme_file_uri'],
    array_fill(0, 4, 'dirname')
);
Container::getInstance()
    ->bindIf('config', function () {
        return new Config([
            'assets' => require dirname(__DIR__).'/config/assets.php',
            'theme' => require dirname(__DIR__).'/config/theme.php',
            'view' => require dirname(__DIR__).'/config/view.php',
        ]);
    }, true);


// Theme Setup

function add_file_types_to_uploads($file_types){
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types = array_merge($file_types, $new_filetypes );
	return $file_types;
	}
	add_filter('upload_mimes', 'add_file_types_to_uploads');

	add_image_size( 'wesrom-thumb', 425, 303, true );
	add_image_size( 'wesrom-large', 1592, 547, true );

if( function_exists('acf_add_options_page') ) {
	// arc General Settings
	$general_settings   = array(
															'page_title' 	=> __( 'Theme Settings', 'wesrom' ),
															'menu_title'	=> __( 'Theme Settings', 'wesrom' ),
															'menu_slug' 	=> 'general-settings',
															'capability'	=> 'edit_posts',
															'redirect'      => false,
															'icon_url'      => 'dashicons-admin-settings'
													);
	acf_add_options_page( $general_settings );
}

/*
 * Remove wp logo from admin bar
 */
function wesrom_remove_wp_logo() {
	global $wp_admin_bar;

	if( class_exists('acf') ) {
			$wp_help  = get_field( 'wesrom_options_admin_wp_help', 'option' );
			if( empty( $wp_help ) ) {
					$wp_admin_bar->remove_menu('wp-logo');
			}
	}
}
add_action( 'wp_before_admin_bar_render', 'wesrom_remove_wp_logo' );
/*
* Custom login logo
*/
function wesrom_custom_login_logo() {
	if( class_exists('acf') ) {
			$wp_login_logo      = get_field( 'wesrom_options_admin_login_logo', 'option' );
			$wp_login_w         = get_field( 'wesrom_options_admin_width', 'option' );
			$wp_login_h         = get_field( 'wesrom_options_admin_height', 'option' );
			$wp_login_bg        = get_field( 'wesrom_options_admin_bg', 'option' );
			$wp_login_btn_c     = get_field( 'wesrom_options_admin_buton_color', 'option' );
			$wp_login_btn_c_h   = get_field( 'wesrom_options_admin_buton_color_hover', 'option' );
			if( !empty( $wp_login_logo ) ) {
?>
			<style type="text/css">
					.login h1 a {
							background-image: url('<?php echo $wp_login_logo; ?>') !important;
							background-size: <?php echo $wp_login_w.'px'; ?> auto !important;
							height: <?php echo $wp_login_h.'px'; ?> !important;
							width: <?php echo $wp_login_w.'px'; ?> !important;
					}
			</style>
<?php
			}
			if( !empty( $wp_login_bg ) ){
?>
			<style type="text/css">
					body.login{ background: #133759 url("<?php echo $wp_login_bg; ?>") no-repeat center; background-size: cover;}
					body.login form {background: rgba(0, 0, 0, 0.2);padding: 40px;}
	  .login form {margin-top: 20px; margin-left: 0;padding: 26px 24px 34px;font-weight: 400;overflow: hidden;background: #fff;border: 1px solid #c3c4c7;box-shadow: 0 1px 3px rgb(0 0 0 / 4%);}
	  body.login #login form p {margin-bottom: 15px;}
	  body.login #login {width: 460px;}
	  .login #nav a, .login #backtoblog a {color:#fff !important;margin: 24px 0 0 0; font-weight:500}
	  .login label {font-size: 15px;line-height: 1.5;display: inline-block;margin-bottom: 3px;color: #fff;font-weight:500}
	  .login a.privacy-policy-link{color:#000; font-weight:500}
	  body.login div#login form#loginform input[type=password], .login input[type=text]{padding:12px 16px !important}
					body.login div#login form#loginform input#wp-submit {background-color: <?php echo $wp_login_btn_c; ?> !important;}
					body.login div#login form#loginform input#wp-submit:hover {background-color: <?php echo $wp_login_btn_c_h; ?> !important;}
			</style>
<?php
			}
	}
}
add_action( 'login_enqueue_scripts', 'wesrom_custom_login_logo' );
/*
* Change custom login page url
*/
function wesrom_loginpage_custom_link() {
	$site_url = esc_url( home_url( '/' ) );
	return $site_url;
}
add_filter( 'login_headerurl', 'wesrom_loginpage_custom_link' );
/*
* Change title on logo
*/
function wesrom_change_title_on_logo() {
	$site_title = get_bloginfo( 'name' );
	return $site_title;
}
add_filter( 'login_headertext', 'wesrom_change_title_on_logo' );
/*
* Change admin your favicon
*/
function wesrom_admin_favicon() {
	if( class_exists('acf') ) {
			$favicon_url        = get_field( 'wesrom_options_admin_favicon', 'option' );
			if( !empty( $favicon_url ) ){
					echo '<link rel="icon" type="image/x-icon" href="' . $favicon_url . '" />';
			}
	}
}
add_action('login_head', 'wesrom_admin_favicon');
add_action('admin_head', 'wesrom_admin_favicon');
add_action('wp_head', 'wesrom_admin_favicon'); 

function ad_login_footer() { $ref = wp_get_referer(); if ($ref) : ?>
<script type="text/javascript">
    jQuery(document).ready(function($){
            jQuery("p#backtoblog a").attr("href", 'https://www.linkedin.com/in/rajan-gupta-webdeveloper/');
            jQuery("p#backtoblog a").empty();
    });
</script>
<?php endif; }
add_action('login_footer', 'ad_login_footer');

function origo_custom_admin_footer() {
    _e( '<span id="footer-thankyou">Designed & developed by <a href="https://www.linkedin.com/in/rajan-gupta-webdeveloper/" style="color:#f47c30">Rajan Gupta</a>', 'wesrom' );
}
add_filter( 'admin_footer_text', 'origo_custom_admin_footer' );


// Our custom post type function
function service_posttype() {
  
	register_post_type( 'services',
	// CPT Options
			array(
					'labels' => array(
							'name' => __( 'Services' ),
							'singular_name' => __( 'Service' )
					),
					'public' => true,
					'has_archive' => true,
					'rewrite' => array('slug' => 'services'),
					'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
					'show_in_rest' => true,
					'menu_icon'           => 'dashicons-share',


			)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'service_posttype' );