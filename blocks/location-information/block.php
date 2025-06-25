<?php
/**
 * Block template file: block.php
 *
 * Location Information Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'location-information-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-location-information';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}

$classes .= ' ' . get_field('bottom_margin');
?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
    <div class="bg-primary text-primary-dark pt-20 pb-8">
        <div class="container">
            <div class="flex flex-col md:flex-row gap-12">
                <!-- Column 1: Image (about 1/2 width) -->
                <div class="w-full md:basis-6/12 flex-shrink-0 mb-8 md:mb-0">
                    <img src="https://placehold.co/667x395/222/fff" alt="Description" class="w-full h-auto" />
                </div>
                <!-- Column 2: Links (about 1/4 width) -->
                <div class="w-full md:basis-2/12 mb-8 md:mb-0">
                    <p class="h4">Info</p>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Happenings</a></li>
                        <li><a href="#">Private Events</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                    <p class="h4">Follow</p>
                    <ul>
                        <li><a href="#">Instagram</a></li>
                        <li><a href="#">Facebook</a></li>
                    </ul>
                </div>
                <!-- Column 3: Links (about 1/4 width) -->
                <div class="w-full md:basis-4/12">
                    <p class="h4">Visit</p>
                    <p>
                        101 Wilshire BLVD,<br>
                        Santa Monica, CA 90401
                    </p>
                    <p>
                        <a href="#">Get Directions</a>
                    </p>
                    <p class="h4">Hours</p>
                    <p>
                        Wednesday–Thursday: 5PM–12AM<br>
                        Friday: 5PM–2AM<br>
                        Sunday: 2PM–10PM<br>
                        Sunset Sips: 5-7pm Weekdays,<br>
                        2-4pm Weekends
                    </p>
                    <p class="h4">Call Us</p>
                    <p>
                        <a href="tel:+17143740399">+1 (714) 374-0399</a>
                    </p>
                </div>
            </div>

            <div class="location-links mt-20 mb-4">
                <div class="flex gap-20 justify-between">
                    <p class="h3">
                        <a href="#">Huntington Beach</a>
                    </p>
                    <p class="h3">
                        <a href="#">Santa Monica</a>
                    </p>
                    <p class="h3">
                        <a href="#">Long Beach</a>
                    </p>
                    <p class="h3">
                        <a href="#">San Diego</a>
                    </p>
                </div>
            </div>

            <div class="copyright">
                <div class="flex gap-20 justify-between">
                    <p>
                        &copy; <?php print date('Y'); ?> <a href="https://bungalowhospitalitygroup.com/" target="_blank">Bungalow Hospitality Group</a>
                    </p>
                    <p>
                        In the Bay Area? Check out <a href="https://bungalowkitchen.com/" target="_blank">The Bungalow Kitchen!</a>
                    </p>
                    <p>
                        <a href="#" class="mr-4">Terms</a>
                        <a href="#">Privacy</a>
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>