<?php if( have_rows('attorneys') ): ?>
    <?php while( have_rows('attorneys') ): the_row(); ?>
        <section class="attorneys bg-cream" aria-label="Attorneys Section">
			<div class="container container--full">
				<div class="row justify-content-center reveal-up-all content">
					<div class="grid-12 copy text-center">
						<?php if(is_front_page()){ ?>
							<?php if(get_locale() == "en_US"){ ?>
								<h2 class="thin text-center">
									<div>
										<span class="text-highlight">Experienced Personal Injury Lawyers in Los Angeles</span>
									</div>
									<div>
										Meet the Adamson Ahdoot LLP Team
									</div>
								</h2>
								<p>Our team of Los Angeles personal injury lawyers at Adamson Ahdoot includes experienced practitioners dedicated to protecting the rights of the injured and the oppressed. We have over 100 years of collective legal experience litigating straightforward liability cases to complex wrongful death claims.</p>
								<p>When you choose Adamson Ahdoot, you're choosing a team that is aggressive in our pursuit of justice, attentive to your needs, and ambitious in our approach to achieving results. Meet some of our greatest litigators here.</p>
							<?php } else { ?>
								<h2 class="thin text-center">
									<div>
										<span class="text-highlight">Agresivos</span>. <span class="text-highlight">Ambiciosos</span>. <span class="text-highlight">Atentos</span>.
									</div>
									<div>
										Conozca al Equipo de Adamson Ahdoot LLP
									</div>
								</h2>
								<p>Nuestro equipo de abogados en Los Ángeles de Adamson Ahdoot LLP incluye profesionales experimentados dedicados a proteger los derechos de los heridos y los sojuzgados. Nuestro equipo tiene más de 100 años de experiencia legal colectiva litigando desde casos de responsabilidad sencillos hasta demandas complejas por muerte injusta.</p>
								<p>Como sus abogados de lesiones personales en Los Ángeles, le brindaremos a su reclamo la experiencia y las capacidades que necesita para lograr el resultado deseado. Conozca a algunos de nuestros mejores litigantes aquí.</p>
							<?php } ?>
						<?php } else { ?>
							<h2 class="text-center"><?php the_sub_field('headline'); ?></h2>
						<?php } ?>
					</div>
					</div>
			</div>
            <div class="container">
                <div class="row justify-content-center">
                    <style>
                        .attorneys-container2 .single-attorney {
                            width: 30%;
                            margin: 0 1.5%;
                            float: left;
                        }

                        @media only screen and (max-width: 950px) {
                            .attorneys-container2 .single-attorney {
                                width: 100%;
                            }
                        }
                    </style>
                    <?php
                    $attorneys = get_sub_field('attorney');
                    if( $attorneys ): ?>
                        <?php if ( is_singular( 'ppc-site' ) ) { ?>
                            <div class="attorneys-container" aria-label="Attorneys Carousel">
                        <?php } ?>
                        <?php foreach( $attorneys as $post ): 
                            setup_postdata($post); ?>
                            <?php if ( is_singular( 'ppc-site' ) ) { ?>
                                <a href="<?php the_sub_field('page_link'); ?>" class="single-attorney grid-3 hover-color" aria-label="View attorney profile for <?php the_title(); ?>">
                            <?php } else { ?>
                                <a href="<?php the_permalink(); ?>" class="single-attorney grid-3 reveal-up-all hover-color" aria-label="View attorney profile for <?php the_title(); ?>">
                            <?php } ?>
                                <div class="bg-forest color-panel"></div>
                                <?php the_post_thumbnail(); ?>
                                <h3><?php the_title(); ?>
                                    <div class="postion"><?= get_field( "position" ); ?></div>
                                </h3>
                            </a>
                        <?php endforeach; ?>
                        <?php wp_reset_postdata(); ?>
                        <?php if ( is_singular( 'ppc-site' ) ) { ?>
                            </div>
                            <div class="button-container grid-10 copy text-center centered-div reveal-up-all">
                                <?php if(get_locale() == "en_US"){ ?>
                                    <a href="https://aa.law/attorneys/" class="btn" aria-label="Meet our Attorneys">Meet our Attorneys</a>
                                <?php } else { ?>
                                    <a href="https://aa.law/es/abogados/" class="btn" aria-label="Conozca a nuestros Abogados">Conozca a nuestros Abogados</a>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>
