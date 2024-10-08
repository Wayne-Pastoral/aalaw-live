<?php 
$related_posts = get_field('case_result');
$title = get_the_title();
$title = str_replace([", CA", ", TX"], "", $title);
if($related_posts){ ?>
<section class='reveal-up-all location_blog'>
			<h2>
				<?php if(get_locale() == 'en_US'){ ?>
					<?php echo $title; ?> Case Results
				<?php } else{?>
					Publicaciones		
				<?php } ?>
			</h2>
	<p class="location-content">
<!-- 		Aliquam nibh justo, porttitor eu sodales ac, elementum at lorem. Integer placerat varius ex, at ultricies magna consequat sed. In efficitur purus ipsum, quis tempor.  -->
	</p>
			<!--start slider -->
			<?php
$output = "";

// The Loop
foreach ($related_posts as $post_object) { 
    setup_postdata($post_object); // Set up post data for the current post object

    // Constructing the HTML for each post
    $output .= "<div class='location-blog-inner'>";
    
    // Checking post type
    if ( get_post_type($post_object->ID) == "case_results" ) {
        $image = "";
        $catSlug = "";
        $acfObject = get_field('accident_injury', $post_object->ID);

        foreach($acfObject as $category ){
            $catSlug = $category->post_name;
        }

        $getCat = get_category_by_slug($catSlug);
        if($getCat != false) {
            $tag = 'category_' . $getCat->term_id;
            $image = get_field('featured_image',  $tag);
        }
        
        // Setting hero section background
        $hero_background = ($image != "") ? "style='background:url(" . $image . ") no-repeat center center / cover'" : "style='background:url(" . get_template_directory_uri() . "/assets/hero-case-results.jpg) no-repeat center center / cover'";
        
    } else {
        // Setting hero section background for other post types
        $hero_background = (has_post_thumbnail($post_object->ID)) ? "style='background:url(" . get_the_post_thumbnail_url($post_object->ID, 'full') . ") no-repeat center center / cover'" : "style='background:url(" . get_template_directory_uri() . "/assets/hero-case-results.jpg) no-repeat center center / cover'";
    }

    // Outputting hero section
    $output .= "<section class='hero' " . $hero_background . "></section>";

    // Outputting post categories
//     $categories = get_the_category($post_object->ID);
//     if (!empty($categories)) {
//         $output .= "<div class='home-blog-cat'><p>";
//         foreach ($categories as $category) {
//             $output .= esc_html($category->name) . ", ";
//         }
//         $output = rtrim($output, ', '); // Remove trailing comma
//         $output .= "</p></div>";
//     }

    // Outputting post title, content, and read more link
    $output .= "<div class='blog-meta'>
                    <h3 class='blog-title'><a href='" . esc_url(get_permalink($post_object->ID)) . "'>" . esc_html($post_object->post_title) . "</a></h3>
                    <div class='blog-content'>" . wp_trim_words(apply_filters('the_content', $post_object->post_content), 20, ' ...') . "</div>
                    <a class='blog-read-more' href='" . esc_url(get_permalink($post_object->ID)) . "' rel='nofollow'>" . __('Continue Reading', 'your-text-domain') . "</a>
                </div>
            </div>"; // Closing location-blog-inner
}
wp_reset_postdata();

// Wrap the output with a container div
$output = "<div class='location-blog-module'>" . $output . "</div>";

// Output the final HTML
echo $output;
?>



            <!-- end of slider -->
			<?php if(get_locale() == 'en_US'){ ?>
			<div class="home-blog-button reveal-up-all"><a href="/case-results/" class="btn">View All <?php echo $title; ?> Case Results</a></div>
				<?php } else{?>
			<div class="home-blog-button reveal-up-all"><a href="/es/resultado-de-casos/" class="btn">Vea todas las publicaciones</a></div>			
			<?php } ?>
		</section>
<?php } ?>