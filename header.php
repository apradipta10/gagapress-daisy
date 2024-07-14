<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth" data-theme="light">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body class="antialiased">
    <header class="py-4 mb-16">
        <div class="container">
            <div class="navbar bg-base-100 px-0">
                <div class="navbar-start">
                    <div class="dropdown">
                        <div tabindex="0" role="button" class="btn btn-ghost lg:hidden px-0 pr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                            </svg>
                        </div>
                        <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                            <?php
                            if (has_nav_menu('primary')) {
                                wp_nav_menu(array(
                                    'theme_location' => 'primary',
                                    'container' => false,
                                    'items_wrap' => '%3$s',
                                    'walker' => new WP_Bootstrap_Navwalker(),
                                ));
                            } else {
                                echo '<li><a href="' . home_url() . '" class="prose">Home</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                    <?php if (has_custom_logo()) {
                        the_custom_logo();
                    } else { ?>
                        <a class="btn prose" href="<?php echo home_url(); ?>">Gagapress</a>
                    <?php } ?>
                </div>
                <div class="navbar-end hidden lg:flex">
                    <ul class="menu menu-horizontal px-1">
                        <?php
                        if (has_nav_menu('primary')) {
                            wp_nav_menu(array(
                                'theme_location' => 'primary',
                                'container' => false,
                                'items_wrap' => '%3$s',
                                'walker' => new WP_Bootstrap_Navwalker(),
                            ));
                        } else {
                            echo '<li><a href="' . home_url() . '" class="prose">Home</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <main>