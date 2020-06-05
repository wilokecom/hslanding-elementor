<?php

namespace HsLandingElementor\Elements;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Repeater;

/**
 * Class WilTextBlock
 * @package HsLandingElementor\Elements
 */
class WilTextBlock extends Widget_Base
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
        return 'hslanding-wil-text-block';
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
        return __('Wil Text Block', 'hslanding-elementor');
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
        return 'fa fa-wordpress';
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
        $this->start_controls_section(
            'general_settings',
            [
                'label' => __('General Settings', 'hslanding-elementor'),
            ]
        );
 
        $this->add_control(
            'style',
            [
                'label' => __('style', 'hslanding-elementor'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'label_block' => true, 
                'options'    => [
                    'row' => 'style 1',
                    'row-reverse' => 'style 2'
                ]
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => __('Title', 'hslanding-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true, 
            ]
        );
        $this->add_control(
            'sub-title',
            [
                'label' => __('Sub Title', 'hslanding-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true, 
            ]
        );
        $this->add_control(
            'content',
            [
                'label' => __('Content', 'hslanding-elementor'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'btn',
            [
                'label' => __('Button', 'hslanding-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'btn-href',
            [
                'label' => __('Button Href', 'hslanding-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'color',
            [
                'label' => __('Color', 'hslanding-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'img',
            [
                'label' => __('Image', 'hslanding-elementor'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
 
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

        <section class="con-cloud-about wil-text-block">
            <div class="row align-items-center" style="flex-direction: <?php echo esc_html($aSettings['style']); ?>">
                <div class="col-lg-6 order-lg-2">
                    <div class="con-cloud-about-content rmb-50">
                        <div class="con-cloud-section-title mb-35">
                            <span class="" style="font-weight: 700; font-size: 14px; color: <?php echo esc_html($aSettings['color']); ?>; display: flex; align-items: center; margin-bottom: 10px;">
                                <?php echo esc_html($aSettings['sub-title']); ?>
                                <span style="margin-left: 10px;width: 50px; border-bottom: 1px solid <?php echo esc_html($aSettings['color']); ?>"></span>
                            </span>
                            <h2><?php echo esc_html($aSettings['title']); ?></h2>
                        </div>

                        <div class="wil-text-block--content"><?php echo ($aSettings['content']); ?></div>
                        <a href="<?php echo esc_html($aSettings['btn-href']); ?>" class="border-btn border-btn6" style="" ><span style="font-weight: 600;"><?php echo esc_html($aSettings['btn']); ?></span></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="con-cloud-about-img rmb-75 mr-60 rmr-0">
                        <img src="<?php echo esc_html($aSettings['img']['url']); ?>" alt="About">
                    </div>
                </div>
            </div>
            
            <div class="shape shape2"><img src="<?php echo esc_url(HSLANDING_ELEMENTOR_ELEMENTS_IMG_URL.'con-cloud/shape-1.png'); ?>" alt="shape"></div>
            <div class="shape shape3"><img src="<?php echo esc_url(HSLANDING_ELEMENTOR_ELEMENTS_IMG_URL.'con-cloud/shape-6.png'); ?>" alt="shape"></div>
        </section>
           
        <?php
    }
}
