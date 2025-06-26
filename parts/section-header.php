<?php
    $logo = get_location_logo();
?>
<header class="sticky top-0 z-50 bg-white">
    <div class="container">
        <div class="flex items-center justify-between relative">
            <div class="logo">
                <a href="/">
                    <img src="<?php echo $logo['url']; ?>" alt="Logo">
                </a>
            </div>
            <a class="mobile-toggle btn inline-block md:hidden" href="#">Menu</a>
        </div>
    </div>
</header>