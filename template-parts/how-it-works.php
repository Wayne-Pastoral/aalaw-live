<div class="how-it-works">
    <div class="how-it-works__container">
        <div class="how-it-works__carousel-container">
            <div class="how-it-works__carousel how-it-works--slider">
                <?php if( have_rows('how_it_works') ): ?>
                    <?php $step = 1; ?>
                    <?php while( have_rows('how_it_works') ): the_row(); 
                        $heading = get_sub_field('heading');
                        $subheading = get_sub_field('subheading');
                        $description = get_sub_field('description');
                        $image = get_sub_field('image'); // Getting the image URL
                    ?>
                        <div class="how-it-works__step">
                            <?php if( $heading ): ?>
                                <h3 class="how-it-works__heading text-center"><?php echo esc_html($heading); ?></h3>
                            <?php endif; ?>
                            <?php if( $image ): ?>
                                <img class="how-it-works__image" src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($heading); ?>">
                            <?php endif; ?>

                            <h2 class="how-it-works__step-title text-center"> 
                                <?php if (get_locale() == 'en_US') {
                                    echo 'Step';
                                } else {
                                    echo 'Paso';
                                } ?> 
                                <?php echo $step; ?>
                            </h2>

                            <?php if( $subheading ): ?>
                                <h4 class="how-it-works__subheading text-center"><?php echo esc_html($subheading); ?></h4>
                            <?php endif; ?>
                            <?php if( $description ): ?>
                                <div class="how-it-works__description text-center"><?php echo wp_kses_post($description); ?></div>
                            <?php endif; ?>
                        </div>
                        <?php $step++; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        <div class="how-it-works__btn">
            <a href="<?php 
                if (get_locale() == 'en_US') {
                    echo home_url('/our-legal-process');
                } else {
                    echo home_url('/es/nuestro-proceso-legal/');
                } ?>">
                <?php 
                if (get_locale() == 'en_US') {
                    echo 'Our Legal Process';
                } else {
                    echo 'Nuestro proceso legal';
                } ?> 
            </a>
        </div>
        </div>
    
        <div class="how-it-works__form-container">
            <div class="how-it-works__form">
                <?php if (get_locale() == 'en_US') {
                    echo do_shortcode('[gravityform id="15" title="false" ajax="true"]');
                } else {
                    echo do_shortcode('[gravityform id="5" title="true" ajax="true"]');
                } ?>
            </div>
        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function($) {
        $('.how-it-works--slider').flickity({
            contain: true,
            imagesLoaded: true,
            adaptiveHeight: false,
            setGallerySize: false,
            wrapAround: true,
            draggable: true,
            pageDots: true,
            autoPlay: false,
            prevNextButtons: false
        });
    });
</script>

