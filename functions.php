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


/* *** sk-dev:(1) TBC > Is a Child Theme really needed with twentytwentytwo */

/* *** sk-dev(2): TBC > Sharing config + mirror in editor views */
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
/* */ 


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


/**
 * Force Login WP Plugin
 * Bypass Force Login to allow for REST API
 *
 */
remove_filter( 'rest_authentication_errors', 'v_forcelogin_rest_access', 99 );


/**
 * Customise the login page
 * 
 * Modify the wp-login.php 'Logo, Link and Back to' URL
*/

add_action( 'login_enqueue_scripts', 'update_login_logo' );
function update_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(https://api.primitivedigital.uk/wp-content/uploads/img/punky_logo_smcoral.png);
            width:229px;
            height:80px;
            background-size: 229px 80px;
            background-repeat: no-repeat;
            padding-bottom: 15px;
        }
    </style>
<?php }

add_filter( 'login_headertext', 'update_login_title' );
function update_login_title() { return "Primitive Digital's Big Backend"; }

add_filter( 'login_headerurl', 'update_login_logolink' );
function update_login_logolink() { return "https://primitivedigital.uk"; }

add_filter( 'home_url', 'update_login_backtolink' );
function update_login_backtolink( $url ) {
	global $pagenow;
	if( 'wp-login.php' === $pagenow ) { $url = 'https://primitivedigital.uk'; }
	return $url;
}



// Admin Bar
//add_theme_support( 'admin-bar', array( 'callback' => '__return_false' ) );


/**
 * Create a custom Theme SuperAdmin role / rights
*/

function add_custom_roles() {
    $roles_created = get_option('custom_roles_check');
    if ( !$roles_created ) {
        //remove_role('superchimp');
        add_role('superchimp', __('Theme Admin'), array('read' => true, 'edit_posts' => true, 'edit_pages' => true, 'edit_others_posts' => true, 'edit_published_posts' => true, 'edit_pages' => true, 'edit_others_pages' => true, 'edit_published_pages' => true, 'create_posts' => true, 'manage_categories' => true, 'publish_posts' => true, 'manage_options' => true, 'delete_posts' => true, 'edit_themes' => true, 'edit_theme_options' => true, 'delete_others_pages' => true, 'delete_published_pages' => true, 'delete_private_posts' => true));
        update_option( 'custom_roles_check', true );
    }
}
add_action('after_setup_theme','add_custom_roles');

/**
 * Create a Admin Menus for the theme.
 * * https://codex.wordpress.org/Adding_Administration_Menus
*/
function add_admin_menu() {

    // Create a Top-Level Menu page
    add_menu_page("Global Config and Settings", "Global Stuff", "manage_options", "theme-panel", "add_theme_settings_page", 'dashicons-admin-home', 3);
    add_menu_page('Content', 'Content', 'manage_options', 'display-panel', 'theme_intro_init', 'dashicons-welcome-widgets-menus', 3);

    // Create Second-Level Menu Items
    add_submenu_page('theme-panel', 'Set what Content to Display', 'Content Display', 'manage_options', 'homepage-settings', 'add_display_settings_page');
      
    // Create Second-Level Menu Items
    add_submenu_page('display-panel', 'Site Settings', 'Site Settings', 'manage_options', 'theme_site_settings', 'theme_settings_init');
    add_submenu_page('display-panel', 'Social Settings', 'Social Settings', 'manage_options', 'theme_social_settings', 'theme_social_init');

}
add_action("admin_menu", "add_admin_menu");

