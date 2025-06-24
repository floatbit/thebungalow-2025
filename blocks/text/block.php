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
    <div class="container container-narrow">
        <div class="text">
            <h3>The Bungalow</h3>
            <p>The Bungalow Santa Monica—our original flagship—is more than just a bar; it’s a coastal retreat where good vibes, great company, and unforgettable nights come standard. With its signature beach house charm, you can sink into a cozy couch, sip a handcrafted cocktail, and soak in the ocean breeze with stunning views of the Santa Monica Pier. Feeling competitive? Challenge your crew to a game of pool, or just kick back and let the music set the mood.</p>
            <p>Looking for something extra? We’ve got you covered with live DJs, our Sunset Sips happy hour, and elevated bottle service for those special nights. And when you need a little something to snack on, our curated bar menu has just what you’re craving. Whether you’re here for a casual hang, celebrating a birthday, or hosting a private event, The Bungalow is your go-to spot. From after-work drinks to late-night adventures, we’re all about creating the perfect atmosphere for you to relax, connect, and make memories that stick.</p>
        </div>
    </div>
</div>