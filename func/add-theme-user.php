<?php
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