<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Adamson_Ahdoot
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('full'); // Change 'full' to 'thumbnail' if you want a smaller size ?>
            </a>
        </div>
    <?php endif; ?>
    <div class="tags-item">
    <?php  $title = get_the_title();  ?>
    <h2><a href="<?php the_permalink(); ?>"><?php echo mb_strimwidth($title, 0, 40, '...');  ?></a></h2>
    <hr>
    <div class="meta">
        <span class="cats">
            <?php single_cat_title(); ?>
        </span>
    </div>
    
    <?php if ( !is_tax( 'faqtag' ) ) : ?>
		 <?php echo custom_excerpt_with_p(get_the_excerpt()); ?>
        <div class="read-more-btn">
        <a href="<?php the_permalink(); ?>" class="btn secondary">Read more ></a>
        </div>
    <?php endif; ?>
    </div>
  
</article><!-- #post-<?php the_ID(); ?> -->
