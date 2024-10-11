<?php 

$law = array(
    'post_type' => 'attorneys',
    'posts_per_page'   => -1,
    'attorneys_cat' => 'awards',
    'meta_key'          => 'first_date',
    'orderby'           => 'meta_value',
    'order'             => 'DESC'
);

$lawyer = new WP_Query($law);	
if ($lawyer->have_posts()) :  ?> 
<div class="is-layout-flow wp-block-query" id="law-section">
    <?php if(get_locale() == "en_US"){ ?>
    <h2 class="wp-block-heading has-text-align-center">Our Featured Lawyers and Their Awards</h2>
    <?php } else { ?>
    <h2 class="wp-block-heading has-text-align-center">Nuestros Abogados Destacados y sus Premios</h2>
    <?php } ?>
<ul class="is-layout-flow is-flex-container columns-4 wp-block-post-template logo-mobile-hide custom-award-width">
    <?php while ($lawyer->have_posts()) : $lawyer->the_post(); 
        $thumbnail = get_field('thumbnails'); // Get the image array from the metafield
        $thumbnail_url = $thumbnail['url']; // Extract the image URL
        $alt_text = $thumbnail['alt']; // Extract the alt text
        $link_url = get_permalink(); // Get the post URL
    ?>
    <li class="wp-block-post post-8854 accidents type-accidents status-publish has-post-thumbnail hentry">
        <div class="is-layout-flow wp-block-group bg-white" style="padding-top:30px;padding-right:30px;padding-bottom:30px;padding-left:30px">
            <div class="entry-thumbnails">
                <a href="<?php echo esc_url($link_url); ?>" aria-label="Link to attorney profile for <?php the_title(); ?>">
                    <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($alt_text); ?>" aria-label="Thumbnail of <?php echo esc_attr($alt_text); ?>">
                </a>
            </div>
            <div class="awards-content">
                <?php the_field('short_decs'); ?>
            </div>
        </div>
    </li>
    <?php endwhile; ?>
</ul>
</div>

<!-- The 3 logo items -->
<div class="law arrow-logos logo-destop-hide logo-destop-hide">    
    <div class="client-carousel owl-carousel owl-theme">
        <?php while ($lawyer->have_posts()) : $lawyer->the_post(); 
            $thumbnail = get_field('thumbnails'); // Get the image array from the metafield
            $thumbnail_url = $thumbnail['url']; // Extract the image URL
            $alt_text = $thumbnail['alt']; // Extract the alt text
            $link_url = get_permalink(); // Get the post URL
        ?>
        <li class="wp-block-post post-8854 accidents type-accidents status-publish has-post-thumbnail hentry">
            <div class="is-layout-flow wp-block-group bg-white" style="padding-top:30px;padding-right:30px;padding-bottom:30px;padding-left:30px">
                <div class="entry-thumbnails">
                    <a href="<?php echo esc_url($link_url); ?>" aria-label="Link to attorney profile for <?php the_title(); ?>">
                        <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($alt_text); ?>" aria-label="Thumbnail of <?php echo esc_attr($alt_text); ?>">
                    </a>
                </div>
                <div class="awards-content">
                    <?php the_field('short_decs'); ?>
                </div>
            </div>
        </li>
        <?php endwhile; ?>
    </div>
</div>
<!-- The 3 logo items -->
<?php endif; ?>
<?php wp_reset_query(); ?>
