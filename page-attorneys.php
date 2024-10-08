<?php /* Template Name: Attorneys */ ?>
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
			<section class="hero" style="background:url('<?php the_post_thumbnail_url(); ?>') no-repeat center center / cover">
				<div class="container">
					<div class="row justify-content-center">
						<div class="title text-center"><?php the_title(); ?></div>
					</div>
				</div>
			</section>
		</div>
		<div class="page-content">
			<div class="row">
				<section class="entry-content grid-7 copy offset-left">
					<?php echo do_shortcode('[custom_breadcrumbs]'); ?>
					<?php the_content(); ?>
				</section><!-- .entry-content -->
			
				<?php endwhile; ?>
				<div class="sticky grid-7">
				<section class="attorney-carousel relative">
					<?php 
						$args = array(
					    'post_type' => 'attorneys',
					    'posts_per_page' => '20',
					    'orderby' => 'title',
					    'order'   => 'ASC',
					);
					$injury_query = new WP_Query( $args );
					?>
					 
					<?php if ( $injury_query->have_posts() ) : ?>
					 
					    <?php while ( $injury_query->have_posts() ) : $injury_query->the_post(); ?>
					        <a href="<?php the_permalink(); ?>" class="attorney grid-16">
						        <h4 class="caps"><?php the_title(); ?></h4>
						        <?php the_post_thumbnail(); ?>
						    </a>
					    <?php endwhile; ?>
					 
					    <?php wp_reset_postdata(); ?>
					 
					<?php endif; ?>
					
				</section>
				</div>
			</div>
			</div>
		</div>
		<?php get_template_part( 'template-parts/form-cta' ); ?>
	</main><!-- #main -->
<?php get_footer(); ?>
