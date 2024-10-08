<?php
// Get all terms from the custom taxonomy
$terms = get_terms(array(
    'taxonomy' => 'region',
    'hide_empty' => true,
    'orderby'    => 'description', // Order by description
    'order'      => 'ASC',   
)); 

// Move "Southern CA" to the beginning of the $terms array
foreach ($terms as $key => $term) {
    if ($term->slug === 'southern-ca') {
        $southern_ca = $term;
        unset($terms[$key]);
        array_unshift($terms, $southern_ca);
        break;
    }
}

foreach ($terms as $term) {
    // Display term name
    echo '<h2 class="top-title">' . esc_html($term->name) . '</h2>';

    $args = array(
        'post_type' => 'locations',
        'posts_per_page' => -1,
        'orderby'    => 'date',
        'order'      => 'ASC',
        'tax_query' => array(
            array(
                'taxonomy' => 'region',
                'field' => 'id', 
                'terms' => $term->term_id,
            ),
        ),
    );

    $custom_query = new WP_Query($args); ?>

    <div class="card-container-location <?php echo esc_html($term->name) ?>">

    <?php
    if ($custom_query->have_posts()) :
        while ($custom_query->have_posts()) : $custom_query->the_post();
            $map_data = get_field('map');
            $address_linefirsrt = get_field('adress_line_1');
            $phone = get_field('phone_number');
            $title = get_the_title();
            $title = str_replace([", CA", ", TX"], "", $title);
            // Your custom post type content goes here
            ?>
            <div class="card-location">
                <a href="<?php the_permalink() ?>">
                    <div class="card-content">
                        <h3 class="location-title-item"><?= $title; ?></h3>
                        <div style="margin-bottom:1rem;">
                            <?php if($address_linefirsrt ){ ?><p class="location-address"><?= $address_linefirsrt; ?></p><?php } ?>
                            <?php if($phone ){ ?><p class="location-phone"><?= $phone; ?></p><?php } ?>
                        </div>
                    </div>
                    <?php if($map_data) {?>
                        <iframe width="609" height="300" frameborder="0" style="border:0" src="<?php echo esc_url($map_data); ?>" allowfullscreen></iframe>
                    <?php } ?>
                </a>
            </div>
            <?php
        endwhile;

        // Restore original post data
        wp_reset_postdata();
    else :
        // No custom post type posts found for this term
        echo 'No posts found';
    endif; ?>
    </div>
<?php } ?>
