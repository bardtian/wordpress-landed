<?php

#include/MetaField.php

class MetaField{
  // static function Create($fieldtype,$field){
  static function Create($field,$value){
    $field['name']=$field['id'];
    switch($field['type']){
      /** text area**/
    case('textarea'):
      $result ="<label  for='{$field['name']}'>{$field['title']}</label><textarea style='vertical-align:top;' id='{$field['id']}' name='{$field['name']}' title='{$field['title']}' rows='10' cols='60' >$value</textarea>";
      break;
      /** checkbox **/
    case('checkbox'):
      $checked="";
      if(isset($field['value'])){
        $checked = "checked='checked'";
      }
      $result="<label for='{$field["id"]}'>{$field["title"]}</label>
        <input type='checkbox' $checked value='{$field['id']}' name='{$field['name']}'/>
        </br>";
      break;
      /** text **/
    default:
      $result = "<label for='{$field["id"]}'>{$field["title"]}</label>
        <input type='text' id='{$field["id"]}' name='{$field["name"]}' value='$value' />
        </br>";
      break;
    }
    return $result;
  }
}
