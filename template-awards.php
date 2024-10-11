<?php /* Template Name: awards */ ?>
<?php get_header(); ?>

	<main id="primary" class="site-main">
		<div class="row " >
			<section class="hero" style="background:url('<?php the_post_thumbnail_url(); ?>') no-repeat center center / cover">
				<div class="bg-overlay dark"></div>
				<div class="container">
					     <div class="row justify-content-center">
							<h1 class="title text-center"><?php the_title(); ?></h1>
						</div>
				</div>
			</section>
		</div>
	<!-- award section -->
		<div class="row">
			<div class="page-content container" id="main-award-page">
				<div class="entry-content">
						<?php the_content(); ?>
				</div>
				
			
		
<?php 
if(get_locale() == "en_US"){
	$comarg = array(
	'post_type' => 'awards',
	'posts_per_page'   => -1,
	'order' => 'ASC',
	'lang' => 'en'
);

	}else{
		$comarg = array(
	'post_type' => 'awards',
	'posts_per_page'   => -1,
	'order' => 'ASC',
	'lang' => 'es'
);
}
$community = new WP_Query($comarg);	
if ($community->have_posts()) :  ?>
<div class="is-layout-flow">
<ul class="is-layout-flow is-flex-container columns-4 wp-block-post-template awards-mb justify-content-center custom-award-width">
<?php while ($community->have_posts()) : $community->the_post(); 
 $status = get_field('status');	
?>
		<?php if ( $status == 'true') { ?>
	
	<?php } else { ?>
<li class="wp-block-post post-8854 accidents type-accidents status-publish has-post-thumbnail hentry">

<div class="is-layout-flow  text-center" style="padding-top:30px;padding-right:30px;padding-bottom:30px;padding-left:30px">
	<div class="entry-thumbnail awards-img ">
<?php the_post_thumbnail('meduim', ['aria-label' => 'Award image']); ?>
		</div>
<div class="wp-block-group__inner-container">
<?php the_content(); ?>
</div>
</div>

</li>
	<?php } ?>
	<?php endwhile; ?>
</ul>
</div>
<?php endif; ?>
<?php wp_reset_query() ?>
				
				
				</div>
		</div>
<section class="attorneys bg-cream test" id="attorneys-section">
	<div class="container">
			<?php get_template_part( 'template-parts/content', 'lawyers' ); ?>
	</div>
</section>
		<!-- end of award section -->
		
<!-- 	contact section -->
	<section class="schedule-section centered-div reveal-up-all">
		<h2 class="text-center thin">
		<?php if(get_locale() == 'en_US'){ ?>
			<span class="text-highlight-thin">SCHEDULE YOUR</span>
			<div>Free Consultation</div>
			<?php echo do_shortcode('[gravityform id="11" title="true" ajax="true"]'); ?>
		<?php } else{?>
			<span class="text-highlight-thin">PROGRAME SU</span>
			<div>Consulta Gratis</div>
			<?php echo do_shortcode('[gravityform id="12" title="true" ajax="true"]'); ?>
		<?php } ?>
		</h2>
	</section>
	</main><!-- #main -->


<?php get_footer(); ?>
