<?php
class MP_Landed_BookingForm{
        /**
         /*get artists
         /*@return array
         */
  static function GetArtists($artistPostParentId=null){
    $artistPostParentId==null AND $artistPostParentId = get_option('MP_landed_artist_post_parent_id',true);
    $artists = array();
    if($artistPostParentId==null){
      return ;
    }
    $params = array('post_type'=>'page',
      'post_parent'=>$artistPostParentId,
      'orderby'=>'menu_order',
      'order'=>'ASC',
      'sort_column'=>'menu_order'
    );
    $query = new WP_Query($params);
    while($query->have_posts()){
      $query->the_post();
      array_push($artists,get_the_title());
    }
    wp_reset_postdata();
    return $artists;
  }
  static function GetArtistOptionList(){
    $artists = self::GetArtists();
    if($artists == null){
      return;
    }
    foreach($artists as $artist){
      $output.="<option value='$artist'>$artist</option>";
    }
    return $output;
  }
  static function GetArtistsFormFieldCheckboxlist(){
    $result = array();
    $artists = self::GetArtists();
    foreach($artists as $artist){
      array_push($result,array('type'=>'checkbox','value'=>$artist,'title'=>$artist));
    }
    return $result;
  }
  /**Affiche la liste des artistes sous forme de liste de checkboxs**/
  static function GetArtistCheckBoxList($name,$checkedvalues){
    $artists = self::GetArtists();
    if($artists == null){
      return;
    }
    foreach($artists as $artist){
      $checked = "";

      if(isset($checkedvalues) AND in_array($artist,$checkedvalues)){
        $checked = "checked";
      }
      $output.="<label for='landed_artist'>$artist</label>
        <input name='$name' type='checkbox' $checked value='$artist'/>";
    }
    return $output;
  }

}

