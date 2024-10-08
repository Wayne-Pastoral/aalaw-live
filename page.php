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
	
	if ($post->post_parent === 7296 || $post->post_parent === 9783) {
		
		include( locate_template( 'template-parts/content-caseresult-child.php', false, false ) );
		
	} else {

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
					<?php the_content(); ?>
					<?php 
					if($post->ID == '17238' || $post->ID == '18034' || $post->ID == '18031'){ }else{
						if ( is_page( 'about-us' ) || '7771' || '4689' ) {
							if (!is_page('testimonials') && !is_page('testimoniales')) :
					?>
						
						<div class="attorneys-to-move">
							<?php 
							$args = array(
							'post_type' => 'attorneys',
							'posts_per_page' => '20',
							'orderby' => 'title',
							'order'   => 'ASC',
						);
						$injury_query = new WP_Query( $args );
						?>
						 
						<?php if ( $injury_query->have_posts() ) : ?>
						 
							<?php while ( $injury_query->have_posts() ) : $injury_query->the_post(); ?>
								<a href="<?php the_permalink(); ?>" class="attorney grid-16 hover-color">
									<div class="bg-forest color-panel"></div>
									<?php the_post_thumbnail(); ?>
									<h3 class="text-center"><?php the_title(); ?></h4>
								</a>
							<?php endwhile; ?>
						 
							<?php wp_reset_postdata(); ?>
						 
						<?php endif; ?>
						</div>
					<?php endif; } } ?>
				</section><!-- .entry-content -->
			
				<?php endwhile; ?>
				<?php get_sidebar(); ?>
			</div>
			</div>
		</div>
		<?php if (is_page('testimonials') || is_page('testimoniales')) { ?>
			<div class="gmbreviews">
				<h2>
					<?php if(get_locale() == "en_US"){?>
					Google My Business Reviews
					<?php }else{ ?>
					Reseñas de Perfil de Empresa Google
					<?php } ?>
				</h2>
				<?php 
					echo do_shortcode("[grrating]");
					echo do_shortcode("[grreview place_id='ChIJbfPxU-O7woARq5CHtNDHQbY']Posts Heading[/grreview]");
				?>
			</div>
			<?php
			$field = get_locale() == "en_US" ? 'video_testimonials' : 'testimonios_en_video';
			$videos = get_field($field);
			if ($videos) {
				echo '<div id="videoTestimonials"><div class="container"><h2>Video Testimonials</h2><div class="owl-carousel">';
				foreach ($videos as $video) {
			?>
				<div class="item">
					<div class="youtube-thumb" style="background-image:url(https://img.youtube.com/vi/<?php echo $video['youtube_video_id'] ?>/hqdefault.jpg)" data-videoid="<?php echo $video['youtube_video_id'] ?>">
						<svg fill="#000000" height="800px" width="800px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 60 60" xml:space="preserve">
							<path d="M45.563,29.174l-22-15c-0.307-0.208-0.703-0.231-1.031-0.058C22.205,14.289,22,14.629,22,15v30 c0,0.371,0.205,0.711,0.533,0.884C22.679,45.962,22.84,46,23,46c0.197,0,0.394-0.059,0.563-0.174l22-15 C45.836,30.64,46,30.331,46,30S45.836,29.36,45.563,29.174z M24,43.107V16.893L43.225,30L24,43.107z"/>
							<path d="M30,0C13.458,0,0,13.458,0,30s13.458,30,30,30s30-13.458,30-30S46.542,0,30,0z M30,58C14.561,58,2,45.439,2,30 S14.561,2,30,2s28,12.561,28,28S45.439,58,30,58z"/>
						</svg>	
					</div>
<!-- 					<div class="video-container">
						<iframe
								src="https://www.youtube.com/embed/<?php echo $video['youtube_video_id'] ?>"
								frameborder="0"
								allow="accelerometer; autoplay; encrypted-media; gyroscope;"
								allowfullscreen></iframe>
					</div> -->
				</div>
			<?php
				}
				echo '</div></div></div>';
			}
			?>
			<div class="attorneys-to-move">
				<div class="container">
					<div class="attorney-wrap">
					<?php 
						$args = array(
							'post_type' => 'attorneys',
							'posts_per_page' => '20',
							'orderby' => 'title',
							'order'   => 'ASC',
						);
						$injury_query = new WP_Query( $args );

						if ( $injury_query->have_posts() ) : 
							while ( $injury_query->have_posts() ) : $injury_query->the_post();
					?>
							<a href="<?php the_permalink(); ?>" class="attorney grid-16 hover-color">
								<div class="photo-wrap">
									<div class="bg-forest color-panel"></div>
									<?php the_post_thumbnail(); ?>
								</div>
								<h3 class="text-center"><?php the_title(); ?></h3>
							</a>
					<?php
							endwhile;
							wp_reset_postdata();
						endif;
					?>
					</div>
				</div>
			</div>
			<aside class="mobile-sidebar grid-5">
				<div class="container">
					<?php get_template_part( 'contact-form', get_post_format() ); ?>
					<!-- The 3 logo items -->
					<div class="logos arrow-logos">    
						<div class="carousel">
							<?php while( have_rows('logos', 'option') ): the_row(); 
								$logo = get_sub_field('logo', 'option'); // Get the image array
								$logo_url = $logo['url']; // Extract the image URL
								$alt_text = $logo['alt']; // Extract the alt text
								$link_url = get_sub_field('link', 'option'); // Get the link field
							?>
							<div class="carousel-cell">
								<?php if ( $link_url ) { ?>
									<a href="<?php echo esc_url($link_url); ?>" target="_blank" class="single-logo">
										<img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr($alt_text); ?>">
									</a>
								<?php } else { ?>
									<a class="single-logo">
										<img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr($alt_text); ?>">
									</a>
								<?php } ?>
							</div>
							<?php endwhile; ?>
						</div>
					</div>
					<!-- The 3 logo items -->
				</div>
			</aside>
		<?php } ?>
		<?php get_template_part( 'template-parts/banner-cta-phone' ); ?>
		<?php get_template_part( 'template-parts/pages-cta' ); ?>
	</main><!-- #main -->
<?php 
	}

get_footer();
?>
