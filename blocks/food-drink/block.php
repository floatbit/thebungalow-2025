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
?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
    <div class="bg-primary text-primary-dark py-32">
        <div class="container mb-16">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                <h2 class="line">
                    Food + Drink
                </h2>
                <p class="md:text-right max-w-[425px] m-0 menu-links">
                    <a href="#" class="active">Food</a>
                    <a href="#">N/A Beverages</a>
                    <a href="#">Sunset Sips</a>
                    <a href="#">House Cocktails</a>
                    <a href="#">Beer</a>
                    <a href="#">Wine</a>
                    <a href="#">Bottle Menu</a>
                </p>
            </div>
        </div>

        <div class="container menus">
            <?php for($i=0;$i<7;$i++) : ?>
            <div class="menu <?php echo $i == 0 ? 'block' : 'hidden'; ?>">
                <div class="md:flex gap-16">
                    <div class="basis-1/2">
                        <h3>Food by Bear Fish Flag co. <?php echo $i; ?></h3>
                        <div class="menu-item mb-10">
                            <div class="flex justify-between mb-4">
                                <p class="h4 mb-0">AL Pastor-Dilla</p>
                                <p class="h4 mb-0">$14</p>
                            </div>
                            <p>A spicy quesadilla filled with shredded mozzarella cheese, Al Pastor marinated pork, chopped jalapeno peppers, fresh cilantro and Diablo sauce.</p>
                        </div>
                        <div class="menu-item mb-10">
                            <div class="flex justify-between mb-4">
                                <p class="h4 mb-0">AL Pastor-Dilla</p>
                                <p class="h4 mb-0">$14</p>
                            </div>
                            <p>A spicy quesadilla filled with shredded mozzarella cheese, Al Pastor marinated pork, chopped jalapeno peppers, fresh cilantro and Diablo sauce.</p>
                        </div>
                    </div>
                    <div class="basis-1/2">
                        <div class="menu-item mb-10">
                            <div class="flex justify-between mb-4">
                                <p class="h4 mb-0">AL Pastor-Dilla</p>
                                <p class="h4 mb-0">$14</p>
                            </div>
                            <p>A spicy quesadilla filled with shredded mozzarella cheese, Al Pastor marinated pork, chopped jalapeno peppers, fresh cilantro and Diablo sauce.</p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endfor; ?>
        </div>
    </div>
</div>