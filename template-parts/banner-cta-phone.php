<section class="banner-cta bg-lt-green">
	<div class="container">
		<div class="row justify-content-center align-items-center">
			<?php if (get_locale() == 'en_US') { ?>
			<p><?php the_field('cta_banner_english', 'options'); ?> <a href="tel:<?php the_field('phone_number', 'option'); ?>"><?php the_field('phone_number', 'option'); ?></a><span>Se Habla Español</span></p>
			<?php } else { ?>
			<p><?php the_field('cta_banner_spanish', 'options'); ?> <a href="tel:<?php the_field('phone_number', 'option'); ?>"><?php the_field('phone_number', 'option'); ?></a><span>We Speak English</span></p>
			<?php } ?>
		</div>
	</div>
</section>