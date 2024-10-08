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
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<div class="meta">
			<span class="date"><img src="<?php echo get_template_directory_uri(); ?>/assets/icon-clock.svg"><?php the_date(); ?></span>
			<span class="author"><img src="<?php echo get_template_directory_uri(); ?>/assets/icon-user.svg"><?php the_author(); ?></span>
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
					<img src="<?php echo get_template_directory_uri(); ?>/assets/icon-tag.svg">
					<?php the_category(', '); ?>
				<?php endif ?>
			</span>
		</div>
	 	<?php if ( !is_tax( 'faqtag' ) ) : ?>
		<?php the_excerpt(); ?>
		<a href="<?php the_permalink(); ?>" class="btn secondary">Read more</a>
		<?php endif ?>
</article><!-- #post-<?php the_ID(); ?> -->
