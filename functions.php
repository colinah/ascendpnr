<?php
/**
 * Ascend Performance and Rehab functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Ascend_Performance_and_Rehab
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'ascend_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ascend_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Ascend Performance and Rehab, use a find and replace
		 * to change 'ascend' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ascend', get_template_directory() . '/languages' );

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
		// Image Sizes
		add_image_size('banner', 1900, 600 ,true);
		add_image_size('post-thumbnail-large', 1280, 720 ,true);
		add_image_size('post-thumbnail-medium', 640, 360 ,true);
		add_image_size('post-thumbnail-small', 320, 180 ,true);


		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'ascend' ),
			)
		);

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

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'ascend_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'ascend_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ascend_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'ascend_content_width', 640 );
}
add_action( 'after_setup_theme', 'ascend_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ascend_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'ascend' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'ascend' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'ascend' ),
			'id'            => 'footer',
			'description'   => esc_html__( 'Add widgets here.', 'ascend' ),
			'before_widget' => '<section id="%1$s" class="footer-widget f-%2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="footer-widget__title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Newsletter', 'ascend' ),
			'id'            => 'newsletter',
			'description'   => esc_html__( 'Add widgets here.', 'ascend' ),
			'before_widget' => '<div id="%1$s" class="signup-form_%2$s">',
			'after_widget'  => '</div>'
		)
	);
}
add_action( 'widgets_init', 'ascend_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ascend_scripts() {
	wp_enqueue_style( 'ascend-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'ascend-style', 'rtl', 'replace' );

	//wp_enqueue_script( 'ascend-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ascend_scripts' );

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

/*
This is taken directly from here and modified to fit our needs: https://developer.wordpress.org/themes/basics/including-css-javascript/
*/
function add_type_attribute($tag, $handle, $src) {
    // if not your script, do nothing and return original $tag
    if ( 'enqueue-that-js' !== $handle ) {
        return $tag;
    }
    // change the script tag by adding type="module" and return it.
    $tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';
    return $tag;
}

function add_that_css_and_js() {
 
	wp_enqueue_style( 'enqueue-that-css', get_template_directory_uri() . '/css/main.css', array(), '1.0', 'all');
   
	wp_enqueue_script( 'enqueue-that-js', get_template_directory_uri() . '/js/bundle.js', array ( 'jquery' ), 1.0, true);
  
}
  add_action( 'wp_enqueue_scripts', 'add_that_css_and_js' );

  add_filter( 'script_loader_tag', 'add_id_to_script', 10, 3 );
 
  function add_id_to_script( $tag, $handle, $src ) {
	  if ( 'enqueue-that-js' === $handle ) {
		  $tag = '<script type="module" src="' . esc_url( $src ) . '" id="dropboxjs" data-app-key="MY_APP_KEY"></script>';
	  }
   
	  return $tag;
  }

  add_action('init', function(){
	register_post_type('Services', [
		'public' => true,
		'label' => 'Services',
		'has_archive' => false,
		'menu_icon'   => 'dashicons-products',
	]);
});

add_action('init', function(){
	register_post_type('Front-Page', [
		'public' => true,
		'label' => 'Front-Page',
		'has_archive' => false,
		'menu_icon'   => 'dashicons-edit-large',
	]);
});

  function postPackages() {
	  ?>
            <article class="post-package">
                <div class="package-icons">
                        <?php
                            if(has_category('rehab')){
                                ?>
                                    <div class="package-icon">
										<a href="<?php echo get_category_link(4); ?>">	
											<img class="image-no__darken" src="<?php echo wp_get_attachment_image_src( 45 )[0]; ?>" >
										</a>
                                    </div>
                                <?php
                            }
                        ?>
                        <?php
                            if(has_category('strength-and-conditioning')){
                                ?>
                                    <div class="package-icon">
										<a href="<? echo get_category_link(3); ?>">
											<img class="image-no__darken" src="<?php echo wp_get_attachment_image_src( 46 )[0]; ?>" >
										</a>
                                    </div>
                                <?php
                            }
                        ?>
						                        <?php
                            if(has_category('spine')){
                                ?>
                                    <div class="package-icon">
										<a href="<?php echo get_category_link(27); ?>">
											<img class="image-no__darken" src="<?php echo wp_get_attachment_image_src( 73 )[0]; ?>" >
										</a>
                                    </div>
                                <?php
                            }
                        ?>
						                        <?php
                            if(has_category('upper-extremities')){
                                ?>
                                    <div class="package-icon">
										<a href="<?php echo get_category_link(30); ?>">
											<img class="image-no__darken" src="<?php echo wp_get_attachment_image_src( 71 )[0]; ?>" >
										</a>
                                    </div>
                                <?php
                            }
                        ?>
						                        <?php
                            if(has_category('lower-extremities')){
                                ?>
                                    <div class="package-icon">
										<a href="<? echo get_category_link(31); ?>">
											<img class="image-no__darken" src="<?php echo wp_get_attachment_image_src( 72 )[0]; ?>" >
										</a>
                                    </div>
                                <?php
                            }
                        ?>
				</div> <!-- package-icons -->
				
				<a href="<?php echo get_post_permalink(); ?>">
                    <div class="package-image__wrapper">
						<img class="package-image image-darken" 
							src="<?php the_post_thumbnail_url('post-thumbnail-medium') ?>">
                    </div>
                    <div class="package-title__wrapper">
                    <?php
                        ?>
                        <h2 class="package-title"><?php the_title();?></h2>
                    </div>
				</a>
				</article>

            
    <?php
  }

  function servicesPackage ($postNumberOnPage) {
	$image = get_field('services-image');
	$excerpt = get_field('services_excerpt');

	  ?>
                    <div class="services <?php if($postNumberOnPage % 2 == 0){ echo "services-reverse";}; ?>">
                        <div class='services-image-wrapper'>
                            <div class="services-image image-darken" style="background-image:url(<?php echo $image['url'];?>); background-repeat: no-repeat; background-position: center; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;"></div>
                            <div class="services-image__cover"></div>
                         </div>
                        <div class="services-content">
                            <div>
                            <h2 class="services-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p><?php echo $excerpt ?></p>
							</div>
							<button class="services-button"><a href="<?php echo get_permalink( get_page_by_path( 'contact' ) ); ?>">Contact Me</a></button>
                        </div>
                    </div> <!-- /.services-->
	  <?php
  }

  function frontPackage ($postNumberOnPage) {
	$imageID = get_field('front_page_image');
	$image = wp_get_attachment_image_src($imageID, 'large')[0];
	  ?>
                    <div class="front <?php if($postNumberOnPage % 2 == 0){ echo "front-reverse";}; ?>">
                        <div class='front-image-wrapper'>
                            <div class="front-image image-darken" style="background-image:url(<?php echo $image;?>); background-repeat: no-repeat; background-position: center; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;"></div>
                         </div>
                        <div class="front-content">
                            <h2 class="front-title"><?php the_title(); ?></h2>
                            <?php the_content(); ?>
                        </div>
                    </div> <!-- /.front-->
	  <?php
  }


  add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');
  add_action('wp_ajax_load_more_posts', 'load_more_posts');

  function load_more_posts() {
	  $next_page = $_POST['current_page'] + 1;
	  $query = new WP_Query([
		  'posts_per_page' => 6,
		  'paged' => $next_page
	  ]);
	  
	  if ($query -> have_posts()) :

		ob_start();

	while ($query->have_posts()) : $query->the_post();

		postPackages();

	  endwhile;

	wp_send_json_success(ob_get_clean());

	else :

		wp_send_json_error("No more posts.");
	
	endif;

  }

  ?>