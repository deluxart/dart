<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package delux-art
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'delux-art' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'delux-art' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'delux-art' ), 'delux-art', '<a href="http://underscores.me/">Underscores.me</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->








	<div class="dart-menu">
		<div class="container">
			<div class="content">
				<div>
					<nav>
						<ul>
							<li data-wow-delay="0.5s" class="span3 wow bounceInLeft"><a href="#about">О студии</a></li>
							<li data-wow-delay="0.3s" class="span3 wow bounceInLeft"><a href="#services">Наши услуги</a></li>
							<li data-wow-delay="0.4s" class="span3 wow bounceInLeft"><a href="#portfolio">Портфолио</a></li>
                            <li data-wow-delay="0.6s" class="span3 wow bounceInLeft"><a href="#feedback">Контакты</a></li>
        <ul class="wow-links">
           <?php
            wp_nav_menu( array(
                'menu'            => '9',
                'container'       => false,
                'items_wrap'      => '%3$s',
                'depth'           => 0,
                'echo'            => true,
                'before'          => '',
                'after'           => '',
                'link_before'     => '',
                'link_after'      => '',
                'walker'          => new WPB_Custom_Walker
            ) );
            ?>
        </ul>
						</ul>
					</nav>
				</div>
				<div>
					<ul class="soc-links">
						<li><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-paper-plane" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					</ul>
					<div class="mail"><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i> deluxart3@gmail.com</a></div>
				</div>
			</div>
		</div>

		<div class="bg-grid">
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
		</div>
	</div>










<?php wp_footer(); ?>

</body>
</html>
