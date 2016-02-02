<?php
	// DISPLAY COMMENTS IF COMMENTS ARE OPENED
    if ( comments_open() ) {
		echo '<div class="comments">',
			 '<h2>';
		_e('Comments', 'wikiwp');
		echo '</h2>';
		if ( have_comments() ) {
			// this is displayed if there are comments
			echo '<h3>';
			_e('This post currently has', 'wikiwp');
			echo '&nbsp;';
			comments_number( __('no responses','wikiwp'), __('one response', 'wikiwp'), __('% responses','wikiwp') );
			echo '</h3>',
				 '<ul class="commentlist">';
			wp_list_comments();
			echo '</ul>',
				 '<div class="comment-nav">',
				 '<div class="alignleft">';
			previous_comments_link();
			echo '</div>',
				 '<div class="alignright">';
			next_comments_link();
			echo '</div>',
				 '</div>';
		} else {
			// this is displayed if there are no comments so far
			_e('So empty here ... leave a comment!', 'wikiwp');
		}
		// load comment form
		comment_form();
		echo '</div>'; // end of .content
	}