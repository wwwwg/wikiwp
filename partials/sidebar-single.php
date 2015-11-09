<div class="custom-sidebar">
	<?php
	while (have_posts()) : the_post();
        // get thumbnail
        wikiwp_get_thumbnail($post);

        // show edit button if user is logged in
        wikiwp_get_edit_post_link($post);

        // show post meta if post is not status format
        if (!has_post_format('status')) {
            //wikiwp_get_post_meta($post);
        }
	endwhile;
    ?>
</div>