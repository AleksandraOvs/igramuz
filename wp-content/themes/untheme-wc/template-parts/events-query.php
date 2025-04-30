<section class="section-events">
    <div class="fixed-container">
        <?php
        $args = array(
            'post_type' => 'event',
            'publish' => true,
            'orderby' => 'date',
            'order' => 'DESC'
            //'cat' => 'decoration'
            //'paged' => get_query_var('paged'),
        );
        query_posts($args);
        if (have_posts()) :
        ?>
            <!-- <h2 class="title title-events animateBlur">Наши мероприятия</h2> -->
            <ul class="events-list">
                <?php while (have_posts()) : the_post();
                ?>
                    <li class="event-list__item frombottom">
                        <div class="event-list__item__title">
                            <h3><?php the_title() ?></h3>
                        </div>
                        <div class="event-list__item__inner">
                            <div class="event-list__item__inner__slider">
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
                                                    <?php //if ($event_desc) {
                                                    ?>
                                                        <!-- <div class="event-slider__slide__desc">
                                                            <?php //echo $event_desc ?>
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
                                <?php
                                } else {
                                    echo '<img src="' . get_stylesheet_directory_uri() . '/images/svg/placeholder.svg" alt="Музей Игра">';
                                }
                                ?>
                            </div>

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
                    </li>
                <?php endwhile; ?>
                <?php wp_reset_query(); ?>
            </ul>

        <?php endif; ?>
    </div>
</section>