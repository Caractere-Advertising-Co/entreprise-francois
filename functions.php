<?php
// Menu 
register_nav_menus( array(
    'megamenu' => 'Mega Menu',
	  'main' => 'Menu Principal',
	  'footer' => 'Bas de page',
) );

//SVG Files
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
    global $wp_version;
    if ( $wp_version !== '4.7.1' ) {
       return $data;
    }
  
    $filetype = wp_check_filetype( $filename, $mimes );
  
    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
  }, 10, 4 );
  
  function cc_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }
  add_filter( 'upload_mimes', 'cc_mime_types' );
  
  function fix_svg() {
    echo '<style type="text/css">
          .attachment-266x266, .thumbnail img {
               width: 100% !important;
               height: auto !important;
          }
          </style>';
  }
  add_action( 'admin_head', 'fix_svg' );

  // Create custom post (Chantiers)

function entrepFrancois_register_post_type(){
  $labels = array(
    'name' => 'Chantiers',
    'all_items' => 'Tous les chantiers',  // affiché dans le sous menu
    'singular_name' => 'Chantier',
    'add_new_item' => 'Ajouter un chantier',
    'edit_item' => 'Modifier le chantier',
    'menu_name' => 'Chantiers'
  );

  $supports = array(
    'title',
    'editor',
    'thumbnail',
    'excerpt',
    'revisions',
  );

  $args = array(
      'labels' => $labels,
      'public' => true,
      'show_ui' => true,
      'show_in_rest' => true,
      'has_archive' => true,
      'supports' => $supports,
      'menu_position' => 5, 
      'menu_icon' => 'dashicons-admin-customizer',
  );

  register_post_type( 'chantiers', $args );
}

add_action('init','entrepFrancois_register_post_type');
