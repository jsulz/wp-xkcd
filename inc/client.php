<?php

/**
 * Client for XKCD API
 *
 * @package     JS_XKCD
 * @since       0.1-alpha
 */

// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;


if( ! class_exists( 'XKCD' ) ) {

	class XKCD_Comic {

		public function __construct() {
			//nothing to see here
		}

		public function get( $comic ) {
			//if $comic isn't an integer then it's going to be either "latest" or "random" 
			//if that's the case, pass the value to the proper function and update the value of $comic accordingly
			if( ! is_numeric( $comic ) ) { $comic = $this->latest_or_random( $comic ); }

			//see if the transient is set

			//if it isn't, then go and get the comic and be on your way
			if ( false === ( $xkcd_transient = get_transient('xckd_comic_request__' . $comic ) ) )   {
				$request = $this->fetch( $comic );
				set_transient( 'xckd_comic_request_' . $comic, $request, DAY_IN_SECONDS );
				return $request;
			} 
			//if it is set, then by all means, return it
			else {
				return $xkcd_transient;
			}


		}

		public function latest_or_random( $comic ) {


			if ( $comic == 'latest' ) {
				$request = $this->fetch( '' );

				return $request->num;

			} elseif ( $comic = 'random' ) {

				$request = $this->fetch( '' );

				$latest = $request->num;

				$random_comic = mt_rand( 1, $latest );

				return $random_comic;

			}

		}

		public function fetch($comic) {

			$full_json = wp_remote_get( 'http://xkcd.com/' . ( $comic ? $comic . '/' : '' ) . 'info.0.json' );

			$body = wp_remote_retrieve_body( $full_json );

			$body = json_decode( $body );

			return $body;

		}


	}
}

?>