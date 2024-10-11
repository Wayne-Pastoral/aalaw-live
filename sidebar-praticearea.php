<aside class="grid-5 unset-position practiceare-side ">
    <?php get_template_part('contact-form', get_post_format()); ?>

    <!-- Practice Area -->
    <div class="side">
        <?php get_template_part('template-parts/content-tablecontent'); ?>
    </div>
    <!-- End of table content -->

    <div class="post-type-list">
        <h2 class="g_border-bottom">Other Practice Areas</h2>

        <div class="padding-left-20">
            <h3 class="accident-title-spacing">Accidents</h3>
            <?php
            $args = array(
                'posts_per_page' => 20,
                'post_type'      => 'accidents',
                'orderby'        => 'title',
                'order'          => 'ASC',
                'lang'           => (get_locale() == "en_US") ? 'en' : 'es'
            );

            $article_posts = new WP_Query($args);
            if ($article_posts->have_posts()) :
                while ($article_posts->have_posts()) : $article_posts->the_post(); ?>
                    <a href="<?php the_permalink(); ?>" aria-label="Read more about <?php the_title(); ?>"><?php the_title(); ?></a>
                <?php endwhile;
            endif;
            wp_reset_query();
            ?>
        </div>

        <div class="padding-left-20">
            <h3 class="injury-title-spacing">Injury</h3>
            <?php
            $args_accident = array(
                'posts_per_page' => 20,
                'post_type'      => 'injuries',
                'orderby'        => 'title',
                'order'          => 'ASC',
                'lang'           => (get_locale() == "en_US") ? 'en' : 'es'
            );

            $article_accident = new WP_Query($args_accident);
            if ($article_accident->have_posts()) :
                while ($article_accident->have_posts()) : $article_accident->the_post(); ?>
                    <a href="<?php the_permalink(); ?>" aria-label="Read more about <?php the_title(); ?>"><?php the_title(); ?></a>
                <?php endwhile;
            endif;
            wp_reset_query();
            ?>
        </div>
    </div>
    <!-- End of practice area -->

    <div class="side-attorney">
        <h3 class="g_border-bottom">Attorneys</h3>
        <div class="side-attorney-contain">
            <!-- Display attorney -->
            <?php
            // Query the attorneys post type
            $args = array(
                'post_type' => 'attorneys',
                'posts_per_page' => -1, // Adjust the number of posts to display as needed
				'order'          => 'ASC',
            );
            $attorney_query = new WP_Query($args);

            // Check if there are posts in the query
            if ($attorney_query->have_posts()) {
                while ($attorney_query->have_posts()) {
                    $attorney_query->the_post(); ?>
                    <div class="side-attorney-item">
                        <a href="<?php the_permalink(); ?>" style="text-decoration:none;" aria-label="Read more about Attorney <?php the_title(); ?>">
                            <div class="attorney-img">
                                <?php the_post_thumbnail(); ?>
                            </div>
                            <div class="attorney-title">
                                <?php the_title(); ?>
                            </div>
                        </a>
                    </div>
                <?php }
                // Restore original Post Data
                wp_reset_postdata();
            } else {
                // No attorneys found
                echo '<p>No attorneys found.</p>';
            }
            ?>
            <!-- End of attorney -->
        </div>
    </div>

</aside>
