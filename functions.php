<?php

 require_once get_template_directory() . '/inc/redux-options.php';
 require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
   
add_action('tgmpa_register', 'qwery_register_required_plugins');
function qwery_register_required_plugins() {
	$plugins = array(

		array(
			'name'               => 'Qwery Core Plugins', // The plugin name.
			'slug'               => 'qwery-core-plugin', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/plugins/qwery-core.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
		array(
			'name'               => 'Advanced Custom Fields', // The plugin name.
			'slug'               => 'advanced-custom-fields', // The plugin slug (typically the folder name).
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
		),
		array(
			'name'               => 'Redux Framework ', // The plugin name.
			'slug'               => 'redux-framework', // The plugin slug (typically the folder name).
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
		),

	);
	$config = array(
		'id'           => 'qwery',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

	);

	tgmpa( $plugins, $config );
}


function qwery_setup() {
	load_theme_textdomain( 'qwery', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	
	add_theme_support( 'title-tag' );
	
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'post-postformat', array(
		'video',
		'quote',
		'image',
		'gallery',

	) );
	add_post_type_support( 'car','post-postformat');
	
	register_nav_menus(
		array(
			'header_nav' => esc_html__( 'Header navigation', 'qwery' ),
			'footer_nav' => esc_html__( 'Footer navigation', 'qwery' ),
		)
	);
	add_action( 'after_setup_theme', 'register_nav_menus' );

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
add_action( 'after_setup_theme', 'qwery_setup' );


function qwery_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'qwery_content_width', 640 );
}
add_action( 'after_setup_theme', 'qwery_content_width', 0 );


function qwery_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'qwery' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'qwery' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'qwery_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function qwery_scripts() {
	wp_enqueue_style( 'qwery-font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css', array(), '1.0' );
	wp_enqueue_style( 'owl.carousel', get_template_directory_uri() . '/assets/js/lib/owlcarousel/assets/owl.carousel.min.css', array(), '1.0' );
	wp_enqueue_style( 'tempusdominus-bootstrap-4', get_template_directory_uri() . '/assets/js/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css', array(), '1.0' );
	wp_enqueue_style( 'qwery-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '1.0' );
	wp_enqueue_style( 'qwery-style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0' );

	wp_enqueue_style( 'qwery-fonts', qwery_fonts_url(), array(), '1.0' );

	 wp_enqueue_script( 'qwery-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array('jquery'), '1.0', true );


	wp_enqueue_script( 'bootstrap.bundle', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js', array('jquery'),'1.0', true );
	wp_enqueue_script( 'easing', get_template_directory_uri() . '/assets/js/lib/easing/easing.min.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/assets/js/lib/waypoints/waypoints.min.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'owl.carousel', get_template_directory_uri() . '/assets/js/lib/owlcarousel/owl.carousel.min.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'moment', get_template_directory_uri() . '/assets/js/lib/tempusdominus/js/moment.min.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'moment-timezone', get_template_directory_uri() . '/assets/js/lib/tempusdominus/js/moment-timezone.min.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'tempusdominus-bootstrap-4', get_template_directory_uri() . '/assets/js/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'qwery-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'qwery_scripts' );

// hoock that loads custom google-fonts. Turn on in enqueue_style a little higher
function qwery_fonts_url() {
	$fonts_url  ='';
	$fonts_families = array();
	$fonts_families[] = 'Oswald:wght@400;500;600;700';
	$fonts_families[] = 'Rubik';

	$query_args = array(
		'family' => urlencode(implode('|',$fonts_families )),
	);

	$fonts_url = add_query_arg($query_args, 'https://fonts.googleapis.com/css');
	return esc_url_raw($fonts_url);

}

function qwery_add_class_on_li ($classes, $item, $settings){
	if(isset($settings -> add_li_class)){
		$classes[] = $settings -> add_li_class;
	}
	return $classes;
}
add_filter ('nav_menu_css_class','qwery_add_class_on_li', 1, 3 );

add_action( 'tgmpa_register', 'qwery_register_required_plugins' );

function qwery_posts_per_page($query){
	if(!is_admin()){
		if(is_post_type_archive('car')){
			$query->set('posts_per_page', 3);
		}
	}
	
}
add_action('pre_get_posts', 'qwery_posts_per_page');
