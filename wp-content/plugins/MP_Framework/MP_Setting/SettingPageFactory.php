<?php
/** Setting Page Factory */
class SettingPageFactory{
   const _interface ="ISettingsPage";
  public static function Create($class,$params){
    $ref = new ReflectionClass($class);
    if($ref->implementsInterface(SettingPageFactory::_interface)){
      return new $class($params);
    }else{
      throw new Exception("$class doesnt not exist or doesnt implement {SettingPageFactory::_interface}");
    }
  }
}