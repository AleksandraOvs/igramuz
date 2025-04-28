<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package untheme
 */

?>

<?php if ($order_shortcode = carbon_get_theme_option('crb_order_shortcode')) {
?>

	<div class="hidden">
		<div class="popup-order" id="popup-order">
			<?php //echo $popup_sale_short 

			echo do_shortcode(" $order_shortcode ");

			?>
			<?php //echo do_shortcode('[contact-form-7 id="72c1f3a" title="Contact form 1"]'); 
			?>
		</div>
	</div>
<?php
}
?>

<footer id="colophon" class="site-footer">
	<div class="fixed-container">
		<div class="site-info">
			<?php
			$footer_logo = get_theme_mod('footer_logo');
			$img = wp_get_attachment_image_src($footer_logo, 'full');
			if ($img) : echo '<img class="footer-logo-img" src="' . $img[0] . '" alt="">';
			endif;
			?>

		</div><!-- .site-info -->

		<div class="footer-menu__inner">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'services',
					'menu_id'        => 'footer-menu',
				)
			);
			?>
		</div>

	</div>

	<?php
	if (current_user_can('administrator')) {
	?>
		<div class="show-temp"><?php echo get_current_template(); ?> </div>
	<?php
	}
	?>

</footer><!-- #colophon -->

<div class="toggle-contacts__bar">
	<div class="toggle-contacts__list">
		<?php
		if ($messengers = carbon_get_theme_option('crb_messengers_contacts')) {
		?>
			<ul class="messengers-list _toggle-contacts">
				<?php if ($phone_item = carbon_get_theme_option('crb_phone_link')) {
					$phone_item_img = carbon_get_theme_option('crb_phone_link_img');
					$phone_item_img_url = wp_get_attachment_image_url($phone_item_img, 'full');
					echo '<li class="messengers-list__item">
									<a href="' . $phone_item . '" class="messengers-list__item__link">
									<img src="'.get_stylesheet_directory_uri().'/images/svg/phone.svg" alt="phone" />
									</a>
									</li>';
				}
				?>
				<?php
				foreach ($messengers as $messenger) {
					$mes_img = wp_get_attachment_image_url($messenger['crb_contact_image'], 'full')
				?>
					<li class="messengers-list__item">
						<a href="<?php echo $messenger['crb_contact_link'] ?>" class="messengers-list__item__link">
							<img src="<?php echo $mes_img; ?>" alt="<?php echo $messenger['crb_contact_name'] ?>">
						</a>
					</li>
				<?php
				}
				?>
			</ul>
		<?php
		}
		?>
	</div>
	<a href="#" class="toggle-contacts-icon">
		<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.88 107.09">
			<title>chat-bubble</title>
			<path d="M63.08,0h.07C79.93.55,95,6.51,105.75,15.74c11,9.39,17.52,22.16,17.11,36.09v0a42.67,42.67,0,0,1-7.58,22.87A55,55,0,0,1,95.78,92a73.3,73.3,0,0,1-28.52,8.68,62.16,62.16,0,0,1-27-3.63L6.72,107.09,16.28,83a49.07,49.07,0,0,1-10.91-13A40.16,40.16,0,0,1,.24,45.55a44.84,44.84,0,0,1,9.7-23A55.62,55.62,0,0,1,26.19,8.83,67,67,0,0,1,43.75,2,74.32,74.32,0,0,1,63.07,0Zm24.18,42a7.78,7.78,0,1,1-7.77,7.78,7.78,7.78,0,0,1,7.77-7.78Zm-51.39,0a7.78,7.78,0,1,1-7.78,7.78,7.79,7.79,0,0,1,7.78-7.78Zm25.69,0a7.78,7.78,0,1,1-7.77,7.78,7.78,7.78,0,0,1,7.77-7.78Zm1.4-36h-.07A68.43,68.43,0,0,0,45.14,7.85a60.9,60.9,0,0,0-16,6.22A49.65,49.65,0,0,0,14.66,26.32,38.87,38.87,0,0,0,6.24,46.19,34.21,34.21,0,0,0,10.61,67,44.17,44.17,0,0,0,21.76,79.67l1.76,1.39L16.91,97.71l23.56-7.09,1,.38a56,56,0,0,0,25.32,3.6,67,67,0,0,0,26.16-8A49,49,0,0,0,110.3,71.36a36.86,36.86,0,0,0,6.54-19.67v0c.35-12-5.41-23.1-15-31.33C92.05,11.94,78.32,6.52,63,6.06Z" />
		</svg>
	</a>
</div>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>