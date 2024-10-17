<div class="form-container">
    <div class="form-container__main">
        <button class="close-form-btn" aria-label="Close form"><img src="https://aa.law/wp-content/uploads/2024/10/x.png" alt="Cross Icon"></button>
        <?php gravity_form(18, false, false, false, '', true); ?>
    </div>
</div>

<div id="confirmationModal" class="form-container__confirmation-modal">
    <div class="form-container__confirmation-modal-content">
        <div class="form-container__logo">
            <a href="<?php echo home_url(); ?>">
                <img src="https://aa.law/wp-content/uploads/2024/10/AA-logo.png" alt="Site Logo">
            </a>
        </div>
        <h3>Are you sure you don't need help?</h3>
        <div class="form-container__buttons">
            <button id="confirmYes2" class="form-container__button">Yes</button>
            <button id="confirmNo" class="form-container__button">No</button>
        </div>
    </div>
</div>

<!-- New Thank You Modal -->
<div id="thankYouModal" class="thank-you-modal">
    <div class="thank-you-modal__content">
        <div class="thank-you-modal__image-container">
            <img class="thank-you-modal__image" src="https://aa.law/wp-content/uploads/2024/10/Frame-383.png" alt="Thank You Image" />
        </div>
        <div class="thank-you-modal__content-container">
            <h4>Thank you.<br> Expect to hear from us shortly. <br>Please call <strong><a class="thank-you-modal__phone-number" data-calltrk-noswap="" href="tel:18003101606">(800) 310-1606</a></strong> if you find yourself in need of legal representation.</h4>
            <button id="closeThankYou" class="thank-you-modal__close-button">Close</button>
        </div>
    </div>
</div>

