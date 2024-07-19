<?php
// Creating the widget 
class wordpress_widget_last_articles extends WP_Widget
{

    function __construct()
    {
        parent::__construct(

            // Base ID of your widget
            'wordpress_widget_last_articles',

            // Widget name will appear in UI
            __('ACQJFM Last Articles', 'wpb_widget_domain'),

            // Widget description
            array('description' => __('Sample widget based on WPBeginner Tutorial', 'wpb_widget_domain'),)
        );
    }

    // Creating widget front-end

    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);

        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if (!empty($title))
            echo $args['before_title'] . strtoupper($title) . $args['after_title'];

        // This is where you run the code and display the output
        echo '<div class="col-12">' ?>

        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 7,
            'order' => 'DESC'
        );

        $posts = new WP_Query($args);
        ?>
        <?php for ($i = 1; $posts->have_posts(); $i++) : $posts->the_post() ?>
            <div class="col-lg-12">
                <article class="card mb-4 mt-4 last-posts" style="padding: 0px;">
                    <div class="row g-0">
                        <div class="col-md-5">
                            <a href="<?php the_permalink() ?>"><img src="<?php the_post_thumbnail_url() ?>" class="img-fluid" alt="..." style="height: 150px; width: 100%; object-fit: cover;"></a>
                        </div>
                        <div class="col-md-7">
                            <div class="card-body" style="padding: 0px; margin-left: 10px">
                                <p class="card-text"><small><?php echo get_the_date() ?></small></p>
                                <h5 class="card-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        <?php
        endfor;
        wp_reset_query();
        ?>

    <?php '</div>';
    }

    // Widget Backend 
    public function form($instance)
    {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('New title', 'wpb_widget_domain');
        }
        // Widget admin form
    ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
<?php
    }

    // Updating widget replacing old instances with new
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }

    // Class wpb_widget ends here
}


// Register and load the widget
function wpb_load_widget_2()
{
    register_widget('wordpress_widget_last_articles');
}
add_action('widgets_init', 'wpb_load_widget_2');
