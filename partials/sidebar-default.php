<?php
    echo '<div class="custom-sidebar">'; // custom sidebar

    // EDIT BUTTON (IF USER IS LOGGED IN)
    if (is_user_logged_in()) {
        echo '<div class="custom-sidebar-widget postmeta-edit">
              <div class="edit">';
        edit_post_link(__('edit', 'wikiwp'));
        echo '</div>
              </div>';
    }

    echo '<div class="custom-sidebar">'; // end of custom sidebar
