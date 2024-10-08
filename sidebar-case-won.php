<aside class="grid-5 sticky">
	<?php get_template_part( 'contact-form', get_post_format() ); ?>
    <div class="case-result">
        <?php
            $heading = get_field('heading');
            $case_results = get_field('case_result');

            if ($heading) {
                echo '<div class="case-result__headings">';
                echo '<h3 class="case-result__heading remove-spacing text-center">' . esc_html($heading) . '</h3>';
                echo '</div>';
            }
            
            echo '<div class="case-result__container">';
                if ($case_results) {
                    foreach ($case_results as $case_result) {
                        // Use the post object returned by the relationship field
                        $case_result_id = $case_result->ID;
                        $case_result_title = get_the_title($case_result_id);
                        $case_result_link = get_permalink($case_result_id);
                        $case_result_date = get_the_date('F Y', $case_result_id); // Format the date as Month Year

                        echo '<div class="case-result__item">';
                        echo '<a href="' . $case_result_link . '" class="case-result__link">' . esc_html($case_result_title) . '</a>';
                        echo '<p class="case-result__date remove-spacing ">' . esc_html($case_result_date) . '</p>';
                        echo '</div>';
                    }
                }
            echo '</div>';
        ?>
    </div>
</aside>