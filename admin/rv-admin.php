<?php
class Rv_Licence_Admin
{
    function __construct()
    {
        add_action('init', array($this, 'create_licence_key'));
    }
    function create_licence_key()
    {
        if (isset($_POST['rv_licence_key']) && !empty($_POST['rv_licence_key'])) {
            $key = $_POST['rv_licence_key'];
            $licence_key = new LicenceKey();
            $licence_key->update($key);
        }
    }
}
new Rv_Licence_Admin();
