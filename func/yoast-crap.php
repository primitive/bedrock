<?php

/**
 * Yoast Filters, see:
 */
// https://wordpress.org/support/topic/cant-understand-how-to-remove-wp-prefix-from-post-sitemap-xml/
// https://gist.github.com/mohandere/4286103ce313d0cd6549
// https://gist.github.com/amboutwe/8cfb7a3d8f05e580867341d4ff84141d

// sk-dev: this fails, Yoast removes external urls
// pretty easy to hack the pluging files to fix but that prevents auto-updates

//add_filter( 'wpseo_xml_sitemap_post_url', 'filter_wpseo_xml_sitemap_post_url', 10, 2 );
//function filter_wpseo_xml_sitemap_post_url($get_permalink, $post) { 
//	return str_replace("api.primitivedigital.uk", "primitivedigital.uk", $get_permalink);
//}
// https://github.com/Yoast/wordpress-seo/issues/14240
// https://wordpress.org/support/topic/canonicalized-urls-to-external-domain-not-in-sitemap/

/*
add_filter( 'wpseo_stylesheet_url', function( $stylesheet ) {
    if ( ! empty( $_SERVER['HTTP_HOST'] ) ) {
            $proto = is_ssl() ? 'https://' : 'http://';
            return preg_replace( '#(//[a-zA-Z0-9-.]+)#', $proto . $_SERVER['HTTP_HOST'], $stylesheet, 1 );
    } else {
            return $stylesheet;
    }
} );
/*


// keep in mind, sitemaps are cached. for development disable it using:
add_filter( 'wpseo_enable_xml_sitemap_transient_caching', '__return_false');