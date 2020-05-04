<?php

namespace HsLandingElementor\Elements;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

/**
 * Class CallToAction
 * @package HsLandingElementor\Elements
 */
class CounterOne extends Widget_Base
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
        return 'hslanding-counter-one';
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
        return __('Counter 2', 'hslanding-elementor');
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
            'header_section_settings',
            [
                'label' => __('Header Settings', 'elementor-hello-world'),
            ]
        );
        
        $this->add_control(
            'heading', [
                'label'       => __('Heading', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        
        $this->add_control(
            'description', [
                'label'       => __('Description', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
        
        $this->end_controls_section();
        
        $this->start_controls_section(
            'count_section_settings',
            [
                'label' => __('Counter Settings', 'elementor-hello-world'),
            ]
        );
        
        $this->add_control(
            'speed', [
                'label'       => __('Speed (Mini Seconds)', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => 3000
            ]
        );
        
        $oRepeater = new \Elementor\Repeater();
        $oRepeater->add_control(
            'from', [
                'label'       => __('From', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        
        $oRepeater->add_control(
            'to', [
                'label'       => __('To', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        
        $oRepeater->add_control(
            'content', [
                'label'       => __('Content', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        
        $this->add_control(
            'counters',
            [
                'label'  => __('Counters', 'plugin-domain'),
                'type'   => \Elementor\Controls_Manager::REPEATER,
                'fields' => $oRepeater->get_controls()
            ]
        );
        
        $this->end_controls_section();
        
        $this->start_controls_section(
            'cta_section_settings',
            [
                'label' => __('Call To Action Settings', 'elementor-hello-world'),
            ]
        );
        
        $this->add_control(
            'ca_heading',
            [
                'label'   => __('Title', 'elementor-hello-world'),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Do you have any question about us? Say hello'
            ]
        );
        
        $this->add_control(
            'ca_description',
            [
                'label' => __('Description', 'elementor-hello-world'),
                'type'  => Controls_Manager::TEXTAREA,
            ]
        );
        
        $this->add_control(
            'ca_button_name',
            [
                'label' => __('Button Name', 'elementor-hello-world'),
                'type'  => Controls_Manager::TEXT,
            ]
        );
        
        $this->add_control(
            'ca_button_link',
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
        <div class="funfact bg-gray pb-130 py-130">
            <div class="container">
                <?php if (!empty($aSettings['heading']) || !empty($aSettings['description'])) : ?>
                    <div class="row justify-content-center">
                        <div class="col-12 text-center">
                            <div class="section-title">
                                <?php if (!empty($aSettings['heading'])) : ?>
                                    <h2><?php echo esc_html($aSettings['heading']); ?></h2>
                                <?php endif; ?>
                                
                                <?php if (!empty($aSettings['description'])) : ?>
                                    <p><?php echo $aSettings['description']; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                
                <?php if (!empty($aSettings['counters'])) : ?>
                    <div class="row">
                        <!-- single-item -->
                        <?php foreach ($aSettings['counters'] as $aCounter) : ?>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="stat-item mb-50 text-center wow animated customFadeInUp fast">
                                    <div class="count" data-from="<?php echo abs($aCounter['from']); ?>"
                                         data-to="<?php echo abs($aCounter['to']); ?>"
                                         data-speed="<?php echo abs($aSettings['speed']); ?>"></div>
                                    <p class="text"><?php echo esc_attr($aCounter['content']); ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                
                <!-- First CTA Section -->
                <?php if (!empty($aSettings['ca_heading']) || !empty($aSettings['ca_btn_link']) ||
                          !empty($aSettings['ca_description'])) : ?>
                    <div class="cta-action-style-one">
                        <div class="row align-items-center">
                            <div class="col-lg-8 text-lg-left text-center">
                                <?php if (!empty($aSettings['ca_heading'])) : ?>
                                    <h4 class="cta-title"><?php echo esc_html($aSettings['ca_heading']); ?></h4>
                                <?php endif; ?>
                                
                                <?php if (!empty($aSettings['ca_description'])) : ?>
                                    <p class="cta-text"><?php echo esc_html($aSettings['ca_description']); ?>></p>
                                <?php endif; ?>
                            </div>
                            
                            <?php if (!empty($aSettings['ca_btn_link'])) : ?>
                                <div class="col-lg-4 d-flex justify-content-lg-end justify-content-center py-20">
                                    <a class="btn-bg"
                                       href="<?php esc_url($aSettings['ca_btn_link']); ?>"><?php echo esc_html
                                        ($aSettings['ca_btn_name']);
                                        ?></a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            
            </div>
        </div>
        <?php
    }
}
