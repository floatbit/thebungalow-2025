<?php
/**
 * Block template file: block.php
 *
 * Events Past Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'events-past-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-events-past';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}

$classes .= ' ' . get_field('bottom_margin');

$current_page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;

$options = array(
    'past-events-only' => true,
    'paginate' => true,
    'page' => $current_page,
    'per_page' => 10
);

if (get_field('locations')) {
    $options['locations'] = get_field('locations');
}

$result = get_events($options);
$events = $result['posts'];
?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
    <div class="container">
        <h2 class="h1 mb-10 md:mb-20">Past Events</h2>
        <?php if (count($events) ==  0) : ?>
        <p><?php the_field('no_events_message'); ?></p>
        <?php endif; ?>
        <div class="events-container">
            <?php foreach ($events as $event) : ?>
            <?php $event = get_post($event->ID); ?>
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
            <?php endforeach; ?>
        </div>
    </div>

    <div class="container pagination">
        <?php 
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
    </div>
    
    <div class="loading-overlay hidden">
        <div class="loading-spinner"></div>
    </div>
</div>