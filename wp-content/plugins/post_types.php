<?php
/************************
Plugin Name: LINDA WP TUTORIAL CUSTOM POST TYPES
Author: M.PARAISO
Description: http://wordpress.org/support/topic/custom-post-type-in-wordpress-30-menu
************************/
// ajoute un nouveau type de post
add_action('init','snippets_init');// la fonction est appelÃ©e Ã  l'init
add_action('init','create_taxonomies');// crée les taxonomies
function snippets_init()
{
  // modification des labels pour l'interface d'administration.
  $snippet_labels=array( 
    'name'=>__('Snippet'),
    'singular_name'=>__('Snippet'),
    'all_items'=>__('All Snippets'),
    'add_new'=>__('Add new'),
    'add_new_item'=>__('Add new snippet'),
    'new_item'=>__('New snippet'),
    'view_item'=>__('View snippet'),
    'publish'=>__('publish new snippet'),
    'search_items'=>__('Search in snippet'),
    'not_found'=>__('No snippet found'),
    'not_found_in_trash'=>__('No snippets found in trash'),
    'parent item colon'=>''
  );
  $args=array(
    'label'=>__('Snippets'),
    'singular_label'=>__('Snippet'),
    'labels'=>$snippet_labels,
    'public'=>true,
    'show_in_nav_menus'=>true,/* montre type dans menu*/
    'publicly_queryable'=>true,
    'show_ui'=>true,
    'query_var'=>true,
    'rewrite'=>true,
    'capability_type'=>'post',
    'hierarchical'=>false,
    'menu_position'=>6,
    'supports'=>array(
      'title','custom-order','editor','comments','thumbnail','excerpt','custom-fields'/** support des champs*/
    ),
    "has_archive"=>'snippets'
  );
  register_post_type('snippets',$args);
}
// crée une nouvelle taxonomie.
function create_taxonomies()
{
  $snippet_type_labels=array( 
    'name'=>__('Snippet type'),
    'singular_name'=>__('Snippet type'),
    'all_items'=>__('All Snippets type'),
    'add_new'=>__('Add new'),
    'add_new_item'=>__('Add new snippet type'),
    'new_item'=>__('New snippet type'),
    'view_item'=>__('View snippet type'),
    'publish'=>__('publish new snippet type'),
    'search_items'=>__('Search in snippet type'),
    'not_found'=>__('No snippet found type'),
    'not_found_in_trash'=>__('No snippets  types found in trash'),
    'parent tiem colon'=>''
  );
  register_taxonomy(
    'snippet-type',array('snippets'),array(
      'hierarchical'=>'true',
      'label'=>'Snippet type',
      'singular_name'=>'Snippet type',
      'labels'=>$snippet_type_labels,
      "show_ui"=>true,
      "query_var"=>true,
      'rewrite'=>array('slug'=>'snippet-type')
    )
  );
}
