<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package delux-art
 */

?>




<div class="wow slideInRight" data-wow-duration="2s" data-wow-delay="0.2s" id="post-<?php the_ID(); ?>">
    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
    <?php if ( get_field( 'prevyu' ) ) { ?><img src="<?php the_field( 'prevyu' ); ?>" alt="<?php the_title(); ?>" /><?php } ?>
		<div class="datails">
			<div>
				<h4><?php the_title(); ?></h4>
				<p><?php the_field( 'korotkoe_opisanie' ); ?></p>
			</div>
        </div>


<?php // metki ( value )
$usluga_array = get_field( 'usluga' );
echo '<ul>';
if ( $usluga_array ):
    foreach ( $usluga_array as $usluga_item ):
        echo '<li>'. $usluga_item .'</li>';
	 	// echo $metki_item;
    endforeach;
echo '</ul>';
endif; ?>
	</a>
</div><!-- #portfolio-<?php the_ID(); ?> -->
