<?php
 /* Template Name: location parent */ 

get_header();

?>
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
					<?php endwhile; ?>
		</div>
			
		<div class="page-content container">
			<div class="row">
				<section class="entry-content">
					 <?php  echo do_shortcode('[custom_breadcrumbs]');  ?>
			<div class="top-decs">
				<p>Adamson Ahdoot proudly serves a diverse clientele in California and Texas. We offer free consultations in both English and Spanish to clients in cities such as:</p>
			</div>
					<?php get_template_part( 'template-parts/content-location' ); ?>
				</section><!-- .entry-content -->
		
			</div>
			</div>
		</div>
		
		<section class="location-personal-injurycontent cpia">
			<div class="location-container">
				<div class="row">
						<h2>Adamson Ahdoot LLP: California Personal Injury Attorneys</h2>
<p>Since its founding, Adamson Ahdoot has worked tirelessly to meet the legal needs of injured victims across California. As a testament to our growth and dedication, we have expanded our services beyond the Golden State to the beautiful state of Texas. We now have personal injury lawyers in Texas ready to offer you top-notch legal services.</p>

<p>Whether you find yourself in the bustling streets of Los Angeles or the vibrant neighborhoods of Houston, Adamson Ahdoot aims to provide steadfast, comprehensive legal assistance. When you choose to work with us, rest assured that we will prioritize your case, regardless of your location.</p>

<p>Let Adamson Ahdoot be your trusted partner in navigating complex personal injury laws. Call us at <a href="tel:866-977-3353" aria-label="Call Adamson Ahdoot at 866-977-3353">866-977-3353</a> and schedule a free consultation with one of our premier injury attorneys today.  </p>
				</div>
			</div>
		</section>
		
		<?php get_template_part( 'template-parts/banner-cta-phone' ); ?>
		<?php get_template_part( 'template-parts/pages-cta' ); ?>
	</main><!-- #main -->
<?php get_footer(); ?>


<?php get_footer(); ?>
