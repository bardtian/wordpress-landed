<?php
# PostType.php
require_once "MetaBox.php";
require_once "ColumnSet.php";
/**
 * FR : Cette classe crée un type de post personnalisé
 * @TODO implémenter la gestion des taxonomies
 * @author Marc Paraiso
 */
class PostType{
  public $WPA;/** abstraction des fonctions wordpress **/
  public $params;
  public $metaboxes=array();
  public $columns=array();
  /** paramï¿½tres par dï¿½faut */
  private $default_params=array(
    'private'=>true,
    'show_ui'=>true,
    'capability_type'=>'post',
    'rewrite'=>true,
    'hierarchical'=>true,
    'supports'=>array('title','thumbnail','page-attributes')
  ); 

  function __construct($params){
    // si label ou id sont null , erreur !
    $params['id'] == null AND die('Post type $params["id"] cannot be null');
    count($params['id'])>20 AND die('Post type $params["id"] cannot be longer than 20 characters');
    $params['label'] == null AND die('Post type $params["label"] must be a valid string');
    /** si le post type existe déja , warning **/
    if(post_type_exists($params['id'])){
      user_error("Post type $params[id] already exists",E_WARNING);
    }
    // abstraction des fonctions wordpress
    $this->WPA= new WPA(); 
    $this->params = array_merge($this->default_params,$params);
    // creation des metaboxes
    isset($this->params['metaboxes']) AND $this->params['register_meta_box_cb']= array($this,"registerMetabox") AND  add_action('save_post', array($this, 'savePostTypeMetadatas'));
    // creation des colonnes.
    isset( $this->params['columns']) AND $this->columns = new ColumnSet($this->params['id'],$this->params['columns']);
    // si le tableau labels n'est pas dï¿½fini , le creer
    !isset($this->params['labels']) AND $this->params['labels']  = self::createLabels($this->params['label']);
    // enregistre le script d'upload si un champ upload est déclaré
    self::hasAMediaUploadField($this) AND add_action ('admin_enqueue_scripts',array($this,'registerUploadScript'));
    //  hook
    add_action('init',array($this,"registerType"));    
  }
  /** Enregistrement du nouveau type */
  public  function registerType(){
    register_post_type($this->params['id'],$this->params);
    remove_action("init",array($this,"registerType"));
  }
  /** Enregistrement de la metabox */
  public   function registerMetabox(){
    foreach ($this->params['metaboxes'] as $metabox) {
      $metabox['post_type'] = $this->params['id'];
      array_push($this->metaboxes,Metabox::Create($metabox));
    }
  }
  /** sauve les metadatas du post */
  public function savePostTypeMetadatas($postID) {
    foreach ($this->params['metaboxes'] as $metabox) {
      foreach($metabox['fields'] as $field){
        if (isset($_POST[$field['id']])) {
          update_post_meta($postID, $field['id'], $_POST[$field['id']]);
        }
      }
    }
  }

  /** crï¿½ation automatique du tableau des labels */
  public static function createLabels($label){
    !isset($label) AND die('$label must be set!');
    $labels = array();
    $labels["name"]=__($label."s");
    $labels["singular_name"]=__($label);
    $labels["add_new_item"]=__("Add {$label}");
    $labels["edit_item"]=__("Edit {$label}");
    $labels["view_item"]=__("View {$label}");
    return $labels;
  }

  /** crée un type de post à partir des paramètres du formulaire **/
  static function create_post_type_from_form_params(array $params){
    if(!isset($params['related_post_type'])){
      user_error("No related post type defined",E_WARNING);
    }
    !isset($params[related_post_type_label]) AND 
      $params['related_post_type_label']=$params['related_post_type'];
    $fields = array();
    /** parcourt les champs du formulaire , crée les custom fields correspondants **/
    foreach($params['fields'] as $field){
      if(!in_array($field['type'],array('submit','heading','reset'))){
        array_push($fields,
          array(
            'id'=>$field['name'],
            'title'=>$field['title'],
            'type'=>$field['type'],
            'fields'=>$field['fields'],
            'params'=>$field['params'],
            'required'=>$field['required'],
          )
        );
      }
    }
    $metabox= array(
      'id'       =>"{$params['id']}meta",
      'label'    =>"$params[name] meta informations",
      'priority' =>'high',
      'context'  =>'normal',
      'post_type'=>$params['id'],
      'fields'   =>$fields
    );
    $post_type_params = array(
      'id'       =>$params['related_post_type'],
      'label'    =>$params['related_post_type_label'],
      'columns'  =>array(),
      'metaboxes'=>array($metabox),
    );
    return new PostType($post_type_params);
  }

  /** vérifie si un champ de la page d'option est du type upload 
   * @param $postType PostType
   * @return Boolean
   */
  static function hasAMediaUploadField(PostType $postType){
    $result = false;
    $params = $postType->params ;
    foreach($params['metaboxes'] as $metabox){
      foreach($metabox['fields'] as $field){
        if(isset($field['type']) && $field['type']==MP_FieldTypes::UPLOAD){
          $result = true ;
          break;
        }
      }
      if($result==true){
        break;
      }
    }
    return $result; 
  }
  /**
   * enrigstre le script d'upload pour une page d'options donnée
   * @see http://codex.wordpress.org/Function_Reference/wp_enqueue_script 
   */
  function registerUploadScript(){
    if( is_admin() && (isset($_GET['post']) || isset($_GET['post_type']))   ){
      $this->WPA->wp_register_script('uploader',
        $this->WPA->plugins_url('/js/uploader.js',__FILE__),
        array('jquery','media-upload','thickbox'),
        false,
        true
      );
      $this->WPA->wp_enqueue_script('jquery');
      $this->WPA->wp_enqueue_script('thickbox');
      $this->WPA->wp_enqueue_script('media-upload');
      $this->WPA->wp_enqueue_script('uploader');
      $this->WPA->wp_enqueue_style('thickbox');
    }
  }

}

