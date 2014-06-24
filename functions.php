<?php

// Mettre une sidebar avec des Widgets
if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
            'name'          => 'Main Sidebar',
            'id'            => 'main-sidebar',
            'description'   => 'Displayed in my home',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="section">',
        'after_title'   => '</h4>',
    ));
  }

// Ajouter une sidebar à son site : http://www.paulund.co.uk/how-to-register-a-sidebar-in-wordpress
if ( function_exists('register_sidebar') )
    register_sidebar(array(
            'name'          => 'Second Sidebar',
            'id'            => 'second',
            'description'   => 'Displayed in my page',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="section">',
        'after_title'   => '</h4>',
    ));

// Utiliser Bootstrap dans un menu appelé "primary" et ajouter un second menu appelé "Secondary Menu"
// http://code.tutsplus.com/tutorials/how-to-integrate-bootstrap-navbar-into-wordpress-theme--wp-33410
function register_my_menus() { 
  register_nav_menus (
    array(
    'primary' => __( 'Primary Menu', 'THEMENAME' ),
    'secondary-nav' => __( 'Secondary Menu', 'THEMENAME' ),
    ) 
  );
}

add_action( 'init', 'register_my_menus' );

// Register Custom Navigation Walker -- https://github.com/twittem/wp-bootstrap-navwalker
require_once('wp_bootstrap_navwalker.php');

// Ajouter des images à la une ("thumbnail")
add_theme_support( 'post-thumbnails' );

// Ajouter un "Lire la suite" à la fin d'un extrait
function excerpt_read_more_link($output) {
 global $post;
 return $output . '<a href="'. get_permalink($post->ID) . '"> Lire la suite...</a>';
}
add_filter('the_excerpt', 'excerpt_read_more_link');

// Par défaut, WP affiche 55 premiers mots dans l'extrait. Vous pouvez le changer: 
function custom_excerpt_length( $length ) {
  return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<section id="main">';
}

function my_theme_wrapper_end() {
  echo '</section>';
}

/** Remove Showing results functionality site-wide */
function woocommerce_result_count() {
  return;
}

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
 

function wc_remove_related_products( $args ) {
  return array();
}
add_filter('woocommerce_related_products_args','wc_remove_related_products', 10); 