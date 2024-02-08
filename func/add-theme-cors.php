<?php

/* * sk-dev: CORS / Headless / Decoupled / SSL tests 

WP/PHP host:
To keep the native staging, cache plugin and wp tools I need to install wp to the root directory.
A records not supported on the root domain.
CCA records not supported.
Free SSL certs, need to use the hosts nameservers
XSL files ignore x-origin headers

*/ 

function add_cors_http_header(){
    header("Access-Control-Allow-Origin: *");
}
add_action('init','add_cors_http_header');

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

/* * sk-dev: test to allow defined origins - CORS */ 
//function add_allowed_origins( $origins ) {
//   $origins[] = 'https://primitivedigital.co.uk';
//    $origins[] = 'https://primitivedigital.uk';
//    $origins[] = 'https://primitive.press';
//    return $origins;
//} 
//add_filter( 'allowed_http_origins', 'add_allowed_origins' );

/* * sk-dev: sledgehammer 2 */ 
//add_action('wp_headers','just_add_cors_http_header');
//function just_add_cors_http_header($headers){ $headers['Access-Control-Allow-Origin'] = '*'; return $headers; }

/* * sk-dev: sledgehammer 3 */ 
//add_action( 'rest_api_init', function() { header( "Access-Control-Allow-Origin: *" ); } );
