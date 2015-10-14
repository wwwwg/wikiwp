<article class="entry entryTypePost">
    <header class="entryHeader">
        <h1 class="entryTitle">
            <?php the_title(); ?>
        </h1>
    </header>

    <div class="entryContent">
        <?php
            the_content();

            //bornholm_the_content();
        ?>
    </div>

    <footer class="entryMeta">
        <?php
            get_template_part('postinfo' );

            //bornholm_footer_meta();
        ?>
    </footer>
</article>