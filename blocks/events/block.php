<?php
/**
 * Block template file: block.php
 *
 * Events Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'events-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-events';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}

$classes .= ' ' . get_field('bottom_margin');

$options = array();
$options['start-date'] = date('m/d/Y');
$options['locations'] = get_field('locations');
$events = get_events($options);
?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
    <div class="container">
        <?php if (count($events) ==  0) : ?>
        <p><?php the_field('no_events_message'); ?></p>
        <?php endif; ?>
        <?php foreach ($events as $event) : ?>
        <?php $event = get_post($event->ID); ?>
        <div class="event mb-10">
            <div class="md:flex gap-12">
                <div class="basis-4/12">
                    <p>
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
                    <?php $cta_link = get_field('cta_link', $event->ID); ?>
                    <?php $cta_link_2 = get_field('cta_link_2', $event->ID); ?>
                    <?php if ($cta_link || $cta_link_2) : ?>
                        <p class="mt-8 flex gap-4">
                            <?php if ($cta_link) : ?>
                                <a href="<?php echo $cta_link['url']; ?>" class="btn"><?php echo $cta_link['title']; ?></a>
                            <?php endif; ?>
                            <?php if ($cta_link_2) : ?>
                                <a href="<?php echo $cta_link_2['url']; ?>" class="btn"><?php echo $cta_link_2['title']; ?></a>
                            <?php endif; ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>