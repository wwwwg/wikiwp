// post excerpt

echo '<div class="excerpt clearfix">';
    // thumbnail
    if ( has_post_thumbnail() ) {
    echo '<a class="excerpt-thumbnail" href="'.get_the_permalink().'" title="';
    the_title_attribute();
    echo '">';
        the_post_thumbnail('mini');
        echo '</a>';
    // post title
    echo '<h2 class="excerpt-title"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h2>',
    // Post info
    '<div class="postinfo postinfo-excerpt">',
        '<span>'.get_the_modified_date().'</span>',
        '</div>'; // End of .postinfo-excerpt
    } else {
    // Post title
    echo '<h2 class="excerpt-title"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h2>',
    // Post info
    '<div class="postinfo postinfo-excerpt">',
        '<span>'.get_the_modified_date().'</span>',
        '</div>'; // End of .postinfo-excerpt
    }
    // excerpt
    the_excerpt();
    // Post info
    get_template_part('postinfo');
    echo '</div>'; // end of .excerpt
endwhile;

// Pargination
echo '<div class="posts-pagination">';
    previous_posts_link('<span class="next-posts-link">&laquo; '.__('Newer Entries', 'wikiwp').'</span>');
    next_posts_link('<span class="previous-posts-link">'.__('Older Entries', 'wikiwp').' &raquo;</span>');
    else :
    echo '</div>'; // End of .posts-pargination
// If no posts were found
endif;
echo '</div>',
'</div>'; // End of .cat-container














