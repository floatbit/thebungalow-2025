<?php
/**
 * Block template file: block.php
 *
 * Image Grid Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'image-grid-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-image-grid';
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
        <?php $rows = get_field('image_sets');?>
        <?php foreach($rows as $index=>$row):?>
            <div class="md:flex gap-x-12 gap-y-4 <?php print $index < count($rows) - 1 ? 'mb-12' : '';?>">
                <?php foreach($row['images'] as $image):?>
                <div class="image" style="flex: <?php print $image['image']['width'] / $image['image']['height'];?>;">
                    <img src="<?php print $image['image']['url'];?>" alt="" class="w-full">
                    <?php if ($image['caption']): ?>
                        <p class="mt-2 text-center"><?php print $image['caption'];?></p>
                    <?php endif; ?>
                </div>
                <?php endforeach;?>
            </div>
        <?php endforeach;?>
    </div>
</div>