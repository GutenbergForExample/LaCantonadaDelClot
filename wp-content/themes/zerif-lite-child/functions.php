<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array( 'zerif_bootstrap_style','zerif_fontawesome' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_separate', trailingslashit( get_stylesheet_directory_uri() ) . 'ctc-style.css', array( 'chld_thm_cfg_parent','zerif_style','zerif_responsive_style' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 20 );

// END ENQUEUE PARENT ACTION

/*******************************************/
/*************  Product list section  *************/
/*******************************************/
function rubaloo_customizer( $wp_customize ) {
        $wp_customize->add_panel( 'panel_productlist', array(
            'priority' => 32,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __( 'Product List Section', 'zerif-lite' )
        ));
        $wp_customize->add_section( 'zerif_productlist_section' , array(
            'title'       => __( 'Contenido', 'zerif-lite' ),
            'priority'    => 1,
            'panel'       => 'panel_productlist',
            'description' => __( 'El contenido principal de esta sección se puede personalizar desde el menú Personalizar -> Widgets. Allí podrá añadir cualquier widget.', 'zerif-lite' )
        ));
        /* show/hide */
        $wp_customize->add_setting( 'zerif_productlist_show', array('sanitize_callback' => 'rubaloo_sanitize_customizer'));
        $wp_customize->add_control(
            'zerif_productlist_show',
            array(
            'type' => 'checkbox',
            'label' => __('¿Ocultar Product List Section?','zerif-lite'),
            'section' => 'zerif_productlist_section',
            'priority'    => 1,
            )
        );
        /* new_section title */
        $wp_customize->add_setting( 'zerif_productlist_title', array('sanitize_callback' => 'rubaloo_sanitize_customizer','default' => __('Product List Section','zerif-lite')));
                
        $wp_customize->add_control( 'zerif_productlist_title', array(
            'label'    => __( 'Title', 'zerif-lite' ),
            'section'  => 'zerif_productlist_section',
            'settings' => 'zerif_productlist_title',
            'priority'    => 2,
        ));
        /* new_section subtitle */
        $wp_customize->add_setting( 'zerif_productlist_subtitle', array('sanitize_callback' => 'rubaloo_sanitize_customizer','default' => __('Escriba la descripción de esta sección aquí.','zerif-lite')));
        $wp_customize->add_control( 'zerif_productlist_subtitle', array(
            'label'    => __( 'Subtítulo de la Product List Section', 'zerif-lite' ),
            'section'  => 'zerif_productlist_section',
            'settings' => 'zerif_productlist_subtitle',
            'priority'    => 3,
        ));
    }
    
add_action( 'customize_register', 'rubaloo_customizer' );

function rubaloo_sanitize_customizer( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

function rubaloo_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}

function new_section_widgets() {
    register_sidebar( array(
        'name' => __( 'Barra lateral de Product List Section', 'zerif-lite' ),
        'id' => 'new-section-sidebar',
        'description' => __( 'Widgets para la Product List Section', 'zerif-lite' ),
        'before_widget' => '<div class="col-lg-3"><aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside></div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ) );
}

add_action( 'widgets_init', 'new_section_widgets' );

function zerif_productlist_header_title_function() {
    $zerif_productlist_title_default = get_theme_mod( 'zerif_productlist_title' );
    if( ! empty ( $zerif_productlist_title_default ) ) {
        $zerif_productlist_title = get_theme_mod( 'zerif_productlist_title_2', $zerif_productlist_title_default );
    } elseif ( current_user_can( 'edit_theme_options' ) ) {
        $zerif_productlist_title = get_theme_mod ( 'zerif_productlist_title_2', sprintf( '<a href="%1$s" class="zerif-default-links">%2$s</a>', esc_url( admin_url( 'customize.php?autofocus&#91;control&#93;=zerif_productlist_title' ) ), __( 'Product List Section','zerif-lite' ) ) );
    } else {
        $zerif_productlist_title = get_theme_mod ( 'zerif_productlist_title_2' );
    }
    if( !empty($zerif_productlist_title) ):
        echo '<h2 class="dark-text">'.wp_kses_post( $zerif_productlist_title ).'</h2>';
    elseif ( is_customize_preview() ):
        echo '<h2 class="dark-text zerif_hidden_if_not_customizer"></h2>';
    endif;
}

function zerif_productlist_header_subtitle_function() {
    if ( current_user_can( 'edit_theme_options' ) ) {
        $zerif_productlist_subtitle = get_theme_mod( 'zerif_productlist_subtitle', sprintf( __( 'Change this subtitle in %s','zerif-lite' ), sprintf( '<a href="%1$s" class="zerif-default-links">%2$s</a>', esc_url( admin_url( 'customize.php?autofocus&#91;control&#93;=zerif_productlist_subtitle' ) ), __( 'Sección Nueva','zerif-lite' ) ) ) );
    } else {
        $zerif_productlist_subtitle = get_theme_mod( 'zerif_productlist_subtitle' );
    }
    if( !empty($zerif_productlist_subtitle) ):
        echo '<div class="section-legend">'.wp_kses_post( $zerif_productlist_subtitle ).'</div>';
    elseif ( is_customize_preview() ):
        echo '<div class="section-legend zerif_hidden_if_not_customizer"></div>';
    endif;
}

add_action( 'zerif_productlist_header_title', 'zerif_productlist_header_title_function' );
add_action( 'zerif_productlist_header_subtitle', 'zerif_productlist_header_subtitle_function' );
    
function zerif_productlist_header_title_trigger() {
    do_action( 'zerif_productlist_header_title' );
}

function zerif_productlist_header_subtitle_trigger() {
    do_action( 'zerif_productlist_header_subtitle' );
}

