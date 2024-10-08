<section class="pages-cta" id="page_cta-banner">
    <div class="row">
        <div class="single-page">
             <div class="copy text-center">
                 <?php if (get_locale() == 'en_US') { ?>
			<p class="contact-number"><?php the_field('cta_banner_english', 'options'); ?> <a href="tel:(424) 392-7649">(424) 392-7649</a></p>
			<?php } else { ?>
			<p class="contact-number"><?php the_field('cta_banner_spanish', 'options'); ?> <a href="tel:(424) 392-7649">(424) 392-7649</a></p>
			<?php } ?>
            </div>
			<div class="shedule-consiltation">
					<a href="https://aa.law/contact-us/"><i class="fa-solid fa-phone"></i> <?php if (get_locale() == 'en_US') { ?> Schedule Consultation	<?php } else {  ?>Agendar Consulta    <?php } ?></a>
			</div>
		
           
                 </div>
        <div class="single-page second-single">
            <div class="copy text-center">
				<span class="top-part"><?php if (get_locale() == 'en_US') { ?>Connect with an Attorney<?php } else {  ?>Conéctese Con un Abogado<?php } ?></span>
				<h2><?php if (get_locale() == 'en_US') { ?>Fill Out the Form Below <?php } else {  ?> Llene el Siguiente Formulario<?php } ?></h2>
                <?php 	// echo do_shortcode('[gravityform id="15" title="true" ajax="true"]'); 
				 if (get_locale() == 'en_US') { 
					echo do_shortcode('[gravityform id="9" title="true" ajax="true"]');
				} else {
					echo do_shortcode('[gravityform id="16" title="true" ajax="true"]');
				 }
				?>
				<p class="connect-attorney-form">
					<?php  if (get_locale() == 'en_US') { ?>
				By submitting this form, you agree to be contacted and recorded by Adamson Ahdoot LLP or a representative, affiliates, etc., calling or sending 							correspondence to your physical or electronic address, on our behalf, for any purpose arising out of or related to your case and or claim. Standard text and or usage rates may apply.
						<?php	} else { ?>
					Al enviar este formulario, usted acepta ser contactado y grabado por Adamson Ahdoot LLP o un representante, llamando o enviando correspondencia a su dirección física o electrónica, en nuestro nombre, para cualquier propósito que surja o esté relacionado con su caso y/o reclamo. Es posible que se apliquen tarifas de uso o mensajes de texto estándar.
				<?php	}?>
				</p>
			
                </div>
             </div>
                <div class="single-page  single-with-background" >
					<div class="copy text-center">
					     <img src="https://aa.law/wp-content/uploads/2024/06/AdobeStock_566632321-1-1.png" alt="A person in a suit confidently shaking hands with someone else in an office, possibly discussing a personal injury lawsuit in Los Angeles and expressing confidence that they can win.">
					   </div>
			
				</div>
			</div>
		</section>
