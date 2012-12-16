<?php
# Enregistre un nouveau type de post tracks
add_action('init','track_register');
function track_register(){
  $labels=array(
    "name"=>__('Tracks'),
    "singular_name"=>__('Track'),
    "add_new_item"=>__('Add Track'),
    "edit_item"=>__("Edit Ttrack"),
    "view_item"=>__("View Track")
  );
  $args=array(
    'labels'=>$labels,
    'label'=>__('Tracks'),
    'singular_label'=>__("Track"),
    'public'=>true,
    'show_ui'=>true,
    'capability_type'=>'post',
    'rewrite'=>true,
    'hierarchical'=>true,
    'supports'=>array('title','thumbnail'/*,'tags','custom-fields','page-attributes'*/),
    'register_meta_box_cb'=>'landed_register_track_custom_metabox'
  );
  register_post_type('track',$args);
}
// enregistre la meta box custom de la page tracks
/*add_action('admin_init','landed_register_track_custom_metabox');*/
function landed_register_track_custom_metabox(){
  add_meta_box("trackInfo-meta","Track Options","landed_track_custom_metabox_callback","track","normal","low");
}
// callback
function landed_track_custom_metabox_callback(){
  global $post;
  //obtenir les metas
  $artist = get_post_meta($post->ID,"artist",true);
  print"<fieldset class='landed-meta'>";
  print "<label for='artist'>Artist</label>
    <input type='text' name='artist' value='$artist'/>";
  $release_name=get_post_meta($post->ID,'release_name',true);
  print "<label for='release_name'>Release</label>
    <input type='text' name='release_name' value='$release_name'/>";
  $media_uri=get_post_meta($post->ID,'media_uri',true);
  print"<label for='media_uri'>Track uri</label>
    <input type='text' name='media_uri' value='$media_uri'/>";
  $link_uri=get_post_meta($post->ID,'link_uri',true);
  print"<label for='link_uri'>Buy link</label>
    <input type='text' name='link_uri' value='$link_uri'/>";
  $link_title=get_post_meta($post->ID,'link_title',true);
  print"<label for='link_title'>Buy link title</label>
    <input type='text' name='link_title' value='$link_title'/>";
  print"</fieldset>";
  print"<style>
    fieldset.landed-meta label{width:200px;display:inline-block;} 
    fieldset.landed-meta input{width:500px;display:inline-block;clear:right;}</style> ";
}
// action à la sauvegarde du post
add_action("save_post","save_landed_track_metadatas");
function save_landed_track_metadatas(){
  global $post;
  update_post_meta($post->ID,"artist",$_POST['artist']);
  update_post_meta($post->ID,"release_name",$_POST['release_name']);
  update_post_meta($post->ID,"media_uri",$_POST['media_uri']);
  update_post_meta($post->ID,"link_uri",$_POST['link_uri']);
  update_post_meta($post->ID,"link_title",$_POST['link_title']);

}
/*management de l'interface d'admin

  source : http://codex.wordpress.org/Plugin_API/Action_Reference/manage_posts_custom_column 
 un bug existe , voir :
  http://wordpress.org/support/topic/manage_posts_custom_column-not-working 
 */
add_filter('manage_track_posts_columns','track_columns');
add_action("manage_track_posts_custom_column","track_custom_column");
function track_custom_column($col){
  global $post;
  switch($col){
  case 'media_uri':
    echo  get_post_meta($post->ID,"media_uri",true);
    break;
  case 'artist':
    echo  get_post_meta($post->ID,"artist",true);
    break;
  case 'release_name':
    echo get_post_meta($post->ID,"release_name",true);
    break;
  case 'track_featured_image':
    /*http://codex.wordpress.org/Function_Reference/the_post_thumbnail*/
    echo the_post_thumbnail(array(50,50));
   break; 
  }
}
function track_columns($columns)
{
  $columns['artist']=__('Artist');
  $columns['release_name']=__('Release name');
  $columns["media_uri"]=__("Track Uri");
  $columns["track_featured_image"]=__("Featured image");
  return $columns;
}

