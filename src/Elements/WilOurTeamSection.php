<?php

namespace HsLandingElementor\Elements;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

/**
 * Class WilOurTeamSection
 * @package HsLandingElementor\Elements
 */
class WilOurTeamSection extends Widget_Base
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
        return 'hslanding-wil-out-team-section';
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
        return __('Wil Our Team Section', 'hslanding-elementor');
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
        $oTeamRepeater = new \Elementor\Repeater();

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
        $oTeamRepeater->add_control(
            'name', [
                'label'       => __('Name', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        ); 
        $oTeamRepeater->add_control(
            'avatar', [
                'label'       => __('Avatar', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        ); 
        $oTeamRepeater->add_control(
            'position', [
                'label'       => __('Position', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        ); 
        $oTeamRepeater->add_control(
            'description', [
                'label'       => __('Description', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        ); 
        $oTeamRepeater->add_control(
            'facebook', [
                'label'       => __('facebook', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        ); 
        $oTeamRepeater->add_control(
            'twitter', [
                'label'       => __('twitter', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        ); 
        $oTeamRepeater->add_control(
            'linkedin', [
                'label'       => __('linkedin', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        ); 
        $this->add_control(
            'teams',
            [
                'label'  => __('Teams', 'plugin-domain'),
                'type'   => \Elementor\Controls_Manager::REPEATER,
                'fields' => $oTeamRepeater->get_controls()
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
                                    Start Our Team section
            =====================================================================-->

            <section class="our-team-section py-75">
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
                            <div class="col-lg-12 team-slider owl-carousel">
                                <?php foreach ($aSettings['teams'] as $aTeams) : ?>
                                    <!-- single-team member -->
                                    <div class="single-team-member wow animated customFadeInUp delay-0-1s">
                                        <div class="team-thumb thumb-bg-1" style="background-image: url(<?php echo esc_html($aTeams['avatar']['url']); ?>)" ></div>
                                        <div class="team-info">
                                            <h5><?php echo esc_html($aTeams['name']); ?></h5>
                                            <h6><?php echo esc_html($aTeams['position']); ?></h6>
                                            <p><?php echo esc_html($aTeams['description']); ?></p>
                                            <div class="team-social-link">
                                                <a href="<?php echo esc_html($aTeams['facebook']); ?>"><i class="fa fa-facebook"></i></a>
                                                <a href="<?php echo esc_html($aTeams['twitter']); ?>"><i class="fa fa-twitter"></i></a>
                                                <a href="<?php echo esc_html($aTeams['linkedin']); ?>"><i class="fa fa-linkedin"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                        </div>
                    </div>
                </section>
        <?php
    }
}
