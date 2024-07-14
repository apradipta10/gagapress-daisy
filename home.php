<?php get_header(); ?>

<div class="container">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="prose mb-4">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <?php the_excerpt(); ?>
            </article>
        <?php endwhile;
    else : ?>
        <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>

</div>
<?php get_footer(); ?>