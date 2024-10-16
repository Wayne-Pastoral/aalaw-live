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
	
	<meta name="google-site-verification" content="eduW6n_3wbZ8aYWIXfpS5F_Fyh40j0xiVTlNwBAxXeA" />
	<?php get_template_part( 'template-parts/SDM' ); ?>
	
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
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" data-pagetitle='<?php echo !is_404() ? get_the_title($post->ID) : '' ?>' class="site 
	<?php if(is_singular( 'attorneys' )) { ?>white-header<?php } ?>
">

	<header id="masthead" class="site-header">
		<?php if(is_singular( 'ppc-site' )) { ?>
			<?php } else { ?>
		<div class="languages">
		<div class="container wide">
			<div class="row justify-content-end align-items-center">
				<?php pll_the_languages( array( 'dropdown' => 1 ) ); ?>
				<?php if ( is_singular( 'ppc-site' ) ) { ?>
				<a href="tel:<?php the_field('ppc_phone_number', 'option'); ?>" class="phone" aria-label="Call <?php the_field('ppc_phone_number', 'option'); ?>">
					<?php the_field('ppc_phone_number', 'option'); ?>
				</a>
				<?php } else { ?>
				<a href="tel:<?php the_field('phone_number', 'option'); ?>" class="phone" aria-label="Call <?php the_field('phone_number', 'option'); ?>">
					<?php the_field('phone_number', 'option'); ?>
				</a>
				<?php } ?>
			</div>
		</div>
		</div>
		<?php } ?>
		<div class="container wide">
			<div class="row align-content-center align-items-center">
				<?php if(is_singular( 'ppc-site' )) { ?>
				<div class="logo">
					<img src="<?php the_field('logo', 'option'); ?>" alt="Adamson Ahdoot Logo" />
				</div>
				<?php } else { ?>
				<?php if (get_locale() == 'en_US') { ?>
					<a href="<?php echo site_url(); ?>" class="logo" aria-label="Adamson Ahdoot Homepage">
					<?php } else { ?> 
					<a href="https://aa.law/es" class="logo" aria-label="Adamson Ahdoot Spanish Homepage">
					<?php } ?>
					<img src="<?php the_field('logo', 'option'); ?>" alt="Adamson Ahdoot Logo" />
				</a>
				<?php } ?>
				
				<?php if(is_singular( 'ppc-site' )) { ?>
				<div class="phone-call">
					<div class="caps white">Free consultation 24/7</div>
					<?php if ( is_singular( 'ppc-site' ) ) { ?>
					<a href="tel:<?php the_field('ppc_phone_number', 'option'); ?>" class="phone" aria-label="Call <?php the_field('ppc_phone_number', 'option'); ?>">
						<?php the_field('ppc_phone_number', 'option'); ?>
					</a>
					<?php } else { ?>
					<a href="tel:<?php the_field('phone_number', 'option'); ?>" class="phone" aria-label="Call <?php the_field('phone_number', 'option'); ?>">
						<?php the_field('phone_number', 'option'); ?>
					</a>
					<?php } ?>
				</div>
				<?php } else { ?>
				
					<nav id="site-navigation" class="main-navigation">
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" aria-label="Menu">
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						</button>
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
								'walker'         => new Custom_Aria_Walker(),  // Apply the custom walker here
							)
						);
						?>
					</nav><!-- #site-navigation -->

						</div>
				</div>
				<div class="mobile-nav">
			
			<?php if (get_locale() == 'en_US') { ?>
			<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-6',
							'menu_id'        => 'mobile-nav',
							'menu'           => 'Mobile Navigation English',
							'walker'         => new Custom_Aria_Walker(),
						)
					);
					?>
				<?php } else { ?> 
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-6',
							'menu_id'        => 'mobile-nav',
							'menu'           => 'Mobile Navigation Spanish',
							'walker'         => new Custom_Aria_Walker(),
						)
					);
					?>
				<?php } ?>
				</div>
				<?php } ?>
				
	</header><!-- #masthead -->

	<?php
		if (isset($_GET['debug'])) {
			$post = get_post();
			if ($post->ID == 91) {
	?>
		<!-- Pop-up Form -->
		<div id="popup" class="popup">
			<div class="popup-content">
				<?php get_template_part('template-parts/components/multi-form'); ?>
			</div>
		</div>

		<script>
			var popup = document.getElementById('popup');
			var close = document.querySelector('#confirmYes');
			var isPopupVisible = false;

			// Check if the popup was closed before
			var popupClosed = localStorage.getItem('popupClosed');

			// Function to show the pop-up with animation
			function showPopup() {
				if (!isPopupVisible && !popupClosed) {
					popup.style.display = 'flex';
					setTimeout(function() {
						popup.classList.add('show');
					}, 10); // Slight delay to allow the display change to take effect
					isPopupVisible = true;
				}
			}

			// Show the pop-up after 15 seconds if it was not closed before
			if (!popupClosed) {
				setTimeout(showPopup, 15000);
			}

			// Show the pop-up if the user scrolls 10-15% down the page or 10-15% up from the bottom and it was not closed before
			if (!popupClosed) {
				window.addEventListener('scroll', function () {
					var scrollTop = window.scrollY;
					var scrollHeight = document.body.scrollHeight;
					var windowHeight = window.innerHeight;

					var scrollPercentTop = (scrollTop / (scrollHeight - windowHeight)) * 100;
					var scrollPercentBottom = ((scrollHeight - windowHeight - scrollTop) / (scrollHeight - windowHeight)) * 100;

					if ((scrollPercentTop >= 10 && scrollPercentTop <= 15) || (scrollPercentBottom >= 10 && scrollPercentBottom <= 15)) {
						showPopup();
					}
				});
			}

			// Close the pop-up when the user clicks the "x"
			close.addEventListener('click', function () {
				popup.classList.remove('show');
				popup.style.display = 'none';
				setTimeout(function() {
					popup.style.display = 'none';
					localStorage.setItem('popupClosed', 'true'); // Set the flag in localStorage
				}, 500); // Match the transition duration
			});

		</script>
	<?php 
			} // End of inner if block
		} // End of outer if block for 'debug' query parameter
	?>
