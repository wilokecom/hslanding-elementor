<?php

namespace HsLandingElementor\Elements;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Repeater;
use HsLandingElementor\Support\Helper;

/**
 * Class Blog
 * @package HsLandingElementor\Elements
 */
class Blog extends Widget_Base
{
    use Helper;
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
        return 'hslanding-blog';
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
        return __('Blog', 'hslanding-elementor');
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
            'Blog_settings',
            [
                'label' => __('Blog Settings', 'hslanding-elementor'),
            ]
        );
        $oRepeater = new Repeater();
        $oRepeater->add_control(
            "postID",
            array(
                "label" => __("Search & Select", 'hslanding-elementor'),
                "type" => Controls_Manager::SELECT2,
                "options" => $this->getAllPost(),
                "label_block" => true,
                "multiple" => false,
            )
        );
        $oRepeater->add_control(
            'reading-time',
            [
                'label'  => __('Reading Time(min)', 'hslanding-elementor'),
                'type'   => \Elementor\Controls_Manager::NUMBER,
                'label_block' => true,
                'min'=>0
            ]
        );
        $this->add_control(
            'blogs',
            [
                'label'  => __('Seach Blog', 'hslanding-elementor'),
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
        $aBlogs=$aSettings['blogs'];
        ?>
        <section class="blog-section gray-bg pt-75">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <div class="section-title">
                            <h2><?php echo esc_html($aSettings['title']);?></h2>
                            <p><?php echo esc_html($aSettings['description']);?></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                    foreach ($aBlogs as $aBlog) {
                        $iAuthorId = get_post_field( 'post_author', $aBlog['postID']);
                        ?>
                            <div class="col-lg-4 col-sm-6 wow animated customFadeInLeft">
                                <div class="news-block mb-30">
                                    <div class="blog-thumb">
                                        <?php echo get_the_post_thumbnail($aBlog['postID']); ?>
                                    </div>
                                    <div class="news-inner">
                                        <h5><a href="<?php echo get_permalink($aBlog['postID']);?>"><?php echo
                                                get_the_title($aBlog['postID']);?></a></h5>
                                        <div class="news-text">
                                            <p><?php echo get_the_excerpt($aBlog['postID']);?></p>
                                        </div>
                                        <div class="admin-by">
                                            <a href="<?php echo get_author_posts_url($iAuthorId);?>"><?php echo get_the_author_meta( 'display_name', $iAuthorId )
                                                ?></a>
                                        </div>
                                        <div class="post-date">
                                            <a href="#"><?php echo get_the_date(get_option('date_format'),$aBlog['postID']);?></a>
                                        </div>
                                    </div>
                                    <div class="hover">
                                        <div class="hover-inner">
                                            <h4>
                                                <a target="_blank" rel="noopener noreferrer" href="<?php echo get_permalink($aBlog['postID']);?>">
                                                    <?php echo get_the_title($aBlog['postID']); ?>
                                                </a>
                                            </h4> 
                                            <div class="blog-read-time"><?php echo esc_html($aBlog['reading-time']);?> min Read</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </section>
        <?php
    }
}
