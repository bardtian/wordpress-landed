<?php
require_once "MP_Form.php";
/**
 * 
 **/
class TestClass
{
  public $params;
  function __construct($params)
  {
    $this->params = $params;
  }
}
$form_params = array(
  'name'=>'landed_contact_form',
  'id'=>'landed_contact_form',
  'class'=>'mp-landed-booking-form',
  'method'=>'post',
  'fields'=>array(
    array('type'=>'heading','title'=>'Fill the form to book an artist'),
    array('name'=>'name','title'=>'Name','params'=>array('required'=>'true'),'validation'=>'isnotnull'),
    array('name'=>'lastname','type'=>'hidden','title'=>'Name','validation'=>'null'),
    array('name'=>'email','title'=>'Email','value'=>'aikah@free.fr','params'=>array('required'=>'true')),
    array('type'=>'heading','title'=>'Select a dj to book'),
    array('name'=>'artists','title'=>'Artists','type'=>'checkboxgroup','fields'=>array(
      array('name'=>'artists','title'=>'Dj Silex','type'=>'checkbox',"value"=>'dj silex'),
      array('name'=>'artists','title'=>'David Guetta','type'=>'checkbox','value'=>'david guetta'),
      array('name'=>'artists','title'=>'Superfunk','type'=>'checkbox',"value"=>'superfunk'),
      array('name'=>'artists','title'=>'Dj Krush','type'=>'checkbox',"value"=>'dj krush'),
      array('name'=>'artists','title'=>'Dj Blade','type'=>'checkbox','value'=>'dj blade'),
    ),
  ),
  array('name'=>'country','type'=>'select','fields'=>array(
    array('type'=>'option','value'=>'france','title'=>'France'),
    array('type'=>'option','value'=>'germany','title'=>'Germany'),
    array('type'=>'option','value'=>'ireland','title'=>'Ireland'),
  )),
  array('type'=>'heading'),
  array('name'=>"reset",'type'=>'reset','value'=>'reset'),
  array('name'=>"submit",'type'=>'submit','value'=>'submit'),
),
  );

$landed_contact_form = new MP_Form($form_params);
 $landed_contact_form->validate();
print $landed_contact_form->render();
