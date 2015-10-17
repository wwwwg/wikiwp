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

    <div class="last-posts-list postinfo clearfix">
        <hr>
        <h4 class="lastPostsListTitle">
            <?php echo __('Last posts', 'wikiwp'); ?>
        </h4>

        <ul>
            <?php wp_get_archives('type=postbypost&limit=10'); ?>
        </ul>
    </div>
</div>

<?php
// sidebar
get_sidebar();

// footer
get_footer();