<?php if( have_rows('numbers_carousel') ): ?>
<?php while( have_rows('numbers_carousel') ): the_row(); ?>
<section class="numbers-carousel">
	<div class="container">
		<div class="row justify-content-center reveal-up-all">
			<div class="grid-10 copy text-center">
				
					<h2><?php the_sub_field('headline'); ?></h2>
				<div class ='content'>
					<?php if(get_locale()=="en_US"){ ?>
				<p>Adamson Ahdoot's personal injury attorneys are dedicated to helping clients secure full and fair compensation following a serious accident. From defective product claims to wrongful death settlements, Adamson Ahdoot has demonstrated a great work ethic for our previous clients.</p> 
				<p>While each case may differ, these case results showcase the excellent work Adamson Ahdoot brings to every trial it goes through. Below are some of the most remarkable case results we've secured for maximum compensation.</p>
					
				</div>
				<?php
					}else{
						?>
				<p>Los abogados de lesiones personales de Adamson Ahdoot se dedican a ayudar a los clientes a obtener una compensación completa y justa después de un accidente grave. Desde reclamos por productos defectuosos hasta acuerdos por muerte injusta, Adamson Ahdoot ha demostrado una gran ética de trabajo para nuestros clientes anteriores.</p> 
				<p>Mientras cada caso puede diferir, los resultados de estos casos muestran el excelente trabajo que Adamson Ahdoot aporta a cada juicio por el que pasa. A continuación se presentan algunos de los resultados de casos más notables que hemos logrado para obtener la máxima compensación.</p>
				</div>
						<?php
					} ?>
				
			</div>
			</div>
		</div>
		<div class="row justify-content-center reveal-up-all">
			<div class="numbers-contain">
				<?php if( have_rows('number_group') ): ?>
				<?php while( have_rows('number_group') ): the_row(); ?>
				<?php if( get_sub_field('page_link') ) { ?>
				<a href="<?php the_sub_field('page_link'); ?>" class="grid-3">
				<?php } else { ?>
				<div class="grid-3">
				<?php } ?>
					<div class="number text-center">$<span><?php the_sub_field('number'); ?></span></div>
					<div class="caps green text-center"><?php the_sub_field('headline'); ?></div>
				<?php if( get_sub_field('page_link') ) { ?>
				</a>
				<?php } else { ?>
				</div>
				<?php } ?>
				
				<?php endwhile; endif; ?>
			</div>
			<div class="showbtn row justify-content-center reveal-up-all">
				
				<?php if(get_locale() == "en_US"){?>
				<h2>Practice Areas</h2>
			<p>Adamson Ahdoot LLP believes that every person has the right to seek justice regardless of their status. Hence, we've made it our mission to ensure that our team of personal injury lawyers is proficient in taking various personal injury cases. </p>
			<p>Check out some of the other injuries and liabilities our Los Angeles practice handles. Our legal team has extensive knowledge of California laws, including its latest issues and developments.</p>
				<a href="<?php echo get_the_permalink(9) ?>"  class="btn">View All Personal Injuries</a> 
				<?php }else{ ?>
				<h2>Areas de Práctica</h2>
			<p>Adamson Ahdoot LLP cree que toda persona tiene derecho a buscar justicia independientemente de su estado. Por lo tanto, nuestra misión es garantizar que nuestro equipo de abogados de lesiones personales sea eficaz para tomar varios casos de lesiones personales.</p>
			<p>Vea algunas de las otras lesiones y responsabilidades que maneja nuestra práctica en Los Ángeles. Nuestro equipo legal tiene un amplio conocimiento de las leyes de California, incluyendo los últimos temas y desarrollos.</p>
				<a href="<?php echo get_the_permalink(4470) ?>"  class="btn">Ver Todas Las Lesiones Personales </a> 
				<?php }?>
				
			
				<?php if(get_locale() == "en_US"){ ?>
 					<a href="<?php echo get_the_permalink(5876) ?>"  class="btn">View All Common Accidents</a>
				<?php }else{ ?>
					<a href="<?php echo get_the_permalink(18610) ?>"  class="btn">Ver Todos Los Accidentes Comunes</a> 
				<?php } ?>
				
			
			</div>
		</div>
	</div>
</section>
<?php endwhile; endif; ?>
