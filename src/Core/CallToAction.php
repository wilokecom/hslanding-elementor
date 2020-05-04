<?php

namespace HsLandingElementor\Core;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

class CallToAction extends Widget_Base
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
        return 'hslanding-call-to-action';
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
        return __('Call To Action', 'hslanding-elementor');
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
                'label' => __('Title', 'elementor-hello-world'),
                'type'  => Controls_Manager::TEXT,
            ]
        );
    
        $this->add_control(
            'title',
            [
                'label' => __('Description', 'elementor-hello-world'),
                'type'  => Controls_Manager::TEXT,
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
            'title',
            [
                'label' => __('Button Name', 'elementor-hello-world'),
                'type'  => Controls_Manager::TEXT,
            ]
        );
    
        $this->add_control(
            'title',
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
        $settings = $this->get_settings_for_display();
        
        echo '<div class="title">';
        echo $settings['title'];
        echo '</div>';
    }
}
