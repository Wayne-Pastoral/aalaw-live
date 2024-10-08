<?php /* Template Name: Home */ ?>

<?php get_header(); ?>

	<main id="primary" class="site-main">
		<?php if( have_rows('hero') ): ?>
		<?php while( have_rows('hero') ): the_row(); ?>
		<section class="hero" style="background:url(<?php the_sub_field('background_image'); ?>) no-repeat center center / cover">
			<div class="bg-overlay"></div>
			<div class="container">
				<div class="row align-items-center justify-content-center">
					<div class="grid-12 copy text-center">
						<h1 class="caps white"><?php the_sub_field('subhead'); ?></h1>
						<h2 class="display home-subhead"><?php the_sub_field('headline'); ?></h2>
					</div>
				</div>				
			</div>
		</section>	
		<section class="mobile-hero hero" style="background:url(<?php the_sub_field('mobile_background_image'); ?>) no-repeat 50% 100% / cover">
			<div class="bg-overlay"></div>
			<div class="container">
				<div class="row align-items-center justify-content-center">
					<div class="grid-12 copy text-center">
						<h2 class="caps white"><?php the_sub_field('subhead'); ?></h2>
						<h2 class="display home-subhead"><?php the_sub_field('headline'); ?></h2>
					</div>
				</div>				
			</div>
		</section>					
		<?php endwhile; endif; ?>
		<div class="feature-home">
			 <?php 	get_template_part( 'template-parts/content-featuredicon' );  ?>
		</div>
		
		<?php get_template_part( 'template-parts/numbers-carousel' ); ?>
		
 		<section class="nascar bg-cream reveal-up-all home">
			 <div class="container container--full">
				<div class="row justify-content-center text-center">
					<div class="grid-12 copy text-center">
						<h2 class="thin text-center">
							<?php if (get_locale() == "en_US"): ?>
								Awards Won by Adamson Ahdoot
							<?php else: ?>
								Premios Ganados por Adamson Ahdoot
							<?php endif; ?>
						</h2>
						<?php if (get_locale() == "en_US"): ?>
							<p>Adamson Ahdoot's impressive achievements and recognition are a direct result of the efforts of our team of Los Angeles personal injury lawyers. Our proven track record serves as evidence of our steadfast commitment to advocating for justice on behalf of individuals who have been wronged and require legal representation.</p>
						<?php endif; ?>
					</div>
				</div>
			</div>

				<div class="row">
					<?php

						$logosargs = array(
							'post_type' => 'awards',
							'numberposts' => '-1',
							'order' => 'ASC'
						);
						$awards = get_posts($logosargs);

						if ($awards) :
							echo '<div class="logos-contain owl-carousel">';
							foreach ($awards as $award) :
								  $awardlogo = wp_get_attachment_image_src( get_post_thumbnail_id( $award->ID ), 'full' );
								  echo '<div class="single-logo '.$award->post_name.'"><picture><img src="'.$awardlogo[0].'" alt="" /></picture></div>';
							endforeach;
							echo '</div>';
						endif;

					?>	
			</div>
		</section>
		
		<div class="reveal-up-all container container--full section-practice-area">
			<div class="row justify-content-center text-center">
				<div class="grid-12 copy text-center">
					<?php if(get_locale() == "en_US"){ ?>
						<h2 class="thin">Practice Areas</h2>
						<p>Located in Los Angeles County, Adamson Ahdoot specializes in addressing a wide array of personal injury lawsuits, especially those involving serious injuries. We are dedicated to ensuring that our team of personal injury lawyers is highly skilled in handling a wide range of cases.</p>
						<p>If you've sustained injuries in Los Angeles and are seeking justice, contact Adamson Ahdoot without delay. Our team possesses extensive knowledge of California law, including the latest issues and developments, guaranteeing that your case is managed by capable hands.</p>
						<p>Explore our Los Angeles practice areas, including the types of injuries and liabilities our team adeptly handles.</p>
					<?php } else { ?>
						<h2 class="thin">Areas de Práctica</h2>
						<p>Adamson Ahdoot LLP cree que toda persona tiene derecho a buscar justicia independientemente de su estado. Por lo tanto, nuestra misión es garantizar que nuestro equipo de abogados de lesiones personales sea eficaz para tomar varios casos de lesiones personales.</p>
						<p>Vea algunas de las otras lesiones y responsabilidades que maneja nuestra práctica en Los Ángeles. Nuestro equipo legal tiene un amplio conocimiento de las leyes de California, incluyendo los últimos temas y desarrollos.</p>
					<?php } ?>
				</div>
			</div>
		</div>

		
		<?php if( have_rows('injuries_&_accidents') ): ?>
		<?php while( have_rows('injuries_&_accidents') ): the_row(); ?>
		<section class="injuries-accidents">
			<div class="container">
				<div class="row">
					<div class="list-panel reveal-up-all">
						<div class="list-inner">
							<h3><?php the_sub_field('headline_1'); ?></h3>
							<?php
							$featured_injuries = get_sub_field('featured_injuries');
							if( $featured_injuries ): ?>
								<ul>
								<?php foreach( $featured_injuries as $post ): 

									// Setup this post for WP functions (variable must be named $post).
									setup_postdata($post); ?>
									<li>
										<a href="<?php the_permalink(); ?>">
											<?php the_title(); ?>
										</a>
									</li>
								<?php endforeach; ?>
								</ul>
								<?php 
								// Reset the global post object so that the rest of the page works correctly.
								wp_reset_postdata(); ?>
							<?php endif; ?>
						</div>
					</div>
										
					<div class="list-panel reveal-up-all">
						<div class="list-inner">
							<h3><?php the_sub_field('headline_2'); ?></h3>
							<?php
							$featured_accidents = get_sub_field('featured_accidents');
							if( $featured_accidents ): ?>
								<ul>
								<?php foreach( $featured_accidents as $post ): 

									// Setup this post for WP functions (variable must be named $post).
									setup_postdata($post); ?>
									<li>
									   <a href="<?php the_permalink(); ?>">
											<?php the_title(); ?>
										</a>
									</li>
								<?php endforeach; ?>
								</ul>
								<?php 
								// Reset the global post object so that the rest of the page works correctly.
								wp_reset_postdata(); ?>
							<?php endif; ?>
						</div>
					</div>
					
					<?php if(get_locale() == "en_US"){ ?>
 						<a href="https://aa.law/practice-areas/"  class="btn list-panel--btn">View All Practice Areas</a> 
						<?php }else{ ?>
						<a href="https://aa.law/es/areas-de-practica/"  class="btn list-panel--btn">Ver todas las áreas de práctica</a> 
					<?php } ?>
					
				</div>
