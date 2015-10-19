<?php
get_header();
get_template_part('navigation');
?>

<div class="pageContainer">
	<article class="entry entryTypePost">
		<header class="entryHeader">
			<h1 class="entryTitle">
				<?php echo '404 - '. __('Page not found', 'wikiwp'); ?>
			</h1>
		</header>
	</article>


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