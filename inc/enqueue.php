<?php

function gagapress_enqueue()
{
    // Mendaftarkan style utama
    wp_enqueue_style(
        'main',
        get_template_directory_uri() . '/assets/css/public/style.css',
        [],
        filemtime(get_theme_file_path('/assets/css/public/style.css')),
        'all'
    );
}
add_action('wp_enqueue_scripts', 'gagapress_enqueue');
