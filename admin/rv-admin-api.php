<?php
class Rv_Licence_Admin_Api
{
    function __construct()
    {
        add_action('rest_api_init', array($this, 'licence_api_routing'));
        add_action('wp_ajax_nopriv_change_status', array($this, 'change_status'));
        add_action('wp_ajax_change_status', array($this, 'change_status'));
    }
    function licence_api_routing()
    {
        register_rest_route('rv-licence/v1', '/activate', array(
            'methods' => 'GET',
            'callback' => array(new LicenceKey, 'activate_licence')
        ));
    }
    function change_status()
    {
        $key = $_POST['key'];
        $licence = new LicenceKey();
        $licence->change_status($key);
        wp_send_json(array(
            'status' => 1,
            'response' => 'Status Changed !'
        ));
    }
}
new Rv_Licence_Admin_Api();
