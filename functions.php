<?php
/**
 * delux-art functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package delux-art
 */

if ( ! function_exists( 'delux_art_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function delux_art_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on delux-art, use a find and replace
		 * to change 'delux-art' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'delux-art', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'delux-art' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'delux_art_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'delux_art_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function delux_art_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'delux_art_content_width', 640 );
}
add_action( 'after_setup_theme', 'delux_art_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function delux_art_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'delux-art' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'delux-art' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'delux_art_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function delux_art_scripts() {
	wp_enqueue_style( 'delux-art-style', get_stylesheet_uri() );

	wp_enqueue_style( 'google_web_fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i' );
	wp_enqueue_style( 'dart-reset', get_template_directory_uri() . '/assets/css/reset.css', array(), wp_get_theme()->get( 'Version' ), 'print' );
    wp_enqueue_style( 'dart-glich', get_template_directory_uri() . '/assets/css/glich.css', array(), wp_get_theme()->get( 'Version' ), 'print' );
    wp_enqueue_style( 'dart-fa', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), wp_get_theme()->get( 'Version' ), 'print' );
    wp_enqueue_style( 'dart-basic-styles', get_template_directory_uri() . '/assets/css/styles.css', array(), wp_get_theme()->get( 'Version' ), 'print' );
    wp_enqueue_style( 'dart-animate', get_template_directory_uri() . '/assets/css/animate.css', array(), wp_get_theme()->get( 'Version' ), 'print' );
    wp_enqueue_style( 'dart-menu', get_template_directory_uri() . '/assets/css/dart-menu.css', array(), wp_get_theme()->get( 'Version' ), 'print' );

	wp_enqueue_script( 'delux-art-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'delux-art-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'dart-script-sm', get_template_directory_uri() . '/assets/js/ScrollMagic.min.js','','1',true);
    wp_enqueue_script( 'dart-script-debug-sm', get_template_directory_uri() . '/assets/js/debug.addIndicators.min.js','','1',true);
    wp_enqueue_script( 'dart-script-wow', get_template_directory_uri() . '/assets/js/wow.min.js','','1',true);
    wp_enqueue_script( 'dart-script-paroller', get_template_directory_uri() . '/assets/js/jquery.paroller.min.js','','1',true);
    wp_enqueue_script( 'dart-scripts', get_template_directory_uri() . '/assets/js/scripts.js','','1',true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'delux_art_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}




register_nav_menus(array(
	'mibile_nav'    => 'Мобильная навигация',

// Для полноэкранного меню
	'full_nav_1'    => 'Основное меню (Шапка)',
	'full_nav_2'    => 'Меню #2',
	'full_nav_3'    => 'Меню #3',
// Для полноэкранного меню
));



function new_taxonomies_for_pages() {
 register_taxonomy_for_object_type( 'post_tag', 'page' );
 register_taxonomy_for_object_type( 'category', 'page' );
 }
add_action( 'init', 'new_taxonomies_for_pages' );

if ( ! is_admin() ) {
 add_action( 'pre_get_posts', 'tag_cat_archives' );
}
function tag_cat_archives( $wp_query ) {
$my_taxonomies_array = array('post','page');
 if ( $wp_query->get( 'category_name' ) || $wp_query->get( 'cat' ) )
 $wp_query->set( 'post_type', $my_taxonomies_array );

 if ( $wp_query->get( 'tag' ) )
 $wp_query->set( 'post_type', $my_taxonomies_array );
}






// add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);
// function my_wp_nav_menu_objects( $items, $args ) {


// 	foreach( $items as &$item ) {

//         $data_wow_delay = get_field('data-wow-delay', $item);

// 		if( $data_wow_delay ) {
//             $atts['data-wow-delay'] = ' '.$data_wow_delay.' ';
// 		}

// 	}

// 	return $items;

// }




// Placement of new menu
add_action( 'genesis_before_loop', 'themprefix_walker_menu' );
/**
 * Add in Walker Menu
 *
 * @package   Genesis Walker Menu
 * @author    Neil Gee
 * @link      http://wpbeaches.com/adding-data-attribute-menu-list-item-via-walker-class/
 * @copyright (c)2016, Neil Gee
 */
// New menu
function themprefix_walker_menu () {
 	$args = array(
		'theme_location'  => 'tertiary',
 		'container'       => 'nav',
		'container_class' => 'walker-menu-container',
		'menu_class'      => 'wrap menu genesis-nav-menu menu-tertiary',
		'depth'           => 0, //change to 1 for no submenu levels
		'walker'	  => new WPB_Custom_Walker // calling in the custom walker menu as in theme inc/custom-walker.php
		);

	wp_nav_menu( $args );
}

// Genesis support for extra menu
add_theme_support ( 'genesis-menus' , array (
                                      'primary'   => 'Primary Navigation Menu' ,
                                      'secondary' => 'Secondary Navigation Menu' ,
                                      'tertiary'  => 'Walker Navigation Menu'
                             	      )
		  );



// Bring in my custom walker class - filed in my themes inc/
require_once dirname( __FILE__ ) . '/inc/extend-walker-class.php';
