<?php
$location_fields = get_location_fields();
$post = get_post();
?>

<?php if ($location_fields['show_popup'] && $location_fields['popup_image']): ?>
<div class="popup">
    <div class="image-container">
        <img src="<?php echo $location_fields['popup_image']['url']; ?>" alt="<?php echo esc_attr($location_fields['popup_image']['alt']); ?>" class="w-full"/>
    </div>
</div>
<?php endif; ?>