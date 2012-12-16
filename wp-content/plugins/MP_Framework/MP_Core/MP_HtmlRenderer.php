<?php
#MP_HtmlRenderer.php
require_once "MP_FieldTypes.php";

class MP_HtmlRenderer{
  private static function getFieldHeader(IFormAsset $formAsset){
    $output="";
    !isset($formAsset->title)AND $formAsset->title = $formAsset->name;
    $output.="<p class='error {$formAsset->class}' style='margin:0;padding-top:30px;padding-bottom:5px;'>{$formAsset->errormessage}</p><label for='{$formAsset->name}'>{$formAsset->title}</label>";
    return $output;
  }
  private static function getFieldParams(IFormAsset $formAsset){
    $output ="";
    if(isset($formAsset->params)){
      foreach ($formAsset->params as $key => $value) {
        $output.=" $key='$value' ";
      }
    }
    return $output;
  }
  /**affiche le formulaire suivant le type du form asset **/
  static function Render(IFormAsset $formAsset,MP_HtmlRenderer $renderer=null){
    $header = self::getFieldHeader($formAsset);
    $params = self::getFieldParams($formAsset);
    $value = self::POST_or_value($formAsset);
    $output = "";
    switch($formAsset->getType()){
    case(MP_FieldTypes::FORM):
      $output.="<form name={$formAsset->name} action='{$formAsset->action}' method='{$formAsset->method}' enctype='{$formAsset->enctype}' id='{$formAsset->id}' class='{$formAsset->class}' $params />\n";
      $formAsset->isValid() AND $output.="<p class='green'>{$formAsset->successmessage}</p>";
      // si elements enfants , afficher les enfants
      if(isset($formAsset->fields)){
        foreach($formAsset->fields as $field){
          $output.=self::Render($field);
        }
      }
      $output.="</form>";
      break;
    case(MP_FieldTypes::SUBMIT):
      $output.="<input type='submit' name='submit' value='{$formAsset->value}'  class='{$formAsset->class}' $params />";
      break;
    case(MP_FieldTypes::RESET):
      $output.="<input type='reset' name='reset' value='{$formAsset->value}' class='{$formAsset->class}' $params />";
      break;
    case(MP_FieldTypes::SELECT):
      $output.=$header;
      $output.="<select id='{$formAsset->id}' name='{$formAsset->name}' class='{$formAsset->class}' $params >";
      if(isset($formAsset->fields)){
        foreach($formAsset->fields as $field){
          $selected='';
          !is_array($value) AND $value == $field->value AND $selected = "selected" ;
          is_array($value) AND in_array($value,$field->value) AND $selected="selected";
          $params = self::getFieldParams($field);
          $output.="<option value='{$field->value}' class='{$field->class}' $selected $params >{$field->title}</option>";
        }
      }
      $output.="</select>";
      break;
    case(MP_FieldTypes::OPTION):
      $output.="<option value='{$formAsset->value}' class='{$formAsset->class}' $params >{$formAsset->title}</option>";
      break;
    case(MP_FieldTypes::CHECKBOXGROUP):
      $output.=self::getFieldHeader($formAsset);
      $output.="<div style='width:300px;display:inline-block;'>";
      //  var_dump($formAsset);
      //  var_dump($value);
      if(isset($formAsset->fields)){
        foreach($formAsset->fields as $field){
          //  isset($_POST[$formAsset->name]) AND in_array($field->value, $_POST[$formAsset->name]) AND $checked = "checked" OR $checked = "";
          is_array($value) AND in_array($field->value, $value) AND $checked = "checked" OR $checked = "";
          $field->type='checkbox';
          $field->name = $formAsset->name;
          $output.="<label for='{$formAsset->name}'>{$field->title}</label>";
          $output.="<input type='{$field->type}' value='{$field->value}' $checked name='{$field->name}[]' $params />";
        }
      }
      $output.="</div>";
      break;
    case(MP_FieldTypes::CHECKBOX):
      $_POST[$formAsset->name] && $checked="checked";
      $output.=$header;
      $output.="<input type='checkbox' name='{$formAsset->name}'
        $checked value='{$formAsset->value}' class='{$formAsset->class}' $params/>";
      break;
    case MP_FieldTypes::HIDDEN :
      $output.="<input type='hidden' name='{$formAsset->name}' value='{$formAsset->value}' $params />";
      break;
    case(MP_FieldTypes::HEADING):
      $output.= "<p>{$formAsset->title}</p>";
      break;
      /** TEXTAREA**/
    case(MP_FieldTypes::TEXTAREA):

      $output.=$header;
      $output.="<textarea class='{$formAsset->class}' id='{$formAsset->name}' name='{$formAsset->name}' $params>";
      $output.=$value;
      $output.="</textarea>";
      break;
      /** Upload : ajoute un bouton upload
       * pour uploader un media **/
    case (MP_FieldTypes::UPLOAD):
      $output.=$header;
      //@TODO faire le n�cessaire pour inclure le javascript requis.
      $output.="<input id='$formAsset->name' title='$value'  type='text' style='width:60%;' name='$formAsset->name' class='upload_image' value='$value' $params />
        <input id='{$name}_button' type='button' value='Upload media' class='upload_image_button'/>";
      break;

      /** DEFAULT INPUT **/
    default:
      !isset($formAsset->type) AND $formAsset->type = "text" ;
      $output.=$header;
      $output.="<input type='$formAsset->type' value='$value' name='{$formAsset->name}' id='{$formAsset->id}' class='{$formAsset->class}' $params />";
      break;
    }
    return $output;
  }
  static function POST_or_value(IFormAsset $formAsset){
    return isset($_POST[$formAsset->name])?$_POST[$formAsset->name]:$formAsset->value;
  }
}
