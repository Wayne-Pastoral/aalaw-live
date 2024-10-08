<?php /* Template Name: Contact */ ?>
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
				<div class="container">
					<div class="row justify-content-center">
						<div class="title text-center"><?php the_title(); ?></div>
					</div>
				</div>
			</section>
		</div>
		<div class="page-content container">
			<div class="row">
				<section class="entry-content grid-7">
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</section><!-- .entry-content -->
			
				<?php endwhile; ?>
				
				<section class="grid-7">
					<div class="form bg-lt-green">
					<div class="sticky">
					<?php if (get_locale() == 'en_US') { ?>
					<h3>Connect with an Attorney at Our Firm</h3>
					<?php 
						echo do_shortcode('[gravityform id="4" title="true" ajax="true"]');
						//the_field('form_embed', 'option');
					?>
					<p class="small">By submitting this form, you agree to be contacted and recorded by Adamson Ahdoot LLP or a representative, calling or sending correspondence to your physical or electronic address, on our behalf, for any purpose arising out of or related to your case and or claim. Standard text and or usage rates may apply.</p>
					<?php //the_field('form_disclaimer', 'option'); ?>
					<?php } else { ?>
					<h3>Conectar con un abogado en nuestra firma</h3>
					<?php 
						echo do_shortcode('[gravityform id="5" title="true" ajax="true"]');
						//the_field('form_embed_spanish', 'option');
					?>
<!-- <p class="small"><?php //the_field('form_disclaimer_spanish', 'option'); ?></p> -->
					<?php } ?>
					</div>
					</div>
				</section>

			</div>
			</div>
		</div>
	</main><!-- #main -->
<?php get_footer(); ?>
