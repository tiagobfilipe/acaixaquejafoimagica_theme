<?php get_header() ?>
<div class="content">
    <div class="container">
        <div class="row pt-4">
        <?php the_archive_title('<h2 class="pt-4 last-posts-title text-center">', '<hr \></h2>'); ?>
            <?php echo '<div class="text-muted text-center">' . get_the_archive_description() . '</div>'; ?>

            <?php for ($i = 1; have_posts(); $i++) : the_post() ?>
                <div class="col-lg-4 pt-4">
                    <div class="card">
                        <a href="<?php the_permalink() ?>"><img src="<?php the_post_thumbnail_url() ?>" class="card-img-top img-fluid" alt="..." style="height: 50vh; width: 100%; object-fit: cover;"></a>
                        <div class="card-body">
                            <p class="card-text"><small><?php echo get_the_date() ?></small></p>
                            <h5 class="card-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
                            <p class="card-text"><?php echo get_the_category_list() ?></p>
                        </div>
                    </div>
                </div>
            <?php
            endfor;
            ?>
        </div>
        <div class="row">
            <div class="col-6 p-4">
                <?php echo previous_posts_link('<i class="fas fa-chevron-left"></i> Anterior') ?>
            </div>
            <div class="col-6 p-4" style="text-align: right;">
                <?php echo next_posts_link('Seguinte <i class="fas fa-chevron-right"></i>') ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>