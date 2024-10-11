<?php /* Template Name: Custom Facebook Form */ ?>
<?php get_header(); ?>

<main id="primary" class="site-main">
    <div class="form-contianer">
        <div class="form-contianer__logo">
            <img src="https://aa.law/wp-content/uploads/2024/10/image-1.png" alt="Site Logo">
        </div>
        <?php  gravity_form( 18, false, false, false, '', true ); ?>
    </div>
</main>

<style>
    .page-template-page-facebook #masthead,
    .page-template-page-facebook .site-footer,
    .page-template-page-facebook .gform_next_button,
    .page-template-page-facebook .gform_previous_button  {
        position: absolute;
        top: -100%;
        visibility: hidden;
    }

    .page-template-page-facebook .gform_heading,
    .page-template-page-facebook .gf_progressbar_title,
    .page-template-page-facebook .gf_progressbar_percentage span {
        display: none;
    }

    .page-template-page-facebook .form-contianer {
        max-width: 835px;
        display: block;
        margin-inline: auto;
        background: #fff;
        padding: 2rem;
    }

    .page-template-page-facebook .gform_wrapper.gravity-theme .gf_progressbar_percentage span {
        display: none;
    }
    .page-template-page-facebook h3 {
        text-align: center;
        margin-top: 1rem;
        margin-bottom: 0.5rem;
    }

    

    .page-template-page-facebook .site-main {
        padding-top: 5rem;
        padding-bottom: 5rem;
        background: #F7F6F2;
    }

    .page-template-page-facebook .gform_page_footer.top_label {
        display: flex;
        justify-content: center;
    }

    .page-template-page-facebook .gform_page_footer.top_label img {
        width: 50px;
    }

    .page-template-page-facebook .gform_wrapper.gravity-theme fieldset {
        margin: auto;
    }

    .page-template-page-facebook .gfield_radio {
        display: flex;
        justify-content: space-between;
        gap: 20px;
    }

    .page-template-page-facebook .form-contianer__logo img {
        display: block;
        margin-inline: auto;
        margin-bottom: 2rem;
    }

    .page-template-page-facebook .gform-field-label {
        cursor: pointer;
    }

    .page-template-page-facebook .gchoice {
        width: 100%;
        border: 1px solid #CDCDC9;
        padding: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .page-template-page-facebook .gchoice:hover {
        background: #F7F6F3;
        box-shadow: 0 0 0 2px #00A871;
        border: unset;
    }

    .page-template-page-facebook .gchoice:hover img {
        filter: brightness(0) saturate(100%) invert(63%) sepia(69%) saturate(6545%) hue-rotate(137deg) brightness(95%) contrast(101%);
    }

    .page-template-page-facebook .gform_wrapper.gravity-theme .gfield {
        min-width: 410px;
    }

    .page-template-page-facebook .gfield-choice-input {
        position: absolute;
        visibility: hidden;
    }

    .custom-form__image-container img {
        display: block;
        margin-inline: auto;
        object-fit: contain;
    }

    .page-template-page-facebook .gform_wrapper.gravity-theme .gf_progressbar_percentage {
        height: 14px;
    }
</style>

<script>
    jQuery(document).ready(function($) {
        var formId = 18; // Replace with your form ID

        // Function to move to the next page
        function goToNextPage(formId) {
            var $form = $('#gform_' + formId);
            var currentPage = parseInt($form.find('input[name="gform_source_page_number_' + formId + '"]').val());
            var targetPage = currentPage + 1;
            $form.find('input[name="gform_target_page_number_' + formId + '"]').val(targetPage);
            $form.trigger('submit', [true]);

            // After page load, set focus
            $(document).one('gform_page_loaded', function(event, form_id, current_page) {
                if (form_id == formId && current_page == targetPage) {
                    $('#gform_page_' + formId + '_' + current_page + ' input, #gform_page_' + formId + '_' + current_page + ' select, #gform_page_' + formId + '_' + current_page + ' textarea').filter(':visible:first').focus();
                }
            });
        }

        // Function to attach event listeners to radio buttons
        function attachRadioButtonListeners(formId) {
            var $radioButtons = $('#gform_' + formId + ' .gfield_radio input[type="radio"]');
            // Remove existing event listeners with namespace 'autonext'
            $radioButtons.off('change.autonext');
            // Attach event listeners
            $radioButtons.on('change.autonext', function() {
                setTimeout(function() {
                    goToNextPage(formId);
                }, 100);
            });
        }

        // Attach event listeners on initial load
        attachRadioButtonListeners(formId);

        // Re-attach event listeners whenever a new page is loaded
        $(document).on('gform_page_loaded', function(event, form_id, current_page) {
            if (form_id == formId) {
                attachRadioButtonListeners(formId);
            }
        });
    });
</script>

<?php get_footer(); ?>