<?php
echo '<div class="primary-menu primary-menu-side">',
'<div class="primary-menu-container">',
'<nav class="nav-container">';
// Main menu with fallback
wp_nav_menu(array(
    'theme_location' => 'main-menu',
    'items_wrap' => '<ul class="main-menu">%3$s</ul>',
    'fallback_cb' => 'main_menu_fallback',
));
// Main menu fallback
function main_menu_fallback() {
    echo '<ul class="default-nav">';
    // show pages
    wp_list_pages( $args = array(
        'title_li'     => '<span class="menu-title">'. __('Pages', 'wikiwp') .'</span>'
    ));
    // show categories
    wp_list_categories( $args = array(
        'title_li'     => '<hr><span class="menu-title">'. __('Categories', 'wikiwp') .'</span>'
    ));
    echo '</ul>';
}
// Meta menu
wp_nav_menu(array(
    'theme_location' => 'meta-menu',
    'items_wrap' => '<ul class="meta-menu">%3$s</ul>',
    'fallback_cb' => '',
));
echo '</nav>', // End of .nav-container
'<div class="nav-menu-button">Navigation</div>',

// CUSTOM SIDEBAR
'<div class="dynamic-sidebar-container dynamic-sidebar-navigation">';
if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('navigation') ) : endif;
echo '</div>';

echo '</div>', // End of .primary-menu-container
'</div>'; // End of .primary-menu-side