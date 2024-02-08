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


/* *** sk-dev: TBC > This should only include "theme" related config */

/*
Plugin Name: Custom Image Sizes
Description: Register custom image sizes for use in your WordPress site.
*/

// Register custom image size
// Add custom image size used in Cover Template.
function custom_image_sizes() {
    add_image_size( 'bedrock-custom', 1980, 9999 ); // Change dimensions as needed, add true to crop.
}
add_action( 'after_setup_theme', 'custom_image_sizes' );




/* *** VARS FOR LOGIN FRONTEND/BACKEND SETUP *** */ 

// $bedrock_login_headertext = "Primitive Digital's Big Backend";
// $bedrock_login_logolink = "https://primitivedigital.uk";
// $bedrock_login_backtolink = "https://primitivedigital.uk";

// sk-dev: TO CHECK if needed
// add_theme_support('automatic-feed-links');
// add_theme_support('title-tag');
// add_theme_support('post-thumbnails');