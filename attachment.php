<?php
get_header();
get_template_part('navigation');
?>

<div class="postContainer">
    <article class="entry entryTypePost">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <header class="entryHeader">
            <h1 class="entryTitle">
                <?php the_title(); ?>
            </h1>
        </header>

        <div class="wikiwp-entry-attachment">
            <?php if ( wp_attachment_is_image( $post->id ) ) : $att_image = wp_get_attachment_image_src( $post->id, "fhd"); ?>

                <figure class="wikiwp-attachment wp-caption alignnone">
                    <a href="<?php echo wp_get_attachment_url($post->id); ?>" title="<?php the_title(); ?>" rel="attachment">
                        <img src="<?php echo $att_image[0];?>"  class="attachment-fhd" alt="<?php the_title(); ?>" />
                    </a>

                    <figcaption class="wp-caption-text">
                        <?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?>
                    </figcaption>
                </figure>

            <?php endif; ?>
        </div>

        <div class="wikiwp-attachment-info clearfix">
            <hr>

            <div class="wikiwp-entry wikiwp-attachment-description">
                <div class="wikiwp-entry-content">
                    <p>
                        <?php echo get_post(get_post_thumbnail_id())->post_content; ?>
                    </p>
                </div>
            </div>

            <div class="wikiwp-entry wikiwp-attachment-size entry-highlighted smaller">
                <?php if ( wp_attachment_is_image( $post->id ) ) : $att_image = wp_get_attachment_image_src( $post->id, "fhd"); ?>

                    <header class="wikiwp-entry-header">
                        <h4 class="wikiwp-entry-title">
                            <?php the_title(); ?>
                        </h4>
                    </header>

                    <div class="wikiwp-entry-content">
                        <p class="">
                            <?php
                            // publishing date
                            wikiwp_icon_date($post);
                            the_date();
                            ?>
                        </p>

                        <p class="">
                            <?php
                            _e('Uploaded from', 'wikiwp');
                            echo ':</strong>&nbsp;';
                            the_author_posts_link();
                            echo '</span>';
                            ?>
                        </p>

                        <p>
                            Image size: <?php echo $att_image[1];?> x <?php echo $att_image[2];?> px <a href="<?php echo wp_get_attachment_url($post->id); ?>" class="wikiwp-attachment-full-size-link" title="Get full size of image <?php the_title(); ?>" rel="attachment">&raquo; get full size</a>
                        </p>
                    </div>

                <?php endif; ?>
            </div>

            <div class="wikiwp-entry wikiwp-attachment-size entry-highlighted smaller">
                <div class="wikiwp-entry-content">
                    <p class="resolutions"> Downloads:
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
        </div>

        <?php
        endwhile;
        endif;
        ?>
    </article>
</div>

<?php
// sidebar
get_sidebar();

// footer
get_footer();