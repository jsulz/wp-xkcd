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

		public function get($comic) {
			//see if the transient is set
			//if it isn't, then go and get the comic and be on your way
			if ( false === ( $xkcd_transient = get_transient('xckd_comic_request' . $comic) ) )   {
				$request = $this->fetch($comic);
				set_transient('xckd_comic_request' . $comic, $request, DAY_IN_SECONDS);
				return $request;
			} 
			//if it is set, then by all means, return it
			else {
				return $xkcd_transient;
			}


		}

		public function fetch($comic) {

			$full_json = wp_remote_get( 'http://xkcd.com/' . $comic . '/info.0.json' );

			$body = wp_remote_retrieve_body($full_json);

			$body = json_decode($body);

			return $body;

		}


	}
}

?>