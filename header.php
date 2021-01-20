<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?php bloginfo('title');?></title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url');?>">
    <?php wp_head(); ?>
</head>
<body>
<header>
    <div class="container">
        <h1><?php bloginfo('name'); ?></h1>
        <span><?php bloginfo('description'); ?></span>
    </div>
</header>
<nav class="main-nav">
    <div class="container">
        <?php $args=[
            'theme_location'=>'main-menu'
        ];
        wp_nav_menu($args);?>

        <?php
//            $aSocialNetworks = apply_filters(
//                'vuong/filter/social-networks',
//                [
//                    'facebook',
//                    'twitter',
//                    'google'
//                ],
//                $_REQUEST['currentPage']
//            );
//
//            foreach($aSocialNetworks as $social) {
//                ?>
<!--                <a href="#">--><?php //echo $social; ?><!--</a>-->
<!--                --><?php
//            }
        ?>
    </div>
</nav>
