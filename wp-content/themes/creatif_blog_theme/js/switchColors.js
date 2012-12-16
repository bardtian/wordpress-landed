/**
  change la couleur de fond de la page
  2 boutons : light et dark
  l'état de la couleur de la page est stockée dans un 
  cookie, grace au plugin jquery.cookie.js
 */
jQuery(
    function(){
      $bodyId =jQuery.cookies.get('bodyId');
      jQuery('body').attr('id',$bodyId);
      jQuery('#switch-light').click(function(){
        jQuery('body').attr('id','');
        jQuery.cookies.set('bodyId',"");
        return false;
      });
      jQuery('#switch-dark').click(function(){
        jQuery('body').attr('id','dark');
        jQuery.cookies.set('bodyId',"dark");
        return false;
      });
    }
    );
