<?php
/*
Template Name: Portfolio
*/

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

<?php
$args = array(
	'numberposts' => 6,
	'category' => 1,
	'post_status' => 'publish',
);

$result = wp_get_recent_posts($args);

foreach( $result as $p ){
	?>
	— <a href="<?php echo get_permalink($p['ID']) ?>"><?php echo $p['post_title'] ?></a><br />
	<?php
}
?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
