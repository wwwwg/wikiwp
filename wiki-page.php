<?php
/**
*Template Name: Wiki
*
* @package WordPress
* @subpackage WikiWP
* @since WikiWP 1.8
*/

get_header();
get_template_part('navigation');

// postmeta
get_template_part('postmeta' );
// POST
while ( have_posts() ) : the_post();
echo '<div class="content"';
post_class('post');
echo '>',
	 '<h1 class="page-title">';
the_title();
echo '</h1>';
the_content();
get_template_part('postinfo' );
get_sidebar();
// comments
comments_template();
endwhile;
echo '</div>'; // end of .content
// footer
get_footer();