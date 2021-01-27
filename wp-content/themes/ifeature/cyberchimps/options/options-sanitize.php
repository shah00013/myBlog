<?php

/* Text */
add_filter( 'ifeature_cc_sanitize_text', 'sanitize_text_field' );

/* Text that allows all html */
function ifeature_cc_sanitize_text_html( $input ) {
	$output = wp_kses_post( $input );

	return $output;
}

add_filter( 'ifeature_cc_sanitize_text_html', 'ifeature_cc_sanitize_text_html' );

/* Unfiltered Textarea */
function ifeature_cc_sanitize_unfiltered_textarea( $input ) {
	$output = Ifeature_Helper::ifeature_cc_get_option( 'html_box', '' );
	if( current_user_can( 'unfiltered_html' ) ) {
		$output = $input;

		return $output;
	}
	else {
		return $output;
	}
}

add_filter( 'ifeature_cc_sanitize_unfiltered_textarea', 'ifeature_cc_sanitize_unfiltered_textarea' );

/* CSS Textarea */
function ifeature_cc_sanitize_csstextarea( $input ) {

	// Remove unwanted white spaces from start and end.
	$input = trim( $input );

	if( !strlen( $input ) ) {
		return $input;
	}

	$input = wp_kses_post( $input );
	if( strlen( $input ) ) {
		$output = $input;
	}
	else {
		$options = get_option( 'ifeature_cc_options' );
		$output  = $options['custom_css'];
	}

	return $output;
}

add_filter( 'ifeature_cc_sanitize_csstextarea', 'ifeature_cc_sanitize_csstextarea' );

/* Textarea */
function ifeature_cc_sanitize_textarea( $input ) {
	global $allowedposttags;
	$output = wp_kses( $input, $allowedposttags );

	return $output;
}

add_filter( 'ifeature_cc_sanitize_textarea', 'ifeature_cc_sanitize_textarea' );

/* Select */
add_filter( 'ifeature_cc_sanitize_select', 'ifeature_cc_sanitize_enum', 10, 2 );

/* Radio */
add_filter( 'ifeature_cc_sanitize_radio', 'ifeature_cc_sanitize_enum', 10, 2 );

/* Images */
add_filter( 'ifeature_cc_sanitize_images', 'ifeature_cc_sanitize_enum', 10, 2 );

/* Checkbox */
function ifeature_cc_sanitize_checkbox( $input ) {
	if( $input ) {
		$output = '1';
	}
	else {
		$output = false;
	}

	return $output;
}

add_filter( 'ifeature_cc_sanitize_checkbox', 'ifeature_cc_sanitize_checkbox' );

/* Multicheck */
function ifeature_cc_sanitize_multicheck( $input, $option ) {
	$output = '';
	if( is_array( $input ) ) {
		foreach( $option['options'] as $key => $value ) {
			$output[$key] = "0";
		}
		foreach( $input as $key => $value ) {
			if( array_key_exists( $key, $option['options'] ) && $value ) {
				$output[$key] = "1";
			}
		}
	}

	return $output;
}

add_filter( 'ifeature_cc_sanitize_multicheck', 'ifeature_cc_sanitize_multicheck', 10, 2 );

/* Toggle */
function ifeature_cc_sanitize_toggle( $input ) {
	if( $input ) {
		$output = '1';
	}
	else {
		$output = false;
	}

	return $output;
}

add_filter( 'ifeature_cc_sanitize_toggle', 'ifeature_cc_sanitize_toggle' );

/* Color Picker */
add_filter( 'ifeature_cc_sanitize_color', 'ifeature_cc_sanitize_hex' );

/* Uploader */
function ifeature_cc_sanitize_upload( $input ) {
	$output   = '';
	$filetype = wp_check_filetype( $input );

	// check if gravatar has been set as an image
	if( strpos( $input, 'gravatar' ) ) {
		$output = $input;
	}
	elseif( $filetype["ext"] ) {
		$output = $input;
	}

	return $output;
}

add_filter( 'ifeature_cc_sanitize_upload', 'ifeature_cc_sanitize_upload' );

/* Editor */
function ifeature_cc_sanitize_editor( $input ) {
	if( current_user_can( 'unfiltered_html' ) ) {
		$output = $input;
	}
	else {
		global $allowedtags;
		$output = wpautop( wp_kses( $input, $allowedtags ) );
	}

	return $output;
}

add_filter( 'ifeature_cc_sanitize_editor', 'ifeature_cc_sanitize_editor' );

/* Allowed Tags */
function ifeature_cc_sanitize_allowedtags( $input ) {
	global $allowedtags;
	$output = wpautop( wp_kses( $input, $allowedtags ) );

	return $output;
}

/* Allowed Post Tags */
function ifeature_cc_sanitize_allowedposttags( $input ) {
	global $allowedposttags;
	$output = wpautop( wp_kses( $input, $allowedposttags ) );

	return $output;
}

add_filter( 'ifeature_cc_sanitize_info', 'ifeature_cc_sanitize_allowedposttags' );

