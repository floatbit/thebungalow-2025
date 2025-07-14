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

// Get the images from ACF
$images = get_field('images');
?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
    <div class="container">
        <div class="relative swiper-container">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php if ($images): ?>
                        <?php $first_slide = true; ?>
                        <?php foreach ($images as $image_row): ?>
                            <?php $image = $image_row['image']; ?>
                            <?php if ($image): ?>
                                <div class="swiper-slide">
                                    <?php if ($first_slide): ?>
                                        <div class="mask"></div>
                                    <?php endif; ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="aspect-[1280/720]">
                                </div>
                                <?php $first_slide = false; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="dots-container absolute left-6 bottom-6 z-20">
                <div class="dots"></div>
            </div>
        </div>
    </div>
</div>