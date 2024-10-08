<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Adamson_Ahdoot
 */
error_reporting(0);
get_header();
?>

	<main id="primary" class="site-main">
		<div class="row">
			<section class="hero" style="background:url('<?php echo get_the_post_thumbnail_url(get_option('page_for_posts', true)); ?>') no-repeat center center / cover">
				<div class="bg-overlay dark"></div>
				<div class="container">
					<div class="row justify-content-center">
						
						<!--end of the title -->
						<?php if (get_locale() == 'en_US') { ?>
						<h1 class="title__sinle-post">California Legal Blog</h2>
						<?php } else { ?>
							<h1 class="title__sinle-post">Publicaciones</h2>
						<?php } ?>
					</div>
				</div>
			</section>
		
			<div class="search-sidebar searchmobile">
						
					
					<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">

        <label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label' ); ?></label>
        <input type="text" placeholder="Search..." value="<?php echo get_search_query(); ?>" name="s" id="s" class="banner-text-box" />
        <input type="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" class="banner-text-btn"/>

</form>
					</div>
			
				<div class="container">
				<div class="page-content">
					<h2 class="page-title">
								<?php
								/* translators: %s: search query. */
								if(get_locale() == "en_US"){
									printf( esc_html__( 'Search Results for: %s', 'adamson-ahdoot' ), '<span>' . get_search_query() . '</span>' );
								}else{
									printf( esc_html__( 'Resultado de búsqueda de: %s', 'adamson-ahdoot' ), '<span>' . get_search_query() . '</span>' );
								}
								?>
							</h2>
					<div class="blog container">
						
							
					<section class="entry-content grid-10 copy">
			
		<?php if ( have_posts() ) : ?>
							<div class='blog-module'>
								<?php
								/* Start the Loop */
								$searchValue = apply_filters( 'get_search_query', get_query_var( 's' ) );
								$paged =  ( get_query_var('paged') ) ? get_query_var('paged') : 1;
								$args = array(
									'post_type' => 'post', 
									'post_status'=> 'publish',
									's' => $searchValue,
									'posts_per_page'=> "9",
									'paged' => $paged
								);
								$query = new WP_Query( $args );
								
								while ( $query->have_posts() ) :
									$query->the_post();

									/**
									 * Run the loop for the search to output the results.
									 * If you want to overload this in a child theme then include a file
									 * called content-search.php and that will be used instead.
									 */
									get_template_part( 'template-parts/content', 'search' );

								endwhile;
								?> 
							</div>
						
							<?php

							else :
?> 
								<div class='blog-module no-found'>
							<?php
								get_template_part( 'template-parts/content', 'none' );

									?>
							</div>
									<?php
							endif;
							?>
						
							<div class='blog-pagination'>
								<?php echo do_shortcode('[dynamic_search_pagenav]'); ?>
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

<?php
//get_sidebar();
get_footer();
