<div class="wrap">
	<h2>Crispp Theme Options</h2>

	<?php if ( $updated ): ?>
		<div id="message" class="updated fade below-h2">
			<p><strong>Success!</strong> The changes have been made.</p>
		</div>
	<?php endif; ?>

	<p>Crispp is a clean, minimal WordPress theme developed by <a href="http://trevorfitzgerald.com" target="_blank">Trevor Fitzgerald</a>.</p>
	<p>You can manage the look &amp; feel of your site with just a few options controlled through this administration panel. Feel free to experiment with different configurations until you're happy!</p>

	<form id="customForm" action="themes.php?page=crispp-theme-options.php" method="post">
	<table class="form-table">
		<tbody>
			<tr valign="top">
				<th scope="row" class="required">Color Scheme:</th>
				<td>
					<label>
						<input type="radio" name="option[colorScheme]" value="light" <?php if ( $values['colorScheme'] == 'light' ) echo 'checked="checked"'; ?> />
						Light
					</label>
					<label>
						<input type="radio" name="option[colorScheme]" value="dark" <?php if ( $values['colorScheme'] == 'dark' ) echo 'checked="checked"'; ?> />
						Dark
					</label>
					<br />
					* Crispp comes with 2 options that control the background colors of the site.
				</td>
			</tr>
			<?php
			$colors = array(
				'Red' => '#ff0e3f',
				'Blue' => '#0082ff',
				'Orange' => '#ff6600',
				'Green' => '#009933',
				'Purple' => '#6633ff',
				'Brown' => '#664f39',
			);
			?>
			<tr valign="top">
				<th scope="row" class="required"><label for="option-linkColor">Link Color:</label></th>
				<td>
					<?php foreach ( $colors as $key=>$value ): ?>
					<label>
						<input type="radio" name="option[linkColor]" value="<?php echo $value; ?>" <?php if ( $values['linkColor'] == $value ) echo 'checked="checked"'; ?> />
						<span style="font-weight: bold; color: <?php echo $value; ?>;"><?php echo $key; ?></span>
					</label>
					<?php endforeach; ?>
					<br />
					* Includes navigation, sidebar, content, &amp; footer links.
				</td>
			</tr>
			<tr valign="top">
				<th scope="row" class="required"><label for="option-titleLinkColor">Title Link Color:</label></th>
				<td>
					<?php foreach ( $colors as $key=>$value ): ?>
					<label>
						<input type="radio" name="option[titleLinkColor]" value="<?php echo $value; ?>" <?php if ( $values['titleLinkColor'] == $value ) echo 'checked="checked"'; ?> />
						<span style="font-weight: bold; color: <?php echo $value; ?>;"><?php echo $key; ?></span>
					</label>
					<?php endforeach; ?>
					<br />
					* Includes color for post title links.
				</td>
			</tr>
			<tr valign="top">
				<th scope="row" class="required"><label for="option-intro_line1">Homepage Intro Line 1:</label></th>
				<td>
					<input id="option-intro_line1" type="text" class="regular-text input-required" name="option[intro_line1]" value="<?php echo htmlentities($values['intro_line1']); ?>" />
				</td>
			</tr>
			<tr valign="top">
				<th scope="row" class="required"><label for="option-intro_line2">Homepage Intro Line 2:</label></th>
				<td>
					<input id="option-intro_line2" type="text" class="regular-text input-required" name="option[intro_line2]" value="<?php echo htmlentities($values['intro_line2']); ?>" />
				</td>
			</tr>
			<tr valign="top">
				<th scope="row" class="required"><label for="option-intro_line3">Homepage Intro Line 3:</label></th>
				<td>
					<input id="option-intro_line3" type="text" class="regular-text input-required" name="option[intro_line3]" value="<?php echo htmlentities($values['intro_line3']); ?>" />
				</td>
			</tr>
			<tr valign="top">
				<th scope="row" class="required"><label for="option-intro_link">Homepage Intro Link:</label></th>
				<td>
					<input id="option-intro_link" type="text" class="regular-text input-required" name="option[intro_link]" value="<?php echo htmlentities($values['intro_link']); ?>" />
					<br />
					* Link destination for line #3
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"></th>
				<td>
					<input type="submit" name="Submit" class="button-primary" value="Save Changes" />
				</td>
			</tr>
		</tbody>
	</table>
	<?php if (function_exists('wp_nonce_field')) wp_nonce_field('crisppThemeOptions'); ?>
	</form>

	<h2>Look me up!</h2>
	<p>Get the latest news on my WordPress plugin and theme development. Or just feel free to say "Hi!". You can find me around the web at these sites:</p>
	<?php
	$sites = array(
		'My Website' => 'http://trevorfitzgerald.com/',
		'Twitter' => 'http://twitter.com/fitztrev',
		'Linked In' => 'http://www.linkedin.com/in/trevorfitzgerald',
	);
	?>
	<ul class="ul-disc">
		<?php foreach ( $sites as $site=>$url ): ?>
		<li><a href="<?php echo $url; ?>" target="_blank"><?php echo $site; ?></a></li>
		<?php endforeach; ?>
	</ul>

	<h2>Premium Support</h2>
	<p>If you would like any customizations or development work on your site, please <a href="http://trevorfitzgerald.com/contact/" target="_blank">contact me</a>. I specialize in WordPress and offer premium support &amp; development services. You can find out more about my work on <a href="http://trevorfitzgerald.com/" target="_blank">my website</a>.</p>

	<h2>Furthermore</h2>
	<p>Do you like this theme or find it useful? Please make a donation, no matter the amount, so that I can continue to spend time developing plugins &amp; themes.</p>

	<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
	<input type="hidden" name="cmd" value="_s-xclick">
	<input type="hidden" name="hosted_button_id" value="10538153">
	<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
	<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
	</form>

</div>
