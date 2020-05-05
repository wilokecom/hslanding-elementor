<?php

namespace HsLandingElementor\Elements;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

/**
 * Class WilPricingSection
 * @package HsLandingElementor\Elements
 */
class WilPricingSection extends Widget_Base
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
        return 'hslanding-wil-pricing-section';
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
        return __('Wil Pricing Section', 'hslanding-elementor');
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
        $oPricingRepeater = new \Elementor\Repeater();

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
        $oPricingRepeater->add_control(
            'name', [
                'label'       => __('Name', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $oPricingRepeater->add_control(
            'price', [
                'label'       => __('Price', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $oPricingRepeater->add_control(
            'time-limit', [
                'label'       => __('Time-limit', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $oPricingRepeater->add_control(
            'featureds', [
                'label'       => __('Featureds', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::WYSIWYG,
                'label_block' => true,
            ]
        );
    
        $oPricingRepeater->add_control(
            'btn-box', [
                'label'       => __('Btn-box', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $oPricingRepeater->add_control(
            'btn-box-href', [
                'label'       => __('Btn-box Href', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $oPricingRepeater->add_control(
            'col', [
                'label'       => __('Col-Class', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'pricings',
            [
                'label'  => __('Add Pricing', 'plugin-domain'),
                'type'   => \Elementor\Controls_Manager::REPEATER,
                'fields' => $oPricingRepeater->get_controls()
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
            <section class="pricing-section gray-bg4 pt-75 pb-45">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 text-center">
                            <div class="section-title">
                                <h2><?php echo esc_attr($aSettings['title']); ?></h2>
                                <p><?php echo esc_attr($aSettings['sub-title-line1']); ?> <br><?php echo esc_attr($aSettings['sub-title-line2']); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row ">

                        <!-- Pricing Block -->
                        <?php foreach ($aSettings['pricings'] as $aPricings) : ?>
                            <div class="<?php echo esc_attr($aPricings['col']); ?> wow  customFadeInLeft animated" style="visibility: visible; animation-name: customFadeInLeft;">
                                <div class="pricing-block">
                                    <div class="inner-box">
                                        <h5><?php echo esc_attr($aPricings['name']); ?></h5>
                                        <h4 class="price"><?php echo esc_attr($aPricings['price']); ?></h4>
                                        <h5 class="time-limit"><?php echo esc_attr($aPricings['time-limit']); ?></h5>
                                        <ul class="featureds">
                                            <?php echo ($aPricings['featureds']); ?>
                                        </ul>
                                        <div class="btn-box">
                                            <a href="<?php echo esc_attr($aPricings['btn-box-href']); ?>" class="theme-btn"><?php echo esc_attr($aPricings['btn-box']); ?></a>
                                        </div>
                                        <div class="hover"></div>
                                    </div>
                                    
                                </div>
                            </div> 
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        <?php
    }
}
