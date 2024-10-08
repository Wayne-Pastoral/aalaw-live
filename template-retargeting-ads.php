<?php
/*
	Template Name: Retargeting Ads
	Template Post Type: ppc-site
*/
?>

<?php get_header("ppc-site"); ?>

	<main id="primary" class="site-main">
		<?php $image = get_field('hero_image'); ?>	
		<section class="hero relative" style="background:url(<?php echo esc_url($image['url']); ?>) no-repeat center center / cover">
			<div class="bg-overlay bg-black"></div>
			<div class="container">
				<div class="row align-items-center">
					<div class="grid-6 copy">
						<?php if (get_locale() == 'en_US') { ?>
						<h1>Get the compensation you deserve</h1>
						<p>Understand how much your case is worth. Multiple factors can affect your case – and it’s in your best interest to work with professionals who are on your side.</p>
						<h3>Pay Us Nothing <span class="green">Unless You Win!</span></h3>
						<?php } else {  ?>
						<h1><div class="caps">Obtenga máxima</div>compensación por su accidente.</h1>
						<h3>¡No nos pague nada<span class="green">a menos que gane!</span></h3>
						<?php } ?>
						
						<div class="badges">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/badge-bbb-blue.png" alt="BBB Badge">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/badge-google.png" alt="Google Badge">
						</div>
					</div>
					<div class="grid-6 hero-form">
						<?php echo do_shortcode('[gravityform id="1" title="true" ajax="true"]'); ?>
					</div>
				</div>
			</div>
			<a href="#help" class="caps small">Scroll <img src="<?php echo get_template_directory_uri(); ?>/assets/icon-chevron-down-white.svg"></a>
		</section>					
		<section id="help" class="check-list">
			<div class="container">
				<div class="row">
					<?php if (get_locale() == 'en_US') { ?>
					<h2>Get immediate assistance with:</h2>
					<?php } else {  ?>
					<h2>Obtenga asistencia inmediata con:</h2>
					<?php } ?>
				</div>
				<div class="row">
					<?php if (get_locale() == 'en_US') { ?>
					<ul>
						<li><h3>Medical Bills</h3></li>
						<li><h3>Lost Income</h3></li>
						<li><h3>Car Rental</h3></li>
						<li><h3>New car or fixed as new</h3></li>
						<li><h3>Pain & Suffering Compensation</h3></li>
						<li><h3>Receiving the Highest Possible Compensation</h3></li>
					</ul>
					<?php } else {  ?>
					<ul>
						<li><h3>Facturas médicas</h3></li>
						<li><h3>Ingresos perdidos</h3></li>
						<li><h3>Alquiler de coches</h3></li>
						<li><h3>Coche nuevo o arreglado como nuevo</h3></li>
						<li><h3>Compensación por dolor y sufrimiento</h3></li>
						<li><h3>Recibir la compensación más alta posible</h3></li>
					</ul>
					<?php } ?>
				</div>
			</div>
			<img src="<?php echo get_template_directory_uri(); ?>/assets/bg-logomark.svg" alt="Logomark" class="logomark">
		</section>

		<section class="nascar reveal-up-all home">
			<div class="container container--full">
					<div class="row justify-content-center text-center">
						<div class="grid-12 copy text-center">
							<?php if (get_locale() == 'en_US') { ?>
							<h2 class="text-center">Award-Winning <?php the_field('key_phrase'); ?> Lawyers</h2>
							<?php } else {  ?>
							<h2 class="text-center">Abogados condecorados en <?php the_field('key_phrase'); ?></h2>
							<?php } ?>
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
		
		<?php get_template_part( 'template-parts/attorneys-ppc' ); ?>
		
		<section class="case-results bg-dark-green">
			<div class="container">
				<div class="row justify-content-center">
					<?php if (get_locale() == 'en_US') { ?>
					<h2 class="text-center">Recent Client Wins <div class="green">Over $500,000,000 Recovered</div></h2>
					<?php } else {  ?>
					<h2 class="text-center">Ganancias recientes de clientes <div class="green">Más de $500,000,000 recuperado</div></h2>
					<?php } ?>
				</div>
				<div class="row">
					<a href="<?php if (get_locale() == 'en_US') { echo 'https://aa.law/case-results/9m-wrongful-death-from-exertional-heat-stroke/'; } else { echo 'https://aa.law/es/case-results/9m-muerte-injusta-por-golpe-de-calor-por-esfuerzo/'; } ?>" class="verdict bg-white">
						<p class="caps small green"><?php if (get_locale() == 'en_US') { ?>Settlement<?php } else { ?>Acuerdo<?php } ?></p>
						<p class="h3">$9M</p>
						<?php if (get_locale() == 'en_US') { ?>
						<p class="headline">Wrongful death from Exertional Heat Stroke</p>
						<?php } else {  ?>
						<p class="headline">Muerte injusta por golpe de calor por esfuerzo</p>
						<?php } ?>
					</a>
					<a href="<?php if (get_locale() == 'en_US') { echo 'https://aa.law/case-results/5m-workplace-dismemberment-lathe-accident/'; } else { echo 'https://aa.law/es/case-results/acuerdo-5-millones-accidente-desmembramiento-en-lugar-de-trabajo/'; } ?>" class="verdict bg-white">
