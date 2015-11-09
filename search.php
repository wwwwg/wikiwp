<?php
    get_header();
    get_template_part('navigation');
?>

    <div class="searchContainer">
        <section class="entryTypePostExcerptHeader">
            <header class="entryHeader">
                <h1 class="entryTitle">
                    <?php
                    echo $wp_query->found_posts.'&nbsp;';
                    printf( __( 'results found for %s', 'wikiwp' ), '<strong>' . get_search_query() . '</strong>' );
                    ?>
                </h1>
            </header>
        </section>

        <section class="entryTypePostExcerptContainer">
            <?php
            // query for post order
            $posts = query_posts($query_string . '&orderby=name&order=asc&posts_per_page=-1');

            if ( have_posts() ) : while (have_posts()) : the_post();
                // get post excerpt
                wikiwp_get_post_excerpt($post);
            endwhile;
            ?>
        </section>

        <section class="entryTypePostExcerptMeta">
            <?php
            // Pagination
            echo '<div class="posts-pagination">';
            previous_posts_link('<span class="next-posts-link">&laquo; '.__('Newer Entries', 'wikiwp').'</span>');
            next_posts_link('<span class="previous-posts-link">'.__('Older Entries', 'wikiwp').' &raquo;</span>');
            echo '</div>'; // End of .posts-pagination
            // If no posts were found
            endif; ?>
        </section>
    </div>

<?php
// sidebar
get_sidebar();

// footer
get_footer();