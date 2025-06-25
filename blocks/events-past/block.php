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
?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
    <div class="container">
        <h2 class="h1 mb-16">Past Events</h2>
        <?php for($i=0;$i<3;$i++) : ?>
        <div class="event mb-10 items-center">
            <div class="flex gap-12 items-center">
                <div class="basis-4/12">
                    <img src="https://placehold.co/780x930/999/fff" alt="">
                </div>
                <div class="basis-9/12">
                    <p class="mb-6">May 20, 2025 - August 31, 2025</p>
                    <p class="h2">Night Market at the Bungalow</p>
                    <p class="max-w-[634px]">
                        Get ready to experience the ultimate foodie event of the summer with new food vendors, beverage activations, family-friendly activities, live musical and DJ performances, and celebrity guest appearances. Free and open to the public for guests of all ages and pet friendly, The Bungalow's Night Market kicks off Thursday, June 6, and will run every Thursday from 5-11 p.m. through August 29.
                    </p>
                    <p>
                        <a href="#" class="btn">Learn More</a>
                    </p>
                </div>
            </div>
        </div>
        <?php endfor; ?>
    </div>
</div>