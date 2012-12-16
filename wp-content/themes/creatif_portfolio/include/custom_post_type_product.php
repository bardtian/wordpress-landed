<?php
/**
 * source : http://net.tutsplus.com/tutorials/wordpress/rock-solid-wordpress-3-0-themes-using-custom-post-types/comment-page-1/#comments
 * source : http://www.deluxeblogtips.com/2010/07/custom-post-type-with-categories-post.html
 */

add_action('init','product_register');
//enregistre les produits
function product_register(){
  $args=array(
      'label'=>__('Products'),
      'singular_label'=>__('Product'),
      'public'=>true,
      'show_ui'=>true,
      'capability_type'=>'post',
      'hierarchical'=>true,
      'rewrite'=>true,
      'menu_position'=>6,
      'supports'=>array('title','editor','thumbnail','tags','page-attributes')
      );
  register_post_type('product',$args);
}
//ajout de d'entrée de formulaire personnalisée
add_action('admin_init','product_admin_init');
//hook à la sauvegarde du post
add_action('save_post','save_price');
// ajout d'un custom field standard
function product_admin_init(){
  add_meta_box("prodInfo-meta","Product Options","meta_options",'product','side','low');
}
// callback
function meta_options(){
  global $post;
  $custom = get_post_custom($post->ID);
  $price = $custom['price'][0];
  print "<label for='price'>Price</label>
    <input value='$price' name='price'/>";
}
//sauvegarde
function save_price(){
  global $post;
  update_post_meta($post->ID,"price",$_POST["price"]);
}
// création d'une taxonomie personalisée
//
add_action('init','register_catalog_taxonomy');
function register_catalog_taxonomy(){
  register_taxonomy(
      "catalog",
      array('product'),
      array(
        'hierarchical'=>true,
        "label"=>"Catalogs",
        "singular_label"=>"Catalog",
        "rewrite"=>true,
        "capabilities"=>array('manage_terms','edit_terms','delete_terms','assign_terms')
        )
      );
}

// @snippet utilise la taxonomie tags 
// définie pour posts
// avec le nouvel object product
add_action('init','register_tags_as_product_taxonomy')
;
function register_tags_as_product_taxonomy(){
  /**
   * source : http://www.deluxeblogtips.com/2010/07/custom-post-type-with-categories-post.html
   */ 
  register_taxonomy_for_object_type('post_tag','product');
}
// création de colonnes personnalisées
// pour l'interface d'administration
add_filter("manage_edit-product_columns","product_edit_columns");
add_action("manage_posts_custom_column","product_custom_columns");
function product_edit_columns($columns){
  $columns=array(
      "cb"=>"<input type='checkbox'/>",
      "title"=>"Product Title",
      "description"=>"Description",
      "price"=>"Price",
      "catalog"=>"Catalog"
      );
  return $columns;
}
function product_custom_columns($column){
  global $post;
  switch($column){
    case 'description':
      the_excerpt();
      break;
    case 'price':
      $custom=get_post_custom();
      echo $custom["price"][0];
      break;
    case 'catalog':
      echo get_the_term_list($post->ID,'catalog','',',','');
      break;
  }
}
