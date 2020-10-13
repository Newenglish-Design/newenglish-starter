<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" /> 
    <?php wp_head(); ?>
</head>
<body <?php body_class('no-js'); ?>>
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'newenglish' ); ?></a>
    <header class="site-header" id="header">
        <div class="top-header">
            <div class="container">
                <div class="flex-grid">
                    <div class="col top-header-logo">

                    </div>
                    <div class="col text-right relative">
                        <label for="menu-toggle">
                            <div class="burger">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-header container">
            <div class="flex-grid">
                <div class="col site-branding">
                    <div class="site-title">
                        <h1>

                        </h1>
                    </div>
                </div>
                <div class="site-nav col">
                    <nav class="menu main-navigation text-right">
                        <div class="nav-search">
                            <div class="search" id="search"><?php get_search_form(); ?></div>
                        </div>
                        <input id="menu-toggle" type="checkbox" />
                        <label for="menu-toggle">
                            <div class="burger">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </label>
                        <?php wp_nav_menu( array( 'theme_location' => 'menu-1' ) ); ?>
                    </nav>
                </div>
            </div>
        </div>
    </header>