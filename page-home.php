<?php get_header() ?>

<script>
    function handleMenuItemColor (newValue) {
	elementor.reloadPreview();
}

</script>
<div class="content">
    <?php echo the_content(); ?>
</div>
<?php get_footer() ?>