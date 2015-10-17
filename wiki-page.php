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

// post
while ( have_posts() ) : the_post();
?>

<div class="pageContainer">
    <?php
    // get content format
    get_template_part( 'content', get_post_format() );

    // comments
    comments_template();
    endwhile;
    ?>
</div>

<?php
// sidebar
get_sidebar();

// footer
get_footer();