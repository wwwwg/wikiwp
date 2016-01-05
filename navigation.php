<div class="navMenuButton">
    <header class="navMenuButtonTitle"><?php echo __('Menu', 'wikiwp'); ?></header>
    <div class="navMenuButtonContent">
        <hr>
        <hr>
        <hr>
    </div>
</div>

<div class="primary-menu primary-menu-side">
    <div class="primary-menu-container">
        <nav class="nav-container">
            <?php
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

            ?>

        </nav>

        <div class="dynamic-sidebar dynamic-sidebar-navigation">
            <div class="row sidebarContent">
                <div class="col-md-12">
                    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('navigation') ) : endif; ?>
                </div>

            </div>
        </div>
    </div>
</div>