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
		<div class="row">
		<?php
		while ( have_posts() ) :
			the_post(); ?>
			<?php 
			if ( has_post_thumbnail() ) {
				$feat_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
			?>
			<section class="hero" style="background-image:url('<?php echo $feat_image[0] ?>')">
			<?php } else { ?>
			<section class="hero">
			<?php } ?>
			<div class="bg-overlay dark"></div>
				<div class="container">
					<div class="row justify-content-center">
						<h1 class="title text-center"><?php the_title(); ?></h1>
					</div>
				</div>
			</section>
		</div>
		<div class="page-content container">
			<div class="row">
				<section class="entry-content grid-10">
					<?php
					
						echo do_shortcode('[custom_breadcrumbs]');
						
						$postid = get_the_ID();
						$tags = get_the_terms( $postid, 'faqtag' ); 
						if ( $tags ) :
						echo '<div class="cat_sec--bottom"><span class="cats">TAGS:';
						foreach($tags as $tag) {
							echo '<a href="'.get_term_link($tag->term_id, 'faqtag').'">'.$tag->name.'</a>';
						}
						echo '</span></div>';
						endif;
					
						the_content();
					
					?>
				</section><!-- .entry-content -->
			
				<?php endwhile; ?>
				<?php get_sidebar("faqs"); ?>
			</div>
			</div>
		</div>
		<?php get_template_part( 'template-parts/banner-cta-phone' ); ?>
		<?php get_template_part( 'template-parts/pages-cta' ); ?>
	</main><!-- #main -->
<?php get_footer(); ?>
