<?php
/**
 * The template for displaying Current Discussion on posts
 *
 * @package WordPress
 * @subpackage DELUX_Art
 * @since 1.0.0
 */

/* Get data from current discussion on post. */
$discussion    = dart_get_discussion_data();
$has_responses = $discussion->responses > 0;

if ( $has_responses ) {
	/* translators: %1(X comments)$s */
	$meta_label = sprintf( _n( '%d Comment', '%d Comments', $discussion->responses, 'dart' ), $discussion->responses );
} else {
	$meta_label = __( 'No comments', 'dart' );
}
?>

<div class="discussion-meta">
	<?php
	if ( $has_responses ) {
		dart_discussion_avatars_list( $discussion->authors );
	}
	?>
	<p class="discussion-meta-info">
		<?php echo dart_get_icon_svg( 'comment', 24 ); ?>
		<span><?php echo esc_html( $meta_label ); ?></span>
	</p>
</div><!-- .discussion-meta -->
