<?php
namespace HsLandingElementor\Support;

/**
 * Class Helper
 * @package FractalElementorextension\Support
 */
trait Helper
{
    /**
     * @return array
     */
    protected function getAuthor()
    {
        $users = get_users(
            [
                "who" => "authors",
                "has_published_posts" => true,
                "fields" => array(
                    "ID",
                    "display_name"
                )
            ]
        );
        if (!empty($users)) {
            return wp_list_pluck($users, "display_name", "ID");
        }
        return [];
    }

    /**
     * @return array
     * @param $sPostType
     */
    public function getAllPost($sPostType = "post")
    {
        $posts = get_posts(
            [
                "post_type" => $sPostType,
                "post_style" => "all_types",
                "post_status" => "publish",
            ]
        );
        if (!empty($posts)) {
            return wp_list_pluck($posts, "post_title", "ID");
        }
        return [];
    }
}