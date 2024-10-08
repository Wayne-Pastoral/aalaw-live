<section class="nascar bg-cream">
	<div class="container">
		<div class="row justify-content-center ">
			<?php if ( is_singular( 'ppc-site' ) ) { ?>
				<?php if (get_locale() == 'en_US') { ?>
					<h2>Awards &amp; Affiliations</h2>
				<?php } else { ?>
					<h2>Premios y afiliaciones</h2>
				<?php } ?>
			<?php } ?>
			<?php if (is_front_page()) { ?>
			<h2>Awards Won by Adamson Ahdoot</h2>
			<?php } ?>
		</div>
	</div>
		
			<?php if ( is_page_template('template-ppc-old-layout-old-colors.php') ) { ?>
 			<div class="row">
			<?php if( have_rows('old_logos', 'option') ): ?>
			<div class="logos-contain">
				<?php while( have_rows('old_logos', 'option') ): the_row(); ?>
					<div class="single-logo">
						<img src="<?php the_sub_field('logo', 'option'); ?>" class="grid-3">
					</div>
				<?php endwhile; ?>
			</div>
			<?php endif; ?>
			</div>
			<?php } else { ?>
			
				<?php
			
				$logosargs = array(
					'post_type' => 'awards',
					'numberposts' => '-1',
					'order' => 'ASC'
				);
				$awards = get_posts($logosargs);

				if ($awards) :
					echo '<div class="logos-carousel owl-carousel">';
					foreach ($awards as $award) :
						$uniqueclass = $award->post_name;
						$awardlogo = wp_get_attachment_image_src( get_post_thumbnail_id( $award->ID ), 'full' );
						echo '<div class="single-logo '.$uniqueclass.'"><img src="'.$awardlogo[0].'" alt="" /></div>';
					endforeach;
					echo '</div>';
				endif;

				?>
			
<!-- 			<?php if( have_rows('old_logos', 'option') ): ?>
			<div class="logos-contain">
				<?php while( have_rows('logos', 'option') ): the_row(); ?>
					<div class="single-logo">
						<img src="<?php the_sub_field('logo', 'option'); ?>" class="grid-3">
					</div>
				<?php endwhile; ?>
			</div>
 			<?php endif; ;?> -->
			<?php } ?>
	
</section>