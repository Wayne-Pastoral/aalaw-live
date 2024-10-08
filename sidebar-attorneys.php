<aside class="grid-5">
	<div class="attorney-headshot relative">
		<div class="bg-forest color-panel"></div>
		<?php the_post_thumbnail(); ?>
	</div>
	<?php get_template_part( 'contact-form', get_post_format() ); ?>
	<?php include( locate_template( 'template-parts/awardscarousel.php', false, false ) ) ?>
	<?php //get_template_part( 'template-parts/nascar-logos-mobile' ); ?>
	<?php 	if( have_rows('attorney_awards') ): ?>
	<div class="attorney-award">
	<?php 
		$attyname = get_field('author_name', $post->id);
		
			if (get_locale() == 'en_US') {
				echo '<h3>Awards '.$attyname.' Won</h3>';
			} else {
				echo '<h3>Premios Ganados por '.$attyname.'</h3>';
			}
	?>
		<div class="logos-contain">
			<?php 
				while ( have_rows('attorney_awards') ) : the_row();

			?>
					<?php
						$logo = get_sub_field('logo'); // Get the array

						if ($logo) {
							$logo_url = isset($logo['url']) ? esc_url($logo['url']) : '';
							$logo_alt = isset($logo['alt']) ? esc_attr($logo['alt']) : ''; // Extract the alt text and escape it
						}
						?>
						<div class="single-logo">
							<?php if (!empty($logo_url)): ?>
								<img src="<?php echo $logo_url; ?>" alt="<?php echo $logo_alt; ?>" class="grid-3">
							<?php endif; ?>
						</div>
					<?php
			endwhile;
			
			?>
		</div>
		
	</div>
	<?php endif; ?>
	
</aside>