<?php /* Template Name: Custom Facebook Form */ ?>
<?php get_header(); ?>

<main id="primary" class="site-main">
    <div class="form-contianer">
        <div class="form-contianer__logo">
            <a href="<?php echo home_url(); ?>">
                <img src="https://aa.law/wp-content/uploads/2024/10/AA-logo.png" alt="Site Logo">
            </a>
        </div>
        <div class="form-contianer__main">
            <button class="close-form-btn" aria-label="Close form"><img src="https://aa.law/wp-content/uploads/2024/10/x.png" alt="Cross Icon"></button>
            <?php gravity_form(18, false, false, false, '', true); ?>
        </div>
    </div>

    <div id="confirmationModal" class="form-container__confirmation-modal">
        <div class="form-container__confirmation-modal-content">
            <div class="form-contianer__logo">
                <a href="<?php echo home_url(); ?>">
                    <img src="https://aa.law/wp-content/uploads/2024/10/AA-logo.png" alt="Site Logo">
                </a>
            </div>
            <h3>Are you sure you don't need help?</h3>
            <div class="form-contianer__buttons">
                <button id="confirmYes" class="form-contianer__button">Yes</button>
                <button id="confirmNo" class="form-contianer__button">No</button>
            </div>
        </div>
    </div>
</main>

<style>
    #facebook-page {
        overflow-y: hidden;
    }


    .page-template-page-facebook .form-contianer.form-contianer--submitted {
        padding: 0;
    }

    .custom-confirmation-message__logo {
        margin-bottom: 1rem;
    }

    .form-contianer__buttons {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        margin-top: 1.5rem;
    }

    .custom-confirmation-message__main-image {
        height: 100%;
        object-fit: cover;
    }

    .custom-confirmation-message__phone-number {
        color: #00A771;
        text-decoration: none;
        font-weight: 600;
    }

    .form-contianer__button {
        width: 100%;
        cursor: pointer;
    }

    .close-form-btn:hover {
        background: none;
        color: #000;
        opacity: 0.8;
    }

    .form-contianer .gf_progressbar {
        max-width: 93%;
    }

    .custom-form__label {
        text-align: center;
        margin-top: 5px;
    }

    .form-container__confirmation-modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: #F7F6F2;
        justify-content: center;
        align-items: center;
    }

    .form-contianer--submitted .form-contianer__logo,
    .form-contianer--submitted .close-form-btn {
        display: none;
    }

    .form-container__confirmation-modal-content {
        background-color: #fff;
        padding: 2rem;
        border-radius: 5px;
        text-align: center;
        min-width: 700px;
    }

    #input_18_33 label {
        font-weight: 700;
        text-transform: uppercase;
        margin-bottom: 10px;
    }

    .page-template-page-facebook .gform_wrapper.gravity-theme .gfield_required {
        color: #000;
        padding: 0;
    }

    .page-template-page-facebook .gf_progressbar_percentage.percentbar_blue.percentbar_100 {
        width: 98% !important;
    }

    .close-form-btn {
        padding: 0;
        background-color: transparent;
        border: none;
        font-size: 24px;
        font-weight: 400;
        cursor: pointer;
        position: absolute;
        top: -4px;
        right: 0;
        color: #000;
        margin-top: -5px;
    }

    .form-contianer__main {
        position: relative;
    }

    .custom-confirmation-message {
        display: flex;
    }

    .custom-confirmation-message__column {
        width: 50%;
    }

    .custom-confirmation-message__message p {
        margin: 0;
    }

    .custom-confirmation-message__alert {
        background: #DCEDE7;
        display: flex;
        gap: 10px;
        justify-content: center;
        padding-top: 5px;
        padding-bottom: 5px;
        margin-bottom: 15px;
        margin-top: 20px;
    }

    #close-button {
        width: 100%;
        cursor: pointer;
    }

    .custom-confirmation-message__alert span {
        font-size: 14px;
        color: #00A771;
    }

    .custom-confirmation-message__column--right {
        display: flex;
        align-items: center;
        padding: 40px 20px;
    }

    .page-template-page-facebook #masthead,
    .page-template-page-facebook .site-footer,
    .page-template-page-facebook .gform_next_button,
    .page-template-page-facebook .gform_previous_button  {
        position: absolute;
        top: -100%;
        visibility: hidden;
    }

    .page-template-page-facebook #gform_page_18_4 fieldset {
        max-width: 100% !important;
    }

    .page-template-page-facebook .gform_wrapper.gravity-theme #gform_page_18_4  .gfield {
        min-width: unset;
    }

    #gform_submit_button_18 {
        width: 100%;
        cursor: pointer;
        margin-left: 0;
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

    .page-template-page-facebook h4 {
        text-align: center;
        margin-top: 1rem;
        margin-bottom: 0.5rem;
    }

    .page-template-page-facebook .site-main {
        padding-top: 5rem;
        padding-bottom: 5rem;
    }

    .page-template-page-facebook {
        background: #F7F6F2;
    }

    .page-template-page-facebook .gform_page_footer.top_label {
        display: flex;
        justify-content: center;
        flex-direction: column;
        position: relative;
    }

    .page-template-page-facebook #gform_page_18_4 .gform_ajax_spinner {
        bottom: -25px;
    }

    .page-template-page-facebook .gform_wrapper.gravity-theme .gfield-choice-input+label {
        cursor: pointer;
    }

    .page-template-page-facebook .gform_page_footer.top_label img {
        width: 50px;
        display: block;
        margin-inline: auto;
    }

    .page-template-page-facebook .gform_ajax_spinner {
        position: absolute;
        left: 50%;
        transform: translate(-50%, 15px);
    }

    .page-template-page-facebook .gform_heading .gform_required_legend {
        display: none;
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
        max-width: 460px;
        object-fit: contain;
        width: 100%;
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

    .custom-form__image {
        max-width: 100%;
        width: 115px;
    }

    .custom-form__image-2 {
        max-width: 100%;
        width: 90px; 
    }

    .page-template-page-facebook .gform_wrapper.gravity-theme .gf_progressbar_percentage {
        height: 14px;
    }

    @media only screen and (max-width: 600px) {
        .page-template-page-facebook .gform_wrapper.gravity-theme .gfield {
            min-width: 70%;
        }

        .page-template-page-facebook .gfield_radio {
            flex-direction: column;
        }

        .form-contianer .gf_progressbar {
            max-width: 85%;
        }

        .page-template-page-facebook .gf_progressbar_percentage.percentbar_blue.percentbar_100 {
            width: 94% !important;
        }

        #facebook-page {
            overflow-y: unset;
        }

        .form-container__confirmation-modal-content {
            min-width: auto;
        }

        .page-template-page-facebook .form-contianer,
        .form-container__confirmation-modal-content {
            margin: 0 20px;
        }

        .form-container__confirmation-modal-content {
            padding: 2rem 1.5rem;
        }

        .form-contianer__buttons {
            gap: 10px;
        }

        .page-template-page-facebook .form-contianer {
            padding: 2rem 1.5rem;
        }
    }
</style>

<script>
    jQuery(document).ready(function($) {

        $('.close-form-btn').on('click', function() {
            $('#confirmationModal').css('display', 'flex');
        });

        $('#confirmYes').on('click', function() {
            window.location.href = '/';
        });

        $('#confirmNo').on('click', function() {
            $('#confirmationModal').hide();
        });
        
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