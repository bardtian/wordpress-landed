<?php
if (!class_exists('HTML')):
  /**
   *
   * Génère des balises HTML
   * @author M.PARAISO
   *
   */
  class HTML{
    /**
     * Génère des balises HTML
     * @param string $name
     * @param string $value
     * @param string $type
     * @param array $params
     * @return string
     */
    static function input($name,$value,$type='text',array $params=null){
      $attributes="";
      if(is_array($params)){
      foreach($params as $k => $v ){
        $attributes .= " $k='$v' ";
      }
    }
    switch ($type) {
    case 'imageupload':
      $output="<input id='$name' title='$value' type='text' size='36' name='$name' class='upload_image' value='$value' $attributes />
        <input id='{$name}_button' type='button' value='Upload Image' class='upload_image_button'/>";
      break;
    case 'textarea':
      $output="<textarea id='$name' name='$name' $attributes >$value</textarea>";
      break;
    default:
      $output =  "<input type='$type' name='$name' id='$name' value='$value' $attributes />";
      break;
    }
    return $output;
  }

/**
 * génère un bouton submit HTML.
 * string unknown_type $name
 * string unknown_type $value
 * @return string
 */
static function submit($name,$value){
  return HTML::input($name,$value,"submit");
}
  }
endif;
