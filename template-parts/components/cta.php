<?php if( get_sub_field('background_image') ){ ?>
<section class="form-cta" style="background:url(<?php the_sub_field('background_image'); ?>) no-repeat center center / cover">
<?php } else { ?>
<section class="form-cta" style="background:url(https://aa.law/wp-content/uploads/2021/11/chris-at-desk-scaled.jpg) no-repeat center center / cover">
<?php } ?>
	<div class="container">
		<div class="row">
			<div class="grid-7 copy bg-white reveal-up-all">
				<?php get_template_part( 'contact-form', get_post_format() ); ?>
			</div>
		</div>
	</div>
</section>