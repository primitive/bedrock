<?php
/**
 * Find Grandad
 * Find the ancestor of a post
 */
function find_grandad($post) {
    if ($post->post_parent) {
        $ancestors = get_post_ancestors($post->ID);
        $root = count($ancestors) - 1;
        $parent = $ancestors[ $root ];
    }
    else { $parent = $post->ID; }
    return $parent = get_post($parent);
}