<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package untheme
 */

get_header();
?>

<main id="primary" class="site-main">

	<section class="page-section error-404 not-found">
		<div class="fixed-container">
			<header class="page-header">
				<ul class="breadcrumbs__list">
					<?php echo site_breadcrumbs(); ?>
				</ul>
			</header><!-- .page-header -->

			<div class="page-content">
			<h4 class="page-404-title"><?php esc_html_e('Такой страницы нет', 'untheme'); ?></h4>
				<p>404</p>

				<div class="search-content">
					<p>Вы можете перейти на <a href="<?php echo site_url() ?>">главную страницу</a>
						или&nbsp;воспользоваться поиском по&nbsp;сайту</p>
					<?php
					get_search_form();

					//the_widget( 'WP_Widget_Recent_Posts' );
					?>
				</div>



				<!-- <div class="widget widget_categories"> -->
				<!-- <h2 class="widget-title"><?php //esc_html_e( 'Most Used Categories', 'untheme' ); 
												?></h2>
						<ul>
							<?php
							// wp_list_categories(
							// 	array(
							// 		'orderby'    => 'count',
							// 		'order'      => 'DESC',
							// 		'show_count' => 1,
							// 		'title_li'   => '',
							// 		'number'     => 10,
							// 	)
							// );
							?>
						</ul> -->
				<!-- </div> -->
				<!-- .widget -->

			</div><!-- .page-content -->
		</div>
	</section><!-- .error-404 -->

</main><!-- #main -->

<?php
get_footer();
