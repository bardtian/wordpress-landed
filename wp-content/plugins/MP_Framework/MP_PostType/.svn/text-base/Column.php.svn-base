<?php
class Column{
  private $type;
  private $value;
  private $html;
  private $id;
  function __construct($id,$value,$type){
    $this->type = $type;
    $this->value = $value;
    $this->id=$id;
  }
  static function GetHTML($id,$value,$type){
    $column = new Column($id,$value,$type);
    return $column->html;
  }
  protected function renderHTML(){
    global $post;
    switch($this->type){
    case 'post_thumbnail':
      $this->html = get_the_post_thumbnail($post->ID,array(50,50));
      $b=9;
      break;
    case 'image':
      $this->html = "<img  src='{$this->value}' alt='{$this->id}'/>";
      break;
    default:
      $this->html = $this->value ;
      break;
    }
  }
}
