<?php get_header(); ?>

<main>
    <div class="page py-8">
        <div class="container">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <article>
                        <h2><?php the_title(); ?></h2>
                        <?php the_content(); ?>
                    </article>
                <?php endwhile;
            else : ?>
                <p><?php esc_html_e('Sorry, no pages matched your criteria.'); ?></p>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>