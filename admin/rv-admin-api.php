<?php
class Rv_Licence_Admin_Api
{
    function __construct()
    {
        add_action('rest_api_init', array($this, 'licence_api_routing'));
    }
    function licence_api_routing()
    {
        register_rest_route('rv-licence/v1', '/activate', array(
            'methods' => 'GET',
            'callback' => array(new LicenceKey, 'activate_licence')
        ));
    }
}
new Rv_Licence_Admin_Api();
