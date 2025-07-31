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

$options = array();
if (get_field('past_events_only')) {
    $options['past-events-only'] = true;
} else {
    $options['start-date'] = date('m/d/Y');
}
$options['locations'] = get_field('locations');
$events = get_events($options);
?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
    <div class="container">
        <h2 class="h1 mb-10 md:mb-20">Past Events</h2>
        <?php if (count($events) ==  0) : ?>
        <p><?php the_field('no_events_message'); ?></p>
        <?php endif; ?>
        <?php foreach ($events as $event) : ?>
        <?php $event = get_post($event->ID); ?>
        <div class="event mb-10">
            <div class="flex gap-12 items-center">
                <div class="basis-4/12">
                    <img src="<?php echo get_the_post_thumbnail_url($event->ID); ?>" alt="">
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