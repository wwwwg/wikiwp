<aside>
    <div class="aside-container">
        <div class="custom-sidebar">
            <?php
            if (is_single() || is_page()) {
                while (have_posts()) : the_post();
                    // get thumbnail
                    wikiwp_get_thumbnail($post);

                    // show edit button if user is logged in
                    wikiwp_get_edit_post_link($post);
            ?>

            <div>
                <?php the_title(); ?>
            </div>

            <div>
                <?php
                // modified date
                _e('Last update on', 'wikiwp');
                the_modified_date();
                ?>
            </div>

            <div>
                <?php
                // publishing date
                _e('Published', 'wikiwp');
                echo '&nbsp;';
                the_date();
                ?>
            </div>

            <div>
                <?php
                _e('Author', 'wikiwp');
                echo ':</strong>&nbsp;';
                the_author_posts_link();
                echo '</span>';
                ?>
            </div>

            <div>
                <?php
                // categories
                _e('Categories', 'wikiwp');
                echo ':&nbsp;';
                the_category(', ');
                ?>
            </div>



                    <?php wikiwp_get_tags($post); ?>

                    <?php wikiwp_get_related_posts($post); ?>

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