/* Check that the key value sent is valid */
function ifeature_cc_sanitize_enum( $input, $option ) {
	$output = '';
	if( $input != false ) {
		if( array_key_exists( $input, $option['options'] ) ) {
			$output = $input;
		}
	}

	return $output;
}

/* Section Order */
function ifeature_cc_sanitize_section_order( $input, $option ) {
	$output = array();
	if( is_array( $input ) ) {
		foreach( $input as $key => $value ) {
			if( array_key_exists( $key, $option['options'] ) && $key ) {
				$output[] = $key;
			}
			elseif( array_key_exists( $value, $option['options'] ) && $value ) {
				$output[] = $value;
			}
		}
	}

	return $output;
}

add_filter( 'ifeature_cc_sanitize_section_order', 'ifeature_cc_sanitize_section_order', 10, 2 );

/* Background */
function ifeature_cc_sanitize_background( $input ) {
	$output = wp_parse_args( $input, array(
		'color'      => '',
		'image'      => '',
		'repeat'     => 'repeat',
		'position'   => 'top center',
		'attachment' => 'scroll'
	) );

	$output['color']      = apply_filters( 'ifeature_cc_sanitize_hex', $input['color'] );
	$output['image']      = apply_filters( 'ifeature_cc_sanitize_upload', $input['image'] );
	$output['repeat']     = apply_filters( 'ifeature_cc_background_repeat', $input['repeat'] );
	$output['position']   = apply_filters( 'ifeature_cc_background_position', $input['position'] );
	$output['attachment'] = apply_filters( 'ifeature_cc_background_attachment', $input['attachment'] );

	return $output;
}

add_filter( 'ifeature_cc_sanitize_background', 'ifeature_cc_sanitize_background' );

function ifeature_cc_sanitize_background_repeat( $value ) {
	$recognized = ifeature_cc_recognized_background_repeat();
	if( array_key_exists( $value, $recognized ) ) {
		return $value;
	}

	return apply_filters( 'ifeature_cc_default_background_repeat', current( $recognized ) );
}

add_filter( 'ifeature_cc_background_repeat', 'ifeature_cc_sanitize_background_repeat' );

function ifeature_cc_sanitize_background_position( $value ) {
	$recognized = ifeature_cc_recognized_background_position();
	if( array_key_exists( $value, $recognized ) ) {
		return $value;
	}

	return apply_filters( 'ifeature_cc_default_background_position', current( $recognized ) );
}

add_filter( 'ifeature_cc_background_position', 'ifeature_cc_sanitize_background_position' );

function ifeature_cc_sanitize_background_attachment( $value ) {
	$recognized = ifeature_cc_recognized_background_attachment();
	if( array_key_exists( $value, $recognized ) ) {
		return $value;
	}

	return apply_filters( 'ifeature_cc_default_background_attachment', current( $recognized ) );
}

add_filter( 'ifeature_cc_background_attachment', 'ifeature_cc_sanitize_background_attachment' );

/* Typography */
function ifeature_cc_sanitize_typography( $input, $option ) {

	$output = wp_parse_args( $input, array(
		'size'  => '',
		'face'  => '',
		'style' => '',
		'color' => ''
	) );

	if( isset( $option['options']['faces'] ) && isset( $input['face'] ) ) {
		if( !( array_key_exists( $input['face'], $option['options']['faces'] ) ) ) {
			$output['face'] = '';
		}
	}
	else {
		$output['face'] = apply_filters( 'ifeature_cc_font_face', $output['face'] );
	}

	$output['size']  = apply_filters( 'ifeature_cc_font_size', $output['size'] );
	$output['style'] = apply_filters( 'ifeature_cc_font_style', $output['style'] );
	$output['color'] = apply_filters( 'ifeature_cc_sanitize_color', $output['color'] );

	return $output;
}

add_filter( 'ifeature_cc_sanitize_typography', 'ifeature_cc_sanitize_typography', 10, 2 );

function ifeature_cc_sanitize_font_size( $value ) {
	$recognized  = ifeature_cc_recognized_font_sizes();
	$value_check = preg_replace( '/px/', '', $value );
	if( in_array( (int)$value_check, $recognized ) ) {
		return $value;
	}

	return apply_filters( 'ifeature_cc_default_font_size', $recognized );
}

add_filter( 'ifeature_cc_font_size', 'ifeature_cc_sanitize_font_size' );

function ifeature_cc_sanitize_font_style( $value ) {
	$recognized = ifeature_cc_recognized_font_styles();
	if( array_key_exists( $value, $recognized ) ) {
		return $value;
	}

	return apply_filters( 'ifeature_cc_default_font_style', current( $recognized ) );
}

add_filter( 'ifeature_cc_font_style', 'ifeature_cc_sanitize_font_style' );

function ifeature_cc_sanitize_font_face( $value ) {
	$recognized = ifeature_cc_recognized_font_faces();
	if( array_key_exists( $value, $recognized ) ) {
		return $value;
	}

	return apply_filters( 'ifeature_cc_default_font_face', current( $recognized ) );
}

