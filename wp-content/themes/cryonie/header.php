<!DOCTYPE html>
<html <?php language_attributes() ?>>
<!--  Cryonie Wordpress Theme  (c) 2009-2014 Scriptol.com  License GNU GPL 2.0 -->
<head>
<title><?php wp_title(); ?></title>
<meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
<link rel="stylesheet" type="text/css" media="screen,projection" href="<?php bloginfo('stylesheet_url'); ?>" />
<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url') ?>" <?php _e('RSS feed', '' ) ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />

<?php wp_head() ?>

<script type="text/javascript">
function preload()
{
  var img1 = new Image();
  var img2 = new Image();
  img1.src = "wisland.jpg";
  img2.src = "logo.gif";
}
window.onload=preload;
</script>


</head>

<body <?php body_class(); ?> class="hfeed">

<div id="header">
  <div id="logoback">
  </div>
  <div id="logo"  onclick="location.href='<?php echo home_url(); ?>/';">
      <?php bloginfo('name'); ?> <br>
      <span class="sitedesc"><?php bloginfo('description'); ?></span>
  </div>
  <div id="navbar">
    <span id="navcat">
    <?php wp_list_categories('title_li=&sort_column=name&hierarchical=0&number=7') ?>
    </span>
    <span id="navpage"><?php wp_list_pages('title_li=&number=4&depth=1'); ?></span>
  </div>
</div>


<?php

?>

<?php

?>
