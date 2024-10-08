<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Adamson_Ahdoot
 */

?>
	<footer id="colophon" class="site-footer bg-forest">
		<div class="container">
			<div class="column">
			<div class="row grid-11">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-2',
							'menu_id'        => 'footer-menu',
						)
					);
					?>
				</div>
			
			<div class="row grid-4 align-items-center footer-socials">
				<div class="logo-container">
					<a href="/" class="logo"><img src="<?php the_field('logo', 'option'); ?>" alt="Adamson Ahdoot Logo" /></a>
				</div>
				<div class="socials grid-16">
					<?php if(get_locale() == "en_US"){?>
						<h4 class="footer-title">Connect With Us</h4>
					<?php }else{ ?>
						<h4 class="footer-title">Conéctese con nosotros</h4>
					<?php } ?>
		<div class="row grid-16 justify-content-start">
		   <a href="<?php the_field('yelp_url', 'option'); ?>" target="_blank" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/assets/bi_yelp (1).png"></a>
		   <a href="<?php the_field('linkedin_url', 'option'); ?>" target="_blank" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/assets/linke_20 (1).png"></a>
		   <a href="<?php the_field('facebook_url', 'option'); ?>" target="_blank" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/assets/ri_facebook-fill (1).png"></a>
		   <a href="<?php the_field('instagram', 'option'); ?>" target="_blank" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/assets/insta (1).png"></a>  
		   <a href="<?php the_field('x_icon', 'option'); ?>" target="_blank" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/assets/pajamas_twitter (1).png"></a>
		   <a href="<?php the_field('linkin', 'option'); ?>" target="_blank" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/assets/simple-icons_linktree (1).png"></a>
		   <a href="<?php the_field('youtube', 'option'); ?>" target="_blank" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/assets/ri_youtube-fill (1).png"></a>
		</div>

				</div>
				
				
				
			
<!-- 			<div class="row"> -->
				<div class="disclaimer">
					<?php if(get_locale() == "en_US"){?>
						<h4 class="footer-title">Hours of Operation</h4>
						<p>Available 24/7</p>
					<?php }else{ ?>
						<h4 class="footer-title">Horas de operación</h4>
						<p>Disponible 24/7</p>
					<?php } ?>
				<p class="small grid-16 disclaimer">
					<?php 
					if (get_locale() == 'en_US') { ?>
					<?php the_field('disclaimer', 'option'); ?>
					<?php } else { ?>
					<?php the_field('disclaimer_spanish', 'option'); ?>
					<?php } ?>
				</p>
<!-- 				<div class="grid-5 text-right locations">
					<h4 class="caps white">
						<?php 
					//if (get_locale() == 'en_US') { ?>
						Our Locations
						<?php// } ?>
					</h4>
					<?php
				//	wp_nav_menu(
					//	array(
// 							'theme_location' => 'menu-5',
// 							'menu_id'        => 'footer-locations',
// 						)
// 					);
					?>
				</div> -->
			</div>
				</div>
			</div>
			<div class="row justify-content-start align-items-center footer-meta">
				<p class="small copyright">
					<?php 
					if (get_locale() == 'en_US') { ?>
					<?php the_field('copyright', 'option'); ?>
					<?php } else { ?>
					<?php the_field('copyright_spanish', 'option'); ?>
					<?php } ?>
				 &nbsp</p>
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-3',
							'menu_id'        => 'policies-menu',
						)
					);
					?>
			</div>
		</div>
		<div class="mobile-cta bg-green">
			<?php if (get_locale() == 'en_US') { ?>
			Hablamos Español
			<a href="tel:<?php the_field('phone_number','options'); ?>" class="btn white"><img src="<?php echo get_template_directory_uri(); ?>/assets/icon-phone.svg">Call Now</a>
			<?php } else { ?>
			Hablamos Español
			<a href="tel:<?php the_field('phone_number','options'); ?>" class="btn white"><img src="<?php echo get_template_directory_uri(); ?>/assets/icon-phone.svg">Llama Ahora</a>
			<?php } ?>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->
