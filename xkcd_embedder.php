<?php
/*
	Plugin Name: XKCD Embedder
	Plugin URI: https://profiles.wordpress.org/jsulz
	Description: A plugin to add your favorite comics from XKCD
	Author: Jared Sulzdorf
	Version: 1.0.0
	Author URI: https://profiles.wordpress.org/jsulz
 */

// Peace out if you're trying to access this up front
if( ! defined( 'ABSPATH' ) ) exit;

//If this class don't exist, make it so
if( ! class_exists( 'XKCD_Embedder' ) ) {

	class XKCD_Embedder {

		private static $instance;

			//the magic
	        public static function instance() {
	            if( ! self::$instance ) {
	                self::$instance = new XKCD_Embedder();
	                self::$instance->plugin_constants();
	                self::$instance->plugin_requires();
	                self::$instance->xkcd_embedder_load_plugin_textdomain();
	            }

	            return self::$instance;
	        }

	    //the constants (folders and such)
		public function plugin_constants() {

			define('XKCD_EMBEDDER_FOLDER', plugin_dir_path( __FILE__ ));
			define('XKCD_EMBEDDER_INC', trailingslashit(XKCD_EMBEDDER_FOLDER . 'inc'));
			define('XKCD_EMBEDDER_CSS', XKCD_EMBEDDER_FOLDER . 'css');	
			define('XKCD_EMBEDDER_SHORTCODES', XKCD_EMBEDDER_INC . 'shortcodes.php');
			define('XKCD_EMBEDDER_SCRIPTS', XKCD_EMBEDDER_INC . 'scripts.php');
			define('XKCD_EMBEDDER_WIDGET', XKCD_EMBEDDER_INC . 'widget.php');
			define('XKCD_EMBEDDER_CLIENT', XKCD_EMBEDDER_INC . 'client.php');
		}

		//the files
		public function plugin_requires() {

			require(XKCD_EMBEDDER_SHORTCODES);
			require(XKCD_EMBEDDER_SCRIPTS);
			require(XKCD_EMBEDDER_WIDGET);
			require(XKCD_EMBEDDER_CLIENT);
		}

		//in case someone wants to translate stuff 
		public function xkcd_embedder_load_plugin_textdomain() {
	    load_plugin_textdomain( 'xkcd_embedder', FALSE, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
		}
		
	}
}

//get this show on the road
function xkcd_embedder() {
    return XKCD_Embedder::instance();
}
add_action( 'plugins_loaded', 'xkcd_embedder' );

?>