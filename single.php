<?php
	get_header();
	get_template_part('navigation');

	// post
	while ( have_posts() ) : the_post();
?>

<div class="post-container">
	<?php
		// get content format
		get_template_part( 'content', get_post_format() );


		// comments
		comments_template();
		endwhile;

		// sidebar
		get_sidebar();
	?>

	<div class="last-posts-list postinfo class="clearfix"">
		<hr>
		<h4 class="lastPostsListTitle">
			<?php echo __('Last posts', 'wikiwp'); ?>
		</h4>

		<ul>
			<?php wp_get_archives('type=postbypost&limit=10'); ?>
		</ul>
	</div>
</div>

<?php get_footer(); ?>