<?php

namespace Elementor;

class Elementor_Widget_Last_Articles extends Widget_Base
{

	public function get_name()
	{
		return 'Last Articles';
	}

	public function get_title()
	{
		return 'Últimos Artigos';
	}

	public function get_icon()
	{
		return 'eicon-accordion';
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
			'nr_cards_per_line',
			[
				'label' => __('Número de Cartões por Linha', 'elementor'),
				'label_block' => true,
				'type' => Controls_Manager::NUMBER,
				'placeholder' => __('Nr', 'elementor'),
			]
		);

		$this->end_controls_section();
	}

	protected function render()
	{

		$settings = $this->get_settings_for_display();
?>
		<?php
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => $settings['nr_cards_per_line'],
			'order' => 'DESC'
		);

		$posts = new \WP_Query($args);

		/*
		* Opções do Elemento Últimos Artigos
		* Título
		* Número de Cartões a mostrar na linha
		* Altura dos Cartões
		* Cor do Link da página
		* Cor dos outros textos
		* Cor das Categorias
		*/
		?>
		<div class="container">
			<div class="row">
				<h2 class="pt-4 last-posts-title text-center"><?php echo $settings['title'] ?>
					<hr \>
				</h2>

				<?php for ($i = 1; $posts->have_posts(); $i++) : $posts->the_post() ?>
					<div class="col-lg-<?php echo 12 / (intval($settings['nr_cards_per_line'])) ?> pt-4">
						<div class="card">
							<a href="<?php the_permalink() ?>"><img src="<?php the_post_thumbnail_url() ?>" class="card-img-top img-fluid" alt="..." style="height: 45vh; width: 100%; object-fit: cover;"></a>
							<div class="card-body">
								<p class="card-text"><small><?php echo get_the_date() ?></small></p>
								<h5 class="card-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
								<p class="card-text"><?php echo get_the_category_list() ?></p>
							</div>
						</div>
					</div>
				<?php
				endfor;
				wp_reset_query();
				?>
			</div>
		</div>
	<?php
	}

	protected function _content_template()
	{
	?>
<?php
	}
}
