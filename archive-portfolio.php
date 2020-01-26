<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package delux-art
 */
get_header();
$page_description = get_field( 'page_description' );
?>

	<section id="portfolio" class="content-area page">
		<div class="container">
		<h2 class="title wow slideInLeft" data-wow-duration="2s" data-wow-delay="0.5s"><?php the_title(); ?>
        <?php if ( $page_description ): ?>
            <span><?php the_field( 'page_description' ); ?></span>
        <?php endif; ?>
        </h2>

                <?php the_content(); ?>
        </div><!-- #main -->
        	<div class="extended-parallax" data-paroller-type="foreground" style="top:0%; left: -5%; " data-paroller-direction="horizontal" data-paroller-factor="-0.1" ><img src="<?php echo get_bloginfo('template_url'); ?>/assets/images/Portfolio.svg" alt="" /></div>
	</section><!-- #primary -->

<?php
get_footer();
