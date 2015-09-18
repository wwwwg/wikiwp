<?php
	// WRAPPER
	echo '<aside>',
		 '<div class="aside-container">';

	// HOME
	if (is_category() || is_home() || is_front_page()) {
		get_template_part('partials/sidebar-default');
	}

	// STATIC PAGE
	elseif (is_page()) {
		// wiki page
		if (is_page_template('wiki-page.php')) {
			get_template_part('partials/sidebar-wiki-page');
		}

		// default
		else {
			get_template_part('partials/sidebar-page');
		}
	}

	// SINGLE POST
	elseif (is_single()) {
		// wiki category
		if (in_category('wiki')) {
			get_template_part('partials/sidebar-wiki');
		}

		// default
		else {
			get_template_part('partials/sidebar-single');
		}
	}

	// SEARCH
	elseif (is_search()) {
		get_template_part('partials/sidebar-search');
	}

	// DYNAMIC SIDEBAR
	echo '<div class="dynamic-sidebar-container">';
	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : endif;
	echo '</div>';

	// END OF WRAPPER
	echo '</div>
		 </aside>
		 <div class="aside-menu-button">Sidebar</div>';