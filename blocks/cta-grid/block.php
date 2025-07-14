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
            <?php while(have_rows('sets')): the_row(); ?>
            <?php $image = get_sub_field('image'); ?>
            <div class="">
                <p class="mb-10">
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="max-w-[400px]">
                </p>
                <p class="h2 line">
                    <?php the_sub_field('title'); ?>
                </p>
                <?php the_sub_field('description'); ?>

                <?php $links = get_sub_field('links'); ?>
                <?php if($links): ?>
                <p class="links flex gap-4">
                    <?php foreach($links as $link): ?>
                        <a href="<?php echo $link['link']['url']; ?>" target="<?php echo $link['link']['target']; ?>"><?php echo $link['link']['title']; ?></a>
                    <?php endforeach; ?>
                </p>
                <?php endif; ?>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>