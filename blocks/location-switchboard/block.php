<?php
/**
 * Block template file: block.php
 *
 * Location Switchboard Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'location-switchboard-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-location-switchboard';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}

$classes .= ' ' . get_field('bottom_margin');
?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">

    <div class="container mb-10">
        <div class="relative max-w-[764px] mx-auto">
            <?php 
                $random_illustration_pool = get_field('random_illustration'); 
                $random_illustration = $random_illustration_pool[array_rand($random_illustration_pool)];
            ?>
            <img src="<?php print $random_illustration['url']; ?>" alt="<?php print $random_illustration['alt']; ?>" class="aspect-[630/450] w-full h-full object-contain">
            <p class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-center w-full h1"><?php the_field('title'); ?></p>
        </div>
    </div>

    <div class="container mb-10 relative mt-[-65px]">
        <div class="flex justify-center">
            <div class="max-w-[706px] text-center">
                <?php the_field('intro_text'); ?>
            </div>
        </div>    
    </div>

    <div class="container">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 grid-locations">
            <!-- Left Column -->
            <div class="space-y-6">
                <?php $row_counter = 0; ?>
                <?php while ( have_rows('left_boxes') ) : the_row(); ?>
                <?php $link = get_sub_field('link'); ?>
                <?php $image = get_sub_field('image'); ?>
                <?php $location_tid = get_sub_field('location'); ?>
                <?php $location_term = get_term($location_tid, 'location'); ?>
                <?php $location_fields = get_location_fields($location_tid); ?>
                
                <?php if ($row_counter % 2 === 0): ?>
                <a href="<?php echo $link; ?>" class="block relative group overflow-hidden aspect-[3/4]" aria-label="View <?php echo $location_term->name; ?> location">
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="w-full h-full object-cover transition-transform duration-300 ease-in-out group-hover:scale-105 multiply">
                    <div class="absolute bottom-0 h-[147px] w-full bg-gradient-to-t from-black/100 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6 w-full">
                        <div class="flex justify-between items-end">
                            <div class="text-white font-mono text-sm">
                                <p><?php echo $location_fields['address']; ?></p>
                            </div>
                            <span class="inline-block text-black px-4 py-2 mb-0 h5" style="background-color: <?php echo $location_fields['primary_color']; ?>;"><?php echo $location_term->name; ?></span>
                        </div>
                    </div>
                </a>
                <?php else: ?>
                <a href="<?php echo $link; ?>" class="block relative group overflow-hidden aspect-[4/3]" aria-label="View <?php echo $location_term->name; ?> location">
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="w-full h-full object-cover transition-transform duration-300 ease-in-out group-hover:scale-105 multiply">
                    <div class="absolute bottom-0 h-[147px] w-full bg-gradient-to-t from-black/100 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6 w-full">
                        <div class="flex justify-between items-end">
                            <div class="text-white font-mono text-sm">
                                <p><?php echo $location_fields['address']; ?></p>
                            </div>
                            <span class="inline-block text-black px-4 py-2 mb-0 h5" style="background-color: <?php echo $location_fields['primary_color']; ?>;"><?php echo $location_term->name; ?></span>
                        </div>
                    </div>
                </a>
                <?php endif; ?>
                <?php $row_counter++; ?>
                <?php endwhile; ?>
            </div>

            <!-- Right Column -->
            <div class="space-y-6">
                <?php $row_counter = 0; ?>
                <?php while ( have_rows('right_boxes') ) : the_row(); ?>
                <?php $link = get_sub_field('link'); ?>
                <?php $image = get_sub_field('image'); ?>
                <?php $location_tid = get_sub_field('location'); ?>
                <?php $location_term = get_term($location_tid, 'location'); ?>
                <?php $location_fields = get_location_fields($location_tid); ?>
                
                <?php if ($row_counter % 2 !== 0): ?>
                <a href="<?php echo $link; ?>" class="block relative group overflow-hidden aspect-[3/4]" aria-label="View <?php echo $location_term->name; ?> location">
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="w-full h-full object-cover transition-transform duration-300 ease-in-out group-hover:scale-105 multiply">
                    <div class="absolute bottom-0 h-[147px] w-full bg-gradient-to-t from-black/100 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6 w-full">
                        <div class="flex justify-between items-end">
                            <div class="text-white font-mono text-sm">
                                <p><?php echo $location_fields['address']; ?></p>
                            </div>
                            <span class="inline-block text-black px-4 py-2 mb-0 h5" style="background-color: <?php echo $location_fields['primary_color']; ?>;"><?php echo $location_term->name; ?></span>
                        </div>
                    </div>
                </a>
                <?php else: ?>
                <a href="<?php echo $link; ?>" class="block relative group overflow-hidden aspect-[4/3]" aria-label="View <?php echo $location_term->name; ?> location">
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="w-full h-full object-cover transition-transform duration-300 ease-in-out group-hover:scale-105 multiply">
                    <div class="absolute bottom-0 h-[147px] w-full bg-gradient-to-t from-black/100 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6 w-full">
                        <div class="flex justify-between items-end">
                            <div class="text-white font-mono text-sm">
                                <p><?php echo $location_fields['address']; ?></p>
                            </div>
                            <span class="inline-block text-black px-4 py-2 mb-0 h5" style="background-color: <?php echo $location_fields['primary_color']; ?>;"><?php echo $location_term->name; ?></span>
                        </div>
                    </div>
                </a>
                <?php endif; ?>
                <?php $row_counter++; ?>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
    
</div>