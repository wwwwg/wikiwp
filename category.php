<?php
    get_header();
    get_template_part('navigation');
?>

<div class="catContainer">
    <section class="entryTypePostExcerptHeader">
        <header class="entryHeader">
            <h1 class="entryTitle">
                <?php single_cat_title(); ?>
            </h1>
        </header>

        <div class="entryContent">
            <?php
                // category description if exists
                $category = get_the_category();
                if( category_description( $category[0]->cat_ID ) ) {
                    echo '<p class="categoryDescription">'.category_description( $category[0]->cat_ID ).'</p>';
                }
            ?>
        </div>
    </section>

    <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>

    <article class="entry entryTypePostExcerpt">

        <?php wikiwp_get_thumbnail($post); ?>

        <div class="entryContainer">
            <header class="entryHeader">
                <h2 class="entryTitle">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h2>
            </header>

            <div class="entryContent">
                <?php the_excerpt(); ?>
            </div>

            <footer class="entryMeta">
                <?php get_template_part('postinfo' ); ?>
            </footer>
        </div>
    </article>


    <?php endwhile; ?>


    <?php endif; ?>
</div>

<?php
// sidebar
get_sidebar();

// footer
get_footer();
?>