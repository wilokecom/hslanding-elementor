<?php
/*
 * Plugin Name: Hs Landing Elementor
 * Plugin URI: https://wiloke.com
 * Author: wiloke
 * Author URI: https://wiloke.com
 * Description: HPBuilder Builder
 * Version: 1.0
 */

define('HSLANDING_ELEMENTOR_VERSION', 1.2);
define('HSLANDING_ELEMENTOR_PATH', plugin_dir_path(__FILE__));
define('HSLANDING_ELEMENTOR_URL', plugin_dir_url(__FILE__));
define('HSLANDING_ELEMENTOR_ELEMENTS_PATH', HSLANDING_ELEMENTOR_PATH . 'src/Elements/');
define('HSLANDING_ELEMENTOR_ELEMENTS_CSS_URL', HSLANDING_ELEMENTOR_URL . 'assets/css/');
define('HSLANDING_ELEMENTOR_ELEMENTS_CSS_PATH', HSLANDING_ELEMENTOR_PATH . 'assets/css/');
define('HSLANDING_ELEMENTOR_ELEMENTS_JS_URL', HSLANDING_ELEMENTOR_URL . 'assets/js/');
define('HSLANDING_ELEMENTOR_ELEMENTS_JS_PATH', HSLANDING_ELEMENTOR_PATH . 'assets/js/');
define('HSLANDING_ELEMENTOR_ELEMENTS_IMG_URL', HSLANDING_ELEMENTOR_URL . 'assets/img/');


require_once plugin_dir_path(__FILE__).'vendor/autoload.php';
\HsLandingElementor\Core\Init::instance();
