<?php
class Rv_Licence_Enqueue_Scripts
{
    function __construct()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts'));
    }
    function enqueue_scripts()
    {
        // CSS
        wp_enqueue_style('rv-licence-style', PLUGIN_DIR_URL . 'src/css/admin.css', null, PLUGIN_VERSION);

        // JS
        wp_enqueue_script('rv-licence-status-toggler', PLUGIN_DIR_URL . 'src/js/LicenceStatusToggle.js', array('jquery'), PLUGIN_VERSION, true);
        wp_localize_script('rv-licence-status-toggler', 'wpData', array(
            'ajaxurl' => admin_url('admin-ajax.php')
        ));
    }
}
new Rv_Licence_Enqueue_Scripts();
