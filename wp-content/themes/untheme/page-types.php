<?php

/**
 * Template name: Decor types Page
 */
get_header();
?>

<main id="primary" class="site-main">
    <section class="page-section">
        <div class="fixed-container">
            <ul class="breadcrumbs__list">
                <?php echo site_breadcrumbs(); ?>
                <h2 class="page-title">Декор для мероприятий</h2>
            </ul>
            <ul class="decor-list">
                <?php
                $types_cats = get_terms(array('taxonomy' => 'types', 'hide_empty' => false));
                //echo '<pre>';
                //print_r( $types_cats );

                foreach ($types_cats as $types_cat) {
                ?>
                    <li class="decor-list__item frombottom">

                        <a href="<?php echo esc_url(get_term_link($types_cat->term_id)) ?>" class="decor-list__item__link">
                            <?php
                            if ($tax_image = carbon_get_term_meta($types_cat->term_id, 'crb_type_thumb')) {
                                $tax_image_url = wp_get_attachment_image_url($tax_image, 'full');
                            ?>
                                <img src="<?php echo $tax_image_url ?>" alt="Декор для мероприятий">

                            <?php
                            } else {
                                echo '<img src="' . get_stylesheet_directory_uri() . '/images/svg/placeholder.svg" alt="Декор для мероприятий">';
                            }
                            ?>
                        </a>

                        <div class="decor-list__item__title">
                            <div class="decor-content">
                                <h3><?php echo $types_cat->name ?></h3>
                            </div>

                        </div>
                    </li>
                <?php
                }

                ?>
            </ul>
        </div>
    </section>
</main>

<?php get_footer() ?>