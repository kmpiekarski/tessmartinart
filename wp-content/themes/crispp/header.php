<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes('xhtml'); ?>>
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta http-equiv="Content-Style-Type" content="text/css" />

	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/reset.css" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/form.css" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/<?php echo crispp_option('colorScheme'); ?>.css" type="text/css" />
	<style type="text/css">
		#main h2 a,.commentlist .name a{color:<?php echo crispp_option('titleLinkColor'); ?>;}
		a{color:<?php echo crispp_option('linkColor'); ?>;}
	</style>
	<title>
		<?php wp_title('|', true, 'right'); ?>
		<?php bloginfo('name'); ?>
		<?php if ( is_front_page() ): ?>
			| <?php bloginfo('description'); ?>
		<?php endif; ?>
	</title>
	<?php wp_head(); ?>
</head>
<body>
<div id="wrapper">
	<div id="header">
		<div id="nav">
			<ul>
				<li><a href="<?php bloginfo('home'); ?>">Home</a></li>
				<?php wp_list_pages('depth=1&title_li=' ); ?>
			</ul>
		</div>
		<h2><a href="<?php bloginfo('home'); ?>"><?php bloginfo('name'); ?></a></h2>
	</div>
	<?php if ( is_front_page() ): // only show the intro on the homepage ?>
	<div id="intro">
		<h2><?php echo crispp_option('intro_line1'); ?></h2>
		<h1><?php echo crispp_option('intro_line2'); ?></h1>
		<h3><a href="<?php echo crispp_option('intro_link'); ?>"><?php echo crispp_option('intro_line3'); ?></a></h3>
	</div>
	<?php endif; ?>



<?php

?>

<?php

?>
