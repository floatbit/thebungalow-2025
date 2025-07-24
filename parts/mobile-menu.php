<?php

$location_fields = get_location_fields();
?>

<div id="mobile-menu" class="fixed inset-0 z-30 bg-primary transform -translate-y-full transition-transform duration-300 ease-in-out h-100vh overflow-y-auto">
    <div class="pt-[80px] pb-[50px]">
        <?php get_template_part('parts/location-information'); ?>
    </div>
</div>