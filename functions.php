<?php

/**
 * Bedrock functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bedrock
 * @since 1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;



/* sk-dev: random bits. we're all a little bit mad here...
*

add_action( 'wp_enqueue_scripts', 'child_enqueue_parent_styles' );
function child_enqueue_parent_styles() { wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' ); }

add_filter( 'wpseo_stylesheet_url', function( $stylesheet ) {
        if ( ! empty( $_SERVER['HTTP_HOST'] ) ) {
                $proto = is_ssl() ? 'https://' : 'http://';

                return preg_replace( '#(//[a-zA-Z0-9-.]+)#', $proto . $_SERVER['HTTP_HOST'], $stylesheet, 1 );
        } else {
                return $stylesheet;
        }
} );
*/


/* * sk-dev: START BASICS */ 

// this pulls in any styles from the parent WP theme, ie. twentytwenty
// do i need any of this??? I could put the use-system-font fallback as per CRA.

function child_enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

add_action( 'wp_enqueue_scripts', 'child_enqueue_parent_styles' );

// sk-dev: to check
function twentytwenty_remove_scripts() {
    //wp_dequeue_style( 'twentytwenty-style' );
    //wp_deregister_style( 'twentytwenty-style' );

    //wp_dequeue_script( 'twentytwenty-js' );
    //wp_deregister_script( 'twentytwenty-js' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}

function theme_enqueue_styles() {

	// Get the theme data
    $the_theme = wp_get_theme();
    
    wp_enqueue_style( 'bedrock-styles', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css', array(), $the_theme->get( 'Version' ) );



    //wp_enqueue_style( 'bedrock-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    //wp_enqueue_script( 'jquery');
    //wp_enqueue_script( 'bedrock-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );

    //wp_enqueue_style( 'fonts', 'https://fonts.googleapis.com/css?family=Josefin+Sans:100|Lato:300,400,700' );
    //wp_enqueue_style( 'icons', 'https://cdnjs.cloudflare.com/ajax/libs/ionicons/1.5.2/css/ionicons.min.css' );
    //wp_enqueue_style( 'fa', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css' );

    //wp_enqueue_style( 'build-css', get_stylesheet_directory_uri() . '/build/static/css/main.24573955.chunk.css' );
    //wp_enqueue_script( 'react', get_template_directory_uri() . '/js/react.js' );
    //wp_enqueue_script( 'build-js', get_stylesheet_directory_uri() . '/build/static/js/2.77b00cea.chunk.js', array ( 'jquery' ) );
    //wp_enqueue_script( 'main-js', get_stylesheet_directory_uri() . '/build/static/js/main.307b5e5c.chunk.js', array ( 'jquery' ) );

    /*
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    */
}

function add_theme_textdomain() {
    load_child_theme_textdomain( 'bedrock', get_stylesheet_directory() . '/languages' );
}


/* * sk-dev: END BASICS */ 



/* * sk-dev: test to allow defined origins */ 
add_filter( 'allowed_http_origins', 'add_allowed_origins' );
function add_allowed_origins( $origins ) {
    $origins[] = 'https://primitivedigital.co.uk';
    $origins[] = 'https://primitivedigital.uk';
    $origins[] = 'https://primitive.press';
    return $origins;
} 

/* * sk-dev: test to set headers for specified domains */ 
// Notice: Undefined index: HTTP_ORIGIN / https://stackoverflow.com/questions/41231116/serverhttp-origin-doesnt-work
//add_filter( 'wp_headers', 'send_cors_headers', 11, 1 );
//function send_cors_headers( $headers ) {
//   $allowed_domains = array( 'https://primitivedigital.uk','https://primitivedigital.co.uk','https://primitive.press');
//    
//    if ( ! in_array( $_SERVER[ 'HTTP_ORIGIN' ] , $allowed_domains ) ) return $headers;
//    $headers['Access-Control-Allow-Origin'] = $_SERVER[ 'HTTP_ORIGIN' ];
//    return $headers;
//}

/* * sk-dev: sledgehammer 2 */ 
//add_action('wp_headers','just_add_cors_http_header');
//function just_add_cors_http_header($headers){ $headers['Access-Control-Allow-Origin'] = '*'; return $headers; }

/* * sk-dev: sledgehammer 2 */ 
//add_action( 'rest_api_init', function() { header( "Access-Control-Allow-Origin: *" ); } );




   
add_action( 'wp_enqueue_scripts', 'twentytwenty_remove_scripts', 20 );
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
add_action( 'after_setup_theme', 'add_theme_textdomain' );





// sk-dev: CUSTOM / recheck
add_theme_support('automatic-feed-links');
add_theme_support('title-tag');
add_theme_support('post-thumbnails');