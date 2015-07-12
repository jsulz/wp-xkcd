<?php
/*
	Plugin Name: XKCD Embedder
	Plugin URI: http://www.lexblog.com
	Description: A plugin to add your favorite comics from XKCD
	Author: Jared Sulzdorf
	Version: 0.1-alpha
	Author URI: http://lexblog.com/
 */

	define('JS_XKCD_FOLDER', plugin_dir_path( __FILE__ ));
	define('JS_XKCD_INCLUDES', trailingslashit(JS_XKCD_FOLDER . 'includes'));
	define('JS_XKCD_SHORTCODES', JS_XKCD_INCLUDES . 'shortcodes.php');
	define('JS_XKCD_SCRIPTS', JS_XKCD_INCLUDES . 'scripts.php');
	define('JS_XKCD_WIDGET', JS_XKCD_INCLUDES . 'widget.php');


	require(JS_XKCD_SHORTCODES);
	require(JS_XKCD_SCRIPTS);
	require(JS_XKCD_WIDGET);

?>