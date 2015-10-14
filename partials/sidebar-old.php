<?php

// Category
if (is_category() || is_home() || is_front_page()) {
    echo '<ul class="dynamic-sidebar">';
    if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : endif;
    echo '</ul>';
}



// Page Template Wiki
elseif (is_page_template('wiki-page.php')) {
    echo '<div class="postmeta clearfix">';
    // thumbnail
    $header_image = get_header_image();
    if ( empty( $header_image ) ) {
        // If no custom header image is set
        if ( has_post_thumbnail() ) {
            $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
            echo '<a class="postmeta-thumbnail" href="' . $large_image_url[0] . '" title="' . the_title_attribute('echo=0') . '" >',
            the_post_thumbnail('medium-fix-width');
            echo '</a>';
        }
    } else {
        // If custom header image is set
        if ( has_post_thumbnail() ) {
            $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
            echo '<a class="postmeta-thumbnail thumbnail-header-image" href="' . $large_image_url[0] . '" title="' . the_title_attribute('echo=0') . '" >',
            the_post_thumbnail('medium-fix-width');
            echo '</a>';
        }
    }
    // post title
    echo '<span class="postmeta-title">';
    the_title();
    echo '</span>';
    // edit
    if (is_user_logged_in()) {
        echo '<span class="postmeta-edit">';
        edit_post_link(__('edit', 'wikiwp'));
        echo '</span>';
    }
    // modified date
    echo '<span class="postmeta-section modified-date"><strong>';
    _e('Last update on', 'wikiwp');
    echo '</strong>&nbsp;';
    the_modified_date();
    echo '</span>',
        // author
    '<span class="postmeta-section author"><strong>';
    _e('Author', 'wikiwp');
    echo ':</strong>&nbsp;';
    the_author_posts_link();
    echo '</span>',
        // date
    '<div class="postmeta-section date"><strong>';
    _e('Published', 'wikiwp');
    echo ':</strong>&nbsp;';
    the_date();
    echo '</div>',
    '</div>'; // end of .postmeta
}

// Page
elseif (is_page()) {
    echo '<ul class="dynamic-sidebar">';
    if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : endif;
    echo '</ul>';
}

elseif (is_search()) {
    echo 'Search';
}






































