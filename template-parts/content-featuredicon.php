<div class="numbers-carousel featured-icon" id="featuresiconid">
	<div class="container">
		<h2 class="features-icon-title">Featured in</h2>
		<div class="">
			<div class="home-icon-bottom__banner">
				<ul class="is-layout-flow is-flex-container columns-7 wp-block-post-template awards-mb justify-content-center custom-award-width">
				<?php while( have_rows('featured_companies', 'option') ): the_row(); ?>
					<li class="wp-block-post post-8854 accidents type-accidents status-publish has-post-thumbnail hentry">
						<div class="is-layout-flow text-center">
							<div class="entry-thumbnail">
								<?php 
								$image = get_sub_field('img');
								if ($image) : 
								?>
									<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" aria-label="Featured company logo: <?php echo esc_attr($image['alt']); ?>">
								<?php endif; ?>
							</div>
						</div>
					</li>
				<?php endwhile; wp_reset_postdata(); ?>
				</ul>
			</div>
		</div>
	</div>
</div>
