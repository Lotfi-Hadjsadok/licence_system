<?php
class Rv_Licence_Admin_Menu
{
    function __construct()
    {
        add_action('admin_menu', array($this, "generate_settings_page"));
    }
    function generate_settings_page()
    {
        $menu_pages = new Menu_Pages('Licence Settings', 'Licence Settings', 'manage_options', 'rv-licence-settings', array($this, 'settings_page_display'), 'dashicons-superhero');

        $menu_pages->create_menu_page();
    }
    function settings_page_display()
    {
        require_once PLUGIN_DIR . 'callbacks/licence-settings-html.php';
    }
}
new Rv_Licence_Admin_Menu();
