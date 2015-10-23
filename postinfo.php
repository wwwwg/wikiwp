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
			 '</div>', // end of .postinfo-tags
		// get 5 related posts
		'<div class="postinfo postinfo-related">';
		echo '<h4>'.__('Related Posts', 'wikiwp').'</h4>';
		echo '<ul class="related-posts">';
		// if post has tags show related posts by tags
		if( has_tag() ) {
			$tags = wp_get_post_tags($post->ID);
			if ($tags) {
				$tag_ids = array();
				foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
				$args=array(
					'tag__in' => $tag_ids,
					'post__not_in' => array($post->ID),
					'showposts'=>5,
					'ignore_sticky_posts'=>1
				);
				$my_query = new WP_Query($args);
				if( $my_query->have_posts() ) {
					while ($my_query->have_posts()) : $my_query->the_post();
					echo '<li><a href="'.get_permalink().'" rel="bookmark" title="';
					the_title_attribute();
					echo '"><div class="related-post-thumb">'.get_the_post_thumbnail($page->ID, 'mini').'</div>',
						 '<span>'.get_the_title().'</span>',
					 	 '</a></li>';
					endwhile;
				}
			}
		}
		// if post has no tags show related posts by category
		else {
			$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 5, 'post__not_in' => array($post->ID) ) );
			if( $related ) foreach( $related as $post ) {
				setup_postdata($post); 
        		echo '<li><a href="'.get_permalink().'" rel="bookmark" title="';
				the_title_attribute();
				echo '"><div class="related-post-thumb">'.get_the_post_thumbnail($page->ID, 'mini').'</div>',
					 '<span>'.get_the_title().'</span>',
					 '</a></li>';
       		}
			wp_reset_postdata(); 
		}
		echo '</ul>', 
			 '</div>', // end of .related-posts

		
		// post navigation
			 '<div class="postinfo post-nav clearfix">',
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