<style>
    /* html[lang="es-MX"] .how-it-works {
        display: none;
    } */
    .how-it-works__btn {
        text-align: center;
        margin-bottom: 90px;
        margin-top: -41px;
        z-index: 8;
        position: relative;
    }
    .how-it-works__btn a {
        color: #fff;
        text-align: center;
        line-height: 1;
        padding: .8rem 2rem;
        transition: .2s all;
        text-decoration: none;
        font-size: 15px;
        letter-spacing: .5px;
        font-weight: 600;
        display: inline-block;
        background: #00A771;
    }
    .how-it-works__btn a:hover {
        background: #394541;
    }
    .how-it-works__container {
        display: flex;
    }
    .how-it-works__carousel-container{
        position:relative;
    }
    .how-it-works__carousel-container {
        width: 80%;
        background: #F7F6F2;
    }

    .how-it-works__form-container {
        width: 40%;
    }

    .how-it-works__carousel {
        overflow: hidden;
    }

    .text-center {
        text-align: center;
    }

    .how-it-works__heading {
        font-size: 40px;
        font-weight: 300;
        margin-bottom: 1.3rem;
    }

    .how-it-works__step-title {
        margin: 1.2rem 0 0.6rem;
        color: #00A771;
        font-size: 14px;
        font-weight: 700;
        text-transform: uppercase;
    }

    .how-it-works__subheading {
        margin: 0 0 1rem;
        font-size: 26px;
    }

    .how-it-works__description  p {
        margin: 0;
        font-size: 15px;
    }

    .how-it-works__step.is-selected {
        padding: 0 7rem;
    }

    .how-it-works .flickity-page-dots .dot {
        width: 20px;
        height: 20px;
        background: #fff;
        border: 1px solid #00A771;
        border-radius: 50%;
        opacity: 1;
    }

    .how-it-works .flickity-page-dots .dot.is-selected {
        background: #00A771;
    }

    .how-it-works__image {
        display: block;
        margin: 0 auto;
        width: 130px;
        max-width: 100%;
        object-fit: contain;
    }

    .how-it-works .carousel {
        width: 100%;
        margin: 0 auto;
    }

    .how-it-works .carousel-cell {
        width: 100%;
        height: auto;
    }

    .how-it-works .carousel-cell-img {
        width: 100%;
        height: auto;
    }

    .how-it-works .flickity-viewport {
        height: 100%;
        padding-top:56.25%;
        overflow: visible;
    }

    .how-it-works .flickity-slider{
        margin-top: -58%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .how-it-works .flickity-page-dots {
        bottom: 14%;
        display: flex;
        justify-content: center;
    }

    .how-it-works__form-container {
        background-image: url(https://env-adamsonahdoot-staging2024.kinsta.cloud/wp-content/uploads/2024/06/Free-Case-Review-4.png);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        padding: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .how-it-works__form {
        width: 100%;
        height: auto;
    }

    .how-it-works .gform_wrapper.gravity-theme .gfield_label {
        margin-bottom: 6px;
        color: #fff;
        font-weight: 600;
    }

    .how-it-works div.contact-form-english_wrapper.gform_wrapper .gform_footer {
        padding: 14px 0 0;
    }

    .how-it-works div.contact-form-english_wrapper.gform_wrapper .gform_footer input {
        text-transform: none;
    }

    .how-it-works .gform_wrapper.gravity-theme .contact-form-english .validation_message,.how-it-works .gform_wrapper.gravity-theme .contact-form-spanish .validation_message {
        color: #fff;
    }

    .how-it-works .gform_wrapper .gfield_required {
        color: #fff;
    }

    @media (width: 1920px) and (height: 1080px) {
        html[lang="es-MX"] .how-it-works__btn {
            margin-top: -60px;
        }
    }

    @media (width: 1366px) and (height: 768px) {
        body .how-it-works .flickity-page-dots {
            bottom: 4%;
        }

        .how-it-works__btn {
            margin-bottom: 90px;
            margin-top: -4px;
        }
    }

    @media only screen and (max-width: 1720px) {
        .how-it-works .flickity-page-dots {
            bottom: 10%;
        }
    }

    @media only screen and (max-width: 1540px) {
        .how-it-works .flickity-page-dots {
            bottom: 6%;
        }
    }

    @media only screen and (max-width: 1440px) {
        .how-it-works .flickity-page-dots {
            bottom: 10%;
        }

        .how-it-works__carousel {
            padding-top: 2rem;
            padding-bottom: 2rem;
        }
    }
    @media only screen and (max-width: 1300px) {
        .how-it-works__btn {
            margin-top: 41px !important;
        }
    }
    @media only screen and (max-width: 1360px) {
        .how-it-works .flickity-page-dots {
            bottom: 10%;
        }

        .how-it-works__carousel {
            padding-top: 4rem;
            padding-bottom: 4rem; 
        }
    }

    @media only screen and (max-width: 1280px) {
        .how-it-works .flickity-page-dots {
            bottom: 6%;
        }
    }

    @media only screen and (max-width: 1180px) {
        .how-it-works .flickity-page-dots {
            bottom: 4%;
        }
    }
    
    @media (min-width:999px) and (max-width:1024px){
        html[lang="es-MX"] .how-it-works .flickity-page-dots {
            bottom: 0;
        }

        html[lang="es-MX"] .how-it-works__btn {
            margin-top: 20px !important;
            margin-bottom: 20px;
        }

        html[lang="es-MX"] .how-it-works__carousel {
            padding-top: 7rem;
            padding-bottom: 7rem;
        }
    }

    @media only screen and (max-width: 1024px) {
        .how-it-works__carousel {
            padding-top: 6rem;
            padding-bottom: 6rem;
        }

        .how-it-works__form-container {
            padding: 50px 20px;
        }

        .how-it-works__step.is-selected {
            padding: 0 3rem;
        }

        .how-it-works .flickity-page-dots {
            bottom: 2%;
        }

        .how-it-works__carousel {
            overflow: hidden;
        }

        .how-it-works .flickity-viewport {
            overflow: visible;
        }
        .how-it-works__btn {
            margin-top: 22px;
        }
    }

    @media only screen and (max-width: 920px) {
        .how-it-works .flickity-page-dots {
            bottom: 0;
        }
    }

    @media only screen and (max-width: 900px) {
        .how-it-works__carousel {
            padding-top: 10rem;
            padding-bottom: 10rem;
        }
    }

    @media only screen and (max-width: 820px) {
        .how-it-works .flickity-page-dots {
            bottom: 0;
        }
    }

    @media (min-width:767px) and (max-width:768px){
        html[lang="es-MX"] .how-it-works__carousel {
            padding-top: 5rem;
            padding-bottom: 4rem;
        }

        html[lang="es-MX"] .how-it-works__btn {
            margin-top: 6px !important;
            margin-bottom: 3rem;
        }
    }

    @media only screen and (max-width: 768px) {
        .how-it-works__container {
            flex-direction: column;
        }

        .how-it-works__carousel-container,
        .how-it-works__form-container {
            width: 100%;
        }

        .how-it-works__form-container {
            background-position: top center;
            padding: 8rem 50px;
        }

        .how-it-works__carousel {
            padding-top: 2rem;
            padding-bottom: 4rem;
        }

        .how-it-works .flickity-page-dots {
            bottom: 3%;
        }
    }

    @media only screen and (max-width: 600px) {
        .how-it-works__form-container {
            background-position: top center;
            padding: 50px 25px;
        }

        .how-it-works__carousel {
            padding-top: 14rem;
            padding-bottom: 18.7rem;
        }

        html[lang="es-MX"] .how-it-works__carousel {
            padding-top: 15.5rem;
            padding-bottom: 21rem;
        }

        html[lang="es-MX"] .how-it-works__btn {
            bottom: -38px;
        }

        html[lang="es-MX"] .how-it-works .flickity-page-dots {
            bottom: 4%;
        }

        .how-it-works__heading {
            font-size: 26px;
        }

        .how-it-works__image {
            width: 110px;
        }
        .how-it-works__btn {
            position: absolute;
            bottom: -29px;   /* Position it at the vertical center */
            left: 50%; /* Position it at the horizontal center */
            transform: translate(-50%, -50%); /* Adjust for the button's width and height */
        }
        .how-it-works__btn a{
            padding: .8rem 1rem;
        }

      
    }

    @media only screen and (max-width: 390px) {
        .how-it-works__step.is-selected {
            padding: 0 20px;
        }

        .how-it-works__carousel {
            padding-top: 18rem;
            padding-bottom: 20rem;
        }

        html[lang="es-MX"] .how-it-works__btn {
            bottom: -38px;
            width: 100%;
        }

        html[lang="es-MX"] .how-it-works__carousel {
            padding-top: 19rem;
            padding-bottom: 26rem;
        }
    }

    @media only screen and (max-width: 320px) {
        .how-it-works .flickity-page-dots {
            bottom: 6%;
        }
    }

</style>