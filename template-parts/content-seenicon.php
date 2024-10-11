<!-- start of as seen on  -->
<div class="seen-on">
    <h2 class="thin feature-titles features-icon-title white">AS SEEN ON</h2>
    <div class="is-layout-flow wrong-death__icon">
        <ul class="is-layout-flow is-flex-container columns-5 wp-block-post-template awards-mb justify-content-center custom-award-width">
            <?php while (have_rows('featured_companies', 'option')) : the_row(); ?>
                <li class="wp-block-post post-8854 accidents type-accidents status-publish has-post-thumbnail hentry unset-padding">
                    <div class="is-layout-flow text-center">
                        <?php 
                        $white_color_image = get_sub_field('imgwhitecolor');
                        if ($white_color_image) {
                        ?>
                            <div class="entry-thumbnail">
                                <img src="<?= esc_url($white_color_image); ?>" alt="As seen on featured logo">
                            </div>
                        <?php } else { ?>
                            <div class="entry-thumbnail">
                                <img src="<?php the_sub_field('img'); ?>" alt="As seen on featured logo">
                            </div>
                        <?php } ?>
                    </div>
                </li>
            <?php endwhile; wp_reset_postdata(); ?>
        </ul>
    </div>
</div>
<!-- end of as seen on  -->
