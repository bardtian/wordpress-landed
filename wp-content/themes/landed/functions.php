<?php
# landed/functions.php
/**
 * Initialisation du theme.
 * @author M.Paraiso
 *
 */
require_once "include\MP_Landed_BookingForm.inc" ;
//require_once "include\custom_post_types\landed_track.php";
global $landed_news_letter_post_type;
class MP_Landed_Theme{
  /** champs **/
  public $bookingRequestPostType;
  /* methodes*/
  /** constructeur **/
  function __construct(){
    $this->init_bookingForm();
    $this->init_custom_setting_pages();
    $this->init_custom_post_types();
    $this->landed_booking_form();
    $this->landed_news_letter_subscription_form();
  }
  /** initialise les pages d'option*/
  function init_custom_setting_pages(){
    $MP_social_links_settings_params = array(
      'page_title'      =>__("LANDED Theme settings"),
      'page_link'       =>__("LANDED settings"),
      'page_id'         =>'MP_LANDED_settings',
      'page_credentials'=>'manage_options',
      'options_group_id'=>__('MP_LANDED_settings'),
      "page_sections"   =>array(
        /* id settings */
        array(
          'id'         =>'id_settings',
          'title'      =>__('ID Settings'),
          'description'=>__('ID Settings'),
          'settings'   =>array(
            array('id'=>'MP_landed_artist_post_parent_id','title'=>__('Artist pages parent ID'),'params'=>array('readonly'=>'readonly'))
          )
        ),
        /* page settings */
        array('id'=>'page_settings','title'=>'Page settings','description'=>__('Page settings'),
        'settings'=>array(
          array('id'=>'MP_Landed_title_logo','type'=>'imageupload','title'=>__('Title logo')),
          array('id'=>'MP_landed_releases_image','type'=>'imageupload','title'=>__('Releases category image')),
          array('id'=>'MP_landed_events_image','type'=>'imageupload','title'=>__('Events category image')),
          array('id'=>'MP_landed_artists_image','type'=>'imageupload','title'=>__('Artists image')),
        )
      ),
      /* menu links settings */
      array('id'=>'menu_link_settings','title'=>'Menu links settings','description'=>__('Menu links settings'),
      'settings'=>array(
        array('id'=>'MP_landed_releases_link','title'=>__('Releases link')),
        array('id'=>'MP_landed_artists_link','title'=>__('Artists link')),
        array('id'=>'MP_landed_about_us_link','title'=>__('About us link')),
        array('id'=>'MP_landed_events_link','title'=>__('Events link')),
        array('id'=>'MP_landed_shop_link','title'=>__('Shop link')),
        array('id'=>'MP_landed_contact_link','title'=>__('Contact link'))
      )
    ),
    /* social links settings */
    array(
      'id'=>'social_links',
      'title'=>__('Social links'),
      'description'=>__('Social links settings'),
      'settings'=>array(
        array('id'=>'facebook_thumbnail_url','type'=>'imageupload','title'=>__('Facebook thumbnail url')),
        array('id'=>'facebook_link_custom_field_id','title'=>__('Facebook link custom field'),'value'=>'landed_artist_facebook','params'=>array('readonly'=>'readonly')),

        array('id'=>'myspace_thumbnail_url','type'=>'imageupload','title'=>__('Myspace thumbnail url')),
        array('id'=>'myspace_link_custom_field_id','title'=>__('Myspace link custom field'),'value'=>'landed_artist_myspace','params'=>array('readonly'=>'readonly')),

        array('id'=>'soundcloud_thumbnail_url','type'=>'imageupload','title'=>__('Soundcloud  thumbnail url')),
        array('id'=>'soundcloud_link_custom_field_id','title'=>__('Soundcloud link custom field'),'value'=>'landed_artist_soundcloud','params'=>array('readonly'=>'readonly')),

        array('id'=>'residentadvisor_thumbnail_url','type'=>'imageupload','title'=>__('ResidentAdvisor  thumbnail url')),
        array('id'=>'residentadvisor_link_custom_field_id','title'=>__('ResidentAdvisor link custom field'),'value'=>'landed_artist_residentadvisor','params'=>array('readonly'=>'readonly')),

        array('id'=>'presskit_thumbnail_url','title'=>__('Presskit thumbnail url'),'type'=>'imageupload'),
        array('id'=>'presskit_link_custom_field_id','title'=>__('Presskit link custom field'),'value'=>'presskit','params'=>array('readonly'=>'readonly')),

        array('id'=>'booking_thumbnail_url','title'=>__('Booking thumbnail url'),'type'=>'imageupload'),
      )
    ),
    /* other settings */
    /*footer settings*/
    array(
      'id'         =>'footer_settings',
      'title'      =>__('Footer settings'),
      'description'=>__('Footer settings'),
      'settings'   =>array(
        array('id'=>'footer_html_text','type'=>'textarea','title'=>__('Footer Html settings'),'params'=>array('rows'=>'8','cols'=>'50')),
      ),
    ),
  )
);
    //  if(class_exists(SettingPageFactory)&&is_admin()):
    $MP_social_links_settings = SettingPageFactory::Create("ThemePage",$MP_social_links_settings_params);    //$MP_social_links_settings = new PageMenuPage($MP_social_links_settings_params);
    //endif;
  }
  function init_custom_post_types(){
    if(class_exists(PostType)){
      
      /** track postType **/
      $track_params =array(
        "id"=>'track',
        'label'=>__('Track'),
        'columns'=>array(
          array('id'=>'artist','title'=>'Artist'),
          array('id'=>'release_name','title'=>'Release name'),
          array('id'=>'media_uri','title'=>'Track link'),
          array('id'=>'thumbnail','title'=>'Cover','type'=>'post_thumbnail')
        ),
        'metaboxes'=>array(
          array(
            'id'=>'trackmeta',
            'label'=>__('Track meta informations'),
            'context'=>'normal',
            'priority'=>'high',
            'post_type'=>'track',
            'fields'=>array(
              array('id'=>'artist','title'=>'Artist','type'=>'text'),
              array('id'=>'release_name','title'=>'Relase name','type'=>'text'),
              array('id'=>'media_uri','title'=>'Media URL','type'=>'upload'),
              array('id'=>'link_uri','title'=>'Link URL','type'=>'text'),
              array('id'=>'link_title','title'=>'Link title','type'=>'text'),
            )
          )
        ),
      );
      $this->trackPostType = new PostType($track_params);
    }
  }
  function init_bookingForm(){
    /** ajoute une action pour le traitement du booking form*/
    add_action("wp_ajax_nopriv_booking_form","MP_landed_Theme::handle_booking_form_ajax_request");
    add_action("wp_ajax_booking_form","MP_landed_Theme::handle_booking_form_ajax_request");
    /** enregistre le javascript qui envoie le booking form via ajax**/
    if(!is_admin()){
      wp_register_script("landed_booking_form",
        get_stylesheet_directory_uri()."/js/landed_booking_form.js");
      wp_enqueue_script("landed_booking_form");
    }
  }
  /** initialise le formlaire de souscription à la newsletter */
  function landed_news_letter_subscription_form(){
    if(class_exists(MP_FormFactory)){
      $form_params = array(
        'name'            =>'landed_news_letter_subscription_form',
        'id'              =>'landed_news_letter_subscription_form',
        'class'           =>'landed_news_letter_subscription_form',
        'successmessage'  =>'the form has been sent and will be processed soon, thank you',
        'related_post_type'=>"suscriber",
        'related_post_type_label' =>"Suscriber",
        'callback'        =>'landed_news_letter_subscription_form_success_callback',
        'fields'          =>array(
          array('name'=>'firstname','title'=>'Name','validation'=>'isnotnull'),
          array('name'=>'email','title'=>'Email','validation'=>'isemail'),
          /* array('type'=>'heading'),*/
          array('name'=>'submit','type'=>'submit','value'=>'submit')
        )
      );
      $this->landed_news_letter_form = new MP_FormFactory($form_params);
    }
  }
  /** initialise le formulaire de demande de booking**/
  function landed_booking_form($arguments=null){
    if(class_exists(MP_FormFactory)){
      $form_params = array(
        'title'         =>'Landed booking form',
        'action'        =>'',
        'name'          =>'landed_booking_form',
        'id'            =>'landed_booking_form',
        'class'         =>'mp-landed-booking-form',
        'successmessage'=>'the form is valid and was processed successfully',
        'callback'      =>"booking_form_callback",
        'related_post_type'=>"bookingrequest",
        'related_post_type_label'=>'Booking request',
        'fields'=>array(
          array('type'=>'heading','title'=>'Select a dj to book'),
          array('name'=>'artists','title'=>'Artists','type'=>'checkboxgroup','validation'=>'isnotnull',
          'fields'=>MP_Landed_BookingForm::GetArtistsFormFieldCheckboxlist()
        ),
        array('title'=>'Type of request:*','name'=>'request_type','type'=>'select','fields'=>array(
          array('type'=>'option','value'=>'LANDED production artist','title'=>'LANDED production artist'),
          array('type'=>'option','value'=>'LANDED production night','title'=>'LANDED production night'),
          array('type'=>'option','value'=>'LANDED production showcase','title'=>'LANDED production showcase'),
        )),
        array('name'=>'date','title'=>'Date for booking:*'),
        array('name'=>'company','title'=>'Promoter/Company name:*','validation'=>'isnotnull'),
        array('name'=>'venue','title'=>'Venue:*','validation'=>'isnotnull'),
        array('name'=>'country','title'=>'Country:*','validation'=>'isnotnull'),
        array('name'=>'contactname','title'=>'Contact name:*','validation'=>'isnotnull'),
        array('name'=>'email','title'=>'Email:*','validation'=>'isemail'),
        array('name'=>'phone','title'=>'Phone number:*','validation'=>'isnotnull'),

        array('type'=>'textarea','name'=>'informations','title'=>'Further informations:','params'=>array('rows'=>'8')),
        array('type'=>'heading'),
        //array('type'=>'hidden','name'=>'landed_booking_form','value'=>'landed_booking_form'),
        array('name'=>"reset",'type'=>'reset','value'=>'reset'),
        array('name'=>"submit",'type'=>'submit','value'=>'submit'),
      ),
    );
      $this->landed_booking_form = new MP_FormFactory($form_params);
    }
  }
  /** cherche une classe dans un fichier et autocharge la classe **/
  static function MP_Landed_Autoload($class){
    /**fields**/
    $ds = DIRECTORY_SEPARATOR;
    $dir = dirname(__FILE__);
    $extensions = array('.inc','.php');
    $subpaths = array("",'include','library','classes');
    foreach($subpaths as $subpath){
      foreach($extensions as $extension){
        $path = $dir.$ds.$subpath.$ds.$class.$extension;
        if(file_exists($path)){
          require_once $path;
          return;
        }
      }
    }
  }
  /** traite la requete ajax provenant du booking form */
  static function handle_booking_form_ajax_request($params){
    die(json_encode($_POST));
  }

  /** point d'entrï¿½e **/
  static function main(){
    $mp_Landed_Theme = new MP_Landed_Theme();
    spl_autoload_register("MP_Landed_Theme::MP_Landed_Autoload");
  }
}
MP_Landed_Theme::main();

/**
 * @see http://fr2.php.net/in_array
 * @see http://fr.php.net/array_splice
 */
function landed_news_letter_subscription_form_success_callback(IFormAsset $form){
  print "ok";
  for($i=0;$i<count($form->fields);$i++){
    if( in_array($form->fields[$i]->getType(),array("submit"))){
      unset($form->fields[$i]);
    }
  }
}
function booking_form_callback()
{
  print "booking_form_callback";
  $post= $_POST;
  foreach($_POST as $entry){
    if(!is_array($entry)){
      esc_html($entry);
    }
    if(isset($post['artists[]'])){

    }
  }
}
