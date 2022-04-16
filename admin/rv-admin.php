<?php
class Rv_Licence_Admin
{
    function __construct()
    {
        add_action('init', array($this, 'create_licence_key'));
        add_action('init', array($this, 'delete_licence_key'));
        add_action('init', array($this, 'generate_licence_code'));
    }
    function generate_licence_code()
    {
        if (isset($_POST['rv-generate-licence'])) {
            $licence_generator = new LicenceFileGenerator();
            $code = $licence_generator->generate();
            $handle = fopen("Rv_Licence.php", "w");
            fwrite($handle, $code);
            fclose($handle);

            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename('Rv_Licence.php'));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize('Rv_Licence.php'));
            readfile('Rv_Licence.php');
            exit;
        }
    }
    function create_licence_key()
    {
        if (isset($_POST['rv_licence_key']) && !empty($_POST['rv_licence_key'])) {
            $key = $_POST['rv_licence_key'];
            $licence_key = new LicenceKey();
            $licence_key->create($key);
        }
    }
    function delete_licence_key()
    {
        if (isset($_POST['licence-key']) && !empty($_POST['licence-delete'])) {
            $key = $_POST['licence-key'];
            $licence_key = new LicenceKey();
            $licence_key->deactivate_to_client($key)->delete($key);
        }
    }
}
new Rv_Licence_Admin();
