<?php

/**
 * Client/manager for XKCD API
 *
 * @package     XKCD_Embed\XKCD
 * @since       0.1-alpha
 */

// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;


if( ! class_exists( 'XKCD' ) ) {

	class XKCD_Comic {

		public function __construct() {
			//nothing to see here
		}

		public function get() {
			//see if the transient is set
			//if it isn't, then go and get the comic and be on your way
			//if it is, 

		}

		public function fetch($comic) {

			$full_json = wp_remote_get( 'http://xkcd.com/' . $comic . '/info.0.json' );

			$body = wp_remote_retrieve_body($full_json);

			$body = json_decode($body);

			return $body;

		}

		public function expiration() {
		    $today  = current_time( 'today' );
	        $tomorrow   = strtotime( 'tomorrow', $today );
	        $reset_time = $tomorrow - $today;

	        return $reset_time;
		}

	}
}

?>