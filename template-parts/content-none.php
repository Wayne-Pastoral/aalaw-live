<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Adamson_Ahdoot
 */

?>

<div class="page-content">
    <section class="no-results not-found">
        <?php
        if ( is_home() && current_user_can( 'publish_posts' ) ) :
        ?>
            <header class="page-header">
                <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'adamson-ahdoot' ); ?></h1>
            </header><!-- .page-header -->
            
            <?php
                printf(
                    '<p>' . wp_kses(
                        /* translators: 1: link to WP admin new post page. */
                        __( 'Ready to publish your first post? <a href="%1$s" aria-label="Link to publish your first post">Get started here</a>.', 'adamson-ahdoot' ),
                        array(
                            'a' => array(
                                'href' => array(),
                                'aria-label' => array()
                            ),
                        )
                    ) . '</p>',
                    esc_url( admin_url( 'post-new.php' ) )
                );
            ?>
        
        <?php
        elseif ( is_search() ) :
        ?>
            <?php if(get_locale() == "en_US"){ ?>
                <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'adamson-ahdoot' ); ?></p>
            <?php } else { ?>
                <p><?php esc_html_e( 'Lo sentimos, pero nada coincidió con los términos de búsqueda. Vuelva a intentarlo con algunas palabras clave diferentes.', 'adamson-ahdoot' ); ?></p>
            <?php } ?>

        <?php
        else :
        ?>
            <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'adamson-ahdoot' ); ?></p>        

        <?php
        endif;
        ?>
    </section><!-- .no-results -->
</div><!-- .page-content -->
