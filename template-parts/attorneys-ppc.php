<?php if (have_rows('attorneys')): ?>
    <?php while (have_rows('attorneys')): the_row(); ?>
        <?php  
        $attorneys = get_sub_field('attorney');
        // Count the number of published posts
        $publish_count = 0;
        foreach ($attorneys as $post) {
            if (get_post_status($post->ID) == 'publish') {
                $publish_count++;
            }
        }

        if ($publish_count > 0):
        ?>

        <section class="attorneys bg-cream" aria-label="Attorneys Section">
            <div class="container">
                <div class="row justify-content-center reveal-up-all content">
                    <?php if (is_front_page()): ?>
                        <?php if (get_locale() == "en_US"): ?>
                            <h2 class="thin text-center">
                                <div>
                                    <span class="text-highlight">Aggressive</span>. <span class="text-highlight">Ambitious</span>. <span class="text-highlight">Attentive</span>.
                                </div>
                                <div>
                                    Meet the Adamson Ahdoot LLP Team
                                </div>
                            </h2>
                            <p>Our team of Los Angeles lawyers at Adamson Ahdoot LLP includes experienced practitioners dedicated to protecting the rights of the injured and the oppressed. Our team has over 100 years of collective legal experience litigating straightforward liability cases to complex wrongful death claims. As your Los Angeles personal injury lawyers, we will provide your claim with the experience and skills you need to achieve your desired outcome. Meet some of our greatest litigators here.</p>
                        <?php else: ?> 
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
                        <?php endif; ?>
                    <?php else: ?>
                        <h2 class="text-center"><?php the_sub_field('headline'); ?></h2>
                    <?php endif; ?>
                </div>
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
                    // Determine the container class based on the count
                    $container_class = ($publish_count <= 3) ? 'attorneys-container--no-slider' : 'attorneys-container';
                    ?>
                    <?php if (is_singular('ppc-site')): ?>
                        <div id="attorneys-container" class="ppc-site <?php echo $container_class; ?>" data-initial-class="<?php echo $container_class; ?>" aria-label="Attorneys Carousel">
                    <?php else: ?>
                        <div id="attorneys-container" class="<?php echo $container_class; ?>" data-initial-class="<?php echo $container_class; ?>" aria-label="Attorneys Carousel">
                    <?php endif; ?>

                    <?php foreach ($attorneys as $post):
                        setup_postdata($post);
                        $id = $post->ID;
                        $post_status = get_post_status($id);

                        if ($post_status == 'publish'): ?>
                            <?php if (is_singular('ppc-site')): ?>
                                <a href="<?php the_sub_field('page_link'); ?>" class="single-attorney grid-3 hover-color" aria-label="View attorney profile for <?php the_title(); ?>">
                            <?php else: ?>
                                <a href="<?php the_permalink(); ?>" class="single-attorney grid-3 reveal-up-all hover-color" aria-label="View attorney profile for <?php the_title(); ?>">
                            <?php endif; ?>
                                <div class="bg-forest color-panel"></div>
                                <?php the_post_thumbnail(); ?>
                                <h3><?php the_title(); ?></h3>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <?php wp_reset_postdata(); ?>
                    </div>
                    <?php if (is_singular('ppc-site')): ?>
                        <div class="button-container grid-10 copy text-center centered-div reveal-up-all">
                            <?php if (get_locale() == "en_US"): ?>
                                <a href="https://aa.law/attorneys/" class="btn" aria-label="Meet our Attorneys">Meet our Attorneys</a>
                            <?php else: ?>
                                <a href="https://aa.law/es/abogados/" class="btn" aria-label="Conozca a nuestros Abogados">Conozca a nuestros Abogados</a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <script>
        document.addEventListener('DOMContentLoaded', function () {
            function updateContainerClass() {
                var container = document.getElementById('attorneys-container');
                if (container) {
                    var initialClass = container.getAttribute('data-initial-class');

                    // Always use 'attorneys-container' if the viewport is <= 900px
                    if (window.innerWidth <= 900) {
                        container.className = 'ppc-site attorneys-container';
                    } else {
                        container.className = 'ppc-site ' + initialClass;
                    }
                }
            }

            // Run on load
            updateContainerClass();

            // Run on resize
            window.addEventListener('resize', updateContainerClass);
        });
        </script>

        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
