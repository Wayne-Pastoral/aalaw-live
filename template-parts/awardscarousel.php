<?php

$awardsargs = array(
	'post_type' => 'awards',
	'numberposts' => '-1',
	'order' => 'ASC'
);
$awards = get_posts($awardsargs);
if ($awards) :
?>

	<div class="awards-carousel">
		<?php 
		if (
			$post->post_parent != '4256' &&
			$post->post_parent != '7034' &&
			$post->post_type != 'accidents'
		) :
		?>
		<div class="ac-header">
			<?php 
			if ( is_singular( 'ppc-site' ) ) {
				if (get_locale() == 'en_US') {
					echo '<h3>Awards &amp; Affiliations</h3>';
				} else {
					echo '<h2>Premios y afiliaciones</h2>';		
				}
			} else {
				echo '<h3>'.(get_locale() == 'en_US' ? 'Awards Won by Adamson Ahdoot' : 'Premios Ganados por Adamson Ahdoot').'</h3>';
			}
			?>
		</div>
		<?php endif; ?>
		<div class="owl-carousel">
			<?php
			foreach ($awards as $award) :
				$show = get_field('status', $award->ID);	
				$awardlogo = wp_get_attachment_image_src( get_post_thumbnail_id( $award->ID ), 'full' );
				if ($show != 'true') {
					echo '<div class="item '.$award->post_name.'"><span><em><img src="'.$awardlogo[0].'" alt="" /></em></span></div>';
				}
			endforeach;
			?>
		</div>
	</div>

<?php
endif;