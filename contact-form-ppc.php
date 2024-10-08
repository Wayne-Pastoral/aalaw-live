<div class="form contact-form">
	<?php 
		$formdisclaimer = get_locale() == 'en_US' ? '<p class="small">By submitting this form, you agree to be contacted and recorded by Adamson Ahdoot LLP or a representative, calling or sending correspondence to your physical or electronic address, on our behalf, for any purpose arising out of or related to your case and or claim. Standard text and or usage rates may apply.</p>' : '<p class="small">Al enviar este formulario, usted acepta ser contactado y grabado por Adamson Ahdoot LLP o un representante, llamando o enviando correspondencia a su dirección física o electrónica, en nuestro nombre, para cualquier propósito que surja o esté relacionado con su caso y/o reclamo. Es posible que se apliquen tarifas de uso o mensajes de texto estándar.</p>';
		if (get_locale() == 'en_US') {
			echo do_shortcode('[gravityform id="13" title="true" ajax="true"]');
		} else {
			echo do_shortcode('[gravityform id="14" title="true" ajax="true"]');
		}

		echo $formdisclaimer;

	?>		
</div>