<?php


if ( ! isset( $content_width ) ) {
	$content_width = 1920;
}

function cryonie_setup() {
	// argument if true if you want feed for comments and for posts comments
	add_theme_support( 'automatic-feed-links' );	
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 672, 372, true );
	add_filter( 'use_default_gallery_style', '__return_false' );
}
add_action( 'after_setup_theme', 'cryonie_setup' );


function cryonie_widgets_init() {
register_sidebar(array(
	'name'          => __( 'Cryonie_sidebar', 'cryonie' ),
	'id'            => 'sb0001',
	'description'   => '',
    'class'         => '',
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget' => '</li>',
	'before_title' => '',
	'after_title' => '',
));
}
add_action( 'widgets_init', 'cryonie_widgets_init' );


function cryonie_wp_title( $title, $sep ) {
	if(is_feed()) 		return $title;
	if(is_404())           $title= _e('Page not found',''); 
	elseif (is_home())     $title= bloginfo('description')." - ".bloginfo('name'); 
	elseif (is_category()) $title= single_cat_title();
	elseif (is_date())     $title= _e('Archives', ''). " of ".bloginfo('name'); 
	elseif (is_search())   $title= _e('Search results', ''); 
	else $title=the_title();
	
	return $title; 
}

add_filter( 'wp_title', 'cryonie_wp_title', 10, 2 );


add_filter( 'comments_open', 'my_comments_open', 10, 2 );

function my_comments_open( $open, $post_id ) {

	$post = get_post( $post_id );

	if ( 'page' == $post->post_type )
		$open = false;

	return $open;
}

function cryonie_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'cryonie' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'cryonie' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 68;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 39;

						echo get_avatar( $comment, $avatar_size );

						/* translators: 1: comment author, 2: date and time */
						printf( __( '%1$s on %2$s <span class="says">said:</span>', 'cryonie' ),
							sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
							sprintf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s at %2$s', 'cryonie' ), get_comment_date(), get_comment_time() )
							)
						);
					?>

					<?php edit_comment_link( __( 'Edit', 'cryonie' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-author .vcard -->

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'cryonie' ); ?></em>
					<br />
				<?php endif; ?>

			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'cryonie' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}


function cryonie_scripts() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}	

add_action( 'wp_enqueue_scripts', 'cryonie_scripts' );