<?php

function add_custom_class_to_article_images($content)
{
    // Cek apakah ini adalah konten dari sebuah postingan, bukan halaman atau custom post type lainnya
    if (is_single() && in_the_loop() && is_main_query()) {
        // Gunakan DOMDocument untuk memanipulasi HTML
        $dom = new DOMDocument();
        libxml_use_internal_errors(true); // Supaya tidak error dengan HTML5
        $dom->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));
        libxml_clear_errors();

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $image) {
            $existing_class = $image->getAttribute('class');
            $new_class = 'max-w-full text-center mx-auto rounded-md';
            if (!empty($existing_class)) {
                $new_class = $existing_class . ' ' . $new_class;
            }
            $image->setAttribute('class', $new_class);
        }

        // Kembalikan konten dengan modifikasi
        $content = $dom->saveHTML();
    }

    return $content;
}

add_filter('the_content', 'add_custom_class_to_article_images');
