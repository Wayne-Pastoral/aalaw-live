<?php
if ( get_post_type() == "case_results" ) {
	$image = "";
	$catSlug = "";
	$acfObject = get_field('accident_injury', $post->id);

	foreach($acfObject as $category ){
		$catSlug = $category->post_name;
	}

	$getCat = get_category_by_slug($catSlug);
	if($getCat == true) {
		$tag = 'category_' . $getCat->term_id;
		$image = get_field('featured_image',  $tag);
		
		if($image != ""){
?>
			<section class="hero" style="background:url(<?php echo $image ?>) no-repeat center center / cover">
				<div class="bg-overlay dark"></div>
<?php			
		} else { 	
?>
			<section class="hero" style="background:url(<?php echo get_template_directory_uri(); ?>/assets/hero-case-results.jpg) no-repeat center center / cover">
				<div class="bg-overlay dark"></div>

<?php
		}
		
	} else {			
?>
		<section class="hero" style="background:url(<?php echo get_template_directory_uri(); ?>/assets/hero-case-results.jpg) no-repeat center center / cover">
			<div class="bg-overlay dark"></div>

<?php 
	}		 

} else {

	if ( has_post_thumbnail() ) {
		global $post;
?>
		<section class="hero" style="background:url(<?php echo get_the_post_thumbnail_url($post->id, 'full') ?>) no-repeat center center / cover">
<?php 
	} else {
?>
		<section class="hero" style="background:url(<?php echo get_template_directory_uri(); ?>/assets/hero-case-results.jpg) no-repeat center center / cover">
<?php 
	}
}
?>
</section>
<section class="copy-with-stats">
	<div class="container">
		<?php echo do_shortcode('[custom_breadcrumbs]'); ?>
		<div class="row">
			<div class="copy description">
				<h1 class="h2"><?php the_title(); ?></h1>	
				<?php if ( !empty( get_the_content() ) ){ ?>
					<?php the_content(); ?>
					<?php if ( get_post_type() == "case_results" ) { ?>
						<?php pf_exhibition_navigation() ?>
					<?php } ?>
				<?php } else { ?>
					<?php the_sub_field('description'); ?>
				<?php } ?>
			</div>
			<div class="stat-box-container">
			<div class="stat-box">
				<?php if( get_sub_field('date') ): ?>
				<?php if (get_locale() == 'en_US') { ?>
				<?php
					$field = get_sub_field_object('result_type');
					$value = get_sub_field('result_type');
					if($value=='verdict'){
						$label = "Verdict Date";
					}
					if($value=='settlement'){
						$label = "Settlement";
					}
				?>
				<p class="label label-small"><?php echo $label; ?></p>
				<?php } else { ?>
				<?php
					$label = get_sub_field('result_type');	
					if($label=='verdict'){
						$label = "Fecha de Veredicto";
					}
					if($label=='settlement'){
						$label = "Acuerdo";
					}	
	
					
				?>
				<p class="label label-small"><?php echo $label; ?></p>
				<?php } ?>
				<p><?php the_sub_field('date'); ?></p>
				<?php endif; ?>
				
				
				<?php if( get_sub_field('amount') ): ?>
				<?php if (get_locale() == 'en_US') { ?>
				<p class="label label-small">Amount</p>
				<?php } else { ?>
				<p class="label label-small">Monto</p>
				<?php } ?>
				<p><?php the_sub_field('amount'); ?></p>
				<?php endif; ?>
				<div class="accident-injury-stat">
				<?php
				$accidentInjury = get_field('accident_injury');
				if( $accidentInjury ): ?>
					<?php foreach( $accidentInjury as $post ): 
						
						setup_postdata($post); ?>
						<?php
						$post_type = get_post_type_object($post->post_type); ?>
						<p class="label label-small <?php echo $post_type->labels->singular_name; ?>">
						
						<?php echo $post_type->labels->singular_name;
						?>
						</p>
				
						<a href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a>
					<?php endforeach; ?>
					<?php 
					wp_reset_postdata(); ?>
				<?php endif; ?>
				</div>
				<?php if( get_sub_field('location') ): ?>
				
				<?php if (get_locale() == 'en_US') { ?>
				<p class="label label-small">Location</p> 
				<?php } else { ?>
				<p class="label label-small">Ubicación</p> 
				<?php } ?>
				<?php
				$location = get_sub_field('location');
				if( $location ): ?>
					<?php foreach( $location as $post ): 
						setup_postdata($post); ?>
						<a href="<?php the_permalink(); ?>">
							<?php if( get_field('nice_name') ) { ?>
							<?php the_field('nice_name'); ?>
							<?php } else { ?> 
							<?php the_title(); ?>
							<?php } ?>
						</a>
					<?php endforeach; ?>
					<?php 
					wp_reset_postdata(); ?>
				<?php endif; endif; ?>
			</div>
		</div>
	</div>
</section>
