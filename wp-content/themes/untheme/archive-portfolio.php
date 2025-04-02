<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package untheme
 */

get_header();
?>

<main id="primary" class="site-main">
	<section class="page-section">

		<?php if (have_posts()) : ?>

			<header class="page-header">
				<div class="fixed-container">
					<ul class="breadcrumbs__list">
						<?php echo site_breadcrumbs(); ?>
						<h2 class="page-title">Портфолио</h2>
					</ul>
					<?php
					the_archive_description('<div class="archive-description">', '</div>');
					?>
				</div>


			</header><!-- .page-header -->

			<div class="fixed-container">
				<ul class="archive-list">
				<?php
				/* Start the Loop */
				while (have_posts()) :
					the_post();

					/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
					//echo '<div class="fixed-container">';
					echo '<li class="archive-list__item">';
					get_template_part('template-parts/content', get_post_type());
					echo '</li>';
				//echo '</div>';
				endwhile;
				echo '</ul>';
				the_posts_navigation();

			else :

				get_template_part('template-parts/content', 'none');

			endif;
				?>
			</div>


	</section>
</main><!-- #main -->

<?php
get_sidebar();
get_footer();
