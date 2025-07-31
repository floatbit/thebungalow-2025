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

$classes .= ' ' . get_field('bottom_margin');

$quote_text = get_field('quote_text');
$name = get_field('name');
?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
    <div class="bg-secondary text-secondary-dark quote-container">
        <div class="container">
            <?php if ($quote_text): ?>
            <p class="h3 quote mb-5">
                <span>“</span><?php echo esc_html($quote_text); ?><span>”</span>
            </p>
            <?php endif; ?>
            <?php if ($name): ?>
            <p class="m-0 author">
                — <?php echo esc_html($name); ?>
            </p>
            <?php endif; ?>
        </div>
    </div>
</div>