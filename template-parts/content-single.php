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
    <h1><?php the_title(); ?></h1>
    <div class="meta">
        <span class="date c__lgray"><?php the_date(); ?></span>
        <span class="author c__lgray"><?php the_author(); ?></span>
    </div>
    <?php the_content(); ?>
</article><!-- #post-<?php the_ID(); ?> -->
