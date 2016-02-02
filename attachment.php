<?php
get_header();
get_template_part('navigation');
?>

<div class="postContainer">
    <article class="entry entryTypePost">
        <?php
        if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <header class="entryHeader">
                <h1 class="entryTitle">
                    <?php the_title(); ?>
                </h1>
            </header>

            <div class="entry-attachment">
                <?php if ( wp_attachment_is_image( $post->id ) ) : $att_image = wp_get_attachment_image_src( $post->id, "fhd"); ?>
                    <p class="wikiwp-attachment">
                        <a href="<?php echo wp_get_attachment_url($post->id); ?>" title="<?php the_title(); ?>" rel="attachment">
                            <img src="<?php echo $att_image[0];?>"  class="attachment-fhd" alt="<?php the_title(); ?>" />
                        </a>
                    </p>
                <?php else : ?>
                    <a href="<?php echo wp_get_attachment_url($post->ID) ?>" title="<?php echo wp_specialchars( get_the_title($post->ID), 1 ) ?>" rel="attachment"><?php echo basename($post->guid) ?></a>
                <?php endif; ?>
            </div>

        <?php
        endwhile;
        endif;
        ?>
    </article>

    <div class="last-posts-list wikiwp-attacment-info clearfix">

        <p>
            Image size <?php echo $att_image[1];?> x <?php echo $att_image[2];?> px
        </p>
        <hr>
        <p class='resolutions'> Downloads:
            <?php
            $images = array();
            $image_sizes = get_intermediate_image_sizes();
            array_unshift( $image_sizes, 'full' );
            foreach( $image_sizes as $image_size ) {
                $image = wp_get_attachment_image_src( get_the_ID(), $image_size );
                $name = $image_size . ' (' . $image[1] . 'x' . $image[2] . ')';
                $images[] = '<a href="' . $image[0] . '">' . $name . '</a>';
            }
            echo implode( ' | ', $images );
            ?>
        </p>
    </div>
</div>

<?php
// sidebar
get_sidebar();

// footer
get_footer();