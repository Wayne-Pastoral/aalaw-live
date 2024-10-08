<?php
$process_title = get_locale() == "en_US" ? "Legal Process" : "Proceso Legal";
$service_title = get_locale() == "en_US" ? "Legal Services" : "Servicios Legales";
$concern_title = get_locale() == "en_US" ? "Financial Concerns" : "Preocupaciones Financieras";
$med_title = get_locale() == "en_US" ? "Medical Concerns" : "Preocupaciones Médicas";
$faq_title = get_locale() == "en_US" ? "Traffic FAQ’s" : "Preguntas Frecuentes sobre Tráfico";
$english_content = get_field('english_content');
$span_content = get_field('spanish_content');
?>

<?php if(get_locale() == "en_US"){ ?>
	<?= $english_content ?> 
<?php }else{ ?>
<?= $span_content ?> 
<?php } ?>
<div class="faq-blocks">
	

<div class="faq-bg">
<div class="faq_col" style="  background-image: linear-gradient(#28282891, #282828ab), url(https://staging-adamsonahdoot-staging.kinsta.cloud/wp-content/uploads/2021/10/a-stack-of-folders-contracts-papers_t20_d1kjeJ.webp);">
<h2>
<?= $process_title  ?>
</h2>
</div>

<!-- legal process  -->
<?php	
if(get_locale() == "en_US"){
$lpargs = array(
				'post_type' => 'faqs',
				'posts_per_page'   => -1,
				'faq_cat' => 'legal-process',
			
				);

}else{
 $lpargs = array(
				'post_type' => 'faqs',
				'posts_per_page'   => -1,
				'faq_cat' => 'preguntas-frecuentes',
			
				);

}

				$legal_process = new WP_Query($lpargs);	 ?>

<?php if ( $legal_process ->have_posts() ) : ?>
<ul class="faq-list">
	<?php
			// Start the loop.
				// Start the loop.
	
			while ( $legal_process->have_posts() ) :
				$legal_process->the_post();
				?>
			
			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		<?php endwhile; ?>
</ul>
		<?php endif; ?>
		<?php wp_reset_query(); ?>

<!-- end of legal process -->
</div>

<div class="faq-bg">
<div class="faq_col" style="  background-image: linear-gradient(#28282891, #282828ab), url(https://staging-adamsonahdoot-staging.kinsta.cloud/wp-content/uploads/2021/10/chris-adamson-e1634068800530.webp);">
<h2>
<?= $service_title  ?>
</h2>
	</div>
<!-- legal Services  -->

<?php
	if(get_locale() == "en_US"){
	$lsargs = array(
				'post_type' => 'faqs',
				'posts_per_page'   => -1,
				'faq_cat' => 'legal-services',
			
				);
	}else{
		$lsargs = array(
				'post_type' => 'faqs',
				'posts_per_page'   => -1,
				'faq_cat' => 'servicios-legales',
			
				);
		
	}
				$legal_services = new WP_Query($lsargs);	 ?>

<?php if ( $legal_services ->have_posts() ) : ?>
<ul class="faq-list">
	<?php
			// Start the loop.
				// Start the loop.
	
			while ( $legal_services->have_posts() ) :
				$legal_services->the_post();
				?>
			
			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		<?php endwhile; ?>
</ul>
		<?php endif; ?>
		<?php wp_reset_query(); ?>

<!-- end of legal Services -->
	
</div>

<div class="faq-bg">
	
<div class="faq_col" style="  background-image: linear-gradient(#28282891, #282828ab), url(https://staging-adamsonahdoot-staging.kinsta.cloud/wp-content/uploads/2021/10/finance-money-currency-table-businessman-home-office-boss-manager-quarantine-paper-money-salary_t20_O0nNly.webp);">
<h2>
<?= $concern_title  ?>
</h2>
	</div>
<!-- legal Services  -->

<?php 
	if(get_locale() == "en_US"){
	$fcargs = array(
				'post_type' => 'faqs',
				'posts_per_page'   => -1,
				'faq_cat' => 'financial-concerns',
			
				);
	}else{
		$fcargs = array(
				'post_type' => 'faqs',
				'posts_per_page'   => -1,
				'faq_cat' => 'preocupaciones-financieras',
			
				);
	}
				$financial_concerns = new WP_Query($fcargs);	 ?>

<?php if ( $financial_concerns ->have_posts() ) : ?>
<ul class="faq-list">
	<?php
			// Start the loop.
				// Start the loop.
	
			while ( $financial_concerns->have_posts() ) :
				$financial_concerns->the_post();
				?>
			
			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		<?php endwhile; ?>
</ul>
		<?php endif; ?>
		<?php wp_reset_query(); ?>

<!-- end of legal Services -->
</div>


<div class="faq-bg">
	
<div class="faq_col" style="  background-image: linear-gradient(#28282891, #282828ab), url(https://staging-adamsonahdoot-staging.kinsta.cloud/wp-content/uploads/2021/10/wrist-arm-sprain-ligaments-elastic-bandage-trauma-injury-sick-insurance-ache-adult-aid-care-caucasian_t20_YEXzk0.webp);">
<h2>
<?= $med_title  ?>
</h2>
	</div>
<!-- legal Services  -->
<?php 
	if(get_locale() == "en_US"){
	$mcargs = array(
				'post_type' => 'faqs',
				'posts_per_page'   => -1,
				'faq_cat' => 'medical-concerns',
			
				);
		}else{
		
			$mcargs = array(
				'post_type' => 'faqs',
				'posts_per_page'   => -1,
				'faq_cat' => 'preocupaciones-medicas',
			
				);
	}
				$medical_concerns = new WP_Query($mcargs);	 ?>

<?php if ( $financial_concerns ->have_posts() ) : ?>
<ul class="faq-list">
	<?php
			// Start the loop.
				// Start the loop.
	
			while ( $medical_concerns->have_posts() ) :
				$medical_concerns->the_post();
				?>
			
			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		<?php endwhile; ?>
</ul>
		<?php endif; ?>
		<?php wp_reset_query(); ?>

<!-- end of legal Services -->
</div>


<div class="faq-bg">
	
<div class="faq_col" style="  background-image: linear-gradient(#28282891, #282828ab), url(https://staging-adamsonahdoot-staging.kinsta.cloud/wp-content/uploads/2021/10/a-stack-of-folders-contracts-papers_t20_d1kjeJ.webp);">
<h2>
<?= $faq_title ?>
</h2>
	</div>
<!-- legal Services  -->
<?php 
		if(get_locale() == "en_US"){
	$tfargs = array(
				'post_type' => 'faqs',
				'posts_per_page'   => -1,
				'faq_cat' => 'traffic-faqs',
			
				);
			
			}else{
			$tfargs = array(
				'post_type' => 'faqs',
				'posts_per_page'   => -1,
				'faq_cat' => 'preguntas-frecuentes-sobre-trafico',
			
				);
		}
				$traffic_faq = new WP_Query($tfargs);	 ?>

<?php if ( $traffic_faq ->have_posts() ) : ?>
<ul class="faq-list">
	<?php
			// Start the loop.
				// Start the loop.
	
			while ( $traffic_faq->have_posts() ) :
				$traffic_faq->the_post();
				?>
			
			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		<?php endwhile; ?>
</ul>
		<?php endif; ?>
		<?php wp_reset_query(); ?>

<!-- end of legal Services -->
</div>
	</div>