<!-- js for 3 item logo -->
<script>
 var $ = jQuery;
 $(".menu-for-english .sub-menu").append("<a href='https://aa.law/practice-areas/' class='view-all-menu'>View All Practice Areas</a>. ");
 $(".spanish-menu .sub-menu").append("<a href='https://aa.law/es/areas-de-practica/' class='view-all-menu'>Ver todas las áreas de práctica</a>. ");
jQuery(document).ready(function ($) {
    var btn = $('#topbutton');

    $(window).scroll(function() {
        if ($(window).scrollTop() > 300) {
            btn.addClass('show');
        } else {
            btn.removeClass('show');
        }
    });

    btn.click(function() {
        $('html, body').animate({scrollTop: 0}, '300');
    });
});
$( document ).ready(function() {
var $carousel = $('.logos  .carousel').flickity({
initialIndex: 1,
freeScroll: true,
wrapAround: true,
prevNextButtons: false,
pageDots: false,
prevNextButtons: true,
pageDots: true,
autoPlay: 30000
});
var owl = $('.client-carousel');
               owl.owlCarousel({
                nav: false,
                loop: true,
				items: 1,
		        dots: true,
                responsive: {
                  0: {
                    items: 1
                  },
                  600: {
                    items: 1
                  },
                  1000: {
                    items: 1
                  }
                }
              });
$('.button--insert').on( 'click', function() {
  var $cellElems = $( makeCellHtml() + makeCellHtml() );
  $carousel.flickity( 'insert', $cellElems, 2 );
});

var cellCount = 3;

function makeCellHtml() {
  cellCount++;
  return '<div class="carousel-cell">' + cellCount + '</div>';
}
});
</script>
<!-- js for 3 item logo -->
<script>
$(document).ready(function(){
    // Update the phone number
    var newPhoneNumber = '(800) 310-1606';
    var newPhoneNumberHref = 'tel:' + newPhoneNumber.replace(/\D/g, '');
    
    var phoneNumberHtml = '<span data-calltrk-noswap>' + newPhoneNumber + '</span>';
    
    // Update for postid-4611
    $('.postid-4611 span.wpseo-phone a.tel').html(phoneNumberHtml);
    $('.postid-4611 span.wpseo-phone a.tel').attr('href', newPhoneNumberHref);
    $('.postid-4611 span.wpseo-phone a.tel').attr('data-calltrk-noswap', ''); // Adding data-calltrk-noswap attribute

    // Update for postid-80
    $('.postid-80 span.wpseo-phone a.tel').html(phoneNumberHtml);
    $('.postid-80 span.wpseo-phone a.tel').attr('href', newPhoneNumberHref);
    $('.postid-80 span.wpseo-phone a.tel').attr('data-calltrk-noswap', ''); // Adding data-calltrk-noswap attribute
});


</script>

