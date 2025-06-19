<?php

// Disable support for comments and trackbacks in post types
function disable_comments_post_types_support() {
    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
}
add_action('admin_init', 'disable_comments_post_types_support');

// Close comments on the front-end
function disable_comments_status() {
    return false;
}
add_filter('comments_open', 'disable_comments_status', 20, 2);
add_filter('pings_open', 'disable_comments_status', 20, 2);

// Hide existing comments
function disable_comments_hide_existing_comments($comments) {
    return [];
}
add_filter('comments_array', 'disable_comments_hide_existing_comments', 10, 2);

// Remove comments page in admin
function disable_comments_admin_menu() {
    remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'disable_comments_admin_menu');

// Redirect any user trying to access comments page
function disable_comments_admin_menu_redirect() {
    global $pagenow;
    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url()); exit;
    }
}
add_action('admin_init', 'disable_comments_admin_menu_redirect');

// Remove comments metabox from dashboard
function disable_comments_dashboard() {
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'disable_comments_dashboard');

// Remove comments links from admin bar
function disable_comments_admin_bar() {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
}
add_action('init', 'disable_comments_admin_bar');

// Remove comment meta boxes from post edit screens
function disable_comments_remove_meta_boxes() {
    foreach (get_post_types() as $post_type) {
        remove_meta_box('commentstatusdiv', $post_type, 'normal');
        remove_meta_box('commentsdiv', $post_type, 'normal');
        remove_meta_box('trackbacksdiv', $post_type, 'normal');
    }
}
add_action('admin_init', 'disable_comments_remove_meta_boxes');

// Remove discussion settings from options
function disable_comments_remove_discussion_settings() {
    // Remove Discussion section from Settings menu
    remove_submenu_page('options-general.php', 'options-discussion.php');
}
add_action('admin_menu', 'disable_comments_remove_discussion_settings');

// Redirect discussion settings page
function disable_comments_discussion_redirect() {
    global $pagenow;
    if ($pagenow === 'options-discussion.php') {
        wp_redirect(admin_url()); exit;
    }
}
add_action('admin_init', 'disable_comments_discussion_redirect');

// Disable comment feeds
function disable_comments_disable_feeds() {
    wp_die('No comment feeds available.'); 
}
add_action('do_feed_rdf', 'disable_comments_disable_feeds', 1);
add_action('do_feed_rss', 'disable_comments_disable_feeds', 1);
add_action('do_feed_rss2', 'disable_comments_disable_feeds', 1);
add_action('do_feed_atom', 'disable_comments_disable_feeds', 1);
add_action('do_feed_rss2_comments', 'disable_comments_disable_feeds', 1);
add_action('do_feed_atom_comments', 'disable_comments_disable_feeds', 1);

// Remove comment feeds from headers
function disable_comments_remove_feed_links() {
    remove_action('wp_head', 'feed_links_extra', 3);
}
add_action('init', 'disable_comments_remove_feed_links');

// Disable comments in REST API
function disable_comments_rest_api_remove_comments_endpoint() {
    global $wp_rest_server;
    $endpoints = ['comments', 'comments/(?P<id>[\d]+)'];
    
    foreach ($endpoints as $endpoint) {
        if (isset($wp_rest_server->endpoints['/wp/v2/' . $endpoint])) {
            unset($wp_rest_server->endpoints['/wp/v2/' . $endpoint]);
        }
    }
}
add_action('rest_api_init', 'disable_comments_rest_api_remove_comments_endpoint', 1000);

// Remove comments from REST API post responses
function disable_comments_rest_api_remove_comments_field($response, $post, $request) {
    unset($response->data['comment_status']);
    unset($response->data['ping_status']);
    return $response;
}
add_filter('rest_prepare_post', 'disable_comments_rest_api_remove_comments_field', 10, 3);
add_filter('rest_prepare_page', 'disable_comments_rest_api_remove_comments_field', 10, 3);

// Ensure comment forms don't appear in themes
function disable_comments_template_redirect() {
    if (is_comment_feed()) {
        wp_redirect(home_url(), 301);
        exit;
    }
}
add_action('template_redirect', 'disable_comments_template_redirect');

// Override comment template
function disable_comments_template($comment_template) {
    global $post;
    return '';
}
add_filter('comments_template', 'disable_comments_template', 20);

// Remove recent comments widget
function disable_comments_remove_widgets() {
    unregister_widget('WP_Widget_Recent_Comments');
}
add_action('widgets_init', 'disable_comments_remove_widgets', 1);

// Remove comment-related options from customizer
function disable_comments_remove_customizer_options($wp_customize) {
    $wp_customize->remove_section('static_front_page');
    $wp_customize->remove_control('blogdescription');
}
add_action('customize_register', 'disable_comments_remove_customizer_options', 30);

// Remove X-Pingback header
function disable_comments_remove_pingback_header($headers) {
    unset($headers['X-Pingback']);
    return $headers;
}
add_filter('wp_headers', 'disable_comments_remove_pingback_header');

// Disable XML-RPC pingback
function disable_comments_xmlrpc_pingback($methods) {
    unset($methods['pingback.ping']);
    unset($methods['pingback.extensions.getPingbacks']);
    return $methods;
}
add_filter('xmlrpc_methods', 'disable_comments_xmlrpc_pingback');

// Remove comment count from posts list in admin
function disable_comments_remove_comment_column($columns) {
    unset($columns['comments']);
    return $columns;
}
add_filter('manage_posts_columns', 'disable_comments_remove_comment_column');
add_filter('manage_pages_columns', 'disable_comments_remove_comment_column');

// Hide comment-related quick edit options
function disable_comments_remove_quick_edit_comment() {
    echo '<style>
        .inline-edit-col-right .inline-edit-group:last-child { display: none !important; }
        .comment-count { display: none !important; }
        .comment-grey-bubble, .comment-count-approved { display: none !important; }
    </style>';
}
add_action('admin_head-edit.php', 'disable_comments_remove_quick_edit_comment');