<?php
/**
 * Block template file: block.php
 *
 * Image Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'image-slider-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-image-slider';
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
        <div class="relative swiper-container">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="https://placehold.co/1280x720/222/fff" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="https://placehold.co/1280x720/444/fff" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="https://placehold.co/1280x720/555/fff" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="https://placehold.co/1280x720/999/fff" alt="">
                    </div>
                </div>
            </div>
            <div class="dots-container absolute left-6 bottom-6 z-20">
                <div class="dots"></div>
            </div>
        </div>
    </div>
</div>