<aside class="grid-5 sticky" id="aside-blog">	

	<div class="main--page">
		<div class="form--header">
			<?php if(get_locale()=="en_US"){?>
			<h2>Free Case Review</h2>	
			<?php }else{ ?>
			<h2>Reciba Su Consulta Gratis</h2>
			<?php } ?>
		</div>
		<?php get_template_part( 'contact-form', get_post_format() ); ?>
	</div>
	
	
	
	<div class="c__single-post">
		<?php if(!is_home()){ ?>
		<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div>
        <label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label' ); ?></label>
		<?php $searchValue = apply_filters( 'get_search_query', get_query_var( 's' ) ); ?>
		
        <input type="text" placeholder="Search..." value="<?php echo $searchValue ?>" name="s" id="s" class="banner-text-box" />
        <input type="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" class="banner-text-btn"/>
    </div>
</form>
<?php// echo get_search_form(); ?>
					</div>
	<div class="categories post-type-list">
		<?php if (get_locale() == 'en_US') { ?>
		<h3 class="cat__tile">Categories</h3>
		<?php } else { ?>
		<h3 class="cat__tile">Categorías</h3>
		<?php }
		}else{
		
		?>
		
		<?php if (get_locale() == 'en_US') { ?>
		<h2>Topics</h2>
		<?php } else { ?>
		<h2>Temas</h2>
		<?php }
		
		 } ?>
	<div class='blog-topics'>
		
		
	<?php
	  $cat_args = array(
			'orderby' => 'name',
			'order' => 'ASC',
			'parent' => 0
		);
		$categories = get_categories($cat_args);
		$the_current_post_id = get_the_ID();

		// Variable to track whether DUI link has been added
		$dui_added = false;

		foreach ($categories as $category) {
			// Add the DUI link before categories alphabetically greater than 'DUI'
			if (!$dui_added && strcasecmp($category->name, 'DUI') > 0) {
				echo '<a href="https://aa.law/category/dui/" title="View all posts in DUI" rel="nofollow">DUI</a>';
				$dui_added = true;
			}
			
			$args = array(
				'category__in' => array($category->term_id),
			);
			$posts = get_posts($args);
			
			if ($posts) {
				echo '<a href="' . get_category_link($category->term_id) . '" title="' . sprintf(__('View all posts in %s'), $category->name) . '" rel="nofollow">' . $category->name . '</a>';
			}
		}

		// If DUI link wasn't added during the loop, add it at the end
		if (!$dui_added) {
			echo '<a href="https://aa.law/category/dui/" title="View all posts in DUI" rel="nofollow">DUI</a>';
		}
	?>
		<?php
		$args = array(
        'posts_per_page' => 3, /* how many post you need to display */
        'offset' => 0,
        'orderby' => 'post_date',
        'order' => 'DESC',
        'post_type' => 'post', /* your post type name */
        'post_status' => 'publish'
    );
    $query = new WP_Query($args);
		?>
		</div>
		
		
		
			<?php if(!is_home()){ ?>
		<div class="recent-post-container">
			
		
		<?php if(get_locale()=="en_US"){?>
		<h3>Recent Blog Post</h3>
			<?php }else{?>
			<h3>Publicación de blog reciente</h3>
			<?php } ?>
			
		<?php 

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
                $post_date = get_post()->post_date;
                $post_date_formatted = date('F j, Y', strtotime($post_date));
            ?>
		
		<div class="c__flex recent__item gap20 ">
		<div class="post__thumbnail">
			 <?php echo get_the_post_thumbnail(); ?>
			</div>
				 <div class="blog-item">
				 <?php if (get_locale() == 'en_US') { ?>
		<a class="recent__title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			<span class="date_aside c__lgray"><?= $post_date_formatted ?></span>
		<?php } else { ?>
		<a class="recent__title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			<span class="date_aside c__lgray" style="text-transform: capitalize;"><?= $post_date_formatted ?></span>
		<?php } ?>
			
			</div>
		</div>
		<?php    endwhile;
    endif; ?>
		
	</div>
		<?php } ?>
	</div>
		
</aside>