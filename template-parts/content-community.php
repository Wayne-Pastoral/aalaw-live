<?php
if(get_locale() == "en_US"){
	
$comarg = array(
				'post_type' => 'post',
				'posts_per_page'   => -1,
				'cat' => '7554',
				);
}else{
	$comarg = array(
				'post_type' => 'post',
				'posts_per_page'   => -1,
				'cat' => '11640',
				);

}




$community = new WP_Query($comarg);	
if ($community->have_posts()) :  ?> 
<div class="is-layout-flow wp-block-query" id="community__blog--page">
<ul class="is-layout-flow is-flex-container columns-3 wp-block-post-template">
<?php while ($community->have_posts()) : $community->the_post(); ?>
<li class="wp-block-post post-8854 accidents type-accidents status-publish has-post-thumbnail hentry">

<div class="is-layout-flow wp-block-group" style="padding-top:30px;padding-right:30px;padding-bottom:30px;padding-left:30px">
<?php the_post_thumbnail(); ?>
<div class="wp-block-group__inner-container">
<h2 class="wp-block-post-title has-medium-font-size community__title"><a href="<?php the_permalink(); ?>" target="_self"><?php the_title(); ?></a></h2>
</div>
</div>

</li>
	<?php endwhile; ?>
</ul>
</div>
<?php endif; ?>
<?php wp_reset_query() ?>
