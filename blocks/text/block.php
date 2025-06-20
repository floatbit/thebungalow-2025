<?php
/**
 * Block template file: block.php
 *
 * Text Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'text-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-text';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
    <div class="container">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint cumque, asperiores nihil, quisquam sequi cum qui consectetur, possimus nulla ea dolore earum. Deleniti eum corporis incidunt molestias ut, atque rem?</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint cumque, asperiores nihil, quisquam sequi cum qui consectetur, possimus nulla ea dolore earum. Deleniti eum corporis incidunt molestias ut, atque rem?</p>
    </div>
</div>