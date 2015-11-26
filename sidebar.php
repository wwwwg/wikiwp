<aside>
    <div class="aside-container container-full">
        <div class="custom-sidebar">
            <?php
            if (is_single() || is_page()) {
                while (have_posts()) : the_post();
                    // get thumbnail
                    wikiwp_get_thumbnail($post);

                    // show edit button if user is logged in
                    wikiwp_get_edit_post_link($post);
            ?>

            <div class="row sidebarContent">
                <div class="col-md-12">
                    <?php the_title(); ?>
                </div>

                <div class="col-md-12">
                    <?php
                    // modified date
                    _e('Last update on', 'wikiwp');
                    the_modified_date();
                    ?>
                </div class="col-md-12">

                <div class="col-md-12">
                    <?php
                    // publishing date
                    _e('Published', 'wikiwp');
                    echo '&nbsp;';
                    the_date();
                    ?>
                </div>

                <div class="col-md-12">
                    <?php
                    _e('Author', 'wikiwp');
                    echo ':</strong>&nbsp;';
                    the_author_posts_link();
                    echo '</span>';
                    ?>
                </div>

                <div class="col-md-12">
                    <?php
                    // categories
                    _e('Categories', 'wikiwp');
                    echo ':&nbsp;';
                    the_category(', ');
                    ?>
                </div>

                <div class="col-md-12">
                    <?php wikiwp_get_tags($post); ?>

                    <?php wikiwp_get_related_posts($post); ?>
                </div>
            </div>

            <?php
                endwhile;
            }
            ?>
</div>

<div class="dynamic-sidebar-container">
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : endif; ?>
</div>
</div>
</aside>

<div class="aside-menu-button">Sidebar</div>';