<?php if (is_front_page()) { ?>
<script type="application/ld+json">
	{
		"@context":"http://schema.org",
		"@type":"LocalBusiness",
		"name":"Adamson Ahdoot Injury Attorneys",
		"image":"<?php echo home_url() ?>/wp-content/uploads/2023/05/AA-LAW-HORIZONTALCue3.29.23-2.webp",
		"url":"<?php echo home_url() ?>",
		"additionalproperty": {
			"@type":"propertyValue",
			"name":"<?php echo home_url() ?>"
		},
		"aggregateRating": {
			"@type":"AggregateRating",
			"ratingValue":"4.8",
			"reviewCount":"230"
		},
		"priceRange":"$$$",
		"telephone":"(866) 904-5811",
		"currenciesAccepted":"USD",
		"hasMap":"https://www.google.com/maps/place/Adamson+Ahdoot+LLP/@37.3206591,-121.9521326,15z/data=!4m2!3m1!1s0x0:0x1976a7818cf3aed7?sa=X&ved=2ahUKEwjAjv3Ju7D_AhXe1jgGHVHFDZEQ_BJ6BAhXEAg",
		"address": {
			"@type":"PostalAddress",
	  		"addresslocality": "San Jose",
	  		"addressRegion": "CA",
		 	"postalCode": "95117",
		  	"streetAddress": "3165 Olin Ave #2"
		},
		"areaServed":{
			"@type":"geoCircle",
			"name":"Adamson Ahdoot Injury Attorneys",
			"geoMidpoint": {
				"longitude":"-121.9521326",
				"latitude":"37.3206591"
			}
		}
	}
</script>
<script type="application/ld+json">
{
	"@context":"http://schema.org",
	"@type":"LegalService",
	"name":"Adamson Ahdoot Injury Attorneys",
	"description":"Adamson Ahdoot works aggressively to ensure maximum compensation for our injured clients and their families in Los Angeles and California.",
	"image":"<?php echo home_url() ?>/wp-content/uploads/2023/05/AA-LAW-HORIZONTALCue3.29.23-2.webp",
	"url":"<?php echo home_url() ?>",
	"additionalproperty": {
		"@type":"propertyValue",
		"name":"Adamson Ahdoot Injury Attorneys",
		"sameAs":[
			"https://www.facebook.com/AdamsonAhdootLLP/",
			"https://www.linkedin.com/company/adamson-Ahdoot-llp",
			"https://www.yelp.com/biz/adamson-and-Ahdoot-llp-los-angeles"
		]
	},
	"aggregateRating": {
	"@type":"AggregateRating",
		"ratingValue":"4.8",
		"reviewCount":"230"
	},
	"priceRange":"$$$",
	"telephone":"(866) 904-5811",
	"currenciesAccepted":"USD",
	"hasMap":"https://www.google.com/maps/place/Adamson+Ahdoot+LLP/@37.3206591,-121.9521326,15z/data=!4m2!3m1!1s0x0:0x1976a7818cf3aed7?sa=X&ved=2ahUKEwjAjv3Ju7D_AhXe1jgGHVHFDZEQ_BJ6BAhXEAg",
	"address": {
		"@type":"PostalAddress",
  		"addresslocality": "San Jose",
  		"addressRegion": "CA",
     	"postalCode": "95117",
      	"streetAddress": "3165 Olin Ave #2"
	},
	"areaServed":{
		"@type":"geoCircle",
		"name":"Adamson Ahdoot Injury Attorneys",
		"geoMidpoint": {
			"longitude":"-121.9521326",
			"latitude":"37.3206591"
		}
	}
}
</script>

<script type="application/ld+json">
{
	"@context":"http://schema.org",
	"@type":"Attorney",
	"name":"Adamson Ahdoot Injury Attorneys",
	"description":"Adamson Ahdoot works aggressively to ensure maximum compensation for our injured clients and their families in Los Angeles and California.",
	"image":"<?php echo home_url() ?>/wp-content/uploads/2023/05/AA-LAW-HORIZONTALCue3.29.23-2.webp",
	"url":"<?php echo home_url() ?>",
	"additionalproperty": {
		"@type":"propertyValue",
		"name":"Adamson Ahdoot Injury Attorneys",
		"sameAs":["https://www.facebook.com/AdamsonAhdootLLP/","https://www.linkedin.com/company/adamson-Ahdoot-llp","https://www.yelp.com/biz/adamson-and-Ahdoot-llp-los-angeles"]
	},
	"aggregateRating": {
		"@type":"AggregateRating",
		"ratingValue":"4.8",
		"reviewCount":"230"
	},
	"priceRange":"$$$",
	"telephone":"(866) 904-5811",
	"currenciesAccepted":"USD",
	"hasMap":"https://www.google.com/maps/place/Adamson+Ahdoot+LLP/@37.3206591,-121.9521326,15z/data=!4m2!3m1!1s0x0:0x1976a7818cf3aed7?sa=X&ved=2ahUKEwjAjv3Ju7D_AhXe1jgGHVHFDZEQ_BJ6BAhXEAg",
	"address": {
		"@type":"PostalAddress",
  		"addresslocality": "San Jose",
  		"addressRegion": "CA",
		"postalCode": "95117",
      	"streetAddress": "3165 Olin Ave #2"
	},
	"areaServed":{
		"@type":"geoCircle",
		"name":"Adamson Ahdoot Injury Attorneys",
		"geoMidpoint": {
			"longitude":"-121.9521326",
			"latitude":"37.3206591"
		}
	}
}
</script>

<?php } ?>

<?php wp_footer(); ?>
<?php the_field('footer_scripts', 'options'); ?>

</body>
</html>
