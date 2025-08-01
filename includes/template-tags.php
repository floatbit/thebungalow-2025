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

function get_location_fields($tid = null) {
    $fields = [];

    if ($tid) {
        $fields = get_fields('location_' . $tid);
    } else {

        $post_id = get_the_ID();
        
        if ($post_id) {
            $location_terms = get_the_terms($post_id, 'location');
            
            if ($location_terms && !is_wp_error($location_terms)) {
                $location_term = $location_terms[0];
                $fields = get_fields('location_' . $location_term->term_id);
            }

            if (!$fields) {
                $parent_post_id = wp_get_post_parent_id($post_id);
                if ($parent_post_id) {
                    $parent_location_terms = get_the_terms($parent_post_id, 'location');
                    if ($parent_location_terms && !is_wp_error($parent_location_terms)) {
                        $parent_location_term = $parent_location_terms[0];
                        $fields = get_fields('location_' . $parent_location_term->term_id);
                    }
                }
            }   
        }
    }

    return $fields;
}

function get_location_nav_links() {
    $location_fields = get_location_fields();
    return $location_fields['nav_links'];
}

function get_events($options) {
    $args = array(
        'post_type'      => 'tribe_events',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'orderby' => 'meta_value',
        'meta_key' => '_EventEndDate',
        'order' => 'ASC',
    );
    $tax_query = array();
    if (isset($options['tribe_events_cat'])) {
        $tax_query[] =  array(
            'taxonomy' => 'tribe_events_cat',
            'field' => 'term_id',
            'terms' => $options['tribe_events_cat']
        );
        $args['tax_query'] = $tax_query;
    }
    $meta_query = array();
    if ($options['start-date']) {
        $start_date = date('Y-m-d H:i:s', strtotime($options['start-date']));
        $meta_query[] = array(
            'key' => '_EventEndDate',
            'compare' => '>=',
            'value' => $start_date,
            'type' => 'DATETIME'
        );
    }
    if ($options['past-events-only']) {
        $meta_query[] = array(
            'key' => '_EventEndDate',
            'compare' => '<',
            'value' => date('Y-m-d H:i:s'),
            'type' => 'DATETIME'
        );
    }
    if ($meta_query) {
        $args['meta_query'] = $meta_query;
    }
    $posts = get_posts($args);
    return $posts;
}

function get_event_readable_date($event) {
    $start = tribe_get_start_date( $event, false, 'Y-m-d' );
    $end = tribe_get_end_date( $event, false, 'Y-m-d' );
    if ($start == $end) {
      return tribe_get_start_date( $event, false, 'F j, Y' );
    } else if (time() < strtotime($start)) {
      return sprintf('%s – %s', tribe_get_start_date( $event, false, 'F j, Y' ), tribe_get_end_date( $event, false, 'F j, Y' ));
    } else {
      return sprintf('%s – %s', tribe_get_start_date( $event, false, 'F j, Y' ), tribe_get_end_date( $event, false, 'F j, Y' ));
    }
  }
  
  function get_event_readable_time($event) {
    $start_time = tribe_get_start_time($event);
    $end_time = tribe_get_end_time($event);
    if (empty($start_time) && empty($end_time)) {
      $time = '';
    } else if ($start_time == $end_time) {
      $time = $start_time;
    } else {
      $time = sprintf('%s – %s', $start_time, $end_time);
    }
    return $time;
  }
  
  
function location_hours_shortcode() {
    $location_fields = get_location_fields();
    $hours_html = '<p>';
    foreach($location_fields['days_hours'] as $field):
        $hours_html .= $field['day'] . ': ' . $field['hours'] . '<br>';
    endforeach;
    $hours_html .= '</p>';
    return $hours_html;
}
add_shortcode('location-hours', 'location_hours_shortcode');
  
function location_address_shortcode() {
    $location_fields = get_location_fields();
    if ( ! empty( $location_fields['address'] ) ) {
        return '<p>' . $location_fields['address'] . '</p>';
    }
    return '';
}
add_shortcode('location-address', 'location_address_shortcode');

function location_directions_shortcode() {
    $location_fields = get_location_fields();
    if ( ! empty( $location_fields['directions_url'] ) ) {
        $link = $location_fields['directions_url'];
        return '<p><a href="' . esc_url( $link ) . '" target="_blank">GET DIRECTIONS</a></p>';
    }
    return '';
}
add_shortcode('location-directions', 'location_directions_shortcode');
  
  