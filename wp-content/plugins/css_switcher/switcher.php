<?php
/*
Plugin Name: CSS Switcher
Plugin URI: http://aikah.free.fr
Description: a simple plugin to demonstrate plugin definition.
Author: M.Paraiso
Version: .01
Author URI:http://aikah.free.fr
*/
function sidebar_switcher(){
  echo <<<HEREDOC
<ul id="color-swith">
<li>
<a id='switch-light'href="#">Light</a>
</li>
<li>
<a id='switch-dark'href="#">Dark</a>
</li>
</ul>
HEREDOC;
}
function light_switch(){
  if(!is_admin()):
    $x = WP_PLUGIN_URL.'/'.str_replace(basename(__FILE__),"",plugin_basename(__FILE__));
    wp_register_script('jquery_cookies',$x."/js/jquery.cookie.js",array('jquery'));
  wp_register_script('switchColors',$x."/js/switchColors.js",array('jquery'));
  wp_enqueue_script('jquery_cookies');
  wp_enqueue_script('switchColors');
endif;
}
add_action('wp_enqueue_scripts','light_switch');
