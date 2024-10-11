<?php
if(get_post_type() == 'attorneys'){
    echo '<section class="nascar mobile attorney bg-cream reveal-up-all attorney-awards">';
}else{
    echo '<section class="nascar mobile bg-cream reveal-up-all">';
} ?>
    <div class="container">
        <div class="row justify-content-center ">
            <h2 class="thin text-center">Awards Won by Adamson Ahdoot</h2>
            <?php if ( is_singular( 'ppc-site' ) ) { ?>
                <?php if (get_locale() == 'en_US') { ?>
                    <h2>Awards &amp; Affiliations</h2>
                <?php } else { ?>
                    <h2>Premios y afiliaciones</h2>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
    <div class="row">
        <?php if ( is_page_template('template-ppc-old-layout-old-colors.php') ) { ?>
            <?php if( have_rows('old_logos', 'option') ): ?>
                <div class="logos-contain">
                    <?php while( have_rows('old_logos', 'option') ): the_row(); ?>
                        <div class="single-logo">
                            <img src="<?php the_sub_field('logo', 'option'); ?>" class="grid-3" alt="<?php esc_attr_e('Logo', 'adamson-ahdoot'); ?>">
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        <?php } else { ?>
            <?php if( have_rows('old_logos', 'option') ): ?>
                <div class="logos-contain">
                    <?php
                    $logosargs = array(
                        'post_type' => 'awards',
                        'numberposts' => '-1',
                        'order' => 'ASC'
                    );
                    $awards = get_posts($logosargs);

                    if ($awards) :
                        echo '<div class="logos-contain">';
                        $counter = 0;
                        foreach ($awards as $award) :
                            $awardlogo = wp_get_attachment_image_src( get_post_thumbnail_id( $award->ID ), 'full' );
                            if (get_post_type() == 'attorneys') {
                                if ($counter % 4 == 0) :
                                    echo $counter > 0 ? "</div>" : "";
                                    echo "<div class='holder'>";
                                endif;
                            } else {
                                if ($counter % 8 == 0) :
                                    echo $counter > 0 ? "</div>" : "";
                                    echo "<div class='holder'>";
                                endif; 
                            }
                            echo '<div class="single-logo"><img src="'.esc_url($awardlogo[0]).'" alt="'.esc_attr__('Award Logo', 'adamson-ahdoot').'" /></div>';
                            $counter++;
                        endforeach;
                        echo '</div>';
                    endif;
                    ?>
                </div>
            <?php endif; ?>
        <?php } ?>
    </div>
</section>
