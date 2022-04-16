function __construct()
{
add_action('admin_notices', array($this, 'licence_not_actif'));
add_action('admin_menu', array($this, 'licence_menu_page'));
add_action('init', array($this, 'activate_licence'));
add_action('rest_api_init', array($this, 'licence_api'));
}
function licence_api()
{
register_rest_route('rv-licence/v1', '/deactivate', array(
'methods' => 'GET',
'callback' => array($this, 'remote_deactivate_licence')
));
register_rest_route('rv-licence/v1', '/activate', array(
'methods' => 'POST',
'callback' => array($this, 'remote_activate_licence')
));
}
function remote_activate_licence($request)
{
update_option('rv-licence', $request->get_param('licence'));
}
function remote_deactivate_licence()
{
update_option('rv-licence', '');
wp_send_json(array(
'status' => 1,
'response' => 'Licence Deactivated !'
));
}
function activate_licence()
{
if (isset($_POST['rv-licence']) && isset($_POST['rv-licence-activate'])) {
$licence_key = $_POST['rv-licence'];
$ch = curl_init($this->url . '/wp-json/rv-licence/v1/activate');
$data = http_build_query(array(
'website' => get_site_url(),
'key' => $licence_key
));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = json_decode(curl_exec($ch));
curl_close($ch);
if ($response->status == 1) {
update_option('rv-licence', $licence_key);
} else {
die($response->response);
}
}
}
function licence_not_actif()
{
$licence = get_option('rv-licence');
if ($licence) return;
echo '<div class="notice notice-error">';
    echo '<p>';
        echo 'Theme not activated ';
        echo '<a href="admin.php?page=rv-licence-settings">Activate</a>';
        echo '</p>';
    echo '</div>';
}
function licence_menu_page()
{
add_menu_page('Licence Settings', 'Licence Settings', 'manage_options', 'rv-licence-settings', array($this, 'menu_page_html'), 'dashicons-shield-alt');
}
function menu_page_html()
{
$licence = get_option('rv-licence');
echo '<div class="wrap">';
    echo '<h1>Licence Settings</h1>';
    echo '<form method="POST">';
        echo '<h3 style="margin-top: 30px;">Licence Key</h3>';
        echo '<input type="text" name="rv-licence" value="' . $licence . '">';
        echo '<input class="button button-primary" name="rv-licence-activate" type="submit" value="Activate">';
        echo '</form>';
    echo '</div>';
}
}
new Rv_Licence();