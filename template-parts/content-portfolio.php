<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package delux-art
 */
$korotkoe_opisanie = get_field( 'korotkoe_opisanie' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="container">
	<header class="content-portfolio-php"></header>
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        <?php if ( $korotkoe_opisanie ): ?>
            <span><?php the_field( 'korotkoe_opisanie' ); ?></span>
        <?php endif; ?>
	</header><!-- .entry-header -->
    <div class="content">
	<?php delux_art_post_thumbnail(); ?>



<?php $usluga_array = get_field( 'usluga' ); ?>
<?php if ( $usluga_array ): ?>
	<?php foreach ( $usluga_array as $usluga_item ): ?>
	 	<?php echo $usluga_item; ?>
	<?php endforeach; ?>
<?php endif; ?>



Проект: <?php the_field( 'proekt' ); ?><br/>
Ссылка на проект: <?php the_field( 'ssylka_na_proekt' ); ?><br/>
Дата выполения: <?php the_field( 'data_proekta' ); ?>


<?php // metki ( value )
$metki_array = get_field( 'metki' );
if ( $metki_array ):
	foreach ( $metki_array as $metki_item ):
	 	echo $metki_item;
	endforeach;
endif; ?>



	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'delux-art' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
</div>
	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'delux-art' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
        </div>
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
