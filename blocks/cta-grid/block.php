<?php
/**
 * Block template file: block.php
 *
 * CTA Grid Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'cta-grid-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-cta-grid';
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
        <div class="grid grid-cols-1 md:grid-cols-2 gap-20">
        <div class="">
                <p class="mb-10">
                    <img src="https://placehold.co/800x800/222/fff" alt="" class="max-w-[400px]">
                </p>
                <p class="h2 line">
                    A lively <br>community
                </p>
                <p>
                    Never a dull moment here—this is your inside scoop on all the events happening at The Bungalow Santa Monica. From laid-back happy hours and live DJs to our Weekly Trivia Night and Annual Night Market, we're all about setting the scene for you to relax, connect, and make unforgettable memories.
                </p>
                <p class="links flex gap-4">
                    <a href="#">View Calendar</a>
                    <a href="#">Become a Resident</a>
                </p>

            </div>
            <div class="">
                <p class="mb-10">
                    <img src="https://placehold.co/800x800/222/fff" alt="" class="max-w-[400px]">
                </p>
                <p class="h2 line">
                    Gather &<br>Celebrate
                </p>
                <p>
                    Never a dull moment here—this is your inside scoop on all the events happening at The Bungalow Santa Monica. From laid-back happy hours and live DJs to our Weekly Trivia Night and Annual Night Market, we're all about setting the scene for you to relax, connect, and make unforgettable memories.
                </p>
                <p class="links flex gap-4">
                    <a href="#">View Calendar</a>
                    <a href="#">Become a Resident</a>
                </p>

            </div>
        </div>
    </div>
</div>