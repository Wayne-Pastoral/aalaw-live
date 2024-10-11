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
			
				
			<div class="case-result-wrapper">

				<h2><?php echo get_locale() == 'en_US' ? 'Accidents &amp; Injuries' : 'Accidentes y Lesiones' ?></h2>

				<?php
					$allclassargs = array(
						'post_type' 		=> 'case_results',
						'post_status' 		=> 'publish',
						'posts_per_page' 	=> -1,
						'meta_key'        	=> 'case_amount',
						'orderby'         	=> 'meta_value_num',
						'meta_type' 		=> 'NUMERIC',
						'order'				=> 'DESC'
					);
					$allclassesarray = array(); 
					$classes = new WP_Query($allclassargs);
					if ($classes->have_posts()) :
						while ($classes->have_posts()) :
							$classes->the_post(); 
							$featured_posts = get_field('accident_injury');
							foreach( $featured_posts as $featured_post ): 
								$allclassesarray[] = $featured_post->post_name;
							endforeach;
						endwhile;
						wp_reset_postdata();
                		wp_reset_query();
					endif;
	
					$tabargs = array(
						'post_type' 		=> array('accidents', 'injuries'),
						'posts_per_page'	=> -1,
						'post_status' 		=> 'publish',
						'hide_empty'   		=> true,
						'depth'         	=> 0,
						'post_parent' 		=> 0,
						'order'				=> 'ASC',
						'orderby'			=> 'title'
					);
					$tab = new WP_Query($tabargs);
					if ($tab->have_posts()) :
						echo '<div class="caseresult-tabs"><ul>';
						$counter = 0;
						while ($tab->have_posts()) :
							$tab->the_post(); 
							$posttype = $post->post_type;
							$counter++;
							if ($counter == 1) {
								echo '<li class="all active">'. (get_locale() == 'en_US' ? 'All' : 'Todos') .'</li>';
							}
							if ($posttype === 'accidents') {
								$id = $post->ID;
								$caseresults = get_posts(array(
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

								if(count($caseresults) !== 0 || $caseresults != null) {
									$class = $post->post_name;
									if (in_array($class, $allclassesarray)) {
									echo '<li class="'.$class.'">'.get_the_title().'</li>';
									}
								}

							} else {
								$class = $post->post_name;
								if (in_array($class, $allclassesarray)) {
									echo '<li class="'.$class.'">'.get_the_title().'</li>';	
								}
							}

						endwhile;
						echo '</ul><div class="cs-chosen-cat"><span>'.(get_locale() == 'en_US' ? 'Expand Category List' : 'Expandir lista de categorías' ).'</span><svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.5 4.5L7 9L11.5 4.5" stroke="#00A771" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div></div>';
					endif;

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
					if ($loop->have_posts()) :
						echo '<div class="caseresultlist"><ul class="crtabs">';
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

								<li class="case-result active <?php echo implode(" ", $slugName);  ?> <?php  echo $output[0] . " " . $output[1]; ?>">
									<a href="<?php the_permalink(); ?>">
										<span class="headline"><?php echo the_title(); ?></span>
										<span class="date"><?php echo $schema['date']; ?></span>
									</a>
								</li>  

				<?php 

				endwhile;
				wp_reset_query();
				echo '</ul></div>';
				endif;

				?>

			</div>
				
		</div>
	</section>
<section>
	<div class="container">
	<?php  //get_template_part('template-parts/content', 'caseresult'); ?>	
		<?php echo do_shortcode('[custom_practicearea_icon]');  ?>
	</div>
</section>
	<?php get_template_part( 'template-parts/pages-cta' ); ?>
</main><!-- #main -->


<?php get_footer(); ?>
