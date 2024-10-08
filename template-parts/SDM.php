<?php
if(is_404()){
		
	}else{
		add_action('wp_head', 'Webpage_schema');
		add_action('wp_head', 'LocalBusiness_schema');

		if(is_front_page()){
			add_action('wp_head', 'Organization_schema');
		}else{
		  if ( is_singular('post') ) {
			add_action('wp_head', 'Article_schema');
		  }
	add_action('wp_head', 'Breadcrumbs_schema');
		}
	}

	function Webpage_schema(){
		global $post;
		$URL = "";
  if(is_front_page()){
    $BCrumbs = "Home";
    $URL = home_url();
  }else{
    $BCrumbs =  "Home";

    if(is_404()){
      $BCrumbs .= " > 404";
      $URL = home_url(). "/404/";
    }else{
      

		
		if(is_singular('case_results')){
			if(get_locale() == 'en_US'){ $LANG_CaseResult = "Case Results"; }else{ $LANG_CaseResult = "Resultados de Casos"; }
			$BCrumbs .= " > " . $LANG_CaseResult . " > " . get_the_title();
        	$URL = get_the_permalink($post->id);
      }
		if(is_singular('attorneys')){
			if(get_locale() == 'en_US'){ $LANG_Attorneys = "Attorneys"; }else{ $LANG_Attorneys = "Abogados"; }
			$BCrumbs .= " > " . $LANG_Attorneys . " > " . get_the_title();
			$URL = get_the_permalink($post->id);
      }
		if(is_singular('locations')){
			if(get_locale() == 'en_US'){ $LANG_Location = "Areas We Serve"; }else{ $LANG_Location = "Áreas que Servimos"; }
			$BCrumbs .= " > " . $LANG_Location;
			$URL = get_the_permalink($post->id);
      }
		if(is_singular('accidents')){
			if(get_locale() == 'en_US'){ $LANG_Accidents = "Accidents"; }else{ $LANG_Accidents = "Accidente"; }
			$BCrumbs .= " > " . $LANG_Accidents;
			$URL = get_the_permalink($post->id);
      }
		if(is_singular('injuries')){
			if(get_locale() == 'en_US'){ $LANG_Inguries = "Injuries"; }else{ $LANG_Inguries = "Lesiones"; }
			$BCrumbs .= " > " . $LANG_Inguries . " > " . get_the_title();
			$URL = get_the_permalink($post->id);
      }
		if(is_singular('faqs')){
			if(get_locale() == 'en_US'){ $LANG_FAQ = "FAQS"; }else{ $LANG_FAQ = "Preguntas Frecuentes"; }
			$BCrumbs .= " > " . $LANG_FAQ . " > " . get_the_title();
			$URL = get_the_permalink($post->id);
      }
		
		$parents = array(get_post_ancestors($post->ID));
		
      foreach ($parents as $vals) {
        $vals = array_reverse($vals);
        for($i = 0; $i<count($vals); $i++){
          $BCrumbs .= " > " . get_the_title($vals[$i]);
        }
      }
	if(get_post_type()=="locations" || get_post_type()=="accidents"){	$BCrumbs .= " > " . get_the_title(); }
      if(is_singular( 'post' ) || is_home() || is_archive()){
        $BCrumbs .= " > " . get_the_title( get_option('page_for_posts', true));
        $URL = get_permalink( get_option( 'page_for_posts' ) );
      }
 if(is_singular(array('page', 'post'))){
        $BCrumbs .= " > " . get_the_title();
        $URL = get_the_permalink($post->id);
      }
      if(is_archive()){
        if(!is_date()){
          $queried_object = get_queried_object();
          $term_id = $queried_object->term_id;
        }
        $BCrumbs .= " > " . strip_tags(get_the_archive_title());
        $URL = is_date() ? get_permalink( get_option( 'page_for_posts' ) ).date("Y/m/",strtotime(get_the_date())) : get_term_link($term_id);
      }

     

		
    }
  }
		?>
		<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "WebPage",
 <?php if(is_front_page()){  echo PHP_EOL; }else{ ?> "breadcrumb": "<?php echo html_entity_decode($BCrumbs); ?>", <?php echo PHP_EOL; }  ?>
  "mainEntity":{
    "@type": "Service",
    "url":"<?php echo $URL ?>",
	 "serviceType": "<?php echo get_the_title($post->ID) ?>",
         "description": "<?php echo get_post_meta($post->ID, '_yoast_wpseo_metadesc', true) ? html_entity_decode(get_post_meta($post->ID, '_yoast_wpseo_metadesc', true)) : html_entity_decode(wp_trim_words( get_the_excerpt(), 25, '...' )) ?>",
         "areaServed": {
    "@type": "State",
    "name": "Los Angeles"
         }
    }
}

