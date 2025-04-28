<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package untheme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!-- <div class="article-header">
		<?php //untheme_post_thumbnail(); 
		?>
	</div> -->

	<div class="article-content">
		<div class="article-header__titles">
			<div class="article-heading">
				<?php
				if (is_singular()) :
					the_title('<h1 class="post-title">', '</h1>');
				else :
					the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
				endif;

				if ('post' === get_post_type()) :
				?>
				<?php endif; ?>
				<!-- <ul class="breadcrumbs__list">
						<?php //echo site_breadcrumbs(); 
						?>
					</ul> -->
			</div>
			<div class="entry-meta">
				<?php
				//untheme_posted_on();
				//untheme_posted_by();
				?>
			</div><!-- .entry-meta -->

		</div>

		<div class="fixed-container">
			<?php
			if ($single_decor_desc = carbon_get_post_meta(get_the_ID(), 'crb_decor_desc')) {
				echo '<div class="single-decor-description">' . $single_decor_desc . '</div>';
			}
			?>

			<?php
			if ($decor_items = carbon_get_post_meta(get_the_ID(), 'crb_decor_items')) {
			?>
				<ul class="decor-items__list">
					<?php
					$i = 0;
					foreach ($decor_items as $decor_item) {
						$i++;
						$decor_img_url_thumb = wp_get_attachment_url($decor_item['crb_decor_item_img'], 'medium');
						$decor_img_url_full = wp_get_attachment_url($decor_item['crb_decor_item_img'], 'full');
					?>
						<?php
						if ($i % 2 !== 0) {
							echo '<li class="decor-items__list__item frombottom">';
						} else {
							echo '<li class="decor-items__list__item frombottom reverse">';
						}
						?>

						<a class="decor-thumbnail" data-fancybox="gallery" data-caption="<?php echo $decor_item['crb_decor_item_head'] ?>" href="<?php echo $decor_img_url_full; ?>">
							<img src="<?php echo $decor_img_url_thumb ?>" alt="">
						</a>
						<!-- <a href="<?php the_permalink() ?>" class="more-link">Подробнее</a> -->
						<div class="decor-items__list__item__content">

							<!-- <a href="<?php the_permalink() ?>" class="decor-item__link"> -->
							<h2><?php echo $decor_item['crb_decor_item_head'] ?></h2>

							<?php
							if ($item_desc = $decor_item['crb_decor_item_desc']) {
								echo '<div class="decor-item__description">' . $item_desc . '</div>';
							}
							?>

							<div class="decor-item__contacts">
								<a class="btn-link" data-fancybox data-src="#popup-order" href="javascript:;" class="decor-item__contacts__button">
									<?php
									if ($order_button_text = carbon_get_theme_option(get_the_ID(), 'crb_order_button_text')) {
										echo $order_button_text;
									} else {
										echo 'Заказать';
									}
									?>
								</a>

								<div class="decor-item__contacts-links">
									<?php get_template_part('template-parts/messengers') ?>
								</div>
							</div>

							<!-- <svg width="76" height="72" viewBox="0 0 76 72" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M53.345 15.8668L73.5048 36.9447L52.4269 57.1045" stroke="#333333" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
										<path d="M73.5051 36.9453L2.81195 35.3714" stroke="#333333" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
									</svg> -->

							<!-- </a> -->
						</div>
						</li>
					<?php
					}
					?>
				</ul>
			<?php
			}
			?>

			<div class="custom-page-content">
				<?php the_content() ?>
			</div>

			
		</div>


	</div>


</article><!-- #post-<?php the_ID(); ?> -->