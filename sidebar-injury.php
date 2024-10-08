<aside class="grid-5 sticky">
	<?php get_template_part( 'contact-form', get_post_format() ); ?>
	<!-- The 3 logo iten	 -->
	<!--<div class="logos arrow-logos">	
		<div class="carousel">
			<?php while( have_rows('logos', 'option') ): the_row(); ?>
  		<div class="carousel-cell">
			<?php if ( get_sub_field( 'link' , 'option' ) ) { ?>
			<a href="<?php the_sub_field('link'); ?>" target="_blank" class="single-logo"><img src="<?php the_sub_field('logo', 'option'); ?>"></a>
			<?php } else {?>
			<a  class="single-logo"><img src="<?php the_sub_field('logo', 'option'); ?>"></a>
	  		<?php } ?>
		</div>
		<?php endwhile; ?>
	</div>
	</div>-->
	<?php include( locate_template( 'template-parts/awardscarousel.php', false, false ) ); ?>
<!-- The 3 logo iten	 -->
	<?php if ( is_singular( 'injuries' ) ) { ?>
	
	<div class="post-type-list">
		<?php if (get_locale() == 'en_US') { ?>
			<h3>Personal Injury</h3>
		<?php } else { ?>
			<h3>Lesiones Personales</h3>
		<?php } ?>
		<?php 
			$args = array(
		    'post_type' => 'injuries',
		    'posts_per_page' => '10',
		    'orderby' => 'title',
		    'order'   => 'ASC',
		);
		$injury_query = new WP_Query( $args );
		?>
		 
		<?php if ( $injury_query->have_posts() ) : ?>
		 
		    <?php while ( $injury_query->have_posts() ) : $injury_query->the_post(); ?>
		        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		    <?php endwhile; ?>
		 
		    <?php wp_reset_postdata(); ?>
		 
		<?php endif; ?>
	</div>
	<?php } ?>
	<?php if ( is_singular( 'accidents' ) ) { ?>
	
	<div class="post-type-list">
		<?php if (get_locale() == 'en_US') { ?>
			<h3>Accidents</h3>
		<?php } else { ?>
			<h3>Accidentes</h3>
		<?php } ?>
		
		<?php 
			
			$args = array(
		    'post_type' => 'accidents',
		    'posts_per_page' => '10',
		    'orderby' => 'title',
		    'order'   => 'ASC',
		);
		$injury_query = new WP_Query( $args );
		?>
		 
		<?php if ( $injury_query->have_posts() ) : ?>
		 
		    <?php while ( $injury_query->have_posts() ) : $injury_query->the_post(); ?>
		        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		    <?php endwhile; ?>
		 
		    <?php wp_reset_postdata(); ?>
		 
		<?php endif; ?>
	</div>
	<?php } ?>
</aside>