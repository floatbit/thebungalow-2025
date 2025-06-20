<?php
/**
 * Block template file: block.php
 *
 * CTA Bar Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'cta-bar-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-cta-bar';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
    <div class="block bg-secondary text-white">
        <div class="flex items-center justify-center gap-4 py-4">
            <p class="text-secondary-dark uppercase h4 md:mb-0">Stay in the know.</p>
            <a class="btn bg-secondary-dark inline-block px-4 py-2 uppercase h5" href="#">Subscribe</a>
        </div>
    </div>
</div>