<?php /* Template Name: Sitemap */ ?>
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
	<?php
	$counter = 0;
	if ( have_posts() ) :					 
		while ( have_posts() ) : 
			the_post();
			$counter++;
	?>
			<section class="sitemap-hero" style="background:url('<?php the_post_thumbnail_url(); ?>') no-repeat center center / cover">
				<h1><?php the_title(); ?></h1>
			</section>
	
			<div class="page-content container">
				<?php echo do_shortcode('[custom_breadcrumbs]') ?>
				<div class="our-sitemap">
					
					<div class="sitemap-listings">
						<div class="sitemap-column">
							<?php
							echo '<div class="sitemap-group"><h3>Pages</h3><ul>';
							
							// Injuries
							$injuriesargs = array(
								'post_type' => array('injuries','accidents','ppc-site'),
								'posts_per_page' => '-1',
								'orderby' => 'title',
								'order'   => 'ASC',
								'meta_key' => 'include_to_pages',
								'meta_value' => 1
							);
							$injuriesquery = new WP_Query( $injuriesargs );

							if ( $injuriesquery->have_posts() ) :
							
								while ( $injuriesquery->have_posts() ) : $injuriesquery->the_post(); 
									echo '<li><a href="'.get_the_permalink().'">'.get_the_title().'</a></li>'; 
								endwhile;
							wp_reset_postdata();
							endif;
							
							// Accidents
// 							$injuriesargs = array(
// 								'post_type' => 'accidents',
// 								'posts_per_page' => '-1',
// 								'orderby' => 'title',
// 								'order'   => 'ASC',
// 								'meta_key' => 'include_to_pages',
// 								'meta_value' => 1
// 							);
// 							$injuriesquery = new WP_Query( $injuriesargs );

// 							if ( $injuriesquery->have_posts() ) :
							
// 								while ( $injuriesquery->have_posts() ) : $injuriesquery->the_post(); 
// 									echo '<li><a href="'.get_the_permalink().'">'.get_the_title().'</a></li>'; 
// 								endwhile;
// 							wp_reset_postdata();
// 							endif;
							
							echo '</ul></div>';
							
							// Attorneys
							$attorneysargs = array(
								'post_type' => 'attorneys',
								'posts_per_page' => '-1',
								'orderby' => 'title',
								'order'   => 'ASC',
							);
							$attorneyquery = new WP_Query( $attorneysargs );

							if ( $attorneyquery->have_posts() ) :
							echo '<div class="sitemap-group"><h3>Attorneys</h3><ul>';
								while ( $attorneyquery->have_posts() ) : $attorneyquery->the_post(); 
									echo '<li><a href="'.get_the_permalink().'">'.get_the_title().'</a></li>'; 
								endwhile;
							wp_reset_postdata();
							echo '</ul></div>';
							endif;
							
							// Resources
							$pageargs = array(
								'post_type' => 'page',
								'posts_per_page' => '-1',
								'orderby' => 'title',
								'order'   => 'ASC',
								'meta_key' => 'include_to_resources',
								'meta_value' => 1
							);
							$pagequery = new WP_Query( $pageargs );

							if ( $pagequery->have_posts() ) :
							echo '<div class="sitemap-group"><h3>Resources</h3><ul>';
								while ( $pagequery->have_posts() ) : $pagequery->the_post(); 
									echo '<li><a href="'.get_the_permalink().'">'.get_the_title().'</a></li>'; 
								endwhile;
							wp_reset_postdata();
							echo '</ul></div>';
							endif;
							
							// Locations
							$locargs = array(
								'post_type' => 'locations',
								'posts_per_page' => '-1',
								'orderby' => 'title',
								'order'   => 'ASC',
								'meta_key' => 'include_to_areas_we_serve',
								'meta_value' => 1
							);
							$locquery = new WP_Query( $locargs );

							if ( $locquery->have_posts() ) :
							echo '<div class="sitemap-group"><h3>Areas We Serve</h3><ul>';
								while ( $locquery->have_posts() ) : $locquery->the_post(); 
									echo '<li><a href="'.get_the_permalink().'">'.get_the_title().'</a></li>'; 
								endwhile;
							wp_reset_postdata();
							echo '</ul></div>';
							endif; 
							?>
						</div>
						<div class="sitemap-column">
							<?php
							// English Articles
							$engargs = array(
								'post_type' => 'post',
								'posts_per_page' => '-1',
								'orderby' => 'title',
								'order'   => 'ASC'
							);
							$engquery = new WP_Query( $engargs );
							if ( $engquery->have_posts() ) :
							echo '<div class="sitemap-group"><h3>Articles (English)</h3><ul>';
								while ( $engquery->have_posts() ) : $engquery->the_post(); 
									echo '<li><a href="'.get_the_permalink().'">'.get_the_title().'</a></li>'; 
								endwhile;
							wp_reset_postdata();
							echo '</ul></div>';
							endif; 
							?>
						</div>
						<div class="sitemap-column">
							<?php
							// Spanish Articles
							$espgargs = array(
								'post_type' => 'post',
								'posts_per_page' => '-1',
								'orderby' => 'title',
								'order'   => 'ASC'
							);
							$espquery = new WP_Query( $espgargs );
							$espids = array();
							if ( $espquery->have_posts() ) :
								while ( $espquery->have_posts() ) : $espquery->the_post();
									$lang = pll_get_post_translations( $espquery->post->ID );
									if ( count($lang) === 2 ) {
										array_push($espids, $lang['es']);
									}
								endwhile;
							wp_reset_postdata();
							endif;
							
							if ($espids) {
								echo '<div class="sitemap-group"><h3>Articles (Spanish)</h3><ul>';
								foreach ($espids as $id) {
									$espost = get_post($id);
									echo '<li><a href="'.$espost->guid.'">'.$espost->post_title.'</a></li>'; 
								}
								echo '</ul></div>';
							}
							?>
						</div>
					</div>
				</div>
			</div>
	
	<?php

		endwhile;						 
	endif;

	?>
</main>

<?php get_footer(); ?>
