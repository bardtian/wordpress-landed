<?php
/**
 * enregistre des actions dans wordpress
 * couche d'abstraction au cas ou l'API de wordpress change.
 **/
class Registration
{
  static function RegisterSettingPageLinkInAdminMenu($callback){
    add_action('admin_menu',$callback);
  }
  static function RegisterSettingPage($callback){
    add_action('admin_init',$callback);
  }
}
