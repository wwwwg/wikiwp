<div class="custom-sidebar">
    <?php
    while (have_posts()) : the_post();
        // get thumbnail
        wikiwp_get_thumbnail($post);

        // show edit button if user is logged in
        wikiwp_get_edit_post_link($post);
    endwhile;
    ?>
</div>

