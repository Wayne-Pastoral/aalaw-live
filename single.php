<?php get_header(); ?>

	<main id="primary" class="site-main">
		<div class="row">
		<?php $blog_page_image = wp_get_attachment_url( get_post_thumbnail_id(get_option( 'page_for_posts' )) ); ?>
			<section class="hero" style="background:url('<?php echo $blog_page_image; ?>') no-repeat center center / cover">
				<div class="bg-overlay dark"></div>
				<div class="container">
					<div class="row justify-content-center">
						
						<!--end of the title -->
						<?php if (get_locale() == 'en_US') { ?>
						<h2 class="title__sinle-post">California Legal Blog</h2>
						<?php } else { ?>
							<h2 class="title__sinle-post">Publicaciones</h2>
						<?php } ?>
					</div>
				</div>
			</section>
		</div>
		<div class="page-content" id="single_post--page">
			<div class="container">
			<div class="row">
				<section class="entry-content grid-10 copy">
					 <?php  echo do_shortcode('[custom_breadcrumbs]');  ?>
						<?php
						while ( have_posts() ) :
						the_post(); ?>
					<?php get_template_part( 'template-parts/content-single' ); ?>
					<?php endwhile; ?>
               <!--cat section -->
					<div class="cat_sec--bottom">
						
				<span class="cats"><?php the_tags('' , ''); ?></span>
						</div>
				</section><!-- .entry-content -->
				<?php get_sidebar("blog"); ?>
			</div>
		</div>
		<?php get_template_part( 'template-parts/nascar-logos' ); ?>
		<?php get_template_part( 'template-parts/pages-cta' ); ?>
	</main><!-- #main -->


<?php get_footer(); ?>