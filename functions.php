<?php
/**
 * web14devsn functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package web14devsn
 */

define('PATH_SN' , get_bloginfo('template_url'));

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'web14devsn_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function web14devsn_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on web14devsn, use a find and replace
		 * to change 'web14devsn' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'web14devsn', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-primary' => esc_html__( 'Menu główne', 'web14devsn' ),
				'menu-top-header' => esc_html__( 'Top menu', 'web14devsn' ),

				// 'menu-footer-1' => esc_html__( 'Menu footer 1', 'web14devsn' ),
				// 'menu-footer-1' => esc_html__( 'Menu footer 1', 'web14devsn' ),
				
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'web14devsn_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// Woocommerce theme support
		add_theme_support( 'woocommerce');
	}
endif;
add_action( 'after_setup_theme', 'web14devsn_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function web14devsn_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'web14devsn_content_width', 640 );
}
add_action( 'after_setup_theme', 'web14devsn_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function web14devsn_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Blog sidebar', 'web14devsn' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'web14devsn' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	// Shop sidebar
	register_sidebar(
		array(
			'name'          => esc_html__( 'Shop sidebar', 'web14devsn' ),
			'id'            => 'sidebar-shop',
			'description'   => esc_html__( 'Add widgets here.', 'web14devsn' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	// Footer custom sidebars

	// Widget 1
	register_sidebar(
		array(
			'name'          => esc_html__( 'Widget 1', 'web14devsn' ),
			'id'            => 'f-widget-1',
			'description'   => esc_html__( '', 'web14devsn' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	// Widget 2
	register_sidebar(
		array(
			'name'          => esc_html__( 'Widget 2', 'web14devsn' ),
			'id'            => 'f-widget-2',
			'description'   => esc_html__( '', 'web14devsn' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	// Widget 3
	register_sidebar(
		array(
			'name'          => esc_html__( 'Widget 3', 'web14devsn' ),
			'id'            => 'f-widget-3',
			'description'   => esc_html__( '', 'web14devsn' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	// Widget 4
	register_sidebar(
		array(
			'name'          => esc_html__( 'Widget 4', 'web14devsn' ),
			'id'            => 'f-widget-4',
			'description'   => esc_html__( '', 'web14devsn' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	// Wishlist icon 
	register_sidebar(
		array(
			'name'          => esc_html__( 'Lista życzeń', 'web14devsn' ),
			'id'            => 'h-widget-1',
			'description'   => esc_html__( '', 'web14devsn' ),
			'before_widget' => '<section id="%1$s" class="header-widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);



}
add_action( 'widgets_init', 'web14devsn_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function web14devsn_scripts() {
	// Fonts
	
   wp_enqueue_style( 'montserrat-google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap', false );
   
	wp_enqueue_style( 'web14devsn-style-bootstrap', get_template_directory_uri().'/bootstrap/css/bootstrap.min.css', array(), _S_VERSION );
	
	wp_enqueue_style( 'web14devsn-style-slick',get_template_directory_uri().'/plugins/slick-slider/slick.css', array(), _S_VERSION );

	wp_enqueue_style( 'web14devsn-style-css', get_template_directory_uri().'/dist/css/style.css', array(), _S_VERSION );

	// Add js scripts
	wp_enqueue_script( 'web14devsn-popper-js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js', array("jquery"), _S_VERSION, true );

	wp_enqueue_script( 'web14devsn-bootstrap-js', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array("jquery"), _S_VERSION, true );

	wp_enqueue_script( 'web14devsn-js-slick',get_template_directory_uri().'/plugins/slick-slider/slick.min.js', array("jquery"), _S_VERSION , true);


	wp_enqueue_script( 'web14devsn-main-js', get_template_directory_uri() . '/dist/js/main.js', array("jquery"), _S_VERSION, true );

	
}
add_action( 'wp_enqueue_scripts', 'web14devsn_scripts' );


// Disable gutenberg editor
add_filter( 'use_block_editor_for_post', '__return_false' );
add_filter( 'use_widgets_block_editor', '__return_false' );

/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
	require_once get_template_directory() . '/bootstrap_5_wp_nav_menu_walker.php';

}
add_action( 'after_setup_theme', 'register_navwalker' );

// Include ACF plugin
// Define path and URL to the ACF plugin.
define( 'MY_ACF_PATH', get_stylesheet_directory() . '/includes/acf/' );
define( 'MY_ACF_URL', get_stylesheet_directory_uri() . '/includes/acf/' );

// Include the ACF plugin.
include_once( MY_ACF_PATH . 'acf.php' );

// Customize the url setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'my_acf_settings_url');
function my_acf_settings_url( $url ) {
    return MY_ACF_URL;
}


// ACF local JSON
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
 
function my_acf_json_save_point( $path ) {

    $path = get_stylesheet_directory() . '/acf-json';
    return $path;
    
}

// Woocommerce
include get_stylesheet_directory().'/inc/woocommerce.php';

// Custom shortcodes
// include get_stylesheet_directory().'/inc/shortcodes.php';


// Change the default excerpt length to 20 words.
function wpexplorer_excerpt_length( $length ) {
    $length = 15;
    return $length;
}
add_filter( 'excerpt_length', 'wpexplorer_excerpt_length', PHP_INT_MAX );

// Excerpt more
add_filter('excerpt_more', 'change_excerpt_more_sn', 10);

function change_excerpt_more_sn($more) {
    return '...';
}

/*
** ACF Options page
*/


// if( function_exists('acf_add_options_page') ) {

//     acf_add_options_page(array(
//         'page_title'    => 'Konfiguracja szablonu',
//         'menu_title'    => 'Konfiguracja szablonu',
//         'menu_slug'     => 'theme-general-settings-sn',
//         'capability'    => 'edit_posts',
//         'redirect'      => false
//     ));

//     acf_add_options_sub_page(array(
//         'page_title'    => 'Header',
//         'menu_title'    => 'Header',
//         'parent_slug'   => 'theme-general-settings-sn',
//     ));

//     acf_add_options_sub_page(array(
//         'page_title'    => 'Footer',
//         'menu_title'    => 'Footer',
//         'parent_slug'   => 'theme-general-settings-sn',
//     ));

// }