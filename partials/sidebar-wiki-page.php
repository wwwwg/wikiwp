<div class="custom-sidebar">
    <?php
        // FEATURED IMAGE MEDIUM FIX WIDTH
        if (has_post_thumbnail('medium-fix-width')) {
            $medium_fix_width_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium-fix-width');
            echo '<a class="postmeta-thumbnail" href="' . $medium_fix_width_image_url[0] . '" title="' . the_title_attribute('echo=0') . '" >hallo</a>';
        } else {
            $thumbnail_large_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
            echo '<a class="postmeta-thumbnail" href="' . $thumbnail_large_url[0] . '" title="' . the_title_attribute('echo=0') . '" >' . get_the_post_thumbnail($post_id, 'large') . '</a>';
        }


        // EDIT BUTTON (IF USER IS LOGGED IN)
        if (is_user_logged_in()): ?>

        <div class="custom-sidebar-widget postmeta-edit">
            <div class="edit">
                <?php  edit_post_link(__('edit', 'wikiwp')); ?>
            </div>
        </div>

    <?php endif; ?>
</div>


