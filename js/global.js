jQuery(document).ready(function ($) {
	jQuery.fn.toggleText = function(t1, t2){
	  if (this.text() == t1) this.text(t2);
	  else                   this.text(t1);
	  return this;
	};
	
	jQuery(".copy-with-stats .accident-injury-stat .label").hide()
	jQuery(".copy-with-stats .accident-injury-stat .Accident").first().show();
	jQuery(".copy-with-stats .accident-injury-stat .Accidente").first().show();
	jQuery(".copy-with-stats .accident-injury-stat .Lesión").first().show();
	jQuery(".copy-with-stats .accident-injury-stat .Injury").first().show();

		jQuery('.tabbed-content .tab-nav li').click(function() {
		// is the same as .tabbed-content .content div then add a class called active to .tabbed-content .content li
		var className = this.className.split("active").filter(Boolean)[0];
		jQuery(`.tabbed-content .content .case-result`).removeClass("active");
		jQuery(`.tabbed-content .content .jQuery{className}`).addClass("active");
		jQuery('.tabbed-content .tab-nav li').removeClass("active");
		jQuery(this).addClass("active");
	});
		jQuery('.tabbed-content .tab-nav h4').click(function(){
		jQuery('.tabbed-content .tab-nav h4').removeClass("active");

		jQuery(this).addClass("active");
		
		var getClass = jQuery(this).attr("class").split(' ')[0];
		var selector = '.tabbed-content .tab-nav .' + getClass;
		var optionAll = '.tabbed-content .tab-nav .all-cases';
		
		var optionAccidents = '.tabbed-content .tab-nav .accidents';
		var optionInjuries = '.tabbed-content .tab-nav .injuries';
		
		jQuery('.tabbed-content .content .case-result').removeClass("active");
		jQuery('.tabbed-content .tab-nav ul li').removeClass("active");
		if(selector == optionAccidents){
			jQuery('.tabbed-content .tab-nav ul').removeClass("active");
			jQuery('.tabbed-content .content .all-accidents').addClass("active");
		}else if(selector == optionInjuries){
			jQuery('.tabbed-content .tab-nav ul').removeClass("active");
			jQuery('.tabbed-content .content .all-injuries').addClass("active");
		}else{
			
			jQuery('.tabbed-content .content .all-accidents').addClass("active");
			jQuery('.tabbed-content .content .all-injuries').addClass("active");
			}
		jQuery(selector).addClass("active");
	})
	jQuery('.tabbed-content .tab-nav ul').click(function(){
		jQuery('.tabbed-content .tab-nav h4').removeClass("active");
		
		var getClass = jQuery(this).attr("class").split(' ')[0];
		var selector = '.tabbed-content .tab-nav h4.' + getClass;
		jQuery(selector).addClass("active");
		
	})
	
	jQuery('.hero .read-more-link').click(function() {
		jQuery('.hero .read-more').fadeToggle();
		jQuery( ".hero .read-more-link:lang(en-us)").toggleText('Read more', 'Read less');
		jQuery( ".hero .read-more-link:lang(es-es)").toggleText('Leer más', 'Leer menos');
		jQuery('.hero .description').delay(200).toggleClass('scroll');
	});
	jQuery('.panel-carousel .carousel-contain').flickity({
	  cellAlign: 'left',
	  contain: true,
	  imagesLoaded: true,
	  adaptiveHeight: false,
	  wrapAround: true,
	  draggable: true,
	  pageDots: false,
	  autoPlay: true,
	});
	jQuery('.two-graphics-text .carousel-contain').flickity({
	  cellAlign: 'left',
	  contain: true,
	  imagesLoaded: true,
	  adaptiveHeight: true,
	  wrapAround: true,
	  draggable: true,
	  pageDots: false
	});
// 	jQuery('.nascar:not(.home):not(.attorney-awards) .logos-contain').flickity({
// 	  imagesLoaded: true,
// 	  wrapAround: true,
// 	  draggable: true,
// 	  pageDots: false,
// 	  prevNextButtons: false,
// 	  autoPlay: true,
// 	  adaptiveHeight: false
// 	});
// 	jQuery('.nascar.attorney-awards .logos-contain').slick({
// 		infinite: true,
// 		slidesToShow:1,
// 		slidesToScroll: 1,
// 		dots: true,
// 		arrows: true,
// 		autoplay: false,
// 		prevArrow:"<button type='button' class='slick-prev'><i class='fa fa-chevron-left' aria-hidden='true'></i></button>",
// 		nextArrow:"<button type='button' class='slick-next'><i class='fa fa-chevron-right' aria-hidden='true'></i></button>",
// 	});
	jQuery('.attorney-carousel').flickity({
	  imagesLoaded: true,
	  wrapAround: true,
	  draggable: false,
	  pageDots: false,
	});
// 	jQuery('.attorneys-container').flickity({
// 	  imagesLoaded: true,
// 	  wrapAround: true,
// 	  draggable: false,
// 	  pageDots: false,
// 	  autoPlay: false,
// 	});
	jQuery('.attorneys-container.ppc-site').flickity({
	  imagesLoaded: true,
	  wrapAround: true,
	  draggable: false,
	  pageDots: false,
	  autoPlay: false,
			groupCells: 1
	});
	
	if ($(window).width() < 900) {
		$('.home  .numbers-contain').owlCarousel({
			items:1,
			loop:true
		});
// 		$('.numbers-contain').flickity({
// 		  imagesLoaded: true,
// 		  wrapAround: true,
// 		  draggable: true,
// 		  pageDots: true,
// 		  prevNextButtons: false,
// 		  autoPlay: true,
// 		  adaptiveHeight: false
// 		});
	}
	else {
	   	//$('.numbers-contain').flickity('destroy');
		$('.home .numbers-contain').trigger('destroy.owl.carousel');
	}
	
	jQuery( ".menu-toggle" ).click(function() {
		jQuery('header').toggleClass('open');
	  jQuery('.menu-mobile-nav-container').toggleClass('open');
	  jQuery('html').toggleClass('no-scroll');
	  jQuery('.menu-mobile-nav-spanish-container').toggleClass('open');
	  jQuery('.logo img').toggleClass('white');
	  jQuery('.sticky .menu-toggle').toggleClass('white');
	  jQuery('header .lang-item a').toggleClass('white');
	  jQuery(this).toggleClass('open');
	  jQuery(".mobile-nav").toggle();
	});
	
	
	
// 	Fancybox.bind("[data-fancybox]", {
// 	  // Your options go here
// 	});
	
	jQuery(window).on('load scroll', function () {
        if (window.scrollY >= 100) {
            jQuery("header").addClass("sticky").addClass("slide-down");
        } else {
            jQuery("header").removeClass("sticky").removeClass("slide-down");
        }
    });
		
/*
		
	gsap.to(".numbers-carousel .grid-3", {
	  opacity:1,
	  stagger: 0.1 // 0.1 seconds between when each ".box" element starts animating
	});
	
*/

	var controller = new ScrollMagic.Controller();
	
	// loop through all elements
	jQuery('.reveal-up-all').each(function() {
	  
	  // build a tween
	  var tween = TweenMax.from(jQuery(this), 0.7, {autoAlpha: 0, y: '+=10', x: '0', ease:Linear.easeNone});
	
	  // build a scene
	  var scene = new ScrollMagic.Scene({
	    triggerElement: this,
		triggerHook: 0.7,
		offset: 0,
		reverse: true,
	  })
	  .setTween(tween)
	  .addTo(controller);  
	});
	
	

/*
	const items = document.querySelectorAll(".number span");
	
	gsap.registerPlugin(ScrollTrigger);
	
	gsap.to(items, {
	  textContent: 0,
	  scrollTrigger: ".numbers-carousel",
	  duration: 1,
	  ease: "power1.in",
	  stagger: {
	    each: .2,
	    onUpdate: function() {
	      this.targets()[0].innerHTML = numberWithCommas(Math.ceil(this.targets()[0].textContent));
	    },
	  }
	});
	
*/
	
	function numberWithCommas(x) {
	  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
	}
	
		
	jQuery( ".attorneys-to-move" ).insertAfter( ".attorneys" );
	jQuery('a[href="#"]').click(function(e) {
        e.preventDefault();
    });
    

	jQuery('a[href*="#"]:not([href="#"])').click(function() {
	      var target = jQuery(this.hash);
	        jQuery('html,body').stop().animate({
	          scrollTop: target.offset().top - 120
	        }, 'linear');   
	});    
	if (location.hash){
    	var id = jQuery(location.hash);
	}
	jQuery(window).load(function() {
	  	if (location.hash){
	    	jQuery('html,body').animate({scrollTop: id.offset().top -120}, 'linear')
	  	};
 	});

	
	var cookie_email = Cookies.get('ct_gclid_tracking_cookie');
	jQuery('#Lead.GCLID__c').val(cookie_email);
	console.log(Cookies.get('ct_gclid_tracking_cookie') )
	
	jQuery('form button').click(function() {
	    Cookies.set('ct_gclid_tracking_cookie', jQuery('#Lead.GCLID__c').val(), {
	        expires: 365
	    });
	});
	
	jQuery('#lang_choice_1').change(function() {
		var val = jQuery(this).value();
		location.href = val;
	})
	
});
/* GR */
function auto_top(){
	 var nav = jQuery('#masthead').outerHeight();
	var calc = nav + 20;
   jQuery('.home .hero .row').attr('style', 'padding-top: ' + calc + 'px !important');
	jQuery('.single-attorneys .page-content').attr('style', 'padding-top: ' + nav + 'px !important');
}

