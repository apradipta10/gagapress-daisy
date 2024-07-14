<?php

function gagapress_setup()
{
    // Menambahkan dukungan untuk featured image
    add_theme_support('post-thumbnails');

    // Menambahkan dukungan untuk title tag
    add_theme_support('title-tag');

    // Menambahkan dukungan untuk custom logo
    add_theme_support('custom-logo');

    // Menambahkan menu navigasi
    register_nav_menus(array(
        'primary' => esc_html__('Primary', 'gagapress'),
    ));
}
add_action('after_setup_theme', 'gagapress_setup');
