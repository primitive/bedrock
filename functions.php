<?php

/**
 * Bedrock theme functions and definitions
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Bedrock
 * @since 2.0.0
 */

// if(!welcome) { return "get outta my pub!" }
if ( ! defined( 'ABSPATH' ) ) { exit; }


/*
Plugin Name: Custom Image Sizes
Description: Register custom image sizes for use in your WordPress site.
*/

// Register custom image size
// Add custom image size used in Cover Template.
function custom_image_sizes() {
    add_image_size( 'bedrock-fullscreen', 1980, 9999, true ); // Change dimensions as needed
}
add_action( 'after_setup_theme', 'custom_image_sizes' );



// Add custom image size used in Cover Template.
//	add_image_size( 'twentytwenty-fullscreen', 1980, 9999 );