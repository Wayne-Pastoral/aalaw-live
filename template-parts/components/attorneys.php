<section class="attorneys bg-cream">
    <div class="container">
        <div class="row justify-content-center">
            <h2 class="text-center">
                <?php if (get_locale() == 'en_US') { ?>
                    Attorneys on the case
                <?php } else { ?>
                    Abogados en el caso
                <?php } ?>
            </h2>
        </div>
        <div class="row justify-content-center">
            <?php
            $attorneys = get_field('attorney');
            if ($attorneys): ?>
                <?php foreach ($attorneys as $post):
                    setup_postdata($post);
                    $post_status = get_post_status($post->ID);
                    $locale = get_locale();

                    if ($post_status == 'draft') {
                        if ($locale == 'es_MX') { ?>
                            <a href="https://aa.law/es/abogados/" class="single-attorney grid-3 hover-color">
                        <?php } elseif ($locale == 'en_US') { ?>
                            <a href="https://aa.law/attorneys/" class="single-attorney grid-3 hover-color">
                        <?php }
                    } else {
                        if (is_singular('ppc-site')) { ?>
                            <a href="<?php echo esc_url(get_sub_field('page_link')); ?>" class="single-attorney grid-3 hover-color">
                        <?php } else { ?>
                            <a href="<?php echo esc_url(get_permalink()); ?>" class="single-attorney grid-3 hover-color">
                        <?php }
                    } ?>
                        <div class="bg-forest color-panel"></div>
                        <?php the_post_thumbnail(); ?>
                        <h3><?php the_title(); ?></h3>
                    </a>
                <?php endforeach;
                wp_reset_postdata(); ?>
                <?php if (get_sub_field('button_name')) { ?>
                    <a href="<?php echo esc_url(get_sub_field('page_link')); ?>" class="btn"><?php the_sub_field('button_name'); ?></a>
                <?php } ?>
            <?php endif; ?>
        </div>
    </div>
</section>
