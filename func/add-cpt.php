
<?php
/**
 * Add custom post types
 *
 * @package Bedrock
 */

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