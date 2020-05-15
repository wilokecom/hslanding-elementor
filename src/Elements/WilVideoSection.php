<?php

namespace HsLandingElementor\Elements;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

/**
 * Class WilVideoSection
 * @package HsLandingElementor\Elements
 */
class WilVideoSection extends Widget_Base
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
        return 'hslanding-wil-video-section';
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
        return __('Wil Video Section', 'hslanding-elementor');
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
            'general-settings',
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
                'type'    => Controls_Manager::TEXTAREA, 
                'default' => ''
            ]
        ); 
        $this->add_control(
            'video-bg',
            [
                'label'   => __('Video Bg', 'elementor-hello-world'),
                'type'    => Controls_Manager::MEDIA, 
            ]
        ); 
        $this->add_control(
            'video-url',
            [
                'label'   => __('Video Url', 'elementor-hello-world'),
                'type'    => Controls_Manager::TEXT, 
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
            
            <section class="video-element-two another-page pt-35 pb-45">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 text-center">
                            <div class="element-title">
                                <h2><?php echo esc_html($aSettings['title']); ?></h2>
                                <p><?php echo esc_html($aSettings['sub-title']); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="video-inner-two mb-50">
                                <img src="<?php echo esc_html($aSettings['video-bg']['url']); ?>" alt="">
                                <div class="video-overly-two">
                                    <div class="video-button-two">
                                        <a href="<?php echo esc_html($aSettings['video-url']); ?>" class="mfp-iframe video-play-two"><i class="fa fa-play"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php
    }
}
