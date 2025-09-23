<?php
/**
 * Block template file: block.php
 *
 * Rooms + Spaces Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'rooms-spaces-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-rooms-spaces';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}

$classes .= ' ' . get_field('bottom_margin');

// Get the sets repeater field
$sets = get_field('sets');
?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
    <div class="container">
        <?php if ($sets) : ?>
            <?php foreach ($sets as $set) : ?>
                <div class="room-space">
                    <div class="md:flex gap-12">
                        <div class="basis-6/12">
                            <?php if ($set['image']) : ?>
                                <p>
                                    <img src="<?php echo esc_url($set['image']['url']); ?>" 
                                         alt="<?php echo esc_attr($set['image']['alt']); ?>">
                                </p>
                            <?php endif; ?>
                        </div>
                        <div class="basis-9/12">
                            <?php if ($set['name']) : ?>
                                <p class="h2"><?php echo esc_html($set['name']); ?></p>
                            <?php endif; ?>
                            
                            <?php if ($set['capacity_text']) : ?>
                                <p class="h4"><?php echo esc_html($set['capacity_text']); ?></p>
                            <?php endif; ?>
                            
                            <?php if ($set['description']) : ?>
                                <p><?php echo esc_html($set['description']); ?></p>
                            <?php endif; ?>
                            
                            <?php if ($set['ameneties']) : ?>
                                <ul>
                                    <?php 
                                    // Split amenities by newline and create list items
                                    $amenities = explode("\n", $set['ameneties']);
                                    foreach ($amenities as $amenity) :
                                        $amenity = trim($amenity);
                                        if ($amenity) : 
                                    ?>
                                        <li><?php echo esc_html($amenity); ?></li>
                                    <?php 
                                        endif;
                                    endforeach; 
                                    ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>