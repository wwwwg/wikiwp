<?php
	echo '<form role="search" method="get" class="search-form" action="'.home_url( '/' ).'">',
		 '<label>',

		 '<input type="search" class="search-field" placeholder="'.__( 'Search', 'wikiwp' ).'" value="'.get_search_query().'" name="s" title="'.__( 'Search', 'wikiwp' ).'" />',
		 '</label>',
		 '<input type="submit" class="search-submit" value="'.__( 'Search', 'wikiwp' ).'" />',
		 '</form>';