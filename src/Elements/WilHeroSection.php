<?php

namespace HsLandingElementor\Elements;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

/**
 * Class WilHeroSection
 * @package HsLandingElementor\Elements
 */
class WilHeroSection extends Widget_Base
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
        return 'hslanding-wil-hero-section';
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
        return __('Wil Hero Section', 'hslanding-elementor');
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
            'description',
            [
                'label'   => 'Description',
                'type'    => Controls_Manager::WYSIWYG,
                'default' => ''
            ]
        );
//        $this->add_control(
//            'sub-title-line1',
//            [
//                'label'   => __('Sub Title Line1', 'elementor-hello-world'),
//                'type'    => Controls_Manager::TEXTAREA,
//                'default' => ''
//            ]
//        );
//        $this->add_control(
//            'sub-title-line2',
//            [
//                'label'   => __('Sub Title Line2', 'elementor-hello-world'),
//                'type'    => Controls_Manager::TEXTAREA,
//                'default' => ''
//            ]
//        );
        $this->add_control(
            'btn',
            [
                'label'   => __('Button', 'elementor-hello-world'),
                'type'    => Controls_Manager::TEXTAREA,
                'default' => ''
            ]
        );
        $this->add_control(
            'btn-href',
            [
                'label'   => __('Button Href', 'elementor-hello-world'),
                'type'    => Controls_Manager::TEXTAREA,
                'default' => ''
            ]
        );
        $this->add_control(
            'bg-img',
            [
                'label' => __('Bg Image', 'elementor-hello-world'),
                'type'  => Controls_Manager::MEDIA,
            ]
        );
        $this->add_control(
            'right-img',
            [
                'label' => __('Right Image', 'elementor-hello-world'),
                'type'  => Controls_Manager::MEDIA,
            ]
        );
        $this->add_control(
            'tob-img',
            [
                'label' => __('Tob Image', 'elementor-hello-world'),
                'type'  => Controls_Manager::MEDIA,
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
                    Start hero section
        =====================================================================-->
        <section class="hero-section wil-hero-section py-100 bg-img d-flex align-items-center"
                 style="background-image:url(<?php echo esc_html($aSettings['bg-img']['url']); ?>);">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="hero-text">
                            <h1><?php echo esc_html($aSettings['title']); ?></h1>
                            <div class="hero-section--desc"><?php echo $aSettings['description']; ?></div>
                            <a target="_blank" rel="noopener noreferrer" href="<?php echo esc_html($aSettings['btn-href']); ?>"
                               class="color-btn color-btn11"><?php echo esc_html($aSettings['btn']); ?></a>
                        </div>
                    </div>
                    
                    <div class="d-none d-md-block wow animated customFadeInRight hero-animation-image">
                        <img src="<?php echo esc_html($aSettings['right-img']['url']); ?>" alt="">
                    </div>
                    <div class="d-none d-md-block wow animated customFadeInLeft tob-animation-image">
                        <img src="<?php echo esc_html($aSettings['tob-img']['url']); ?>" alt="">
                    </div>
                
                </div>
            </div>
        </section>
        <!--==================================================================== 
                                End hero section
        =====================================================================-->
        
        <?php
    }
}
