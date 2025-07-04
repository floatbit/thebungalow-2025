    </main>

    <?php get_template_part('parts/section-footer'); ?>

    <div class="lines-bank hidden">
        <?php $lines = [
            'line1' => get_template_directory() . '/dist/images/line1.svg',
            'line2' => get_template_directory() . '/dist/images/line2.svg',
            'line3' => get_template_directory() . '/dist/images/line3.svg',
            'line4' => get_template_directory() . '/dist/images/line4.svg',
        ]; ?>
        <?php foreach ($lines as $index=>$line) : ?>
            <div class="line-item line-<?php echo $index; ?>">
                <?php echo file_get_contents($line); ?>
            </div>
        <?php endforeach; ?>
    </div>
    <?php wp_footer(); ?>
</body>

</html>