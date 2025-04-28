<section class="section-welcome">
    <div class="fixed-container">
        <?php
        if ($welcome_head = carbon_get_post_meta(get_the_ID(), 'crb_second_block_head')) {
            echo '<h2 class="title toleft">' . $welcome_head . '</h2>';
        }
        ?>

        <div class="section-welcome__blocks">
            <?php
            if ($welcome_block1 = carbon_get_post_meta(get_the_ID(), 'crb_second_block_text1')) {
                echo '<div class="toright">' . $welcome_block1 . '</div>';
            }
            ?>

            <?php
            if ($welcome_block2 = carbon_get_post_meta(get_the_ID(), 'crb_second_block_text2')) {
                echo '<div class="toleft">' . $welcome_block2 . '</div>';
            }
            ?>
        </div>
    </div>
</section>