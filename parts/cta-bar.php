<?php
    $location_fields = get_location_fields();
?>
<div class="cta-bar">
    <div class="block bg-secondary text-white">
        <div class="flex flex-col md:flex-row items-center justify-center gap-4 md:gap-8 py-10 md:py-4">
            <p class="text-secondary-dark uppercase h4 mb-2 md:mb-0 px-4 md:px-0"><?php print $location_fields['cta_text']; ?></p>
            <?php if ($location_fields['cta_link']) : ?>
                <a class="btn bg-secondary-dark inline-block px-4 py-2 uppercase h5" href="<?php echo $location_fields['cta_link']['url']; ?>" target="<?php echo $location_fields['cta_link']['target']; ?>"><?php echo $location_fields['cta_link']['title']; ?> <i class="fa-solid fa-arrow-right"></i></a>
            <?php endif; ?>
        </div>
    </div>
</div>
