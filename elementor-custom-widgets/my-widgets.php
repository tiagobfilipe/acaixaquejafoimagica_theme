<?php

class My_Elementor_Widgets {

	protected static $instance = null;

	public static function get_instance() {
		if ( ! isset( static::$instance ) ) {
			static::$instance = new static;
		}

		return static::$instance;
	}

	protected function __construct() {
		require_once('elementor_widget_last_articles.php');
		require_once('elementor_widget_channels.php');
		require_once('elementor_widget_rubrics.php');
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
	}

	public function register_widgets() {
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Elementor_Widget_Last_Articles() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Elementor_Widget_Channels() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Elementor_Widget_Rubrics() );
	}

}



add_action( 'init', 'my_elementor_init' );
function my_elementor_init() {
	My_Elementor_Widgets::get_instance();
}