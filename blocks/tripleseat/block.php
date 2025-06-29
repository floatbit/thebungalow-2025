<?php
/**
 * Block template file: block.php
 *
 * Tripleseat Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'tripleseat-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-tripleseat';
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
        <h2>Submit an Inquiry</h2>
        <script src="https://api.tripleseat.com/v1/leads/ts_script.js?lead_form_id=29699&public_key=d23829038a0fd8ca95244f115bab6c16979afa42"></script>
        <a id="tripleseat_link" href="https://www.tripleseat.com">Private Event Software powered by Tripleseat</a>
    </div>
</div>