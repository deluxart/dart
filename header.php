<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package delux-art
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0,  user-scalable=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">

    <link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.png">
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/touch-icon-iphone.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/assets/images/touch-icon-ipad.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/assets/images/touch-icon-iphone-retina.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/assets/images/touch-icon-ipad-retina.png">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header>
	<div class="container">
		<div><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
			<!-- <img src="images/logo.svg" class="logo" alt="DELUX-Art"> -->
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100.87 23.37"><defs><style>.cls-1{fill:#ffc000;}</style></defs><title>DELUX-Art</title><g id="Слой_2" data-name="layer_2"><g data-name="layer_1"><path d="M12.28,18.51H9.08V17a4.57,4.57,0,0,1-3.73,1.85A4.92,4.92,0,0,1,1.5,17.12,6.73,6.73,0,0,1,0,12.48,6.8,6.8,0,0,1,1.5,7.86,4.87,4.87,0,0,1,5.35,6.13,4.48,4.48,0,0,1,9.08,8V1.83h3.2ZM6.33,16a3.48,3.48,0,0,0,1.58-.39,3,3,0,0,0,1.17-1V10.33a3,3,0,0,0-1.17-1A3.49,3.49,0,0,0,6.33,9a2.78,2.78,0,0,0-2.2,1,3.74,3.74,0,0,0-.85,2.55A3.7,3.7,0,0,0,4.13,15,2.78,2.78,0,0,0,6.33,16Z"/><path d="M21.1,18.81a6.41,6.41,0,0,1-4.62-1.75,6.08,6.08,0,0,1-1.83-4.6A6.23,6.23,0,0,1,16.41,8,6,6,0,0,1,20.9,6.13,5.64,5.64,0,0,1,25.27,8,6.87,6.87,0,0,1,27,12.78v.7H18a3.06,3.06,0,0,0,1.08,2,3.53,3.53,0,0,0,2.4.8A5.33,5.33,0,0,0,23.19,16a3.86,3.86,0,0,0,1.49-.87l1.4,2A7.08,7.08,0,0,1,21.1,18.81Zm2.77-7.48a3.05,3.05,0,0,0-.81-1.85,2.75,2.75,0,0,0-2.16-.83,2.72,2.72,0,0,0-2.1.81,3.26,3.26,0,0,0-.87,1.86Z"/><path d="M32.42,18.51H29.25V1.83h3.17Z"/><path d="M46.9,18.51H43.72V17a5.42,5.42,0,0,1-4.25,1.83,3.91,3.91,0,0,1-2.92-1,3.84,3.84,0,0,1-1-2.8V6.43h3.17v7.33A2,2,0,0,0,41,16a3.34,3.34,0,0,0,2.75-1.37V6.43H46.9Z"/><path d="M61.07,18.51H57.52l-2.75-4.08L52,18.51H48.47l4.28-6.2-4-5.88h3.55l2.5,3.73,2.48-3.73H60.8l-4,5.88Z"/><path class="cls-1" d="M93.39,23.38H66.58a3.27,3.27,0,0,1-3.29-4L66,4A5,5,0,0,1,70.7,0H97.51a3.27,3.27,0,0,1,3.29,4L98.09,19.38A5,5,0,0,1,93.39,23.38Z"/><path class="art" d="M79.75,16.66H77.86v-.94a3.54,3.54,0,0,1-2.81,1.15,3.19,3.19,0,0,1-2.11-.76A2.6,2.6,0,0,1,72,14a2.52,2.52,0,0,1,.91-2.11,3.3,3.3,0,0,1,2.12-.72,3.49,3.49,0,0,1,2.81,1.12V11A1.42,1.42,0,0,0,77.3,9.8a2.35,2.35,0,0,0-1.48-.43,3.56,3.56,0,0,0-2.57,1.1l-.77-1.31a5.1,5.1,0,0,1,3.65-1.4,4.23,4.23,0,0,1,2.61.76,2.8,2.8,0,0,1,1,2.39Zm-4-1.08a2.38,2.38,0,0,0,2.07-.9V13.37a2.38,2.38,0,0,0-2.07-.9,2,2,0,0,0-1.33.43A1.4,1.4,0,0,0,73.93,14a1.37,1.37,0,0,0,.52,1.13A2,2,0,0,0,75.79,15.58Z"/><path class="art" d="M84.09,16.66H82.2V8h1.89V9.24a4,4,0,0,1,1.26-1.06,3.22,3.22,0,0,1,1.57-.41V9.64a2.86,2.86,0,0,0-.59-.05A2.77,2.77,0,0,0,85,9.94a2.45,2.45,0,0,0-1,.8Z"/><path class="art" d="M91.05,16.88a2.24,2.24,0,0,1-1.67-.58,2.27,2.27,0,0,1-.57-1.66v-5H87.38V8h1.44V5.59h1.89V8h1.76V9.62H90.71v4.55a1.19,1.19,0,0,0,.22.75.73.73,0,0,0,.61.28,1.07,1.07,0,0,0,.85-.31l.45,1.42A2.52,2.52,0,0,1,91.05,16.88Z"/></g></g></svg>
		</a></div>
		<div class="phone"><a href="#" class="phone-btn call-back"><i class="fa fa-phone" aria-hidden="true"></i>066 382 00 15</a></div>
		<div class="head-btn"><a href="#" class="dart-btn call-back">Оставить заявку</a></div>
		<div>
			<div id="nav-icon">
			      <span></span>
			      <span></span>
			      <span></span>
			      <span></span>
			</div>
		</div>
	</div>
</header>




        <ul class="menu">
           <?php
            wp_nav_menu( array(
                'menu'            => '9',
                'container'       => false,
                'echo'            => false,
                'items_wrap'      => '%3$s',
                'depth'           => 0,
                'echo'            => true,
                'before'          => '',
                'after'           => '',
                'link_before'     => '',
                'link_after'      => '',
                'walker'          => new Menu_Item_Custom_Fields_Walker(),
            ) );
            ?>
        </ul>




<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'delux-art' ); ?></a>
	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$delux_art_description = get_bloginfo( 'description', 'display' );
			if ( $delux_art_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $delux_art_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'delux-art' ); ?></button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
