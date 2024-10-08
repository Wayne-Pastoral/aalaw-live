<?php get_header(); ?>

	<main id="primary" class="site-main">
		
		<div class="row">
		<?php $blog_page_image = wp_get_attachment_url( (get_option( 'page_for_posts' ))); ?>
			
			<section class="hero-blog" style="background:url('<?php echo get_the_post_thumbnail_url(get_option('page_for_posts', true)); ?>')">
				<div class="meta">
					<?php if (get_locale() == 'en_US') { ?>
					<h1 class="title">California Legal Blog</h1>
					<p>Learn more about personal injury cases, the process of getting compensation, and pursuing justice from the dedicated lawyers of award-winning firm Adamson Ahdoot LLP.</p>
					<?php } else { ?>
					<h1 class="title">Publicaciones</h1>
					<p>Obtenga más información sobre los casos de lesiones personales, el proceso para obtener compensación y la búsqueda de justicia junto a los abogados dedicados de la condecorada firma Adamson Ahdoot LLP.</p>
					<?php } ?>
				</div>
			</section>
			<section class='featured-blog-module'>
				<?php echo do_shortcode('[custom_featured_blog_module]'); ?>
			</section>
			
			<div class="container">
				<div class="page-content">
					<div class="blog container">
						<section class="entry-content grid-10 copy">
							<?php//  echo do_shortcode('[custom_breadcrumbs]');  ?>

							<?php if(get_locale()=="en_US"){?>
							<h2> All Blogs </h2>	
							<?php }else{ ?>
							<h2> Todos los blogs </h2>	
							<?php } ?>
							
							<?php echo do_shortcode('[custom_blog_module]'); ?>
							<div class='blog-pagination'>
								<?php echo do_shortcode('[dynamic_pagenav]'); ?>
							</div>
						</section><!-- .entry-content -->
						<?php get_sidebar("blog"); ?>
					</div>
				</div>
			</div>
			<?php get_template_part( 'template-parts/nascar-logos' ); ?>
			<?php get_template_part( 'template-parts/pages-cta' ); ?>
		</div>
	</main><!-- #main -->


<?php get_footer(); ?>
