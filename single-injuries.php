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
					<div class="accident-content">
					<?php the_content(); ?>
					</div>
				</section><!-- .entry-content -->
			
				<?php endwhile; ?>
				<?php get_sidebar("injury"); ?>
			</div>
			</div>
		</div>
		<?php 
		$caseResults = get_posts(array(
			'post_type' => 'case_results',
			'posts_per_page' => -1,
			'post_status' => 'publish',
			'meta_query' => array(
				array(
					'key' => 'accident_injury',
					'value' => '"' . get_the_ID() . '"',
					'compare' => 'LIKE'
				)
			)
		));
		?>
		<?php if( $caseResults ): ?>
		<section class="panel-carousel bg-forest bg-logomark">
			<div class="container">
				<div class="row">
					<h2 class="reveal-up-all">
					<?php if (get_locale() == 'en_US') { ?>
						Related Case Results
					<?php } else { ?>
						Resultado de casos relacionados
					<?php } ?>
					</h2>
				</div>
				<div class="row"> 
				<?php foreach( $caseResults as $caseResult ): ?>
					<div class="single-panel">
						<a href="<?php echo get_permalink( $caseResult->ID ); ?>" class="headline"><?php echo get_the_title( $caseResult->ID ); ?></a>
					</div>
				<?php endforeach; ?>
				</div>
			</div>
		</section>
		<?php endif; ?>
		<?php get_template_part( 'template-parts/banner-cta-phone' ); ?>
		<?php get_template_part( 'template-parts/pages-cta' ); ?>
	</main><!-- #main -->
<?php get_footer(); ?>