<!-- 				<div class="row justify-content-center reveal-up-all">
					<a href="<?php// the_sub_field('button_link'); ?>" class="btn"><?php //the_sub_field('button_name'); ?></a>
				</div> -->
			</div>
		</section>
		<?php endwhile; endif; ?>
		
		<?php if (have_rows('question_carousel')) : ?>
			<?php while (have_rows('question_carousel')) : the_row(); ?>
				<?php $question_carousel = get_field('question_carousel', $post->ID); ?>
				<?php if ($question_carousel) : // Check if 'question_carousel' field is not empty ?>
					<?php $toggles = $question_carousel['toggle']; ?>
					<?php if (is_array($toggles)) : // Check if 'toggle' subfield is an array ?>
						<?php 

						$toggles_count = count($toggles);
						$half_toggles_count = ceil($toggles_count / 2);
						$headline = get_sub_field('headline'); 
						$subheading = get_sub_field('subheading'); 
						?>



						<section class="panel-carousel bg-forest bg-logomark home-faq">
							<div class="container">
								<div class="row">
									<div class="custom-accordion__headings">
										<?php if (!empty($subheading)): ?>
											<p class=""><?php echo $subheading; ?></p>
										<?php endif; ?>
										<h2 class="thin reveal-up-all"><?php echo $headline ?></h2>
									</div>
								</div>
								<div class="custom-accordion faq reveal-up-all">
									<div class="custom-accordion__container">
										<?php for ($i = 0; $i < $half_toggles_count; $i++) : ?>
											<div class="custom-accordion__item">
												<div class="custom-accordion-toggle hide">
													<div class="custom-accordion-title">
														<h3><?php echo $toggles[$i]['question']; ?></h3><i class="faq-icon"></i>
													</div>
													<div class="custom-accordion-content">
														<?php echo $toggles[$i]['answer']; ?>
														<p><a href="<?php echo $toggles[$i]['link']; ?>">
															<?php if (get_locale() == 'en_US') : ?>
																Continue Reading
															<?php else : ?>
																Continue leyendo
															<?php endif; ?>
														</a></p>
													</div>
												</div>
											</div>
										<?php endfor; ?>
									</div>
									<div class="custom-accordion__container">
										<?php for ($i = $half_toggles_count; $i < $toggles_count; $i++) : ?>
											<div class="custom-accordion__item">
												<div class="custom-accordion-toggle hide">
													<div class="custom-accordion-title">
														<h3><?php echo $toggles[$i]['question']; ?></h3><i class="faq-icon"></i>
													</div>
													<div class="custom-accordion-content">
														<?php echo $toggles[$i]['answer']; ?>
														<p><a href="<?php echo $toggles[$i]['link']; ?>">
															<?php if (get_locale() == 'en_US') : ?>
																Continue Reading
															<?php else : ?>
																Continue leyendo
															<?php endif; ?>
														</a></p>
													</div>
												</div>
											</div>
										<?php endfor; ?>
									</div>
									
									<div class="home-faq-button home-blog-button">
										<?php if(get_locale() == "en_US"){ ?>
											<a href="https://aa.law/faqs/" class="btn">View All FAQs</a>
										<?php } else { ?>
											<a href="https://aa.law/es/preguntas-frecuentes/" class="btn">Ver todas las preguntas frecuentes</a>
										<?php } ?>
									</div>
								</div>
							</div>
						</section>
					<?php endif; ?>
				<?php endif; ?>
			<?php endwhile; ?>
		<?php endif; ?>

		<?php if( have_rows('two_graphics_text') ): ?>
		<?php while( have_rows('two_graphics_text') ): the_row(); ?>
		<section class="two-graphics-text">
			<div class="container">
				<div class="row">
					<div class="grid-7">
						<div class="image-contain relative reveal-up-all">
							<div class="color-panel skinny top-left bg-lt-green"></div>
							<?php
							$image = get_sub_field('left_image');
							if (!empty($image)) : ?>
								<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
							<?php endif; ?>
						</div>
						<div class="copy reveal-up-all">
							<h2><?php the_sub_field('headline'); ?></h2>
							<?php the_sub_field('copy'); ?>
						</div>
					</div>
					<div class="grid-8 carousel reveal-up-all">
						<?php if(get_locale() == "en_US"){ ?>
						<h2 class="testimonial-head">Justice Served: Watch How We Won for Our Clients</h2>
						<?php }else{ ?>
						<h2 class="testimonial-head">Testimonios De Clientes</h2>
						<?php } ?>
