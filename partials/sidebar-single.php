<?php
    while ( have_posts() ) : the_post();
        echo '<div class="custom-sidebar">'; // custom sidebar

        // FEATURED IMAGE
        $header_image = get_header_image();
        if ( empty( $header_image ) ) {
            // If no custom header image is set
            if ( has_post_thumbnail() ) {
                $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
                echo '<a class="postmeta-thumbnail" href="' . $large_image_url[0] . '" title="' . the_title_attribute('echo=0') . '" >',
                the_post_thumbnail('medium-fix-width');
                echo '</a>';
            }
        }

        // EDIT BUTTON (IF USER IS LOGGED IN)
        if (is_user_logged_in()) {
            echo '<div class="custom-sidebar-widget postmeta-edit">
                  <div class="edit">';
            edit_post_link(__('edit', 'wikiwp'));
            echo '</div>
                  </div>';
        }

        echo '<div class="custom-sidebar">'; // end of custom sidebar
    endwhile;