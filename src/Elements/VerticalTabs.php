<?php

namespace HsLandingElementor\Elements;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

/**
 * Class WilHeroSection
 * @package HsLandingElementor\Elements
 */
class VerticalTabs extends Widget_Base
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
        return 'hslanding-vertical-tabs';
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
        return __('Vertical Tabs', 'hslanding-elementor');
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
            'description',
            [
                'label'   => 'Description',
                'type'    => Controls_Manager::WYSIWYG,
                'default' => ''
            ]
        );
        
        $this->add_control(
            'extra_classes',
            [
                'label'   => __('Extra Classes', 'elementor-hello-world'),
                'type'    => Controls_Manager::TEXT,
                'default' => ''
            ]
        );
        $this->end_controls_section();
        
        $oRepeater = new \Elementor\Repeater();
        $this->start_controls_section(
            'tab_name',
            [
                'label' => __('Tab Name', 'elementor-hello-world'),
            ]
        );
        $oRepeater->add_control(
            'tab_name',
            [
                'label'       => __('Tab Name', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        
        $oRepeater->add_control(
            'tab_description',
            [
                'label'       => __('Tab Description', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::WYSIWYG,
                'label_block' => true,
            ]
        );
        
        $oRepeater->add_control(
            'right_image',
            [
                'label'       => __('Right Image', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $oRepeater->add_control(
            'right_content',
            [
                'label'       => __('Right Content', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::WYSIWYG,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'tabs',
            [
                'label'  => __('Tab Settings', 'plugin-domain'),
                'type'   => \Elementor\Controls_Manager::REPEATER,
                'fields' => $oRepeater->get_controls()
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
        
        $aTabIDs = [];
        ?>
        <!--==================================================================== 
                    Start hero section
        =====================================================================-->
        <section class="<?php echo esc_attr($aSettings['extra_classes']).' developer-design mb-200 rmb-100'; ?>">
            <div class="container">
                <?php if (!empty($aSettings['title']) || !empty($aSettings['description'])) : ?>
                    <div class="cloud-section-title mb-75 text-center">
                        <?php if (!empty($aSettings['title'])) : ?>
                            <h2><?php echo esc_html($aSettings['title']); ?></h2>
                        <?php endif; ?>
                        <?php if (!empty($aSettings['description'])) : ?>
                            <p><?php echo esc_html($aSettings['description']); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                
                <div class="developer-design-tab">
                    <div class="nav nav-pills" role="tablist" aria-orientation="vertical">
                        <?php
                        foreach ($aSettings['tabs'] as $aTab) :
                            $tabID = uniqid('dd-pills-');
                            $aTabIDs[] = $tabID;
                            ?>
                            <a class="nav-link"
                               id="<?php echo $tabID.'-tab'; ?>"
                               data-toggle="pill" href="#<?php echo $tabID; ?>"
                               role="tab"
                               aria-controls="<?php echo $tabID; ?>" aria-selected="false">
                                <?php if (!empty($aTab['tab_name'])) : ?>
                                    <h5><?php echo esc_html($aTab['tab_name']); ?></h5>
                                <?php endif; ?>
                                <?php if (!empty($aTab['tab_description'])) : ?>
                                    <p><?php echo esc_html($aTab['tab_description']); ?></p>
                                <?php endif; ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                    <div class="tab-content">
                        <?php
                        foreach ($aSettings['tabs'] as $order => $aTab) :
                            ?>
                            <div class="tab-pane fade" id="<?php echo $aTabIDs[$order]; ?>" role="tabpanel"
                                 aria-labelledby="dd-pills-one-tab">
                                <?php if (!empty($aTab['right_image']['url'])) : ?>
                                    <img src="<?php echo esc_url($aTab['right_image']['url']); ?>" alt="<?php echo
                                    esc_attr($aTab['tab_name']); ?>">
                                <?php endif; ?>
                                <?php if (!empty($aTab['right_content'])) : ?>
                                    <div class="tab-right-content"><?php echo $aTab['right_content']; ?></div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            
            </div>
        </section>
        
        <?php
    }
}
