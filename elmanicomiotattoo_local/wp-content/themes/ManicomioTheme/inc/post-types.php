<?php
/**
 * Custom Post Type Definitions for ManicomioTheme.
 *
 * @package ManicomioTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Registers the 'portafolio' custom post type.
 */
function manicomiotheme_register_cpt_portafolio() {
	$labels = array(
		'name'                  => _x( 'Portafolios', 'Post type general name', 'manicomiometheme' ),
		'singular_name'         => _x( 'Portafolio', 'Post type singular name', 'manicomiometheme' ),
		'menu_name'             => _x( 'Portafolios', 'Admin Menu text', 'manicomiometheme' ),
		'name_admin_bar'        => _x( 'Portafolio', 'Add New on Toolbar', 'manicomiometheme' ),
		'add_new'               => __( 'Añadir Nuevo', 'manicomiometheme' ),
		'add_new_item'          => __( 'Añadir Nuevo Trabajo', 'manicomiometheme' ),
		'new_item'              => __( 'Nuevo Trabajo', 'manicomiometheme' ),
		'edit_item'             => __( 'Editar Trabajo', 'manicomiometheme' ),
		'view_item'             => __( 'Ver Trabajo', 'manicomiometheme' ),
		'all_items'             => __( 'Todos los Trabajos', 'manicomiometheme' ),
		'search_items'          => __( 'Buscar Trabajos', 'manicomiometheme' ),
		'parent_item_colon'     => __( 'Trabajo Padre:', 'manicomiometheme' ),
		'not_found'             => __( 'No se encontraron trabajos.', 'manicomiometheme' ),
		'not_found_in_trash'    => __( 'No se encontraron trabajos en la papelera.', 'manicomiometheme' ),
		'featured_image'        => _x( 'Imagen del Trabajo', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'manicomiometheme' ),
		'set_featured_image'    => _x( 'Establecer imagen del trabajo', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'manicomiometheme' ),
		'remove_featured_image' => _x( 'Eliminar imagen del trabajo', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'manicomiometheme' ),
		'use_featured_image'    => _x( 'Usar como imagen del trabajo', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'manicomiometheme' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'portafolio' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 20, // Debajo de "Páginas".
		'menu_icon'          => 'dashicons-art',
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
		'show_in_rest'       => true, // Habilita el editor de bloques.
	);

	register_post_type( 'portafolio', $args );
}
add_action( 'init', 'manicomiotheme_register_cpt_portafolio' );