<?php if( have_rows('sections') ): ?>
	<?php while( have_rows('sections') ): the_row(); ?>
		<?php if( get_row_layout() == 'hero' ): ?>
			<?php get_template_part( 'template-parts/components/hero' ); ?>
		<?php elseif( get_row_layout() == 'attorneys' ): ?>
			<?php get_template_part( 'template-parts/components/attorneys' ); ?>
		<?php elseif( get_row_layout() == 'panel_carousel' ): ?>
			<?php get_template_part( 'template-parts/components/panel-carousel' ); ?>
		<?php elseif( get_row_layout() == 'cta' ): ?>
			<?php get_template_part( 'template-parts/components/cta' ); ?>
		<?php endif; ?>	
	<?php endwhile; ?>
<?php endif; ?>