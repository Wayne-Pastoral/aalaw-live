<?php if( have_rows('form_cta') ): ?>
<?php while( have_rows('form_cta') ): the_row(); ?>
<section class="form-cta" style="background:url(<?php the_sub_field('background_image'); ?>) no-repeat center top/ cover">
	<div class="container">
		<div class="row">
			<div class="grid-7 copy bg-white reveal-up-all">
				<?php get_template_part( 'contact-form', get_post_format() ); ?>			
			</div>
			<div class="grid-8 copy offset bg-lt-green">				
				<?php the_sub_field('copy'); ?>
			</div>
		</div>
	</div>
</section>
<?php endwhile; endif; ?>