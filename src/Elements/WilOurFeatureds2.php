<?php

namespace HsLandingElementor\Elements;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

/**
 * Class WilOurFeatureds2
 * @package HsLandingElementor\Elements
 */
class WilOurFeatureds2 extends Widget_Base
{
    /**
     * Retrieve the widget name.
     *
     * @return string Widget name.
     * @since  1.0.0
     *
     * @access public
     *
     */
    public function get_name()
    {
        return 'hslanding-wil-our-featureds-2-section';
    }
    
    /**
     * Retrieve the widget title.
     *
     * @return string Widget title.
     * @since  1.0.0
     *
     * @access public
     *
     */
    public function get_title()
    {
        return __('Wil Our Featureds 2 Section', 'hslanding-elementor');
    }
    
    /**
     * Retrieve the widget icon.
     *
     * @return string Widget icon.
     * @since  1.0.0
     *
     * @access public
     *
     */
    public function get_icon()
    {
        return 'eicon-posts-ticker';
    }
    
    /**
     * Retrieve the list of categories the widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * Note that currently Elementor supports only one category.
     * When multiple categories passed, Elementor uses the first one.
     *
     * @return array Widget categories.
     * @since  1.0.0
     *
     * @access public
     *
     */
    public function get_categories()
    {
        return ['hsblog'];
    }
    
    /**
     * Register the widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since  1.0.0
     *
     * @access protected
     */
    protected function _register_controls()
    {
        $oOurFeaturedsRepeater = new \Elementor\Repeater();

        // start_controls_section -----
        $this->start_controls_section(
            'general_settings_section',
            [
                'label' => __('General Settings', 'elementor-hello-world'),
            ]
        );
        
        $this->add_control(
            'title',
            [
                'label'   => __('Title', 'elementor-hello-world'),
                'type'    => Controls_Manager::TEXTAREA, 
                'default' => ''
            ]
        );  
        $this->add_control(
            'sub-title',
            [
                'label'   => __('Sub Title', 'elementor-hello-world'),
                'type'    => Controls_Manager::WYSIWYG, 
                'default' => ''
            ]
        );  
        // end_controls_section -----
        $this->end_controls_section();
        
        // start_controls_section -----
        $this->start_controls_section(
            'features_settings',
            [
                'label' => __('Features Settings', 'elementor-hello-world'),
            ]
        );
        $oOurFeaturedsRepeater->add_control(
            'img', [
                'label'       => __('Image', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        ); 
        $oOurFeaturedsRepeater->add_control(
            'title', [
                'label'       => __('Title', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        ); 
        $oOurFeaturedsRepeater->add_control(
            'desc', [
                'label'       => __('Description', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::WYSIWYG,
                'label_block' => true,
            ]
        ); 
         
        $this->add_control(
            'features',
            [
                'label'  => __('Features', 'plugin-domain'),
                'type'   => \Elementor\Controls_Manager::REPEATER,
                'fields' => $oOurFeaturedsRepeater->get_controls()
            ]
        );
        
         // end_controls_section -----
         $this->end_controls_section();
        
    }
    
    /**
     * Render the widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since  1.0.0
     *
     * @access protected
     */
    protected function render()
    {
        $aSettings = $this->get_settings_for_display();
        ?>
            <!--==================================================================== 
                        Start Our featureds section
            =====================================================================-->
                
            <section class="cloud-service-two mb-165 rmb-65 text-center">
                <div class="container">
                    <div class="cloud-section-title mb-75">
                        <h2><?php echo esc_html($aSettings['title']); ?></h2>
                        <p><?php echo ($aSettings['sub-title']); ?></p>
                    </div>

                    <div class="row">
                        <?php foreach ($aSettings['features'] as $aFeatureds) : ?>
                            <!-- single-service -->
                            <div class="col-lg-4 col-md-6">
                                <div class="cloud-single-service-two">
                                    <img src="<?php echo esc_html($aFeatureds['img']['url']); ?>" alt="Service Image">
                                    <h5><?php echo esc_html($aFeatureds['title']); ?></h5>
                                    <p><?php echo ($aFeatureds['desc']); ?></p>
                                </div>
                            </div> 
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
            
            <!--==================================================================== 
                                    end Our featureds section
            =====================================================================-->
        <?php
    }
}
