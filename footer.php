    </main>


    <div class="lines-bank">
        <?php $lines = [
            'line1' => get_template_directory() . '/dist/images/line1.svg',
            'line2' => get_template_directory() . '/dist/images/line2.svg',
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