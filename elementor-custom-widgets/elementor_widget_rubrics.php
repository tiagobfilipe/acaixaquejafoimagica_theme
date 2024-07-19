<?php

namespace Elementor;

class Elementor_Widget_Rubrics extends Widget_Base
{

	public function get_name()
	{
		return 'Rubricas';
	}

	public function get_title()
	{
		return 'Rubricas';
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
		<section class="pt-4">
			<div class="container">
				<div class="row">
					<h2><?php echo $settings['title'] ?></h2>
					<?php
					$args = array(
						'post_type' => 'post',
						'category_name' => $settings['categoria'],
						'posts_per_page' => 3,
						'order' => 'DESC'
					);

					$posts = new \WP_Query($args);
					?>
					<?php for ($i = 1; $posts->have_posts(); $i++) : $posts->the_post() ?>
						<div class="col-lg-4">
							<article class="card mb-4 mt-4 last-posts" style="padding: 0px;">
								<div class="row g-0">
									<div class="col-md-5">
										<a href="<?php the_permalink() ?>"><img src="<?php the_post_thumbnail_url() ?>" class="img-fluid" alt="..." style="height: 30vh; width: 100%; object-fit: cover;"></a>
									</div>
									<div class="col-md-7">
										<div class="card-body" style="padding: 25px;">
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
				</div>
			</div>
		</section>
	<?php
	}

	protected function _content_template()
	{
	?>
<?php
	}
}
