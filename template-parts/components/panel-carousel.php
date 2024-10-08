
	<?php if( have_rows('hero') ): ?>
	<?php while( have_rows('hero') ): the_row(); ?>
	<?php
	$featured_posts = get_field('accident_injury');
	if( $featured_posts ): ?>
		<?php foreach( $featured_posts as $post ): 	
			setup_postdata($post); ?>
			<?php $postId = $post->ID; ?>
		<?php endforeach; ?>
		<?php 
		wp_reset_postdata(); ?>
	<?php endif; ?>
	<?php endwhile; endif; ?>
	
		<?php 		
		$args = array(
			'post_type'         => 'case_results',
			'posts_per_page'    => 6,
			'post__not_in' => array( $post->ID ),
			'meta_query' => array(
				array(
					'key' => 'accident_injury', // name of custom field
					'value' => '"' . $postId . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
					'compare' => 'LIKE'
				)
			)
		);	
		
		$the_query = new WP_Query( $args );		
		?>
		
		<?php if( $the_query->have_posts() ): ?>
		<section class="panel-carousel bg-forest bg-logomark">
		<div class="container">
		<div class="row">
			<h2 class="reveal-up-all"><?php the_sub_field('headline'); ?></h2>
		</div>
		<div class="row">
		<div class="carousel-contain"> 
			<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<div class="single-panel">
					<p class="label small">Verdict</p>
					<?php if( have_rows('hero') ): ?>
					<?php while( have_rows('hero') ): the_row(); ?>
					<p class="h3"><?php the_sub_field('amount'); ?></p>
					<?php endwhile; endif; ?>
					<p class="headline"><?php echo get_the_title( $post->ID ); ?></p>
					<a href="<?php echo get_permalink( $post->ID ); ?>">Read More</a>
				</div>
			<?php endwhile; ?>
		</div>
		</div>
			</div>
		</section>
		<?php endif; ?>
		
		<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>
