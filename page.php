<?php get_header() ?>
<div class="content">
    <div class="container">
        <div class="row pt-4">
        <h2 class="pt-4 last-posts-title text-center"><?php the_title() ?><hr \></h2>

            <?php the_content() ?>
        </div>
    </div>
</div>
<?php get_footer() ?>