<style>
    /* Styling for the Thank You Modal */
    .thank-you-modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        justify-content: center;
        align-items: center;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .thank-you-modal__content {
        background-color: #fff;
        border-radius: 5px;
        text-align: center;
        max-width: 590px;
    }

    .thank-you-modal__content-container {
        padding: 0 30px 30px;
    }

    .thank-you-modal__image-container {
        margin-bottom: 1rem;
    }

    .thank-you-modal__image {
        max-width: 100%;
        height: auto;
        width: 100%;
        object-fit: cover;
        display: block;
    }

    .thank-you-modal__phone-number {
        color: #00A771;
        text-decoration: none;
        font-weight: 600;
    }

    .thank-you-modal__close-button {
        width: 100%;
        cursor: pointer;
        padding: 10px;
        background-color: #00A771;
        border: none;
        color: #fff;
        font-size: 16px;
        border-radius: 5px;
    }

    @media only screen and (max-width: 600px) {
        .thank-you-modal__content {
            margin: 0 20px;
        }
    }

    /* Styling for the Thank You Modal */

    .single-accidents .form-container.form-container--submitted {
        padding: 0;
    }

    .popup-content .custom-confirmation-message__logo {
        margin-bottom: 1rem;
    }

    .popup-content .form-container__buttons {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        margin-top: 1.5rem;
    }

    .popup-content .custom-confirmation-message__phone-number {
        color: #00A771;
        text-decoration: none;
        font-weight: 600;
    }

    .popup-content .form-container__button {
        width: 100%;
        cursor: pointer;
    }

    .popup-content .close-form-btn:hover {
        background: none;
        color: #000;
        opacity: 0.8;
    }

    .popup-content .form-container .gf_progressbar {
        max-width: 90%;
    }

    .popup-content .custom-form__label {
        text-align: center;
        margin-top: 5px;
    }

    .popup-content .form-container__confirmation-modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        justify-content: center;
        align-items: center;
    }

    .form-container--submitted .form-container__logo,
    .form-container--submitted .close-form-btn {
        display: none;
    }

    .form-container__confirmation-modal-content {
        background-color: #fff;
        padding: 2rem;
        border-radius: 5px;
        text-align: center;
        min-width: 700px;
    }

    .popup-content #input_18_33 label {
        font-weight: 700;
        text-transform: uppercase;
        margin-bottom: 10px;
    }

    .single-accidents .popup-content .gform_wrapper.gravity-theme .gfield_required {
        color: #000;
        padding: 0;
    }

    .single-accidents .popup-content .gf_progressbar_percentage.percentbar_blue.percentbar_100 {
        width: 98% !important;
    }

    .popup-content .close-form-btn {
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

    .form-container__main {
        position: relative;
    }

    .popup-content .custom-confirmation-message {
        padding: 40px 30px;
        max-width: 635px;
    }

    .popup-content .custom-confirmation-message__alert img {
        display: block;
        object-fit: contain;
    }

    .popup-content .custom-confirmation-message__message {
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .popup-content .custom-confirmation-message__message p {
        margin: 0;
    }

    .popup-content .custom-confirmation-message__alert {
        background: #dcede7;
        display: flex;
        gap: 10px;
        justify-content: center;
        padding-top: 5px;
        padding-bottom: 5px;
        margin-bottom: 15px;
        margin-top: 20px;
        max-width: max-content;
        padding: 8px 20px;
    }

    .popup-content #close-button {
        width: 100%;
        cursor: pointer;
    }

    .popup-content .custom-confirmation-message__alert span {
        font-size: 14px;
        color: #00A771;
    }

    .popup-content .custom-confirmation-message__column--right {
        display: flex;
        align-items: center;
        padding: 40px 20px;
    }

    .single-accidents .popup-content .gform_next_button,
    .single-accidents .popup-content .gform_previous_button  {
        position: absolute;
        top: -100%;
        visibility: hidden;
    }

    .single-accidents .popup-content #gform_page_18_4 fieldset {
        max-width: 100% !important;
    }

    .single-accidents .popup-content .gform_wrapper.gravity-theme #gform_page_18_4  .gfield {
        min-width: unset;
    }

    .popup-content #gform_submit_button_18 {
        width: 100%;
        cursor: pointer;
        margin-left: 0;
    }

    .single-accidents .popup-content .gform_heading,
    .single-accidents .popup-content .gf_progressbar_title,
    .single-accidents .popup-content .gf_progressbar_percentage span {
        display: none;
    }

    .single-accidents .form-container {
        max-width: 835px;
        display: block;
        margin-inline: auto;
        background: #fff;
        padding: 2rem;
    }

    .single-accidents .popup-content .gform_wrapper.gravity-theme .gf_progressbar_percentage span {
        display: none;
    }

    .single-accidents .popup-content h4 {
        text-align: center;
        margin-top: 0;
        margin-bottom: 0.5rem;
    }

    .single-accidents .popup-content .gform_page_footer.top_label {
        display: flex;
        justify-content: center;
        flex-direction: column;
        position: relative;
    }

    .single-accidents .popup-content #gform_page_18_4 .gform_ajax_spinner {
        bottom: -25px;
    }

    .single-accidents .popup-content .gform_wrapper.gravity-theme .gfield-choice-input+label {
        cursor: pointer;
    }

    .single-accidents .popup-content .gform_page_footer.top_label img {
        width: 50px;
        display: block;
        margin-inline: auto;
    }

    .single-accidents .popup-content .gform_ajax_spinner {
        position: absolute;
        left: 50%;
        transform: translate(-50%, 15px);
    }

    .single-accidents .popup-content .gform_heading .gform_required_legend {
        display: none;
    }

    .single-accidents .popup-content .gform_wrapper.gravity-theme fieldset {
        margin: auto;
    }

    .single-accidents .popup-content .gfield_radio {
        display: flex;
        justify-content: space-between;
        gap: 20px;
    }

    .single-accidents .popup-content .form-container__logo img {
        display: block;
        margin-inline: auto;
        max-width: 460px;
        object-fit: contain;
        width: 100%;
        margin-bottom: 2rem;
    }

    .single-accidents .popup-content .gform-field-label {
        cursor: pointer;
    }

    .single-accidents .popup-content .gchoice {
        width: 100%;
        border: 1px solid #CDCDC9;
        padding: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .single-accidents .popup-content .gchoice:hover {
        background: #F7F6F3;
        box-shadow: 0 0 0 2px #00A871;
        border: unset;
    }

    .single-accidents .popup-content .gchoice:hover img {
        filter: brightness(0) saturate(100%) invert(63%) sepia(69%) saturate(6545%) hue-rotate(137deg) brightness(95%) contrast(101%);
    }

    .single-accidents .popup-content .gform_wrapper.gravity-theme .gfield {
        min-width: 410px;
    }

    .single-accidents .popup-content .gfield-choice-input {
        position: absolute;
        visibility: hidden;
    }

    .popup-content .custom-form__image-container img {
        display: block;
        margin-inline: auto;
        object-fit: contain;
    }

    .popup-content .custom-form__image {
        max-width: 100%;
        width: 115px;
    }

    .popup-content .custom-form__image-2 {
        max-width: 100%;
        width: 90px; 
    }

    .single-accidents .popup-content .gform_wrapper.gravity-theme .gf_progressbar_percentage {
        height: 14px;
    }

    @media only screen and (max-width: 600px) {
        .single-accidents .popup-content .gform_wrapper.gravity-theme .gfield {
            min-width: 70%;
        }

        .single-accidents .popup-content .gfield_radio {
            flex-direction: column;
        }

        .form-container .popup-content .gf_progressbar {
            max-width: 85%;
        }

        .single-accidents .popup-content .gf_progressbar_percentage.percentbar_blue.percentbar_100 {
            width: 94% !important;
        }

        .popup-content .form-container__confirmation-modal-content {
            min-width: auto;
            margin: 0 20px;
        }

        .form-container__confirmation-modal-content {
            padding: 2rem 1.5rem;
        }

        .form-container__buttons {
            gap: 10px;
        }

        .single-accidents .popup-content .form-container {
            padding: 2rem 1.5rem;
        }

        .popup-content .custom-form__image {
            width: 70px;
        }

        .popup-content .custom-form__image-2 {
            width: 60px;
        }

        .single-accidents .popup-content .gform_page_footer.top_label img {
            width: 35px;
        }

        .popup-content .custom-confirmation-message {
            display: flex;
            padding: 0;
            max-width: 635px;
        }
    }
</style>

<script>
    jQuery(document).ready(function($) {
        // Close initial form and show confirmation modal
        $('.close-form-btn').on('click', function() {
            $('#confirmationModal').css('display', 'flex');
            $('.form-container').css('display', 'none');
        });

        // Handle the No button
        $('#confirmNo').on('click', function() {
            $('#confirmationModal').hide();
            $('.form-container').css('display', 'block');
        });

        // Handle the Yes button - show the new Thank You modal
        $('#confirmYes2').on('click', function() {
            $('#confirmationModal').hide(); // Hide the current modal
            $('#thankYouModal').css('display', 'flex'); // Show the Thank You modal

            // Auto-close Thank You modal after 5 seconds
            setTimeout(function() {
                closeThankYouModal();
            }, 5000);
        });

        // Close Thank You Modal and prevent #popup from showing again
        $('#closeThankYou').on('click', function() {
            closeThankYouModal();
        });

        // Close the Thank You modal when clicking outside the content
        $('#thankYouModal').on('click', function(e) {
            if ($(e.target).is('#thankYouModal')) {
                closeThankYouModal();
            }
        });

        // Function to close the Thank You modal
        function closeThankYouModal() {
            $('#thankYouModal').hide(); // Hide the Thank You modal
            $('#popup').hide(); // Hide the #popup

            // Store in localStorage to prevent the popup from showing again
            localStorage.setItem('popupClosed', 'true');
        }

        // If popup was closed previously, hide it
        if (localStorage.getItem('popupClosed')) {
            $('#popup').hide(); // Ensure the popup doesn't appear on page refresh
        }

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