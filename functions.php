<?php
/**
 * DELUX-Art functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage DELUX_Art
 * @since 1.0.0
 */

/**
 * DELUX-Art only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

if ( ! function_exists( 'dart_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function dart_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on DELUX-Art, use a find and replace
		 * to change 'dart' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'dart', get_template_directory() . '/languages' );

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
		set_post_thumbnail_size( 1568, 9999 );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'menu-1' => __( 'Primary', 'dart' ),
				'footer' => __( 'Footer Menu', 'dart' ),
				'social' => __( 'Social Links Menu', 'dart' ),
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
			)
		);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 190,
				'width'       => 190,
				'flex-width'  => false,
				'flex-height' => false,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __( 'Small', 'dart' ),
					'shortName' => __( 'S', 'dart' ),
					'size'      => 19.5,
					'slug'      => 'small',
				),
				array(
					'name'      => __( 'Normal', 'dart' ),
					'shortName' => __( 'M', 'dart' ),
					'size'      => 22,
					'slug'      => 'normal',
				),
				array(
					'name'      => __( 'Large', 'dart' ),
					'shortName' => __( 'L', 'dart' ),
					'size'      => 36.5,
					'slug'      => 'large',
				),
				array(
					'name'      => __( 'Huge', 'dart' ),
					'shortName' => __( 'XL', 'dart' ),
					'size'      => 49.5,
					'slug'      => 'huge',
				),
			)
		);

		// Editor color palette.
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Primary', 'dart' ),
					'slug'  => 'primary',
					'color' => dart_hsl_hex( 'default' === get_theme_mod( 'primary_color' ) ? 199 : get_theme_mod( 'primary_color_hue', 199 ), 100, 33 ),
				),
				array(
					'name'  => __( 'Secondary', 'dart' ),
					'slug'  => 'secondary',
					'color' => dart_hsl_hex( 'default' === get_theme_mod( 'primary_color' ) ? 199 : get_theme_mod( 'primary_color_hue', 199 ), 100, 23 ),
				),
				array(
					'name'  => __( 'Dark Gray', 'dart' ),
					'slug'  => 'dark-gray',
					'color' => '#111',
				),
				array(
					'name'  => __( 'Light Gray', 'dart' ),
					'slug'  => 'light-gray',
					'color' => '#767676',
				),
				array(
					'name'  => __( 'White', 'dart' ),
					'slug'  => 'white',
					'color' => '#FFF',
				),
			)
		);

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'dart_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dart_widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'Footer', 'dart' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'dart' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

}
add_action( 'widgets_init', 'dart_widgets_init' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width Content width.
 */
function dart_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'dart_content_width', 640 );
}
add_action( 'after_setup_theme', 'dart_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function dart_scripts() {
	wp_enqueue_style( 'dart-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );

	wp_style_add_data( 'dart-style', 'rtl', 'replace' );

	if ( has_nav_menu( 'menu-1' ) ) {
		wp_enqueue_script( 'dart-priority-menu', get_theme_file_uri( '/js/priority-menu.js' ), array(), '1.1', true );
		wp_enqueue_script( 'dart-touch-navigation', get_theme_file_uri( '/js/touch-keyboard-navigation.js' ), array(), '1.1', true );
    }

    function add_google_fonts() {
        wp_enqueue_style( 'google_web_fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i' );
    }


    wp_enqueue_style( 'dart-print-style', get_template_directory_uri() . '/print.css', array(), wp_get_theme()->get( 'Version' ), 'print' );

    wp_enqueue_style( 'dart-reset', get_template_directory_uri() . '/assets/css/reset.css', array(), wp_get_theme()->get( 'Version' ), 'print' );
    wp_enqueue_style( 'dart-glich', get_template_directory_uri() . '/assets/css/glich.css', array(), wp_get_theme()->get( 'Version' ), 'print' );
    wp_enqueue_style( 'dart-fa', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), wp_get_theme()->get( 'Version' ), 'print' );
    wp_enqueue_style( 'dart-basic-styles', get_template_directory_uri() . '/assets/css/styles.css', array(), wp_get_theme()->get( 'Version' ), 'print' );
    wp_enqueue_style( 'dart-animate', get_template_directory_uri() . '/assets/css/animate.css', array(), wp_get_theme()->get( 'Version' ), 'print' );
    wp_enqueue_style( 'dart-menu', get_template_directory_uri() . '/assets/css/dart-menu.css', array(), wp_get_theme()->get( 'Version' ), 'print' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
    }

    wp_enqueue_script( 'dart-script-sm', get_template_directory_uri() . '/assets/js/ScrollMagic.min.js','','1',true);
    wp_enqueue_script( 'dart-script-debug-sm', get_template_directory_uri() . '/assets/js/debug.addIndicators.min.js','','1',true);
    wp_enqueue_script( 'dart-script-wow', get_template_directory_uri() . '/assets/js/wow.min.js','','1',true);
    wp_enqueue_script( 'dart-script-paroller', get_template_directory_uri() . '/assets/js/jquery.paroller.min.js','','1',true);
    wp_enqueue_script( 'dart-scripts', get_template_directory_uri() . '/assets/js/scripts.js','','1',true);



// <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" crossorigin="anonymous"></script>
// <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>



}
add_action( 'wp_enqueue_scripts', 'dart_scripts', 'add_google_fonts' );

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function dart_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'dart_skip_link_focus_fix' );

/**
 * Enqueue supplemental block editor styles.
 */
function dart_editor_customizer_styles() {

	wp_enqueue_style( 'dart-editor-customizer-styles', get_theme_file_uri( '/style-editor-customizer.css' ), false, '1.1', 'all' );

	if ( 'custom' === get_theme_mod( 'primary_color' ) ) {
		// Include color patterns.
		require_once get_parent_theme_file_path( '/inc/color-patterns.php' );
		wp_add_inline_style( 'dart-editor-customizer-styles', dart_custom_colors_css() );
	}
}
add_action( 'enqueue_block_editor_assets', 'dart_editor_customizer_styles' );

/**
 * Display custom color CSS in customizer and on frontend.
 */
function dart_colors_css_wrap() {

	// Only include custom colors in customizer or frontend.
	if ( ( ! is_customize_preview() && 'default' === get_theme_mod( 'primary_color', 'default' ) ) || is_admin() ) {
		return;
	}

	require_once get_parent_theme_file_path( '/inc/color-patterns.php' );

	$primary_color = 199;
	if ( 'default' !== get_theme_mod( 'primary_color', 'default' ) ) {
		$primary_color = get_theme_mod( 'primary_color_hue', 199 );
	}
	?>

	<style type="text/css" id="custom-theme-colors" <?php echo is_customize_preview() ? 'data-hue="' . absint( $primary_color ) . '"' : ''; ?>>
		<?php echo dart_custom_colors_css(); ?>
	</style>
	<?php
}
add_action( 'wp_head', 'dart_colors_css_wrap' );

/**
 * SVG Icons class.
 */
require get_template_directory() . '/classes/class-dart-svg-icons.php';

/**
 * Custom Comment Walker template.
 */
require get_template_directory() . '/classes/class-dart-walker-comment.php';

/**
 * Enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * SVG Icons related functions.
 */
require get_template_directory() . '/inc/icon-functions.php';

/**
 * Custom template tags for the theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';




register_nav_menus(array(
	'mibile_nav'    => 'Мобильная навигация',

// Для полноэкранного меню
	'full_nav_1'    => 'Основное меню (Шапка)',
	'full_nav_2'    => 'Меню #2 (Все курсы)',
// Для полноэкранного меню
));
