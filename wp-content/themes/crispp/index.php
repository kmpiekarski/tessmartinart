<?php get_header(); ?>

	<div id="primary">
		<div id="main">
			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
			<div class="post">
				<?php if ( !is_page() ): // don't show the date if this is a page ?>
					<div class="postdate">
						<span class="day"><?php the_time('j'); ?></span>
						<br />
						<span class="month"><?php the_time('M'); ?></span>
						<br />
						<span class="year"><?php the_time('Y'); ?></span>
					</div>
				<?php endif; ?>
				<div class="commentCount">
					<?php comments_popup_link('0', '1', '%'); ?>
				</div>
				<?php if ( is_singular() ): // if we're viewing a single post, don't link to itself ?>
					<h1><?php the_title(); ?></h1>
				<?php else: ?>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<?php endif; ?>
				<div class="content">
					<?php the_content('Continue Reading &rarr;'); ?>
					<?php wp_link_pages(); ?>
				</div>
				<?php edit_post_link('Edit','<div class="edit">','</div>'); ?>
				<?php if ( is_single() ): // only show category/tag/comment info if on we're on a single post view ?>
					<div class="postMeta">
						<div>Category: <?php the_category(', ') ?></div>
						<?php the_tags('<div>Tags: ', ', ', '</div>'); ?>
					</div>
				<?php endif; ?>
				<?php comments_template(); ?>
			</div>
			<?php endwhile; ?>
			<?php if ( !is_singular() ): // only show the next/previous navigation if we're not on a single post/page ?>
				<div class="navigation">
					<div class="alignleft"><?php next_posts_link('&laquo; Older Posts') ?></div>
					<div class="alignright"><?php previous_posts_link('Newer Posts &raquo;') ?></div>
				</div>
			<?php endif; ?>
			<?php else: // 404 ?>
				<h2>Oops! That page could not be found.</h2>
				<h3>Would you like to try searching?</h3>
				<?php get_search_form(); ?>
			<?php endif; ?>
		</div>
		<div id="sidebar">
			<?php get_sidebar(); ?>
			<div class="clear"></div>
		</div>
	</div>

<?php get_footer(); ?>
