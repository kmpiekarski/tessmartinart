	<div id="footer">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer') ) : ?>
		<div class="widget">
			<h2 class="widgettitle">Tags</h2>
			<?php wp_tag_cloud(); ?>
		</div>
		<div class="widget">
			<h2 class="widgettitle">Categories</h2>
			<ul>
				<?php wp_list_categories('title_li='); ?>
			</ul>
		</div>
		<div class="widget">
			<h2 class="widgettitle">Archives</h2>
			<ul>
				<?php wp_get_archives('limit=5'); ?>
			</ul>
		</div>
		<?php endif; ?>
		<div class="clear"></div>
	</div>
	<div id="credits">
		Copyright &copy; <?php echo date('Y'); ?> &mdash; <?php bloginfo('name'); ?> | Site design by <a href="http://trevorfitzgerald.com/">Trevor Fitzgerald</a>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>










<?php

?>

<?php

?>
