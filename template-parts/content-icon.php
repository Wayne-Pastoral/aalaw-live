<?php if(get_field('icon_title')): ?>
    <h2 class="wp-block-heading practice-area-title c_mt-30 c_mb-20 text-center"><?php the_field('icon_title'); ?></h2>
<?php else: ?>
    <h2 class="wp-block-heading practice-area-title c_mt-30 c_mb-20">More articles related to car accidents</h2>
<?php endif; ?>

<?php if( have_rows('icon_item') ): ?>
    <div class="grid__carousel hide logo-mobile-hide">
        <div class="item practice-area-icon">
            <div class="grid__row c_wrap-flex justify-content-center">
                <?php while( have_rows('icon_item') ) : the_row(); ?>
                    <div class="grid__col">
                        <div class="grid__thumb">
                            <a href="<?php the_sub_field('link'); ?>">
                                <span>
                                    <?php 
                                    $image = get_sub_field('image');
                                    if ($image): 
                                    ?>
                                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                    <?php endif; ?>
                                </span>
                                <strong style="color: #00A771;"><?php the_sub_field('title'); ?></strong>
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>

    <!-- start of mobile version -->
    <section class="practicearea mobile txt-center practicearea-icon-new">
        <div class="row">
            <div class="logos-contain">
                <?php
                $counter = 0;
                echo '<div class="logos-contain">';
                while( have_rows('icon_item') ) : the_row(); 
                    $image_logo = get_sub_field('image');
                    $link_logo = get_sub_field('link');
                    
                    if ($counter % 3 == 0) :
                        echo $counter > 0 ? "</div>" : "";
                        echo "<div class='holder'>";
                    endif;
                    
                    echo '<a href="' . esc_url($link_logo) . '"><div class="single-logo-item">';
                    echo '<div class="single-logo">';
                    
                    // Mobile version image display
                    if ($image_logo):
                        echo '<img src="' . esc_url($image_logo['url']) . '" alt="' . esc_attr($image_logo['alt']) . '" />';
                    endif;
                    
                    echo '</div>';
                    echo '<div class="single-title text-center">';
                    echo '<strong>' . get_sub_field('title') . '</strong>';
                    echo '</div>';
                    echo '</div></a>';
                    
                    $counter++;
                endwhile;
                echo '</div>';
                ?>
            </div>
        </div>
    </section>
<?php endif; ?>
