<?php
/**
 * delux-art functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package delux-art
 */

if ( ! function_exists( 'delux_art_setup' ) ) :
	function delux_art_setup() {
		load_theme_textdomain( 'delux-art', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );

		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'delux-art' ),
		) );

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
	wp_enqueue_style( 'dart-reset', get_template_directory_uri() . '/assets/css/reset.css', array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'dart-glich', get_template_directory_uri() . '/assets/css/glich.css', array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'dart-slick', get_template_directory_uri() . '/assets/css/slick.css', array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'dart-slick-theme', get_template_directory_uri() . '/assets/css/slick-theme.css', array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'dart-fa', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), wp_get_theme()->get( 'Version' ) );
    // wp_enqueue_style( 'dart-basic-styles', get_template_directory_uri() . '/assets/css/styles.css', array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'dart-basic-styles', get_template_directory_uri() . '/css/styles.css?1', array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'dart-animate', get_template_directory_uri() . '/assets/css/animate.css', array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'dart-menu', get_template_directory_uri() . '/css/dart-menu.css', array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'dart-fancybox', get_template_directory_uri() . '/assets/css/jquery.fancybox.min.css', array(), wp_get_theme()->get( 'Version' ) );

	wp_enqueue_script( 'delux-art-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'delux-art-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'dart-script-sm', get_template_directory_uri() . '/assets/js/ScrollMagic.min.js','','1',true);
    wp_enqueue_script( 'dart-script-debug-sm', get_template_directory_uri() . '/assets/js/debug.addIndicators.min.js','','1',true);
    wp_enqueue_script( 'dart-script-wow', get_template_directory_uri() . '/assets/js/wow.min.js','','1',true);
    wp_enqueue_script( 'dart-script-paroller', get_template_directory_uri() . '/assets/js/jquery.paroller.min.js','','1',true);
    wp_enqueue_script( 'dart-slick', get_template_directory_uri() . '/assets/js/slick.min.js','','1',true);
    wp_enqueue_script( 'dart-fancybox', get_template_directory_uri() . '/assets/js/jquery.fancybox.min.js','','1',true);
    // wp_enqueue_script( 'dart-modernizr-custom', get_template_directory_uri() . '/assets/js/modernizr-custom.js','','1',true);
    wp_enqueue_script( 'dart-preloader', get_template_directory_uri() . '/assets/js/preloader.js','','1',true);
    wp_enqueue_script( 'dart-scripts', get_template_directory_uri() . '/assets/js/scripts.js','','1',true);
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'delux_art_scripts' );
add_filter('style_loader_tag', 'codeless_remove_type_attr', 10, 2);
add_filter('script_loader_tag', 'codeless_remove_type_attr', 10, 2);

function styles_for_admin(){
    wp_enqueue_style("custom-style-admin",get_bloginfo('stylesheet_directory')."/assets/css/for_admin.css");
}
add_action('admin_head', 'styles_for_admin');

function codeless_remove_type_attr($tag, $handle) {
    return preg_replace( "/type=['\"]text\/(javascript|css)['\"]/", '', $tag );
}
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';

if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

register_nav_menus(array(
	'mibile_nav'    => 'Мобильная навигация',
// Для полноэкранного меню
	'full_nav_1'    => 'Основное меню (Full Screen)',
	'services_nav_1'    => 'Наши сулуги - Разработка',
	'services_nav_2'    => 'Наши сулуги - Дизайн',
	'services_nav_3'    => 'Наши сулуги - Прочее',
// Для полноэкранного меню
));


// For custom fields
require_once dirname( __FILE__ ) . '/inc/mic-fields/menu-item-custom-fields.php';
require_once dirname( __FILE__ ) . '/inc/custom-walker.php';

// Options page
require get_template_directory() . '/inc/options-page.php';

// For translate
pll_register_string('Copyright', 'Copyright');

//Оставить заявку
pll_register_string('add_order', 'add_order');
// Сайт под ключ
pll_register_string('txt_loader_1', 'txt_loader_1');
// Интернет-магазин
pll_register_string('txt_loader_2', 'txt_loader_2');
// Landing page
pll_register_string('txt_loader_3', 'txt_loader_3');
// Персональный блог
pll_register_string('txt_loader_4', 'txt_loader_4');
// Дизайн сайта
pll_register_string('txt_loader_5', 'txt_loader_5');
// Логотип
pll_register_string('txt_loader_6', 'txt_loader_6');
// UI/UX
pll_register_string('txt_loader_7', 'txt_loader_7');
// Мобильное приложение
pll_register_string('txt_loader_8', 'txt_loader_8');
// Так-же по данному номеру мы есть в Viber, WhatsApp, Telegram
pll_register_string('modal_phone', 'modal_phone');
// Если нет возможности говорить - всегда можно написать!
pll_register_string('modal_mail', 'modal_mail');
// Обратный звонок
pll_register_string('back_call', 'back_call');
// Обратная связь
pll_register_string('feed_back', 'feed_back');
// Контакты
pll_register_string('contacts', 'contacts');

// Отключение визуального редактора
function disable_visual_editor($can)
{
    global $post;

	$post_type = get_post_type($post);
	if ($post_type == 'page') {
        return false;
    }

    return $can;
}

add_filter('user_can_richedit', 'disable_visual_editor');

// Function that will return our Wordpress menu
function list_menu($atts, $content = null) {
	extract(shortcode_atts(array(
		'menu'            => '',
		'container'       => 'div',
		'container_class' => '',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'depth'           => 0,
		'walker'          => '',
		'theme_location'  => ''),
		$atts));

	return wp_nav_menu( array(
		'menu'            => $menu,
		'container'       => $container,
		'container_class' => $container_class,
		'container_id'    => $container_id,
		'menu_class'      => $menu_class,
		'menu_id'         => $menu_id,
		'echo'            => false,
		'fallback_cb'     => $fallback_cb,
		'before'          => $before,
		'after'           => $after,
		'link_before'     => $link_before,
		'link_after'      => $link_after,
		'depth'           => $depth,
		'walker'          => $walker,
		'theme_location'  => $theme_location));
}
//Create the shortcode
add_shortcode("listmenu", "list_menu");


