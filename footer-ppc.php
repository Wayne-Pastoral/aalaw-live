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

	<footer id="colophon" class="site-footer bg-black-green">
		<div class="container wide">
			<div class="row justify-content-center">
				<div class="grid-4">
					<?php if (get_locale() == 'en_US') { ?>
					<div class="logo"><a href="<?php echo site_url(); ?>"><img src="<?php the_field('logo', 'option'); ?>" alt="Adamson Ahdoot Logo" /></a></div>
					<?php } else { ?>
					<div class="logo"><a href="<?php echo site_url('es'); ?>"><img src="<?php the_field('logo', 'option'); ?>" alt="Adamson Ahdoot Logo" /></a></div>
					<?php } ?>
				</div>
			</div>
			<div class="row justify-content-center">
				<p class="small disclaimer text-center">
					<?php 
					if (get_locale() == 'en_US') { ?>
					<?php the_field('ppc_disclaimer', 'option'); ?>
					<?php } else { ?>
					<?php the_field('ppc_disclaimer_spanish', 'option'); ?>
					<?php } ?>
				</p>
			</div>
			<div class="row justify-content-center align-items-center footer-meta">
				<p class="small copyright">
					<?php 
					if (get_locale() == 'en_US') { ?>
					<?php the_field('copyright', 'option'); ?>
					<?php } else { ?>
					<?php the_field('copyright_spanish', 'option'); ?>
					<?php } ?>
				</p>
				<span style="margin-left:5px">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-3',
							'menu_id'        => 'policies-menu',
						)
					);
					?>
				</span>
			</div>
		</div>
		<?php if ( is_page_template('template-ppc-old-layout-old-colors.php') ) { ?>
		<div class="mobile-cta bg-grey">
			<?php if (get_locale() == 'en_US') { ?>
			<a href="tel:<?php the_field('ppc_phone_number','options'); ?>" aria-label="Tap to Call <?php the_field('ppc_phone_number','options'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/icon-phone-green.png">Tap to Call</a>
			<?php } else { ?>
			<a href="tel:<?php the_field('ppc_phone_number','options'); ?>" aria-label="Toca para Llamar <?php the_field('ppc_phone_number','options'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/icon-phone-green.png">Toca para Llamar</a>
			<?php } ?>
		</div>
		<?php } else { ?>
		<div class="mobile-cta bg-green">
			<?php if (get_locale() == 'en_US') { ?>
			Free Consultation
			<a href="tel:<?php the_field('ppc_phone_number','options'); ?>" class="btn white m_orange" aria-label="Call Now <?php the_field('ppc_phone_number','options'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/icon-phone.svg">Call Now</a>
			<?php } else { ?>
			Consulta Gratis
			<a href="tel:<?php the_field('ppc_phone_number','options'); ?>" class="btn white m_orange" aria-label="Llama Ahora <?php the_field('ppc_phone_number','options'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/icon-phone.svg">Llama Ahora</a>
			<?php } ?>
		</div>
		<?php } ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<?php the_field('footer_scripts', 'options'); ?>

</body>
</html>
