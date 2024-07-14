<?php
get_header();
?>

<div class="blog-index py-8">
    <div class="container">
        <div class="pb-6">
            <h1 class="text-3xl font-extrabold leading-9 tracking-tight text-gray-900 dark:text-gray-100 sm:hidden sm:text-4xl sm:leading-10 md:text-6xl md:leading-14">
                <?php
                if (is_category()) {
                    single_cat_title();
                } elseif (is_tag()) {
                    single_tag_title();
                } else {
                    _e('All Posts');
                }
                ?>
            </h1>
        </div>
        <div class="flex sm:space-x-24">
            <div class="hidden h-full max-h-screen min-w-[280px] max-w-[280px] flex-wrap overflow-auto rounded pt-5 shadow-md bg-base-300 sm:flex">
                <?php if (is_category()) : ?>
                    <div class="px-6 py-4">
                        <h3 class="font-bold uppercase text-secondary hover:text-secondary-600 dark:hover:text-primary-500">Categories</h3>
                        <ul>
                            <?php
                            $categories = get_categories();
                            $current_category = get_queried_object_id();
                            foreach ($categories as $category) {
                                $category_link = get_category_link($category->term_id);
                                $active_class = ($category->term_id == $current_category) ? 'text-primary dark:text-primary-400' : 'text-gray-500 dark:text-gray-300 hover:text-primary-500 dark:hover:text-primary-500';
                                echo '<li class="my-3"><a class="px-3 py-2 text-sm font-medium uppercase ' . $active_class . '" href="' . esc_url($category_link) . '">' . esc_html($category->name) . ' (' . $category->count . ')</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                <?php elseif (is_tag()) : ?>
                    <div class="px-6 py-4">
                        <h3 class="font-bold uppercase text-secondary hover:text-secondary-600 dark:hover:text-primary-500">Tags</h3>
                        <ul>
                            <?php
                            $tags = get_tags();
                            $current_tag = get_queried_object_id();
                            foreach ($tags as $tag) {
                                $tag_link = get_tag_link($tag->term_id);
                                $active_class = ($tag->term_id == $current_tag) ? 'text-primary dark:text-primary-400' : 'text-gray-500 dark:text-gray-300 hover:text-primary-500 dark:hover:text-primary-500';
                                echo '<li class="my-3"><a class="px-3 py-2 text-sm font-medium uppercase ' . $active_class . '" href="' . esc_url($tag_link) . '">' . esc_html($tag->name) . ' (' . $tag->count . ')</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
            <div>
                <ul>
                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 5,
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'paged' => $paged
                    );

                    if (is_category()) {
                        $args['cat'] = get_queried_object_id();
                    } elseif (is_tag()) {
                        $args['tag_id'] = get_queried_object_id();
                    }

                    $query = new WP_Query($args);

                    if ($query->have_posts()) :
                        while ($query->have_posts()) : $query->the_post(); ?>
                            <li class="py-5">
                                <article class="flex flex-col space-y-2 xl:space-y-0">
                                    <dl>
                                        <dd class="text-sm font-medium leading-6 text-gray-500 dark:text-gray-400">
                                            <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
                                        </dd>
                                    </dl>
                                    <div class="py-2">
                                        <div>
                                            <h2 class="font-bold leading-8 tracking-tight">
                                                <a class="text-gray-900 dark:text-gray-100 prose text-2xl" href="<?php the_permalink(); ?>">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h2>
                                            <div class="flex flex-wrap mt-2">
                                                <?php
                                                $categories = get_the_category();
                                                if ($categories) {
                                                    foreach ($categories as $category) {
                                                        echo '<a class="prose mr-3 text-sm font-medium uppercase text-secondary hover:text-secondary-600 dark:hover:text-primary-400" href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="prose max-w-none text-gray-500 dark:text-gray-400 mt-4">
                                            <?php echo wp_trim_words(get_the_content(), 30, '...'); ?>
                                        </div>
                                    </div>
                                </article>
                            </li>
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                    <?php else : ?>
                        <p><?php _e('No posts found.'); ?></p>
                    <?php endif; ?>
                </ul>
                <div class="space-y-2 pb-8 pt-6 md:space-y-5">
                    <?php
                    // Pagination
                    $total_pages = $query->max_num_pages;
                    $current_page = max(1, get_query_var('paged'));

                    if ($total_pages > 1) {
                        echo '<nav class="flex justify-between">';
                        if ($current_page > 1) {
                            echo '<a class="cursor-pointer" href="' . get_pagenum_link($current_page - 1) . '">Previous</a>';
                        } else {
                            echo '<span class="cursor-auto disabled:opacity-50">Previous</span>';
                        }

                        echo '<span>' . $current_page . ' of ' . $total_pages . '</span>';

                        if ($current_page < $total_pages) {
                            echo '<a class="cursor-pointer" href="' . get_pagenum_link($current_page + 1) . '">Next</a>';
                        } else {
                            echo '<span class="cursor-auto disabled:opacity-50">Next</span>';
                        }
                        echo '</nav>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>