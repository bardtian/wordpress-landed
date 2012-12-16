<?php
/**
 * Send booking form
 * Validate booking form
 * Register user to the news letter
 * Create a new booking post
 * Send a mail to client to validate booking request
 **/
class MP_Landed_BookingRequest{

  public $fields = array();

  function __construct(array $params=null){
    $this->fields['request_type'] = $params['request_type'];
    $this->fields['artists'] = $params['artists'];
    $this->fields['booking_date'] = $params['booking_date'];
    $this->fields['company_name'] = $params['company_name'];
    $this->fields['venue'] = $params['venue'];
    $this->fields['country'] = $params['country'];
    $this->fields['contact_name'] = $params['contact_name'];
    $this->fields['email'] = $params['email'];
    $this->fields['phone'] = $params['phone'];
    $this->fields['informations'] = $params['informations'];
  }

  public function post(){
    //post a new booking request to the database ;
    is_array($this->fields['artists']) AND $this->fields['artists']=implode(',',
      $this->fields['artists']);

    $result = wp_insert_post(
      array(
        'post_title'=>$this->fields['company_name'],
        'post_type'=>'bookingrequest')
      );
    if(is_int($result)){
      foreach($this->fields as $key=>$value){
        update_post_meta($result,$key,$value);
      }
    }else{
      die($result);// finit le script
    }
    return $result;
  }
}
