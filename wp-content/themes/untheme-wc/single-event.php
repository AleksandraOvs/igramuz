<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package untheme
 */

get_header();
?>

<main id="primary" class="site-main">

	<section class="page-section _single-post-event">
		<div class="fixed-container">
			<div class="single-post-event__header">
				<ul class="breadcrumbs__list">
					<a href="<?php echo site_url() ?>">Главная</a>
					<span>/</span>
					<a href="<?php echo site_url('event') ?>">Декор</a>
					<span>/</span>
					<?php the_title() ?>
				</ul>
				<?php the_title('<h2 class="post-title">', '</h2>'); ?>
			</div>

			<div class="single-post-event__content">
				<?php if ($event_pics = carbon_get_post_meta(get_the_ID(), 'crb_event_pics')) {
				?>
					<!-- Slider main container -->
					<div class="swiper event-slider">
						<!-- Additional required wrapper -->
						<div class="swiper-wrapper event-slider__wrapper">
							<!-- Slides -->
							<?php
							foreach ($event_pics as $event_pic) {
								$event_pic_url = wp_get_attachment_image_url($event_pic['crb_event_image'], 'full');
							?>
								<div class="swiper-slide event-slider__slide">
									<a data-fancybox="gallery" <?php if ($event_desc = $event_pic['crb_event_image_desc']) : echo 'data-caption="' . $event_desc . '"';
																endif; ?> href="<?php echo $event_pic_url ?>">
										<img src="<?php echo $event_pic_url ?>" alt="<?php $event_pic['crb_event_image_alt'] ?>">
									</a>
									<?php if ($event_desc) {
									?>
										<div class="event-slider__slide__desc">
											<?php echo $event_desc ?>
										</div>
									<?php
									}
									?>
								</div>
							<?php
							}
							?>
						</div>
						<div class="event-slider__button-prev">
							<svg width="47" height="30" viewBox="0 0 47 30" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M0.428296 16.1388C0.361467 16.0713 0.301196 15.9977 0.248295 15.9188L0.183297 15.7988C0.125486 15.7087 0.0848059 15.6087 0.0632979 15.5038L0.0282981 15.3788C-0.00943567 15.1873 -0.00943566 14.9903 0.0282981 14.7988L0.068299 14.6688L0.113297 14.5188C0.137107 14.4673 0.163818 14.4173 0.193299 14.3688L0.253297 14.2638C0.30883 14.181 0.37248 14.104 0.443299 14.0338L13.8833 0.578816C14.0139 0.410982 14.1787 0.272836 14.3668 0.173543C14.5548 0.0742492 14.7618 0.0160779 14.9741 0.00288823C15.1863 -0.0103014 15.399 0.0217919 15.5979 0.0970388C15.7968 0.172286 15.9774 0.288965 16.1278 0.439339C16.2781 0.589713 16.3948 0.770343 16.4701 0.969246C16.5453 1.16815 16.5774 1.38078 16.5642 1.59303C16.551 1.80529 16.4929 2.01231 16.3936 2.20036C16.2943 2.38842 16.1561 2.55322 15.9883 2.68382L5.1083 13.5788L45.4883 13.5788C45.8861 13.5788 46.2677 13.7369 46.549 14.0182C46.8303 14.2995 46.9883 14.681 46.9883 15.0788C46.9883 15.4766 46.8303 15.8582 46.549 16.1395C46.2677 16.4208 45.8861 16.5788 45.4883 16.5788L5.1083 16.5788L15.9883 27.4738C16.2129 27.7624 16.3243 28.1231 16.3016 28.488C16.2789 28.853 16.1237 29.1971 15.8651 29.4557C15.6066 29.7142 15.2625 29.8694 14.8975 29.8921C14.5326 29.9148 14.1719 29.8034 13.8833 29.5788L0.428296 16.1388Z" fill="#4F3434" />
							</svg>
						</div>
						<div class="event-slider__button-next">
							<svg width="47" height="30" viewBox="0 0 47 30" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M46.56 16.1388C46.6268 16.0713 46.6871 15.9977 46.74 15.9188L46.805 15.7988C46.8628 15.7087 46.9035 15.6087 46.925 15.5038L46.96 15.3788C46.9977 15.1873 46.9977 14.9903 46.96 14.7988L46.92 14.6688L46.875 14.5188C46.8512 14.4673 46.8245 14.4173 46.795 14.3688L46.735 14.2638C46.6795 14.181 46.6158 14.104 46.545 14.0338L33.105 0.578816C32.9744 0.410982 32.8096 0.272836 32.6215 0.173543C32.4335 0.0742492 32.2265 0.0160779 32.0142 0.00288823C31.802 -0.0103014 31.5893 0.0217919 31.3904 0.0970388C31.1915 0.172286 31.0109 0.288965 30.8605 0.439339C30.7101 0.589713 30.5935 0.770343 30.5182 0.969246C30.443 1.16815 30.4109 1.38078 30.4241 1.59303C30.4373 1.80529 30.4954 2.01231 30.5947 2.20036C30.694 2.38842 30.8322 2.55322 31 2.68382L41.88 13.5788L1.5 13.5788C1.10217 13.5788 0.720644 13.7369 0.439339 14.0182C0.158035 14.2995 -6.65026e-07 14.681 -6.47636e-07 15.0788C-6.30247e-07 15.4766 0.158035 15.8582 0.439339 16.1395C0.720644 16.4208 1.10217 16.5788 1.5 16.5788L41.88 16.5788L31 27.4738C30.7754 27.7624 30.664 28.1231 30.6867 28.488C30.7094 28.853 30.8646 29.1971 31.1232 29.4557C31.3817 29.7142 31.7258 29.8694 32.0908 29.8921C32.4557 29.9148 32.8164 29.8034 33.105 29.5788L46.56 16.1388Z" fill="#4F3434" />
							</svg>
						</div>
					</div>
				<?php
				}
				?>
				<div class="event__content">
					<?php
					if ($event_description = carbon_get_post_meta(get_the_ID(), 'crb_event_desc')) {
					?>
						<div class="event-description"><?php echo $event_description ?></div>
					<?php
					}
					?>
					<a class="btn-link" data-fancybox data-src="#popup-order" href="javascript:;" class="event-item__contacts__button">
						<?php
						if ($order_button_text = carbon_get_theme_option(get_the_ID(), 'crb_order_button_text')) {
							echo $order_button_text;
						} else {
							echo 'Заказать';
						}
						?>
					</a>
				</div>
			</div>
			<div class="single-post__content">
				<?php the_content() ?>
			</div>
			<?php
			if (is_active_sidebar('page-sidebar')) {
				echo '<aside class="page-sidebar">';
				dynamic_sidebar('page-sidebar');
				echo '</aside>';
			} ?>
		</div>
	</section>
</main><!-- #main -->
<?php
//get_sidebar();
get_footer();
