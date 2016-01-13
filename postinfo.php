<?php
	// PAGE
	if ( is_page() ) {
		// pagination
		wp_link_pages('before=<p class="pagination"><span class="pagination-text">'.__('Sections', 'wikiwp').'</span>&after=</p>&next_or_number=number&pagelink=<span class="pagination-item">%</span>');
        if (is_page_template('wiki-page.php')) {
            // edit button
            if (is_user_logged_in()) {
                echo '<div class="postinfo postinfo-edit">',
                     '<span>'.__('Author', 'wikiwp').':&nbsp;';
                the_author_posts_link();
                echo '&nbsp;'.__('on', 'wikiwp').'&nbsp;'.get_the_date();
                if (is_user_logged_in()) {
                    echo '&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;';
                    edit_post_link(__('edit', 'wikiwp'));
                }
                echo '</span>',
                     '</div>'; // end of .postinfo-author
                }
        } else {
            // edit button
            if (is_user_logged_in()) {
                echo '<div class="postinfo postinfo-edit">',
			         '<span>';
                edit_post_link(__('edit', 'wikiwp'));
                echo '</span>',
                     '</div>'; // end of .postinfo-author
            }
        }

	// SINGLE
	} elseif ( is_single() ) {
		// EDIT BUTTON (IF USER IS LOGGED IN)
		if (is_user_logged_in()) {
			echo '<div class="postinfo-edit">
                  <div class="edit">';
			edit_post_link(__('edit', 'wikiwp'));
			echo '</div>
                  </div>';
		}



		// pagination
		wp_link_pages('before=<p class="pagination"><span class="pagination-text">'.__('Sections', 'wikiwp').'</span>&after=</p>&next_or_number=number&pagelink=<span class="pagination-item">%</span>');

		// POST AUTHOR
		echo '<div class="postinfo postinfo-author">',
			 '<span>'.__('Author', 'wikiwp').':&nbsp;';
		the_author_posts_link();
		echo '&nbsp;'.__('on', 'wikiwp').'&nbsp;'.get_the_date();
		echo '</span>
			  </div>'; // end of .postinfo-author


		echo '<div class="postinfo postinfo-categories">',
			 '<span>'.__('Categories', 'wikiwp').':&nbsp;';
		the_category(', ');
		echo '</span>',
			 '</div>', // end of .postinfo-categories
			 '<div class="postinfo postinfo-tags">',
			 '<span>'.__('Tags', 'wikiwp').':&nbsp;';
		$tag = get_the_tags();
		if (! $tag) {
			echo 'No tags for this post';
		} else {
			the_tags('',', ','');
		}
		echo '</span>',
			 '</div>'; // end of .postinfo-tags

		// get 5 related posts
        //wikiwp_get_related_posts($post);

		
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