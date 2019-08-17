<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package exam
 */

?>


<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php get_the_title(); ?></title>

    <?php wp_head(); ?>
</head>
<body>

<header id="header" class="header">
    <div class="container">
        <div class="header__content">
            <div class="header__content-item">
                <?php require "inc-html/logo.php"; ?>
            </div>
            <div class="header__content-item">
                <nav class="navbar  navbar-light">
                    <div class="nav">
                        <?php
                        wp_nav_menu( array(
                            'theme_location' => 'Primary',
                            'menu' => 'Primary',
                        ) );
                        ?>
                    </div>
                </nav>
            </div>

        </div>
    </div>
</header>
