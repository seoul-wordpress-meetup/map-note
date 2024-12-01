<?php
/**
 * Options page form
 * @var \Bojaghi\Template\Template $this
 */
?>

<?php echo $this->fetch('markup.before'); ?>
<form method="post" action="<?php echo esc_url(admin_url('options.php')); ?>">
    <?php settings_fields($this->fetch('option_group')); ?>
    <?php do_settings_sections($this->fetch('page_slug')); ?>
    <?php submit_button(); ?>
</form>
<?php echo $this->fetch('markup.after'); ?>
