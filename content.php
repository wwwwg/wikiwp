<article class="entry entry-type-post">
    <header class="entryHeader">
        <h1 class="entryTitle">
            <?php
            while ( have_posts() ) : the_post();
            the_title();
            ?>
        </h1>
    </header>

    <div class="entryContent">
        <?php
        // get the content
        the_content();
        endwhile;
        ?>
    </div>

    <?php if (is_single() || is_page_template( 'wiki-page.php' )) { ?>
    <footer class="row">
        <div class="col col-md-12 wikiwp-entry entry-highlighted">
            <div class="wikiwp-entry-content">
                <?php
                // post info
                wikiwp_get_post_info($post);
                ?>
            </div>
        </div>

        <div class="col col-md-12 wikiwp-entry">
            <div class="wikiwp-entry-content">
                <?php
                // related posts
                wikiwp_get_related_posts($post);
                ?>
            </div>
        </div>

    <?php } else { ?>
    <footer class="row">
        <div class="col col-md-12 wikiwp-entry">
            <div class="wikiwp-entry-content">
                <?php
                // edit post link
                wikiwp_get_edit_post_link($post);
                ?>
            </div>
        </div>
    <?php } ?>

    <div class="col col-md-12 wikiwp-entry">
            <div class="wikiwp-entry-content">
    <?php get_template_part('postinfo'); ?>
</div>
        </div>

    </footer>
</article>