<?php
/************************
CONSTANTES
************************/
define("BLOG",get_cat_ID("blog"));
define("PORTFOLIO",get_cat_ID("portfolio"));
/************************
INITIALISATIONS 
************************/
add_action("after_setup_theme",'theme_init');
/************************
INCLUDES
************************/
include_once ABSPATH."wp-content/themes/post_types.php";
include_once TEMPLATEPATH."/include/custom_post_type_product.php";
include_once TEMPLATEPATH."/include/better_custom_fields_with_metaboxes_tutorial.php";
include_once TEMPLATEPATH.'/include/custom_admin.inc';
/************************
CLASSES
************************/
class Creatif{
        /**
        /* @return void
         */
  public static function get_featured_posts(){
    return include(TEMPLATEPATH.'/featuredpost.php');
  }
}
/************************/
/*FONCTIONS*/
/************************/
function theme_init(){
  // This theme styles the visual editor with editor-style.css to match the theme style.
 // add_editor_style();
  // This theme uses post thumbnails
  add_theme_support( 'post-thumbnails' );
}
// @snippet ajouter des options au theme
/************************/
/*CUSTOM POST TYPES*/
/************************/
/************************/
/*ENREGISTRMENT DES MENUS*/
/************************/
if (function_exists('register_nav_menus') ) {
  register_nav_menus(
    array('primary'=>'Primary Navigation')
  );
}
// @snippet enregistrement de la sidebar
if(function_exists('register_sidebar')):
  register_sidebar(array('name'=>'Creatif'));
endif;
/************************/
/*AJOUTER DES SCRIPTS   */
/************************/
//@snippet enregistrer des scripts
/*
function light_switch(){
  if(!is_admin()):
  wp_register_script('jquery_cookies',get_stylesheet_directory_uri()."/js/jquery.cookie.js",array('jquery'));
  wp_register_script('switchColors',get_stylesheet_directory_uri()."/js/switchColors.js",array('jquery'));
  wp_enqueue_script('jquery_cookies');
  wp_enqueue_script('switchColors');
  endif;
}
add_action('wp_enqueue_scripts','light_switch');
         */
