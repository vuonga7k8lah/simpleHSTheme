<?php
define('VUONG_VERSION', '1.1');

function vuongInitSetup()
{
    //đăng ký menu
    register_nav_menus(array(
        'main-menu' => 'Main Menu'
    ));
//đăng ký thumbnail
    add_theme_support('post-thumbnails');
//dang ky sidebar
    register_sidebar(array(
        'name' => 'sidebar Right',
        'id' => 'sidebar-right',
        'description' => 'display sidebar right',
        'before_widget' => '<div class="side-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_tite' => '</h3>'
    ));
}

add_action('init', 'vuongInitSetup');

add_action('wp_enqueue_scripts', 'vuongEnqueueScripts');
function vuongEnqueueScripts()
{
    wp_register_style('vuong-css', get_stylesheet_uri(), [], VUONG_VERSION, 'all');
    wp_register_script('vuong-script', get_template_directory_uri() . '/script.js', ['jquery'], VUONG_VERSION, true);

    wp_enqueue_style('vuong-css');
    wp_enqueue_script('vuong-script');
    wp_enqueue_script('jquery-effects-core');
}

add_filter('the_title', function ($title, $id) {
    if ($id == 1) {
        $title .= ' Toi la bai viet co id la 1';
    }
    return $title;
}, 10, 2);

add_filter('vuong/filter/social-networks', function ($aSocialNetworks, $currentPage) {
    if ($currentPage == 1) {
        $aSocialNetworks[] = 'zalo';
    }
    $googleIndex = array_search('google', $aSocialNetworks);
    unset($aSocialNetworks[$googleIndex]);

    return $aSocialNetworks;
}, 10, 2);