<?php
/**
 * Block template file: block.php
 *
 * Hours + Address Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'hours-address-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-hours-address';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}

$classes .= ' ' . get_field('bottom_margin');

$location_fields = get_location_fields();
?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
    <div class="bg-secondary">
        <div class="container">
            <div class="md:flex items-center justify-between">
                <div class="basis-6/12 md:basis-5/12 text-black text-center">
                    <div class="line mb-5"></div>
                    <?php $left = get_field('left_text');?>
                    <p><?php echo $left['top']; ?></p>
                    <?php foreach($location_fields['days_hours'] as $field): ?>
                        <div class="my-8 md:my-12">
                            <p class="h3 mb-2"><?php echo $field['day']; ?></p>
                            <p class="h2"><?php echo $field['hours']; ?></p>
                        </div>
                    <?php endforeach; ?>
                    <p class="mb-8"><?php echo $left['bottom']; ?></p>
                    <div class="line"></div>
                </div>
                <div class="basis-6/12 md:basis-6/12 hidden md:block">
                    <div class="bg-white text-primary-dark p-10 text-center rotate-3 hover:rotate-0 transition-all duration-300">
                        <?php $right = get_field('right_text');?>
                        <p><?php echo $right['top']; ?></p>
                        <p class="h3">
                            <?php echo $location_fields['address']; ?>
                        </p>
                        <p>
                            <img src="<?php echo $right['image']['url']; ?>" alt="<?php echo $right['image']['alt']; ?>" class="w-full">
                        </p>
                        <p class="h2">
                            <a href="<?php echo $location_fields['directions_url']; ?>" target="_blank">
                                GET DIRECTIONS
                            </a>
                        </p>
                        <p><?php echo $right['bottom']; ?></p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container block md:hidden">
        <div class="basis-6/12 md:basis-6/12">
            <div class="bg-white text-primary-dark text-center">
                <?php $right = get_field('right_text');?>
                <p><?php echo $right['top']; ?></p>
                <p class="h3">
                    <?php echo $location_fields['address']; ?>
                </p>
                <p>
                    <img src="<?php echo $right['image']['url']; ?>" alt="<?php echo $right['image']['alt']; ?>" class="w-full">
                </p>
                <p class="h2">
                    <a href="<?php echo $location_fields['directions_url']; ?>" target="_blank">
                        GET DIRECTIONS
                    </a>
                </p>
                <p><?php echo $right['bottom']; ?></p>
            </div>
        </div>
    </div>
    
</div>