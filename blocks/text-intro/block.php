<?php
/**
 * Block template file: block.php
 *
 * Text Intro Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'text-intro-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-text-intro';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}

$classes .= ' ' . get_field('bottom_margin');

// Get ACF fields
$title_small = get_field('title_small');
$title_large = get_field('title_large');
$title_with_line = get_field('title_with_line');
$text = get_field('text');
$links = get_field('links');
$image = get_field('image');
?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
    <div class="container">
        <div class="md:flex gap-6 justify-between">
            <div class="<?php echo $image ? 'basis-[55%]' : 'basis-full'; ?>">
                <div class="text <?php echo $image ? 'text-image' : 'text-no-image'; ?>">
                    
                    <?php if ($title_small): ?>
                        <h1 class="p"><?php echo esc_html($title_small); ?></h1>
                    <?php endif; ?>

                    <?php if ($title_large): ?>
                        <?php if ($title_small): ?>
                            <h2><?php echo esc_html($title_small); ?></h2>
                        <?php else: ?>
                            <h1><?php echo esc_html($title_large); ?></h1>
                        <?php endif; ?>
                    <?php endif; ?>
                    
                    <?php if ($title_with_line): ?>
                        <p class="h1">
                            <span class="inline-block line">
                                <?php echo $title_with_line; ?>
                            </span>
                        </p>
                    <?php endif; ?>
                    
                    <?php if ($text): ?>
                        <div class="text-content">
                            <?php echo $text; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($links): ?>
                        <p class="flex gap-6 flex-wrap items-center">
                            <?php foreach ($links as $link_item): 
                                $link = $link_item['link'];
                                $style_button = $link_item['style_button'];
                                $file = $link_item['file'];

                                if ($file) {
                                    $href = $file['url'];
                                } else if ($link) {
                                    $href = $link['url'];
                                }
                                
                                if ($link):
                                    $link_class = $style_button ? 'btn btn-secondary' : '';
                            ?>
                                <a <?php echo $link_class ? 'class="' . esc_attr($link_class) . '"' : ''; ?> 
                                   href="<?php echo esc_url($href); ?>"
                                   target="<?php echo esc_attr($link['target']); ?>">
                                    <?php echo esc_html($link['title']); ?>
                                </a>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <?php if ($image): ?>
                <div class="basis-[45%] hidden md:block">
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>