<?php

namespace HsLandingElementor\Elements;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

/**
 * Class CallToAction
 * @package HsLandingElementor\Elements
 */
class TestimonialTwo extends Widget_Base
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
        return 'hslanding-testimonial-two';
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
        return __('Testimonial 2', 'hslanding-elementor');
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
        $oCustomerRepeater = new \Elementor\Repeater();
        
        $this->start_controls_section(
            'customer_section_settings',
            [
                'label' => __('Customers', 'elementor-hello-world'),
            ]
        );
        
        $oCustomerRepeater->add_control(
            'avatar', [
                'label'       => __('Avatar', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        
        $oCustomerRepeater->add_control(
            'name', [
                'label'       => __('Name', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        
        $oCustomerRepeater->add_control(
            'position', [
                'label'       => __('Position', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        
        $this->add_control(
            'customers',
            [
                'label'  => __('Customers', 'plugin-domain'),
                'type'   => \Elementor\Controls_Manager::REPEATER,
                'fields' => $oCustomerRepeater->get_controls()
            ]
        );
        
        $this->end_controls_section();
        
        $this->start_controls_section(
            'review_section_settings',
            [
                'label' => __('Review Settings', 'elementor-hello-world'),
            ]
        );
        
        $this->add_control(
            'review_heading', [
                'label'       => __('Heading', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        
        $this->add_control(
            'review_description', [
                'label'       => __('Description', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
        
        $oReviewRepeater = new \Elementor\Repeater();
        $oReviewRepeater->add_control(
            'review', [
                'label'       => __('Review', 'hslanding-elementor'),
                'type'        => \Elementor\Controls_Manager::WYSIWYG,
                'label_block' => true,
            ]
        );
        
        $this->add_control(
            'reviews',
            [
                'label'  => __('Customer Reviews', 'plugin-domain'),
                'type'   => \Elementor\Controls_Manager::REPEATER,
                'fields' => $oReviewRepeater->get_controls()
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
        <div class="testimonial-area-two">
            <div class="container">
                <div class="row customize">
                    <div class="col-lg-6 order-lg-2">
                        <div class="testi-content-wrap-two rpb-85">
                            <div class="testi-title-two">
                                <?php if (!empty($aSettings['review_heading'])) : ?>
                                    <h3><?php echo esc_html($aSettings['review_heading']); ?></h3>
                                <?php endif; ?>
                                
                                <?php if (!empty($aSettings['review_description'])) : ?>
                                    <h2><?php echo esc_html($aSettings['review_description']); ?></h2>
                                <?php endif; ?>
                            </div>
                            <div class="testi-content-wrap" id="testimonial-active">
                                
                                <!-- single-testi-content -->
                                <?php foreach ($aSettings['reviews'] as $aReview) : ?>
                                    <div class="single-testi-content">
                                        <?php echo $aReview['review']; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            
                            <!-- testimonial controls array -->
                            <div class="testi-controls-two">
                                <ul class="testi-controls-two" id="testi-controls-two">
                                    <li class="prev flaticon-back"></li>
                                    <li class="next flaticon-right"></li>
                                    <!-- play btn hide kora css a -->
                                </ul>
                            </div>
                        
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="testi-tools">
                            <div class="thumbnails" id="testi-thumbnails-two">
                                <!-- single-testi-thumb -->
                                <?php foreach ($aSettings['customers'] as $aCustomer) : ?>
                                    <div class="single-testi-thumb">
                                        <div class="testi-img">
                                            <img src="<?php echo esc_url($aCustomer['avatar']['url']); ?>"
                                                 alt="<?php echo esc_attr($aCustomer['name']); ?>">
                                        </div>
                                        <div class="testi-content">
                                            <h4><?php echo esc_html($aCustomer['name']); ?></h4>
                                            <span><i class="fa fa-star"></i> 
                                                <?php echo esc_html($aCustomer['position']); ?></span>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        
        </div>
        <?php
    }
}
