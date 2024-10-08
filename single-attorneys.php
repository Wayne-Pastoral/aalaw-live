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
			</div>
			<div class="page-content container">
				<?php echo do_shortcode('[custom_breadcrumbs]'); ?>
				<div class="row">
					<?php get_sidebar("attorneys"); ?>
					<section class="entry-content grid-10">
						<h1><?php the_title(); ?></h1>
						<?php the_content(); ?>
					</section><!-- .entry-content -->
					<?php endwhile; ?>
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
					'key' => 'attorney',
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
						Case Results Won
					<?php } else { ?>
						Resultados de casos ganados
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
		<?php get_template_part( 'template-parts/nascar-logos' ); ?>
		<?php get_template_part( 'template-parts/pages-cta' ); ?>
	</main><!-- #main -->
<?php get_footer(); ?>
