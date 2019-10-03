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
    <?php if ( get_field( 'prevyu' ) ) { ?><img src="<?php the_field( 'prevyu' ); ?>" /><?php } ?>
		<div class="datails">
			<div>
				<h4><?php the_title(); ?></h4>
				<p><?php the_field( 'korotkoe_opisanie' ); ?></p>
			</div>
        </div>

<?php // metki ( value )
$metki_array = get_field( 'metki' );
echo '<ul>';
if ( $metki_array ):
    foreach ( $metki_array as $metki_item ):
        echo '<li>'. $metki_item .'</li>';
	 	// echo $metki_item;
    endforeach;
echo '</ul>';
endif; ?>
<!--
		<ul>
			<li><a href="#">Веб-дизайн</a></li>
			<li><a href="#">Верстка</a></li>
		</ul> -->
	</a>
</div><!-- #portfolio-<?php the_ID(); ?> -->
