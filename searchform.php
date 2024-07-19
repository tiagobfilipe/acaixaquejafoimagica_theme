<form role="search" method="get" class="search-form mb-4" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="input-group mb-3">
        <input type="search" class="form-control search-field" value="<?php echo get_search_query(); ?>" name="s" placeholder="Pesquisar..." />
        <button class="btn btn-primary" type="submit" id="button-addon2">Pesquisar</button>
    </div>

</form>