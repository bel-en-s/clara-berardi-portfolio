<?php
/**
 * Clara Berardi — Creative Lead
 *
 * Theme functions and registrations.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'CB_THEME_VERSION', '1.0.0' );

/**
 * Theme supports & menus.
 */
function cb_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'clara-berardi' ),
		)
	);
}
add_action( 'after_setup_theme', 'cb_setup' );

/**
 * Register the Project custom post type + Project Type taxonomy.
 */
function cb_register_types() {

	register_post_type(
		'project',
		array(
			'labels'       => array(
				'name'          => __( 'Projects', 'clara-berardi' ),
				'singular_name' => __( 'Project', 'clara-berardi' ),
				'add_new'       => __( 'Add New', 'clara-berardi' ),
				'add_new_item'  => __( 'Add New Project', 'clara-berardi' ),
				'edit_item'     => __( 'Edit Project', 'clara-berardi' ),
				'new_item'      => __( 'New Project', 'clara-berardi' ),
				'view_item'     => __( 'View Project', 'clara-berardi' ),
				'search_items'  => __( 'Search Projects', 'clara-berardi' ),
				'not_found'     => __( 'No projects found.', 'clara-berardi' ),
			),
			'public'       => true,
			'has_archive'  => true,
			'rewrite'      => array( 'slug' => 'work' ),
			'menu_icon'    => 'dashicons-portfolio',
			'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			'taxonomies'   => array( 'post_tag' ),
			'show_in_rest' => true,
		)
	);

	register_taxonomy(
		'project_type',
		'project',
		array(
			'labels'       => array(
				'name'          => __( 'Project Types', 'clara-berardi' ),
				'singular_name' => __( 'Project Type', 'clara-berardi' ),
				'add_new_item'  => __( 'Add New Project Type', 'clara-berardi' ),
				'edit_item'     => __( 'Edit Project Type', 'clara-berardi' ),
			),
			'public'       => true,
			'hierarchical' => true,
			'rewrite'      => array( 'slug' => 'project-type' ),
			'show_in_rest' => true,
		)
	);
}
add_action( 'init', 'cb_register_types' );

/**
 * Enqueue fonts, styles and scripts.
 */
function cb_assets() {
	wp_enqueue_style(
		'cb-fonts',
		'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'cb-main',
		get_template_directory_uri() . '/assets/css/main.css',
		array(),
		CB_THEME_VERSION
	);

	wp_enqueue_script(
		'cb-main',
		get_template_directory_uri() . '/assets/js/main.js',
		array(),
		CB_THEME_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'cb_assets' );

/**
 * ACF JSON: load field groups bundled with the theme.
 */
function cb_acf_json_load_point( $paths ) {
	$paths[] = get_stylesheet_directory() . '/acf-json';
	return $paths;
}
add_filter( 'acf/settings/load_json', 'cb_acf_json_load_point' );

function cb_acf_json_save_point( $path ) {
	return get_stylesheet_directory() . '/acf-json';
}
add_filter( 'acf/settings/save_json', 'cb_acf_json_save_point' );

/**
 * Fallback menu used before the user assigns a menu to the "Primary Menu" location.
 */
function cb_default_menu() {
	$items = array(
		__( 'Work', 'clara-berardi' )    => get_post_type_archive_link( 'project' ),
		__( 'Studio', 'clara-berardi' )  => home_url( '/studio/' ),
		__( 'Contact', 'clara-berardi' ) => home_url( '/contact/' ),
	);

	foreach ( $items as $label => $url ) {
		if ( $url ) {
			echo '<div class="navbar-item"><a href="' . esc_url( $url ) . '">' . esc_html( $label ) . '</a></div>';
		}
	}
}

/**
 * Human-readable labels for project types.
 */
function cb_project_type_labels() {
	return array(
		'production' => __( 'Production', 'clara-berardi' ),
		'identity'   => __( 'Brand Identity', 'clara-berardi' ),
		'curation'   => __( 'Curation', 'clara-berardi' ),
	);
}

function cb_project_type_label( $slug ) {
	$labels = cb_project_type_labels();
	return isset( $labels[ $slug ] ) ? $labels[ $slug ] : $slug;
}

/**
 * Build the list of project type terms used for the filter bar.
 * Ensures the three canonical types always exist.
 */
function cb_ensure_project_type_terms() {
	if ( ! taxonomy_exists( 'project_type' ) ) {
		return;
	}

	foreach ( cb_project_type_labels() as $slug => $label ) {
		if ( ! term_exists( $slug, 'project_type' ) ) {
			wp_insert_term( $label, 'project_type', array( 'slug' => $slug ) );
		}
	}
}
add_action( 'init', 'cb_ensure_project_type_terms', 20 );
