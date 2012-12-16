<?php
/**
 * EN : abstraction layer for Wordpress functions calls
 * FR : couche d'abstraction pour les fonctions Wordpress
 **/
if(!class_exists("WP_Abstraction")){
  class WP_Abstraction 
  {
    public   function __call($name,$arguments){
      if(function_exists($name)){
        return call_user_func_array($name,$arguments);
      }else{
        die("function $name doesnt exists");
      }
    }
  }
}
