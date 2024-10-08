<section class="pages-cta">
	<div class="row">
		<?php if (get_locale() == 'en_US') { ?>
		<?php if( have_rows('pages', 'option') ): ?>
			<?php while( have_rows('pages', 'option') ): the_row(); ?>
			<div class="single-page" style="background:url(<?php the_sub_field('background_image'); ?>) no-repeat center center / cover">
				<div class="copy text-center">
					<h3><?php the_sub_field('title', 'option'); ?></h3>
					<p><?php the_sub_field('copy', 'option'); ?></p>
					<a href="<?php the_sub_field('page_link'); ?>" class="btn white"><?php the_sub_field('button_name'); ?></a>
				</div>
				<div class="bg-overlay"></div>
			</div>
			<?php endwhile; ?>
		<?php endif; ;?>
		<?php } else { ?>
		<?php if( have_rows('pages_spanish', 'option') ): ?>
			<?php while( have_rows('pages_spanish', 'option') ): the_row(); ?>
			<div class="single-page" style="background:url(<?php the_sub_field('background_image'); ?>) no-repeat center center / cover">
				<div class="copy text-center">
					<h3><?php the_sub_field('title', 'option'); ?></h3>
					<p><?php the_sub_field('copy', 'option'); ?></p>
					<a href="<?php the_sub_field('page_link'); ?>" class="btn white"><?php the_sub_field('button_name'); ?></a>
				</div>
				<div class="bg-overlay"></div>
			</div>
			<?php endwhile; ?>
		<?php endif; ;?>
		<?php } ?>
	</div>
</section>