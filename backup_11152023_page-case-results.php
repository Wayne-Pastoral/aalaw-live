<?php
/*
	Template Name: Case Results
*/
?>
<?php get_header(); ?>

<main id="primary" class="site-main">
	<?php $blog_page_image = wp_get_attachment_url(get_post_thumbnail_id(get_option('page_for_posts'))); ?>
	<section class="hero" style="background:url('<?php echo $blog_page_image; ?>') no-repeat center center / cover">
		<div class="bg-overlay dark"></div>
		<div class="container">
			<div class="row justify-content-center">
				<h1 class="title text-center"><?php the_title(); ?></h1>
			</div>
		</div>
	</section>
	<section class="tabbed-content bg-cream">
		<div class="container">
			<?php echo do_shortcode('[custom_breadcrumbs]'); ?>
			<div class="row">
				<div class="tab-nav">
					<div class="tab-names">
						<?php if (get_locale() == 'en_US') { ?>
							<h4 class="all-cases width100 active">All Accidents and Injuries</h4>
							<h4 class="accidents">Accidents</h4>
							<h4 class="injuries">Injuries</h4>
						<?php } else { ?>
							<h4 class="all-cases width100 active">Todos los Accidentes y Lesiones</h4>
							<h4 class="accidents">Accidentes</h4>
							<h4 class="injuries">Lesiones</h4>
						<?php } ?>
					</div>
					<ul class="accidents active">
						<?php
						$args = array(
							'post_type' => 'accidents',
							'post_status' => 'publish',
							'hide_empty'   => true,
							'depth'         => 0,
							'post_parent' => 0,
							'posts_per_page' => -1
						);

						$loop = new WP_Query($args);

						while ($loop->have_posts()) : $loop->the_post(); 
							$id = $post->ID;
							$caseResults = get_posts(array(
								'post_type' => 'case_results',
								'posts_per_page' => -1,
								'post_status' => 'publish',
								'meta_query' => array(
									array(
										'key' => 'accident_injury',
										'value' => '"' . $id . '"',
										'compare' => 'LIKE'
									)
								)
							));	
							if(count($caseResults) == 0|| $caseResults == null){
							
							}
						else {
								$slug = $post->post_name;
						?>
							<li class="<?php echo $slug; ?>"><?php the_title(); ?></li>
						<?php 
							}
						
						endwhile;
						wp_reset_postdata();
						?>
						
					</ul>
					<ul class="injuries">
						<?php
						$args = array(
							'post_type' => 'injuries',
							'post_status' => 'publish',
							'hide_empty'   => true,
							'depth'         => 0,
							'post_parent' => 0,
							'posts_per_page' => -1
						);

						$loop = new WP_Query($args);

						while ($loop->have_posts()) : $loop->the_post(); 
							$id = $post->ID;
							$caseResults = get_posts(array(
								'post_type' => 'case_results',
								'posts_per_page' => -1,
								'post_status' => 'publish',
								'meta_query' => array(
									array(
										'key' => 'accident_injury',
										'value' => '"' . $id . '"',
										'compare' => 'LIKE'
									)
								)
							));	
							if(count($caseResults) == 0|| $caseResults == null){
							
							}
						else {
								$slug = $post->post_name;
						?>
							<li class="<?php echo $slug; ?>"><?php the_title(); ?></li>
						<?php 
							}
						
						endwhile;
						wp_reset_postdata();
						?>
						
					</ul>
				</div>
				<div class="content">					
					<?php
					
					$args = array(
						'post_type' 		=> 'case_results',
						'post_status' 		=> 'publish',
						'posts_per_page' 	=> -1,
						'meta_key'        	=> 'case_amount',
						'orderby'         	=> 'meta_value_num',
						'meta_type' 		=> 'NUMERIC',
						'order'				=> 'DESC'
					);
				
					$loop = new WP_Query($args);
					while ($loop->have_posts()) :
						
						$loop->the_post(); 
					
			 			$slugName = array(); 
 						$postType = null;
					
						$schema = get_field('hero', $post->ID);
					
						$featured_posts = get_field('accident_injury');
					
						$postArray = array();
						foreach( $featured_posts as $featured_post ): 
							$temp = array();
							$temp = "all-" . get_post_type($featured_post->ID);
							array_push($postArray, $temp);
							$slugName[] = $featured_post->post_name;
						endforeach;
					
						$unique = array_unique($postArray);

						$output = array();
					
						foreach($unique as $out){
							array_push($output, $out);
						}
					?>
					
						<a href="<?php the_permalink(); ?>" class="case-result active <?php echo implode(" ", $slugName);  ?> <?php  echo $output[0] . " " . $output[1]; ?>">
							<p class="headline"><?php echo the_title(); ?></p>
							<p class="date"><?php echo $schema['date']; ?></p>
						</a>  

					<?php 
					
					endwhile; 
					
					wp_reset_query();
					
					?>
		
				</div>
			</div>
		</div>
	</section>
	<section class="case-result_page-item">
	<div class="container">
	<?php  //get_template_part('template-parts/content', 'caseresult'); ?>	
		<?php echo do_shortcode('[custom_practicearea_icon]');  ?>
	</div>
</section>
	<?php get_template_part( 'template-parts/pages-cta' ); ?>
</main><!-- #main -->


<?php get_footer(); ?>