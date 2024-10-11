<div class="caseresults-child">
<?php 

if ( have_posts() ) :
	while ( have_posts() ) : 
		the_post();
		$feat_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
?>

		<div class="heroshot" style="background-image:url(<?php echo $feat_image[0] ?>)">
			<div class="wrap">
				<h1><?php echo get_field('page_title', $post->ID) ?></h1>
			</div>
		</div>
	
		<div class="breadcrumbs container"><?php echo do_shortcode('[custom_breadcrumbs]'); ?></div>
	
		<section class="top-content container">
			<div class="wrap"><?php echo get_the_content() ?></div>
		</section>

		<section class="custom-case-result">
			<h2>
				<?php
					if ( get_locale() == 'en_US' ) {
						echo get_the_title() . ' Case Results';
					} else {
						echo 'Resultados de Casos de ' . get_the_title();
					}
				?>
			</h2>
			<div class="container">
				<?php
					$args_case_results = array(
						'post_type'      => 'case_results',
						'post_status'    => 'publish',
						'posts_per_page' => -1, // Load all posts initially
						'meta_key'       => 'case_amount',
						'orderby'        => 'meta_value_num',
						'meta_type'      => 'NUMERIC',
						'order'          => 'DESC',
					);

					$all_case_results = new WP_Query($args_case_results);

					if ($all_case_results->have_posts()) :
						echo '<ul class="custom-case-result__list">';
						while ($all_case_results->have_posts()) :
							$all_case_results->the_post();
							$title = get_the_title();
							$case_amount = get_post_meta(get_the_ID(), 'case_amount', true);
							$permalink = get_permalink();
							echo '<li style="display:none;"><a href="' . esc_url($permalink) . '" aria-label="Read more about ' . esc_html($title) . '"><span>' . esc_html($title) . '</span></a></li>';
						endwhile;
						echo '</ul>';
					else :
						echo 'No posts found.<br>';
					endif;

					wp_reset_postdata();
				?>
			</div>
			<ul class="custom-case-result__pagination"></ul>
		</section>



		<script>
			document.addEventListener("DOMContentLoaded", function () {
				const resultsPerPage = 10;
				const caseResultsContainer = document.querySelector(".custom-case-result .container ul");
				const caseResults = Array.from(caseResultsContainer.children);
				const paginationContainer = document.querySelector(".custom-case-result__pagination");

				let currentPage = 1;

				function showPage(page) {
					const start = (page - 1) * resultsPerPage;
					const end = start + resultsPerPage;

					caseResults.forEach((item, index) => {
						item.style.display = (index >= start && index < end) ? 'block' : 'none';
					});
				}

				function createPagination() {
					const totalPages = Math.ceil(caseResults.length / resultsPerPage);
					paginationContainer.innerHTML = "";

					const addPageLink = (pageNum) => {
						const pageLink = document.createElement("a");
						pageLink.href = "#";
						pageLink.innerText = pageNum;
						pageLink.classList.add("page-numbers");
						pageLink.addEventListener("click", function (e) {
							e.preventDefault();
							currentPage = pageNum;
							showPage(currentPage);
							createPagination(); // Re-create pagination to update links
						});

						const pageItem = document.createElement("li");
						if (pageNum === currentPage) {
							pageItem.classList.add("current");
						}
						pageItem.appendChild(pageLink);
						paginationContainer.appendChild(pageItem);
					};

					const prevLink = document.createElement("a");
					prevLink.href = "#";
					prevLink.innerText = "« Previous";
					prevLink.classList.add("page-numbers");
					prevLink.addEventListener("click", function (e) {
						e.preventDefault();
						if (currentPage > 1) {
							currentPage--;
							showPage(currentPage);
							createPagination(); // Re-create pagination to update links
						}
					});
					const prevItem = document.createElement("li");
					prevItem.classList.add("prev");
					prevItem.appendChild(prevLink);
					paginationContainer.appendChild(prevItem);

					// Show page numbers with ellipses
					const range = 2;
					let startPage = Math.max(1, currentPage - range);
					let endPage = Math.min(totalPages, currentPage + range);

					if (startPage > 1) {
						addPageLink(1);
						if (startPage > 2) {
							const dots = document.createElement("li");
							dots.innerText = "...";
							paginationContainer.appendChild(dots);
						}
					}

					for (let i = startPage; i <= endPage; i++) {
						addPageLink(i);
					}

					if (endPage < totalPages) {
						if (endPage < totalPages - 1) {
							const dots = document.createElement("li");
							dots.innerText = "...";
							paginationContainer.appendChild(dots);
						}
						addPageLink(totalPages);
					}

					const nextLink = document.createElement("a");
					nextLink.href = "#";
					nextLink.innerText = "Next »";
					nextLink.classList.add("page-numbers");
					nextLink.addEventListener("click", function (e) {
						e.preventDefault();
						if (currentPage < totalPages) {
							currentPage++;
							showPage(currentPage);
							createPagination(); // Re-create pagination to update links
						}
					});
					const nextItem = document.createElement("li");
					nextItem.classList.add("next");
					nextItem.appendChild(nextLink);
					paginationContainer.appendChild(nextItem);

					updatePagination();
				}

				function updatePagination() {
					const totalPages = Math.ceil(caseResults.length / resultsPerPage);

					const prevItem = paginationContainer.querySelector(".prev");
					const nextItem = paginationContainer.querySelector(".next");

					prevItem.style.display = (currentPage === 1) ? "none" : "inline";
					nextItem.style.display = (currentPage === totalPages) ? "none" : "inline";

					const pageLinks = paginationContainer.querySelectorAll("li:not(.prev):not(.next)");
					pageLinks.forEach((link) => {
						link.classList.remove("current");
						if (parseInt(link.innerText) === currentPage) {
							link.classList.add("current");
						}
					});
				}

				showPage(currentPage);
				createPagination();
			});

		</script>

		<section class="case-results-faq bg-logomark">
			<div class="container">
				<?php
				$fargs = array(
					'post_type' 		=> 'faqs', 
					'post_status'		=> 'publish',
					'posts_per_page'	=> -1,
					'tax_query' => array(
						'relation' => 'OR',
						array(
							'taxonomy' 	=> 'faq_cat',
							'field' 	=> 'slug',
							'terms' 	=> $post->post_name
						),
						array(
							'taxonomy' 	=> 'faqtag',
							'field' 	=> 'slug',
							'terms' 	=> $post->post_name
						)
					)
				);
				$fquery = new WP_Query($fargs);
				
				if ( $fquery->have_posts() ) :
					echo '<div class="faq-wrap">';
				?>
					<h2>
					<?php
						if ( get_locale() == 'en_US' ) {
							echo get_the_title().' FAQ';
						} else {
							echo 'Preguntas Frecuentes Sobre ' . get_the_title();
						}
					?>
					</h2>
				<?php
					$counter = 0;
					while ( $fquery->have_posts() ) :
						$fquery->the_post();
						$counter++;
						$faqcontent = wp_strip_all_tags( get_the_content() );
						$active = $counter == 1 ? 'active' : '';
						echo '<div class="item '. $active .'"><h3><span>'.get_the_title().'</span><svg width="17" height="10" viewBox="0 0 17 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M16.1768 0.814949L15.3537 0.00427198L11.9252 3.37805L8.4967 6.75165L5.06613 3.37583L1.63539 -6.71608e-07L0.817696 0.817853L-7.14916e-08 1.63554L4.24879 5.81777L8.49757 10L12.7488 5.81281L17 1.62563L16.1768 0.814949Z" fill="#00A771"/></svg></h3>';
						echo '<div><p>'.substr($faqcontent, 0, 320).'...</p> <a href="'.get_the_permalink().'" aria-label="Continue reading '.get_the_title().'">'. (get_locale() == 'en_US' ? 'Continue Reading' : 'Continue Leyendo') .'</a></div></div>';
					endwhile;
					echo '</div>';
				endif;
				wp_reset_postdata();
                wp_reset_query();
				?>
			</div>
		</section>
	
		<script type="application/ld+json">
			{
			  "@context": "https://schema.org",
			  "@type": "FAQPage",
			  "mainEntity": [
			  <?php
					$fschema = new WP_Query($fargs);

					if ( $fschema->have_posts() ) :
						$cntr = 0;
						while ( $fschema->have_posts() ) : $fschema->the_post();
						$cntr++;
						$totalposts = $fschema->found_posts;
						$contentstrip = wp_strip_all_tags(get_the_content());
			  ?>
			  				{
							  "@type": "Question",
							  "name": "<?php echo get_the_title() ?>",
							  "acceptedAnswer": {
								"@type": "Answer",
								"text": "<?php echo str_replace('"', '',  wp_trim_words($contentstrip, 85)) ?>"
							  }
							}
			  <?php
						if ($cntr !== $totalposts) { echo ','; }
						endwhile;
						wp_reset_postdata();
                		wp_reset_query();
					endif;
			  ?>
			  ]
			}
		</script>
	
		<section class="banner-cta bg-lt-green">
			<div class="container">
				<div class="row justify-content-center align-items-center">
					<p><?php echo get_locale() == 'en_US' ? 'Get a free consultation:' : 'Obtenga una consulta gratuita:' ?> <a href="tel:(866) 591-4947" aria-label="Call (866) 591-4947">(866) 591-4947</a><span><?php echo get_locale() == 'en_US' ? 'Hablamos Español' : 'We Speak English' ?></span></p>
				</div>
			</div>
		</section>
	
		<section class="bloglist-wrapper">
			<h2><?php echo get_locale() == 'en_US' ? 'Blog Posts' : 'Publicaciones de blog' ?></h2>
			<p><?php echo get_locale() == 'en_US' ? 'Explore Our Comprehensive Collection of Blog Articles Dedicated to '.get_the_title().' Cases.' : 'Explore Nuestra Colección Completa de Artículos de Blog Dedicados a Casos de '.get_the_title().'.' ?></p>
			<div class="container"></div>
		</section>
		
		<section class="contact">
			<div class="container">
				<div class="wrap">
					<h2><?php echo get_locale() == 'en_US' ? 'Contact Us' : 'Contáctenos' ?></h2>
					<p><?php echo get_locale() == 'en_US' ? 'Talk to an experienced law firm equipped to handle traffic cases throughout Los Angeles and California.' : 'Hable con un bufete de abogados experimentado y equipado para manejar casos de tráfico en Los Ángeles y California.' ?></p>
					<?php get_template_part( 'contact-form', get_post_format() ); ?>
				</div>
			</div>
		</section>

		<section class="bottom-content">
			<div class="container">
				<div class="wrap">
				<?php 
					$bottomcontent = get_field('bottom_content', $post->ID);
					echo $bottomcontent['title'] ? '<h2>'.$bottomcontent['title'].'</h2>' : '';
					echo $bottomcontent['content'] ? '<div>'.$bottomcontent['content'].'</div>' : '';
				?>
				</div>
			</div>
		</section>
		
<?php
	
	endwhile;
endif;
$dontinclude = array();
array_push($dontinclude, $post->ID);
$sibargs = array(
	'post_type' 		=> 'page', 
	'post_status'		=> 'publish',
	'posts_per_page'	=> 4,
	'post_parent' 		=> 7296,
	'post__not_in'		=> $dontinclude
);
$sibquery = new WP_Query($sibargs);
if ( $sibquery->have_posts() ) :
	echo '<section class="caseresult-siblings bg-logomark"><div class="container"><h2>'.(get_locale() == 'en_US' ? 'Other Cases We Handle' : 'Otros casos que manejamos').'</h2><div class="sibling-list">';
	while ( $sibquery->have_posts() ) :
		$sibquery->the_post();
		$sibbfeatimage = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
		echo '<div class="item"><a href="'.get_the_permalink().'" aria-label="Read more about '.get_the_title().'"><span style="background-image:url('.$sibbfeatimage[0].')"></span><strong>'.get_the_title().'</strong></a></div>';
	endwhile;
	echo '</div></div></section>';
endif;
				
?>
	
	<?php get_template_part( 'template-parts/nascar-logos-ppc' ); ?>
</div>
