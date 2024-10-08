<?php /* Template Name: Our Legal Process */ ?>
<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Adamson_Ahdoot
 */

get_header();
	
	if ($post->post_parent === 7296 || $post->post_parent === 9783) {
		
		include( locate_template( 'template-parts/content-caseresult-child.php', false, false ) );
		
	} else {

?>

	<main id="primary" class="site-main">
		<div class="row">
		<?php
		while ( have_posts() ) :
			the_post(); ?>
			<?php if ( has_post_thumbnail() ) { ?>
			<section class="hero" style="background:url('<?php the_post_thumbnail_url(); ?>') no-repeat center center / cover">
			<?php } else { ?>
			<section class="hero">
				<?php } ?>
				<div class="bg-overlay dark"></div>
				<div class="container">
					<div class="row justify-content-center">
						<h1 class="title text-center">
							<?php if ( get_field( 'hero_headline' ) ){ ?>
							<?php the_field('hero_headline'); ?>
							<?php } else { ?>
								<?php the_title(); ?>
							<?php } ?>
						</h1>
					</div>
				</div>
			</section>
		</div>
		<div class="page-content container">
			<div class="row">
				<section class="entry-content grid-10">
                    <?php echo do_shortcode('[custom_breadcrumbs]'); ?>

                    <div class="legal-process">
                        <?php
                        $description = get_field('legal_process_description');
                        $legal_processes = get_field('legal_process');

                        if ($description) {
                            echo '<div class="legal-process__headings">';
                            echo '<div class="legal-process__heading remove-spacing">' . $description . '</div>';
                            echo '</div>';
                        }

                        echo '<div class="legal-process__container">';
                        if ($legal_processes) {
                            foreach ($legal_processes as $process) {
                                $image = $process['legal_process_image'];
                                $number = $process['legal_process_number'];
                                $icon_position = strtolower($process['legal_process_icon_position']) === 'left' ? 'legal-process--left' : 'legal-process--right';
                                $process_heading = $process['legal_process_heading'];
                                $process_description = $process['legal_process_description'];

                                echo '<div class="legal-process__item ' . $icon_position . '">';
                                echo '<div class="legal-process__image-container-main">';
                                echo '<div class="legal-process__image-container">';
                                echo '<div class="legal-process__images-container">';
                                echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '" class="legal-process__image">';
                                echo '</div>'; // .legal-process__images-container
                                echo '<div class="legal-process__number-container">';
                                echo '<span class="legal-process__number">' . esc_html($number) . '</span>';
                                echo '</div>'; // .legal-process__number-container
                                echo '</div>'; // .legal-process__image-container
                                echo '</div>'; // .legal-process__image-container-main
                                echo '<div class="legal-process__content">';
                                echo '<h4 class="legal-process__process-heading remove-spacing">' . esc_html($process_heading) . '</h4>';
                                echo '<div class="legal-process__process-description">' . wp_kses_post($process_description) . '</div>';
                                echo '</div>'; // .legal-process__content
                                echo '</div>'; // .legal-process__item
                            }
                        }
                        echo '</div>'; // .legal-process__container
                        ?>
                    </div>
				</section><!-- .entry-content -->
			
				<?php endwhile; ?>
				<?php get_sidebar('case-won'); ?>
			</div>
			</div>
		</div>
        <div class="gmbreviews__container-main">
        <div class="container">
            <div class="gmbreviews__container">
                    <div class="gmbreviews__headings">
                        <h2>Our Customer Feedback</h2>
                        <p>Read our reviews showcasing our client experience with our company, outlining our commitment to service and happy clients.</p>
                        <p>We are dedicated to customer feedback and reviews to listen to our clients and provide the best service possible.</p>
                    </div>
                    <div class="gmbreviews__google-reviews">
                        <div class="gmbreviews__google">
                            <img src="https://env-adamsonahdoot-staging2024.kinsta.cloud/wp-content/uploads/2024/06/Google__G__Logo-1.png" alt="Google Image">
                        </div>
                        <div class="starrating-main">
                            <h3>Excellent</h3>
                            <div class="starrating-container">
                                <span class="starrating__rating">4.9</span>
                                <span class="starrating"><span style="width:98%"></span></span>
                            </div>
                            <div class="review-count">Based on <b>262 Reviews</b></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gmbreviews-container">
            <div class="gmbreviews">
                <?php 
                echo do_shortcode("[grrating ]");
                echo do_shortcode("[grreview place_id='ChIJbfPxU-O7woARq5CHtNDHQbY']Posts Heading[/grreview]");
                ?>
            </div>
        </div>
        
		<?php get_template_part( 'template-parts/banner-cta-legal-process' ); ?>
		<?php get_template_part( 'template-parts/pages-cta' ); ?>
	</main><!-- #main -->

<?php 
	}
get_footer();
?>
