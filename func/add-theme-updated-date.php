<?php
/* * sk-dev: test add last updated to posts */
/* * sk-dev: will this impact REST output? */

function add_last_updated_date( $content ) {
    $u_time = get_the_time('U'); 
    $u_modified_time = get_the_modified_time('U'); 
    if ($u_modified_time >= $u_time + 86400) { 
        $updated_date = get_the_modified_time('F jS, Y');
        $updated_time = get_the_modified_time('h:i a'); 
        $custom_content .= '<p class="last-updated">Last updated on '. $updated_date . ' at '. $updated_time .'</p>';  
    } 
 
    $custom_content .= $content;
    return $custom_content;
}
add_filter( 'the_content', 'add_last_updated_date' );