<?php

namespace HsLandingElementor\Elements;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

/**
 * Class CallToAction
 * @package HsLandingElementor\Elements
 */
class CallTwoActionTwo extends Widget_Base
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
        return 'hslanding-call-to-action-two';
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
        return __('Call To Action 2', 'hslanding-elementor');
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
        $this->start_controls_section(
            'left_section_settings',
            [
                'label' => __('Left settings', 'elementor-hello-world'),
            ]
        );
        
        $this->add_control(
            'title',
            [
                'label'   => __('Title', 'elementor-hello-world'),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Do you have any question about us? Say hello'
            ]
        );
        
        $this->add_control(
            'description',
            [
                'label' => __('Description', 'elementor-hello-world'),
                'type'  => Controls_Manager::TEXTAREA,
            ]
        );
        
        $this->end_controls_section();
        
        $this->start_controls_section(
            'right_section_settings',
            [
                'label' => __('Right settings', 'elementor-hello-world'),
            ]
        );
        
        $this->add_control(
            'button_name',
            [
                'label' => __('Button Name', 'elementor-hello-world'),
                'type'  => Controls_Manager::TEXT,
            ]
        );
        
        $this->add_control(
            'button_link',
            [
                'label' => __('Button Link', 'elementor-hello-world'),
                'type'  => Controls_Manager::TEXT,
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
        <div class="call-to-action-two py-100 mt-75 d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-7">
                        <div class="cta-two-text">
                            <?php if (!empty($aSettings['title'])) : ?>
                                <h1><?php echo esc_html($aSettings['title']); ?></h1>
                            <?php endif; ?>
                            <?php if (!empty($aSettings['description'])) : ?>
                                <p class="wil-call-to-action-desc">
                                    <?php echo esc_html($aSettings['description']); ?>
                                </p>
                            <?php endif; ?>
                            <?php if (!empty($aSettings['button_link'])) : ?>
                                <a class="btn-bg4" target="_blank" rel="noopener noreferrer"
                                   href="<?php echo esc_url($aSettings['button_link']); ?>">
                                   <?php echo esc_html($aSettings['button_name']); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
        <?php
    }
}
