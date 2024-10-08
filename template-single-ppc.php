<?php
/*
	Template Name: PPC Single Old Layout
	Template Post Type: ppc-site
*/
?>
<?php get_header("ppc-site"); ?>

	<main id="primary" class="site-main">
		<?php if( have_rows('hero') ): ?>
		<?php while( have_rows('hero') ): the_row(); ?>
		<section class="hero relative" style="background:url(<?php the_sub_field('background_image'); ?>) no-repeat center center / cover">
			<div class="bg-overlay dark"></div>
			<div class="container">
				<div class="row align-items-start">
					<div class="grid-9 copy text-center">
						<h1><?php the_sub_field('headline'); ?></h1>
						<div class="caps white"><?php the_sub_field('subhead'); ?></div>
					</div>
				</div>
			</div>
		</section>					
		<?php endwhile; endif; ?>
		  <!--start mobile tags -->
		<div class="tablet-rotate__flex">
			
		
		<?php if( have_rows('section_list') ): ?>
		<?php while( have_rows('section_list') ): the_row(); ?>
		<section class="section-links bg-dark-green main-ppc__item">
			<div class="container">
				<div class="row">
					<div class="grid-9 list-section_singleppc">
						<?php the_sub_field('list'); ?>
						<h2 class="white text-center"><?php the_sub_field('bottom_headline'); ?></h2>
						<div class="seen-on-line"></div>
						<div class="tablet-hide">
								<?php get_template_part( 'template-parts/content-seenicon' ); ?>
						</div>
					
					</div>
					<div class="form-cta grid-6 single-form_ppc">
						<h3 class="white text-center"><?php the_sub_field('headline'); ?></h3>
						<p class="large white text-center"><?php the_sub_field('subhead'); ?></p>
						<?php if( have_rows('hero') ): ?>
						<?php while( have_rows('hero') ): the_row(); ?>
						<?php if( have_rows('form_cta') ): ?>
						<?php while( have_rows('form_cta') ): the_row(); ?>
							<div class="copy">
								<h2><?php the_sub_field('headline'); ?></h2>
								<?php the_sub_field('copy'); ?>
							</div>
							<?php get_template_part( 'contact-form', get_post_format() ); ?>	
							<div class="text-center graphic">
								<div class="graphic-form-line"></div>
								<img style="width:30%" src="<?php echo get_template_directory_uri(); ?>/assets/avvo-rating-new.png">
								<img style="width:30%" src="<?php echo get_template_directory_uri(); ?>/assets/google-new.png">
								<img style="width:30%" src="<?php echo get_template_directory_uri(); ?>/assets/excellent.png">
							</div>
