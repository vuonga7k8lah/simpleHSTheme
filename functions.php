<?php

function hs2_register_styles()
{
	wp_enqueue_style('hs2-line-awesome-style',
		get_template_directory_uri() . '/assets/fonts/line-awesome-1.3.0/css/line-awesome.min.css', [], '1.0', 'all');
	wp_enqueue_style('hs2-glide-core-style',
		get_template_directory_uri() . '/assets/js/glide-3.4.1/dist/css/glide.core.min.css', [], '1.0', 'all');
	wp_enqueue_style('hs2-glide-theme-style',
		get_template_directory_uri() . '/assets/js/glide-3.4.1/dist/css/glide.theme.min.css', [], '1.0', 'all');
	wp_enqueue_style('hs2-sub-style',
		get_template_directory_uri() . '/assets/css/styles.css', [], '1.0', 'all');
	wp_enqueue_style('hs2-main-style', get_template_directory_uri() . '/style.css', [], '1.0', 'all');
}

add_action('wp_enqueue_scripts', 'hs2_register_styles');

function hs2_register_scripts()
{
	wp_enqueue_script('glide-js', get_template_directory_uri() . '/assets/js/glide-3.4.1/dist/glide.min.js', [], '1.0',
		false);
	wp_enqueue_script('hs2-main-script', get_template_directory_uri() . '/assets/js/script.js', [], '1.0', true);
}

add_action('wp_enqueue_scripts', 'hs2_register_scripts');