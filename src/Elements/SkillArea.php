<?php

namespace HsLandingElementor\Elements;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Repeater;

/**
 * Class Service
 * @package HsLandingElementor\Elements
 */
class SkillArea extends Widget_Base
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
        return 'hslanding-skill-area';
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
        return __('Skill Area', 'hslanding-elementor');
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
            'title',
            [
                'label' => __('Title', 'hslanding-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'description',
            [
                'label' => __('Description', 'hslanding-elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'left_settings',
            [
                'label' => __('Left Settings', 'hslanding-elementor'),
            ]
        );
        $oRepeater = new Repeater();
        $oRepeater->add_control(
            'image',
            [
                'label' => __('Image', 'hslanding-elementor'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $oRepeater->add_control(
            'image-class',
            [
                'label' => __('Class', 'hslanding-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'images',
            [
                'label'  => __('Images', 'hslanding-elementor'),
                'type'   => \Elementor\Controls_Manager::REPEATER,
                'fields' => $oRepeater->get_controls()
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'right_settings',
            [
                'label' => __('Right Settings', 'hslanding-elementor'),
            ]
        );
        $oRepeater = new Repeater();
        $oRepeater->add_control(
            'list-title',
            [
                'label' => __('List Title', 'hslanding-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $oRepeater->add_control(
            'list-class',
            [
                'label' => __('Class', 'hslanding-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'lists',
            [
                'label'  => __('Lists', 'hslanding-elementor'),
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
        $aImages =$aSettings['images'];
        $aLists =$aSettings['lists'];?>
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="section-title">
                    <h2><?php echo esc_html($aSettings['title']);?></h2>
                    <p><?php echo esc_html($aSettings['description']);?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <div class="skill-note-img rmb-50">
                    <?php foreach ($aImages as $aImage) { ?>
                        <img class="<?php echo esc_attr($aImage['image-class']); ?>" src="<?php
                        echo esc_url($aImage['image']['url']);
                        ?>" alt=""/>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-5 mt-27">
                <div class="row">
                    <?php foreach ($aLists as $aList) { ?>
                        <div class="col-lg-10 col-md-12">
                            <div class="<?php echo esc_attr(
                                'skill-item wow animated customFadeInUp '
                                . $aList['list-class']
                            ); ?>">
                                <i class="flaticon-checked"></i><h5><?php echo esc_html($aList['list-title']);
                                    ?></h5>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
    }
}

