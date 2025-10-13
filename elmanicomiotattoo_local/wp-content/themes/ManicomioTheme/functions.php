<?php
/**
 * ManicomioTheme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ManicomioTheme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function manicomiometheme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on ManicomioTheme, use a find and replace
		* to change 'manicomiometheme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'manicomiometheme', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'manicomiometheme' ),
			'footer' => esc_html__( 'Footer Menu', 'manicomiometheme' ),
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
			'manicomiometheme_custom_background_args',
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
add_action( 'after_setup_theme', 'manicomiometheme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function manicomiometheme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'manicomiometheme_content_width', 640 );
}
add_action( 'after_setup_theme', 'manicomiometheme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function manicomiometheme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'manicomiometheme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'manicomiometheme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 1', 'manicomiometheme' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'manicomiometheme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 2', 'manicomiometheme' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'manicomiometheme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'manicomiometheme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function manicomiometheme_scripts() {
	// Carga de Google Fonts.
	wp_enqueue_style( 'manicomiometheme-google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600&family=Roboto+Slab:wght@400&display=swap', array(), null );

	// Carga de la hoja de estilos principal del tema.
	wp_enqueue_style( 'manicomiotheme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'manicomiometheme-style', 'rtl', 'replace' );

	// Carga del script de navegación.
	wp_enqueue_script( 'manicomiometheme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	// Carga del script del carrusel.
	wp_enqueue_script( 'manicomiometheme-carousel', get_template_directory_uri() . '/js/carousel.js', array(), _S_VERSION, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'manicomiometheme_scripts' );

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

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Custom Post Type definitions.
 */
require get_template_directory() . '/inc/post-types.php';

function cargar_font_awesome_para_redes_sociales() {
    // Carga la versión gratuita de Font Awesome 5 (o 6, si la prefieres) desde un CDN
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css', array(), '5.15.4' );
}
add_action( 'wp_enqueue_scripts', 'cargar_font_awesome_para_redes_sociales' );

// --- Panel de Opciones del Tema ---

// 1. Crear la página de opciones en el menú de administración.
function manicomiortheme_add_admin_menu() {
    add_menu_page(
        'Opciones de ManicomioTheme', // Título de la página
        'ManicomioTheme',            // Título del menú
        'manage_options',            // Capacidad requerida
        'manicomiortheme_options',   // Slug del menú
        'manicomiortheme_options_page_html', // Función que renderiza la página
        'dashicons-admin-customizer', // Icono
        60                           // Posición
    );
}
add_action('admin_menu', 'manicomiortheme_add_admin_menu');

// 2. Registrar los ajustes del tema.
function manicomiortheme_settings_init() {
    // Registrar un grupo de ajustes
    register_setting('manicomiortheme_options_group', 'manicomiortheme_options');

    // Añadir una sección para los ajustes del carrusel
    add_settings_section(
        'manicomiortheme_carousel_section',
        'Ajustes del Carrusel',
        null, // Callback para la descripción de la sección (opcional)
        'manicomiortheme_options_page'
    );

    // Añadir el campo para habilitar/deshabilitar el carrusel
    add_settings_field(
        'carousel_enabled',
        'Activar Carrusel en Páginas',
        'manicomiortheme_carousel_enabled_callback',
        'manicomiortheme_options_page',
        'manicomiortheme_carousel_section'
    );

    // Añadir el campo para el número de imágenes
    add_settings_field(
        'carousel_image_count',
        'Número de Imágenes en el Carrusel',
        'manicomiortheme_carousel_image_count_callback',
        'manicomiortheme_options_page',
        'manicomiortheme_carousel_section'
    );
}
add_action('admin_init', 'manicomiortheme_settings_init');

// 3. Callbacks para renderizar los campos del formulario.

function manicomiortheme_carousel_enabled_callback() {
    $options = get_option('manicomiortheme_options');
    $checked = isset($options['carousel_enabled']) ? 'checked="checked"' : '';
    echo '<input type="checkbox" id="carousel_enabled" name="manicomiortheme_options[carousel_enabled]" value="1" ' . $checked . ' />';
}

function manicomiortheme_carousel_image_count_callback() {
    $options = get_option('manicomiortheme_options');
    $value = isset($options['carousel_image_count']) ? $options['carousel_image_count'] : 5;
    echo '<input type="number" id="carousel_image_count" name="manicomiortheme_options[carousel_image_count]" value="' . esc_attr($value) . '" min="1" max="10" />';
}

// 4. Función para renderizar la página de opciones.
function manicomiortheme_options_page_html() {
    if (!current_user_can('manage_options')) {
        return;
    }
    ?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <form action="options.php" method="post">
            <?php
            settings_fields('manicomiortheme_options_group');
            do_settings_sections('manicomiortheme_options_page');
            submit_button('Guardar Cambios');
            ?>
        </form>
    </div>
    <?php
}
