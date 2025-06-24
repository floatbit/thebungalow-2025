<?php
/**
 * Block template file: block.php
 *
 * Quote Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'quote-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-quote';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
    <div class="bg-secondary text-secondary-dark pt-12 pb-4">
        <div class="container max-w-[1328px]">
            <p class="h3 quote mb-5">
                <span>“</span>By far the best spot in Santa Monica for the atmosphere.  This place has the best vibe. Great people, friendly bartenders, amazing music, and smiles everywhere. Plus, the drinks are top-notch—what more do you need for a great time? Thanks, The Bungalow!<span>”</span>
            </p>
            <p class="author">
                — Vraj Patel, Google Review
            </p>
        </div>
    </div>
</div>