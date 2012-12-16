<?php
/**
 * gère le setting d'une section d'option page
 **/

class Setting
{
	/** tableau de paramètres **/
	public $params;
	public $page_id;
	public $options_group_id;
	public $section_id;
	/** constructeur **/
	function __construct($params,$options_group_id,$page_id,$section_id)
	{
		$this->params=$params;
		$this->params['params']=array_merge(array('class'=>'regular-text code'),is_array($params['params'])?$params['params']:array());
		$this->page_id=$page_id;
		$this->section_id=$section_id;
		$this->options_group_id=$options_group_id;

		if(!isset($this->params['sanitizer'])){
			$this->params['sanitizer']==array($this,'default_sanitizer');
		}
		register_setting($this->options_group_id,
		$this->params['id'],
		$this->params['sanitizer']);
		if(!isset($this->params['callback'])){
			$this->params['callback']=array($this,
        'default_callback');
		}
		add_settings_field($this->params['id'],
		$this->params['title'],
		$this->params['callback'],
		$this->page_id,
		$this->section_id);
	}
	/** purificateur par défaut **/
	function default_sanitizer($input){
		return esc_attr($input);
	}

	function default_callback(){
		$name = $this->params['id'];
		$value = get_option($this->params['id'])!=null?get_option($this->params['id']):$this->params['value'];
		$this->params['type']==null AND $type = 'text' OR $type = $this->params['type'];
		echo HTML::input($name,$value,$type,$this->params['params']);
	}
}