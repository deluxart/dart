<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package delux-art
 */
$korotkoe_opisanie = get_field( 'korotkoe_opisanie' );
$project = get_field( 'proekt' );
$project_link = get_field( 'ssylka_na_proekt' );
$project_date = get_field( 'data_proekta' );
$usluga_array = get_field( 'usluga' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="container">
	<header class="content-portfolio-php">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        <?php if ( $korotkoe_opisanie ): ?>
            <span><?php the_field( 'korotkoe_opisanie' ); ?></span>
        <?php endif; ?>
	</header><!-- .entry-header -->
    <div class="content">
	    <div class="cover"><?php delux_art_post_thumbnail(); ?></div>
        <div class="description">

            <div class="text">
                <h4>Описание</h4>
                <div class="entry-content">
                    <?php
                    the_content();

                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'delux-art' ),
                        'after'  => '</div>',
                    ) );
                    ?>
                </div>
            </div>

            <div class="details">
                <h4>Детали</h4>
                <?php if ( $usluga_array ): ?>
                    <ul class="cat-list">
                        <?php foreach ( $usluga_array as $usluga_item ): ?>
                            <li><?php echo $usluga_item; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <ul class="details-list">
                    <?php if( $project ){ ?><li><strong>Проект:</strong> <?php the_field( 'proekt' ); ?></li><?php } ?>
                    <?php if( $project_link ){ ?><li><strong>Ссылка на проект:</strong> <?php the_field( 'ssylka_na_proekt' ); ?></li><?php } ?>
                    <?php if( $project_date ){ ?><li><strong>Дата:</strong> <?php the_field( 'data_proekta' ); ?></li><?php } ?>
                </ul>
            </div>

    </div>
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
