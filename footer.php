<?php
	echo '</div>', // end of .container
    // FOOTER
         '<footer class="container-fluid">',
         '<div class="content clearfix">';
    // dynamic sidebar
    if ( is_active_sidebar( 'footer-left' ) ) :
        echo '<div class="col-md-4 dynamic-sidebar-footer-left">';
        dynamic_sidebar( 'footer-left' );
        echo '</div>';
    endif;

    if ( is_active_sidebar( 'footer-mid' ) ) :
        echo '<div class="col-md-4 dynamic-sidebar-footer-middle">';
        dynamic_sidebar( 'footer-mid' );
        echo '</div>';
    endif;

    if ( is_active_sidebar( 'footer-right' ) ) :
        echo '<div class="col-md-4 dynamic-sidebar-footer-right">';
        dynamic_sidebar( 'footer-right' );
        echo '</div>';
    endif;

    // COPYRIGHT
    echo '<div class="col-md-12 copyright">',
         '<p>',
		 '<strong>&copy;&nbsp;';
	echo '&nbsp;<a href="'.esc_url( home_url() ).'">'.get_bloginfo('name').'</a></strong>',
		 '&nbsp;&nbsp;|&nbsp;&nbsp;',
		 'powered by the&nbsp;',
		 '<a href="http://wikiwp.com" title="Wikipedia look-a-like theme for WordPress">WikiWP theme</a> and&nbsp;',
		 '<a href="http://wordpress.org/" target="_blank">WordPress</a>. &nbsp; | &nbsp; <a class="footer-rss-link" href="'.get_bloginfo('rss2_url').'" title="RSS Feed">RSS</a>',
	     '</p>',
         '</div>',
         '</div>', // End of .content
		 '</footer>';
 	wp_footer();
	echo '</body></html>';