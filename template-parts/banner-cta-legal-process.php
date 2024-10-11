<section class="banner-cta-legal-process bg-lt-green">
	<div class="container">
		<div class="row justify-content-center align-items-center">
			<?php if (get_locale() == 'en_US') { ?>
            <div class="banner-cta-legal-process__content">
                <p class="banner-cta-legal-process__heading">Confidently navigate your claim's journey with our Los Angeles personal injury firm.</p>
                <p class="banner-cta-legal-process__description">We understand that every case is unique, but our expertise ensures reliable guidance at every step. Rely on our experienced team for tailored support that suits your unique situation. Contact Adamson Ahdoot today at <a data-calltrk-noswap href="tel:(800) 310-1606" aria-label="Call (800) 310-1606">(800) 310-1606</a> to start your journey toward fair compensation and peace of mind.</p>
            </div>
			<?php } else { ?>
			<p class="banner-cta-legal-process__heading"><?php the_field('cta_banner_spanish', 'options'); ?> <a data-calltrk-noswap href="tel:(800) 310-1606" aria-label="Llamar al (800) 310-1606">(800) 310-1606</a><span>We Speak English</span></p>
			<?php } ?>
		</div>
	</div>
</section>