// Category Wiki
elseif (in_category('wiki')) {
    while ( have_posts() ) : the_post();
        echo '<div class="postmeta clearfix">';
        // thumbnail
        $header_image = get_header_image();
        if ( empty( $header_image ) ) {
            // If no custom header image is set
            if ( has_post_thumbnail() ) {
                $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
                echo '<a class="postmeta-thumbnail" href="' . $large_image_url[0] . '" title="' . the_title_attribute('echo=0') . '" >',
                the_post_thumbnail('medium-fix-width');
                echo '</a>';
            }
        } else {
            // If custom header image is set
            if ( has_post_thumbnail() ) {
                $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
                echo '<a class="postmeta-thumbnail thumbnail-header-image" href="' . $large_image_url[0] . '" title="' . the_title_attribute('echo=0') . '" >',
                the_post_thumbnail('medium-fix-width');
                echo '</a>';
            }
        }
        // post title
        echo '<span class="postmeta-title">';
        the_title();
        echo '</span>';
        // edit
        if (is_user_logged_in()) {
            echo '<span class="postmeta-edit">';
            edit_post_link(__('edit', 'wikiwp'));
            echo '</span>';
        }
        // modified date
        echo '<span class="postmeta-section modified-date"><strong>';
        _e('Last update on', 'wikiwp');
        echo '</strong>&nbsp;';
        the_modified_date();
        echo '</span>',
            // author
        '<span class="postmeta-section author"><strong>';
        _e('Author', 'wikiwp');
        echo ':</strong>&nbsp;';
        the_author_posts_link();
        echo '</span>',
            // date
        '<div class="postmeta-section date"><strong>';
        _e('Published', 'wikiwp');
        echo ':</strong>&nbsp;';
        the_date();
        echo '</div>',
            // categories
        '<div class="postmeta-section categories">';
        _e('Categories', 'wikiwp');
        echo ':&nbsp;';
        the_category(', ');
        echo '</div>',
            // tags
        '<span class="postmeta-section tags">';
        _e('Tags', 'wikiwp');
        echo ':&nbsp;';
        $tag = get_the_tags();
        if (! $tag) {
            echo 'There are no tags for this post';
        } else {
            the_tags('',', ','');
        }
        echo '</span>',
            // get 5 related posts
        '<div class="postmeta-section related">',
            '<strong>'.__('Related Posts', 'wikiwp').'</strong>',
        '<ul class="related-posts">';
        // if post has tags show related posts by tags
        if( has_tag() ) {
            $tags = wp_get_post_tags($post->ID);
            if ($tags) {
                $tag_ids = array();
                foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
                $args=array(
                    'tag__in' => $tag_ids,
                    'post__not_in' => array($post->ID),
                    'showposts'=>5,
                    'ignore_sticky_posts'=>1
                );
                $my_query = new WP_Query($args);
                if( $my_query->have_posts() ) {
                    while ($my_query->have_posts()) : $my_query->the_post();
                        echo '<li><a href="'.get_the_permalink().'" rel="bookmark" title="';
                        the_title_attribute();
                        echo '"><div class="related-post-thumb">'.get_the_post_thumbnail($post->ID, 'mini').'</div>',
                            '<span>'.get_the_title().'</span>',
                        '</a></li>';
                    endwhile;
                }
            }
        }
        // if post has no tags show related posts by category
        else {
            $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 5, 'post__not_in' => array($post->ID) ) );
            if( $related ) foreach( $related as $post ) {
                setup_postdata($post);
                echo '<li><a href="'.get_the_permalink().'" rel="bookmark" title="';
                the_title_attribute();
                echo '"><div class="related-post-thumb">'.get_the_post_thumbnail($page->ID, 'mini').'</div>',
                    '<span>'.get_the_title().'</span>',
                '</a></li>';
            }
            wp_reset_postdata();
        }
        echo '</ul>',
        '</div>', // end of .related-posts
        '</div>'; // end of .postmeta
    endwhile;
}
























while ( have_posts() ) : the_post();
    echo '<div class="custom-sidebar">'; // custom sidebar

    // FEATURED IMAGE
    $header_image = get_header_image();
    if ( empty( $header_image ) ) {
        // If no custom header image is set
        if ( has_post_thumbnail() ) {
            $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
            echo '<a class="postmeta-thumbnail" href="' . $large_image_url[0] . '" title="' . the_title_attribute('echo=0') . '" >',
            the_post_thumbnail('medium-fix-width');
            echo '</a>';
        }
    }

    // EDIT BUTTON (IF USER IS LOGGED IN)
    if (is_user_logged_in()) {
        echo '<div class="custom-sidebar-widget postmeta-edit">
                  <div class="edit">';
        edit_post_link(__('edit', 'wikiwp'));
        echo '</div>
                  </div>';
    }

    echo '<div class="custom-sidebar">'; // end of custom sidebar
endwhile;





































<div class="custom-sidebar">
    <?php
        while (have_posts()) : the_post();
            get_linked_thumbnail($post->ID, 'medium-fix-width', true);
            get_sidebar_edit_link($post->ID, true);
        endwhile;
    ?>
</div>




<?php
// functions.php




/**
 * @param int    $postID
 * @param string $size
 * @param bool   $echo
 */
function get_linked_thumbnail($postID, $size, $echo = false) {
    $thumbnail = '';
    if (has_post_thumbnail($postID)) {
        $medium_fix_width_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($postID), $size);
        $thumbnail = '<a class="postmeta-thumbnail" href="' . $medium_fix_width_image_url[0] . '" title="' . the_title_attribute(array('echo' => false, 'post' => $postID)) . '" ><img src="' . $medium_fix_width_image_url[0] . '" alt="I am awesome!!!" /></a>';
    }
    (bool)$echo ? echo $thumbnail : return $thumbnail;
}

/**
 * @param int  $postID
 * @param bool $echo
 */
function get_sidebar_edit_link($postID, $echo = false) {
    if(is_user_logged_in()) {
        $src = get_edit_post_link($postID);
        (bool)$echo ? echo $src : return $src;
    }
}




?>































