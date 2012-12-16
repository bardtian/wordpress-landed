<?php

require_once "Registration.php";
require_once  "Setting.php";
require_once "html.php";

/**
 * gère les sections
 **/
class Section
{
  public $params;
  public $settings;
  public $options_group_id;
  public $page_id;

  function __construct($params,$options_group_id,$page_id)
  {
    $this->params=$params;
    $this->options_group_id=$options_group_id;
    $this->page_id=$page_id;
    // pour chaque setting dan la section de page
    if(!isset($this->params['callback'])){
      $this->params['callback']=array($this,
        'defaut_section_renderder');
    }
    add_settings_section($this->params['id'],
      $this->params['title'],$this->params['callback'],
      $this->page_id
    );
    foreach($this->params['settings'] as $setting){
      $this->settings[]=new Setting(
        $setting,
        $this->options_group_id,
        $this->page_id,
        $this->params['id']);
    }
  }

  function defaut_section_renderder($params){
    echo "<p>";
    //  print_r($params['callback']);
    echo "</p>";
  }

}
