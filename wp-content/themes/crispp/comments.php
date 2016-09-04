<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) {
		echo '<p class="nocomments">This post is password protected. Enter the password to view comments.</p>';
		return;
	}
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
	<h3 id="comments"><?php comments_number('No Responses', 'One Response', '% Responses' );?></h3>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>

	<ul class="commentlist">
		<?php wp_list_comments(array(
			'style'    => 'ul',
			'callback' => 'crispp_custom_comments'
		)); ?>
	</ul>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>

<?php else : // this is displayed if there are no comments so far ?>
	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->
	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed.</p>
	<?php endif; ?>
<?php endif; ?>

<?php if ( comments_open() ) : ?>
<div id="respond">

	<div class="cancel-comment-reply">
		<?php cancel_comment_reply_link('Cancel Reply'); ?>
	</div>
	<h3><?php comment_form_title( 'Leave a Reply', 'Reply to %s' ); ?></h3>

	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
	<?php else : ?>

		<form id="commentForm" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" class="form">
			<?php if ( is_user_logged_in() ) : ?>
				<div class="loggedIn">
					You are logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>.
					<a href="<?php echo wp_logout_url(get_permalink()); ?>">Log out?</a>
				</div>
			<?php else : ?>
				<div>
					<label for="author">Name:</label>
					<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" tabindex="1" class="required" />
				</div>
				<div>
					<label for="email">Email:</label>
					<input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" tabindex="2" class="required" />
				</div>
				<div>
					<label for="url">Website:</label>
					<input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" tabindex="3" />
				</div>
			<?php endif; ?>
			<div>
				<label for="comment">Message:</label>
				<textarea name="comment" id="comment" tabindex="4" class="required" rows="5" cols="20"></textarea>

			</div>
			<div class="buttons">
				<label>&nbsp;</label>
				<button type="submit" class="positive">
					<img src="<?php bloginfo('template_url'); ?>/images/tick.png" alt=""/> Submit Comment
				</button>
				<?php comment_id_fields(); ?>
			</div>
			<?php do_action('comment_form', $post->ID); ?>
		</form>

	<?php endif; // If registration required and not logged in ?>
</div>
<?php endif; // if you delete this the sky will fall on your head ?>
