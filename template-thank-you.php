<?php
/*
	Template Name: Thank You
*/
?>
<?php get_header("ppc-site"); ?>
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
						<div class="title text-center">
							<?php if ( get_field( 'hero_headline' ) ){ ?>
							<?php the_field('hero_headline'); ?>
							<?php } else { ?>
								Thank You
							<?php } ?>
						</div>
					</div>
				</div>
			</section>
		</div>
		<div class="page-content container">
			<div class="row justify-content-center">
				<section class="entry-content grid-10 text-center">
					<?php the_content(); ?>
				</section><!-- .entry-content -->
			
				<?php endwhile; ?>
			</div>
			</div>
		</div>
		<?php get_template_part( 'template-parts/banner-cta-phone' ); ?>
		<?php get_template_part( 'template-parts/pages-cta' ); ?>
	</main><!-- #main -->
<?php get_footer(); ?>