<p class="caps small green"><?php if (get_locale() == 'en_US') { ?>Settlement<?php } else { ?>Acuerdo<?php } ?></p>
						<p class="h3">$5M</p>
						<?php if (get_locale() == 'en_US') { ?>
						<p class="headline">Workplace dismemberment from a Lathe Accident</p>
						<?php } else {  ?>
						<p class="headline">Desmembramiento en el trabajo por accidente de torno</p>
						<?php } ?>
					</a>
					<a href="<?php if (get_locale() == 'en_US') { echo 'https://aa.law/case-results/3-million-for-a-large-truck-rear-end-accident/'; } else { echo 'https://aa.law/es/case-results/3-millones-por-un-accidente-de-camion-grande-en-la-parte-trasera/'; } ?>" class="verdict bg-white">
						<p class="caps small green"><?php if (get_locale() == 'en_US') { ?>Settlement<?php } else { ?>Acuerdo<?php } ?></p>
						<p class="h3">$3M</p>
						<?php if (get_locale() == 'en_US') { ?>
						<p class="headline">Rear-End Vehicle Accident</p>
						<?php } else {  ?>
						<p class="headline">Accidente vehicular trasero</p>
						<?php } ?>
					</a>
					<a href="<?php if (get_locale() == 'en_US') { echo 'https://aa.law/case-results/2-9-million-for-a-tractor-trailer-collision/'; } else { echo 'https://aa.law/es/case-results/2-9-millones-por-colision-de-camion-con-remolque/'; } ?>" class="verdict bg-white">
						<p class="caps small green"><?php if (get_locale() == 'en_US') { ?>Settlement<?php } else { ?>Acuerdo<?php } ?></p>
						<p class="h3">$2.9M</p>
						<?php if (get_locale() == 'en_US') { ?>
						<p class="headline">Tractor-Trailer T-Bone Accident</p>
						<?php } else {  ?>
						<p class="headline">Accidente T-Bone de camión con remolque</p>
						<?php } ?>
					</a>
					<a href="<?php if (get_locale() == 'en_US') { echo 'https://aa.law/case-results/2-8m-settlement-for-a-rear-end-car-accident/'; } else { echo 'https://aa.law/es/case-results/acuerdo-2-8m-por-accidente-automovilistico-trasero/'; } ?>" class="verdict bg-white">
						<p class="caps small green"><?php if (get_locale() == 'en_US') { ?>Settlement<?php } else { ?>Acuerdo<?php } ?></p>
						<p class="h3">$2.8M</p>
						<?php if (get_locale() == 'en_US') { ?>
						<p class="headline">Rear-end accident causing “chain reaction” collision</p>
						<?php } else {  ?>
						<p class="headline">Accidente trasero causante de colisión "reacción en cadena"</p>
						<?php } ?>
					</a>
					<a href="<?php if (get_locale() == 'en_US') { echo 'https://aa.law/case-results/2-7m-negotiated-in-wrongful-death-suit/'; } else { echo 'https://aa.law/es/case-results/2-7m-negociados-en-demanda-por-homicidio-culposo/'; } ?>" class="verdict bg-white">
						<p class="caps small green"><?php if (get_locale() == 'en_US') { ?>Settlement<?php } else { ?>Acuerdo<?php } ?></p>
						<p class="h3">$2.7M</p>
						<?php if (get_locale() == 'en_US') { ?>
						<p class="headline">Wrongful death from a rear-end truck accident</p>
						<?php } else {  ?>
						<p class="headline">Muerte por negligencia de un accidente trasero de camión</p>
						<?php } ?>
					</a>
				</div>
			</div>
		</section>
		<section class="callout bg-gold">
			<div class="container">
				<div class="row justify-content-center">
					<?php if (get_locale() == 'en_US') { ?>
					<h3 class="text-center">Discover how much you can get for your <?php the_field('key_phrase'); ?> case, <br />
						call <a href="tel:(866) 225-4654">(866) 225-4654</a>.</h3>
					<?php } else {  ?>
					<h3 class="text-center">Descubre cuánto puedes obtener por tu caso de <?php the_field('key_phrase'); ?>, <br />llame al <a href="tel:(866) 225-4654">(866) 225-4654</a>.</h3>
					<?php } ?>
				</div>
			</div>
		</section>
		<section class="testimonials">
			<div class="container">
				<div class="row">
					<?php if (get_locale() == 'en_US') { ?>
					<h2>What Our Clients Are Saying</h2>
					<?php } else {  ?>
					<h2>Lo que nuestros clientes están diciendo</h2>
					<?php } ?>
				</div>
				<div class="row">
					<div data-bid="94135" style="width:100%" data-url="https://app.gatherup.com" ><script src="https://widget.reviewability.com/js/widgetAdv.min.js" async></script></div><script class="json-ld-content" type="application/ld+json"></script>
				</div>
				<div class="row justify-content-center">
					<?php if (get_locale() == 'en_US') { ?>
					<h3 class="text-center">We’ve helped hundreds of clients win their<br />
					<?php the_field('key_phrase'); ?> claim and we can help you.</h3>
					<?php } else {  ?>
					<h3 class="text-center">Hemos ayudado a cientos de clientes a ganar su<br />
					caso de <?php the_field('key_phrase'); ?> y te podemos ayudar.</h3>
					<?php } ?>
				</div>
			</div>
		</section>
		<!-- <section class="form-cta">
			<div class="row align-items-center">
				<div class="image">
					<img src="<?php //echo get_template_directory_uri(); ?>/assets/attorney-at-work.jpg" alt="Attorney at work on computer">
				</div>
				<?php //get_template_part( 'contact-form', get_post_format() ); ?>
			</div>
		</section> -->
		
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

		<section class="callout bg-green">
			<div class="container">
				<div class="row justify-content-center">
					<?php if (get_locale() == 'en_US') { ?>
					<h3 class="text-center">Do not hesitate to call Adamson Ahdoot LLP if you or a loved one were injured due to the negligence of another person.<br />
					Request a free consultation today by calling <a href="tel:866-719-4271">866-719-4271.</a></h3>
					<?php } else {  ?>
					<h3 class="text-center">No dude en llamar a Adamson Ahdoot LLP si usted o un ser querido resultaron heridos debido a la negligencia de otra persona.<br />
					Solicite una consulta gratuita hoy llamando al <a href="tel:866-719-4271">866-719-4271.</a></h3>
					<?php } ?>
				</div>
			</div>
		</section>

	</main><!-- #main -->
<?php get_footer("ppc"); ?>