add_action( 'init', 'register_portfolio_post_type' );
function register_portfolio_post_type() {
	// Раздел вопроса - portfoliocat
	register_taxonomy('portfoliocat', array('portfolio'), array(
		'label'                 => 'Категории', // определяется параметром $labels->name
		'labels'                => array(
			'name'              => 'Категории работ',
			'singular_name'     => 'Категории',
			'search_items'      => 'Искать категорию',
			'all_items'         => 'Все категории',
			'parent_item'       => 'Родит. категория',
			'parent_item_colon' => 'Родит. категория:',
			'edit_item'         => 'Ред. категорию',
			'update_item'       => 'Обновить категорию',
			'add_new_item'      => 'Добавить категорию',
			'new_item_name'     => 'Новый Раздел вопроса',
			'menu_name'         => 'Категории',
		),
		'description'           => 'Рубрики для портфолио', // описание таксономии
		'public'                => true,
		'show_in_nav_menus'     => false, // равен аргументу public
		'show_ui'               => true, // равен аргументу public
		'show_tagcloud'         => false, // равен аргументу show_ui
		'hierarchical'          => true,
		'rewrite'               => array('slug'=>'portfolio', 'hierarchical'=>false, 'with_front'=>false, 'feed'=>false ),
		'show_admin_column'     => true, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
    ) );

	// тип записи - вопросы - portfolio
	register_post_type('portfolio', array(
		'label'               => 'Портфолио',
		'labels'              => array(
			'name'          => 'Портфолио',
			'singular_name' => 'Портфолио',
			'menu_name'     => 'Портфолио',
			'all_items'     => 'Все работы',
			'add_new'       => 'Добавить работу',
			'add_new_item'  => 'Добавить новую работу',
			'edit'          => 'Редактировать',
			'edit_item'     => 'Редактировать работу',
			'new_item'      => 'Новая работа',
        ),
        'menu_icon'           => 'dashicons-list-view',
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_rest'        => false,
		'rest_base'           => '',
		'show_in_menu'        => true,
		'exclude_from_search' => false,
		'capability_type'     => 'post',
		'map_meta_cap'        => true,
		'hierarchical'        => false,
		'rewrite'             => array( 'slug'=>'portfolio/%portfoliocat%', 'with_front'=>false, 'pages'=>false, 'feeds'=>false, 'feed'=>false ),
		'has_archive'         => true,
		'query_var'           => true,
		'supports'            => array( 'title', 'editor' ),
		'taxonomies'          => array( 'portfoliocat' ),
	) );

}
## Отфильтруем ЧПУ произвольного типа
add_filter('post_type_link', 'portfolio_permalink', 1, 2);
function portfolio_permalink( $permalink, $post ){
	if( strpos($permalink, '%portfoliocat%') === false )
		return $permalink;

	$terms = get_the_terms($post, 'portfoliocat');
	if( ! is_wp_error($terms) && !empty($terms) && is_object($terms[0]) )
		$term_slug = array_pop($terms)->slug;
	else
		$term_slug = 'cat';

	return str_replace('%portfoliocat%', $term_slug, $permalink );
}



add_filter( 'astra_single_post_navigation_enabled', '__return_false' );





add_shortcode('portfolio', 'my_shortcode_function');
function my_shortcode_function() {
    $wp_query = new WP_Query( [
      'post_type'      => 'portfolio',
      'posts_per_page' => 6,
      'paged'          => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1
    ] );
    ob_start();
    echo '<div class="portfolio">';
    if ( $wp_query->have_posts() ) :
      while ( $wp_query->have_posts() ) : $wp_query->the_post();
        get_template_part( 'template-parts/portfolio', get_post_format() );
      endwhile;
    else :
      get_template_part( 'template-parts/content', 'none' );
    endif;
    echo '</div>';

    // posts_nav_link();
    $out = ob_get_clean();

    return $out;
  }












add_shortcode('portfolio-mini', 'my_shortcode_function_mini');
function my_shortcode_function_mini() {
	global $wp_query;
	$wp_query = new WP_Query(array(
		// 'category_name' => 'portfolio',
		'post_type' => 'portfolio',
		'posts_per_page' => '6',
		// 'paged' => get_query_var('paged') ?: 1
	));
ob_start();
echo '<div class="portfolio">';
	if ( have_posts() ) :
	        while ( have_posts() ) : the_post();

	            get_template_part( 'template-parts/portfolio', get_post_format() );

	        endwhile;
	    else :
	        get_template_part( 'template-parts/content', 'none' );
	    endif;
echo '</div>';

	wp_reset_query(); // сброс $wp_query
	$out = ob_get_clean();
	return $out;
}


// Чистим от муосра добявляемого WP
function remove_wpautop(){
   $pages = array(66);
   if (is_page($pages)){
      remove_filter('the_content', 'wpautop');
   }
}
add_action('wp_head', 'remove_wpautop');

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

function remove_recent_comments_style() {
    global $wp_widget_factory;
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}
add_action('widgets_init', 'remove_recent_comments_style');

add_action( 'template_redirect', function(){
    ob_start( function( $buffer ){
        $buffer = str_replace( array( 'type="text/javascript"', "type='text/javascript'" ), '', $buffer );
        return $buffer;
    });
});
// End - Чистим от муосра добявляемого WP
