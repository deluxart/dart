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
if ( get_query_var('paged') ) $paged = get_query_var('paged');
if ( get_query_var('page') ) $paged = get_query_var('page');

$query = new WP_Query( array( 'post_type' => 'portfolio', 'paged' => $paged ) );

if ( $query->have_posts() ) : ?>
	<?php while ( $query->have_posts() ) : $query->the_post(); ?>
		<div class="entry">
			<h2 class="title"><?php the_title(); ?></h2>
			<?php the_content(); ?>
		</div>
	<?php endwhile; wp_reset_postdata(); ?>
	<!-- show pagination here -->
<?php else : ?>
	<!-- show 404 error here -->
<?php endif; ?>

	            </div>
        </div><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
