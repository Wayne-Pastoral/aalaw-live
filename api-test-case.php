<?php


/*
	Template Name: API Test Case
*/

?>
<!doctype html>
<html>
<head>
<meta name='robots' content='noindex, nofollow' />
</head>
<body>
<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$pagination = '';
	$return = '';
	
	if(!empty($_GET['page_api'])){
		$paged = $_GET['page_api'];
		
		unset($_GET['page_api']);
    }
				$crargs = array(
					'post_type' 		=> 'case_results', 
					'post_status'		=> 'publish',
					'posts_per_page'	=> 10,
					'paged' 			=> $paged,
					'meta_key'        	=> 'case_amount',
					'orderby'         	=> 'meta_value_num',
					'meta_type' 		=> 'NUMERIC',
					'order'				=> 'DESC',
					'tax_query'         => array(				
        				array(
							'taxonomy'         => 'category',
							'terms'            => $_GET['post_name'],
							'field'            => 'name',
							'include_children' => false
						),
					)
				);
				$crquery = new WP_Query($crargs);
				if ( $crquery->have_posts() ) :
					$return = '<div><ul>';
					while ( $crquery->have_posts() ) :
						$crquery->the_post();
					   	$crdate = get_field('case_verdict', get_the_ID());
					   	$crdate = $crdate ? '<em>'.$crdate.'</em>' : '';
						$return .= '<li><a href="'.get_the_permalink().'"><span>'.get_the_title().'</span>'.$crdate.'</a></li>';
					endwhile;
					$return .= '</ul></div>';
					$total_pages = $crquery->max_num_pages;
					if ($total_pages > 1){
						$pagination .= '<div class="paging">';
						$current_page = max(1, $paged);
						$pagination .= paginate_links(array(
							'base' 		=> get_pagenum_link(1) . '%_%',
							'format'       => '&page_api=%#%',
							'current'	=> $current_page,
							'total' 	=> $total_pages,
							'prev_text' => __('<< Previous'),
							'next_text' => __('Next >>'),
						));
						$pagination .= '</div>';
					} 
endif;	
				echo $return.$pagination;
				wp_reset_postdata();
                wp_reset_query();


?>
	</body>
</html>