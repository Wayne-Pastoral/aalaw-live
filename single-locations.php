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
			<?php if ( has_post_thumbnail() ) { ?>
			<section class="hero" style="background:url('<?php the_post_thumbnail_url(); ?>') no-repeat center center / cover">
			<?php } else { ?>
			<section class="hero">
			<?php } ?>
			<div class="bg-overlay dark"></div>
				<div class="container">
					<div class="row justify-content-center">
						<h1 class="title text-center">
							<?php if ( get_field( 'hero_headline' ) ){ ?>
							<?php the_field('hero_headline'); ?>
							<?php } else { ?>
								<?php the_title(); ?>
							<?php } ?>
						</h1>
					</div>
				</div>
			</section>
		</div>
		<div class="page-content container">
			<div class="row">
				<section class="entry-content grid-10">
					<?php echo do_shortcode('[custom_breadcrumbs]'); ?>
					<?php the_content(); ?>
				</section><!-- .entry-content -->
			
				<?php endwhile; ?>
				<?php get_sidebar(); ?>
			</div>
			</div>
		</div>
		<?php get_template_part( 'widgets/location_slider/location_slider' ); ?>
		<div class="gmbreviews">
			<h2>
				<?php if(get_locale() == "en_US"){?>
				Client Testimonials
				<?php }else{ ?>
				Testimonios De Clientes
				<?php } ?>
			</h2>
			<div class="gmbrating" data-ave="4.9"><span class="starrating"><span style="width:98%"></span></span><div><strong>4.9</strong> Stars | <strong>262</strong> Reviews</div></div>
			<?php 
			echo do_shortcode("[grreview place_id='ChIJbfPxU-O7woARq5CHtNDHQbY']Posts Heading[/grreview]");
			?>
		</div>
		
		<?php get_template_part( 'template-parts/banner-cta-phone' ); ?>
		<?php get_template_part( 'template-parts/pages-cta' ); ?>
	</main><!-- #main -->
<!-- testtesttet -->
<?php get_footer(); ?>
