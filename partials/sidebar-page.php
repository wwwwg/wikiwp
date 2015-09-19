<div class="custom-sidebar">
    <?php
        // EDIT BUTTON (IF USER IS LOGGED IN)
        if (is_user_logged_in()):
    ?>

        <div class="custom-sidebar-widget postmeta-edit">
            <div class="edit">
                <?php
                while (have_posts()) : the_post();
                    edit_post_link(__('edit', 'wikiwp'));
                endwhile;
                ?>
            </div>
        </div>

    <?php endif; ?>
</div>