function slides(){
	jQuery('.location-blog-module').slick({
		  infinite: true,
  slidesToShow: 3,
  slidesToScroll: 3,
 		 dots: true,
 		arrows: true,
		  autoplay: true,
  autoplaySpeed: 30000,
		prevArrow:"<button type='button' class='slick-prev'><i class='fa fa-chevron-left' aria-hidden='true'></i></button>",
        nextArrow:"<button type='button' class='slick-next'><i class='fa fa-chevron-right' aria-hidden='true'></i></button>",
		responsive:[
    {
      breakpoint: 900,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
  ]
	});
	jQuery('.home-blog-module').slick({
		  infinite: true,
  slidesToShow: 4,
  slidesToScroll: 4,
 		 dots: true,
 		arrows: true,
		  autoplay: true,
  autoplaySpeed: 30000,
		prevArrow:"<button type='button' class='slick-prev'><i class='fa fa-chevron-left' aria-hidden='true'></i></button>",
        nextArrow:"<button type='button' class='slick-next'><i class='fa fa-chevron-right' aria-hidden='true'></i></button>",
		responsive:[
    {
      breakpoint: 900,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
  ]
	})
}
jQuery( document ).ready(function() {
	auto_top();
	slides();
	
	
jQuery('.scholarship-div_wrapper .name_last label').append("<span class='gfield_required'><span class='gfield_required gfield_required_asterisk'>*</span></span>");
jQuery('.scholarship-div_wrapper .name_first label').append("<span class='gfield_required'><span class='gfield_required gfield_required_asterisk'>*</span></span>");
	
	jQuery("#primary-menu > li .sub-menu").has(".sub-menu").addClass("menu-parent"); 
	jQuery("#mobile-nav > li .sub-menu").has(".sub-menu").addClass("menu-parent"); 
	jQuery("#mobile-nav > li").has(".sub-menu").addClass("menu-parent"); 
	jQuery("#mobile-nav li").has(".sub-menu").append('<button class="submenu-toggle" onclick="mobile_menu_toggle()"></button>');	
	
})

function mobile_menu_toggle(){
	jQuery('#mobile-nav li .submenu-toggle').on('click', function (){
	   jQuery(this).parent().addClass('show');
		jQuery(this).addClass('activated');
	});	
	jQuery('#mobile-nav li .submenu-toggle.activated').on('click', function (){
	   jQuery(this).parent().removeClass('show');
		jQuery(this).removeClass('activated');
	});	
}

jQuery( window ).resize(function() {
 auto_top();
});

jQuery('.custom-accordion.faq .custom-accordion-toggle').click(function(e) {
    e.preventDefault();

    // Check if the clicked item is already open
    var isOpen = jQuery(this).hasClass('show');

    // Collapse all accordion items
    jQuery('.custom-accordion.faq .custom-accordion-toggle').removeClass('show');

    // If the clicked item was not already open, open it
    if (!isOpen) {
        jQuery(this).addClass('show');
    }
});

jQuery('.custom-accordion.faq .custom-accordion-toggle .custom-accordion-content').click(function(event){
    event.stopPropagation();
});

jQuery(window).scroll(function(){
  if (jQuery(this).scrollTop() >= 50) {
    // user scrolled 50 pixels or more;
    // do stuff
    jQuery(".single-ppc-site #masthead").addClass('sticky slide-down');
	  jQuery("#masthead").addClass('sticky slide-down');
  } else {
    jQuery(".single-ppc-site #masthead").removeClass('sticky slide-down');
	jQuery("#masthead").removeClass('sticky slide-down');
  }
});

jQuery(document).ready(function() {
	const arrowLeft = '<svg width="13" height="21" viewBox="0 0 13 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.479575 10.3776C0.479575 10.0668 0.536426 9.78258 0.650126 9.52486C0.763827 9.26714 0.949539 9.01699 1.20726 8.77443L9.22318 0.917695C9.58702 0.561432 10.0342 0.383301 10.5649 0.383301C10.9211 0.383301 11.2471 0.470472 11.5427 0.644813C11.8383 0.819155 12.0771 1.05035 12.259 1.33839C12.4333 1.62643 12.5205 1.94858 12.5205 2.30485C12.5205 2.84303 12.3083 3.31679 11.8838 3.72611L5.01624 10.3662L11.8838 17.0178C12.3083 17.4422 12.5205 17.9198 12.5205 18.4504C12.5205 18.8066 12.4333 19.1288 12.259 19.4168C12.0771 19.7125 11.8383 19.9474 11.5427 20.1218C11.2471 20.2961 10.9211 20.3833 10.5649 20.3833C10.0342 20.3833 9.58702 20.2014 9.22318 19.8375L1.20726 11.9808C0.949539 11.7382 0.763827 11.4881 0.650126 11.2304C0.536426 10.9651 0.479575 10.6808 0.479575 10.3776Z" fill="black"/></svg>';
    const arrowRight = '<svg width="13" height="21" viewBox="0 0 13 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.5204 10.3776C12.5204 10.0668 12.4636 9.78258 12.3499 9.52486C12.2362 9.26714 12.0505 9.01699 11.7927 8.77443L3.77682 0.917695C3.41298 0.561432 2.96575 0.383301 2.43515 0.383301C2.07889 0.383301 1.75294 0.470472 1.45732 0.644813C1.1617 0.819155 0.922926 1.05035 0.741004 1.33839C0.566663 1.62643 0.479492 1.94858 0.479492 2.30485C0.479492 2.84303 0.691734 3.31679 1.11622 3.72611L7.98376 10.3662L1.11622 17.0178C0.691734 17.4422 0.479492 17.9198 0.479492 18.4504C0.479492 18.8066 0.566663 19.1288 0.741004 19.4168C0.922926 19.7125 1.1617 19.9474 1.45732 20.1218C1.75294 20.2961 2.07889 20.3833 2.43515 20.3833C2.96575 20.3833 3.41298 20.2014 3.77682 19.8375L11.7927 11.9808C12.0505 11.7382 12.2362 11.4881 12.3499 11.2304C12.4636 10.9651 12.5204 10.6808 12.5204 10.3776Z" fill="black"/></svg>';
	function ontranslated() {
		jQuery('.page-slider-gallery[data-desktop="4"] .owl-item').removeClass('ni pi');
		jQuery('.page-slider-gallery[data-desktop="4"] .center').next().addClass('ni');
		jQuery('.page-slider-gallery[data-desktop="4"] .center').prev().addClass('pi');
	}
	function oninitialized() {
		jQuery('.page-slider-gallery[data-desktop="4"] .owl-item').removeClass('ni pi');
		jQuery('.page-slider-gallery[data-desktop="4"] .center').next().addClass('ni');
		jQuery('.page-slider-gallery[data-desktop="4"] .center').prev().addClass('pi');
	}
	jQuery('.page-slider-gallery').each(function() {
		var thismobile = jQuery(this).data('mobile');
		var thistablet = jQuery(this).data('tablet'); 
		var thisdesktop = jQuery(this).data('desktop');
		jQuery(this).owlCarousel({
			items : 3,
			margin: 30,
			nav:true,
			navText : [arrowLeft,arrowRight],
			dots:false,
			center:true,
			loop:true,
			onTranslated: ontranslated,
			onInitialized: oninitialized,
			responsive : {
				0 : { items : thismobile },
				768 : { items : thistablet}, 
				1200 : { items : thisdesktop}
			}
		});
	});
	
	/*====*/
	jQuery('#GMBReviews').owlCarousel({
		//items: 3,
		autoHeight:true,
		dots:false,
		nav : true,
		navText : ['<svg width="16" height="27" viewBox="0 0 16 27" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M14.7151 25.7215L15.9933 24.4434L10.6739 19.1191L5.35475 13.7949L10.6774 8.4674L16 3.13966L14.7105 1.86983L13.4213 0.6L6.8272 7.19811L0.233126 13.7962L6.83501 20.3981L13.4369 27L14.7151 25.7215Z" fill="black"/></svg>', '<svg width="16" height="27" viewBox="0 0 16 27" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M1.28492 1.27845L0.00673569 2.55664L5.32613 7.88088L10.6452 13.2051L5.32262 18.5326L0 23.8603L1.2895 25.1302L2.57873 26.4L9.1728 19.8019L15.7669 13.2038L9.16499 6.60189L2.5631 0L1.28492 1.27845Z" fill="black"/></svg>'],
		responsive : {
			0 		: {
				items:1,
				dots:false,
				autoHeight:true
			},
			768 	: {
				items:2,
				dots:false,
				autoHeight:false
			},
			992 	: {
				items:3,
				dots:false,
				autoHeight:false
			},
			1200 	: {
				items: jQuery('body').hasClass('home') || 
					   jQuery('body').hasClass('page-template-page-our-legal-process') || 
					   jQuery('body').hasClass('single-locations') ? 3 : 4,
				dots: true,
				autoHeight: false
			},
		}
	});

	function TruncateText(text) {
		if(text.length > 220)
		{
			text = text.substring(0,220) + "...";
		}
		return text;
	}
	
	var readtext = jQuery('#lang_choice_1 option').filter(':selected').text() == "English" ? 'Read more' : 'Leer más';
	jQuery('.gmbreviews').find('.review').each(function() {
		var review = jQuery(this).find('.review-text').data('review');
		var trimmedreview = TruncateText(review);

		if (review.length > 220) {
			jQuery(this).find('.rwrap').append('<span class="readmore">'+readtext+'</span>');
		}

		jQuery(this).find('.review-text').text(trimmedreview);
	});

	jQuery(document).on('click', '.gmbreviews .readmore', function() {
		var actualreview = jQuery(this).siblings('.review-text').data('review');
		var review = jQuery(this).siblings('.review-text').text();
		if (review.length > 223) {
			var readtext1 = jQuery('#lang_choice_1 option').filter(':selected').text() == "English" ? 'Read more' : 'Leer más';
			jQuery(this).text(readtext1);
			jQuery(this).siblings('.review-text').text(TruncateText(review))
		} else {
			var readtext2 = jQuery('#lang_choice_1 option').filter(':selected').text() == "English" ? 'Read less' : 'Leer menos';
			jQuery(this).text(readtext2);
			jQuery(this).siblings('.review-text').text(actualreview)
		}
	});
	
	jQuery('#videoTestimonials .owl-carousel').owlCarousel({
		items: 3,
		dots:true,
		nav : true,
		margin:30,
		navText : ['<svg width="16" height="27" viewBox="0 0 16 27" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M14.7151 25.7215L15.9933 24.4434L10.6739 19.1191L5.35475 13.7949L10.6774 8.4674L16 3.13966L14.7105 1.86983L13.4213 0.6L6.8272 7.19811L0.233126 13.7962L6.83501 20.3981L13.4369 27L14.7151 25.7215Z" fill="black"/></svg>', '<svg width="16" height="27" viewBox="0 0 16 27" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M1.28492 1.27845L0.00673569 2.55664L5.32613 7.88088L10.6452 13.2051L5.32262 18.5326L0 23.8603L1.2895 25.1302L2.57873 26.4L9.1728 19.8019L15.7669 13.2038L9.16499 6.60189L2.5631 0L1.28492 1.27845Z" fill="black"/></svg>'],
		responsive : {
			0 		: {
				items:1,
				dots:true
			},
			768 	: {
				items:2,
				dots:false
			},
			992 	: {
				items:3,
				dots:false
			}
		}
	});
	
	jQuery('.youtube-thumb').click(function() {
		var videoid = jQuery(this).data('videoid');
		jQuery(this).children('svg').remove();
		var iframe = '<iframe src="https://www.youtube.com/embed/'+videoid+'?autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope;" allowfullscreen></iframe>';
		jQuery(this).append(iframe);
	});
	
	var winWidth = jQuery(window).width();
	if (winWidth < 768) {
		jQuery('.grid__carousel').each(function() {
			var _$this = jQuery(this);
			_$this.addClass('owl-carousel');
			jQuery(this).owlCarousel({
				items		:1,
				dots		:true,
				nav			:false,
				autoHeight	:true
			})
		});
	}
	/*====*/
	
	
	
	jQuery('.logos-carousel').owlCarousel({
		items		:5,
		dots		:false,
		nav			:false,
		center		:true,  
		//lazyLoad	:true,
		loop 		:true,
		autoplay	: true,
		responsive : {
			0 : { items : 1 },
			576 : { items : 3 },
			992 : { items : 5 }
		}
	});
	
	if (jQuery(window).width() < 992) {
		
		var divs = jQuery(".nascar.home .logos-contain .single-logo");
		for(var i = 0; i < divs.length; i+=4) {
		  divs.slice(i, i+4).wrapAll("<div class='item'></div>");
		}
		
		jQuery('.nascar.home .logos-contain').owlCarousel({
			items	:2,
			margin	:10,
    		nav		:false,
			loop 	:false
		});
	}
	
	jQuery('.caseresult-tabs li').click(function() {
		jQuery(this).addClass('active').siblings().removeClass('active');
		var classname = jQuery(this).attr('class');
		if (jQuery(this).hasClass('all')) {
			jQuery('.crtabs li').show()	
		} else {
			var classname = classname.replace(' active', '');
			jQuery('.crtabs li').hide()
			jQuery('.crtabs li.'+classname).show();
		}
	});
	
	if (jQuery('body').hasClass('single-attorneys')) {
		var divs = jQuery(".single-attorneys .awards-carousel .item");
		for(var i = 0; i < divs.length; i+=4) {
			divs.slice(i, i+4).wrapAll("<div class='item'></div>");
		}

		jQuery('.single-attorneys .awards-carousel .owl-carousel').owlCarousel({
			items	:2,
			nav		:false,
			dots:true,
			//loop:true,
		});
	} else {
		
		jQuery('.awards-carousel .owl-carousel').owlCarousel({
			items : 3,
			nav:true,
			navText:['<svg viewBox="0 0 100 100"><path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" class="arrow"></path></svg>', '<svg viewBox="0 0 100 100"><path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" class="arrow" transform="translate(100, 100) rotate(180) "></path></svg>'],
			dots:true,
			loop:true,
			margin:0
		});
		
	}
	
	jQuery('.cs-chosen-cat').click(function() {
		jQuery(this).parents('.case-result-wrapper').toggleClass('active');
		var url = window.location.href;
		var spanish = url.indexOf("/es/");
		var lang = jQuery('html').attr('lang')
		var expandtag = jQuery(this).children('span');
		console.log(lang)
		if (lang === 'es-MX') {
			var expand = expandtag.text() === 'Expandir lista de categorías' ? 'Ver Menos' : 'Expandir lista de categorías'
			expandtag.text(expand);
		}
		
		if (lang === 'en-US'){
			var expand = expandtag.text() === 'Expand Category List' ? 'See Less' : 'Expand Category List'
			expandtag.text(expand);
		}
	});
	
	jQuery('.gallery-slider.owl-carousel').each(function() {
		console.log(true);
		var _this = $(this);
		var _item = _this.find('.wp-block-image');
		_item.each(function() {
			var _img = $(this).find('img')
			$(this).css('background-image', 'url('+_img.attr('data-src')+')');
		})
	})
	
	jQuery('.gallery-slider.owl-carousel').owlCarousel({
		items: 1,
		dots:true,
		nav : true,
		margin:0,
		navText : ['<svg width="16" height="27" viewBox="0 0 16 27" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M14.7151 25.7215L15.9933 24.4434L10.6739 19.1191L5.35475 13.7949L10.6774 8.4674L16 3.13966L14.7105 1.86983L13.4213 0.6L6.8272 7.19811L0.233126 13.7962L6.83501 20.3981L13.4369 27L14.7151 25.7215Z" fill="black"/></svg>', '<svg width="16" height="27" viewBox="0 0 16 27" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M1.28492 1.27845L0.00673569 2.55664L5.32613 7.88088L10.6452 13.2051L5.32262 18.5326L0 23.8603L1.2895 25.1302L2.57873 26.4L9.1728 19.8019L15.7669 13.2038L9.16499 6.60189L2.5631 0L1.28492 1.27845Z" fill="black"/></svg>']
	});
	
});

jQuery(window).scroll(function() {
	var winWidth = jQuery(window).width(); 
	var scrollTop = jQuery(this).scrollTop();

	jQuery('.grid__carousel').each(function() {
		var _$this = jQuery(this);
		if (winWidth < 768) {
			_$this.addClass('owl-carousel');
			jQuery(this).owlCarousel({
				items		:1,
				dots		:true,
				nav			:false,
				autoHeight	:true
			})
		} else {
			jQuery(this).trigger('destroy.owl.carousel');
			_$this.removeClass('owl-carousel')
		}
	});
	
// 	if (scrollTop > (jQuery('body').height()/2)) {
// 		jQuery('.logos-carousel .single-logo').each(function() {
// 			var thumb = jQuery(this).find('img').data('src');
// 			if (thumb != '') {
// 				jQuery(this).find('img').attr('src', thumb);
// 			}
// 		});
// 	}

});
