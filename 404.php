<?php
	get_header();
	get_template_part('navigation');

	echo '<div class="content">',
		 '<h1 class="page-title">404 - ';
	_e('Page not found', 'wikiwp');
	echo '</h1>',
		 '<h2>';
	_e('Last posts', 'wikiwp');
	echo ':</h2>',
		 '<ul>';
	wp_get_archives('type=postbypost&limit=10');
	echo '</ul>',
		 '</div>'; // end of .content
    // footer
    get_footer();