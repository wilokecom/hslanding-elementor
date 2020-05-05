<?php

namespace HsLandingElementor\Elements;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Repeater;

/**
 * Class Service
 * @package HsLandingElementor\Elements
 */
class Service extends Widget_Base
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
        return 'hslanding-service';
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
        return __('Service', 'hslanding-elementor');
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
            'service_settings',
            [
                'label' => __('Service Settings', 'hslanding-elementor'),
            ]
        );

        $this->add_control(
            'style',
            [
                'label'   => __('Style', 'hslanding-elementor'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'service-style-one' => 'Style 1',
                    'service-style-two' => 'Style 2'
                ],
                'default' => 'service-style-one'
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => __('Title', 'hslanding-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'condition' => [
                    'style' => ['service-style-two']
                ]
            ]
        );
        $this->add_control(
            'description',
            [
                'label' => __('Description', 'hslanding-elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'condition' => [
                    'style' => ['service-style-two']
                ]
            ]
        );

        $oRepeater = new Repeater();
        $oRepeater->add_control(
            'title',
            [
                'label' => __('Title', 'hslanding-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $oRepeater->add_control(
            'url',
            [
                'label' => __('Link', 'hslanding-elementor'),
                'type' => \Elementor\Controls_Manager::URL,
                'label_block' => true,
            ]
        );
        $oRepeater->add_control(
            'description',
            [
                'label' => __('Description', 'hslanding-elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );

        $oRepeater->add_control(
            'icon',
            [
                'label' => __('Icon', 'hslanding-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $oRepeater->add_control(
            'class',
            [
                'label' => __('Class', 'hslanding-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'services',
            [
                'label'  => __('Services', 'hslanding-elementor'),
                'type'   => \Elementor\Controls_Manager::REPEATER,
                'fields' => $oRepeater->get_controls()
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
        $aServices = $aSettings['services'];
        foreach ($aServices as $aService) {
            if ($aSettings['style'] == 'service-style-one') {
                ?>
                <div class="<?php echo esc_attr('single-service service-style-one text-center wow animated customFadeInUp '.$aService['class'])?>">
                    <div class="service-icon zero">
                        <i class="<?php echo esc_attr($aService['icon']); ?>"></i>
                    </div>
                    <div class="service-content">
                        <h5><a href="<?php echo esc_url($aService['url']['url']); ?>"><?php echo esc_html(
                                    $aService['title']
                                );
                                ?></a></h5>
                        <p><?php echo esc_html($aService['description']); ?></p>
                    </div>
                </div>
            <?php } else { ?>
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="section-title">
                            <h2><?php echo esc_html($aSettings['title']); ?></h2>
                            <p><?php echo esc_html($aSettings['description']); ?></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="<?php echo esc_attr('single-service service-style-two wow animated customFadeInUp '.$aService['class']);
                        ?>">
                            <div class="service-content">
                                <h5><a href="<?php echo esc_attr($aService['url']['url']); ?>"><?php echo esc_html(
                                            $aService['title']
                                        );
                                        ?></a></h5>
                                <p><?php echo esc_html($aService['description']); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
    }
}
