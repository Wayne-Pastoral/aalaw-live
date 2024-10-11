<?php
/*
	Template Name: PPC Old Layout
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
						  <?php while( have_rows('section_list') ): the_row(); ?>
						<div  class="wrong-full-death_banner tablet-display-820">
							<?php the_sub_field('list'); ?>
						</div>
				      <?php endwhile; wp_reset_postdata(); ?>
						 <div class="ppc-show--mobile ppc-hide wrong-full-death_banner--bottom tablet-display-820" style="background:#fff; color:#000;padding:20px">
							 <h3  class=" text-center">Get legal help today</h3>
							 <p class="large  text-center">Top Catastrophic Accident Lawyers</p>
						</div>
						<div class="caps white"><?php the_sub_field('subhead'); ?></div>
					</div>
				</div>
			</div>
		</section>					
		<?php endwhile; endif; ?>
		<?php if( have_rows('section_list') ): ?>
		<?php while( have_rows('section_list') ): the_row(); ?>
		<section class="section-links bg-dark-green">
			<div class="container">
				<div class="row">
					<div class="grid-9 tablet-hide-820">
						<?php the_sub_field('list'); ?>
						<h2 class="white text-center"><?php the_sub_field('bottom_headline'); ?></h2>
					</div>
					<div class="form-cta grid-6">
						<h3 class="white text-center tablet-hide-820"><?php the_sub_field('headline'); ?></h3>
						<p class="large white text-center tablet-hide-820"><?php the_sub_field('subhead'); ?></p>
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
								<img src="<?php echo get_template_directory_uri(); ?>/assets/avvo-superb.png" alt="Avvo Superb Rating">
							</div>
<!-- 							<div class="arrow-down"></div> -->
						<?php endwhile; endif; ?>
						<?php endwhile; endif; ?>
					</div>
					<h2 class="white text-center hide-for-desktop"><?php the_sub_field('bottom_headline'); ?></h2>
				</div>
			</div>
		</section>
		<?php endwhile; endif; ?>
		<?php get_template_part( 'template-parts/numbers-carousel' ); ?>
		<?php get_template_part( 'template-parts/nascar-logos' ); ?>
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
							<li>Hablamos Español</li>
						</ul>
					</div>
					<div class="grid-4">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/logomark.svg" alt="Logomark">
					</div>
					<div class="grid-5">
						<ul>
							<li>Small Firm with Large Capabilities </li>
							<li>Free & Confidential Consultations</li>
							<li>Skilled Civil Litigators</li>
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
							<li>Hablamos Español </li>
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
		<?php get_template_part( 'template-parts/attorneys-ppc' ); ?>
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
							<h2>Turn to an experienced law firm that handles cases throughout Los Angeles and California.</h2>
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
