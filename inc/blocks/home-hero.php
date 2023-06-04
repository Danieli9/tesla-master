<?php
add_action('acf/init', 'tesla_acf_init_home_hero');

function tesla_acf_init_home_hero() {
    // Check function exists.
    if (function_exists('acf_register_block_type')) {
        acf_register_block_type(array(
            'name' => 'home_hero',
            'title' => __('Home Hero'),
            'description' => __('The hero shown on the homepage'),
            'render_template' => 'template-parts/blocks/home-hero.php',
            'category' => 'tesla-theme-blocks',
            'icon' => 'admin-home',
            'mode' => 'edit',
            'keywords' => array('home', 'hero'),
            'example' => [
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image_help' => get_stylesheet_directory_uri() . '/images/block-previews/t-home-hero.png',
                    )
                )
            ],
        ));
    }
}