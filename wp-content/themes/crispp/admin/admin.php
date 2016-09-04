<?php

class crisppAdmin {

	function crisppAdmin() {
		add_action('admin_menu', array(&$this, 'options_menu'));
		add_action('wp_dashboard_setup', array(&$this, 'widgetSetup'));
	}

	function options_menu() {
		add_submenu_page('themes.php', 'Crispp Theme Options', 'Crispp Theme Options', 'administrator', 'crispp-theme-options', array(&$this, 'options_page'));
	}

	function options_page() {
		if ( !empty($_POST) ) {
			check_admin_referer('crisppThemeOptions');
			$options = stripslashes_deep($_POST['option']);
			update_option('crispp_theme', $options);
			$updated = true;
			$values = $options;
		} else {
			$values = get_option('crispp_theme');
		}
		require dirname(__FILE__) . '/html/options.html.php';
	}

	function widgetSetup() {
		wp_add_dashboard_widget( 'widgetContent', 'Crispp Theme', array(&$this, 'widgetContent') );
	}

	function widgetContent() {
		require dirname(__FILE__) . '/html/dashboardWidget.html.php';
	}

}

$crisppAdmin = new crisppAdmin;
