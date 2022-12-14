<?php
/**
 * underscore functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package underscore
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

function under_setup() {

        /*
        * Let WordPress manage the document title.
        * By adding theme support, we declare that this theme does not use a
        * hard-coded <title> tag in the document head, and expect WordPress to
        * provide it for us.
        */
	add_theme_support( 'title-tag' );

    	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);



    

}

add_action( 'after_setup_theme', 'under_setup' );

/**
 * Enqueue scripts and styles.
 */
function under_scripts() {
	// wp_enqueue_style( 'under-style', 
	// 				get_stylesheet_uri(), 
	// 				array(), 
	// 				_S_VERSION );

	wp_enqueue_style('under-style', 
					get_template_directory_uri() . '/style.css', 
					array(), 
					filemtime(get_template_directory() . '/style.css'), 
					false);
}
add_action( 'wp_enqueue_scripts', 'under_scripts' );

function mon_31w_register_nav_menu(){
	register_nav_menus( array(
		'menu_primaire' => __( 'Menu primaire', 'text_domain' ),
	) );
}
add_action( 'after_setup_theme', 'mon_31w_register_nav_menu', 0 );

/************ pour filtrer chacun des elements du menu */
function igc31w_filtre_choix_menu($obj_menu, $arg){
    //var_dump($obj_menu);
    foreach($obj_menu as $cle => $value) {
		if ($arg->menu == "aside"){
			// print_r($value);
			$value->title = substr($value->title,7);

			$arrayValue = explode(" ", $value->title);

			array_splice($arrayValue, -1);

			$value->title = implode(" ", $arrayValue);

			// echo $value->title . '<br>';
		}
		$value->title = wp_trim_words($value->title,3,"...");
			
    }
    return $obj_menu;
}
add_filter("wp_nav_menu_objects","igc31w_filtre_choix_menu", 10, 2);

/** Initiation des sidebars */

add_action( 'widgets_init', 'my_register_sidebars' );
function my_register_sidebars() {
	/* Register de 'footer-01' sidebar. */
	register_sidebar(
		array(
			'id'            => 'footer-01',
			'name'          => __( 'Sidebar - footer-01' ),
			'description'   => __( 'Premier sidebar du footer.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
			)
		);
			
	/* Register de 'footer-02' sidebar. */
	register_sidebar(
		array(
			'id'            => 'footer-02',
			'name'          => __( 'Sidebar - footer-02' ),
			'description'   => __( 'Deuxieme sidebar du footer.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	/* Register de 'footer-03' sidebar. */
	register_sidebar(
		array(
			'id'            => 'footer-03',
			'name'          => __( 'Sidebar - footer-03' ),
			'description'   => __( 'Troisieme sidebar du footer.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	/* Register de 'footer-04' sidebar. */
	register_sidebar(
		array(
			'id'            => 'footer-04',
			'name'          => __( 'Sidebar - footer-04' ),
			'description'   => __( 'Quatrieme sidebar du footer.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
		
	/* Register de 'aside-01' sidebar. */
	register_sidebar(
		array(
			'id'            => 'aside-01',
			'name'          => __( 'Sidebar - aside-01' ),
			'description'   => __( 'Premier sidebar du aside' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
		
	/* Register de 'aside-02' sidebar. */
	register_sidebar(
		array(
			'id'            => 'aside-02',
			'name'          => __( 'Sidebar - aside-02' ),
			'description'   => __( 'deuxieme sidebar du aside' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);


	/* Repeat register_sidebar() code for additional sidebars. */
}