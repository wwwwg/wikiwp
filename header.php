<?php
	// HEAD
	echo '<!DOCTYPE html>',
		 '<html ';
	language_attributes();
	echo '>',
		 '<head>',
		 '<meta charset="'.get_bloginfo('charset').'">',
		 '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=10.0, user-scalable=yes"/>';
?>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php
    // Blog description
	echo '<meta name="description" content="';
	if ( is_single() ) { 
		single_post_title('', true); 
	} else { 
		bloginfo('name'); echo " - "; 
		bloginfo('description'); 
	} 
	echo '" />',
		 '<link rel="pingback" href="'.get_bloginfo('pingback_url').'">';
	// wp_head() function (see functions.php)
    wp_head();
	echo '</head>';

	// HEADER
	echo '<body ';
	body_class('body');
	echo '>',
    

    // Header
         '<header class="headerMain">',




         '<div class="header-content">',


	// Custom logo
		 '<div id="logo">';
	if (get_theme_mod('custom_logo')) {
		echo '<a href="'.esc_url(home_url('/')).'" id="site-logo" title="'.esc_attr(get_bloginfo('name', 'display')).'" rel="home">',
	 		 '<img class="logo-img" src="'.get_theme_mod('custom_logo').'" alt="'.esc_attr(get_bloginfo('name', 'display')).'">',
			 '</a>';
    // If no custom logo is set, show blog name
	} else {
		echo '<h2 class="blog-name"><a href="'.get_home_url().'/">'.get_bloginfo('name').'</a></h2>';
	}
    // Blog description
    if ( get_bloginfo( 'description' ) ) {
            echo '<span class="blog-description">'.get_bloginfo('description').'</span>';
        }
    
    
    
        echo '</div>', // end of .logo

             '</div>', // end of .header-content

             '</header>',
             
    // Container
         '<div class="container-fluid">';

// WordPress core custom header image
    $header_image = get_header_image();
		if ( empty( $header_image ) ) {
			// If no header image is set
            // Search form
            echo '<div class="meta clearfix">';
        } else {
            echo '<div class="header-image-container">',
                 '<img src="'.esc_url( $header_image ).'" class="header-image" width="'.get_custom_header()->width.'" height="'.get_custom_header()->height.'" alt="" />',
                 '</div>',
            // Search form
                 '<div class="meta  meta-header-image clearfix">';
        } // End of custom header

    echo '<div class="meta-search-form">';
		 get_search_form();
		 echo'</div>';
	if (is_user_logged_in()) {
		if ( current_user_can('edit_post', 123) ) {
				echo '<a href="'.get_home_url().'/wp-admin/post-new.php" target="_self" class="add-post-link"><small><span class="add-post-link-plus">+</span><span class="add-post-link-text">&nbsp;';
		 	_e('Add post', 'wikiwp');
			echo '</span></small></a>';
		}
	}
	echo '</div>'; // End of .meta