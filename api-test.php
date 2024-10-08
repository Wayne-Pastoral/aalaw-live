<?php
/*
	Template Name: API Test
*/
?>
<!doctype html>
<html>
<head>
<meta name='robots' content='noindex, nofollow' />
</head>
<body>
<?php
$paging = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$pagination = '';
	$return = '';
	
	if(!empty($_GET['page_api'])){
		$paging = $_GET['page_api'];
		
		unset($_GET['page_api']);
    }
			


				$bargs = array(
					'post_type' 		=> 'post', 
					'post_status'		=> 'publish',
					'posts_per_page'	=> 3,
					'paged' 			=> $paging,
					'category_name' 	=> $_GET['post_name']
				);
				$bquery = new WP_Query($bargs);

				if ( $bquery->have_posts() ) :
					$return .= '<div><div class="bloglist">';
					while ( $bquery->have_posts() ) :
						$bquery->the_post();
						$bfeatimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
						if($bfeatimage){
							$image = $bfeatimage[0];
						}else{
							$image = '';
						}
		
						$return .= '<div class="item">
							<div class="wrap">
								<div class="bfeatimage" style="background-image:url('.$image.')"></div>
								<div class="binfo">
									<h4><a href="'.get_the_permalink().'">'.get_the_title() .'</a></h4>
									<span class="bdate">'.get_the_date().'</span>
									<span class="bauthor">'. (get_locale() == 'en_US' ? 'By:' : 'Por:') .': '.get_the_author().'</span>
									<p>'.substr(get_the_excerpt(get_the_ID()), 0, 150).'...</p>
									<a href="'.get_the_permalink().'" class="read-blog">'. (get_locale() == 'en_US'? 'Read Blog' : 'Leer Más') .' ></a>
								</div>
							</div>
						</div>';
				
					endwhile;
					$return .= '</div>';
					$blog_total_pages = $bquery->max_num_pages;
					if ($blog_total_pages > 1){
						$pagination .= '<div class="paging">';
						$blog_current_page = max(1, $paging);
						$pagination .= paginate_links(array(
							'base' 		=> get_pagenum_link(1) . '%_%',
							'format'       => '&page_api=%#%',
							'current'	=> $blog_current_page,
							'total' 	=> $blog_total_pages,
							'prev_text' => __('<< Previous'),
							'next_text' => __('Next >>'),
						));
						$pagination .= '</div></div>';
					} 
				endif;
				echo $return.$pagination;
				wp_reset_postdata();
                wp_reset_query();
?>

</body>
</html>