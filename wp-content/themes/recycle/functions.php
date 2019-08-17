<?php
/**
 * recycle functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package recycle
 */

if ( ! function_exists( 'recycle_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function recycle_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on recycle, use a find and replace
		 * to change 'recycle' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'recycle', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'recycle_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'recycle_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function recycle_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'recycle_content_width', 640 );
}
add_action( 'after_setup_theme', 'recycle_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function recycle_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'recycle' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'recycle' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'recycle_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function recycle_scripts() {
	wp_enqueue_style( 'recycle-style', get_stylesheet_uri() );

	wp_enqueue_script( 'recycle-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'recycle-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'recycle_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



// *** Add function ***

// *** Add show admin bar ***
add_filter('show_admin_bar', '__return_false');

/**
 * Enqueue scripts and styles.
 */
define('Q_THEME_ROOT', get_template_directory_uri());
define('Q_CSS_DIR', Q_THEME_ROOT . '/css');
define('Q_JS_DIR', Q_THEME_ROOT . '/js');
define('Q_IMG_DIR', Q_THEME_ROOT . '/img');
define('Q_SLICK_DIR', Q_THEME_ROOT . '/slick');

add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_style( 'bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css', array('reset'));
    wp_enqueue_style( 'awesome', 'https://use.fontawesome.com/releases/v5.5.0/css/all.css');
    wp_enqueue_style( 'googlfonts', "https://fonts.googleapis.com/css?family=Roboto+Mono:300,400,500,700&display=swap&subset=cyrillic,cyrillic-ext");
    wp_enqueue_style( 'googlfonts1', "https://fonts.googleapis.com/css?family=Ramabhadra&display=swap");
    wp_enqueue_style( 'googlfonts2', "fonts.googleapis.com/css?family=Roboto+Mono:300,400,500,700&display=swap\" rel=\"stylesheet");
    wp_enqueue_style( 'reset', Q_CSS_DIR . '/reset.min.css');
    wp_enqueue_style( 'exam-style', get_stylesheet_uri(), array('reset'));
    wp_enqueue_style( 'index', Q_CSS_DIR . '/index.min.css', array('reset'));
    wp_enqueue_style( 'slick', Q_SLICK_DIR . '/slick.css', array('reset'));
    wp_enqueue_style( 'slick-theme', Q_SLICK_DIR . '/slick-theme.css', array('reset'));

//    wp_enqueue_script( 'customize', Q_JS_DIR . '/customizer.min.js', array('jquery'));
    wp_enqueue_script( 'exam-navigation', Q_JS_DIR . '/navigation.min.js', array('jquery'));
    wp_enqueue_script( 'exam-skip-link-focus-fix', Q_JS_DIR . '/skip-link-focus-fix.min.js', array('jquery'));





    wp_deregister_script('jquery');
    wp_enqueue_script( 'jquery', Q_JS_DIR . '/jquery-3.1.1.min.js', array(), NULL, 'in_footer');
    wp_enqueue_script( 'slick', Q_SLICK_DIR. '/slick.min.js', array('jquery'), NULL, 'in_footer');
    wp_enqueue_script( 'imagesloaded', Q_JS_DIR . '/imagesloaded.pkgd.min.js', array('jquery'), NULL, 'in_footer');
    wp_enqueue_script( 'bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js', array('jquery'), NULL, 'in_footer');


    wp_enqueue_script( 'masonry-js', 'https://npmcdn.com/masonry-layout@4.0/dist/masonry.pkgd.min.js', array('jquery'), NULL, 'in_footer');
    wp_enqueue_script( 'popper-js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js', array('jquery'), NULL, 'in_footer');
    wp_enqueue_script( 'functions', Q_JS_DIR . '/functions.min.js', array('jquery'), NULL, 'in_footer');

    //        wp_enqueue_style( 'theme', get_stylesheet_uri() );
    //        wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );
});



// Register Navigation Menus
function recycle_nav_menu() {

    $locations = array(
        'Primary' => __( 'Header Menu', 'recycle' ),
    );
    register_nav_menus( $locations );

}
add_action( 'init', 'recycle_nav_menu' );



// *** Add menus ***

add_theme_support('menus');

// *** Add create_post_type ***

function create_post_type() {


    register_post_type( 'acme_product',
        array(
            'labels' => array(
                'name' => __( 'Products' ),
                'singular_name' => __( 'Product' )
            ),
            'public' => true,
            'has_archive' => true,
        )
    );


}


add_action( 'init', function(){
    add_theme_support('post-thumbnails');

    //posts type - "gallery"

    register_post_type('gallery', array(
        'label'  => null,
        'labels' => array(
            'name'               => 'gallery',
            'singular_name'      => 'gallery',
            'add_new'            => 'Add new gallery',
            'add_new_item'       => 'Add new gallery',
            'edit_item'          => 'Edit item gallery',
            'new_item'           => 'New gallery',
            'view_item'          => 'View gallery',
            'search_items'       => 'Search gallery',
            'not_found'          => 'Not found gallery',
            'not_found_in_trash' => 'Not found in trash gallery',
            'menu_name'          => 'Gallery',
        ),
        'public'              => false,
        'show_ui'             => true, // зависит от public
        'show_in_menu'        => null, // показывать ли в меню адмнки
        'menu_icon'           => 'dashicons-cloud',
        'supports'            => array('title', 'editor', 'thumbnail') // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
    ) );

    register_post_type('locations', array(
        'label'  => null,
        'labels' => array(
            'name'               => 'locations',
            'singular_name'      => 'location',
            'add_new'            => 'Add new location',
            'add_new_item'       => 'Add new location',
            'edit_item'          => 'Edit item location',
            'new_item'           => 'New location',
            'view_item'          => 'View location',
            'search_items'       => 'Search locations',
            'not_found'          => 'Not found location',
            'not_found_in_trash' => 'Not found in trash locations',
            'menu_name'          => 'Locations',
        ),
        'public'              => false,
        'show_ui'             => true, // зависит от public
        'show_in_menu'        => null, // показывать ли в меню адмнки
        'menu_icon'           => 'dashicons-cloud',
        'supports'            => array('title', 'editor', 'thumbnail') // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
    ) );
});

if ( isset( $_POST['submit']  ) ) {

    if (trim($_POST['location']) === '') {
        $hasError = true;
    }

    $post_information = array(
        'post_title' => wp_strip_all_tags($_POST['location']),
        'post_content' => $_POST['message'],
        'post_type' => 'locations',
        'post_status' => 'pending'
    );

    $post_id = wp_insert_post($post_information);

    update_field("field_5ce9b9cf460fb", $_POST['name'], $post_id);
    update_field("field_5ce9ba00460fc", $_POST['email'], $post_id);
    update_field("field_5ce9ba0c460fd", $_POST['location'], $post_id);

    if ($post_id) {
        wp_redirect(home_url());
        exit;
    }
}

function my_acf_google_map_api( $api ){

    $api['key'] = 'AIzaSyCMzMGhRkitkgv72VxQb-4nbeCx4mPbwn0';

    return $api;

}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

function recycle_add_marker_loop()
{
    $args = array(
        'post_type' => 'locations',
        'posts_per_page' => -1,
    );
    $the_query = new WP_Query($args);
    echo "<div class='map-container'><div class='wrap'><div class='acf-map'>";
    while ($the_query->have_posts()) : $the_query->the_post();
        $location = get_field('map');
        if (!empty($location)) {
            ?>
            <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
                <h4><?php echo $location['address']; ?></h4>
                <p class="address"> <?php the_content() ?></p>
            </div>
            <?php
        }
    endwhile;
    echo '</div></div></div>';
    wp_reset_postdata();
}

?>