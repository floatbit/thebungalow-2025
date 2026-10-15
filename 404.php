<?php
/**
 * Template for pages that could not be found.
 */
get_header();
?>

<section class="container-narrow py-16 md:py-24 text-center" aria-labelledby="page-not-found-title">
    <p class="h2" aria-hidden="true">404</p>
    <h1 id="page-not-found-title"><?php esc_html_e('Page not found', 'thebungalow-2025'); ?></h1>
    <p><?php esc_html_e('The page you are looking for may have moved or no longer exists.', 'thebungalow-2025'); ?></p>
    <a class="btn" href="<?php echo esc_url(home_url('/')); ?>">
        <?php esc_html_e('Back to home', 'thebungalow-2025'); ?>
    </a>
</section>

<?php get_footer(); ?>
