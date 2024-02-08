<?php

/**
 * Bedrock theme functions and definitions
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Bedrock
 * @since 1.0.0
 */

// if(!welcome) { return "get outta my pub!" }
if ( ! defined( 'ABSPATH' ) ) { exit; }

/* *** sk-dev:(1) TBC > Is a Child Theme really needed with block themes / headless */

/* *** sk-dev(2): TBC > Sharing config + mirror in editor views */

/* *** sk-dev(3): TBC > This should only include "theme" related config */

/* *** VARS TO EXTRACT *** */ 

$bedrock_login_headertext = "Primitive Digital's Big Backend";
$bedrock_login_logolink = "https://primitivedigital.uk";
$bedrock_login_backtolink = "https://primitivedigital.uk";



/* *** sk-dev(3): TBC > All this needs a review and tidy up */

/* *** START BASICS *** */ 

// this pulls in any styles from the parent WP theme, ie. twentytwentytwo
// do i need any of this??? I could put the use-system-font fallback as per CRA.
function child_enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}
add_action( 'wp_enqueue_scripts', 'child_enqueue_parent_styles' );

// remove unwanted parent theme stylesheet/scripts from inc/enqueue.php
//function remove_parent_scripts() {
    //wp_dequeue_style( 'twentytwentytwo-style' );
    //wp_deregister_style( 'twentytwentytwo-style' );
    //wp_dequeue_script( 'twentytwentytwo-js' );
    //wp_deregister_script( 'twentytwentytwo-js' );
//}

function bedrock_enqueue_styles() {

	// Get the theme data
    $the_theme = wp_get_theme();

    if( is_user_logged_in() && !current_user_can( 'administrator' ) ) {
        wp_enqueue_style( 'bedrock-styles', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css', array(), $the_theme->get( 'Version' ) );
    }
    
    //wp_enqueue_style( 'bedrock-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    //wp_enqueue_script( 'jquery');
    //wp_enqueue_script( 'bedrock-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );

    //wp_enqueue_style( 'fonts', 'https://fonts.googleapis.com/css?family=Josefin+Sans:100|Lato:300,400,700' );
    //wp_enqueue_style( 'icons', 'https://cdnjs.cloudflare.com/ajax/libs/ionicons/1.5.2/css/ionicons.min.css' );
    //wp_enqueue_style( 'fa', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css' );

    /*
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    */
}

function add_theme_textdomain() {
    load_child_theme_textdomain( 'bedrock', get_stylesheet_directory() . '/languages' );
}
// add_action( 'wp_enqueue_scripts', 'remove_parent_scripts', 20 );
add_action( 'wp_enqueue_scripts', 'bedrock_enqueue_styles' );
add_action( 'after_setup_theme', 'add_theme_textdomain' );

/* * sk-dev: END BASICS */ 
/* */



// sk-dev: TO CHECK
// sk-dev: CUSTOM / recheck
// add_theme_support('automatic-feed-links');
// add_theme_support('title-tag');
// add_theme_support('post-thumbnails');
