<?php

use Yoast\WP\SEO\Generators\Schema\Breadcrumb;

get_header() ?>

<section class="content">
    <div class="container">
        <div class="row">
            <div class="card">
                <p class="card-text pt-4"><?php echo get_the_date() ?></p>
                <h1 class="card-title"><?php echo the_title() ?></h1>
                <div style="background-image: url('<?php echo the_post_thumbnail_url() ?>'); background-size: cover;">
                    <div style="backdrop-filter: blur(5px);">
                        <img src="<?php echo the_post_thumbnail_url() ?>" class="card-img-top" style="object-fit: contain; max-height: 500px;">
                        <p class="card-text text-center" style="color: black; background-color: #ffffffb4;"><i class="fa fa-camera"></i> <?php echo get_the_post_thumbnail_caption() ?></p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <p class="card-text"><?php echo the_content() ?></p>
                            <span class="text-muted">Categorias: </span><?php echo get_the_category_list() ?></span>
                            <span class="text-muted">Tags: </span><?php echo get_the_tag_list() ?></span>
                            <hr>
                            <p class="card-text text-center">
                                <?php echo do_shortcode('[simple-author-box]'); ?>
                            </p>

                            <div class="row">
                                <div class="col-6 p-4">
                                    <?php echo previous_post_link() ?>
                                </div>
                                <div class="col-6 p-4" style="text-align: right;">
                                    <?php echo next_post_link() ?>
                                </div>
                                <div class="share-links card-text pt-4">
                                    <a href="https://www.facebook.com/sharer.php?u=<?php echo get_the_permalink() ?>" target="_blank"><i class="fab fa-facebook"></i></a>
                                    <a href="https://twitter.com/share?url=<?php echo get_the_permalink() ?>&text=<?php echo the_title() ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                                    <a href="https://wa.me/?text=<?php echo get_the_permalink() ?>" target="_blank"><i class="fab fa-whatsapp"></i></a>
                                    <a href="https://t.me/share/url?url=<?php echo get_the_permalink() ?>&text=<?php echo the_title() ?>" target="_blank"><i class="fab fa-telegram"></i></a>
                                    <a href="mailto:?subject=<?php echo the_title() ?>&body=<?php echo get_the_permalink() ?>" target="_blank"><i class="fa fa-envelope"></i></a>
                                </div>
                                <div>
                                    <p class="card-text"><?php echo comments_template() ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <?php dynamic_sidebar('blog-sidebar') ?>
                        </div>
                    </div>
                </div>
            </div>
</section>

<?php get_footer() ?>