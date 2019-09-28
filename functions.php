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


require_once dirname( __FILE__ ) . '/inc/menu-item-custom-fields-example.php';
































class Drop_Menu_Walker extends Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu\" data-dropdown-menu>\n";
    }
    // adds a has_children conditional to $args
    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
        $id_field = $this->db_fields['id'];
        if ( is_object( $args[0] ) ) {
            $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
        }
        return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        // call global db query
        global $wpdb;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        /**
         * Filter the CSS class(es) applied to a menu item's list item element.
         *
         * @since 3.0.0
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param array  $classes The CSS classes that are applied to the menu item's `<li>` element.
         * @param object $item    The current menu item.
         * @param array  $args    An array of {@see wp_nav_menu()} arguments.
         * @param int    $depth   Depth of menu item. Used for padding.
         */
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
        /**
         * Filter the ID applied to a menu item's list item element.
         *
         * @since 3.0.1
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param string $menu_id The ID that is applied to the menu item's `<li>` element.
         * @param object $item    The current menu item.
         * @param array  $args    An array of {@see wp_nav_menu()} arguments.
         * @param int    $depth   Depth of menu item. Used for padding.
         */
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
        // if the list item has children add a data attribute
        $li_attributes = $args->has_children ? ' data-dropdown' : '';
        $output .= $indent . '<li' . $id . $class_names . $li_attributes . '>';
        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';
        /**
         * Filter the HTML attributes applied to a menu item's anchor element.
         *
         * @since 3.6.0
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param array $atts {
         *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
         *
         *     @type string $title  Title attribute.
         *     @type string $target Target attribute.
         *     @type string $rel    The rel attribute.
         *     @type string $href   The href attribute.
         * }
         * @param object $item  The current menu item.
         * @param array  $args  An array of {@see wp_nav_menu()} arguments.
         * @param int    $depth Depth of menu item. Used for padding.
         */
        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }
        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        /** This filter is documented in wp-includes/post-template.php */
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;
        /**
         * Filter a menu item's starting output.
         *
         * The menu item's starting output only includes `$args->before`, the opening `<a>`,
         * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
         * no filter for modifying the opening and closing `<li>` for a menu item.
         *
         * @since 3.0.0
         *
         * @param string $item_output The menu item's starting HTML output.
         * @param object $item        Menu item data object.
         * @param int    $depth       Depth of menu item. Used for padding.
         * @param array  $args        An array of {@see wp_nav_menu()} arguments.
         */
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}
/**
 * Front End Markup for the navigation menu
 *
 * The markup below assumes you will add your own styling and theme location
 * for the menu. Otherwise you can use drops basic styling and change the
 * class and IDs accordingly
 **/





