<?php get_header(); ?>

	<main id="primary" class="site-main">
		<div class="row">
		<?php $blog_page_image = wp_get_attachment_url( get_post_thumbnail_id(get_option( 'page_for_posts' )) ); ?>
			<section class="hero" style="background:url('<?php echo $blog_page_image; ?>') no-repeat center center / cover">
				<div class="bg-overlay dark"></div>
				<div class="container">
					<div class="row">
					<?php if (  is_tag() ) : ?>
						<?php if(get_locale() == 'en_US'){ ?>
						<h2 class="title-tags">California Legal Blog</h2>
						<?php } else{?>
							<h2 class="title-tags">Publicaciones</h2> 
							<?php } ?>
						<?php else : ?>
							<h1 class="title"><?php single_cat_title(); ?></h1>
						<?php endif; ?>
					
					</div>
				</div>
			</section>
		</div>
		<div class="page-content">
			<div class="container">
			<div class="row">
			<section class="entry-content <?php echo is_tag() ? '' : 'grid-10'; ?> copy">
					<?php 
						$separator = "<span class='bcrumbs-separator' aria-hidden='true'> &#187; </span>";  // Make separator hidden to screen readers
						$faqterm = get_queried_object();
						$faqtext = get_locale() == "en_US" ? "Frequently Asked Questions" : "Preguntas Frecuentes";

						if (is_tax('faqtag')) :
							echo '<div id="breadcrumbs" aria-label="Breadcrumbs">';  // Add aria-label for the entire breadcrumbs container
							echo '<a href="'.home_url().'" aria-label="Home">Home</a>';  // Add aria-label to the Home link
							echo $separator;
							echo '<a href="'.home_url().'/faqs" aria-label="'.$faqtext.'">'.$faqtext.'</a>';  // Add aria-label to the FAQs link
							echo $separator;
							echo '<strong aria-current="page">'.$faqterm->name.'</strong>';  // Mark the current page with aria-current
							echo '</div>';
						else :
							echo do_shortcode('[custom_breadcrumbs]');  // Use the custom breadcrumbs function that is already updated
						endif;
					?>

					<?php if ( is_tag() ) : ?>
							<div class="tag-sub-title">
								<span class="blog-category">Blog Category</span>
								<h1 class="blog-category-title"><?php single_cat_title(); ?></h1>
							</div>
						<div class="posts-container">
							<?php 
							while ( have_posts() ) :
								the_post(); ?>
								<div class="post-card">
									<?php get_template_part( 'template-parts/content', 'tags', get_post_type() ); ?>
								</div>
							<?php endwhile; ?>
						</div>
				   <?php elseif ( is_category() ) : ?>
					<?php
						while ( have_posts() ) :
						the_post(); ?>
					<?php get_template_part( 'template-parts/content', get_post_type() ); ?>
					<?php endwhile; ?>
					<?php endif; ?>
					<!-- pagination -->
					<div class="blog-pagination">
    <?php
    // Get the current tag object
    $tag = get_queried_object();

    // Set up pagination
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $posts_per_page = get_option('posts_per_page'); // or set a specific number

    // Query posts for the current tag
    $args = array(
        'tag_id' => $tag->term_id, // Current tag ID
        'posts_per_page' => $posts_per_page,
        'paged' => $paged
    );
    $query = new WP_Query($args);

    // Get the total number of published posts in the current tag
    $total_post_count = $query->found_posts;
    $total_pages = ceil($total_post_count / $posts_per_page);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            // Display post content
        endwhile;
        ?>
        <div class="wrap">
            <span>Page <?php echo $paged; ?> of <?php echo $total_pages; ?></span>
            <?php if ($total_pages > 1) : // Only show pagination if there are multiple pages ?>
                <div class="pagination">
                    <?php if ($paged > 1) { ?>
                        <a href="<?php echo get_tag_link($tag->term_id); ?>">«</a>
                    <?php } ?>

                    <?php
                    // Pagination
                    $big = 999999999; // need an unlikely integer
                    echo paginate_links(array(
                        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                        'format' => 'page/%#%',
                        'current' => max(1, get_query_var('paged')),
                        'total' => $total_pages,
                        'prev_text' => __('‹'),
                        'next_text' => __('›'),
                        'end_size' => 1,
                        'mid_size' => 1
                    ));
                    ?>

                    <?php if ($paged < $total_pages) { ?>
                        <a href="<?php echo get_tag_link($tag->term_id) . 'page/' . $total_pages; ?>" class="last-paging">»</a>
                    <?php } ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
</div>

			<?php if ( is_tag() ) : ?>
				<a href="<?php echo home_url(); ?>" class="home-btn">Back to Main page</a>
			<?php endif; ?>

					<!-- end of pagination -->
				</section><!-- .entry-content -->
				<?php if ( is_tag() ) : ?>
    				<!-- Content for tag pages can go here -->
					<?php else : ?>
						<?php if ( is_tax('faqtag') ) : ?>
							<?php get_sidebar("faqs"); ?>
						<?php else : ?>
							<?php get_sidebar("blog"); ?>
						<?php endif; ?>
					<?php endif; ?>

			</div>
		</div>
		<?php get_template_part( 'template-parts/nascar-logos' ); ?>
		<?php get_template_part( 'template-parts/pages-cta' ); ?>
	</main><!-- #main -->


<?php get_footer(); ?>
