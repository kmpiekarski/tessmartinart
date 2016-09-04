<?php
/* Cryonie Theme for Wordpress (c) 2009-2014 Scriptol.com */
?>

<div id="leftside">
<ul class="sideul">
	
<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar() ) :  // Begin widgets 
/*
  Keep in mind that the content below will become inactive
  when widgets are moved to sidebar from the Admin panel
*/
?>


<?php if ( !is_front_page() || is_paged() ) { ?>
<li class="widget">
  <a href="<?php echo esc_url(home_url()) ?>"> <?php _e('Home', ''); ?>  </a>
</li>
<?php } ?>


<?php
/* disabled while page are on the nav bar
 echo "<li class='widget'>"; 
 wp_list_pages('title_li=<h3>'.__('Pages').'</h3>&sort_column=menu_order' )
 echo "</li>";
*/  
?>

<?php
/* Disabled on nav bat
echo "<li class='widget'>";
_e('Categories', ''); 
echo "<ul>";"
wp_list_cats('sort_column=name&hierarchical=1')
echo "</ul>";
echo "</li>";
*/
?>

<li class="widget"><?php _e('Tags', '') ?>
<ul id="tag-cloud">
<p><?php wp_tag_cloud() ?></p>
</ul>
</li>

<?php wp_list_bookmarks('title_before=&title_after=') ?>

<li class="widget"><?php _e('Meta', '') ?>
<ul>
<?php wp_register() ?>

		<li><?php wp_loginout() ?></li>
		<li><a href="<?php bloginfo('rss2_url') ?>" title="<?php echo esc_html(get_bloginfo('name'), 1) ?> RSS 2.0 Feed" rel="alternate" type="application/rss+xml"><?php _e('RSS', '') ?></a></li>
		<li>
    <a href="<?php bloginfo('comments_rss2_url') ?>" title="<?php echo esc_html(bloginfo('name'), 1) ?> Comments RSS 2.0 Feed" rel="alternate" type="application/rss+xml"><?php _e('RSS of comments', '') ?></a>
    </li>

<?php wp_meta()?>
</ul>
</li>

<li class="widget"><?php _e('Tag Search', '') ?>
<form id="searchform" method="get" action="<?php esc_url( home_url() )  ?>">
		<input id="s" name="s" type="text" value="<?php the_search_query() ?>" size="10" />
		<input id="searchsubmit" name="searchsubmit" type="submit" value="<?php _e('Search', 'cryonie') ?>" />
</form>
</li>

<li class="widget">Archives
<p id="calendar">
<?php get_calendar(); ?>
</p>
</li>



<?php endif; // End widgets ?>

</ul>
</div>