/**
 * Create Settings pages for the theme.
*/
function add_theme_settings_page() {
?>
    <div>
        <h1>Bedrock Theme Settings</h1>
        <p>Tests to expose my global config in the api</p>

        <code>
        {

            primitiveone: {
                googleAnalytics: {
                    trackingIds: ['xxx']
                },
                rootEm: "62.5%",
                breakpoints: {
                    sm: "",
                    md: "",
                    lg: "",
                    xl: ""
                }
            }
        }
        </code>

        <p>theme content display settings</p>

        <code>
            primitiveone: {

                footer: {
                    rocks: "",
                    fontfamily: "subslab",
                    text1: "- Top Banana -",
                    text2: "Web Design",
                    text3: "&",
                    text4: "Development",
                    contact: {
                    info: "Phone 0113 314 8880",
                    prompt: "to make beautiful digital stuff together"
                }
            }
        </code>

        <p>Bedrock, Twenty Twenty Child theme to work with the frontstrap theme for Frontity, see <a href="https://primitivedigital.uk/blog/primitiveone">Primitive Digital</a>.</p>
    </div>

<?php
}

function add_display_settings_page() {
?>
    <div>
        <h1>Content Display</h1>
        <p>Here you can set what is displayed in content areas.</p>

        <form method="post" action="options.php">
            <?php
            settings_fields("homepage_data");
            submit_button();
            do_settings_sections("theme-options");
            submit_button();
            ?>
        </form>

    </div>
    <?php
}


/**
 * Create Theme Admin pages ( to review )
*/

function theme_settings_init() {
    require(get_stylesheet_directory() . '/inc/settings-main.php');
    theme_settings_general_content();
}
function theme_social_init() {
    require(get_stylesheet_directory() . '/inc/bedrock-social.php');
    bedrock_social();
}
function theme_intro_init() {
    require(get_stylesheet_directory() . '/inc/bedrock-admin.php');
    bedrock_admin();
}

// https://developer.wordpress.org/reference/hooks/admin_init/
add_action("admin_init", "display_theme_panel_fields");

function display_theme_panel_fields() {

    add_settings_section("homepage_data", "Edit the fields below to make site wide changes.", null, "theme-options");
    add_settings_field("homepage_data_area", "", "display_feature_boxes", "theme-options", "homepage_data");

    register_setting("homepage_data", "first_homepage_content");
    //register_setting("homepage_data", "homepage_blurbone");
    //register_setting("homepage_data", "homepage_blurbtwo");
    //register_setting("homepage_data", "homepage_section_title_blog");
    // register_setting("homepage_data", "stores_page_feature");
    //register_setting("homepage_data", "facebook");
    //register_setting("homepage_data", "twitter");
}



function display_feature_boxes() {
    ?>
    <h2>Block 1</h2>
    <p>Enter any content for this section, typically information regarding...</p>
    <?php
        wp_editor(get_option('homepage_blurbone'), 'homepage_blurbone', $settings = array());
    ?>
    <hr>

    <h2>Block 2</h2>
    <p>Enter any content for this section, typically information.</p>
    <?php
        wp_editor(get_option('homepage_blurbtwo'), 'homepage_blurbtwo', $settings = array());
    ?>
    <hr>
    <?php
}




// REGISTER THE OPTIONS
add_action("admin_init", "theme_settings_general_fields");
add_action("admin_init", "theme_social_menu_fields");

//add_action("admin_init", "theme_featured_menu_fields");
//add_action("admin_init", "theme_services_menu_fields");


function theme_settings_general_fields() {

    add_settings_section("theme_settings_section", "", null, "theme-options");
    // Field Name
    add_settings_field("background_image", null, "theme_settings_fields", "theme-options", "theme_settings_section");
    
    add_settings_field("brand_name", null, "theme_settings_fields", "theme-options", "theme_settings_section");
    add_settings_field("brand_tag", null, "theme_settings_fields", "theme-options", "theme_settings_section");
    add_settings_field("brand_logo", null, "theme_settings_fields", "theme-options", "theme_settings_section");
    add_settings_field("brand_logo_inverse", null, "theme_settings_fields", "theme-options", "theme_settings_section");
    
    add_settings_field("brand_copyright", null, "theme_settings_fields", "theme-options", "theme_settings_section");
    add_settings_field("brand_legal", null, "theme_settings_fields", "theme-options", "theme_settings_section");
    add_settings_field("brand_address", null, "theme_settings_fields", "theme-options", "theme_settings_section");
    add_settings_field("brand_contact_phone", null, "theme_settings_fields", "theme-options", "theme_settings_section");
    add_settings_field("brand_contact_email", null, "theme_settings_fields", "theme-options", "theme_settings_section");
    
    add_settings_field("header_brand_phone", null, "theme_settings_fields", "theme-options", "theme_settings_section");
    add_settings_field("header_compnay_email", null, "theme_settings_fields", "theme-options", "theme_settings_section");
    add_settings_field("footer_location_title", null, "theme_settings_fields", "theme-options", "theme_settings_section");
    add_settings_field("footer_contactform", null, "theme_settings_fields", "theme-options", "theme_settings_section");
    add_settings_field("footer_background", null, "theme_settings_fields", "theme-options", "theme_settings_section");
    add_settings_field("footer_logo", null, "theme_settings_fields", "theme-options", "theme_settings_section");
    add_settings_field("footer_background", null, "theme_settings_fields", "theme-options", "theme_settings_section");
    
    register_setting("theme_settings_section", "brand_name");
    register_setting("theme_settings_section", "brand_tag");
    register_setting("theme_settings_section", "brand_logo");
    register_setting("theme_settings_section", "brand_logo_inverse");
    register_setting("theme_settings_section", "brand_address");
    register_setting("theme_settings_section", "brand_contact_phone");
    register_setting("theme_settings_section", "brand_contact_email");
    register_setting("theme_settings_section", "brand_copyright");
    register_setting("theme_settings_section", "brand_legal");

    register_setting("theme_settings_section", "background_image");
    register_setting("theme_settings_section", "header_brand_phone");
    register_setting("theme_settings_section", "header_brand_email");
    register_setting("theme_settings_section", "footer_location_title");
    register_setting("theme_settings_section", "footer_contactform");
    register_setting("theme_settings_section", "footer_background");
    register_setting("theme_settings_section", "footer_logo");
    register_setting("theme_settings_section", "footer_background");
}

function theme_social_menu_fields() {

    add_settings_section("themeoptions_social", "", null, "theme-social");
    
    // sk-dev: section, fieldname
    add_settings_field("header_title", null, "theme_social_menus_show_fields", "theme-social", "themeoptions_social");

    add_settings_field("twitter_social", null, "theme_social_menus_show_fields", "theme-social", "themeoptions_social");
    add_settings_field("youtube_social", null, "theme_social_menus_show_fields", "social-services", "themeoptions_social");
    add_settings_field("linkin_social", null, "theme_social_menus_show_fields", "social-services", "themeoptions_social");
    add_settings_field("pintrest_social", null, "theme_social_menus_show_fields", "social-services", "themeoptions_social");
    add_settings_field("facebook_social", null, "theme_social_menus_show_fields", "social-services", "themeoptions_social");
    add_settings_field("spotify_social", null, "theme_social_menus_show_fields", "social-services", "themeoptions_social");
    add_settings_field("instagram_social", null, "theme_social_menus_show_fields", "social-services", "themeoptions_social");

    // sk-dev: section, fieldname
    register_setting("themeoptions_social", "header_title");

    register_setting("themeoptions_social", "twitter_social");
    register_setting("themeoptions_social", "youtube_social");
    register_setting("themeoptions_social", "linkin_social");
    register_setting("themeoptions_social", "pintrest_social");
    register_setting("themeoptions_social", "facebook_social");
    register_setting("themeoptions_social", "spotify_social");
    register_setting("themeoptions_social", "instagram_social");

}

/**
 * add support for the editor colours
*/
add_theme_support( 'editor-color-palette', array(
	array(
		'name'  => __( 'Brand Primary', 'dooreightyfour' ),
		'slug'  => 'light-gray',
		'color'	=> '#f5f5f5',
	),
	array(
		'name'  => __( 'Medium gray', 'dooreightyfour' ),
		'slug'  => 'medium-gray',
		'color' => '#999',
	),
	array(
		'name'  => __( 'Bum', 'dooreightyfour' ),
		'slug'  => 'dark-gray',
		'color' => '#333',
       ),
) );


// sk-dev: TO CHECK

// sk-dev: CUSTOM / recheck
add_theme_support('automatic-feed-links');
add_theme_support('title-tag');
add_theme_support('post-thumbnails');


function find_grandad($post) {
    if ($post->post_parent) {
        $ancestors = get_post_ancestors($post->ID);
        $root = count($ancestors) - 1;
        $parent = $ancestors[ $root ];
    }
    else { $parent = $post->ID; }
    return $parent = get_post($parent);
}

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



if( function_exists('acf_add_options_page') ) { acf_add_options_page(); }

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


/**
 * Manually register custom post types
 */
// Our custom post type function
// https://developer.wordpress.org/reference/functions/register_post_type/
/*
function add_post_types() {

        register_post_type('home_scenes',
            array(
            'labels' => array(
                'public' => false,
                'name' => __('Home Scenes'),
                'singular_name' => __('Home Scene')),
                'has_archive' => false,
                'show_ui' => true,
                'menu_position' => 2,
                'menu_icon' => 'dashicons-admin-multisite',
                'rewrite' => array(
                    'slug' => 'slides'
                ),
                'supports' => false,
                )
        );

        register_post_type('stores',
            array('labels' => array(
                'name' => __('Stores'),
                'singular_name' => __('Store')),
                'public' => true,
                'has_archive' => false,
                'show_ui' => true,
                'menu_position' => 4,
                'menu_icon' => 'dashicons-admin-multisite',
                'rewrite' => array(
                    'slug' => 'stores',
                    'with_front' => true
                ),
                'supports' => array('title'),
                'show_in_rest' => true
            )
        );
}
// Hook to init
add_action('init', 'add_post_types');








/**
 * Custom Header feature.
 */
//require get_stylesheet_directory() . '/inc/custom-header.php';
/**
 * Custom template tags.
 */
//require get_stylesheet_directory() . '/inc/template-tags.php';
/**
 * Custom independent functions.
 */
//require get_stylesheet_directory() . '/inc/utils.php';
/**
 * Customised Customiser.
 */
//require get_stylesheet_directory() . '/inc/customizer.php';
