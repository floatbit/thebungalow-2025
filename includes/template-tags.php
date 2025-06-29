<?php

/**
 * Laravel Mix Assets helper
 */
function assets_url($path)
{
    $theme_dir = get_template_directory();

    if (file_exists($theme_dir . '/hot')) {
        // $url = file_get_contents($theme_dir . '/hot');

        return "//localhost:8080{$path}";
    }

    $manifestPath = $theme_dir . '/mix-manifest.json';
    $manifest = json_decode(file_get_contents($manifestPath), true);
    
    if (isset($manifest[$path])) {
        return get_template_directory_uri() . $manifest[$path];
    } else {
        return get_template_directory_uri() . $path;
    }
}

function get_location_logo() {
    $logo = null;
    
    // Get current post ID
    $post_id = get_the_ID();
    
    if ($post_id) {
        // Get location taxonomy terms for current post
        $location_terms = get_the_terms($post_id, 'location');
        
        if ($location_terms && !is_wp_error($location_terms)) {
            // Try to get logo from the first location term
            $location_term = $location_terms[0];
            
            // Check if current term has logo defined
            $logo = get_field('logo', 'location_' . $location_term->term_id);
        }
        
        // If no logo found on current post, check parent post
        if (!$logo) {
            $parent_post_id = wp_get_post_parent_id($post_id);
            
            if ($parent_post_id) {
                $parent_location_terms = get_the_terms($parent_post_id, 'location');
                
                if ($parent_location_terms && !is_wp_error($parent_location_terms)) {
                    $parent_location_term = $parent_location_terms[0];
                    
                    $logo = get_field('logo', 'location_' . $parent_location_term->term_id);
                }
            }
        }
    }
    
    return $logo;
}

function is_location() {
    return get_location_logo();
}

function get_location_fields() {
    $fields = [];

    $post_id = get_the_ID();
    
    if ($post_id) {
        $location_terms = get_the_terms($post_id, 'location');
        
        if ($location_terms && !is_wp_error($location_terms)) {
            $location_term = $location_terms[0];
            $fields = get_fields('location_' . $location_term->term_id);
        }
    }

    return $fields;
}