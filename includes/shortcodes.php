<?php

	function js_xkcd_xkcd_comic( $atts ) {

		$atts = shortcode_atts( array(
				'comic' 		=> '1',
				'display_title'	=> false,
				'transcript'	=> false
				), $atts 
			);

		$out = '';

		$content = js_xkcd_xkcd_get_body( $atts['comic'] );

		$content = json_decode($content);

		if ($atts['display_title']) {

			$out .= '<h3 class="xkcd-title">' . $content->safe_title .'</h3>'; 

		}

		$out .= '<img class="xkcd-img" src="' . $content->img . '" title="'. $content->alt .'" >';

		if ($atts['transcript']) {
			$out .= '<div style="display:none">' . esc_html( $content->transcript ) . '</div>';
		}

		return $out;


	}

	add_shortcode( 'xkcd', 'js_xkcd_xkcd_comic' );

	function js_xkcd_xkcd_get_body( $comic ) {

		$full_json = wp_remote_get( 'http://xkcd.com/' . $comic . '/info.0.json' );

		$body = wp_remote_retrieve_body($full_json);

		return $body;

	}
?>