<?php
define('URL_VERIFICA_COPERTURA','https://www.terrecablate.it/copertura');

add_image_size( 'news-thumb', 800, 450, true );

add_filter( 'image_size_names_choose', 'scc_custom_image_sizes' );

function scc_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'news-thumb' => __( 'News Thumbnail' ),
    ) );
}


function filter_site_upload_size_limit( $size ) {
  $size = 1024 * 1024 * 16; // 16 MB
  return $size;
}
add_filter( 'upload_size_limit', 'filter_site_upload_size_limit', 20 );



function tcrs_custom_post_types() {
	/**
	 * CPT - OFFERTA
	 */
	register_post_type( 'offerta', array(
		'public' => true,
		'has_archive' => false,
		'rewrite' => array( 'slug' =>'offerta' ),
		'labels' => array(
			'name' => 'Offerte TCRS',
			'singular_name' => 'Offerta TCRS',
			'add_new_item' => 'Aggiungi offerta',
			'edit_item' => 'Modifica offerta',
			'all_items' => 'Tutte le offerte'
		),
		'supports' => array( 'title', 'editor','excerpt','thumbnail' ),
		'menu_icon' => 'dashicons-clipboard', 
		'capability_type' => 'post',
	) );


	register_post_type('prodottotcrs', array(
		'labels' => array(
			'name'               => __('Prodotti TCRS', 'pangea'),
			'singular_name'      => __('Prodotto TCRS', 'pangea'),
			'add_new'            => __('Aggiungi nuovo Prodotto', 'pangea'),
			'add_new_item'       => __('Aggiungi Prodotto', 'pangea'),
			'edit'               => __('Modifica', 'pangea'),
			'edit_item'          => __('Modifica Prodotto', 'pangea'),
			'new_item'           => __('Nuovo Prodotto', 'pangea'),
			'view'               => __('Visualizza', 'pangea'),
			'view_item'          => __('Visualizza Prodotto', 'pangea'),
			'search_items'       => __('Cerca Prodotti', 'pangea'),
			'not_found'          => __('Nessun Prodotto trovato', 'pangea'),
			'not_found_in_trash' => __('Nessun Prodotto trovato nel Cestino', 'pangea'),
			'parent'             => __('Genitore Prodotto', 'pangea'),
		),
		'public'                => true,
		'exclude_from_search '  => false,
		'has_archive'           => true,
		'rewrite'               => array('slug' => 'prodottotcrs'),
		'supports' 				=> array( 'title', 'editor','excerpt','thumbnail' ),
		'show_in_rest'          => false,
		'can_export'            => true,
		'menu_icon'             => 'dashicons-networking',
	));

	register_post_type('opzionetcrs', array(
		'labels' => array(
			'name'               => __('Opzioni Prodotto', 'pangea'),
			'singular_name'      => __('Opzione Prodotto', 'pangea'),
			'add_new'            => __('Aggiungi nuova Opzione', 'pangea'),
			'add_new_item'       => __('Aggiungi Opzione', 'pangea'),
			'edit'               => __('Modifica', 'pangea'),
			'edit_item'          => __('Modifica Opzione', 'pangea'),
			'new_item'           => __('Nuova Opzione', 'pangea'),
			'view'               => __('Visualizza', 'pangea'),
			'view_item'          => __('Visualizza Opzione', 'pangea'),
			'search_items'       => __('Cerca Opzioni', 'pangea'),
			'not_found'          => __('Nessuna Opzione trovata', 'pangea'),
			'not_found_in_trash' => __('Nessuna Opzione trovata nel Cestino', 'pangea'),
			'parent'             => __('Genitore Opzione', 'pangea'),
		),
		'public'                => true,
		'exclude_from_search '  => true,
		'has_archive'           => false,
		'rewrite'               => array('slug' => 'opzionetcrs'),
		'supports' 		=> array( 'title', 'editor','excerpt','thumbnail','page-attributes' ),
		'hierarchical' 		=> false,
		'show_in_rest'          => false,
		'can_export'            => true,
		'menu_icon'             => 'dashicons-networking',
	));

	register_taxonomy( 'tecnologia', 'prodottotcrs',  array(
		'hierarchical'      => true,
		'labels'            => array(
			'name'              => __( 'Tecnologia connessione', 'pangea' ),
			'singular_name'     => __( 'Tecnologia', 'pangea' ),
			'edit_item'         => __( 'Modifica Tecnologia', 'pangea' ),
			'update_item'       => __( 'Aggiorna Tecnologia', 'pangea' ),
			'add_new_item'      => __( 'Aggiungi Tecnologia', 'pangea' ),
			'new_item_name'     => __( 'Nuova Tecnologia', 'pangea' ),
			'menu_name'         => __( 'Tecnologia', 'pangea' ) ),
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'tecnologia' )
	));
}
add_action('init', 'tcrs_custom_post_types');


// cambio l'aspetto del metabox per la mia tassonomia
function tecnologia_meta_box_display( $post, $box ) {
    $terms = get_terms( array(
        'taxonomy' => 'tecnologia',
        'hide_empty' => false,
    ) );
    
	$post_terms = wp_get_object_terms( $post->ID, 'tecnologia', array( 'fields' => 'ids' ) );
    
    foreach ( $terms as $term ) {
        $checked = in_array( $term->term_id, $post_terms ) ? ' checked="checked"' : '';
        echo '<label><input type="checkbox" name="tax_input[tecnologia][]" value="' . $term->term_id . '"' . $checked . '> ' . $term->name . '</label><br>';
    }
}

function modifica_meta_box_tecnologia() {
    remove_meta_box( 'tagsdiv-tecnologia', 'prodottotcrs', 'side' );
    add_meta_box( 'tecnologiadiv', 'Tecnologia conn.', 'tecnologia_meta_box_display', 'prodottotcrs', 'side', 'low' );
}
add_action( 'add_meta_boxes', 'modifica_meta_box_tecnologia' );