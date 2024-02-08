<?php
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