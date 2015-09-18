<?php
	get_header();
	get_template_part('navigation');

	// Post
	while ( have_posts() ) : the_post();
    // Content
	echo '<div class="content"';
	post_class('post');
	echo '>',
		 '<h1 class="page-title">';
	the_title();
	echo '</h1>';
	the_content();
	get_template_part('postinfo' );
	// Comments
	comments_template();
	endwhile;
	echo '</div>'; // End of .content
    // Sidebar
    get_sidebar();
    // Footer
    get_footer();