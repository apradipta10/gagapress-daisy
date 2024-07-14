<?php

function gagapress_widgets_init()
{
    register_sidebar(array(
        'name'          => __('Main Sidebar', 'gagapress'),
        'id'            => 'main-sidebar',
        'description'   => __('Widgets in this area will be shown on all posts and pages.', 'gagapress'),
        'before_widget' => '<div class="px-0 lg:px-6 widget mt-6 lg:mt-0">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="lg:text-lg font-bold mb-4">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'gagapress_widgets_init');
