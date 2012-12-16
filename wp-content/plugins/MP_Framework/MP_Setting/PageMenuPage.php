<?php
/**
 * crée une page d'options dans le menu apareance
 **/
class PageMenuPage extends SettingsPage 
{
  function register_option_page_in_menu(){
    add_pages_page($this->params['page_title'],
      $this->params['page_link'],
      $this->params['page_credentials'],
      $this->params['page_id'],
      array($this,'register_option_page_in_menu_callback')
    );
  }

}



