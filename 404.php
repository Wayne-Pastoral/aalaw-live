<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Adamson_Ahdoot
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="row">
			<section class="hero">
				<div class="container">
					<div class="row justify-content-center">
						<div class="title text-center">Oops! That page can't be found.</div>
					</div>
				</div>
			</section>
		</div>
		<section class="error-404 not-found">
			<div class="container">
				<div class="row justify-content-center">
					<div class="page-content text-center">
						<p>It looks like nothing was found at this location. Maybe try one of the links below or a search?</p>
						<?php get_search_form(); ?>
					</div>
				</div>
			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
