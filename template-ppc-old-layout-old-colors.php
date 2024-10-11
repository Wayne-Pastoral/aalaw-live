<?php
/*
	Template Name: PPC Old Layout Old Colors
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
		<?php if( have_rows('section_list') ): ?>
		<?php while( have_rows('section_list') ): the_row(); ?>
		<section class="section-links bg-dark-blue">
			<div class="container">
				<div class="row">
					<div class="grid-9">
						<?php the_sub_field('list'); ?>
						<h2 class="gold text-center"><?php the_sub_field('bottom_headline'); ?></h2>
					</div>
					<div class="form-cta grid-6">
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
							<div class="form-angle"></div>
							<?php get_template_part( 'contact-form', get_post_format() ); ?>
							<div class="text-center graphic">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/avvo-superb.png" alt="Avvo Superb Rating">
							</div>
<!-- 							<div class="arrow-down"></div> -->
						<?php endwhile; endif; ?>
						<?php endwhile; endif; ?>
					</div>
					<h2 class="gold text-center hide-for-desktop"><?php the_sub_field('bottom_headline'); ?></h2>
				</div>
			</div>
		</section>
		<?php endwhile; endif; ?>
		<?php get_template_part( 'template-parts/numbers-carousel' ); ?>
		<?php get_template_part( 'template-parts/nascar-logos' ); ?>
		<section class="three-column-list">
			<div class="container">
				<div class="row justify-content-center">
					<?php if (get_locale() == 'en_US') { ?>
					<h2>How we can help</h2>
					<?php } else { ?>
					<h2>¡Queremos ayudar!</h2>
					<?php } ?>
				</div>
				<div class="row">
					<div class="grid-5 text-right">
						<?php if (get_locale() == 'en_US') { ?>
						<ul>
							<li>100+ Years of Combined Experience</li>
							<li>100% Focused on Personal Injury</li>
							<li>Hablamos Español</li>
						</ul>
						<?php } else { ?>
						<ul>
							<li>100 años de experiencia combinada</li>
							<li>100% enfocado en lesiones personales</li>
							<li>Hablamos Español</li>
						</ul>
						<?php } ?>
					</div>
					<div class="grid-4">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/logomark.svg" alt="Logomark">
					</div>
					<div class="grid-5">
						<?php if (get_locale() == 'en_US') { ?>
						<ul>
							<li>Small Firm with Large Capabilities</li>
							<li>Free & Confidential Consultations</li>
							<li>Skilled Civil Litigators </li>
						</ul>
						<?php } else { ?>
						<ul>
							<li>Bufete pequeña con capacidad grande</li>
							<li>Consultas gratuitas y confidenciales</li>
							<li>Litigantes civiles diestros</li>
						</ul>
						<?php } ?>
					</div>
				</div>
			</div>
		</section>
		<?php get_template_part( 'template-parts/attorneys-ppc' ); ?>
		<?php //get_template_part( 'template-parts/attorneys-ppc' ); ?>
		<?php if( have_rows('image_text_panel') ): ?>
		<?php while( have_rows('image_text_panel') ): the_row(); ?>
		<section class="image-text-panel bg-lt-blue">
			<div class="container">
				<div class="row">
					<div class="copy text-center">
						<h2 class="dk-blue"><?php the_sub_field('headline'); ?></h2>
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
				<div class="row justify-content-center bg-blue">
					<p class="medium text-center"><?php the_sub_field('top_headline'); ?></p>
					<h2><?php the_sub_field('bottom_headline', false); ?></h2>
				</div>
			</div>
		</section>
		<?php endwhile; endif; ?>
		
		
	</main><!-- #main -->
<?php get_footer("ppc"); ?>
