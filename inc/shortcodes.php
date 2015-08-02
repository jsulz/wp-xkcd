<?php

if( ! defined( 'ABSPATH' ) ) exit;

function xkcd_api_embed( $atts ) {

	$xkcd = new XKCD_Comic;

	$atts = shortcode_atts( array(
			'comic' 		=> '1',
			'display_title'	=> false,
			'transcript'	=> false
			), $atts 
		);

	//check to see if the comic attribute is a valid one
	//if not, return a default setting
    if( $atts['comic'] != 'latest' && $atts['comic'] != 'random' && ! is_numeric( $atts['comic'] ) ) {
        $atts['comic'] = '1';
    }

	$out = '';

	$content = $xkcd->get( $atts['comic'] );

	if ( $atts['display_title'] ) {

		$out .= '<h3 class="xkcd-title">' . esc_attr( $content->safe_title ) .'</h3>'; 

	}
	$out .= '<a href="http://xkcd.com/' . $content->num . '" target="_blank">';
	$out .= '<img class="xkcd-img" src="' . esc_url( $content->img ) . '" title="'. esc_attr( $content->alt ) .'" >';
	$out .= '</a>';
	if ($atts['transcript']) {
		$out .= '<div style="display:none">' . esc_html( $content->transcript ) . '</div>';
	}

	return $out;


}

add_shortcode( 'xkcd', 'xkcd_api_embed' );

?>