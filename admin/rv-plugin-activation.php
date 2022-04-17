<?php
class Rv_Plugin_Activation
{
    function __construct()
    {
        register_activation_hook(PLUGIN_DIR . 'rv-licence.php', array($this, 'on_activation_function'));
    }
    function on_activation_function()
    {
        $licence = new LicenceKey();
        $licence->create_table();
    }
}
new Rv_Plugin_Activation();
