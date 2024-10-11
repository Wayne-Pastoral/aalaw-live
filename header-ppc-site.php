<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Adamson_Ahdoot
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://use.typekit.net/yjc3som.css">
	<?php the_field('header_scripts', 'options', false); ?>
	
	<!-- Hotjar Tracking Code for my site -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:3379811,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>
	
	<!-- 	Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">	
	<link href="https://fonts.googleapis.com/css2?family=Staatliches&family=Teko:wght@300..700&display=swap" rel="stylesheet">
	<!-- 	Google Font -->
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

	<header id="masthead" class="site-header">
		<div class="container wide">
			<div class="row align-content-center align-items-center">
				<div class="logo">
					<?php if (get_locale() == 'en_US') { ?>
					<a href="<?php echo site_url(); ?>" >
					<img src="<?php the_field('logo', 'option'); ?>" alt="Adamson Ahdoot Logo" />
					</a>
					<?php } else { ?>
					<a href="<?php echo site_url('es'); ?>" >
					<img src="<?php the_field('logo', 'option'); ?>" alt="Adamson Ahdoot Logo" />
					</a>
					<?php } ?>
				</div>
				<div class="phone-call">
					<a href="tel:<?php the_field('ppc_phone_number', 'option'); ?>" class="large-header orange" aria-label="Call us at <?php the_field('ppc_phone_number', 'option'); ?>">
						<img src="https://aa.law/wp-content/uploads/2024/04/call_3848734.webp" >
						<?php the_field('ppc_phone_number', 'option'); ?>
					</a>
					<?php if (get_locale() == 'en_US') { ?>
					<p class="medium">Available 24/7 — Hablamos Español</p>
					<?php } else { ?>
					<p class="medium">Disponible 24/7 — We speak English</p>
					<?php } ?>
					
				</div>	
				
			</div>			
		</div>	
	</header><!-- #masthead -->
