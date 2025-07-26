<?php
/**
 * Block template file: block.php
 *
 * Centered Text Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'centered-text-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-centered-text';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}

$classes .= ' ' . get_field('bottom_margin');

// Get ACF fields
$title = get_field('title');
$text = get_field('text');
?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
    <div class="container">
        <div class="text">
            <h1 class="text-center mb-20">
                <span class="inline-block line mx-auto">
                    <?php echo $title; ?>
                </span>
            </h1>
            <?php if ($text): ?>
                <div class="text-content">
                    <?php echo $text; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>