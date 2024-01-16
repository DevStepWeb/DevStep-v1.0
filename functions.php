<?php


if (!function_exists('devstep_setup')) {

	function devstep_setup()
	{

		define('THEME_URI', get_template_directory_uri());
		define('THEME_DIR', get_template_directory());
		define('THEME_SLUG', 'devstep');
 
 
		add_theme_support(
			'custom-logo',
			[
				'height' => 270,
				'width' => 90,
				'flex-height' => true,
				'flex-width' => true,
			]
		);

		 
		add_theme_support('post-thumbnails');
		add_theme_support('menus'); 
		add_theme_support('title-tag');
 

		#----------------------------------------------------------------
		# -Import Files - core theme [Require]
		#----------------------------------------------------------------
		  
		/*  ADMIN */ 
		require get_parent_theme_file_path('core/theme.php');
	}

	function style_scripts()
	{

		wp_register_script('libs-js', get_template_directory_uri() . '/assets/js/libs.js', array(), true, true);
		wp_register_script('main-js', get_template_directory_uri() . '/assets/js/all.min.js', array(), true, true);

		wp_enqueue_script('libs-js');
		wp_enqueue_script('main-js');
	}

	add_action('wp_enqueue_scripts', 'style_scripts');

	function style_css()
	{
		wp_register_style('main-style', get_template_directory_uri() . '/assets/css/style.css', array(), false, false);
		wp_register_style('libs-style', get_template_directory_uri() . '/assets/css/libs.css', array(), false, false);
		wp_enqueue_style('libs-style');
		wp_enqueue_style('main-style');
	}
	add_action('wp_enqueue_scripts', 'style_css');
}

add_action('after_setup_theme', 'devstep_setup');