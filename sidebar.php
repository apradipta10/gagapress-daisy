<aside>
    <?php if (is_active_sidebar('main-sidebar')) : ?>
        <?php dynamic_sidebar('main-sidebar'); ?>
    <?php endif; ?>
    <?php get_template_part('parts/ads/blog-sidebar-right'); ?>
</aside>