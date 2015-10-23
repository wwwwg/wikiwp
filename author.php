<?php
    get_header();
    get_template_part('navigation');

    echo '<div class="content">',
    // author name
         '<h1 class="page-title">'.get_the_author().'</h1>',
    // avatar
         '<div class="avatar-profile">',
         '<div class="alignleft avatar">'.get_avatar( get_the_author_meta( 'email' ), '150' ).'</div>';
    // description
         if ( get_the_author_meta('description') ) : // If a user wrote a description
        echo '<p class="author-description">'.get_the_author_meta('description' ).'</p>';
         endif;
    // website
        if ( get_the_author_meta('user_url') ) : // If a user set a website 
        echo '<p class="author-url"><strong>';
        _e('Website', 'wikiwp');
        echo ':</strong> <a href="'.get_the_author_meta('user_url').'" title="'.get_the_author_meta('user_url').'" target="_blank">'.get_the_author_meta('user_url').'</a></p>';
        endif;
    // author's posts
    echo '<div class="author-postings">',
         '<h3>'.get_the_author();
         _e('&acute;s postings', 'wikiwp');
    echo '</h3>',
         '<ul>'; 
    if ( have_posts() ) : while ( have_posts() ) : the_post();
    echo '<li>',
         '<a href="'.get_permalink().'" rel="bookmark" title="'.get_the_title().'">'.get_the_title().'</a>',
         '</li>';
         endwhile;
    echo '</ul>';
         // no posts by this autor so far 
         else:
    echo '<p>';
    _e('No posts by this author.', 'wikiwp');
    echo '</p>';
    endif;
    echo '</div>', // end of .author-postings
         '</div>';// end of .avatar-profile
    // author list
    echo '<div class="author-list">',
         '<h2>';
    _e('Our authors', 'wikiwp');
    echo '</h2>',
         '<ul>';
         wp_list_authors('show_fullname=1&optioncount=1&orderby=post_count&order=DESC');
    echo '</ul>';
    echo '</div>',
         '</div>'; // end of .content
    // footer
    get_footer();