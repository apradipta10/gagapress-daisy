<?php
get_header();
?>

<div class="single-post py-8">
    <div class="container">
        <section class="mx-auto max-w-3xl px-4 sm:px-6 xl:max-w-5xl xl:px-0">
            <div class="fixed bottom-8 right-8 hidden flex-col gap-3 md:hidden">
                <button aria-label="Scroll To Comment" class="rounded-full bg-gray-200 p-2 transition-all hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-400 dark:hover:bg-gray-600">
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <button aria-label="Scroll To Top" class="rounded-full bg-gray-200 p-2 transition-all hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-400 dark:hover:bg-gray-600">
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <article>
                <div class="xl:divide-y xl:divide-gray-200 xl:dark:divide-gray-700">
                    <header class="pt-6 xl:pb-6">
                        <div class="space-y-1 text-center">
                            <dl class="space-y-10 mb-2">
                                <div>
                                    <dt class="sr-only">Published on</dt>
                                    <dd class="text-base font-medium leading-6 text-gray-500 dark:text-gray-400">
                                        <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
                                    </dd>
                                </div>
                            </dl>
                            <div>
                                <h1 class="text-4xl font-extrabold tracking-tight sm:text-4xl sm:leading-10 md:text-5xl md:leading-tight">
                                    <?php the_title(); ?>
                                </h1>
                            </div>
                        </div>
                    </header>
                    <div class="grid-rows-[auto_1fr] divide-y divide-gray-200 pb-8 dark:divide-gray-700 xl:grid xl:grid-cols-4 xl:gap-x-6 xl:divide-y-0">
                        <div class="divide-y divide-gray-200 dark:divide-gray-700 xl:col-span-3 xl:row-span-2 xl:pb-0">
                            <div class="prose max-w-none pb-8 pt-10 dark:prose-invert post-heading">
                                <?php
                                // Ensure that the loop starts and ends correctly
                                while (have_posts()) : the_post();
                                    the_content();
                                endwhile; // End loop
                                ?>
                            </div>
                        </div>
                        <footer>
                            <div class="divide-gray-200 text-sm font-medium leading-5 dark:divide-gray-700 xl:col-start-1 xl:row-start-2 xl:divide-y">
                                <div class="py-4 xl:py-8">
                                    <h2 class="text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">Tags</h2>
                                    <div class="flex flex-wrap">
                                        <?php
                                        $post_tags = get_the_tags();
                                        if ($post_tags) {
                                            foreach ($post_tags as $tag) {
                                                echo '<a class="mr-3 text-sm mt-2 font-medium uppercase text-secondary hover:text-primary-600" href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>';
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="flex justify-between py-4 xl:block xl:space-y-8 xl:py-8">
                                    <div>
                                        <h2 class="text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">Previous Article</h2>
                                        <div class="text-primary-500 hover:text-primary-600 dark:hover:text-primary-400">
                                            <?php
                                            $prev_post = get_previous_post();
                                            if ($prev_post) :
                                                echo '<a class="text-secondary break-words" href="' . get_permalink($prev_post->ID) . '">' . get_the_title($prev_post->ID) . '</a>';
                                            else :
                                                echo 'No Previous Article';
                                            endif;
                                            ?>
                                        </div>
                                    </div>
                                    <div>
                                        <h2 class="text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">Next Article</h2>
                                        <div class="text-primary-500 hover:text-primary-600 dark:hover:text-primary-400">
                                            <?php
                                            $next_post = get_next_post();
                                            if ($next_post) :
                                                echo '<a class="text-secondary break-words" href="' . get_permalink($next_post->ID) . '">' . get_the_title($next_post->ID) . '</a>';
                                            else :
                                                echo 'No Next Article';
                                            endif;
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </footer>
                    </div>
                </div>
            </article>
        </section>
    </div>
</div>

<?php get_footer(); ?>