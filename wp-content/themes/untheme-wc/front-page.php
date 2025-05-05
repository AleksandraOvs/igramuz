<?php get_header() ?>

<?php get_template_part('template-parts/hero-block'); ?>

<div class="site-content">

    <?php get_template_part('template-parts/welcome-block') ?>

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

    <section class="section-regular">
        <div class="fixed-container _regular">
            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 10, // можно изменить на нужное количество
                'category_name' => 'master-classes,regular',
                'order' => 'ASC'
            );

            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="post">
                        <!-- <h3><a href="<?php //the_permalink(); 
                                            ?>"><?php //the_title(); 
                                                                        ?></a></h3> -->
                        <h3 class="fromTop"><?php the_title(); ?></h3>
                        <!-- Slider main container -->
                        <?php if ($event_pics = carbon_get_post_meta(get_the_ID(), 'crb_event_pics')) {
                        ?>
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
                                            <?php //if ($event_desc) {
                                            ?>
                                            <!-- <div class="event-slider__slide__desc">
                                                            <?php //echo $event_desc 
                                                            ?>
                                                        </div> -->
                                            <?php
                                            // }
                                            ?>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="event-slider__button-prev">
                                    <svg width="13" height="23" viewBox="0 0 13 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.548 20.9487L10.6818 22.8131L0.517034 12.6519C0.353183 12.4891 0.223149 12.2954 0.134415 12.0822C0.0456813 11.8689 0 11.6402 0 11.4092C0 11.1782 0.0456813 10.9495 0.134415 10.7362C0.223149 10.523 0.353183 10.3293 0.517034 10.1665L10.6818 0L12.5463 1.86445L3.0059 11.4066L12.548 20.9487Z" fill="black" />
                                    </svg>

                                </div>
                                <div class="event-slider__button-next">
                                    <svg width="13" height="23" viewBox="0 0 13 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.29697e-05 1.86443L1.86629 -1.71661e-05L12.0311 10.1612C12.1949 10.3241 12.3249 10.5177 12.4137 10.7309C12.5024 10.9442 12.5481 11.1729 12.5481 11.4039C12.5481 11.6349 12.5024 11.8636 12.4137 12.0769C12.3249 12.2901 12.1949 12.4838 12.0311 12.6466L1.86629 22.8131L0.00184155 20.9487L9.5422 11.4065L8.29697e-05 1.86443Z" fill="black" />
                                    </svg>
                                </div>
                            </div>
                        <?php } ?>



                        <div class="event-content">
                            <?php
                            if ($event_text = carbon_get_post_meta(get_the_ID(), 'crb_event_desc')) {
                            ?>
                                <div class="event-content__description">
                                    <?php echo $event_text ?>
                                </div>
                            <?php
                            }
                            ?>
                            
                            <?php
                            if ($event_links = carbon_get_post_meta(get_the_ID(), 'crb_events_links')) {
                            ?>
                                <div class="event-links">
                                    <?php
                                    foreach ($event_links as $event_link) {
                                        echo '<a class="btn-link" href="' . $event_link['crb_event_link'] . '">' . $event_link['crb_event_link_text'] . '</a>';
                                    }
                                    ?>
                                </div>
                            <?php
                            }
                            ?>
                        </div>

                        

                    </div>
            <?php endwhile;
                wp_reset_postdata();
            else :
                echo '<p>Постов не найдено.</p>';
            endif;
            ?>
        </div>

    </section>
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