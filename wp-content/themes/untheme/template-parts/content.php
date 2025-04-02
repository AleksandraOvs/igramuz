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
	<div class="article-header">
		<?php untheme_post_thumbnail(); ?>
	</div>

	<div class="article-content">
		<div class="article-header__titles">
			<div class="article-heading">
				<?php
				if (is_singular()) :
					the_title('<h2 class="post-title">', '</h2>');
				else :
					the_title('<h3 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>');
				endif;
				if ('post' === get_post_type()) :
				?>
				<?php endif; ?>
				<!-- <ul class="breadcrumbs__list">
						<?php //echo site_breadcrumbs(); ?>
					</ul> -->
			</div>
			<div class="entry-meta">
				<?php
				untheme_posted_on();
				//untheme_posted_by();
				?>
			</div><!-- .entry-meta -->

		</div>

		<?php //the_content() ?>
	</div>


</article><!-- #post-<?php the_ID(); ?> -->