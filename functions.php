<?php

//Carregar Elementos Personalizados do Elementor
require_once(get_template_directory() . '/elementor-custom-widgets/my-widgets.php');

//Carregar Widgets Personalizados
require_once(get_template_directory() . '/wordpress-custom-widgets/my-widgets.php');

// Carregar Ficheiros Css e JavaScript
add_action('wp_enqueue_scripts', 'load_scripts');

function load_scripts()
{
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/bootstrap-5.0.2/js/bootstrap.min.js', '5.0.2', true);
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/bootstrap-5.0.2/css/bootstrap.min.css', array(), '5.0.2', 'all');
    wp_enqueue_style('theme-css', get_template_directory_uri() . '/assets/css/theme.css', array(), '1.0', 'all');
    wp_enqueue_style('fontawesome-css', get_template_directory_uri() . '/assets/fontawesome-free-5.15.3-web/css/all.min.css', array(), '5.15.3', 'all');
}

//Função de Configuração do Tema.
function acaixaquejafoimagicatheme_config()
{

    //Habilitando suporte à tradução
    $textdomain = 'acaixaquejafoimagicatheme';
    load_theme_textdomain($textdomain, get_template_directory() . '/languages/');

    //Registo dos Menus.
    register_nav_menus(
        array(
            'main-menu' => __('Main Menu', 'acaixaquejafoimagicatheme'),
            'secondary-menu' => __('Secondary Menu', 'acaixaquejafoimagicatheme'),
            'footer-menu' => __('Footer Menu', 'acaixaquejafoimagicatheme')
        )
    );

	add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-logo');


    //Suporte ao Gutenberg
    add_theme_support('align-wide');
    add_theme_support('responsive-embeds');
    add_theme_support('editor-styles');
    add_theme_support('wp-block-styles');
}

add_action('after_setup_theme', 'acaixaquejafoimagicatheme_config', 0);

//Opções do Tema
function acaixaquejafoimagicatheme_customize_register($wp_customize)
{

    $wp_customize->add_section(
        'sec_colors',
        array(
            'title'    => __('Cores', 'acaixaquejafoimagicatheme'),
            'description' => __('Secção de Cores', 'acaixaquejafoimagicatheme'),
        )
    );

    $wp_customize->add_setting('set_cor_principal', array(
        'default'           => '#000',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'option',
  
    ));
  
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'set_cor_principal', array(
        'label'    => __('Cor Principal', 'themename'),
        'section'  => 'sec_colors',
    )));

    $wp_customize->add_section(
        'sec_socials',
        array(
            'title'    => __('Redes Sociais', 'acaixaquejafoimagicatheme'),
            'description' => __('Secção Redes Sociais', 'acaixaquejafoimagicatheme'),
        )
    );

    $wp_customize->add_setting(
        'set_facebook',
        array(
            'type' => 'theme_mod',
            'default' => '#',
        )
    );

    $wp_customize->add_control('set_facebook', array(
        'label'      => __('Facebook', 'acaixaquejafoimagicatheme'),
        'description' => __('Coloque o seu ID do Facebook.', 'acaixaquejafoimagicatheme'),
        'section'    => 'sec_socials',
        'type' => 'text'
    ));

    $wp_customize->add_setting(
        'set_instagram',
        array(
            'type' => 'theme_mod',
            'default' => '#',
        )
    );

    $wp_customize->add_control('set_instagram', array(
        'label'      => __('Instagram', 'acaixaquejafoimagicatheme'),
        'description' => __('Coloque o seu ID do Instagram.', 'acaixaquejafoimagicatheme'),
        'section'    => 'sec_socials',
        'type' => 'text'
    ));

    $wp_customize->add_setting(
        'set_twitter',
        array(
            'type' => 'theme_mod',
            'default' => '#',
        )
    );

    $wp_customize->add_control('set_twitter', array(
        'label'      => __('Twitter', 'acaixaquejafoimagicatheme'),
        'description' => __('Coloque o seu ID do Twitter.', 'acaixaquejafoimagicatheme'),
        'section'    => 'sec_socials',
        'type' => 'text'
    ));
    
}

add_action('customize_register', 'acaixaquejafoimagicatheme_customize_register');

// Registo Sidebars
add_action( 'widgets_init', 'acaixaquejafoimagicatheme_sidebars' );
function acaixaquejafoimagicatheme_sidebars(){
	register_sidebar(
		array(
			'name' => __( 'Blog Sidebar', 'acaixaquejafoimagicatheme'),
			'id' => 'sidebar',
			'description' => __( 'Sidebar to be used on Blog Page', 'acaixaquejafoimagicatheme'),
			'before_widget' => '<section class="pt-4"><div class="container"><div class="row">',
			'after_widget' => '</div></div></section>',
			'before_title' => '<h5 style="font-family: \'TitilliumWeb-Bold\';">',
			'after_title' => '</h2>'
		)
	);		
}
