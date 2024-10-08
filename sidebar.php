<aside class="grid-5 sticky">
	<?php get_template_part( 'contact-form', get_post_format() ); ?>
	
	<?php global $post;
	if($post->ID == '17238' || $post->ID == '18034'){ ?>
	
	<div class="scholar-sidebar">
		<div class="areas-of-expertise">
			<?php if(get_locale()=="en_US"){ ?>
			<h3>Areas of Expertise</h3>
			<ul>
				<li><a href="https://aa.law/practice-areas/injuries/brain-spinal-cord/traumatic-brain/">Brain Injuries</a></li>
				<li><a href="https://aa.law/practice-areas/accidents/traffic/bicycle/">Bicycle Accidents</a></li>
				<li><a href="">Head Injuries</a></li>
				<li><a href="https://aa.law/wrongful-death-lawyer/">Wrongful Death</a></li>
				<li><a href="https://aa.law/practice-areas/injuries/soft-tissue/dog-bite/">Dog Bites</a></li>
				<li><a href="https://aa.law/practice-areas/accidents/traffic/motorcycle/">Motorcycle Accidents</a></li>
				<li><a href="">Truck Accidents</a></li>
				<li><a href="">Car Accidents</a></li>
				<li><a href="https://aa.law/pedestrian-accident-attorney/">Pedestrian Accidents</a></li>
				<li><a href="<?php echo get_the_permalink('4256') ?>">See All Practice Areas</a></li>
			</ul>
				
				<?php } else{ ?>
			
				<h3>Áreas de Especialización</h3>
			<ul>
				<li><a href="https://aa.law/es/practice-areas/injuries/lesiones-cerebrales-espina-dorsal/traumatismo-cerebral/">Lesiones de Traumatismo Cerebral</a></li>
				<li><a href="https://aa.law/es/practice-areas/accidents/trafico/involucrado-accidente-bicicleta/">Accidentes en Bicicleta</a></li>
				<li><a href="">Head Injuries</a></li>
				<li><a href="https://aa.law/wrongful-death-lawyer/">Wrongful Death</a></li>
				<li><a href="https://aa.law/es/practice-areas/injuries/tejidos-blandos/mordeduras-de-perros/">Mordidas de Perros </a></li>
				<li><a href="https://aa.law/es/practice-areas/accidents/trafico/motocicleta/">Accidentes en Motocicleta</a></li>
				<li><a href="">Truck Accidents</a></li>
				<li><a href="">Car Accidents</a></li>
				<li><a href="https://aa.law/es/practice-areas/accidents/trafico/peatones/">Accidente de peatones</a></li>
				<li><a href="<?php echo get_the_permalink('4432') ?>">Ver Todos los Áreas de Práctica</a></li>
			</ul>
				<?php } ?>
		</div>
		<div class="locations">
				<?php if(get_locale() =="en_US"){ ?>
			<h3>Locations</h3>
			<?php } else{?>
			<h3>Áreas que Servimos</h3>
			<?php } ?>
			<ul>
			<?php 			
				$args = array(
					'post_type' => 'locations',
					'orderby' => 'title',
					'order' => 'ASC',
					'post_status'=>'publish',
					'posts_per_page' => '-1'
				);
				$query = new WP_Query( $args );
				// The Loop
				while ($query->have_posts()) {
					$query->the_post();
					global $post;

					$schemaInfo = get_field('schema_info', $post->ID);
					
					if (get_field('enable_schema', $post->ID) == 1){
						if(get_locale() == "en_US"){
							echo "<li><a href=" . get_the_permalink($post->id) . ">".  $schemaInfo['additional_address']['state'] ." Office</a></li>";
						}else{
							echo "<li><a href=" . get_the_permalink($post->id) . ">Oficina de ".  $schemaInfo['additional_address']['state'] ."</a></li>";
						}
						
						
					}
					
				}
				wp_reset_postdata();
			?>
<!-- 				<li><a href="<?php //echo get_the_permalink('13865') ?>">See All Locations</a></li> -->
			</ul>
		</div>
	</div>
	
	<?php 
	}else{ 
		$post_type = get_post_type( $post->ID );
		if ( $post_type === "locations" && get_locale() == "en_US") {
			include( locate_template( 'template-parts/location-based-blog.php', false, false ) );
		}
		include( locate_template( 'template-parts/awardscarousel.php', false, false ) );
		
// 	$comarg = array(
// 	'post_type' => 'awards',
// 	'posts_per_page'   => -1,
// 	'order' => 'ASC',
// 	'lang' => 'en'
// );

 ?>

<!-- <div class="logos arrow-logos">	
<div class="carousel">
	<?php $award = new WP_Query($comarg);	
		if ($award->have_posts()) :  ?>
		<?php while ($award->have_posts()) : $award->the_post(); ?>
		<div class="carousel-cell">
		<a href="<?php the_permalink(); ?>" target="_blank" class="single-logo"><?php the_post_thumbnail('meduim'); ?></a>
		</div>
	    <?php endwhile; ?>
	  <?php endif; ?>
	<?php wp_reset_query() ?>
   </div>
</div> -->
	<?php } ?>
</aside>