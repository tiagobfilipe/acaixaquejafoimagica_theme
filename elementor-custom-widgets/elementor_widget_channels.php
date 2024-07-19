<?php

namespace Elementor;

class Elementor_Widget_Channels extends Widget_Base
{

	public function get_name()
	{
		return 'Canais';
	}

	public function get_title()
	{
		return 'Canais';
	}

	public function get_icon()
	{
		return 'eicon-gallery-grid';
	}

	public function get_categories()
	{
		return ['basic'];
	}

	protected function _register_controls()
	{

		$this->start_controls_section(
			'section_title',
			[
				'label' => __('Content', 'elementor'),
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __('Título', 'elementor'),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __('Coloque o título.', 'elementor'),
			]
		);
		$this->add_control(
			'categoria',
			[
				'label' => __('Categoria', 'elementor'),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __('Coloque a Categoria', 'elementor'),
			]
		);

		$this->end_controls_section();
	}

	protected function render()
	{

		$settings = $this->get_settings_for_display();
?>
		<section class="<?php echo $settings['categoria'] ?> pt-4">
            <!-- LAST POSTS BY CHANNEL -->
            <div class="container">
                <div class="row">
                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'category_name' => $settings['categoria'],
                        'posts_per_page' => 4,
                        'order' => 'DESC'
                    );

                    $posts = new \WP_Query($args);

                    ?>

                    <h2 class="pb-2"><?php echo $settings['title'] ?></h2>
                        <?php for ($i = 1; $posts->have_posts(); $i++) : $posts->the_post() ?>
                            <div class="col-lg-3">
                                <div class="card">
                                    <a href="<?php the_permalink() ?>"><img src="<?php the_post_thumbnail_url() ?>" class="card-img-top img-fluid" alt="..." style="height: 195px; width: 100%; object-fit: cover;"></a>
                                    <div class="card-body">
                                        <p class="card-text"><small><?php echo get_the_date() ?></small></p>
                                        <h5 class="card-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endfor;
                        wp_reset_query();
                        ?>
                </div>
            </div>
            <!-- END LAST POSTS BY CHANNEL -->
        </section>
	<?php
	}

	protected function _content_template()
	{
	?>
<?php
	}
}
