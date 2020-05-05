<?php
namespace HsLandingElementor\Core;

use HsLandingElementor\Elements\CallToAction;

/**
 * Class Plugin
 *
 * Main Plugin class
 * @since 1.2.0
 */
class Init
{
    private static $_instance = null;
    
    /**
     * Instance
     *
     * Ensures only one instance of the class is loaded or can be loaded.
     *
     * @since  1.2.0
     * @access public
     *
     */
    public static function instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        
        return self::$_instance;
    }
    
    /**
     * @param $file
     *
     * @return mixed
     */
    protected function parseFile($file)
    {
        $aParsed = explode('/', $file);
        $file    = end($aParsed);
        
        return $file;
    }
    
    /**
     * Register Widgets
     *
     * Register new Elementor widgets.
     *
     * @since  1.2.0
     * @access public
     */
    public function registerWidgets()
    {
        foreach (glob(HSLANDING_ELEMENTOR_ELEMENTS_PATH.'*.php') as $file) {
            $file  = $this->parseFile($file);
            $class = 'HsLandingElementor\Elements\\'.str_replace('.php', '', $file);
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new $class);
        }
    }
    
    protected function enqueueCSS()
    {
        // foreach (glob(HSLANDING_ELEMENTOR_ELEMENTS_CSS_PATH.'*.css') as $file) {
        //     $file = $this->parseFile($file);
            
        //     $fileName = str_replace('.css', '', $file);
            
            wp_enqueue_style(
                'hslanding-style',
                HSLANDING_ELEMENTOR_ELEMENTS_CSS_URL.'style.css',
                [],
                HSLANDING_ELEMENTOR_VERSION
            );
            wp_enqueue_style(
                'hslanding-responsive',
                HSLANDING_ELEMENTOR_ELEMENTS_CSS_URL.'responsive.css',
                [],
                HSLANDING_ELEMENTOR_VERSION
            );
        // }
    }
    
    protected function enqueueJS()
    {
        wp_enqueue_script('jquery');
        
        foreach (glob(HSLANDING_ELEMENTOR_ELEMENTS_JS_PATH.'*.js') as $file) {
            $file     = $this->parseFile($file);
            $fileName = str_replace('.js', '', $file);
            
            if ($fileName === 'main') {
                continue;
            }
            
            wp_enqueue_script(
                $fileName,
                HSLANDING_ELEMENTOR_ELEMENTS_JS_URL.$file,
                ['jquery'],
                HSLANDING_ELEMENTOR_VERSION,
                true
            );
        }
        
        wp_enqueue_script(
            'hslanding-main',
            HSLANDING_ELEMENTOR_ELEMENTS_JS_URL.'main.js',
            ['jquery'],
            HSLANDING_ELEMENTOR_VERSION,
            true
        );
    }
    
    /**
     * @return bool
     */
    protected function isHsBlogLanding()
    {
        return is_page_template('templates/hsblog-landing.php');
    }
    
    /**
     * @return bool
     */
    public function enqueueScripts()
    {
        if (!$this->isHsBlogLanding()) {
            return false;
        }
        
        $this->enqueueCSS();
        $this->enqueueJS();
    }
    
    /**
     * @param $aConfig
     *
     * @return mixed
     */
    public function removeHSScripts($aConfig)
    {
        if (!$this->isHsBlogLanding()) {
            return $aConfig;
        }
        
        $aConfig['js']  = true;
        $aConfig['css'] = true;
        
        return $aConfig;
    }
    
    /**
     * @param $status
     *
     * @return bool
     */
    public function allowEnqueuejQuery($status)
    {
        if (!$this->isHsBlogLanding()) {
            return $status;
        }
        
        return true;
    }
    
    /**
     *  Plugin class constructor
     *
     * Register plugin action hooks and filters
     *
     * @since  1.2.0
     * @access public
     */
    public function __construct()
    {
        // Register widgets
        add_action('elementor/widgets/widgets_registered', [$this, 'registerWidgets']);
        add_action('wp_enqueue_scripts', [$this, 'enqueueScripts']);
        add_action('hsblog/filter/app/enqueue-scripts/exclude-scripts', [$this, 'removeHSScripts'], 99);
        add_action('hsblog-childtheme/filter/enqueue-jquery', [$this, 'allowEnqueuejQuery'], 99);
    }
}
