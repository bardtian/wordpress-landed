<?php
/**
 * gère les settings
 **/
class SettingsPage implements ISettingsPage
{
  /**
   * les paramètres d'initialisation de la page de type
   * @var array
   */
  public $params; /** paramètres de la page d'options **/
  public $WPA; /** abstraction des fonctions WP **/
  /**
   * contient les sections de la page de setting
   * @var array
   */
  public $sections = array();
  function __construct(array $params=null)
  {
    $this->WPA= new WPA();
    $params!=null AND $this->params = $params ;
    Registration::RegisterSettingPageLinkInAdminMenu(array($this,"register_option_page_in_menu"));
    Registration::RegisterSettingPage(array($this,"register_option_page"));
    self::hasAnImageUploaderField($this) AND $this->WPA->add_action('admin_enqueue_scripts',array($this,'registerUploadScript'));/* si champs upload , ajouter le javascript correspondant*/
  }
  function register_option_page_in_menu(){
    add_options_page($this->params['page_title'],
      $this->params['page_link'],
      $this->params['page_credentials'],
      $this->params['page_id'],
      array($this,'register_option_page_in_menu_callback')
    );
  }
  function register_option_page_in_menu_callback(){
    echo "<div><h2>{$this->params['page_title']}</h2>";
    echo "<form action='options.php' method='post'>";
    settings_fields($this->params['options_group_id']);
    do_settings_sections($this->params['page_id']);
    echo HTML::submit('submit',__('Save'));
    echo "</form>";
    echo "</div>";
  }
  function register_option_page(){
    // pour chaque section de page
    foreach ($this->params['page_sections'] as $section) {
      $this->sections[]=new Section($section,$this->params['options_group_id'],$this->params['page_id']);
    }
  }
  /** vérifie si un champ de la page d'option est du type upload 
   * @param $settings_params array
   * @return Boolean
   */
  static function hasAnImageUploaderField(ISettingsPage $settingPage){
    $result = false;
    $settings_params = $settingPage->params ;
    foreach($settings_params['page_sections'] as $page_sections){
      foreach($page_sections['settings'] as $setting){
        if(isset($setting['type']) && $setting['type']=='imageupload'){
          $result = true ;
          break;
        }
      }
      if($result==true){
        break;
      }
    }
    return $result; 
  }
  /**
   * enrigstre le script d'upload pour une page d'options donnée
   */
  function registerUploadScript(){
    if( is_admin() && $_GET['page']==$this->params['page_id'] ){
      $this->WPA->wp_register_script('uploader',
        $this->WPA->plugins_url('/js/uploader.js',__FILE__),
        array('jquery','media-upload','thickbox')
      );
      $this->WPA->wp_enqueue_script('jquery');
      $this->WPA->wp_enqueue_script('thickbox');
      $this->WPA->wp_enqueue_script('media-upload');
      $this->WPA->wp_enqueue_script('uploader');
      $this->WPA->wp_enqueue_style('thickbox');
    }
  }
}
