<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package delux-art
 */

get_header();
$page_description = get_field( 'page_description' );
?>

	<section id="feedback" class="content-area page">
		<div class="container">
		<div class="wow slideInLeft" data-wow-duration="2s" data-wow-delay="0.2s"><h2 class="title"><?php the_title(); ?>
        <?php if ( $page_description ): ?>
            <span><?php the_field( 'page_description' ); ?></span>
        <?php endif; ?>
        </h2></div>

                <?php the_content(); ?>
        </div><!-- #main -->
        <div class="extended-parallax" data-paroller-type="foreground" style="top:0%; left:10%; " data-paroller-direction="horizontal" data-paroller-factor="0.1" ><img src="/wp-content/themes/dart/assets/images/Contacts.svg" alt="" /></div>
	</section><!-- #primary -->

<?php
get_footer();
