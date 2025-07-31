<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class('antialiased'); ?>>


    <?php if (is_location()) { ?>
        <?php get_template_part('parts/section-header'); ?>
        <?php get_template_part('parts/mobile-menu'); ?>
    <?php } else { ?>
        <div class="<?php echo is_front_page() ? 'pt-10 md:pt-20' : 'pt-10 md:pt-20 mb-16'; ?>">
            <?php get_template_part('parts/centered-logo'); ?>
        </div>
    <?php } ?>

    <main>
        