<?php
/**
 * Adamson Ahdoot functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Adamson_Ahdoot
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'adamson_ahdoot_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function adamson_ahdoot_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Adamson Ahdoot, use a find and replace
		 * to change 'adamson-ahdoot' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'adamson-ahdoot', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'adamson-ahdoot' ),
				'menu-2' => esc_html__( 'Footer', 'adamson-ahdoot' ),
				'menu-3' => esc_html__( 'Policies', 'adamson-ahdoot' ),
				'menu-4' => esc_html__( 'Resources', 'adamson-ahdoot' ),
				'menu-5' => esc_html__( 'Footer Locations', 'adamson-ahdoot' ),
				'menu-6' => esc_html__( 'Mobile Nav', 'adamson-ahdoot' ),
				'menu-7' => esc_html__( 'Languages', 'adamson-ahdoot' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

	}
endif;
add_action( 'after_setup_theme', 'adamson_ahdoot_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function adamson_ahdoot_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'adamson_ahdoot_content_width', 640 );
}
add_action( 'after_setup_theme', 'adamson_ahdoot_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function adamson_ahdoot_scripts() {
		wp_enqueue_script( 'adamson-ahdoot-flickity', get_template_directory_uri() . '/js/flickity.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_style( 'flickity-style', 'https://unpkg.com/flickity@2/dist/flickity.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'adamson-ahdoot-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'adamson-ahdoot-style', 'rtl', 'replace' );

	wp_enqueue_script( 'adamson-ahdoot-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'flickity', 'https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'ScrollMagic', '//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'ScrollMagic-animation-plugin', '//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/animation.gsap.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/ScrollTrigger.min.js', array(), _S_VERSION, true );
	
	wp_enqueue_style( 'adamson-ahdoot-owl', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), _S_VERSION );
	wp_enqueue_script( 'adamson-ahdoot-owl', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), _S_VERSION, true );
	
		if ( is_tag() ){
		wp_enqueue_style( 'single-styles', get_template_directory_uri() . '/css/page-tags.css', array(), _S_VERSION );
   }
   if ( is_page('locations') ) {
    wp_enqueue_style( 'single-styles', get_template_directory_uri() . '/css/page-location.css', array(), _S_VERSION );
  }
  if ( is_page_template('template-ppc-old-layout.php') ||  is_page_template('template-single-ppc.php') ) {
    wp_enqueue_style( 'ppc-styles', get_template_directory_uri() . '/css/ppc-site.css', array(), _S_VERSION );
  }
  if ( is_page_template('template-ppc-keyword.php') ) {
    wp_enqueue_style( 'ppc-styles', get_template_directory_uri() . '/css/ppc-site-keyword.css', array(), _S_VERSION );
  }
  
  if ( is_page_template('template-retargeting-ads.php') ) {
    wp_enqueue_style( 'ppc-styles', get_template_directory_uri() . '/css/ppc-site-keyword.css', array(), _S_VERSION );
  }
	
  if ( is_page_template('template-ppc-old-layout-old-colors.php') ) {
    wp_enqueue_style( 'ppc-old-styles', get_template_directory_uri() . '/css/ppc-site-old-styles.css', array(), _S_VERSION );
  }

  	
  if ( is_page_template('template-ppc-staattliches.php') ) {
    wp_enqueue_style( 'ppc-staattliches', get_template_directory_uri() . '/css/ppc-staattliches.css', array(), _S_VERSION );
  }
	
  if ( is_page_template('page-our-legal-process.php') ) {
    wp_enqueue_style( 'page-our-legal-process', get_template_directory_uri() . '/css/page-our-legal-process.css', array(), _S_VERSION );
  }
	
	  if ( is_singular('accidents') ) {
    wp_enqueue_style( 'single-styles', get_template_directory_uri() . '/css/single-accident.css', array(), _S_VERSION );

	wp_register_script( 'single-script', get_template_directory_uri() . '/js/single-accident.js', '', '', true );
	wp_enqueue_script( 'single-script' );
  }
	 if ( is_singular('injuries') ) {
    wp_enqueue_style( 'single-styles', get_template_directory_uri() . '/css/single-accident.css', array(), _S_VERSION );

	wp_register_script( 'single-script', get_template_directory_uri() . '/js/single-accident.js', '', '', true );
	wp_enqueue_script( 'single-script' );
  }
  	  if ( is_singular('locations') ) {
    wp_enqueue_style( 'single-styles', get_template_directory_uri() . '/css/single-location.css', array(), _S_VERSION );
  	}
	wp_enqueue_script( 'gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'adamson-ahdoot-cookie', get_template_directory_uri() . '/js/js.cookie.min.js', array("jquery"), _S_VERSION, true );
	wp_enqueue_script( 'adamson-ahdoot-global', get_template_directory_uri() . '/js/global.js', array('jquery'), _S_VERSION, true );
	
	if ( is_front_page() ) {
	    wp_enqueue_script( 'adamson-ahdoot-home-animations', get_template_directory_uri() . '/js/animations-home.js', array('jquery'), _S_VERSION, true );
      wp_enqueue_style( 'flickity-fancybox', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css', array(), _S_VERSION );
      wp_enqueue_script( 'fancybox', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js', array('jquery'), _S_VERSION, true );
	} else {
	    wp_enqueue_script( 'adamson-ahdoot-global-animations', get_template_directory_uri() . '/js/animations-global.js', array('jquery'), _S_VERSION, true );
	}

}
add_action( 'wp_enqueue_scripts', 'adamson_ahdoot_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}



add_theme_support( 'block-templates' );

function numeric_posts_nav() {
 
    if( is_singular() )
        return;
 
    global $wp_query;
 
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<div class="pagination"><ul>' . "\n";
 
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
 
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
 
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link() );
 
    echo '</ul></div>' . "\n";
     
} 

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

add_filter( 'wpseo_breadcrumb_links', 'unbox_yoast_seo_breadcrumb_append_link' );
function unbox_yoast_seo_breadcrumb_append_link( $links ) {
global $post;
if( is_singular('injuries')){
$breadcrumb[] = array(
'url' => site_url( '/injury/' ),
'text' => 'Injuries',
);
  //array_unshift($links, $breadcrumb);
	array_splice($links, 1, -2, $breadcrumb);
}
return $links;
}

add_filter( 'wpseo_breadcrumb_links', 'unbox_yoast_seo_breadcrumb_append_link2' );
function unbox_yoast_seo_breadcrumb_append_link2( $links ) {
global $post;
if( is_singular('accidents')){
$breadcrumb[] = array(
'url' => site_url( '/accident/' ),
'text' => 'Accidents',
);
  //array_unshift($links, $breadcrumb);
	array_splice($links, 1, -2, $breadcrumb);
}
return $links;
}

function avoid_yoast_polylang_redirect($post) {
 return ($post_before->post_name === "");
}
add_filter('wpseo_premium_post_redirect_slug_change', 'avoid_yoast_polylang_redirect' );
add_filter(
   'wp_image_editors',
   function ( $editors ) {
     usort(
       $editors,
       static function( $editor ) {
         if ( call_user_func( array( $editor, 'supports_mime_type' ), 'image/webp' ) ) {
           return -1;
         }
 
         return 1;
       }
     );
     return $editors;
   },
   10
 );
function disable_yoast_schema_data($data){
	$data = array();
	return $data;
}
add_filter('wpseo_json_ld_output', 'disable_yoast_schema_data', 10, 1);

add_filter( 'the_category', 'nofollow_category' );
function nofollow_category( $text ) {
$text = str_replace('rel="category tag"', 'rel="nofollow"', $text);
return $text;
}

function my_custom_breadcrumbs(){
	
	global $post;
	$output = "";
	$page = "";
	$parent_link = "";
	
	$home_link = "<a href='" . home_url() . "' aria-label='Home'>Home</a>";
	
	$separator = "<span class='bcrumbs-separator' aria-hidden='true'> &#187; </span>";

	$parents = array_reverse(get_post_ancestors($post->ID));	
	
	if(!is_front_page()){
		
		// Loop through parent ancestors
		foreach ($parents as $vals) {
			$vals = array($vals);
			for ($i = 0; $i < count($vals); $i++) {
				$title = html_entity_decode(get_the_title($vals[$i]));
				if ($title !== 'Traffic' && $title !== 'Workplace') {
					$page .= "<a href='" . get_the_permalink($vals[$i]) . "' aria-label='" . esc_attr($title) . "'>" . $title . "</a>" . $separator;
				}
			}
		}

		// Add parent link based on post type
		if (get_post_type() == 'locations'){
			$parent_link = "<a href='" . get_the_permalink(24972) . "' aria-label='" . esc_attr(get_the_title(24972)) . "'>" . html_entity_decode(get_the_title(24972)) . "</a>";
		}
		if (get_post_type() == 'accidents'){
			$practice_areas = "<a href='" . get_the_permalink(4256) . "' aria-label='" . esc_attr(get_the_title(4256)) . "'>" . html_entity_decode(get_the_title(4256)) . "</a>";
			$parent_link = $practice_areas;	
		}
		if (get_post_type() == 'injuries'){
			$practice_areas = "<a href='" . get_the_permalink(4256) . "' aria-label='" . esc_attr(get_the_title(4256)) . "'>" . html_entity_decode(get_the_title(4256)) . "</a>";
			$parent_link = $practice_areas;	
		}
		if (get_post_type() == 'case_results'){
			$parent_link = "<a href='" . get_the_permalink(7296) . "' aria-label='" . esc_attr(get_the_title(7296)) . "'>" . html_entity_decode(get_the_title(7296)) . "</a>";
		}
		if (get_post_type() == 'attorneys'){
			$parent_link = "<a href='" . get_the_permalink(39) . "' aria-label='" . esc_attr(get_the_title(39)) . "'>" . html_entity_decode(get_the_title(39)) . "</a>";
		}
		if (get_post_type() == 'faqs'){
			$parent_link = "<a href='" . get_the_permalink(4689) . "' aria-label='" . esc_attr(get_the_title(4689)) . "'>" . html_entity_decode(get_the_title(4689)) . "</a>";
		}
		if (is_category()){
			$parent_link = "<a href='" . get_permalink( get_option( 'page_for_posts' ) ) . "' aria-label='" . esc_attr(get_the_title( get_option('page_for_posts', true))) . "'>" . html_entity_decode(get_the_title( get_option('page_for_posts', true))) . "</a>";
			$queried_object = get_queried_object();
			$term_id = $queried_object->term_id;
			
			$child = get_category($term_id); 			
			$ancestors = array_reverse(get_ancestors( $term_id, 'category' )); 

			$categories = array();
			for($i = 0; $i < count($ancestors); $i++){
				$parents = array();
				$catID = get_category($ancestors[$i]);
				$catlink = get_category_link($ancestors[$i]);

				$parents['name'] = $catID->name;
				$parents['link'] = $catlink;
				array_push($categories ,$parents);
			}

			foreach($categories as $cats){
				$page .= "<a href='" . $cats['link'] . "' aria-label='" . esc_attr($cats['name']) . "'>" . ucfirst($cats['name']) . "</a>" . $separator;
			}
			$page .= "<strong class='breadcrumb_last' aria-current='page'>" . html_entity_decode(strip_tags($child->name)) . "</strong>";
		}
		
 		if (!is_category()){
			$page .= "<strong class='breadcrumb_last' aria-current='page'>" . html_entity_decode(get_the_title($post->id)) . "</strong>";
		}
		
		if  (is_tax('faqtag')) {
			$faqterm = get_queried_object();
			$faqtext = get_locale() == "en_US" ? "Frequently Asked Questions" : "Preguntas Frecuentes";
			$output = '<div id="breadcrumbs" aria-label="Breadcrumbs"><a href="'.home_url().'" aria-label="Home">Home</a>'.$separator.'<a href="'.home_url().'/faqs" aria-label="FAQs">'.$faqtext.'</a>'.$separator.'<strong>'.$faqterm->name.'</strong></div>';
		} else {
			$output = "<div id='breadcrumbs' aria-label='Breadcrumbs'>" . $home_link . $separator . $parent_link . $separator . $page . "</div>";
		}
		
		if (get_post_type() == 'page' || get_post_type() == 'post' && !is_category()){
			if ( function_exists('yoast_breadcrumb') ) {
			  $output = yoast_breadcrumb('<div id="breadcrumbs" aria-label="Breadcrumbs">','</div>');
			} 	
		}
	}

	return $output;
}

add_shortcode( 'custom_breadcrumbs', 'my_custom_breadcrumbs' );

function home_blog(){
	global $post;
	$output = "";
	$args = array(
		'posts_per_page' => '10',
		'post_type' => 'post',
		'orderby' =>'date',
		'order' => "DESC"
	);
	$query = new WP_Query( $args );
		// The Loop
		while ($query->have_posts()) {
			$query->the_post();
			$output .= "<div class='home-blog-inner'>
								<div class='blog-thumbnail' style='background-image: url('". get_the_post_thumbnail_url(get_the_ID()) . "');'>
									<div class='home-blog-cat'><p>";			
						$output .= "</p></div>
									</div>
								<div class='blog-meta'>
									<h3 class='blog-title'><a href='" . get_the_permalink() . "'>" . get_the_title(). "</a></h3>
									<p class='blog-excerpt'> ". html_entity_decode(wp_trim_words( get_the_excerpt(), 50, ' [...]' ))." </p>";
									
								if(get_locale() == "en_US"){ 
									$output .= "<a class='blog-read-more' href='". get_the_permalink() . "' rel='nofollow'>Continue Reading</a>";
								}else{
									$output .= "<a class='blog-read-more' href='". get_the_permalink() . "' rel='nofollow'>Continue leyendo</a>";
								}
									
							$output .= "</div>
							</div>";
		}
	wp_reset_postdata();
	return "<div class='home-blog-module'>" . $output . "</div>";
}

add_shortcode('custom_home_blog', 'home_blog');
// Get community layout
function community_blog(){
	  get_template_part('template-parts/content', 'community'); 
}
add_shortcode('custom_community_post', 'community_blog');

// faq
function faq_category(){
	  get_template_part('template-parts/content', 'faq'); 
}
add_shortcode('custom_faq_section', 'faq_category');


// Customize the excerpt length
function custom_excerpt_length($excerpt) {
    $limit = 100;
    $words = explode(' ', $excerpt, $limit + 1);
    if (count($words) > $limit) {
        array_pop($words);
        $excerpt = implode(' ', $words) . '...';
    }
    return $excerpt;
}

// Customize the excerpt 'more' text
function custom_excerpt_more($more) {
    return '...';
}

// Apply the filters
add_filter('excerpt_more', 'custom_excerpt_more');

// Function to wrap excerpt in <p> tags
function custom_excerpt_with_p($excerpt) {
    return '<p>' . custom_excerpt_length($excerpt) . '</p>';
}

add_action( 'wp_head', 'my_plugin_assets' );
function my_plugin_assets() {
	
    wp_register_style( 'SlickCSS', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css' );
    wp_register_script( 'SlickJS', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js');
	wp_register_style('Fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');

    wp_enqueue_style( 'SlickCSS' );
    wp_enqueue_script( 'SlickJS' );
	wp_enqueue_style('Fontawesome');
}
function featured_blog_module(){
		global $post;
	$featured_args = array(
			'post_type' => 'post',
		'post_status' => 'publish',
			'orderby' =>'date',
			'order' => "DESC",
		'posts_per_page' => 1
						
		);
		$query_featured = new WP_Query($featured_args );
		// The Loop
		$output = "";
		while ($query_featured->have_posts()) {
				$query_featured->the_post();
			$output .= "	
						<div class='featured-blog-inner'>
							<div class='blog-meta'>
								<div class='blog-cat'>";
									$cont = array();
									foreach(get_the_category() as $cat){
										$single = array();
										$single['name'] = $cat->name;
										$single['link'] = get_category_link($cat->term_id);
										array_push($cont, $single);	
									}
									for($i = 0; $i < count($cont); $i++){
									$output .= "<a href='". $cont[$i]['link'] ."'> <span>" . $cont[$i]['name'] . "</span></a>";
									}
							$output .= "</div>
						<p class='blog-date'>" . get_the_date('F d, Y') ."</p></div>
								<h3 class='blog-title'><a href='" . get_the_permalink() ."'>" .get_the_title(). "</a></h3>
								
								<p class='blog-description'>". html_entity_decode(wp_trim_words( get_the_excerpt(), 55, '...' )) ."</p>
								<a href='" . get_the_permalink() . "'>";
	if(get_locale() == "en_US"){
				$output .= "Read Blog";
			}else{
				$output .= "Leer Más";
			}
			$output .= " ></a>
							
						</div>";
					
							
						$output .= " <div class='featured-image' style=' background-image:url(". get_the_post_thumbnail_url(get_the_ID(),array(300, 300)) . ");'> 
					</div>

					";
			}	

			wp_reset_postdata();
	return $output;
}
function blog_module(){
	global $post,  $paged;
	
	$current_page = get_query_var('paged');
$current_page = max( 1, $current_page );
	
	$per_page = 10;
$offset_start = 1;
$offset = ( $current_page - 1 ) * $per_page + $offset_start;
					
						$args = array(
							'post_type' => 'post',
							'post_status' => 'publish',
							'orderby' =>'date',
							'order' => "DESC",
							'posts_per_page'=> "12",
							  'paged' => $paged,
							'offset'         => $offset
							
							
		);
		$query = new WP_Query( $args );
	$output = "";
		// The Loop
		while ($query->have_posts()) {
				$query->the_post();
			$output .= "<div class='blog-inner'>
							<div class='blog-image' style=' background-image: url(". get_the_post_thumbnail_url(get_the_ID(),array(300, 300)) . ");'></div>
						
							<div class='blog-inner-meta'>
								<h3 class='blog-title'><a href='" . get_the_permalink() ."'>" .get_the_title(). "</a></h3>
									<div class='blog-meta'>
										<p class='blog-date'>" . get_the_date('F d, Y') ."</p>";
			
										if(get_locale() == "en_US"){
											$output .=	"<p class='blog-author'>By: " . get_the_author_meta( 'display_name', $post->post_author )."</p>";
										}else{
											$output .=	"<p class='blog-author'>Por: " . get_the_author_meta( 'display_name', $post->post_author )."</p>";
										}
			
								$output .= "	</div>
								<p class='blog-description'>". html_entity_decode(wp_trim_words( get_the_excerpt(), 25, '...' )) ."</p>
								<div class='blog-cat'>";
									$cont = array();
									foreach(get_the_category() as $cat){
										$single = array();
										$single['name'] = $cat->name;
										$single['link'] = get_category_link($cat->term_id);
										array_push($cont, $single);	
									}
									for($i = 0; $i < count($cont); $i++){
								$output .= "<a href='". $cont[$i]['link'] ."'> <span>" . $cont[$i]['name'] . "</span></a>";
									}
						$output .= "</div><a href='" . get_the_permalink() . "'>";
			
			if(get_locale() == "en_US"){
				$output .= "Read Blog";
			}else{
				$output .= "Leer Más";
			}
			$output .= " ></a>
							</div>
						</div>";
				}	
	wp_reset_postdata();

return "<div class='blog-module'>" . $output . "</div>";
}
function dynamic_pagenav($atts){
		$current_page = get_query_var('paged');
$current_page = max( 1, $current_page );
	
	$per_page = 10;
$offset_start = 1;
$offset = ( $current_page - 1 ) * $per_page + $offset_start;
	
	
	extract( shortcode_atts( array(
		'expand' => '...',
	), $atts) );
    
    global $paged;
	$paged =  ( get_query_var('paged') ) ? get_query_var('paged') : 1;
	
		 $posts_per_page = 12;
    $settings = array(
        'showposts' => $posts_per_page, 
        'post_type' => 'post', 
        'orderby' => 'date', 
        'order' => 'ASC', 
        'paged' => $paged,
		'offset'         => $offset
    );

    $post_query = new WP_Query( $settings );	
    
    $total_found_posts = $post_query->found_posts;
    $total_page = ceil($total_found_posts / $posts_per_page);
		 $list = "";
    
    if(function_exists('wp_pagenavi')) {
        $list .= wp_pagenavi(array('query' => $post_query, 'echo' => true));
    } else {
        $list.='
        <span class="prev-posts-links">'.get_previous_posts_link('Previous page').'</span>
		 <span class="next-posts-links">'.get_next_posts_link('Next page', $total_page).'</span>
        ';
    }
    
		wp_reset_postdata();
	return $list;
}

function dynamic_search_pagenav($atts){
		$current_page = get_query_var('paged');
$current_page = max( 1, $current_page );
	
	
	extract( shortcode_atts( array(
		'expand' => '...',
	), $atts) );
    
    global $paged;
	
	$paged =  ( get_query_var('paged') ) ? get_query_var('paged') : 1;
	
	$posts_per_page = 9;
	$searchValue = apply_filters( 'get_search_query', get_query_var( 's' ) );

    $settings = array(
		'post_status' => 'publish',
		'post_type' => 'post',
		's' => $searchValue,
		'post_per_page'=> $posts_per_page,
        'orderby' => 'date', 
        'order' => 'ASC', 
        'paged' => $paged,
	);

    $post_query = new WP_Query( $settings );	

    $total_found_posts = $post_query->found_posts;
    $total_page = ceil($total_found_posts / $posts_per_page);
		 $list = "";
    
    if(function_exists('wp_pagenavi')) {
        $list .= wp_pagenavi(array('query' => $post_query, 'echo' => true));
    } else {
        $list.='
        <span class="prev-posts-links">'.get_previous_posts_link('Previous page').'</span>
		 <span class="next-posts-links">'.get_next_posts_link('Next page', $total_page).'</span>
        ';
    }
    
		wp_reset_postdata();
	return $list;
}

add_shortcode('dynamic_pagenav', 'dynamic_pagenav');
add_shortcode('dynamic_search_pagenav', 'dynamic_search_pagenav');
add_shortcode('custom_featured_blog_module', 'featured_blog_module');
add_shortcode('custom_blog_module', 'blog_module');

// add slider gallery shortcode
function slidergallery( $atts ) {
    global $post;
	$addgallery = get_field('add_slider_photo_gallery', $post->ID);

	if($addgallery) {
		//$gallery = get_field('add_photos', $post->ID);
		
		$galleries = get_field('add_photo_gallery', $post->ID);
		$galleryname = $atts['gallery'];

		$carousel = '<div class="page-slider-gallery owl-carousel" data-mobile="'.$atts['mobile'].'" data-tablet="'.$atts['tablet'].'" data-desktop="'.$atts['desktop'].'">';
		
		foreach($galleries as $gallery) {
			if ($gallery['photo_gallery_name'] == $galleryname) {
				foreach ($gallery['add_photos_in_gallery'] as $photo) {
					$img = wp_get_attachment_image_src( $photo, 'full' );
					$imgtype = $img['width'] >= "1024" ? "landscape" : "portrait";
					$carousel .= '<div class="item" data-type="'.$img[2].'"><span style="background-image:url('.$img[0].')"></span><img src="'.$img[0].'" alt="" /></div>';
				}
			}
		}
		
		$carousel .= '</div>';
		
// 		foreach ($gallery as $photo) {
// 			$img = wp_get_attachment_image_src( $photo, 'full' );
// 			$carousel .= '<div class="item"><img src="'.$img[0].'" alt="" /></div>';
// 		}
// 		
	}
	
	return $carousel;
	
}
add_shortcode( 'slider_gallery', 'slidergallery');

//Adding unique class per page
function add_slug_body_class( $classes )
{
    global $post;
    //if (is_archive() ) { $classes[] = 'unique-'.str_replace(' ', '-', strtolower(single_cat_title('' , false))); }
    if ( is_page() ) { $classes[] = 'unique-'.$post->post_name; } 
    return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );
//Adding unique class per page

function pf_query_all_exhibitions() {
	

	 $args = array(
		 'post_type' 		=> 'case_results',
		 'post_status' 		=> 'publish',
		 'posts_per_page' 	=> -1,
		 'meta_key'        	=> 'case_amount',
		 'orderby'         	=> 'meta_value_num',
		 'meta_type' 		=> 'NUMERIC',
		 'order'			=> 'DESC',
		 'fields' 			=> 'ids',
		 'suppress_filters' => 1
	 );
	 $caseresults = new WP_Query( $args );
	 $caseresults = $caseresults->posts;
	
	return $caseresults;
}


function pf_update_exhibition_transient( $post_id, $post=null, $update=null ) {
	if( 'case_results' == get_post_type( $post_id ) ) {
		pf_query_all_exhibitions();
	}
}
add_action( 'save_post', 'pf_update_exhibition_transient' );

function pf_exhibition_navigation() {
	$navigation = '';
	$previous = pf_get_adjacent_exhibition_link( true );
	$next = pf_get_adjacent_exhibition_link( false );
	if ( $previous || $next ) {
		printf( '<nav class="navigation %1$s" role="navigation"><h2 class="screen-reader-text">%2$s</h2><div class="nav-links">%3$s</div></nav>',
			   'post-navigation',
			   __( 'Exhibition navigation', 'pf' ),
			   $previous . $next
			  );
	}
	return $navigation;
}

function pf_get_adjacent_exhibition_link( $previous ) {
	$post_id = get_the_ID();
	$exhibs = pf_query_all_exhibitions();
	
	$pos = array_search( $post_id, $exhibs );
	if( $previous ) {
		$new_pos = $pos - 1;
		$class = 'nav-previous';
		$text = get_locale() == 'en_US' ? 'Previous Case' : 'Anterior Caso';
	} else {
		$new_pos = $pos + 1;
		$class = 'nav-next';
		$text = get_locale() == 'en_US' ? 'Next Case' : 'Próximo Caso';
	}

	if ($new_pos > -1) {
		if( !empty($exhibs[$new_pos] )) {
			$prev_id = $exhibs[$new_pos];
			$string = sprintf(
				'<div class="%s"><a href="%s" rel="prev"><span>'.$text.'</span></a></div>',
				$class,
				get_permalink( $prev_id ),
				get_the_title( $prev_id )
			);
			return $string;
		}
	}
	return false;
}

function wpse_81939_post_types_admin_order( $wp_query ) {
  if (is_admin()) {

    // Get the post type from the query
    $post_type = $wp_query->query['post_type'];

    if ( $post_type == 'awards') {

      $wp_query->set('orderby', 'date');

      $wp_query->set('order', 'DESC');
    }
  }
}
add_filter('pre_get_posts', 'wpse_81939_post_types_admin_order');

// end of icon
function practicearea_icon(){
	  get_template_part('template-parts/content', 'icon'); 
}
add_shortcode('custom_practicearea_icon', 'practicearea_icon');

function custom_blog_and_faq_shortcode() {
    ob_start(); // Start output buffering
    
    // FAQ Section
    $related_posts = get_field('faq');
    if ($related_posts && !empty($related_posts)) {
        ?>
        <section class="entry-content-tags-single copy blog tax-accidenttags archive single-raleted-tags" id="faq_widjets">
            <h3 class="practice-area-title"><?php _e('FAQs', 'your-text-domain'); ?></h3>
            <div class='custom-accordion faq reveal-up-all'>
                <?php foreach ($related_posts as $post_object) { ?>
                <!--  start of faq -->
                <div class='custom-accordion-toggle hide'>
                    <div class='custom-accordion-title'>
                        <h3><?php echo esc_html($post_object->post_title); ?></h3><i class='faq-icon'></i>
                    </div>
                    <div class='custom-accordion-content'>
                        <?php echo esc_html(wp_trim_words($post_object->post_content, 30)); ?>
                        <a href="<?php echo esc_url(get_permalink($post_object->ID)); ?>" class="continue-read" aria-label="Continue Reading: <?php echo esc_attr($post_object->post_title); ?>"><?php _e('Continue Reading', 'your-text-domain'); ?></a>
                    </div>
                </div>
                <!--  end of faq -->
                <?php } ?>
            </div> 
        </section><!-- .entry-content -->
        <?php
    } else {
        // Show a message or fallback content if no FAQs are found
        echo '<p>' . __('No FAQs available', 'your-text-domain') . '</p>';
    }

    // Blog Section
    $related_blogs = get_field('blogs');
    
    if ($related_blogs && !empty($related_blogs)) {
        // Limit the number of blogs to 6
        $related_blogs = array_slice($related_blogs, 0, 6);
        ?>
        <section id="blogs_section">
            <!-- start blog -->
            <h3 class="practice-area-title c_mb-20"><?php _e('Blog', 'your-text-domain'); ?></h3>
            <div class="blog-module">
                <div class="desktop">
                    <?php foreach ($related_blogs as $blogs) { 
                        $url = wp_get_attachment_url(get_post_thumbnail_id($blogs->ID));
                    ?>
                    <div class="blog-inner blog-single_slider">
                        <div class="blog-image lazyloaded" data-bg="<?php echo esc_url($url); ?>" style="background-image: url(<?php echo esc_url($url); ?>);"></div>
                        <div class="blog-inner-meta">
                            <h3 class="blog-title"><a href="<?php echo esc_url(get_permalink($blogs->ID)); ?>" aria-label="Read Blog: <?php echo esc_attr($blogs->post_title); ?>"><?php echo esc_html($blogs->post_title); ?></a></h3>
                            <div class="blog-meta">
                                <p class="blog-date"><?php echo esc_html(get_the_date('F j, Y', $blogs->ID)); ?></p>
                                <p class="blog-author"><?php _e('By', 'your-text-domain'); ?>: <?php echo esc_html(get_the_author_meta('display_name', $blogs->post_author)); ?></p>
                            </div>
                            <p class="blog-description"><?php echo esc_html(wp_trim_words($blogs->post_content, 30)); ?></p>
                            <a href="<?php echo esc_url(get_permalink($blogs->ID)); ?>" aria-label="Read Blog: <?php echo esc_attr($blogs->post_title); ?>"><?php _e('Read Blog &gt;', 'your-text-domain'); ?></a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
				<!-- mobile -->
				<section class="practicearea mobile txt-center single-slider">
								<div class="logos-contain">
									<?php
									echo '<div class="logos-contain">';
									$counter = 0;
									foreach ($related_blogs as $blogs) { 
										$url = wp_get_attachment_url(get_post_thumbnail_id($blogs->ID));    
										if ($counter % 1 == 0) :
											echo $counter > 0 ? "</div>" : "";
											echo "<div class='holder'>";
										endif;
									?>
										<div class="single-logo-item">
											<div class="single-logo"><img src="<?php echo esc_url($url); ?>" alt=""></div>
											<div class="single-title">
												<strong><?php echo esc_html($blogs->post_title); ?></strong>
												<div class="slider-meta">
													<p class="blog-date"><?php echo esc_html(get_the_date('F j, Y', $blogs->ID)); ?></p>
													<p class="blog-author">By: <?php echo esc_html(get_the_author_meta('display_name', $blogs->post_author)); ?></p>
												</div>
												<p class="p-slider"><?php echo esc_html(wp_trim_words($blogs->post_content, 50)); ?></p>
												<a href="<?php echo esc_url(get_permalink($blogs->ID)); ?>" class="slider-blog" aria-label="Read Blog: <?php echo esc_attr($blogs->post_title); ?>">Read Blog &gt;</a>
											</div>
										</div>
									<?php
										$counter++;
									}
									echo '</div>';
									?>
								</div>
						</section>
            </div>
        </section>
        <?php
    } else {
        // Show a message or fallback content if no blogs are found
        echo '<p>' . __('No blogs available', 'your-text-domain') . '</p>';
    }

    return ob_get_clean(); // Return the buffered content
}

add_shortcode('custom_blog_and_faq', 'custom_blog_and_faq_shortcode');


function flush_rewrite_rules_on_init() {
    flush_rewrite_rules();
}
add_action('init', 'flush_rewrite_rules_on_init');


function custom_tag_rewrite_rule() {
    add_rewrite_rule('^es/tag/(.+)/?', 'index.php?tag=$matches[1]', 'top');
    add_rewrite_rule('^en/tag/(.+)/?', 'index.php?tag=$matches[1]', 'top');
}
add_action('init', 'custom_tag_rewrite_rule');

add_action('gform_after_submission_18', 'custom_after_submission', 10, 2);
function custom_after_submission($entry, $form) {
    $submission_success = true;

    if ($submission_success) {
        // Email the admin when the form is successfully submitted
        wp_mail('admin@example.com', 'Form Submitted', 'A form has been successfully submitted.');
    } else {
        error_log('Form submission failed for form ID 18');
    }
}

// Menu aria-label
class Custom_Aria_Walker extends Walker_Nav_Menu {
    // Start each element of the menu
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));

        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
        $output .= '<li id="menu-item-'. $item->ID . '"' . $class_names .'>';
        
        // Strip HTML tags for aria-label and get the plain text content of the menu item title
        $plain_title = strip_tags($item->title);
        $aria_label = !empty($plain_title) ? ' aria-label="' . esc_attr($plain_title) . '"' : '';

        // Add other attributes like href
        $attributes  = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

        // Build the final output for the menu item
        $output .= '<a' . $attributes . $aria_label . '>';
        $output .= apply_filters('the_title', $item->title, $item->ID);
        $output .= '</a>';
    }
}

add_filter('gform_submit_button', 'add_aria_label_to_submit', 10, 2);
function add_aria_label_to_submit($button, $form) {
    // Extract the value attribute using a more robust approach
    if (preg_match('/value=[\'"]([^\'"]+)[\'"]/', $button, $matches)) {
        $button_value = $matches[1]; // Extract the value inside the value attribute
    } else {
        $button_value = 'Submit Form'; // Default value if not found
    }

    // Add the aria-label attribute with the extracted button value
    $button = str_replace('<input', '<input aria-label="' . esc_attr($button_value) . '"', $button);
    
    return $button;
}

add_filter('render_block', 'add_aria_label_to_buttons', 10, 2);

function add_aria_label_to_buttons($block_content, $block) {
    if ($block['blockName'] === 'core/button') {
        if (preg_match('/<a[^>]*>(.*?)<\/a>/s', $block_content, $matches)) {
            $button_text = trim(strip_tags($matches[1])); // Remove HTML tags and trim whitespace/new lines
            $aria_label = 'aria-label="' . esc_attr($button_text) . '"';
            $block_content = preg_replace('/<a/', '<a ' . $aria_label, $block_content, 1);
        }
    }
    return $block_content;
}

add_filter( 'gform_confirmation_18', 'custom_confirmation_message', 10, 4 );
function custom_confirmation_message( $confirmation, $form, $entry, $is_ajax ) {
    global $post; // Access the global $post object

    if ( isset( $post->ID ) && $post->ID == 91 ) {
        // First confirmation message if the post ID is 91
        $confirmation = '
        <div class="custom-confirmation-message">
            <div class="custom-confirmation-message__message">
                <h4>Your privacy is important to us.<br> The information provided will be used solely to discuss your case.</h4>
                <div class="custom-confirmation-message__alert">
                    <img src="https://aa.law/wp-content/uploads/2024/10/clock.png" alt="">
                    <span>This pop-up will close in <span id="countdown">5</span> seconds</span>
                </div>
                <button id="close-button" class="custom-confirmation-message__close">Exit</button>
            </div>
        </div>
        <script>
            $(".form-container").addClass("form-container--submitted");

            // Check if popup was closed previously
            if (!localStorage.getItem("popupClosed")) {
                // Show popup only if not closed before
                $("#popup").css("display", "flex");
                
                // Countdown function
                var countdownElement = document.getElementById("countdown");
                var countdownValue = 5;

                var countdownTimer = setInterval(function() {
                    countdownValue--;
                    countdownElement.textContent = countdownValue;
                    if (countdownValue <= 0) {
                        clearInterval(countdownTimer);
                        closePopup();
                    }
                }, 1000); // Update every second (1000ms)

                // Auto-close after 5 seconds
                setTimeout(function(){
                    closePopup();
                }, 5000);

                // Close button functionality
                $("#close-button").on("click", function() {
                    closePopup();
                });
            }

            // Function to close the popup and store the closed state in localStorage
            function closePopup() {
                $("#popup").css("display", "none");
                localStorage.setItem("popupClosed", "true"); // Save in localStorage to prevent popup on refresh
            }
        </script>';
    } else {
        // Second confirmation message for all other posts
        $confirmation = '
        <div class="custom-confirmation-message">
            <div class="custom-confirmation-message__column">
                <img class="custom-confirmation-message__main-image" src="https://aa.law/wp-content/uploads/2024/10/Frame-383.png" alt="Thank You Image" />
            </div>
            <div class="custom-confirmation-message__column custom-confirmation-message__column--right">
                <div class="custom-confirmation-message__message">
                    <div class="custom-confirmation-message__logo">
                        <img src="https://aa.law/wp-content/uploads/2024/10/AA-logo.png" alt="Site Logo">
                    </div>
                    <h4>Thank you.<br> Expect to hear from us shortly. <br>Please call <strong><a class="custom-confirmation-message__phone-number" data-calltrk-noswap="" href="tel:18003101606">(800) 310-1606</a></strong> if you find yourself in need of legal representation.</h4>
                    <div class="custom-confirmation-message__alert">
                        <img src="https://aa.law/wp-content/uploads/2024/10/clock.png" alt="">
                        <span>You will be redirected in <span id="countdown">5</span> seconds</span>
                    </div>
                    <button id="close-button" class="custom-confirmation-message__close">close</button>
                </div>
            </div>
        </div>
        <script>
            $(".form-container").addClass("form-container--submitted");

            // Close button functionality
            $(".custom-confirmation-message__close").on("click", function() {
                window.location.href = "/";
            });

            // Countdown function
            var countdownElement = document.getElementById("countdown");
            var countdownValue = 5;
            
            var countdownTimer = setInterval(function() {
                countdownValue--;
                countdownElement.textContent = countdownValue;
                if (countdownValue <= 0) {
                    clearInterval(countdownTimer);
                    window.location.href = "/";
                }
            }, 1000); // Update every second (1000ms)
            
            // Auto-redirect after 5 seconds
            setTimeout(function(){
                window.location.href = "/";
            }, 5000);
        </script>';
    }

    return $confirmation;
}

function add_facebook_page_id($output) {
    global $post;
    
    if (is_page_template('page-facebook.php') || (isset($post->ID) && $post->ID == 91)) {
        $output .= ' id="facebook-page"';
    }
    
    return $output;
}
add_filter('language_attributes', 'add_facebook_page_id');

add_filter( 'gform_confirmation_anchor_18', '__return_false' );

?>