<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(''); ?></title>
    <?php wp_head() ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<?php header('Access-Control-Allow-Origin: http://disqus.com'); ?>
    <style>
        :root {
            --maincolor: <?php echo get_option('set_cor_principal') ?>;
        }
    </style>
</head>

<body>
    <!-- SEARCH MODAL -->
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-search"></i> Pesquisar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php get_search_form() ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MENU BAR -->
        <!-- MENU BAR -->
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasMenuLabel"><i class="fa fa-bars"></i> Menu</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'main-menu',
                        'menu_class' => 'main-menu'
                    )
                );
                ?>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'secondary-menu',
                        'menu_class' => 'secondary-menu'
                    )
                );
                ?>
                <div class="social-icons pt-2">
                    <?php if (get_theme_mod('set_facebook') != "") { ?>
                        <a href="https://facebook.com/<?php echo get_theme_mod('set_facebook') ?>" target="_blank"><i class="fab fa-facebook"></i></a>
                    <?php } ?>
                    <?php if (get_theme_mod('set_instagram') != "") { ?>
                        <a href="https://instagram.com/<?php echo get_theme_mod('set_instagram') ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                    <?php } ?>
                    <?php if (get_theme_mod('set_twitter') != "") { ?>
                        <a href="https://instagram.com/<?php echo get_theme_mod('set_twitter') ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- END MENU BAR -->

        <header class="p-3" style="margin-bottom: 15px; margin-right: 0px">
            <div class="container">
                <div class="row">
                    <div class="text-center">
                        <a class="menu-button" data-bs-toggle="offcanvas" href="#offcanvasMenu" role="button" aria-controls="offcanvasMenu"><i class="fa fa-bars"></i></a>
                        <?php the_custom_logo(); ?>
                        <a class="menu-button search" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-search"></i></a>
                    </div>
                </div>
            </div>
        </header>