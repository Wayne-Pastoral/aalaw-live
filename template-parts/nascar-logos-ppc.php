<!--<section class="nascar-ppc bg-cream reveal-up-all">
	<div class="container">
		<div class="row justify-content-center ">
			
		<?php //if ( is_singular( 'ppc-site' ) ) {
			
			//if (get_locale() == 'en_US') { ?>
			<h2>Awards & Affiliations</h2>
			<?php //} else { ?>
			<h2>Premios y afiliaciones</h2>
			<?php// } 
		//}
?>

</div>
</div>
<div class="row">

<?php
// 				$logosargs = array(
// 					'post_type' => 'template_awards',
// 					'numberposts' => '-1',
// 					'order' => 'ASC'
// 				);
	//$awards = get_posts($logosargs);
			  
	//if ($awards) :
		//echo '<div class="logos-contain">';
		//foreach ($awards as $award) :
			  //$awardlogo = wp_get_attachment_image_src( get_post_thumbnail_id( $award->ID ), 'full' );
			  //echo '<div class="single-logo"><img src="'.$awardlogo[0].'" alt="" /></div>';
		//endforeach;
		//echo '</div>';
	//endif;
			  
?>
-->
<!--
	<?php //if( have_rows('logos', 'option') ): ?>
<div class="logos-contain">
	<?php //while( have_rows('logos', 'option') ): the_row(); ?>
		<div class="single-logo">
			<img src="<?php //the_sub_field('logo', 'option'); ?>">
		</div>
	<?php //endwhile; ?>
</div>
<?php// endif; ;?>
-->
<!--
</div>
</section> -->

<section class="nascar-ppc bg-cream reveal-up-all nascar">
<div class="container">
<div class="row justify-content-center ">

	<?php if ( is_singular( 'ppc-site' ) ) {

			if (get_locale() == 'en_US') { ?>
			<h2>Awards &amp; Affiliations</h2>
			<?php } else { ?>
			<h2>Premios y afiliaciones</h2>
			<?php } 
		}
?>

</div>
</div>
<div class="row">

<?php

	$logosargs = array(
		'post_type' => 'awards',
		'numberposts' => '-1',
		'order' => 'ASC'
	);
	$awards = get_posts($logosargs);
			  
	if ($awards) :
		echo '<div class="logos-carousel owl-carousel">';
		$cntr=0;
		foreach ($awards as $award) :
			  $cntr++;
			  $awardlogo = wp_get_attachment_image_src( get_post_thumbnail_id( $award->ID ), 'full' );
			  echo '<div class="single-logo '.$award->post_name.'"><img src="'.esc_url($awardlogo[0]).'" alt="'.esc_attr($award->post_title).' Logo" /></div>';
			  
		endforeach;
		echo '</div>';
	endif;
			  
?>

</div>
</section>
