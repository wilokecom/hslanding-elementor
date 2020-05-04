<?php

namespace HsLandingElementor\Elements;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

/**
 * Class CallToAction
 * @package HsLandingElementor\Elements
 */
class TestimonialOne extends Widget_Base
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
        return 'hslanding-testimonial-one';
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
        return __('Testimonial 1', 'hslanding-elementor');
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
        $repeater = new \Elementor\Repeater();
        
        $this->start_controls_section(
            'general_settings',
            [
                'label' => __('General Settings', 'elementor-hello-world'),
            ]
        );
        
        $this->add_control(
            'first_customer',
            [
                'label' => __('First Customer Avatar', 'elementor-hello-world'),
                'type'  => Controls_Manager::MEDIA
            ]
        );
        
        $this->end_controls_section();
        
        $this->start_controls_section(
            'testimonials_setting',
            [
                'label' => __('Testimonial Settings', 'elementor-hello-world'),
            ]
        );
        
        $repeater->add_control(
            'avatar', [
                'label'       => __('Avatar', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        
        $repeater->add_control(
            'review', [
                'label'       => __('Customer Review', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::WYSIWYG,
                'label_block' => true,
            ]
        );
        
        $repeater->add_control(
            'name', [
                'label'       => __('Customer Name', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        
        $repeater->add_control(
            'position', [
                'label'       => __('Customer Position', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        
        $this->add_control(
            'testimonials',
            [
                'label'  => __('Repeater Testimonial', 'plugin-domain'),
                'type'   => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls()
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
        if (empty($aSettings['testimonials'])) {
            return '';
        }
        
        ?>
        <div class="testimonial-column">
            <div class="testi-round">
                <img src="<?php echo esc_url(HSLANDING_ELEMENTOR_ELEMENTS_IMG_URL.'testimonial/testi-round.png'); ?>"
                     alt="Testimonial">
            </div>
            <?php if (!empty($aSettings['first_customer']['url'])) : ?>
                <div class="testi-small-img">
                    <img src="<?php echo esc_url($aSettings['first_customer']['url']); ?>" alt="Testimonial">
                </div>
            <?php endif; ?>
            <div class="testimonial-carousel owl-carousel">
                <?php foreach ($aSettings['testimonials'] as $aTestimonial) : ?>
                    <div class="testimonial-block">
                        <div class="testi-author">
                            <img src="<?php echo esc_url($aTestimonial['avatar']['url']) ?>" alt="<?php echo esc_attr
                            ($aTestimonial['name']); ?>">
                        </div>
                        <div class="testi-content-wrap">
                            <div class="testi-content">
                                <?php echo $aTestimonial['review']; ?>
                            </div>
                            <div class="testi-author-info">
                                <h5 class="name"><?php echo esc_html($aTestimonial['name']); ?></h5>
                                <?php if (!empty($aTestimonial['position'])) : ?>
                                    <span class="designation"><?php echo esc_html($aTestimonial['position']); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="d-none d-xl-block testi-small-shape">
                <img src="<?php echo esc_url(HSLANDING_ELEMENTOR_ELEMENTS_IMG_URL.'testimonial/testi-small-round.png'); ?>" 
                     alt="Highspeed blog" />
            </div>
        </div>
        <?php
    }
}
