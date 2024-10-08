<aside class="grid-5 sticky">
	<?php get_template_part( 'contact-form', get_post_format() ); ?>
	<div class="logos">
		<div class="row align-items-center">
			<?php if( have_rows('logos', 'option') ): ?>
			<div class="logos-contain">
				<?php while( have_rows('logos', 'option') ): the_row(); ?>
				<?php if ( get_sub_field( 'link' ) ): ?>
				<a href="<?php the_sub_field('link'); ?>" target="_blank" class="single-logo"><img src="<?php the_sub_field('logo', 'option'); ?>"></a>
			<?php else: ?>
				<div class="single-logo">
					<img src="<?php the_sub_field('logo', 'option'); ?>" class="single-logo">
				</div>
			<?php endif; ?>
				<?php endwhile; ?>
			<?php endif; ;?>
			</div>
		</div>
	</div>
	<div class="post-type-list">
		<h3>Accidents</h3>
		<?php 
			$args = array(
		    'post_type' => 'accidents',
		    'posts_per_page' => '10',
		    'orderby' => 'title',
		    'order'   => 'ASC',
		);
		$accident_query = new WP_Query( $args );
		?>
		 
		<?php if ( $injury_query->have_posts() ) : ?>
		 
		    <?php while ( $accident_query->have_posts() ) : $accident_query->the_post(); ?>
		        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		    <?php endwhile; ?>
		 
		    <?php wp_reset_postdata(); ?>
		 
		<?php endif; ?>
	</div>
</aside>