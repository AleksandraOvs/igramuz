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

	<section class="page-section">

		<?php
		if (is_active_sidebar('page-sidebar')) { ?>
			<div class="fixed-container _with-sidebar">
			<?php } else {
			echo '<div class="fixed-container">';
		} ?>
			<header>
				<ul class="breadcrumbs__list">
					<?php echo site_breadcrumbs(); ?>
				</ul>
			</header>

			<div class="single-post__page">

			<?php
			while (have_posts()) :
				the_post();

				get_template_part('template-parts/content', get_post_type());

			// If comments are open or we have at least one comment, load up the comment template.
			// if (comments_open() || get_comments_number()) :
			// 	comments_template();
			// endif;

			endwhile; // End of the loop.
			?>
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
