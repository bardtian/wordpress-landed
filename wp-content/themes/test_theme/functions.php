<?php 
/* wordpress functions 
 * on peut ici définir des functions à utiliser dans le thème
 */
/**
 * CONSTANTES
 */
define(STYLESHEET_FOLDER,get_bloginfo('stylesheet_directory'));
/*Function test */
class WordpressTheme{
  public static function print_hello(){
    print 'Hello Wordpress';
    return 0;
  }
}
/** enregistrement du widget
 */
if(function_exists('register_sidebar')){
  register_sidebar(array(
    'name'=>'Widget Area',
    'id'=>'widget-area',
    'before_widget'=>'<li class="widget-container"',
    'after_widget'=>'</li>',
    'before_title'=>'<h3 class="widget-title">',
    'after_title'=>'</h3>'
  ));
}
/* FONCTIONS */
/**
 * boite à outils
 */
class Utilities{
  private static $cssFolder ="";
  /** obtient l'uri du theme */
  public static function setCssFolder($folder){
    Utilities::$cssFolder=$folder;
  }
  public static function getCssUri($filename,$folder=""){
    if($folder==""){
      $folder=Utilities::$cssFolder;
    }
    return STYLESHEET_FOLDER.DIRECTORY_SEPARATOR.$folder.DIRECTORY_SEPARATOR.urlencode($filename);
  }
  public static function getStylesheetLink($filename,$media='all'){
    return "<link rel='stylesheet' href='".Utilities::getCssUri($filename)."' media='$media' />\n";
  }
}
/**
/* Enregistrement des menus.
 */
if (function_exists('register_nav_menus') ) {
  register_nav_menus(
    array('primary'=>'Primary Navigation','footer'=>'Footer Navigation')
  );
}
