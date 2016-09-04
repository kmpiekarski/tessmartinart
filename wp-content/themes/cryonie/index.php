<?php 
/* Cryonie Wordpress Theme  (c) 2009-2014 Scriptol.com  
   Licence GNU GPL 2.0 - Keep this copyrigth notice. */
get_header();
get_sidebar(); 
?>

<div id="wrapper">
<div id="home"  id="post-<?php the_ID(); ?>" <?php post_class(); ?>

<h1>
<?php 
	if (is_category()) single_cat_title();
	elseif (is_search()) bloginfo('name'); 
	else wp_title('',true); 
?>
</h1>

<?php while ( have_posts() ) : the_post() ?>

  <div id="<?php the_ID() ?>" class="excerpt">
    <h2><a href="<?php the_permalink() ?>"> <?php the_title() ?></a></h2>
    <div class="summary">
      <?php the_content('<span class="more">'.__('More...', '').'</span>'); ?>
    </div>
  
	   <div class="homeinfo">
		    <span class="author" title="Author of the article">By <?php the_author_link();  ?> on </span>
		    <span class="date" title="First publised"><?php the_date(); ?></span> | 
		    <span class="category" title="Category of the article"><?php the_category(', ') ?></span>
		    <span class="comments"><?php
         if(comments_open())
         {
            echo " | ";
            comments_popup_link(
             __('A comment?', ''),
             __('1 comment', ''),
             __('% comments', ''),
             'comments-link',
             'Shuttt'); 
         } 
        ?> 
        </span>  
        <span class="edit"><?php edit_post_link(__('Edit', ''), '', ''); ?></span>
        <br>
        <span class="tags"><?php the_tags(); ?></span> 
	   </div>

  </div> <!--id/excerpt-->
  
<?php endwhile ?>  
  
<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

<div class="navigation">
    <div class="alignleft"><?php previous_posts_link(__('Newer entries', 'encyclopedia')) ?></div>
    <div class="alignright"><?php next_posts_link(__('Older entries', 'encyclopedia')) ?></div>			
</div>

<div class="commentpanel"></div>



<div class="lastlist">
<p>Last articles</p>
<ul> 
    <?php wp_get_archives('type=postbypost&limit=10'); ?>
</ul> 
</div>

</div> <!--home-->
</div> <!--wrapper-->

<?php get_footer() ?>