<div class="custom-sidebar">
	<?php
	// get thumbnail
	while (have_posts()) : the_post();
		wikiwp_get_thumbnail($post);
	endwhile;

	// show edit button if user is logged in
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