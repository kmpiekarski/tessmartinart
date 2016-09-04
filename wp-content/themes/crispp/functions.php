<?php

/* Add some default options if not already set */
$defaultOptions = array(
	'intro_line1' => 'Hello, my name is Trevor.',
	'intro_line2' => 'I am a web developer, designer, and all-around nice guy.',
	'intro_line3' => 'Let\'s get in touch...',
	'intro_link'  => '#',
	'colorScheme' => 'light',
	'linkColor' => '#ff0e3f',
	'titleLinkColor' => '#0082ff',
);
add_option('crispp_theme', $defaultOptions);

/* Register Widgets */
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name' => 'Footer',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));
}

/* *** */

function crispp_option($option) {
	$options = get_option('crispp_theme');
	return htmlentities($options[$option]);
}

wp_enqueue_script('youtubeResize', get_bloginfo('template_url') . '/js/youtubeResize.js', array('jquery'), '1.0');
wp_enqueue_script('crispp', get_bloginfo('template_url') . '/js/crispp.js', array('jquery'), '1.0');

function crispp_custom_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	require 'comment.php';
}

if ( is_admin() ) {
	require 'admin/admin.php';
}
