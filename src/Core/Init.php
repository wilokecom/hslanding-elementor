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
        
        // tuan add link style ------
       
        wp_enqueue_style(
            'hslanding-line-awesome',
            'https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css',
            [],
            HSLANDING_ELEMENTOR_VERSION
        );
        wp_enqueue_style(
            'hslanding-slick.css',
            '//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css',
            [],
            HSLANDING_ELEMENTOR_VERSION
        );
        wp_enqueue_style(
            'hslanding-slick-theme',
            '//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css',
            [],
            HSLANDING_ELEMENTOR_VERSION
        );

        wp_enqueue_style(
            'vendors-grid',
            HSLANDING_ELEMENTOR_ELEMENTS_VENDORS_PATH.'/boostrap/grid.css',
            [],
            HSLANDING_ELEMENTOR_VERSION
        );
        wp_enqueue_style(
            'main-styles',
            HSLANDING_ELEMENTOR_ELEMENTS_CSS_URL.'/styles.css',
            [],
            HSLANDING_ELEMENTOR_VERSION
        );

    }
    
    protected function enqueueJS()
    {
        wp_enqueue_script('jquery');
        
        // foreach (glob(HSLANDING_ELEMENTOR_ELEMENTS_JS_PATH.'*.js') as $file) {
        //     $file     = $this->parseFile($file);
        //     $fileName = str_replace('.js', '', $file);
            
        //     if ($fileName === 'main') {
        //         continue;
        //     }
            
        //     wp_enqueue_script(
        //         $fileName,
        //         HSLANDING_ELEMENTOR_ELEMENTS_JS_URL.$file,
        //         ['jquery'],
        //         HSLANDING_ELEMENTOR_VERSION,
        //         true
        //     );
        // }
        
        wp_enqueue_script(
            'hslanding-main-scripts',
            HSLANDING_ELEMENTOR_ELEMENTS_JS_URL.'scripts.js',
            ['jquery'],
            HSLANDING_ELEMENTOR_VERSION,
            false
        );
        // tuan add link scripp -0---
        wp_enqueue_script(
            'hslanding-jquery-1.11',
            '//code.jquery.com/jquery-1.11.0.min.js',
            ['jquery'],
            HSLANDING_ELEMENTOR_VERSION,
            false
        );
        wp_enqueue_script(
            'hslanding-jquery-migrate',
            '//code.jquery.com/jquery-migrate-1.2.1.min.js',
            ['jquery'],
            HSLANDING_ELEMENTOR_VERSION,
            false
        );
        wp_enqueue_script(
            'hslanding-slick@1.8',
            '//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js',
            ['jquery'],
            HSLANDING_ELEMENTOR_VERSION,
            false
        );
        // tuan add link scripp -0---
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
     * @param $oElementsManager
     */
    function initCategories($oElementsManager)
    {
        $oElementsManager->add_category(
            "hsblog",
            array(
                "title" => __("HsBlog Landing",'hslanding-elementor'),
                "icon" => "fa fa-plug",
            )
        );
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
        add_action("elementor/elements/categories_registered", array($this, "initCategories"));
        add_action('wp_enqueue_scripts', [$this, 'enqueueScripts']);
        add_action('hsblog/filter/app/enqueue-scripts/exclude-scripts', [$this, 'removeHSScripts'], 99);
        add_action('hsblog-childtheme/filter/enqueue-jquery', [$this, 'allowEnqueuejQuery'], 99);
    }
}
