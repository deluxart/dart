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
<?php $options = get_option( 'dart_theme_options' ); ?>
</div>

<footer id="footer">
	<div class="container">
		<div class="content">
			<div>
				 <strong><?php bloginfo( 'name' ); ?></strong> <?php pll_e('Copyright','dart'); ?>
			</div>
			<div>
				<ul>
					<li><a href="<?php echo $options['be'];?>" target="_blank"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
					<li><a href="<?php echo $options['fb'];?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="<?php echo $options['in'];?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					<li><a href="<?php echo $options['tg'];?>" target="_blank"><i class="fa fa-paper-plane" aria-hidden="true"></i></a></li>
					<li><a href="mailto:<?php echo $options['email'];?>"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
				</ul>
			</div>
		</div>
	</div>
</footer>


	<div class="dart-menu">
		<div class="container">
			<div class="content">
				<div>
					<nav>
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
					</nav>
				</div>
				<div>
					<ul class="soc-links">
						<li><a href="<?php echo $options['be'];?>"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
						<li><a href="<?php echo $options['in'];?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						<li><a href="<?php echo $options['tg'];?>"><i class="fa fa-paper-plane" aria-hidden="true"></i></a></li>
						<li><a href="<?php echo $options['fb'];?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					</ul>
					<div class="mail"><a href="mailto:<?php echo $options['email'];?>"><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $options['email'];?></a></div>
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


<div class="bg-grid">
	<div></div>
	<div></div>
	<div></div>
	<div></div>
	<div></div>
	<div></div>
</div>



<div class="fullscreen-modal">
	<div class="container">
		<div class="fs-cont">
			<h2>Контакты</h2>
			<div class="content">
				<div class="phone">
					<i class="fa fa-phone" aria-hidden="true"></i>
					<div>
						<h3><?php echo $options['phone_1'];?></h3>
						<p>Так-же по данному номеру мы есть в Viber, WhatsApp, Telegram</p>
					</div>
				</div>
				<div class="mail">
					<i class="fa fa-envelope" aria-hidden="true"></i>
					<div>
						<h3><?php echo $options['email'];?></h3>
						<p>Если нет возможности говорить - всегда можно написать!</p>
					</div>
				</div>
			</div>
			<div class="content foot">
				<div>
					<a href="#" class="dart-btn">Обратный звонок <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
				</div>
				<div>
					<a href="/contacts" class="feed-link">Обратная связь <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
				</div>
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

	<div class="close">
		<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
			 viewBox="0 0 64 64" style="enable-background:new 0 0 64 64;" xml:space="preserve">
		<g>
			<path class="st0" d="M28.9,31.8L0.6,60.1c-0.8,0.8-0.8,2.1,0,2.8C1,63.4,1.5,63.6,2,63.6c0.5,0,1-0.2,1.4-0.6L32,34.4L60.5,63
				c0.4,0.4,0.9,0.6,1.4,0.6s1-0.2,1.4-0.6c0.8-0.8,0.8-2.1,0-2.8L35.1,31.8L63.4,3.4c0.8-0.8,0.8-2.1,0-2.8c-0.8-0.8-2.1-0.8-2.8,0
				L32,29.1L3.4,0.6c-0.8-0.8-2.1-0.8-2.8,0c-0.8,0.8-0.8,2.1,0,2.8L28.9,31.8z"/>
		</g>
		</svg>
	</div>
</div>




<?php wp_footer(); ?>

</body>
</html>