</script>
		<?php
	}
	function Breadcrumbs_schema(){
    $position_counter = 1;
?>
    <script type="application/ld+json">
    {
      "@context" : "http://schema.org",
      "@type" : "BreadcrumbList",
      "itemListElement" :
      [
        {
          "@type" : "ListItem",
          "position" : 1,
          "item" : {
              "name" : "Home",
              "@id" : "<?php echo home_url() . "/" ?>"
              }
        }

<?php if(is_404()){  ?>

        ,{
          "@type" : "ListItem",
          "position" : <?php echo $position_counter += 1 ?>,
          "item" : {
            "name" : "404",
            "@id" : "<?php echo home_url()."/404/" ?>"
          }
        }

<?php }else{

 
		        if(is_singular('case_results')){
					if(get_locale() == 'en_US'){ $LANG_CaseResult = "Case Results"; }else{ $LANG_CaseResult = "Resultados de Casos"; }
?>
,{
          "@type" : "ListItem",
          "position" : <?php echo $position_counter += 1 ?>,
          "item" : {
               "name" : "<?php echo $LANG_CaseResult; ?>",
               "@id" : "<?php echo home_url(). "/" .  strtolower($LANG_CaseResult) . "/"; ?>"
              }
          }
        ,{
          "@type" : "ListItem",
          "position" : <?php echo $position_counter += 1 ?>,
          "item" : {
               "name" : "<?php echo html_entity_decode(get_the_title()); ?>",
               "@id" : "<?php echo get_the_permalink(); ?>"
              }
          }

 <?php  }
 
		        if(is_singular('faqs')){
					if(get_locale() == 'en_US'){ $LANG_FAQ = "FAQS"; }else{ $LANG_FAQ = "Preguntas Frecuentes"; }
?>
,{
          "@type" : "ListItem",
          "position" : <?php echo $position_counter += 1 ?>,
          "item" : {
               "name" : "<?php echo $LANG_FAQ; ?>",
               "@id" : "<?php echo home_url(). "/" .  strtolower($LANG_FAQ) . "/"; ?>"
              }
          }
        ,{
          "@type" : "ListItem",
          "position" : <?php echo $position_counter += 1 ?>,
          "item" : {
               "name" : "<?php echo html_entity_decode(get_the_title()); ?>",
               "@id" : "<?php echo get_the_permalink(); ?>"
              }
          }

 <?php  }

		        if(is_singular('locations')){
					 global $post;
					if(get_locale() == 'en_US'){ $LANG_Location = "Areas We Serve"; }else{ $LANG_Location = "Áreas que Servimos"; }
?>
        ,{
          "@type" : "ListItem",
          "position" : <?php echo $position_counter += 1 ?>,
          "item" : {
               "name" : "<?php echo $LANG_Location; ?>",
               "@id" : "<?php echo home_url(). "/" .  strtolower(str_replace(" ", "-",$LANG_Location)) . "/";  ?>"
              }
          }
		<?php  
		   $parents = array_reverse(get_post_ancestors($post->ID));

        foreach ($parents as $vals) {
          $vals = array($vals);
          for($i = 0; $i<count($vals); $i++){
			  
?>
            ,{
              "@type" : "ListItem",
              "position" : <?php echo $position_counter += 1 ?>,
              "item" : {
                "name" : "<?php echo html_entity_decode(get_the_title($vals[$i])); ?>",
                "@id" : "<?php echo the_permalink($vals[$i]); ?>"
              }
            }
<?php		  } } ?>
		  ,{
          "@type" : "ListItem",
          "position" : <?php echo $position_counter += 1 ?>,
          "item" : {
               "name" : "<?php echo html_entity_decode(get_the_title()); ?>",
               "@id" : "<?php echo get_the_permalink(); ?>"
              }
          }

 <?php  }
        if(is_singular('accidents')){
			 global $post;
			if(get_locale() == 'en_US'){ $LANG_Accidents = "Accidents"; }else{ $LANG_Accidents = "Accidente"; }
?>
       ,{
          "@type" : "ListItem",
          "position" : <?php echo $position_counter += 1 ?>,
          "item" : {
               "name" : "<?php echo $LANG_Accidents; ?>",
               "@id" : "<?php echo home_url(). "/" .  strtolower(str_replace(" ", "-",$LANG_Accidents)) . "/"; ?>"
              }
          } 


 <?php
	
	
        $parents = array_reverse(get_post_ancestors($post->ID));

        foreach ($parents as $vals) {
          $vals = array($vals);
          for($i = 0; $i<count($vals); $i++){
			  
?>
            ,{
              "@type" : "ListItem",
              "position" : <?php echo $position_counter += 1 ?>,
              "item" : {
                "name" : "<?php echo html_entity_decode(get_the_title($vals[$i])); ?>",
                "@id" : "<?php echo the_permalink($vals[$i]); ?>"
              }
            }
<?php		  } }
       
			?>
			    ,{
          "@type" : "ListItem",
          "position" : <?php echo $position_counter += 1 ?>,
          "item" : {
               "name" : "<?php echo html_entity_decode(get_the_title()); ?>",
               "@id" : "<?php echo get_the_permalink(); ?>"
              }
          }
			<?php
		
		}
		 if(is_singular('injuries')){
			  global $post;
					if(get_locale() == 'en_US'){ $LANG_Inguries = "Injuries"; }else{ $LANG_Inguries = "Lesiones"; }
?>
,{
          "@type" : "ListItem",
          "position" : <?php echo $position_counter += 1 ?>,
          "item" : {
               "name" : "<?php echo $LANG_Inguries; ?>",
               "@id" : "<?php echo home_url(). "/" .  strtolower(str_replace(" ", "-",$LANG_Inguries)) . "/"; ?>"
              }
          }
		  <?php
		   $parents = array_reverse(get_post_ancestors($post->ID));

        foreach ($parents as $vals) {
          $vals = array($vals);
          for($i = 0; $i<count($vals); $i++){
			  
?>
            ,{
              "@type" : "ListItem",
              "position" : <?php echo $position_counter += 1 ?>,
              "item" : {
                "name" : "<?php echo html_entity_decode(get_the_title($vals[$i])); ?>",
                "@id" : "<?php echo the_permalink($vals[$i]); ?>"
              }
            }
<?php		  } } ?>
        ,{
          "@type" : "ListItem",
          "position" : <?php echo $position_counter += 1 ?>,
          "item" : {
               "name" : "<?php echo html_entity_decode(get_the_title()); ?>",
               "@id" : "<?php echo get_the_permalink(); ?>"
              }
          }

 <?php  }
		        if(is_singular('attorneys')){
					if(get_locale() == 'en_US'){ $LANG_Attorneys = "Attorneys"; }else{ $LANG_Attorneys = "Abogados"; }
?>
,{
          "@type" : "ListItem",
          "position" : <?php echo $position_counter += 1 ?>,
          "item" : {
               "name" : "<?php echo $LANG_Attorneys; ?>",
               "@id" : "<?php echo home_url(). "/" .  strtolower(str_replace(" ", "-",$LANG_Attorneys)) . "/"; ?>"
              }
          }
        ,{
          "@type" : "ListItem",
          "position" : <?php echo $position_counter += 1 ?>,
          "item" : {
               "name" : "<?php echo html_entity_decode(get_the_title()); ?>",
               "@id" : "<?php echo get_the_permalink(); ?>"
              }
          }

 <?php  }
		if(get_post_type() == 'accidents' || get_post_type() == 'injuries'|| get_post_type() == 'locations'){
			
		}else{
		       global $post;
        $parents = array(get_post_ancestors($post->ID));

        foreach ($parents as $vals) {
          $vals = array_reverse($vals);
          for($i = 0; $i<count($vals); $i++){
?>
            ,{
              "@type" : "ListItem",
              "position" : <?php echo $position_counter += 1 ?>,
              "item" : {
                "name" : "<?php echo html_entity_decode(get_the_title($vals[$i])); ?>",
                "@id" : "<?php echo the_permalink($vals[$i]); ?>"
              }
            }
<?php		  }
        }
		}

		       if(is_singular( 'post' ) || is_home() || is_archive()){
?>
          ,{
            "@type" : "ListItem",
            "position" : <?php echo $position_counter += 1 ?>,
            "item" : {
              "name" : "<?php echo html_entity_decode(get_the_title( get_option('page_for_posts', true) )); ?>",
              "@id" : "<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>"
            }
          }

<?php   }
		        if(is_singular('page') || is_singular('post')){
?>
        ,{
          "@type" : "ListItem",
          "position" : <?php echo $position_counter += 1 ?>,
          "item" : {
               "name" : "<?php echo html_entity_decode(get_the_title()); ?>",
               "@id" : "<?php echo get_the_permalink(); ?>"
              }
          }

 <?php  }
		        if(is_archive()){
          if(!is_date()){
            $queried_object = get_queried_object();
            $term_id = $queried_object->term_id;
          }
?>
          ,{
            "@type" : "ListItem",
            "position" : <?php echo $position_counter += 1 ?>,
            "item" : {
                "name" : "<?php echo html_entity_decode(strip_tags(get_the_archive_title())); ?>",
                "@id" : "<?php  echo is_date() ? get_permalink( get_option( 'page_for_posts' ) ).date("Y/m/",strtotime(get_the_date())) : get_term_link($term_id); ?>"
              }
          }
<?php   }
	}
 ?>
	
    ]
  } 
  </script>
<?php  }
	function LocalBusiness_schema(){
  global $post;
	$schema = get_field('enable_schema', $post->ID);
	$schemaInfo = get_field('schema_info', $post->ID);

	if (get_field('enable_schema', $post->ID) == 1){

?>
<script type="application/ld+json">
{
  "@context":"http://schema.org",
  "@type":"LocalBusiness",
  "name":"<?php echo the_field('schema_name', $post->ID)?>",
  "image":"<?php echo the_field('schema_image', $post->ID) ?>",
  "url":"<?php echo get_the_permalink($post->ID); ?>",
  "additionalproperty": {
    "@type":"propertyValue",
    "name":"<?php echo the_field('schema_name', $post->ID) ?>"
  },
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "<?php echo $schemaInfo['rating']['rating_value'] ?>",
    "reviewCount": "<?php echo $schemaInfo['rating']['review_count'] ?>"
  },

  "priceRange":"<?php echo $schemaInfo['bill']['price_range'] ?>",
  "telephone":"<?php echo $schemaInfo['address']['telephone_number'] ?>",
  "currenciesAccepted":"<?php echo $schemaInfo['bill']['currency_code'] ?>",
  "hasMap":"<?php echo $schemaInfo['address']['google_map'] ?>",
  "address":  {
    "@type": "PostalAddress",
    "addressCountry": "<?php echo $schemaInfo['additional_address']['country_code'] ?>",
    "addressLocality": "<?php echo $schemaInfo['additional_address']['state'] ?>",
    "addressRegion": "<?php echo $schemaInfo['additional_address']['region_code'] ?>"
  },
  "parentOrganization": "<?php echo home_url() ?>",
  "openingHoursSpecification": [

    <?php
		$days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday'];
   
    $counter = -1;
    foreach ( $schemaInfo['schedule'] as $hours ) {
      $counter++;
    ?>
    {
      "@type": "OpeningHoursSpecification",
      "dayOfWeek": "https://schema.org/<?php echo $days[$counter]?>",
      "opens": "<?php echo $schemaInfo['schedule'][$days[$counter]]['opening_time']?>",
      "closes":  "<?php echo $schemaInfo['schedule'][$days[$counter]]['closing_time']?>"

    }<?php   echo $counter + 1 == count($schemaInfo['schedule']) ? '' : ',';   
    }
													
												
  ?>
  ]
}
</script>
<?php
	}
	}
		function Organization_schema(){
	?>
	<script type='application/ld+json'>
{
    "@context": "http://schema.org/",
    "@type": "Organization",
    "name": "Adamson Ahdoot LLP",
    "url": "https://aa.law/",
    "description": "The lawyers from Adamson Ahdoot that work out of Sacramento have decades of experience representing people who’ve been seriously injured in a wide range of accidents. They specialize in helping clients injured in cities throughout the Sacramento region.
If you’ve been injured recently and want to understand your options, please give us a call at 855-434-2430 or schedule a conversation.",
  "image": "https://aa.law/wp-content/uploads/2022/02/logo-aa-law.webp",
    "address": {
        "@type": "PostalAddress",
        "addressCountry": "United States",
        "addressLocality": "Los Angeles",
        "addressRegion": "California",
        "postalCode": "90035",
        "streetAddress": "1150 S. Robertson Blvd,",
        "telephone": "877-871-3265",
        "mainEntityOfPage": "https://aa.law/"        
    },
    "contactPoint": {
        "@type": "ContactPoint",
    "contactType": "customer service",
        "telephone": "877-871-3265",
        "alternateName": "AALAW",
        "mainEntityOfPage": "https://aa.law/",
        "name": "Adamson Ahdoot LLP"
    },
      "sameAs": [
           "https://www.yelp.com/biz/adamson-ahdoot-los-angeles",
             "https://www.facebook.com/AdamsonAhdootLLP/",
             "https://www.linkedin.com/company/adamson-ahdoot-llp"
    ],
    "foundingDate": "1989",
    "legalName": "Adamson Ahdoot LLP",
    "logo": {
        "@type": "ImageObject",
        "contentUrl": "https://aa.law/wp-content/uploads/2022/02/logo-aa-law.webp"
    },
    "telephone": "877-871-3265"
}
</script>


		<?php
		}
		function Article_schema(){
  global $post;
?>
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "NewsArticle",
  "headline": "<?php echo get_the_title() ?>",
   "description": "<?php echo get_post_meta($post->ID, '_yoast_wpseo_metadesc', true) ? html_entity_decode(get_post_meta($post->ID, '_yoast_wpseo_metadesc', true)) : html_entity_decode(substr( get_the_excerpt(), 0, 150 )) ?>",
   "image": "<?php echo get_the_post_thumbnail_url(); ?>",
  "url": "<?php echo get_the_permalink(); ?>",
  "datePublished": "<?php echo ucfirst(get_the_date('F d, Y')); ?>",
  "dateModified": "<?php echo ucfirst(date_i18n("F d, Y",strtotime(get_the_modified_date()))); ?>",
  "author": {
    "@type":"Person",
    "name":"<?php echo get_the_author_meta( 'display_name', $post->post_author ); ?> ",
	"url": "<?php echo esc_url( get_author_posts_url( get_post_field( 'post_author', get_the_ID() )) ); ?>"
  }
}
</script>

<?php	
} ?>