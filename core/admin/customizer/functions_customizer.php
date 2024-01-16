<?php

class Functions_Customizer
{
    public function __construct()
    {
        add_action('customize_register', array($this, 'register_customize_sections'));
    }

    public function register_customize_sections($wp_customize)
    {
        $this->callout_section($wp_customize);
    }

    /* Sanitize Inputs */
    public function sanitize_custom_option($input)
    {
        return ($input === "No") ? "No" : "Yes";
    }
    
    public function sanitize_custom_url($input)
    {
        return filter_var($input, FILTER_SANITIZE_URL);
    } 

    private function callout_section($wp_customize)
    {

        $wp_customize->add_setting('basic-minify-callout-display', array(
            'default' => 'No',
            'sanitize_callback' => array($this, 'sanitize_custom_option')
        ));

        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'basic-author-callout-display-control', array(
            'label' => 'Minificar HTML?',
            'section' => 'basic-general-callout-section',
            'settings' => 'basic-minify-callout-display',
            'type' => 'select',
            'choices' => array('No' => 'Desabilitado', 'Yes' => 'Habilitado')
        )));

        $wp_customize->add_section('basic-general-callout-section', array(
            'title' => 'Configurações Principais',
            'priority' => 1, 
        ));
  
        $wp_customize->add_setting('basic-logo-callout-image-footer', array(
            'default' => '',
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => array($this, 'sanitize_custom_url')
        ));
          $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'basic-author-callout-image-footer-control', array(
            'label' => 'Logo do Site Rodapé',
            'section' => 'title_tagline',
            'description' => __('Mude a logoTipo do rodapé clicando em: "Selecionar Imagem"', 'daicomlab'),
            'settings' => 'basic-logo-callout-image-footer',
        	'height'               => 100,
		'width'                => 400,
		'flex-height'          => true,
		'flex-width'           => true,
        )));
    }
}
