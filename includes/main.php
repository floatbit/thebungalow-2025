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
        acf_add_options_page([
            'page_title' => 'Footer Settings',
            'menu_slug' => 'footer-settings',
        ]);
    }
});

/**
 * Enqueue script and styles
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('app', assets_url('/dist/app.css'), [], null);
    wp_enqueue_script('app', assets_url('/dist/app.js'), ['jquery'], null, true);

    // Add AJAX URL and nonce for events pagination
    wp_localize_script('app', 'wpAjax', array(
        'url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('events_pagination_nonce')
    ));

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

/**
 * AJAX handler for past events pagination
 */
function handle_load_past_events() {
    // Verify nonce
    if (!check_ajax_referer('events_pagination_nonce', 'nonce', false)) {
        wp_send_json_error('Invalid nonce');
        return;
    }

    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $block_id = isset($_POST['block_id']) ? sanitize_text_field($_POST['block_id']) : '';

    // Get locations from AJAX request
    $locations = isset($_POST['locations']) ? json_decode(stripslashes($_POST['locations']), true) : null;

    // Get events with pagination
    $options = array(
        'past-events-only' => true,
        'paginate' => true,
        'page' => $page,
        'per_page' => 10
    );

    if ($locations) {
        $options['locations'] = $locations;
    }

    $result = get_events($options);
    
    ob_start();
    
    // Render events HTML
    if (count($result['posts']) > 0) {
        foreach ($result['posts'] as $event) {
            $event = get_post($event->ID);
            ?>
            <div class="event mb-10">
                <div class="md:flex gap-12">
                    <div class="basis-4/12">
                        <p class="mb-2">
                            <img src="<?php echo get_the_post_thumbnail_url($event->ID); ?>" alt="">
                        </p>
                    </div>
                    <div class="basis-9/12">
                        <p class="mb-6">
                        <?php $event_time = get_event_readable_time($event);?>
                        <?php if (get_field('custom_date_time', $event->ID)):?>
                            <?php print get_field('custom_date_time', $event->ID);?>
                        <?php else:?>
                            <?php print get_event_readable_date($event->ID);?><?php print $event_time ? ', ' . $event_time : '';?>
                        <?php endif;?>
                        </p>
                        <p class="h2"><?php echo $event->post_title; ?></p>
                        <div class="max-w-[634px]">
                            <?php print apply_filters('the_content', $event->post_content); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        echo '<p>' . get_field('no_events_message', $block_id) . '</p>';
    }
    
    $events_html = ob_get_clean();
    
    // Generate pagination HTML
    ob_start();
    $total_pages = $result['pagination']['total_pages'];
    $current_page = $result['pagination']['current_page'];
    ?>
    <div class="flex gap-12 justify-between">
        <p>
            <?php if ($current_page > 1): ?>
                <a href="#" data-page="newer">Newer</a>
            <?php endif; ?>
        </p>
        <p class="flex gap-4">
            <?php
            $show_dots_start = false;
            $show_dots_end = false;
            
            for ($i = 1; $i <= $total_pages; $i++) {
                if ($i == 1 || $i == $total_pages || ($i >= $current_page - 1 && $i <= $current_page + 1)) {
                    echo '<a href="#" data-page="' . $i . '"' . ($i == $current_page ? ' class="current"' : '') . '>' . $i . '</a>';
                } elseif ($i < $current_page - 1 && !$show_dots_start) {
                    echo '<span>...</span>';
                    $show_dots_start = true;
                } elseif ($i > $current_page + 1 && !$show_dots_end) {
                    echo '<span>...</span>';
                    $show_dots_end = true;
                }
            }
            ?>
        </p>
        <p>
            <?php if ($current_page < $total_pages): ?>
                <a href="#" data-page="older">Older</a>
            <?php endif; ?>
        </p>
    </div>
    <?php
    $pagination_html = ob_get_clean();

    wp_send_json_success(array(
        'html' => $events_html,
        'pagination' => $pagination_html
    ));
}

add_action('wp_ajax_load_past_events', 'handle_load_past_events');
add_action('wp_ajax_nopriv_load_past_events', 'handle_load_past_events');