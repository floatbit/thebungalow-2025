<?php
/**
 * Block template file: block.php
 *
 * Food + Drink Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'food-drink-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-food-drink';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}

$classes .= ' ' . get_field('bottom_margin');

// Get the menus from ACF
$menus = get_field('menus');
?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>" data-jump-link-id="<?php echo get_field('jump_link_id'); ?>">
    <div class="bg-primary text-primary-dark food-drink-container">
        <div class="container mb-6 md:mb-16">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                <h2 class="line">
                    Food & <br class="block md:hidden">Drink
                </h2>
                <?php if ($menus): ?>
                <p class="text-center md:text-right max-w-[425px] m-0 mt-2 md:mt-0 menu-links">
                    <?php foreach ($menus as $index => $menu): ?>
                        <a href="#" class="<?php echo $index === 0 ? 'active' : ''; ?>" data-menu="<?php echo esc_attr($index); ?>"><?php echo esc_html($menu['name']); ?></a>
                    <?php endforeach; ?>
                </p>
                <?php endif; ?>
            </div>
        </div>

        <div class="container menus">
            <?php if ($menus): ?>
                <?php foreach ($menus as $index => $menu): ?>
                    <div class="menu <?php echo $index === 0 ? 'block' : 'hidden'; ?>">
                        <div class="md:flex gap-16">
                            <?php if ($menu['left_column']): ?>
                            <div class="basis-1/2">
                                <?php if ($menu['left_column']['header']): ?>
                                    <h3><?php echo esc_html($menu['left_column']['header']); ?></h3>
                                <?php endif; ?>

                                <?php if ($menu['left_column']['menu_items']): ?>
                                    <?php foreach ($menu['left_column']['menu_items'] as $item): ?>
                                        <div class="menu-item mb-10">
                                            <div class="flex justify-between mb-4">
                                                <p class="h4 mb-0"><?php echo esc_html($item['name']); ?></p>
                                                <?php if (!empty($item['price'])): ?>
                                                    <p class="h4 mb-0"><?php echo esc_html($item['price']); ?></p>
                                                <?php endif; ?>
                                            </div>
                                            <?php if ($item['description']): ?>
                                                <p><?php echo esc_html($item['description']); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>

                            <?php if ($menu['right_column']): ?>
                            <div class="basis-1/2">
                                <?php if ($menu['right_column']['header']): ?>
                                    <h3><?php echo esc_html($menu['right_column']['header']); ?></h3>
                                <?php endif; ?>

                                <?php if ($menu['right_column']['menu_items']): ?>
                                    <?php foreach ($menu['right_column']['menu_items'] as $item): ?>
                                        <div class="menu-item mb-10">
                                            <div class="flex justify-between mb-4">
                                                <p class="h4 mb-0"><?php echo esc_html($item['name']); ?></p>
                                                <?php if (!empty($item['price'])): ?>
                                                    <p class="h4 mb-0"><?php echo esc_html($item['price']); ?></p>
                                                <?php endif; ?>
                                            </div>
                                            <?php if ($item['description']): ?>
                                                <p><?php echo esc_html($item['description']); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>