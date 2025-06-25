<?php
/**
 * Block template file: block.php
 *
 * Hours + Address Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'hours-address-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-hours-address';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}

$classes .= ' ' . get_field('bottom_margin');
?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
    <div class="bg-secondary py-32">
        <div class="container">
            <div class="flex items-center justify-between">
                <div class="w-1/2 text-secondary-dark text-center">
                    <?php for($i=0;$i<3;$i++): ?>
                        <p class="h3 mb-0">Wednesday–Friday</p>
                        <p class="h2">2pm–2am</p>
                    <?php endfor; ?>
                </div>
                <div class="w-1/2">
                    <div class="bg-white text-primary-dark p-10 text-center rotate-3">
                        <p>Always Close By</p>
                        <p class="h3">6400 E Pacific Coast Hwy #200 <br>Long Beach, CA 90803</p>
                        <p>
                            <img src="https://placehold.co/600x400/EEE/31343C" alt="" class="w-full">
                        </p>
                        <p class="h2">GET DIRECTIONS</p>
                        <p>(Last leaf of gold vanishes from the sea-curve.)</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
</div>