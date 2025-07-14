<?php
    $logo = get_location_logo();
?>
<header class="sticky top-0 z-50 bg-white">
    <div class="container">
        <div class="relative">
            <div class="flex items-center justify-between py-[20px]">
                <div class="logo">
                    <a href="/">
                        <img src="<?php echo $logo['url']; ?>" alt="Logo">
                    </a>
                </div>
                <div class="links hidden md:flex flex-grow justify-between ml-[50px] lg:ml-[88px] max-w-[944px] mb-[10px]">
                    <a href="/" class="home">Home</a>
                    <?php $nav_links = get_location_nav_links(); ?>
                    <?php foreach ($nav_links as $link): ?>
                        <a href="<?php echo $link['link']['url']; ?>" class="<?php echo $link['link']['target'] == '_blank' ? 'external' : ''; ?>"><?php echo $link['link']['title']; ?></a>
                    <?php endforeach; ?>
                </div>
                <a class="mobile-toggle btn inline-block md:hidden" href="#">Menu</a>
            </div>
            <p class="absolute right-0 top-0 locations-link hidden md:block">
                <a class="bg-secondary no-underline px-3 pt-[4px] pb-[6px] inline-block hover:bg-primary" href="/">
                    View All Locations
                </a>
            </p>
        </div>
    </div>
</header>