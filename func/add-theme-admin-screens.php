<?php
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
