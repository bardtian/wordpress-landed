<?php

#MetaBox.php
require_once "MetaField.php";
if (!class_exists("MetaBox")):
  class MetaBox {

    public $params;

    /** factory method */
    static function Create($params) {
      return new MetaBox($params);
    }

    /** constructeur */
    function __construct(array $params) {
      !isset($params['id']) AND die("Metabox {$params['label']} must have an ID");
      $this->params = $params;
      add_meta_box($this->params['id'], $this->params['label'], array($this, "registerMetaboxCallback"), $this->params['post_type'], $this->params["context"], $this->params['priority']);
    }

    /** construit l'interface de la metabox en HTML */
    public function registerMetaboxCallback() {
      global $post;
      print "<fieldset class='{$this->postType}-metabox'>";
      foreach ($this->params['fields'] as $field) {
        //   if(in_array($field['type'],array(MP_FieldTypes::CHECKBOXGROUP))){
        //   $value = get_post_meta($post->ID, $field['id']);
        // }else{
        $value = get_post_meta($post->ID, $field['id'],true);
        //}
        $formField =  new MP_FormField($field);
        $formField->value = $value;
        $formField->name = $field['id'];
        print MP_HtmlRenderer::Render($formField);
      }
      print"</fieldset>";

      print $this->getDefaultStyleSheet();
    }  
    /** Ecrit le stylesheet par d�faut */
    private function getDefaultStyleSheet() {
      return "<style>fieldset.{$this->postType}-metabox label{ width:20%;min-height:30px;display:inline-block;} fieldset.{$this->postType}-metabox input[type=text]{ width:70%;display:inline-block;clear:right;} label{ vertical-align:top;  }</style> ";
    }
  }
endif;
