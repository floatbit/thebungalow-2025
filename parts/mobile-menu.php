<?php

$location_fields = get_location_fields();
?>

<div id="mobile-menu" class="fixed inset-0 z-30 bg-primary transform -translate-y-full transition-transform duration-300 ease-in-out h-100vh overflow-y-auto">
    <div class="container pt-[140px] pb-[50px]">
        <div class="flex gap-10 mb-4">
            <div class="w-1/2">
                <p class="h4">Info</p>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/">About</a></li>
                    <li><a href="/">Happenings</a></li>
                    <li><a href="/">Private Events</a></li>
                    <li><a href="/">Contact</a></li>
                </ul>
            </div>
            <div class="w-1/2">
                <p class="h4">Follow</p>
                <ul>
                    <?php foreach ($location_fields['social_links'] as $field) : ?>
                        <li><a href="<?php echo $field['link']['url']; ?>"><?php echo $field['link']['title']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="flex gap-10">
            <div class="w-full">
                <p class="h4">Visit</p>
                <p>
                    <?php echo $location_fields['address']; ?>
                </p>
                <p>
                    <a href="<?php echo $location_fields['directions_url']; ?>" target="_blank">Get Directions</a>
                </p>
                <p class="h4">Hours</p>
                <p>
                    <?php foreach ($location_fields['days_hours'] as $field) : ?>
                        <?php echo $field['day']; ?>: <?php echo $field['hours']; ?><br>
                    <?php endforeach; ?>
                </p>
                <p class="h4">Call Us</p>
                <p>
                    <a href="tel:<?php echo $location_fields['phone_number']; ?>"><?php echo $location_fields['phone_number']; ?></a>
                </p>

                <div class="other-locations">
                    <p class="tiny mb-0">Check out our other locations:</p>
                    <p class="h4 mt-0">
                        <a href="/">Santa Monica</a>
                        <a href="/">Long Beach</a>
                        <a href="/">New Location</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>