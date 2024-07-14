<?php get_header(); ?>

<main>
    <div class="blog-index py-8">
        <div class="container">
            <article>
                <h2><?php esc_html_e('Page not found', 'mytheme'); ?></h2>
                <p><?php esc_html_e('It looks like nothing was found at this location. Maybe try a search?', 'mytheme'); ?></p>
                <?php get_search_form(); ?>
            </article>
        </div>
    </div>
</main>

<?php get_footer(); ?>