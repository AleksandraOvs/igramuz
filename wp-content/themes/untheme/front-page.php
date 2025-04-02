<?php get_header() ?>

<?php get_template_part('template-parts/hero-block'); ?>

<div class="site-content">

    <?php get_template_part('template-parts/events-query') ?>
    <?php if ($contact_form1 = carbon_get_theme_option('crb_cf')) {
    ?>
        <section class="section-contacts-form">
            <div class="fixed-container _contact-form">
                <?php if ($contact_form_head = carbon_get_theme_option('crb_cf_head')) {
                    echo '<h2>' . $contact_form_head . '</h2>';
                } ?>
                <?php if ($contact_form_text = carbon_get_theme_option('crb_cf_description')) {
                    echo '<p>' . $contact_form_text . '</p>';
                } ?>
                <?php
                if ($contact_form1) {
                    echo '<div class="contact-form-container">' . do_shortcode(" $contact_form1 ") . '</div>';
                }
                ?>
            </div>
        </section>
    <?php
    }
    ?>
    <section class="section section-partners" id="partners">
        <?php
        if ($section_background = carbon_get_post_meta(get_the_ID(), 'crb_partners_background')) {
            $section_background_url = wp_get_attachment_image_url($section_background, 'full')
        ?>
            <img class="section-partners__img" src="<?php echo $section_background_url ?>" alt="">
        <?php
        } else {
        ?>
            <img class="section-partners__img" src="<?php echo get_stylesheet_directory_uri() ?>/images/party-background.jpg" alt="">
        <?php
        };
        ?>

        <div class="_section-partners-container">
            <div class="fixed-container">
                <h2>Наши партнёры</h2>

                <?php
                if ($partners = carbon_get_post_meta(get_the_ID(), 'crb_partners')) {
                ?>
                    <ul class="partners-list">
                        <?php
                        foreach ($partners as $partner) {
                            $partner_logo = wp_get_attachment_image_url($partner['crb_partner_logo'], 'full');
                            echo '<li class="partners-list__item"><img src="' . $partner_logo . '" alt="' . $partner['crb_partner_name'] . '"></li>';
                        }
                        ?>
                    </ul>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
    <section class="section-map" id="map">
        <?php
        if ($map = carbon_get_theme_option('crb_map_code')) {
            echo $map;
        }
        ?>

        <div class="fixed-container _map-container">
            <ul class="map-list">
                <?php
                if ($address = carbon_get_theme_option('crb_address')) {
                ?>
                    <li class="map-list__item">
                        <div class="image">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/svg/address.svg" alt="Адрес">
                        </div>
                        <span><?php echo $address ?></span>
                    </li>
                <?php
                }

                if ($phone = carbon_get_theme_option('crb_phone_link')) {
                ?>
                    <li class="map-list__item">
                        <div class="image">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/svg/tel.svg" alt="Телефон">
                        </div>

                        <span><a href="<?php echo carbon_get_theme_option('crb_phone_link') ?>"><?php echo carbon_get_theme_option('crb_phone') ?></a></span>
                    </li>
                <?php
                }

                if ($time = carbon_get_theme_option('crb_time')) {
                ?>
                    <li class="map-list__item">
                        <div class="image">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/svg/tel.svg" alt="Время работы">
                        </div>
                        <span><?php echo $time ?></span>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </section>
</div>

<?php get_footer() ?>