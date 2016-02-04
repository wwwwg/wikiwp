<?php
	// PAGE
	if ( is_page() ) {
		// pagination
		wp_link_pages('before=<p class="pagination"><span class="pagination-text">'.__('Sections', 'wikiwp').'</span>&after=</p>&next_or_number=number&pagelink=<span class="pagination-item">%</span>');

	// SINGLE
	} elseif ( is_single() ) {
		// pagination
		wp_link_pages('before=<p class="pagination"><span class="pagination-text">'.__('Sections', 'wikiwp').'</span>&after=</p>&next_or_number=number&pagelink=<span class="pagination-item">%</span>');
		
		// post navigation
		echo '<div class="postinfo post-nav clearfix">',
		 	 '<h4 class="clearfix">';
		_e('Other posts', 'wikiwp');
		echo '</h4>';
		posts_nav_link();
		previous_post_link('<span class="previous-post-link">%link &laquo;</span>');
		next_post_link( '<span class="next-post-link">&raquo; %link</span>' );
		echo  '</div>'; // end of .post-nav
	} else {
		// No info
	}