MP_PostType
===========

Auteur : Marc Paraiso
Contact aikah@free.fr

Objectif
--------

Cette classe , s'occupe des diverses opérations requises pour créer 
un type de Post personnalisé dans Wordpress.

Exemple
-------

Créer un type de poste personnalisé dans le fichier functions.php d'un thème.

$booking_request_params = array(
        'id'=>'bookingrequest', /** l'id du post type , inférieur à 20 charactères **/
        'label'=>'Booking request', /** le label , utilisé dans l'interface d'admin **/
        'metaboxes'=>array( /** les metaboxes du type de post **/
          array(
            'id'=>'bookingrequestmeta',
            'label'=>'Booking meta infos',
            'post_type'=>'bookingrequest',
            'context'=>'normal',
            'priority'=>'high',
            'fields'=>array(
              array('title'=>'Request type','id'=>'request_type','type'=>'text'),
              array('title'=>'Artists','id'=>'artists','type'=>'textarea'),
              array('title'=>'Booking date','id'=>'booking_date','type'=>'text'),
              array('title'=>'Company name','id'=>'company_name','type'=>'text'),
              array('title'=>'Venue','id'=>'venue','type'=>'text'),
              array('title'=>'Country','id'=>'country','type'=>'text'),
              array('title'=>'Contact name','id'=>'contact_name','type'=>'text'),
              array('title'=>'Email','id'=>'email','type'=>'text'),
              array('title'=>'Phone','id'=>'phone','type'=>'text'),
              array('title'=>'Informations','id'=>'informations','type'=>'textarea'),
            ),
          ),
        ),
        "columns"=>array(
          array('title'=>'Company name','id'=>'company_name'),
          array('title'=>'Venue','id'=>'venue'),
          array('title'=>'Country','id'=>'country'),
          array('title'=>'Phone','id'=>'')
        ),
      );
$this->bookingRequestPostType = new PostType($booking_request_params);