<!-- 						<div class="color-panel skinny top-right bg-lt-green"></div> -->
						<?php if ( get_sub_field( 'has_right_carousel' ) ) { ?>
						<?php if( have_rows('right_carousel_images') ): ?>
							<div class="carousel-contain">
								
							<?php while( have_rows('right_carousel_images') ): the_row(); ?>
							<div class="image-testimonial">
								<?php 
								$image = get_sub_field('image');
								if ($image) : 
								?>
									<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
								<?php endif; ?>
								<div class="play-text" data-fancybox="video-testimonials" data-src="<?php the_sub_field('mp4_file'); ?>" data-thumb="<?php the_sub_field('poster'); ?>">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/icon-play.svg" alt="play button" />
									<p><?php the_sub_field('copy'); ?></p>
								</div>
								<div class="gradient-bottom"></div>
							</div>
							<?php endwhile; ?>
							</div>
							<?php endif; ?>
							
						<?php } else { ?>
							<img src="<?php the_sub_field('right_image'); ?>">
						<?php } ?>
					</div>
				</div>
			</div>
		</section>
		<?php endwhile; endif; ?>
		
		<div class="gmbreviews">
			<h2>
				<?php if(get_locale() == "en_US"){?>
				Client Testimonials
				<?php }else{ ?>
				Testimonios De Clientes
				<?php } ?>
			</h2>
			<?php 
			echo do_shortcode("[grrating]");
			echo do_shortcode("[grreview place_id='ChIJbfPxU-O7woARq5CHtNDHQbY']Posts Heading[/grreview]");
			?>
		</div>
		<?php if(get_locale() == "en_US"){ ?>
		<?php get_template_part( 'template-parts/how-it-works' ); ?>
		<?php }else{ ?>
		<?php } ?>
		<?php get_template_part( 'template-parts/attorneys' ); ?>
		<section class='home_blog reveal-up-all'>
			<?php if(get_locale() == 'en_US'){ ?>
			<h2> California Legal Blog </h2>
			<p class="content">Browse the Adamson Ahdoot blog, your go-to resource for all things related to California personal injury laws. Our page is designed to provide valuable insights, tips, and updates on navigating the legal landscape regarding your case.</p>
			<?php } else{?>
			<h2> Publicaciones </h2>	
			<p class="content">Aprenda más sobre los casos de lesiones personales, el proceso para obtener una compensación y la búsqueda de justicia de los abogados dedicados del distinguido bufete Adamson Ahdoot LLP.</p>
			<?php } ?>
			
			<?php echo do_shortcode('[custom_home_blog]'); ?>
			<div class="home-blog-button reveal-up-all">
				<?php if(get_locale() == "en_US"){ ?>
				<a href="<?php echo get_permalink(get_option( 'page_for_posts' )) ?>" class="btn">View All Blogs</a>
				<?php }else{ ?>
				<a href="<?php echo get_permalink(get_option( 'page_for_posts' )) ?>" class="btn">Vea todas las publicaciones</a>
				<?php } ?>
			</div>
		</section>
		<?php if( have_rows('form_cta') ): ?>
		<?php while( have_rows('form_cta') ): the_row(); ?>
		<section class="form-cta" style="background:url(<?php the_sub_field('background_image'); ?>) no-repeat center center / cover">
			<div class="container">
				<div class="row">
					<div class="grid-7 copy bg-white reveal-up-all">
						<h2><?php the_sub_field('headline'); ?></h2>
						<?php get_template_part( 'contact-form', get_post_format() ); ?>
						<!-- <?php //if (get_locale() == 'en_US') { ?>
						<?php //the_field('form_embed', 'option'); ?>	
						<p class="small"><?php the_field('form_disclaimer', 'option'); ?></p>	
						<?php //} else { ?>
						<?php //the_field('form_embed_spanish', 'option'); ?>	
						<p class="small"><?php //the_field('form_disclaimer_spanish', 'option'); ?></p>
						<?php //} ?> -->
					</div>
				</div>
			</div>
		</section>
		<?php endwhile; endif; ?>
		<?php //get_template_part( 'template-parts/nascar-logos' ); ?>
	</main><!-- #main -->

<?php get_footer(); ?>
