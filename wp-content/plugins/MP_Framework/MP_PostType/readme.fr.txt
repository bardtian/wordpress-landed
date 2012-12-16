MP_PostType
===========

Auteur : Marc Paraiso
Contact aikah@free.fr

Objectif
--------

Cette classe , s'occupe des diverses op�rations requises pour cr�er 
un type de Post personnalis� dans Wordpress.

Exemple
-------

Cr�er un type de poste personnalis� dans le fichier functions.php d'un th�me.

$booking_request_params = array(
        'id'=>'bookingrequest', /** l'id du post type , inf�rieur � 20 charact�res **/
        'label'=>'Booking request', /** le label , utilis� dans l'interface d'admin **/
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