<!-- 							<div class="arrow-down"></div> -->
						<?php endwhile; endif; ?>
						<?php endwhile; endif; ?>
					</div>
					<h2 class="white text-center hide-for-desktop"><?php the_sub_field('bottom_headline'); ?></h2>
					<div class="tablet-display desktop-hide">
						<?php get_template_part( 'template-parts/content-seenicon' ); ?>
					</div>
					
				</div>
			</div>
		</section>
		<?php endwhile; endif; ?>
		<?php get_template_part( 'template-parts/nascar-logos' ); ?>
		</div>
		<?php get_template_part( 'template-parts/numbers-carousel' ); ?>
		
		<section class="three-column-list">
			<div class="container">
					<?php if(get_locale() == "en_US") { ?>
				<div class="row justify-content-center">
					<h2>How we can help</h2>
				</div>
				<div class="row">
					<div class="grid-5 text-right">
						<ul>
							<li>100+ Years of Combined Experience</li>
							<li>100% Focused on Personal Injury</li>
							<li>Hablamos Español </li>
						</ul>
					</div>
					<div class="grid-4">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/logomark.svg" alt="Logomark">
					</div>
					<div class="grid-5">
						<ul>
							<li>Small Firm with Large Capabilities</li>
							<li>Free & Confidential Consultations </li>
							<li>Minority-Owned Law Firm</li>
						</ul>
					</div>
				</div>
				<?php } else{ ?>
				<div class="row justify-content-center">
					<h2>Cómo le podemos ayudar</h2>
				</div>
				<div class="row">
					<div class="grid-5 text-right">
						<ul>
							<li>100+ años de experiencia combinada</li>
							<li>100% enfocado en lesiones personales</li>
							<li>Hablamos Español</li>
						</ul>
					</div>
					<div class="grid-4">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/logomark.svg" alt="Logomark">
					</div>
					<div class="grid-5">
						<ul>
							<li>Bufete pequeña con capacidad grande</li>
							<li>Consultas gratuitas y confidenciales</li>
							<li>Litigantes civiles diestros</li>
						</ul>
					</div>
				</div>
				<?php } ?>
			</div>
		</section>
		<div class="single-ppc_attorney">
			<?php get_template_part( 'template-parts/attorneys-ppc' ); ?>
		</div>
		
		<?php if( have_rows('image_text_panel') ): ?>
		<?php while( have_rows('image_text_panel') ): the_row(); ?>
		<section class="image-text-panel bg-lt-green">
			<div class="container">
				<div class="row">
					<div class="copy text-center">
						<h2><?php the_sub_field('headline'); ?></h2>
						<p><?php the_sub_field('copy'); ?></p>
					</div>
				</div>
			</div>
		</section>
		<?php endwhile; endif; ?>
		<secition class="feature-in c_ptb-50  d_block">
				<div class="container">
			<div class="row">
				<h2 class="thin  feature-titles features-icon-title">Featured in</h2>
		<div class="is-layout-flow">
						<ul class="is-layout-flow is-flex-container columns-5 wp-block-post-template awards-mb justify-content-center custom-award-width">
				<?php while( have_rows('featured_companies'  , 'option') ): the_row(); ?>
			<li class="wp-block-post post-8854 accidents type-accidents status-publish has-post-thumbnail hentry">
						<div class="is-layout-flow  text-center" >
											<div class="entry-thumbnail">
												<img src="<?php the_sub_field('img'); ?>">
											</div>
										</div>
									</li>
				<?php endwhile; wp_reset_postdata(); ?>
						</ul>
					</div>
				
			</div>
			</div>
		</secition>
		
		<!-- faq -->
		<?php if (have_rows('question_carousel')): ?>
			<?php while (have_rows('question_carousel')): the_row(); ?>
				<?php
				$schemaInfo = get_field('question_carousel', $post->ID);
				$faqsExist = false;

				// Check if there are any FAQs with both question and answer
				foreach ($schemaInfo['toggle'] as $faqs) {
					if (!empty($faqs['question']) && !empty($faqs['answer'])) {
						$faqsExist = true;
						break;
					}
				}

				// Only display the section if there are valid FAQs
				if ($faqsExist): ?>
					<section class="panel-carousel bg-forest bg-logomark home-faq">
						<div class="container">
							<div class="row">
								<h2 class="thin reveal-up-all m_text-center"><?php the_sub_field('headline'); ?></h2>
							</div>
							<div class='custom-accordion faq reveal-up-all'>
								<?php foreach ($schemaInfo['toggle'] as $faqs): ?>
									<?php if (!empty($faqs['question']) && !empty($faqs['answer'])): ?>
										<div class='custom-accordion-toggle hide'>
											<div class='custom-accordion-title'>
												<h3><?php echo $faqs['question']; ?></h3><i class='faq-icon'></i>
											</div>
											<div class='custom-accordion-content'>
												<?php echo $faqs['answer']; ?>
												<?php if (!empty($faqs['link'])): ?>
													<p><a href='<?php echo $faqs['link']; ?>'>
														<?php if (get_locale() == 'en_US'): ?>
															Continue Reading
														<?php else: ?>
															Continue leyendo
														<?php endif; ?>
													</a></p>
												<?php endif; ?>
											</div>
										</div>
									<?php endif; ?>
								<?php endforeach; ?>
							</div>
						</div>
					</section>
				<?php endif; ?>
			<?php endwhile; ?>
		<?php endif; ?>
		<!--end of faq -->


		<?php if( have_rows('colored_callout') ): ?>
		<?php while( have_rows('colored_callout') ): the_row(); ?>
		<section class="colored-callout">
			<div class="container">
				<?php if(get_locale() == "en_US"){ ?>
								<div data-jsonld="1" data-bid="94135_94149_94172_94173_95937_95939_95941_95942_95943_95944_95945_95946" data-aid="4646" data-url="https://app.gatherup.com"><script src="https://widget.reviewability.com/js/widgetAdv.min.js" async=""></script></div><script class="json-ld-content" type="application/ld+json"></script>
				<?php }else{ ?>
				<div data-bid="94149" data-url="https://app.gatherup.com"><script src="https://widget.reviewability.com/js/widgetAdv.min.js" async=""></script></div><script class="json-ld-content" type="application/ld+json"></script>
<?php } ?>
<!-- 				<div class="row justify-content-center bg-green">
					<p class="medium text-center"><?php the_sub_field('top_headline'); ?></p>
					<h2><?php the_sub_field('bottom_headline', false); ?></h2>
				</div> -->
			</div>
		</section>
		<?php endwhile; endif; ?>
		
		<section class="form-cta__ppc-section" style="background:url(https://aa.law/wp-content/uploads/2021/11/chris-at-desk-scaled.jpg) no-repeat center center / cover">
			<div class="container">
				<div class="row">
					<div class="grid-7 bg-white reveal-up-all">
						<?php if(get_locale() == "en_US"){ ?>
							<h2>Turn to an experienced law firm equipped to handle cases throughout Los Angeles and California.</h2>
						<?php }else{ ?>
							<h2>Consulta Gratis</h2>
						<?php } ?>
						<?php get_template_part( 'contact-form-ppc', get_post_format() ); ?>
					</div>
				</div>
			</div>
		</section>

	</main><!-- #main -->
<?php get_footer("ppc"); ?>
