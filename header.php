<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <title>
        <?php wp_title('|', true, 'right'); ?>
    </title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php
    if (function_exists('wp_body_open')) {
        wp_body_open();
    } ?>

    <header>
        <div class="container">
            <nav>
                <div class="left-menu">
                    <?= the_custom_logo(); ?>
                    <ul>
                        <li><a href="#">Inicio</a></li>
                        <li><a href="#">O que fazemos?</a></li>
                        <li><a href="#">Cases</a></li>
                        <li><a href="#">Contato</a></li>
                    </ul>
                </div>
                <div class="right-menu">

                    <div class="theme-switch-wrapper">
                        <label class="theme-switch" for="checkbox">
                            <input type="checkbox" id="checkbox" />
                            <div class="slider round"></div>
                        </label>
                    </div>
                </div>
            </nav>
        </div>
    </header>