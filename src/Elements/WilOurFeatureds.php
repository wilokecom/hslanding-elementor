<?php

namespace HsLandingElementor\Elements;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

/**
 * Class WilOurFeatureds
 * @package HsLandingElementor\Elements
 */
class WilOurFeatureds extends Widget_Base
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
        return 'hslanding-wil-out-featureds-section';
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
        return __('Wil Our Featureds Section', 'hslanding-elementor');
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
            'sub-title-line1',
            [
                'label'   => __('Sub Title Line1', 'elementor-hello-world'),
                'type'    => Controls_Manager::TEXTAREA, 
                'default' => ''
            ]
        );
        $this->add_control(
            'sub-title-line2',
            [
                'label'   => __('Sub Title Line2', 'elementor-hello-world'),
                'type'    => Controls_Manager::TEXTAREA, 
                'default' => ''
            ]
        );
        // end_controls_section -----
        $this->end_controls_section();
        
        // start_controls_section -----
        $this->start_controls_section(
            'pricing_settings',
            [
                'label' => __('Pricing Settings', 'elementor-hello-world'),
            ]
        );
        $oOurFeaturedsRepeater->add_control(
            'icon', [
                'label'       => __('Icon', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        ); 
        $oOurFeaturedsRepeater->add_control(
            'icon-color', [
                'label'       => __('Icon Color', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        ); 
        $oOurFeaturedsRepeater->add_control(
            'href', [
                'label'       => __('Href', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        ); 
        $oOurFeaturedsRepeater->add_control(
            'title', [
                'label'       => __('Featured Title', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        ); 
        $oOurFeaturedsRepeater->add_control(
            'content', [
                'label'       => __('Featured Content', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        ); 
         
        $this->add_control(
            'featureds',
            [
                'label'  => __('Featureds', 'plugin-domain'),
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
                <section class="featured-area pt-75 pb-45">
                    <div class="d-none d-xl-block featured-round"><img src="assets/img/feature/feature.png" alt=""></div>
                    <div class="d-none d-xl-block featured-round-small"><img src="assets/img/feature/small-feature.png" alt=""></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 text-center">
                                <div class="section-title">
                                    <h2> <?php echo esc_html($aSettings['title']); ?></h2>
                                    <p> <?php echo esc_html($aSettings['sub-title-line1']); ?> <br> <?php echo esc_html($aSettings['sub-title-line2']); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php foreach ($aSettings['featureds'] as $aFeatureds) : ?>
                                <!-- single-featured -->
                                <div class="col-lg-4 col-md-6">
                                    <div class="featured-item wow animated customFadeInUp dalay-0-1s">
                                        <div class="featured-icon <?php echo esc_html($aFeatureds['icon-color']); ?>">
                                            <i class="<?php echo esc_html($aFeatureds['icon']); ?>"></i>
                                        </div>
                                        <div class="featured-content">
                                            <h5><a href="<?php echo esc_html($aFeatureds['href']); ?>"><?php echo esc_html($aFeatureds['title']); ?></a></h5>
                                            <p><?php echo esc_html($aFeatureds['content']); ?></p>
                                        </div>
                                        <div class="hover"></div>
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
