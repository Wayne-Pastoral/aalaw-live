<?php /* Template Name: Custom Facebook Form */ ?>

<main id="primary" class="site-main">
    <!-- Custom HTML Form -->
    <form id="custom-form" method="post" action="#">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="input_1" class="custom-input" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="input_3" class="custom-input" required>
        </div>
        <div class="form-group">
            <button type="submit" class="custom-submit">Submit</button>
        </div>
    </form>

    <style>
        .custom-form {
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 5px;
            max-width: 500px;
            margin: auto;
        }
        .custom-input {
            padding: 10px;
            width: 100%;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .custom-submit {
            padding: 10px 20px;
            background-color: #0073e6;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
    jQuery(document).ready(function($) {
        $('#custom-form').on('submit', function(e) {
            e.preventDefault();

            var formData = $(this).serialize(); 
            $.ajax({
                type: 'POST',
                url: '/wp-admin/admin-ajax.php',  // The correct URL for WordPress AJAX
                data: {
                    action: 'gform_submit',  // Correct action for Gravity Forms submission
                    form_id: '18',  // Replace with your correct Gravity Form ID
                    input_1: $('#name').val(),  // Name field value
                    input_3: $('#email').val(),  // Email field value
                    is_submit_18: 1,  // Based on form ID
                    gform_submit: true,  // This tells Gravity Forms to handle the submission
                },
                success: function(response) {
                    console.log(response);
                    if (response) {
                        alert('Form submitted successfully!');
                    } else {
                        alert('Form submission failed.');
                    }
                },
                error: function(error) {
                    alert('There was an error submitting the form.');
                    console.log(error);
                }
            });
        });
    });
    </script>

</main>
