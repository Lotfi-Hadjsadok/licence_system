<?php

/**
 * Plugin Name: RV Licencing
 * Description: To licence my plugin & themes
 * Author: Lotfi Hadjsadok
 * Author URI: https://www.facebook.com/lotfihadjsadok.dev
 */

if (!(defined("ABSPATH"))) die;

require_once(ABSPATH . 'wp-admin/includes/plugin.php');
$plugin_data = get_plugin_data(__FILE__);

// CONSTANTS
define('PLUGIN_DIR', plugin_dir_path(__FILE__));
define('PLUGIN_DIR_URL', plugin_dir_url(__FILE__));
define('PLUGIN_VERSION', $plugin_data['Version']);

// UTILITIES
require_once PLUGIN_DIR . 'utils/menu-pages.php';

// CLASSES
require_once PLUGIN_DIR . 'admin/classes/LicenceKey.php';
require_once PLUGIN_DIR . 'admin/classes/LicenceFileGenerator.php';

// ADMIN CLASSES
require_once PLUGIN_DIR . 'admin/rv-enqueue-scripts.php';
require_once PLUGIN_DIR . 'admin/rv-admin-menu.php';
require_once PLUGIN_DIR . 'admin/rv-admin.php';
require_once PLUGIN_DIR . 'admin/rv-admin-api.php';

// ACTIVATION HOOK
require_once PLUGIN_DIR . 'admin/rv-plugin-activation.php';
