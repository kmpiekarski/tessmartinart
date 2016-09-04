
<?php 
/*
  Encyclopedia Wordpress Theme
  (c) 2009 Scriptol.com
  Licence GNU GPL 2.0
*/

get_header(); 
get_sidebar(); 
?>

<div id="container">

<h1>Page not found</h1>

<br>

<h2>Last articles</h2>
<ul> 
    <?php wp_get_archives('type=postbypost&limit=10'); ?>
</ul> 
</div>

</div>


<?php get_footer(); ?>

