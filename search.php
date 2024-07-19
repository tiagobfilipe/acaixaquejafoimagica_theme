<?php get_header() ?>
<!-- LAST POSTS -->
<div class="content">
    <div class="container">
        <div class="row pt-4">
            <h2 class="pt-4 last-posts-title text-center">RESULTADOS DA PESQUISA: <?php echo '"' . get_search_query() . '"'; ?>
                <hr \>
            </h2>
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
                <?php echo previous_posts_link('Anterior') ?>
            </div>
            <div class="col-6 p-4" style="text-align: right;">
                <?php echo next_posts_link('Seguinte') ?>
            </div>
        </div>
    </div>
</div>
<!-- END ENTREVISTAS -->
<?php get_footer() ?>