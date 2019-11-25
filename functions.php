<?php

function register_resources() {
	//register main menu
  	register_nav_menu('main-menu','Main Menu' );

  	//register slide
  	$args = array(
      'public' => true,
      'label'  => 'Slides'
    );
    register_post_type( 'slide', $args );

    //register feature
  	$args = array(
      'public' => true,
      'label'  => 'Features'
    );
    register_post_type( 'feature', $args );

    //register service
  	$args = array(
      'public' => true,
      'label'  => 'Services'
    );
    register_post_type( 'service', $args );

    //register service
    $args = array(
      'public' => true,
      'label'  => 'Staff Members'
    );
    register_post_type( 'staff', $args );


    //register project
  	$args = array(
      'public' => true,
      'label'  => 'Projects'
    );
    register_post_type( 'project', $args );


    //register taxonomy
    $args = array(
		'hierarchical'          => true,
		'labels'                => array(
			'name' => 'Filters',
			'singular_name' => 'Filter',
			'menu_name' => 'Filters'
		),
		'public' => true,
		'show_in_nav_menues' => true
	);

	register_taxonomy( 'filter', 'project', $args );

    
}

add_action( 'init', 'register_resources' );


//menu filters - who could've guessed ¯\_(ツ)_/¯
//filters are used to modified HTML output of WP

function add_class_to_li( $classes, $item, $args, $depth ) { 
	$classes[] = 'nav-item';
	return $classes;
}
add_filter( 'nav_menu_css_class', 'add_class_to_li', 10, 4 ); 


function add_class_to_anchors( $atts ) {
    $atts['class'] = 'nav-link';
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_class_to_anchors', 10 );

//theme customisation API
function mytheme_customize_register( $wp_customize ) {
  //All our sections, settings, and controls will be added here
  
  $wp_customize->add_section( 'settings' , array(
    'title'      => 'Settings',
    'priority'   => 30,
  ) );

  $wp_customize->add_section( 'color' , array(
    'title'      => 'Color',
    'priority'   => 30,
  ) );

  //heading color

  $wp_customize->add_setting( 'header_textcolour' , array(
    'default'     => '#000000',
    'transport'   => 'refresh',
  ) );

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_colour', array(
    'label'      => 'Heading Text Color',
    'section'    => 'settings',
    'settings'   => 'header_textcolour',
  ) ) );

  //navbar color

  $wp_customize->add_setting( 'navbar-color' , array(
    'default'     => '#000000',
    'transport'   => 'refresh',
  ) );

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_colour', array(
    'label'      => 'Navbar Color',
    'section'    => 'color',
    'settings'   => 'navbar-color',
  ) ) );

  //logo upload

  $wp_customize->add_setting( 'logo-setting' , array(
    'default'     => '',
    'transport'   => 'refresh',
  ) );

  $wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'logo',
        array(
            'label'      => 'Upload Logo',
            'section'    => 'settings',
            'settings'   => 'logo-setting',
            // 'context'    => 'your_setting_context'
        )
    )
);

}
add_action( 'customize_register', 'mytheme_customize_register' );

?>