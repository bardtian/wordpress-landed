<?php
require_once "MP_Form.php";
/**
 * Cr�e un objet formulaire et le postcode correspondant.
 * Pour se service du formulaire , inserer le shortcode dans la page contenant
 * le formulaire.
 * si le param�tre create_post_type est sp�cifi� , alors , cr�e le post type personnalis�
 * repr�sentant le formulaire dans l'admin Wordpress.
 * Ainsi , � chaque formulaire envoy� , un nouveau post est cr�e content les donn�es du formulaire correspondant.
 **/
class MP_FormFactory
{
  public $params;
  public $form_post_type;

  /** constructeur **/
  public function __construct($params)
  {
    if(!isset($params['id'])){
      die("id cannot be null");
    }
    $id = $params['id'];
    $this->params=$params;
    add_shortcode($id, array($this,"create"));
    /** cree un custom post type pour le formulaire. chaque formulaire envoy� cr�e un post **/
    isset($this->params['related_post_type']) AND 
      $this->form_post_type=PostType::create_post_type_from_form_params($this->params);
  }
  public function create()
  {
    return MP_Form::Create_Validate_Process_Render($this->params);
  }
}

