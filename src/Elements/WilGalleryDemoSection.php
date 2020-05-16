<?php

namespace HsLandingElementor\Elements;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

/**
 * Class WilGalleryDemoSection
 * @package HsLandingElementor\Elements
 */
class WilGalleryDemoSection extends Widget_Base
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
        return 'hslanding-wil-gallery-demo-section';
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
        return __('Wil Gallery Demo Section', 'hslanding-elementor');
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
        $oPortfolioMenuRepeater = new \Elementor\Repeater();
        

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
        $oPortfolioMenuRepeater->add_control(
            'menu-name', [
                'label'       => __('Name', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $oPortfolioMenuRepeater->add_control(
            'menu-filter', [
                'label'       => __('Data Filter', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'menus',
            [
                'label'  => __('Portfolios Menu', 'plugin-domain'),
                'type'   => \Elementor\Controls_Manager::REPEATER,
                'fields' => $oPortfolioMenuRepeater->get_controls()
            ]
        );
        // end_controls_section -----
        $this->end_controls_section();
        
        // start_controls_section -----
        $this->start_controls_section(
            'portfolio_settings',
            [
                'label' => __('Portfolio Settings', 'elementor-hello-world'),
            ]
        );
        $oPortfolioRepeater = new \Elementor\Repeater();
        $oPortfolioRepeater->add_control(
            'filter-class', [
                'label'       => __('Filter Class', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        ); 
        $oPortfolioRepeater->add_control(
            'name', [
                'label'       => __('Name', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => 'Demo name',
                'label_block' => true,
            ]
        ); 
        $oPortfolioRepeater->add_control(
            'img-src', [
                'label'       => __('Image Src', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        ); 
        $oPortfolioRepeater->add_control(
            'img-link', [
                'label'       => __('Image link', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        ); 
        $this->add_control(
            'portfolios',
            [
                'label'  => __('Portfolios', 'plugin-domain'),
                'type'   => \Elementor\Controls_Manager::REPEATER,
                'fields' => $oPortfolioRepeater->get_controls()
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
                                    Start portfolio section
            =====================================================================-->
            <section class="portfolio-area pt-240 pb-75 rpt-195">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="portfolio-wrapper">

                            <div class="row justify-content-center">
                                <div class="col-lg-8 text-center pt-75">
                                    <div class="section-title">
                                        <h2><?php echo esc_html($aSettings['title']); ?></h2>
                                        <p><?php echo esc_html($aSettings['sub-title-line1']); ?> <br><?php echo esc_html($aSettings['sub-title-line2']); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <div class="portfolio-menu third-portfolio-menu mb-55">
                                        <?php foreach ($aSettings['menus'] as $index => $menus) : ?>
                                            <button class="<?php echo $index === 0 ? 'active' : '' ?>" data-filter=".<?php echo esc_html($menus['menu-filter']); ?>"><?php echo esc_html($menus['menu-name']); ?></button> 
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row portfolio-active">
                                <?php foreach ($aSettings['portfolios'] as $aPortfolios) : ?>
                                    <!-- single-portfolio item-->
                                    <div class="col-lg-3 col-md-4 col-sm-6 grid-item  <?php echo esc_html($aPortfolios['filter-class']); ?>" style="text-align: center">
                                        <div class="demo-wrap mb-30 wow customFadeInUp delay-0-3s animated">
                                            <a href="<?php echo esc_html($aPortfolios['img-link']); ?>" target="_blank" rel="noopener noreferrer" style="display: block; padding: 15px">
                                                <h2 class="demo-name">
                                                    <?php echo esc_html($aPortfolios['name']); ?>
                                                </h2>
                                                <div class="demo-img aspect-ratio--9x16 cover bg-center" style="background-image: url(<?php echo esc_html($aPortfolios['img-src']['url']); ?>)"></div>
                                            </a>
                                        </div>
                                        
                                    </div>
                                <?php endforeach; ?>
                            </div>

                        </div>
                    </div>
                </div>

            </section>


        <?php
    }
}
