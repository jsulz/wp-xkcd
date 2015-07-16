<?php

	if( ! defined( 'ABSPATH' ) ) exit;

	function js_xkcd_comic( $atts ) {

		$xkcd = new XKCD_Comic;

		$atts = shortcode_atts( array(
				'comic' 		=> '1',
				'display_title'	=> false,
				'transcript'	=> false
				), $atts 
			);

		$out = '';

		$content = $xkcd->fetch($atts['comic']);

		if ($atts['display_title']) {

			$out .= '<h3 class="xkcd-title">' . $content->safe_title .'</h3>'; 

		}

		$out .= '<img class="xkcd-img" src="' . $content->img . '" title="'. $content->alt .'" >';

		if ($atts['transcript']) {
			$out .= '<div style="display:none">' . esc_html( $content->transcript ) . '</div>';
		}

		return $out;


	}

	add_shortcode( 'xkcd', 'js_xkcd_comic' );

?>