add_filter( 'ifeature_cc_font_face', 'ifeature_cc_sanitize_font_face' );

/**
 * Get recognized background repeat settings
 *
 * @return   array
 *
 */
function ifeature_cc_recognized_background_repeat() {
	$default = array(
		'no-repeat' => __( 'No Repeat', 'ifeature' ),
		'repeat-x'  => __( 'Repeat Horizontally', 'ifeature' ),
		'repeat-y'  => __( 'Repeat Vertically', 'ifeature' ),
		'repeat'    => __( 'Repeat All', 'ifeature' ),
	);

	return apply_filters( 'ifeature_cc_recognized_background_repeat', $default );
}

/**
 * Get recognized background positions
 *
 * @return   array
 *
 */
function ifeature_cc_recognized_background_position() {
	$default = array(
		'top left'      => __( 'Top Left', 'ifeature' ),
		'top center'    => __( 'Top Center', 'ifeature' ),
		'top right'     => __( 'Top Right', 'ifeature' ),
		'center left'   => __( 'Middle Left', 'ifeature' ),
		'center center' => __( 'Middle Center', 'ifeature' ),
		'center right'  => __( 'Middle Right', 'ifeature' ),
		'bottom left'   => __( 'Bottom Left', 'ifeature' ),
		'bottom center' => __( 'Bottom Center', 'ifeature' ),
		'bottom right'  => __( 'Bottom Right', 'ifeature' )
	);

	return apply_filters( 'ifeature_cc_recognized_background_position', $default );
}

/**
 * Get recognized background attachment
 *
 * @return   array
 *
 */
function ifeature_cc_recognized_background_attachment() {
	$default = array(
		'scroll' => __( 'Scroll Normally', 'ifeature' ),
		'fixed'  => __( 'Fixed in Place', 'ifeature' )
	);

	return apply_filters( 'ifeature_cc_recognized_background_attachment', $default );
}

/**
 * Sanitize a color represented in hexidecimal notation.
 *
 * @param    string    Color in hexidecimal notation. "#" may or may not be prepended to the string.
 * @param    string    The value that this function should return if it cannot be recognized as a color.
 *
 * @return   string
 *
 */
function ifeature_cc_sanitize_hex( $hex, $default = '' ) {
	if( ifeature_cc_validate_hex( $hex ) ) {
		return $hex;
	}

	return $default;
}

/**
 * Get recognized font sizes.
 *
 * Returns an indexed array of all recognized font sizes.
 * Values are integers and represent a range of sizes from
 * smallest to largest.
 *
 * @return   array
 */
function ifeature_cc_recognized_font_sizes() {
	$sizes = range( 8, 71 );
	$sizes = apply_filters( 'ifeature_cc_recognized_font_sizes', $sizes );
	$sizes = array_map( 'absint', $sizes );

	return $sizes;
}

/**
 * Get recognized font faces.
 *
 * Returns an array of all recognized font faces.
 * Keys are intended to be stored in the database
 * while values are ready for display in in html.
 *
 * @return   array
 *
 */
function ifeature_cc_recognized_font_faces() {
	$default = array(
		'arial'     => 'Arial',
		'verdana'   => 'Verdana, Geneva',
		'trebuchet' => 'Trebuchet',
		'georgia'   => 'Georgia',
		'times'     => 'Times New Roman',
		'tahoma'    => 'Tahoma, Geneva',
		'palatino'  => 'Palatino',
		'helvetica' => 'Helvetica*'
	);

	return apply_filters( 'ifeature_cc_recognized_font_faces', $default );
}

/**
 * Get recognized font styles.
 *
 * Returns an array of all recognized font styles.
 * Keys are intended to be stored in the database
 * while values are ready for display in in html.
 *
 * @return   array
 *
 */
function ifeature_cc_recognized_font_styles() {
	$default = array(
		'normal'      => __( 'Normal', 'ifeature' ),
		'italic'      => __( 'Italic', 'ifeature' ),
		'bold'        => __( 'Bold', 'ifeature' ),
		'bold italic' => __( 'Bold Italic', 'ifeature' )
	);

	return apply_filters( 'ifeature_cc_recognized_font_styles', $default );
}

/**
 * Is a given string a color formatted in hexidecimal notation?
 *
 * @param    string    Color in hexidecimal notation. "#" may or may not be prepended to the string.
 *
 * @return   bool
 *
 */
function ifeature_cc_validate_hex( $hex ) {
	$hex = trim( $hex );

	/* Strip recognized prefixes. */
	if( 0 === strpos( $hex, '#' ) ) {
		$hex = substr( $hex, 1 );
	}
	elseif( 0 === strpos( $hex, '%23' ) ) {
		$hex = substr( $hex, 3 );
	}

	/* Regex match. */
	if( 0 === preg_match( '/^[0-9a-fA-F]{6}$/', $hex ) ) {
		return false;
	}
	else {
		return true;
	}
}