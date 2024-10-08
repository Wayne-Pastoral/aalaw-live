<div class="form contact-form">
	<?php 
		
		$formdisclaimer = get_locale() == 'en_US' ? '<p class="small">By submitting this form, you agree to be contacted and recorded by Adamson Ahdoot LLP or a representative, calling or sending correspondence to your physical or electronic address, on our behalf, for any purpose arising out of or related to your case and or claim. Standard text and or usage rates may apply.</p>' : '<p class="small">Al enviar este formulario, usted acepta ser contactado y grabado por Adamson Ahdoot LLP o un representante, llamando o enviando correspondencia a su dirección física o electrónica, en nuestro nombre, para cualquier propósito que surja o esté relacionado con su caso y/o reclamo. Es posible que se apliquen tarifas de uso o mensajes de texto estándar.</p>';

		if (
			is_singular('case_results') || 
			is_page('attorneys') || 
			is_page( 4429 )
		) {
			
			if (is_page('attorneys') || is_page( 4429 )) {
				echo '<h2 class="text-center">'.get_sub_field('headline').'</h2>';
				$formsubheadline = get_locale() == 'en_US' ? 'Connect with an Attorney at Our Firm' : 'Conectar con un abogado en nuestra firma';
				echo '<h3 class="text-center">'.$formsubheadline.'</h3>';
			} else {
				$headline = get_locale() == 'en_US' ? 'Turn to an experienced law firm equipped to handle cases throughout California.' : 'Acuda a un bufete de abogados con experiencia equipado para manejar casos en todo California.';
				echo '<h2>'.$headline.'</h2>';
			}
	
		} else {
			
			$formtitle = get_locale() == 'en_US' ? '<h3>Free Case Review</h3>' : '<h3>Reciba Su Consulta Gratis</h3>' ;
	?>
			<h3><?php echo $formtitle ?></h3>
	<?php
		}

		if (get_locale() == 'en_US') {
			echo do_shortcode('[gravityform id="4" title="true" ajax="true"]');
		} else {
			echo do_shortcode('[gravityform id="5" title="true" ajax="true"]');
		}

		echo $formdisclaimer;

	?>		
</div>