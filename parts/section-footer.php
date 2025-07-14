<footer>

    <?php if (is_location()) : ?>
        <?php get_template_part('parts/cta-bar'); ?>
        <?php get_template_part('parts/location-information'); ?>
    <?php endif; ?>

    <?php get_template_part('parts/copyright'); ?>
</footer>
