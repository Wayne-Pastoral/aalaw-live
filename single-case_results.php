<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Adamson_Ahdoot
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php if (have_rows('hero')) : ?>
        <?php while (have_rows('hero')) : the_row(); ?>
            <?php get_template_part('template-parts/components/hero'); ?>
    <?php endwhile;
    endif; ?>
    <?php get_template_part('template-parts/components/attorneys'); ?>
    <?php if (have_rows('accident_injury_headline')) : ?>
        <?php while (have_rows('accident_injury_headline')) : the_row(); ?>

            <?php if (have_rows('hero')) : ?>
                <?php while (have_rows('hero')) : the_row(); ?>
                    <?php
                    $featured_posts = get_field('accident_injury');
                    if ($featured_posts) : ?>
                        <?php foreach ($featured_posts as $post) :
                            setup_postdata($post); ?>
                            <?php $postId = $post->ID; ?>
                        <?php endforeach; ?>
                        <?php
                        wp_reset_postdata(); ?>
                    <?php endif; ?>
            <?php endwhile;
            endif; ?>

            <?php
            $args = array(
                'post_type'         => 'case_results',
                'posts_per_page'    => 6,
                'post_status' => 'publish',
                'post__not_in' => array($post->ID),
                'meta_query' => array(
                    array(
                        'key' => 'accident_injury', // name of custom field
                        'value' => '"' . $postId . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
                        'compare' => 'LIKE'
                    )
                )
            );

            $the_query = new WP_Query($args);
            ?>

            <?php if ($the_query->have_posts()) : ?>
                <section class="panel-carousel bg-forest bg-logomark">
                    <div class="container">
                        <div class="row">
                            <h2 class="reveal-up-all <?php echo get_locale(); ?>">
								<?php 
								$relatedText = get_locale() == 'en_US' ? 'Related Cases' : 'Casos relacionados';
								echo $relatedText;
								?>
							</h2>
                        </div>
                        <div class="row">
                            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                                <div class="single-panel">
                                    <a class="headline" href="<?php echo get_permalink($post->ID); ?>"><?php echo get_the_title($post->ID); ?></a>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>

            <?php wp_reset_query();     // Restore global post data stomped by the_post(). 
            ?>
    <?php endwhile;
    endif; ?>
    <?php if (have_rows('cta')) : ?>
        <?php while (have_rows('cta')) : the_row(); ?>
            <?php get_template_part('template-parts/components/cta'); ?>
    <?php endwhile;
    endif; ?>
</main><!-- #main -->
<?php get_footer(); ?>