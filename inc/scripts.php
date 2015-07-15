<?php
	function js_xkcd_xkcd_styles() {
		wp_enqueue_style( 'js_xkcd_styles', plugin_dir_url( __FILE__ ) . '../css/js_xkcd_styles.css');
	}

	add_action('wp_enqueue_scripts', 'js_xkcd_xkcd_styles');

?>