<?php 
    get_header(); 
    get_template_part('navigation');
    // content
    echo '<div class="content">',
         '<div class="search-content">',
         '<h1 class="cat-title">'.$wp_query->found_posts.'&nbsp;';
    printf( __( 'results found for %s', 'wikiwp' ), '<strong>' . get_search_query() . '</strong>' );
    echo '</h1>';
    $posts = query_posts($query_string . '&orderby=name&order=asc&posts_per_page=-1'); 
    
    // Post excerpt
    if ( have_posts() ) : while (have_posts()) : the_post();
    echo '<div class="excerpt clearfix">';
         
    // Thumbnail
    if ( has_post_thumbnail() ) {
    echo '<a class="excerpt-thumbnail" href="';
    the_permalink();
    echo '" title="';
    the_title_attribute();
    echo '">';
    the_post_thumbnail('mini');
    echo '</a>';
    // Post title
        echo '<h2 class="excerpt-title"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h2>',
        // Post info
             '<div class="postinfo postinfo-excerpt">',
			 '<span>'.get_the_date().'</span>',
		   	 '</div>'; // End of .postinfo-excerpt
    } else {
        // Post title
        echo '<h2 class="excerpt-title"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h2>',
        // Post info
             '<div class="postinfo postinfo-excerpt">',
			 '<span>'.get_the_date().'</span>',
		   	 '</div>'; // End of .postinfo-excerpt
    }
    // Excerpt
    the_excerpt();
    // Post info
    get_template_part('postinfo');
    echo '</div>'; // End of .excerpt
    endwhile;
    echo '</div>'; // End of .search-content
    endif;
    echo '</div>'; // End of .content
    // Sidebar
    get_sidebar();
    // Footer
    get_footer();