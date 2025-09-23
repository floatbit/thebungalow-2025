<?php
    $location_fields = get_location_fields();
?>
<div class="location-information">
    <div class="bg-primary text-primary-dark pt-20 pb-[1px]">
        <div class="container">
            <div class="flex flex-col md:flex-row gap-6 md:gap-12">
                <!-- Column 1: Image (about 1/2 width)-->
                <div class="w-full basis-6/12 flex-shrink-0 mb-8 md:mb-0 footer-image">
                    <?php $footer_image = $location_fields['footer_image']; ?>
                    <?php if ($footer_image) : ?>
                        <img src="<?php echo $footer_image['url']; ?>" alt="<?php echo $footer_image['alt']; ?>" class="w-full h-auto" />
                    <?php endif; ?>
                </div>
                <!-- Column 2: Links (about 1/4 width) -->
                <div class="w-full md:basis-2/12">
                    <div class="flex md:block gap-12">
                        <?php $nav_links = get_location_nav_links(); ?>
                        <?php if ($nav_links) { ?>
                        <div class="basis-6/12 md:mb-10">
                            <p class="h4">Info</p>
                            <ul>
                            <?php foreach ($nav_links as $link): ?>
                                <li><a href="<?php echo $link['link']['url']; ?>" class="<?php echo $link['link']['target'] == '_blank' ? 'external' : ''; ?>"><?php echo $link['link']['title']; ?></a></li>
                            <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php } ?>
                        <div class="basis-6/12">
                            <p class="h4">Follow</p>
                            <ul>
                                <?php foreach($location_fields['social_links'] as $field): ?>
                                    <li><a href="<?php echo $field['link']['url']; ?>" target="_blank"><?php echo $field['link']['title']; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Column 3: Links (about 1/4 width) -->
                <div class="w-full md:basis-4/12">
                    <p class="h4">Visit</p>
                    <p>
                        <?php echo $location_fields['address']; ?>
                    </p>
                    <?php if ($location_fields['directions_url']) { ?>
                    <p>
                        <a href="<?php echo $location_fields['directions_url']; ?>" target="_blank">Get Directions</a>
                    </p>
                    <?php } ?>
                    </p>
                    <p class="h4">Hours</p>
                    <?php if ($location_fields['hours_intro']) { ?>
                        <p>
                            <?php echo $location_fields['hours_intro']; ?>
                        </p>
                    <?php } ?>
                    <?php if ($location_fields['days_hours']) { ?>
                    <p>
                        <?php foreach($location_fields['days_hours'] as $field): ?>
                            <?php echo $field['day']; ?>: <?php echo $field['hours']; ?><br>
                        <?php endforeach; ?>
                    </p>
                    <?php } ?>
                    <?php if ($location_fields['phone_number']) { ?>
                        <p class="h4">Call Us</p>
                        <p>
                            <a href="tel:<?php echo $location_fields['phone_number']; ?>"><?php echo $location_fields['phone_number']; ?></a>
                        </p>
                    <?php } ?>
                    </p>
                </div>
            </div>

            <div class="location-links mt-20 mb-10 md:mb-4">
                <div class="flex flex-col md:flex-row gap-2 md:gap-20 justify-between">
                    <p class="h3">
                        <a href="/huntington-beach">Huntington Beach</a>
                    </p>
                    <p class="h3">
                        <a href="/santa-monica">Santa Monica</a>
                    </p>
                    <p class="h3">
                        <a href="/long-beach">Long Beach</a>
                    </p>
                    <p class="h3">
                        <a href="/san-diego">San Diego</a>
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>