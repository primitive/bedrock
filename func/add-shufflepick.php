<?php
/**
 * support for the _shuffle_and_pick WP_Query argument.
*/
add_filter( 'the_posts', function( $posts, \WP_Query $query ) {
    if( $pick = $query->get( '_shuffle_and_pick' ) )
    {
        shuffle( $posts );
        $posts = array_slice( $posts, 0, (int) $pick );
    }
    return $posts;
}, 10, 2 );