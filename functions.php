<?php

// Ajouter des images à la une ("thumbnail")
add_theme_support( 'post-thumbnails' );

// Ajouter un menu : étape 1
// Utiliser Bootstrap dans un menu appelé "primary" et ajouter un second menu appelé "Secondary Menu"
// http://code.tutsplus.com/tutorials/how-to-integrate-bootstrap-navbar-into-wordpress-theme--wp-33410
function register_my_menus() { 
  register_nav_menus (
    array(
    'test-nav' => __( 'Test Nav', 'blog' ),
    'secondary-nav' => __( 'Secondary Menu', 'blog' ),
    ) 
  );
}

add_action( 'init', 'register_my_menus' );

// Utiliser un menu avec Bootstrap -- https://github.com/twittem/wp-bootstrap-navwalker
require_once('wp_bootstrap_navwalker.php');




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


// Ajouter un "Lire la suite" à la fin d'un extrait
function excerpt_read_more_link($output) {
 global $post;
 return $output . '<a href="'. get_permalink($post->ID) . '"> Lire la suite...</a>';
}
add_filter('the_excerpt', 'excerpt_read_more_link');

// Par défaut, WP affiche 55 premiers mots dans l'extrait. Vous pouvez le changer : 
function custom_excerpt_length( $length ) {
  return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Quelques fonctions avancées pour WooCommerce :
// Avant le contenu de WooCommerce, ouvre une section avec une id "main"
// Après le contenu de WooCommerce, ferme une section
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

// Ne pas afficher le nombre de résultats de recherche dans WooCommerce
function woocommerce_result_count() {
  return;
}

// Ne pas afficher la barre de recherche dans WooCommerce
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

// Ne pas afficher de breadcrumbs dans ma page de produits et de catégorie WooCommerce
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);

// Ne pas afficher de détails de produits
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
 
// Ne pas afficher la zone "produits que vous pourriez aimer" dans WooCommerce
function wc_remove_related_products( $args ) {
  return array();
}
add_filter('woocommerce_related_products_args','wc_remove_related_products', 10); 

if( !function_exists( 'wts' ) ):
function wts()
{
wp_deregister_style ( 'woocommerce-twitterbootstrap');  
wp_dequeue_style( 'woocommerce-twitterbootstrap');
wp_register_style ( 'woocommerce-twitterbootstrap', get_stylesheet_directory_uri() . '/vendor/woocommerce-twitterbootstrap/css/woocommerce-twitterboostrap.css', 'woocommerce' );
wp_enqueue_style( 'woocommerce-twitterbootstrap');
}
endif;  
add_action( 'wp_enqueue_scripts', 'wts', 200 ); 


remove_action('admin_menu',array($woocommercetwitterbootstrap,'add_menu'));
add_action('admin_menu','woocommerce_twitterbootstrap_add_menu');
/** * add a menu */ 
function woocommerce_twitterbootstrap_add_menu() 
{
     global $woocommercetwitterbootstrap;
     add_theme_page('WooCommerce Twitter Bootstrap Settings', 'WooCommerce Bootstrap', 'manage_options', 'woocommerce-twitterbootstrap', array($woocommercetwitterbootstrap, 'plugin_settings_page'));
} // END public function add_menu()