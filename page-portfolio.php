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
?>

	<div id="portfolio" class="content-area">
		<div class="container">
            <div class="portfolio">
                <?php
                while ( have_posts() ) :
                    the_post();

                    get_template_part( 'template-parts/portfolio', 'page' );
                endwhile; // End of the loop.
                ?>

	            </div>
        </div><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
