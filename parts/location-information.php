<div class="location-information">
    <div class="bg-primary text-primary-dark pt-20 pb-[1px]">
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
                        <?php foreach($location_fields['social_links'] as $field): ?>
                            <li><a href="<?php echo $field['link']['url']; ?>" target="_blank"><?php echo $field['link']['title']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <!-- Column 3: Links (about 1/4 width) -->
                <div class="w-full md:basis-4/12">
                    <p class="h4">Visit</p>
                    <p>
                        <?php echo $location_fields['address']; ?>
                    </p>
                    <p>
                        <a href="<?php echo $location_fields['directions_url']; ?>" target="_blank">Get Directions</a>
                    </p>
                    <p class="h4">Hours</p>
                    <p>
                        <?php foreach($location_fields['days_hours'] as $field): ?>
                            <?php echo $field['day']; ?>: <?php echo $field['hours']; ?><br>
                        <?php endforeach; ?>
                    </p>
                    <p class="h4">Call Us</p>
                    <p>
                        <a href="tel:<?php echo $location_fields['phone_number']; ?>"><?php echo $location_fields['phone_number']; ?></a>
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

        </div>
    </div>
</div>