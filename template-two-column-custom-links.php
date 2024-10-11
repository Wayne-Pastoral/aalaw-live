<?php /* Template Name: Two Column with Custom Links */ ?>
<?php get_header(); ?>

	<main id="primary" class="site-main">
		<div class="row">
		<?php
		while ( have_posts() ) :
			the_post(); ?>
			<section class="hero" style="background:url('<?php the_post_thumbnail_url(); ?>') no-repeat center center / cover">
				<div class="bg-overlay dark"></div>
				<div class="container">
					<?php 
						if ( is_page( 'about-us' ) ) { ?>
					     <div class="row">
							<h1 class="title">What makes us different?</h1>
					</div>
					<?php } else { ?>
					     <div class="row justify-content-center">
							<h1 class="title text-center"><?php the_title(); ?></h1>
							 <?php  if(is_page( array( 17225, 'community' )) || is_page(18031)) { ?>
							<?php } else { ?>
							<div class="subhead text-center">Adamson Ahdoot LLP</div>
							<?php }  ?>
						</div>
					<?php } ?>
					
				</div>
			</section>
		</div>
		<div class="page-content container">
			<div class="row">
				<section class="entry-content grid-10">
					<?php the_content(); ?>
				<?php  if(is_page( array( 17225, 'community' )) || is_page(18031)) { ?>
		<?php echo do_shortcode( "[custom_community_post]") ?>
		<?php } else { ?>
					<?php 
						if ( is_page( 'about-us' ) || '7771' ) { ?>
							<div class="attorneys-to-move">
								<?php 
								$args = array(
							    'post_type' => 'attorneys',
							    'posts_per_page' => '-1',
							    'orderby' => 'title',
							    'order'   => 'ASC',
							);
							$injury_query = new WP_Query( $args );
							?>
							 
							<?php if ( $injury_query->have_posts() ) : ?>
							 
							    <?php while ( $injury_query->have_posts() ) : $injury_query->the_post(); ?>
							        <a href="<?php the_permalink(); ?>" class="attorney grid-16 hover-color" aria-label="<?php the_title(); ?>">
								        <div class="bg-forest color-panel"></div>
								        <?php the_post_thumbnail(); ?>
								        <h3 class="text-center"><?php the_title(); ?></h3>
								    </a>
							    <?php endwhile; ?>
							 
							    <?php wp_reset_postdata(); ?>
							 
							<?php endif; ?>
							</div>
						<?php } ?>
					<?php }  ?>
				</section><!-- .entry-content -->
			
				<?php endwhile; ?>
				<?php get_sidebar("form"); ?>
			</div>
			</div>
		</div>
		<?php get_template_part( 'template-parts/nascar-logos' ); ?>
		<?php get_template_part( 'template-parts/pages-cta' ); ?>
	</main><!-- #main -->
<?php get_footer(); ?>
