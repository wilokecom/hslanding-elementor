<?php

namespace HsLandingElementor\Elements;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

/**
 * Class WilMainHeader
 * @package HsLandingElementor\Elements
 */
class WilMainHeader extends Widget_Base
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
        return 'hslanding-wil-main-header';
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
        return __('Wil Main Header', 'hslanding-elementor');
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

        $oMainNavRepeater = new \Elementor\Repeater();
        // start_controls_section -----
        $this->start_controls_section(
            'general_settings_section',
            [
                'label' => __('General Settings', 'elementor-hello-world'),
            ]
        );
        
        $this->add_control(
            'logo-img',
            [
                'label'   => __('Logo', 'elementor-hello-world'),
                'type'    => Controls_Manager::MEDIA, 
            ]
        );   
        $this->add_control(
            'logo-fixed-img',
            [
                'label'   => __('Logo Fixed', 'elementor-hello-world'),
                'type'    => Controls_Manager::MEDIA, 
            ]
        );   
        $this->add_control(
            'logo-href',
            [
                'label'   => __('Logo Href', 'elementor-hello-world'),
                'type'    => Controls_Manager::TEXT, 
                'default' => ''
            ]
        );   
        $this->add_control(
            'btn1-text',
            [
                'label'   => __('Btn1 Text', 'elementor-hello-world'),
                'type'    => Controls_Manager::TEXT, 
                'default' => ''
            ]
        );   
        $this->add_control(
            'btn1-href',
            [
                'label'   => __('Btn1 Href', 'elementor-hello-world'),
                'type'    => Controls_Manager::TEXT, 
                'default' => ''
            ]
        );   
        $this->add_control(
            'btn2-text',
            [
                'label'   => __('Btn2 Text', 'elementor-hello-world'),
                'type'    => Controls_Manager::TEXT, 
                'default' => ''
            ]
        );   
        $this->add_control(
            'btn2-href',
            [
                'label'   => __('Btn2 Href', 'elementor-hello-world'),
                'type'    => Controls_Manager::TEXT, 
                'default' => ''
            ]
        );   
      
        // end_controls_section -----
        $this->end_controls_section();

        // start_controls_section -----
        $this->start_controls_section(
            'nav_settings',
            [
                'label' => __('Nav Settings', 'elementor-hello-world'),
            ]
        );
        $oMainNavRepeater->add_control(
            'name', [
                'label'       => __('Name', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        ); 
        $oMainNavRepeater->add_control(
            'href', [
                'label'       => __('Href', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        ); 
        $oMainNavRepeater->add_control(
            'dropdown', [
                'label'       => __('Dropdown', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::WYSIWYG,
                'label_block' => true,
            ]
        ); 
         
        $this->add_control(
            'navigations',
            [
                'label'  => __('Navigations', 'plugin-domain'),
                'type'   => \Elementor\Controls_Manager::REPEATER,
                'fields' => $oMainNavRepeater->get_controls()
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
            <header class="main-header">

                <!--Header-Upper-->
                <div class="header-upper">
                    <div class="container clearfix">

                        <div class="header-inner clearfix d-lg-flex">
                            <div class="logo-outer">
                                <div class="logo"><a href="<?php echo esc_html($aSettings['logo-href']); ?>"><img src="<?php echo esc_html($aSettings['logo-img']['url']); ?>" alt="highspeedblog" title="highspeedblog"></a></div>
                                <div class="fixed-logo"><a href="<?php echo esc_html($aSettings['logo-href']); ?>"><img src="<?php echo esc_html($aSettings['logo-fixed-img']['url']); ?>" alt="highspeedblog" title="highspeedblog"></a></div>
                            </div>

                            <!-- Main Menu -->
                            <nav class="main-menu navbar-expand-md ml-md-auto">
                                <div class="navbar-header clearfix">
                                <div class="logo"><a href="<?php echo esc_html($aSettings['logo-href']); ?>"><img src="<?php echo esc_html($aSettings['logo-img']['url']); ?>" alt="highspeedblog" title="highspeedblog"></a></div>
                                <div class="fixed-logo"><a href="<?php echo esc_html($aSettings['logo-href']); ?>"><img src="<?php echo esc_html($aSettings['logo-fixed-img']['url']); ?>" alt="highspeedblog" title="highspeedblog"></a></div>
                                    <!-- Toggle Button -->
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse-one">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>

                                <div class="navbar-collapse navbar-collapse-one collapse clearfix">
                                    <ul class="navigation clearfix">
                                        <?php foreach ($aSettings['navigations'] as $aNavigations) : ?>
                                            <li class="dropdown"><a href="<?php echo esc_html($aNavigations['href']); ?>"><?php echo esc_html($aNavigations['name']); ?></a>
                                                <?php echo ($aNavigations['dropdown']); ?>
                                            </li>  
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </nav>
                            <!-- Main Menu End-->

                            <!-- Menu buttons-->
                            <div class="sup-log">
                                <a target="_blank" rel="noopener noreferrer" class="support" href="<?php echo esc_html($aSettings['btn1-href']); ?>"><?php echo esc_html($aSettings['btn1-text']); ?></a>
                                <a target="_blank" rel="noopener noreferrer" class="login" href="<?php echo esc_html($aSettings['btn2-href']); ?>"><?php echo esc_html($aSettings['btn2-text']); ?></a>
                            </div>
                        </div>

                    </div>
                </div>
                <!--End Header Upper-->

                </header>

        <?php
    }
}
