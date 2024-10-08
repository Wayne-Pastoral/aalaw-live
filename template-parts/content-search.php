<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Adamson_Ahdoot
 */

			echo "<div class='blog-inner'>
							<div class='blog-image' style=' background-image: url(". get_the_post_thumbnail_url(get_the_ID(),array(300, 300)) . ");'></div>
						
							<div class='blog-inner-meta'>
								<h3 class='blog-title'><a href='" . get_the_permalink() ."'>" .get_the_title(). "</a></h3>
									<div class='blog-meta'>
										<p class='blog-date'>" . get_the_date('F d, Y') ."</p>
										<p class='blog-author'>";
										echo get_locale() =="en_US" ? "By: " : "Por: ";
							echo get_the_author_meta( 'display_name', $post->post_author ) ."</p>
									</div>
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
								echo "<a href='". $cont[$i]['link'] ."'> <span>" . $cont[$i]['name'] . "</span></a>";
									}
						echo "</div><a href='" . get_the_permalink() . "'>";
			
							if(get_locale() == "en_US"){
								echo "Read Blog";
							}else{
								echo "Leer Más";
							}
							echo " ></a>
							</div>
						</div>";			

?>