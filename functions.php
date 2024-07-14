<?php

// Important functions
require_once get_template_directory() . '/inc/theme-support.php';
require_once get_template_directory() . '/inc/enqueue.php';

// Include file
include get_template_directory() . '/inc/widget.php';
include get_template_directory() . '/inc/custom-class-article-image.php';
include get_template_directory() . '/inc/class-custom-nav-walker.php';

function console_log($output, $with_script_tags = true)
{
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}
