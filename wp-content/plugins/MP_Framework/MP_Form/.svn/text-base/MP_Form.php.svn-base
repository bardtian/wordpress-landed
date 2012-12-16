<?php
require_once 'MP_Utilities.php';
require_once 'IFormAsset.php';
require_once  "MP_FormValidator.php";
require_once  "MP_FormField.php";
/** form object**/
class MP_Form implements IFormAsset{

  public $id,$name,$title,$class,$action,$enctype,$method,$ajax,$value,$related_post_type;
  public $default_params=array('enctype'=>"application/x-www-form-urlencoded",'method'=>'POST');
  public $fields=array();
  private $isValid=false;
  public $successmessage;
  public $callback;
  /** constructeur **/
  function __construct(array $params=null){
    /** mélange $params avec les paramètres par défaults **/
    $params = array_merge($this->default_params,$params);
    foreach($params as $key=>$value){
      if (property_exists($this, $key)) {
        $this->$key=$value;
      }
    }
    $this->type= MP_FieldTypes::FORM;
    /** insert un champ caché dont le name et la value sont l'id du formulaire, 
     * pour vérification lors de l'envoi du formulaire.
     */
    array_push($params['fields'],array(
      'type' =>'hidden',
      'name' =>$this->id,
      'value'=>$this->id,
    ));
    /** initialisation  des champs du formulaire **/
    $this->fields = $this->init_form_fields($params['fields']);
  }
  /** crÃ©er des objets formfield chaque valeur $fields**/
  private function init_form_fields($fields){
    $formFields = array();
    foreach($fields as $value){
      array_push($formFields,new MP_FormField($value));
    }
    return $formFields;
  }
  /** affiche le formulaire*/
  function render(){
    $output = MP_HtmlRenderer::Render($this);
    return $output;
  }
  /** retourne le paramètre isValid de l'objet formulaire **/
  public function isValid()
  {
    return $this->isValid;
  }
  /** valide le formulaire */
  function validate(){
    $this->isValid =  MP_FormValidator::validate($this);
    return $this->isValid;
  }
  /** fonction callback executée une fois le formulaire envoyé **/
  function process(){
    //http://fr2.php.net/manual/fr/function.is-callable.php
    //http://www.manuelphp.com/php/language.types.callback.php
    $this->isValid AND isset($this->related_post_type) AND $this->post();
    $this->isValid AND is_callable($this->callback) AND call_user_func($this->callback,$this);
  }
  function getType(){
    return $this->type;
  }
  function __toString(){
    print_r($this);
  }
  function hasBeenSubmitted(){
    return isset($_POST[$this->id]);
  }
  /**
   *@return MP_Form
   */
  static function Create_Validate_Process($params){
    $form = new MP_Form($params);
    $form->hasBeenSubmitted() AND $form->validate() AND $form->process();
    return $form;
  }
  /**
   * @return string
   */
  static function Create_Validate_Process_Render($params){
    $form = self::Create_Validate_Process($params);
    return $form->render();
  }
  /**
   * Inserer un post relatif au type de post automatiquement crée pour le formulaire.
   */
  function post(){

    if (isset($_POST[$this->id])) {
      $postId=wp_insert_post(
        array(
          'post_title'=>$this->name.date('Y-m-d'),
          'post_type' =>$this->related_post_type,
        )
      );
      if(is_int($postId)){
        foreach($this->fields as $key=>$value){
          update_post_meta($postId,$key,$value);
        }
      }

    }
  }
}

/*
 * exemple of form params
 $form_params = array(
   'action'        =>'',
   'name'          =>'landed_booking_form',
   'id'            =>'landed_booking_form',
   'class'         =>'mp-landed-booking-form',
   'successmessage'=>'the form is valid and was processed successfully',
   'callback'      =>"booking_form_callback",
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
 */

