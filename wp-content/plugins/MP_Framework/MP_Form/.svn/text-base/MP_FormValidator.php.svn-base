<?php
require_once "MP_ValidTypes.php";
/**
 * Valide un formulaire M_Form
 */
class MP_FormValidator{
  /**
   * valide les champs du formulaire
   * @return boolean
   */
  static function validate(IFormAsset $formAsset=null)
  {
    $isValid=true;
    if(isset($formAsset->fields)){
      foreach($formAsset->fields as $field){
        if(isset($field->validation)){
          switch($field->validation){
          case MP_ValidTypes::ISNOTNULL :
            if($_POST["{$field->name}"]==null ){
              $field->errormessage = "{$field->title} cannot be null" ;
              $isValid=false;
            }
            break;
          case MP_ValidTypes::ISEMAIL :
            if($_POST["{$field->name}"]==null AND !filter_var($_POST["{$field->name}"],FILTER_VALIDATE_EMAIL)){
              $field->errormessage="{$field->title} must be a valid email";
              $isValid=false;
            }
            break;
          case MP_ValidTypes::ISNULL :
            if($_POST["$field->name"]!=null){
              $field->errormessage = "{$field->title} should be  empty" ;
              $isValid=false;
            }
            break;
          } 
        }
      }
    }
    return $isValid;
  }
}
