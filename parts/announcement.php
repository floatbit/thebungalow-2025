<?php
$location_fields = get_location_fields();
$post = get_post();
?>

<?php if ($post->post_parent == 0 && $location_fields['show_announcement'] && $location_fields['announcement_image'] && $location_fields['announcement_url'] ): ?>
<div class="announcement">
    <a href="<?php echo $location_fields['announcement_url']; ?>" target="_blank">
    <img src="<?php echo $location_fields['announcement_image']['url']; ?>" alt="<?php echo esc_attr($location_fields['announcement_image']['alt']); ?>" class="w-full"/>
    </a>
</div>
<?php endif; ?>