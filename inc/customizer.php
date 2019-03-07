<?php
/**
 * Spacefarer Theme Customizer
 *
 * @package Spacefarer
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function spacefarer_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'spacefarer_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'spacefarer_customize_partial_blogdescription',
		) );
	}
	
	/////CUSTOM COLOR SETTINGS---------------------------------------------------------------------
	
	// main color ( site title, h1, h2, h4. h6, widget headings, nav links, footer headings )
	$txtcolors[] = array(
		'slug'=>'color_scheme_1', 
		'default' => '#080c55',
		'label' => 'Main Color'
	);
	 
	// secondary color ( site description, sidebar headings, h3, h5, nav links on hover )
	$txtcolors[] = array(
		'slug'=>'color_scheme_2', 
		'default' => '#f76571',
		'label' => 'Secondary Color'
	);
	 
	// link color
	$txtcolors[] = array(
		'slug'=>'link_color', 
		'default' => '#b27dfb',
		'label' => 'Tertiary Color'
	);
	 
	// link color ( hover, active )
	$txtcolors[] = array(
		'slug'=>'hover_link_color', 
		'default' => '#9e4059',
		'label' => 'Link Color (on hover)'
	);
	// add the settings and controls for each color
	foreach( $txtcolors as $txtcolor ) {
		// SETTINGS
		$wp_customize->add_setting(
			$txtcolor['slug'], array(
				'default' => $txtcolor['default'],
				'type' => 'option', 
				'capability' =>  'edit_theme_options'
			)
		);
		 // CONTROLS
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$txtcolor['slug'], 
				array('label' => $txtcolor['label'], 
				'section' => 'colors',
				'settings' => $txtcolor['slug'])
			)
		);
	}
}
add_action( 'customize_register', 'spacefarer_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function spacefarer_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function spacefarer_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function spacefarer_customize_preview_js() {
	wp_enqueue_script( 'spacefarer-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'spacefarer_customize_preview_js' );
