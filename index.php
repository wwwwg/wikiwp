<?php
get_header();
get_template_part('navigation');
?>

<div class="catContainer">
    <section class="entryTypePostExcerptHeader">
        <header class="entryHeader">
            <h1 class="entryTitle">
                <?php
                if ( is_front_page() && is_home() ) {
                    _e('Welcome to', 'wikiwp');
                    echo '&nbsp;'.get_bloginfo('name');
                } else {
                    wp_title('');
                }
                ?>
            </h1>

            <?php
            // Blog description
            if ( is_front_page() && is_home() && get_bloginfo( 'description' ) ) {
            echo '<p><small class="cat-title-description">'.get_bloginfo('description').'</small><p>';
                }
            ?>
        </header>

        <div class="entryContent">
            <?php
            // category description if exists
            $category = get_the_category();
            if( category_description( $category[0]->cat_ID ) ) {
                echo '<p class="categoryDescription">'.category_description( $category[0]->cat_ID ).'</p>';
            }
            ?>
        </div>
    </section>

    <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>

        <article class="entry entryTypePostExcerpt">

            <?php wikiwp_get_thumbnail($post); ?>

            <div class="entryContainer">
                <header class="entryHeader">
                    <h2 class="entryTitle">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>

                    <div class="postinfo postinfo-excerpt">
                        <span><?php the_modified_date(); ?></span>
                    </div>
                </header>

                <div class="entryContent">
                    <?php the_excerpt(); ?>
                </div>

                <footer class="entryMeta">
                    <?php get_template_part('postinfo' ); ?>
                </footer>
            </div>
        </article>

    <?php endwhile;

    // Pagination
    echo '<div class="posts-pagination">';
    previous_posts_link('<span class="next-posts-link">&laquo; '.__('Newer Entries', 'wikiwp').'</span>');
    next_posts_link('<span class="previous-posts-link">'.__('Older Entries', 'wikiwp').' &raquo;</span>');
    else :
    echo '</div>'; // End of .posts-pagination
    // If no posts were found

    endif; ?>
</div>

<?php
// sidebar
get_sidebar();

// footer
get_footer();