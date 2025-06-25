<?php
/**
 * Block template file: block.php
 *
 * Text + Box Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'text-box-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-text-box';
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
        <div class="flex gap-[100px] justify-between">
            <div class="w-[610px]">
                <p class="h3">Make A Reservation</p>
                <p>
                    To book your table please call or email us. Make sure to include date, time, and number of guests in your party.
                </p>
                <p>
                    By Email: <a href="mailto:reservations.hb@thebungalow.com">reservations.hb@thebungalow.com</a>
                </p>
                <p>
                    By Telephone: <a href="tel:3108998530">310.899.8530</a>
                </p>
                <p class="h3">Dress Code</p>
                <p>To maintain the elevated yet relaxed atmosphere of The Bungalow Santa Monica, we kindly ask guests to adhere to our smart casual dress code.</p>
                <p>ACCEPTABLE ATTIRE:</p>
                <ul>
                    <li>Stylish and fashionable attire is encouraged</li>
                    <li>Collared shirts, blouses, tailored jeans, and fashionable sneakers are acceptable</li>
                    <li>Upscale beach or resort wear is permitted before sunset</li>
                </ul>
                <p>NOT PERMITTED:</p>
                <ul>
                    <li>Gym wear, sweatpants, athletic shorts, or tank tops</li>
                    <li>Flip-flops, excessively worn-out sneakers, or beach sandals after sunset</li>
                    <li>Excessively ripped or baggy clothing</li>
                    <li>Offensive graphics or overly revealing outfits</li>
                </ul>
                <p>Our door staff reserves the right to enforce this policy at their discretion to ensure an enjoyable experience for all guests. Thank you for dressing to impress.</p>
            </div>
            <div class="w-[442px]">
                <div class="bg-secondary text-secondary-dark p-10 box">
                    <p class="h3">Location</p>
                    <p>
                        101 Wilshire Blvd. <br>
                        Santa Monica, California 90401
                    </p>
                    <p>
                        <a href="#">Get Directions</a>
                    </p>
                    <p class="h3">Hours</p>
                    p
                        Monday - Friday: 10am - 6pm <br>
                        Saturday - Sunday: 10am - 4pm
                    </p>
                    <p>
                        <a href="#">Get Directions</a>
                    </p>
                    <p>
                        Wed-Thurs: 5pm-12am <br>
                        Fri: 5pm-2am <br>
                        Sat: 2pm-2a <br>
                        Sun: 2pm-10pm
                    </p>
                    <p class="h3">Sunset Sips</p>
                    <p>Discounted drinks and light bites. 5-7pm weekdays, 2-4pm weekends</p>
                </div>
            </div>

        </div>
    </div>
</div>