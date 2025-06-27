<?php
/**
 * Add theme support
 */
add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    add_theme_support('editor-styles');
    add_editor_style('dist/editor.css');

    register_nav_menus([
        'main_navigation' => __('Main Navigation'),
    ]);

    // Add ACF options page
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page([
            'page_title' => 'Global Options',
            'menu_slug' => 'global-options',
        ]);
    }
});

/**
 * Enqueue script and styles
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('app', assets_url('/dist/app.css'), [], null);
    wp_enqueue_script('app', assets_url('/dist/app.js'), ['jquery'], null, true);

    // Register script for blocks
    // If needed, separate the script per block
    wp_register_script('blocks/text', assets_url('/dist/blocks/text.js'), ['jquery'], null, true);
});

/**
 * Output location-based colors from ACF taxonomy fields
 */
function output_location_colors() {
    $primary_color = null;
    $primary_dark_color = null;
    $secondary_color = null;
    $secondary_dark_color = null;
    
    // Get current post ID
    $post_id = get_the_ID();
    
    if ($post_id) {
        // Get location taxonomy terms for current post
        $location_terms = get_the_terms($post_id, 'location');
        
        if ($location_terms && !is_wp_error($location_terms)) {
            // Try to get colors from the first location term
            $location_term = $location_terms[0];
            
            // Check if current term has colors defined
            $primary_color = get_field('primary_color', 'location_' . $location_term->term_id);
            $primary_dark_color = get_field('primary_dark_color', 'location_' . $location_term->term_id);
            $secondary_color = get_field('secondary_color', 'location_' . $location_term->term_id);
            $secondary_dark_color = get_field('secondary_dark_color', 'location_' . $location_term->term_id);
        }
            
        // If no colors found on current post, check parent post
        if (!$primary_color || !$primary_dark_color || !$secondary_color || !$secondary_dark_color) {
            $parent_post_id = wp_get_post_parent_id($post_id);
            
            if ($parent_post_id) {
                $parent_location_terms = get_the_terms($parent_post_id, 'location');
                
                if ($parent_location_terms && !is_wp_error($parent_location_terms)) {
                    $parent_location_term = $parent_location_terms[0];
                    
                    $primary_color = $primary_color ?: get_field('primary_color', 'location_' . $parent_location_term->term_id);
                    $primary_dark_color = $primary_dark_color ?: get_field('primary_dark_color', 'location_' . $parent_location_term->term_id);
                    $secondary_color = $secondary_color ?: get_field('secondary_color', 'location_' . $parent_location_term->term_id);
                    $secondary_dark_color = $secondary_dark_color ?: get_field('secondary_dark_color', 'location_' . $parent_location_term->term_id);
                }
            }
        }
    }
    
    // Set default colors if none found
    $primary_color = $primary_color ?: '#3B82F6'; // Default blue
    $primary_dark_color = $primary_dark_color ?: '#1D4ED8'; // Default dark blue
    $secondary_color = $secondary_color ?: '#EF4444'; // Default red
    $secondary_dark_color = $secondary_dark_color ?: '#DC2626'; // Default dark red
    
    // Output CSS custom properties
    echo '<style>';
    echo ':root {';
    echo '  --color-primary: ' . $primary_color . ';';
    echo '  --color-primary-dark: ' . $primary_dark_color . ';';
    echo '  --color-secondary: ' . $secondary_color . ';';
    echo '  --color-secondary-dark: ' . $secondary_dark_color . ';';
    echo '}';
    echo '</style>';
}

/**
 * Hook to output location colors in wp_head
 */
add_action('wp_head', 'output_location_colors');

/**
 * Allow SVG uploads to media library
 */
function allow_svg_uploads($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'allow_svg_uploads');

/**
 * Fix SVG display in media library
 */
function fix_svg_display() {
    echo '<style>
        .attachment-266x266, .thumbnail img {
            width: 100% !important;
            height: auto !important;
        }
    </style>';
}
add_action('admin_head', 'fix_svg_display');

function thebungalow_body_class($classes) {
    global $post;
    $post_slug = $post->post_name;
    if (is_front_page() == FALSE) {
      $classes[] = 'not-home';
    }
    $classes[] = sprintf('post-type-%s', $post->post_type);
    $classes[] = sprintf('page-%s', $post_slug);

    if (is_user_logged_in()) {
      $classes[] = 'logged-in';
    }
    $current_user = wp_get_current_user();
    if ($current_user && in_array('administrator', $current_user->roles)) {
      $classes[] = 'is-admin';
    }
    if (is_location()) {
        $classes[] = 'is-location';
    }
    return $classes;
}
add_filter('body_class', 'thebungalow_body_class');