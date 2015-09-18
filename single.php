<?php
	get_header();
	get_template_part('navigation');

	// Post
	while ( have_posts() ) : the_post();
	// Content
	echo '<div class="content post-content">';
	echo '<h1 class="post-title">';
		 the_title();
	echo '</h1>';
	the_content();
	get_template_part('postinfo' );
	// Comments
	comments_template();
	endwhile;
    get_sidebar();
	// Last posts
	echo '<div class="last-posts-list postinfo">',
		 '<h4>'.__('Last posts', 'wikiwp').'</h4>',
		 '<ul>';
	wp_get_archives('type=postbypost&limit=10');
	echo '</ul>',
		 '</div>', // End of .lastlist
		 '<div class="clearfix">&nbsp;</div>',
		 '</div>'; // End of .content
    // Footer
    get_footer();