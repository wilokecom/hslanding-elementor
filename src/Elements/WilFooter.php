<?php

namespace HsLandingElementor\Elements;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

/**
 * Class WilFooter
 * @package HsLandingElementor\Elements
 */
class WilFooter extends Widget_Base
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
        return 'hslanding-wil-footer';
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
        return __('Wil Footer', 'hslanding-elementor');
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
            'column-1-settings',
            [
                'label' => __('Column-1 Settings', 'elementor-hello-world'),
            ]
        );
        
        $this->add_control(
            'logo',
            [
                'label'   => __('Logo', 'elementor-hello-world'),
                'type'    => Controls_Manager::MEDIA, 
            ]
        );  
        $this->add_control(
            'logo-link',
            [
                'label'   => __('Logo Link', 'elementor-hello-world'),
                'type'    => Controls_Manager::TEXT, 
            ]
        );  
        $this->add_control(
            'descriptions',
            [
                'label'   => __('Descriptions', 'elementor-hello-world'),
                'type'    => Controls_Manager::TEXTAREA, 
            ]
        );
        $this->add_control(
            'socials',
            [
                'label'   => __('Socials', 'elementor-hello-world'),
                'type'    => Controls_Manager::WYSIWYG, 
            ]
        );
        // end_controls_section -----
        $this->end_controls_section();
        
        // start_controls_section -----
        $this->start_controls_section(
            'column-2-settings',
            [
                'label' => __('Column-2 Settings', 'elementor-hello-world'),
            ]
        ); 
        $this->add_control(
            'col2-label',
            [
                'label'   => __('Label', 'elementor-hello-world'),
                'type'    => Controls_Manager::TEXT, 
            ]
        );
        $this->add_control(
            'col2-items',
            [
                'label'   => __('Col2-items', 'elementor-hello-world'),
                'type'    => Controls_Manager::WYSIWYG, 
            ]
        );
         // end_controls_section -----
         $this->end_controls_section();

        // start_controls_section -----
        $this->start_controls_section(
            'column-3-settings',
            [
                'label' => __('Column-3 Settings', 'elementor-hello-world'),
            ]
        ); 
        $this->add_control(
            'col3-label',
            [
                'label'   => __('Label', 'elementor-hello-world'),
                'type'    => Controls_Manager::TEXT, 
            ]
        );
        $this->add_control(
            'col3-items',
            [
                'label'   => __('Col3-items', 'elementor-hello-world'),
                'type'    => Controls_Manager::WYSIWYG, 
            ]
        );
         // end_controls_section -----
         $this->end_controls_section();
        
        // start_controls_section -----
        $this->start_controls_section(
            'column-4-settings',
            [
                'label' => __('Column-4 Settings', 'elementor-hello-world'),
            ]
        ); 
        $this->add_control(
            'col4-label',
            [
                'label'   => __('Label', 'elementor-hello-world'),
                'type'    => Controls_Manager::TEXT, 
            ]
        );
        $this->add_control(
            'col4-items',
            [
                'label'   => __('Col4-items', 'elementor-hello-world'),
                'type'    => Controls_Manager::WYSIWYG, 
            ]
        );
         // end_controls_section -----
         $this->end_controls_section();
        $this->start_controls_section(
            'copyright-settings',
            [
                'label' => __('Copyright Settings', 'elementor-hello-world'),
            ]
        ); 
        $this->add_control(
            'copyright',
            [
                'label'   => __('Copyright', 'elementor-hello-world'),
                'type'    => Controls_Manager::WYSIWYG, 
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
            <footer class="footer">
                <div class="container">
                    <div class="row">

                        <!--big column-->
                        <div class="col-md-7">
                            <div class="row">

                                <!--Footer Column-->
                                <div class="col-sm-7 mb-30">
                                    <div class="footer-widget logo-widget">
                                        <div class="footer-logo"><a href="<?php echo esc_html($aSettings['logo-link']); ?>"><img src="<?php echo esc_html($aSettings['logo']['url']); ?>" alt="logo"></a></div>
                                        <div class="widget-content">
                                            <div class="text">
                                                <p><?php echo esc_html($aSettings['descriptions']); ?></p>
                                            </div>
                                            <div class="footer-social-icon">
                                                <ul class="social-icon-one">
                                                    <?php echo ($aSettings['socials']); ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Footer Column-->
                                <div class="col-sm-5 mb-30">
                                    <div class="footer-widget links-widget float-lg-right">
                                        <h5 class="footer-title"><?php echo esc_html($aSettings['col2-label']); ?></h5>
                                        <div class="widget-content">
                                            <ul class="list">
                                                <?php echo ($aSettings['col2-items']); ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--big column-->
                        <div class="col-md-5">
                            <div class="row">

                                <!--Footer Column-->
                                <div class="col-sm-6 mb-30">
                                    <div class="footer-widget links-widget float-lg-right">
                                        <h5 class="footer-title"><?php echo esc_html($aSettings['col3-label']); ?></h5>
                                        <div class="widget-content">
                                            <ul class="list">
                                                <?php echo ($aSettings['col3-items']); ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!--Footer Column-->
                                <div class="col-sm-6 mb-30">
                                    <div class="footer-widget links-widget float-lg-right">
                                        <h5 class="footer-title"><?php echo esc_html($aSettings['col4-label']); ?></h5>
                                        <div class="widget-content">
                                            <ul class="list">
                                                <?php echo ($aSettings['col4-items']); ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!--Copyright-->
                <div class="footer-bottom">
                    <div class="copyright">
                        <?php echo ($aSettings['copyright']); ?>
                    </div>
                </div>
            </footer>
        <?php
    }
}
