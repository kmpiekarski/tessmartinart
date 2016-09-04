<li id="comment-<?php comment_ID(); ?>" <?php if ($comment->user_id == get_the_author_meta('ID')) echo 'class="author"'; ?>>
	<?php if ( get_option('show_avatars') ): ?>
	<div class="authorAvatar">
		<?php echo get_avatar($comment, 48); ?>
	</div>
	<div class="comment">
	<?php else: ?>
	<div class="comment comment-no-avatar">
	<?php endif; ?>
		<div class="actions">
			<?php edit_comment_link('Edit','',' | ') ?>
			<?php comment_reply_link(array_merge( $args, array('reply_text' => 'Reply', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</div>

		<div class="name"><?php comment_author_link(); ?></div>
		<div class="date">
			<?php comment_date(); ?> at <?php comment_time(); ?>
		</div>

		<?php if ($comment->comment_approved == 0) : ?>
			<div class="success">Thank you for your comment. It is currently awaiting moderation but will appear on the site once approved.</div>
		<?php endif; ?>

		<div class="comment-text">
			<?php comment_text() ?>
		</div>
	</div>
