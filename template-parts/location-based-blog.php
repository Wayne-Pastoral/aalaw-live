<?php
$post_slug = get_post_field('post_name', $post->ID);
$post_slug_with_spaces = ucwords(str_replace('-', ' ', $post_slug));

$args = array(
    'post_type'      => 'post',
    'orderby'        => 'date',
    'order'          => 'DESC',
    'post_status'    => 'publish',
    'category_name'  => $post_slug,
    'posts_per_page' => 6
);

$query = new WP_Query($args);

$counter = 0;
$other_stories_heading_displayed = false; // Define the variable here

if ($query->have_posts()) {
    echo '<div class="location-based-blog__container">'; // Parent container
    
    while ($query->have_posts()) {
        $query->the_post();
        $post_id = get_the_ID();
        $post_thumbnail = get_the_post_thumbnail($post_id);
        $post_title = get_the_title();
        $post_date = get_the_date();
        $post_author = get_the_author();
        $counter++;

        if ($counter === 1) {
            echo '<div class="location-based-blog__main-container">';
            echo '<div class="location-based-blog__main">';
            echo '<div class="location-based-blog__headings"><h2 class="location-based-blog__heading">Recent ' . esc_html($post_slug_with_spaces) . ' Blogs</h2></div>';
            if ($post_thumbnail) {
                echo '<div class="location-based-blog__image"><a href="' . esc_url(get_the_permalink()) . '">' . $post_thumbnail . '</a></div>';
            }
            echo '<div class="location-based-blog__main-headings">';
            echo '<div class="location-based-blog__title"><a href="' . esc_url(get_the_permalink()) . '" aria-label="' . esc_attr($post_title) . '">' . esc_html($post_title) . '</a></div>';
            echo '<div class="location-based-blog__date">' . esc_html($post_date) . '</div>';
            echo '</div>';
            echo '</div>'; // Close main container
        } elseif ($counter > 1 && $counter <= 6) {
            if ($counter === 2 && !$other_stories_heading_displayed) {
                echo '<div class="location-based-blog__others-container">'; // Parent container for other stories
                echo '<div class="location-based-blog__headings"><h2 class="location-based-blog__heading">Other stories</h2></div>';
                $other_stories_heading_displayed = true;
            }
            echo '<div class="location-based-blog__others">';
            echo '<div class="location-based-blog__title"><a href="' . esc_url(get_the_permalink()) . '" aria-label="' . esc_attr($post_title) . '">' . esc_html($post_title) . '</a></div>';
            if ($post_author) {
                echo '<div class="location-based-blog__date">' . esc_html($post_date) . ' | ' . esc_html($post_author) . '</div>';
            } else {
                echo '<div class="location-based-blog__date">' . esc_html($post_date) . '</div>';
            }
            echo '</div>'; // Close others container
        }
    }
    echo '</div>'; // Close others container
    echo '</div>'; // Close main container
    wp_reset_postdata();
} else {
    $args = array(
        'post_type'      => 'post',
        'orderby'        => 'date',
        'order'          => 'DESC',
        'post_status'    => 'publish',
        'category_name'  => 'riverside',
        'posts_per_page' => 1
    );

    $query = new WP_Query($args);
    
    if ($query->have_posts()) {
        echo '<div class="location-based-blog__container">'; // Parent container
        while ($query->have_posts()) {
            $query->the_post();
            $post_id = get_the_ID();
            $post_thumbnail = get_the_post_thumbnail($post_id);
            $post_title = get_the_title();
            $post_date = get_the_date();
            $post_author = get_the_author();

            echo '<div class="location-based-blog__main-container">';
            echo '<div class="location-based-blog__main">';
            echo '<div class="location-based-blog__headings"><h2 class="location-based-blog__heading">Recent ' . esc_html($post_slug_with_spaces) . ' Blogs</h2></div>';
            if ($post_thumbnail) {
                echo '<div class="location-based-blog__image"><a href="' . esc_url(get_the_permalink()) . '">' . $post_thumbnail . '</a></div>';
            }
            echo '<div class="location-based-blog__main-headings">';
            echo '<div class="location-based-blog__title"><a href="' . esc_url(get_the_permalink()) . '" aria-label="' . esc_attr($post_title) . '">' . esc_html($post_title) . '</a></div>';
            echo '<div class="location-based-blog__date">' . esc_html($post_date) . '</div>';
            echo '</div>';
            echo '</div>'; // Close main container
        }
        echo '</div>'; // Close main container
        echo '</div>'; // Close main container
        wp_reset_postdata();
    } else {
        // No posts found in the 'riverside' category.
    }
}
?>
