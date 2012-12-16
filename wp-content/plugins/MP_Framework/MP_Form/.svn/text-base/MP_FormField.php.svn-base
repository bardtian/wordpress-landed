<?php
require_once 'IFormAsset.php';
require_once  "MP_FormValidator.php";
/** formfield object **/
class MP_FormField implements IFormAsset{
  public $type,$title,$name,$value,$id,$required,$class;
  public $filters = array();
  public $validation=array();
  public $params=array();
  public $fields;
  public $errormessage;
  public $isValid=true;
  function __construct(array $params=null){
    !isset($params) AND trigger_error("\$params cannot be null \n",E_USER_WARNING);
    /* init properties*/
    foreach($params as $key=>$value){
      if(property_exists($this, $key)){
        $this->$key  = $value ;
      }
    }
    isset($params['fields']) AND
      $this->fields = $this->init_children($params['fields']);
  }
  function init_children($children){
    $fields = array();
    foreach($children as $child){
      array_push($fields,new MP_FormField($child));
    }
    return $fields;
  }
  function init_params($params){
    return params;
  }
  function validate(){
    return MP_FormValidator::Validate($this);

  }
  function isValid(){
    return $this->isValid;
  }
  function render(){
    return MP_HtmlRenderer::Render($this);
  }
  function getType(){
    return $this->type;
  }
}
