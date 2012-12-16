<?
/**
 * 
 **/
class MP_Utilities
{
  
  static function getCurrentFileUri(){
    return "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  }
}
