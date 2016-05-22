<?php
/*
register customization options for instafolio.
*/
function olawale_instagrid_customize_register($wp_customize)
{
    $wp_customize->add_section('olawale-instagrid', array(
        'title' => 'InstaFolio',
        'priority' => 1
    ));
	$wp_customize->add_setting('olawale-instagrid-bg-color', array(
        'capability' => 'edit_theme_options',
        'default' => '#f6f6f6',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'olawale-instagrid-bg-color', array(
        'label' => 'Background Color',
        'section' => 'olawale-instagrid',
        'settings' => 'olawale-instagrid-bg-color'
    )));
	$wp_customize->add_setting('olawale-instagrid-menu-color', array(
        'capability' => 'edit_theme_options',
        'default' => '#fff',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'olawale-instagrid-menu-color', array(
        'label' => 'Menu Text Color',
        'section' => 'olawale-instagrid',
        'settings' => 'olawale-instagrid-menu-color'
    )));
	$wp_customize->add_setting('olawale-instagrid-page-title-color', array(
        'capability' => 'edit_theme_options',
        'default' => '#fff',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'olawale-instagrid-page-title-color', array(
        'label' => 'Page Title Color',
        'section' => 'olawale-instagrid',
        'settings' => 'olawale-instagrid-page-title-color'
    )));
	$wp_customize->add_setting('olawale-instagrid-page-title-border-color', array(
        'capability' => 'edit_theme_options',
        'default' => '#CFCFCF',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'olawale-instagrid-page-title-border-color', array(
        'label' => 'Page Title Border Color',
        'section' => 'olawale-instagrid',
        'settings' => 'olawale-instagrid-page-title-border-color'
    )));
	$wp_customize->add_setting('olawale-instagrid-page-content-color', array(
        'capability' => 'edit_theme_options',
        'default' => '#DDDDDD',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'olawale-instagrid-page-content-color', array(
        'label' => 'Page Content Color',
        'section' => 'olawale-instagrid',
        'settings' => 'olawale-instagrid-page-content-color'
    )));
	$wp_customize->add_setting('olawale-instagrid-username-color', array(
        'capability' => 'edit_theme_options',
        'default' => '#fff',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'olawale-instagrid-username-color', array(
        'label' => 'Username Text Color',
        'section' => 'olawale-instagrid',
        'settings' => 'olawale-instagrid-username-color'
    )));
	$wp_customize->add_setting('olawale-instagrid-bio-color', array(
        'capability' => 'edit_theme_options',
        'default' => '#666',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'olawale-instagrid-bio-color', array(
        'label' => 'Bio Text Color',
        'section' => 'olawale-instagrid',
        'settings' => 'olawale-instagrid-bio-color'
    )));
	$wp_customize->add_setting('olawale-instagrid-counts-color', array(
        'capability' => 'edit_theme_options',
        'default' => '#fff',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'olawale-instagrid-counts-color', array(
        'label' => 'Counts Text Color',
        'section' => 'olawale-instagrid',
        'settings' => 'olawale-instagrid-counts-color'
    )));
	$wp_customize->add_setting('olawale-instagrid-profile-bg-color', array(
        'capability' => 'edit_theme_options',
        'default' => '#151515',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'olawale-instagrid-profile-bg-color', array(
        'label' => 'Profile Background Color',
        'section' => 'olawale-instagrid',
        'settings' => 'olawale-instagrid-profile-bg-color'
    )));
	$wp_customize->add_setting('olawale-instagrid-hover-bg-color', array(
        'capability' => 'edit_theme_options',
        'default' => '#fff',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'olawale-instagrid-hover-bg-color', array(
        'label' => 'Hover Background Color',
        'section' => 'olawale-instagrid',
        'settings' => 'olawale-instagrid-hover-bg-color'
    )));
	$wp_customize->add_setting('olawale-instagrid-hover-text-color', array(
        'capability' => 'edit_theme_options',
        'default' => '#808080',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'olawale-instagrid-hover-text-color', array(
        'label' => 'Hover Caption Text Color',
        'section' => 'olawale-instagrid',
        'settings' => 'olawale-instagrid-hover-text-color'
    )));
	$wp_customize->add_setting('olawale-instagrid-load-more-bg', array(
        'capability' => 'edit_theme_options',
        'default' => '#fff',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'olawale-instagrid-load-more-bg', array(
        'label' => 'Load More Background Color',
        'section' => 'olawale-instagrid',
        'settings' => 'olawale-instagrid-load-more-bg'
    )));
	$wp_customize->add_setting('olawale-instagrid-load-more-color', array(
        'capability' => 'edit_theme_options',
        'default' => '#000',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'olawale-instagrid-load-more-color', array(
        'label' => 'Load More Text Color',
        'section' => 'olawale-instagrid',
        'settings' => 'olawale-instagrid-load-more-color'
    )));
	$wp_customize->add_setting('olawale-instagrid-load-more-border-color', array(
        'capability' => 'edit_theme_options',
        'default' => '#DCDCDC',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'olawale-instagrid-load-more-border-color', array(
        'label' => 'Load More Border Color',
        'section' => 'olawale-instagrid',
        'settings' => 'olawale-instagrid-load-more-border-color'
    )));
	$wp_customize->add_setting('olawale-instagrid-footer-bg', array(
        'capability' => 'edit_theme_options',
        'default' => '#fff',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'olawale-instagrid-footer-bg', array(
        'label' => 'Footer Background Color',
        'section' => 'olawale-instagrid',
        'settings' => 'olawale-instagrid-footer-bg'
    )));
	$wp_customize->add_setting('olawale-instagrid-widget-title-color', array(
        'capability' => 'edit_theme_options',
        'default' => '#000',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'olawale-instagrid-widget-title-color', array(
        'label' => 'Widget Title Color',
        'section' => 'olawale-instagrid',
        'settings' => 'olawale-instagrid-widget-title-color'
    )));
	
}

add_action('customize_register', 'olawale_instagrid_customize_register');