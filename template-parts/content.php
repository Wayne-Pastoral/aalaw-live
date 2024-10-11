<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Adamson_Ahdoot
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> aria-label="<?php the_title(); ?>">
    <h2>
        <a href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr(get_the_title()); ?>">
            <?php the_title(); ?>
        </a>
    </h2>
    <div class="meta">
        <span class="date">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icon-clock.svg" alt="Date icon">
            <?php the_date(); ?>
        </span>
        <span class="author">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icon-user.svg" alt="Author icon">
            <?php the_author(); ?>
        </span>
        <span class="cats">
            <?php if ( is_tax( 'faqtag' ) ) : ?>
                <strong>Tags: </strong>
                <span>
                <?php
                    $faqtags = get_the_terms( get_the_id(), 'faqtag' ); 
                    foreach($faqtags as $tag) {
                        echo '<a href="'.get_term_link($tag->term_id, 'faqtag').'">'.$tag->name.'</a>';
                    }
                ?>
                </span>
            <?php elseif ( is_tax( 'accidenttags' ) ) : ?>
            <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/icon-tag.svg" alt="Category icon">
                <?php the_category(', '); ?>
            <?php endif ?>
        </span>
    </div>
    <?php if ( !is_tax( 'faqtag' ) ) : ?>
        <?php the_excerpt(); ?>
        <a href="<?php the_permalink(); ?>" class="btn secondary" aria-label="<?php echo esc_attr(get_the_title()); ?> - Read more">Read more</a>
    <?php endif ?>
</article><!-- #post-<?php the_ID(); ?> -->
