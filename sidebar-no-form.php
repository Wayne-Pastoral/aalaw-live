<aside class="grid-5 sticky">
	<div class="post-type-list">
		
		<?php if( have_rows('sidebar_links') ): ?>
		<?php while( have_rows('sidebar_links') ): the_row(); ?>
		<h3><?php the_sub_field('headline'); ?></h3>
		<?php
		$links = get_sub_field('links');
		if( $links ): ?>
		    <?php foreach( $links as $post ): 
		        // Setup this post for WP functions (variable must be named $post).
		        setup_postdata($post); ?>
		            <a href="<?php the_permalink(); ?>" aria-label="Read more: <?php the_title(); ?>"><?php the_title(); ?></a>
		    <?php endforeach; ?>
		    <?php 
		    wp_reset_postdata(); ?>
		<?php endif; ?>
		<?php endwhile; endif; ?>
	</div>
</aside>
