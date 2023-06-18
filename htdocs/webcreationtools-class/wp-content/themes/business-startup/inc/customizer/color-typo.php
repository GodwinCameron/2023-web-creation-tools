<?php 
$default = business_startup_get_default_theme_options();

//$wp_customize->get_section('colors')->title = __( 'General settings' );

// Add Theme Options Panel.
$wp_customize->add_panel( 'theme_color_typo',
	array(
		'title'      => __( 'General settings', 'business-startup' ),
		'priority'   => 40,
		'capability' => 'edit_theme_options',
	)
);

// font Section.
$wp_customize->add_section( 'font_typo_section',
	array(
		'title'      => __( 'Fonts & Typography', 'business-startup' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_color_typo',
	)
);

// font Section.
$wp_customize->add_section( 'colors',
	array(
		'title'      => __( 'Color Options', 'business-startup' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_color_typo',
	)
);

// Setting - primary_color.
$wp_customize->add_setting( 'primary_color',
	array(
		'default'           => $default['primary_color'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control( 'primary_color',
	array(
		'label'    => __( 'Primary Color', 'business-startup' ),
		'section'  => 'colors',
		'type'     => 'color',
		'priority' => 100,
	)
);


// Setting - secondary_color.
$wp_customize->add_setting( 'secondary_color',
	array(
		'default'           => $default['secondary_color'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control( 'secondary_color',
	array(
		'label'    => __( 'Secondary Color', 'business-startup' ),
		'section'  => 'colors',
		'type'     => 'color',
		'priority' => 100,
	)
);


// Setting - tertiary_color.
$wp_customize->add_setting( 'tertiary_color',
	array(
		'default'           => $default['tertiary_color'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control( 'tertiary_color',
	array(
		'label'    => __( 'Tertiary Color', 'business-startup' ),
		'section'  => 'colors',
		'type'     => 'color',
		'priority' => 100,
	)
);

global $business_startup_google_fonts;

// Setting - primary_font.
$wp_customize->add_setting( 'primary_font',
	array(
		'default'           => $default['primary_font'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'business_startup_sanitize_select',
	)
);
$wp_customize->add_control( 'primary_font',
	array(
		'label'    => __( 'Primary Font', 'business-startup' ),
		'section'  => 'font_typo_section',
		'type'     => 'select',
		'choices'     => $business_startup_google_fonts,
		'priority' => 100,
	)
);

// Setting - secondary_font.
$wp_customize->add_setting( 'secondary_font',
	array(
		'default'           => $default['secondary_font'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'business_startup_sanitize_select',
	)
);
$wp_customize->add_control( 'secondary_font',
	array(
		'label'    => __( 'Secondary Font', 'business-startup' ),
		'section'  => 'font_typo_section',
		'type'     => 'select',
		'choices'     => $business_startup_google_fonts,
		'priority' => 110,
	)
);


// Setting - text_size_title_font_big.
$wp_customize->add_setting( 'text_size_title_font_big',
	array(
		'default'           => $default['text_size_title_font_big'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'business_startup_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'text_size_title_font_big',
	array(
		'label'    => __( 'Font Size for Big Title', 'business-startup' ),
		'section'  => 'font_typo_section',
		'type'     => 'number',
		'priority' => 120,
		'input_attrs'     => array( 'min' => 1, 'max' => 100, 'style' => 'width: 150px;' ),
	)
);

// Setting - text_size_title_font_small.
$wp_customize->add_setting( 'text_size_title_font_small',
	array(
		'default'           => $default['text_size_title_font_small'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'business_startup_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'text_size_title_font_small',
	array(
		'label'    => __( 'Font Size for Small Title', 'business-startup' ),
		'section'  => 'font_typo_section',
		'type'     => 'number',
		'priority' => 125,
		'input_attrs'     => array( 'min' => 1, 'max' => 100, 'style' => 'width: 150px;' ),
	)
);

// Setting - text_size_p.
$wp_customize->add_setting( 'text_size_p',
	array(
		'default'           => $default['text_size_p'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'business_startup_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'text_size_p',
	array(
		'label'    => __( 'Font Size For Paragraph', 'business-startup' ),
		'section'  => 'font_typo_section',
		'type'     => 'number',
		'priority' => 140,
		'input_attrs'     => array( 'min' => 1, 'max' => 100, 'style' => 'width: 150px;' ),
	)
);

