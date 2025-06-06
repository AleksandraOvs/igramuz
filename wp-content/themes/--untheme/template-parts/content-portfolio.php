<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package untheme
 */

?>

<a href="<?php the_permalink() ?>" id="post-<?php the_ID(); ?>" class="toopacity">
	<div class="portfolio-thumb">

		<?php if (has_post_thumbnail()) {

			the_post_thumbnail(
				'post-thumbnail',
				array(
					'alt' => the_title_attribute(
						array(
							'echo' => false,
						)
					),
				)
			);
		} else {
			echo '<img src="' . get_stylesheet_directory_uri() . '/images/svg/placeholder-ea.svg" />';
		}
		?>

	</div>
</a><!-- #post-<?php the_ID(); ?> -->

<div class="article-content">


		<?php
		
			the_title('<h3 class="post-title">', '</h3>');
		

		if ('post' === get_post_type()) :
		?>
		<?php endif; ?>
		<!-- <ul class="breadcrumbs__list">
						<?php //echo site_breadcrumbs(); 
						?>
					</ul> -->




		<?php //the_content() 
		?>
	</div>