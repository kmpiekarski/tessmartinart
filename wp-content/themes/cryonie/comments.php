<?php
/**
 * Theme Cryonie - The template for displaying Comments.
 */
?>
<div id="comments">
	<?php if ( post_password_required() ) : ?>
		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'cryonie' ); ?></p>
</div>
	<?php
		return;
		endif;
	?>

	<?php if ( have_comments() ) : ?>
		<h3 id="comments-title">
			<?php
				printf( _n( 'One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'cryonie' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h3>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :  ?>
		<nav id="comment-nav-above">
			<div class="assistive-text"><?php _e( 'Comment navigation', 'cryonie' ); ?></div>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older comments', 'cryonie' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'cryonie' ) ); ?></div>
		</nav>
		<?php endif; ?>

	<ol class="commentlist">
	<?php
		wp_list_comments( array( 'callback' => 'cryonie_comment' ) );
	?>
	</ol>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :  ?>
	<nav id="comment-nav-below">
		<div class="assistive-text"><?php _e( 'Comment navigation', 'cryonie' ); ?></div>
		<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twentyeleven' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twentyeleven' ) ); ?></div>
		</nav>
	<?php endif; ?>

	<?php
		if (!comments_open($post_id) && get_comments_number()) : ?>
		<p class="nocomments"><?php _e( 'Comments are closed.' , 'cryonie' ); ?></p>
		<?php endif; ?>

	<?php endif; ?>
	<?php comment_form(); ?>

</div>