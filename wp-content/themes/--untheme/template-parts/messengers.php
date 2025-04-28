<?php
                if ($messengers = carbon_get_theme_option('crb_messengers_contacts')) {
                ?>
                    <ul class="messengers-list">
                        <?php
                        foreach ($messengers as $messenger) {
                            $mes_img = wp_get_attachment_image_url($messenger['crb_contact_image'], 'full')
                        ?>
                            <li class="messengers-list__item">
                                <a href="<?php echo $messenger['crb_contact_link'] ?>" class="messengers-list__item__link"
                                <?php 
                                    if ($contact_color = $messenger['crb_contact_background']){
                                        echo 'style="background-color:'.$contact_color.'; outline-color:'.$contact_color.'"';
                                    }
                                ?>>
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