jQuery(document).ready(function ($) {
	var tl =  gsap.timeline()
  	
  	tl.fromTo('.hero', {opacity:0.0 , ease:Power2.easeIn }, { opacity:1 , ease:Power2.easeIn });
	tl.fromTo('header', {opacity:0.0 , ease:Power2.easeIn }, { opacity:1 , ease:Power2.easeIn });
	tl.fromTo('.hero .copy', {opacity:0.0 , ease:Power2.easeIn }, { opacity:1 , ease:Power2.easeIn });
	tl.fromTo('.hero .title', {opacity:0.0 , ease:Power2.easeIn }, { opacity:1 , ease:Power2.easeIn });
	tl.fromTo('.hero .subhead', {opacity:0.0 , ease:Power2.easeIn }, { opacity:1 , ease:Power2.easeIn });
	tl.fromTo('.hero .testimonial', {opacity:0.0 , ease:Power2.easeIn }, { opacity:1 , ease:Power2.easeIn });
	tl.fromTo('.page-content', {opacity:0.0 , ease:Power2.easeIn }, { opacity:1 , ease:Power2.easeIn });
});