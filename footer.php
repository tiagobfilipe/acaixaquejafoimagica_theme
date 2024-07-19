    <!-- FOOTER -->
    <footer class="p-4" style="background-color:#FAFAFA;">
        <div class="container">
            <div class="row text-center pb-4">
                <div class="col-12">
                <?php the_custom_logo(); ?>
                    <div class="social-icons pt-2">
                        <?php if(get_theme_mod('set_facebook') != ""){ ?>
                        <a href="https://facebook.com/<?php echo get_theme_mod('set_facebook') ?>" target="_blank"><i class="fab fa-facebook"></i></a>
                       <?php } ?>
                       <?php if(get_theme_mod('set_instagram') != ""){ ?>
                        <a href="https://instagram.com/<?php echo get_theme_mod('set_instagram') ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                        <?php } ?>
                       <?php if(get_theme_mod('set_twitter') != ""){ ?>
                        <a href="https://instagram.com/<?php echo get_theme_mod('set_twitter') ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                        <?php } ?>
                    </div>
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer-menu',
                            'menu_class' => 'footer-menu'
                        )
                    );
                    ?>
                </div>
            </div>
            <div class="row text-center">
                <p class="text-center">© 2021. Todos os direitos reservados. Website desenhado por <a href="https://www.tiagobf.pt/" target="_blank">Tiago Filipe</a></p>
            </div>
    </footer>
    <!-- END FOOTER -->

    <button class="btn btn-success" id='toTop2'><i class="fa fa-arrow-up"></i></button>
    <script>

        jQuery('#exampleModal').on('shown.bs.modal', function () {
            jQuery('.search-field').focus();
        })  

        jQuery(window).scroll(function() {
            if (jQuery(this).scrollTop()) {
                jQuery('#toTop2').fadeIn();
            } else {
                jQuery('#toTop2').fadeOut();
            }
        });

        jQuery("#toTop2").click(function() {
            //1 second of animation time
            //html works for FFX but not Chrome
            //body works for Chrome but not FFX
            //This strange selector seems to work universally
            jQuery("html, body").animate({
                scrollTop: 0
            }, 500);
        });
    </script>

    <?php wp_footer() ?>
    </body>

    </html>