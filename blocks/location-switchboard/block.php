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
?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">

    <div class="container pt-20">
        <div class="flex justify-center">
            <div class="max-w-[706px] text-center">
                <img src="<?php print assets_url('/dist/images/logo.svg'); ?>" alt="">
            </div>
        </div>    
    </div>

    <div class="container mb-10">
        <div class="relative max-w-[764px] mx-auto">
            <img src="<?php print assets_url('/dist/images/LongBeachHero_LargeSalmon 1.svg'); ?>" alt="">
            <p class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-center w-full h1">Good Times<br>Live Here</p>
        </div>
    </div>

    <div class="container mb-10 relative mt-[-65px]">
        <div class="flex justify-center">
            <div class="max-w-[706px] text-center">
                <p>Where the good times roll and the vibes are always just right. With a touch of nostalgia and a whole lot of charm, we invite  you to kick back, sip on a handcrafted cocktail, and enjoy the company of friends old and new. We’re  not just a bar – we are your spot to escape,, soak in the atmosphere, and make memories that stick around.</p>
            </div>
        </div>    
    </div>

    <div class="container">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 grid-locations">
            <!-- Left Column -->
            <div class="space-y-6">
                <!-- Santa Monica -->
                <a href="#" class="block relative group overflow-hidden aspect-[3/4]" aria-label="View Santa Monica location">
                    <img src="https://placehold.co/600x800/222/fff?text=Santa+Monica" alt="A surfer on a wave" class="w-full h-full object-cover transition-transform duration-300 ease-in-out group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6 w-full">
                        <div class="flex justify-between items-end">
                            <div class="text-white font-mono text-sm">
                                <p>101 Wilshire Blvd.</p>
                                <p>Santa Monica, CA</p>
                            </div>
                            <span class="inline-block bg-[#9DE2C7] text-black px-4 py-2 mb-0 h5">Santa Monica</span>
                        </div>
                    </div>
                </a>

                <!-- San Diego -->
                <a href="#" class="block relative group overflow-hidden aspect-[4/3]" aria-label="View San Diego location">
                    <img src="https://placehold.co/800x600/222/fff?text=San+Diego" alt="A woman on a beach" class="w-full h-full object-cover transition-transform duration-300 ease-in-out group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6 w-full">
                        <div class="flex justify-between items-end">
                            <div class="text-white font-mono text-sm">
                                <p>TK. TK TK TK</p>
                                <p>San Diego, CA</p>
                            </div>
                            <span class="inline-block bg-[#F8B96E] text-black px-4 py-2 mb-0 h5">San Diego</span>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Right Column -->
            <div class="space-y-6">
                <!-- Huntington Beach -->
                <a href="#" class="block relative group overflow-hidden aspect-[4/3]" aria-label="View Huntington Beach location">
                    <img src="https://placehold.co/800x600/222/fff?text=Huntington+Beach" alt="People with a vintage car and surfboards" class="w-full h-full object-cover transition-transform duration-300 ease-in-out group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6 w-full">
                        <div class="flex justify-between items-end">
                            <div class="text-white font-mono text-sm">
                                <p>21058 Pacific Coast Hwy #240</p>
                                <p>Huntington Beach, CA</p>
                            </div>
                            <span class="inline-block bg-[#E89286] text-black px-4 py-2 mb-0 h5">Huntington Beach</span>
                        </div>
                    </div>
                </a>

                <!-- Long Beach -->
                <a href="#" class="block relative group overflow-hidden aspect-[3/4]" aria-label="View Long Beach location">
                    <img src="https://placehold.co/600x800/222/fff?text=Long+Beach" alt="A woman with a guitar on a couch" class="w-full h-full object-cover transition-transform duration-300 ease-in-out group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6 w-full">
                        <div class="flex justify-between items-end">
                            <div class="text-white font-mono text-sm">
                                <p>6400 E Pacific Coast Hwy #200</p>
                                <p>Long Beach, CA</p>
                            </div>
                            <span class="inline-block bg-[#C3B3F6] text-black px-4 py-2 mb-0 h5">Long Beach</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    
</div>