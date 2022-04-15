<?php
class Rv_Licence_Enqueue_Scripts
{
    function __construct()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts'));
    }
    function enqueue_scripts()
    {
        wp_enqueue_style('rv-licence-style', PLUGIN_DIR_URL . 'src/css/admin.css', null, PLUGIN_VERSION);
    }
}
new Rv_Licence_Enqueue_Scripts();
