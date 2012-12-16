<?php
/*
 Plugin Name:MP Custom Shortcodes
Author: M.Paraiso
Author URI:http://aikah.free.fr
Description: Add usefull shortcodes
Version: 0.001
 */
class MP_Shortcode {
  //[test]
  static function test_function($attributes){
    return "<p><b>SHORTCODE TEST:</b>
      <br/>these are the attributes ".
      implode($attributes," ")."</p>";
  }

 /* //[test_shortcode]
  function test_shortcode($attributes) {
    $output="";
    foreach ($attributes as $key=>$value){
      $output.="$$attributes[$key]=$value\n";
    }
    return $output;
 }*/
  //[MP_BASIC_SWF src="source" width="120" height="120" align="middle" id='flash_id']
  static function basic_swf($attributes){
    if(!isset($attributes)){
      return;
    }
    array_merge(array('width'=>100,'height'=>100,'align'=>'middle'),$attributes);
    $output = <<<HEREDOC
         <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="{$attributes['width']}" height="{$attributes['height']}" align="{$attributes['align']}" id="{$attributes['id']}">
        <param name="movie" value="{$attributes['src']}" />
        <param name="quality" value="high" />
        <param name="wmode" value="opaque" />
        <param name="swfversion" value="8.0.35.0" />
        <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
        <param name="expressinstall" value="Scripts/expressInstall.swf" />
        <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
        <!--[if !IE]>-->
        <object data="{$attributes['src']}" type="application/x-shockwave-flash" width="{$attributes['width']}" height="{$attributes['height']}" align="{$attributes['align']}">
          <!--<![endif]-->
          <param name="quality" value="high" />
          <param name="wmode" value="opaque" />
          <param name="swfversion" value="8.0.35.0" />
          <param name="expressinstall" value="Scripts/expressInstall.swf" />
          <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
          <div>
            <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
            <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
          </div>
          <!--[if !IE]>-->
        </object>
        <!--<![endif]-->
      </object>
HEREDOC;
    return $output;
  }
  //[MP_PAGE_LIST  post_parent="23"
  // id="my_page_list" show_featured_image="true"]
  //sources : http://codex.wordpress.org/Function_Reference/WP_Query#Interacting_with_WP_Query
  //sources : http://codex.wordpress.org/Function_Reference/WP_Query
  static function page_list($params=array()) {
    $params = array_merge(array('post_type'=>"page","class"=>"page-artists","width"=>"600px","thumbnail_width"=>200,"thumbnail_height"=>200),$params);
    $twidth=$params['thumbnail_width'];
    $theight=$params['thumbnail_height'];
    $class=$params['class'];
    $output ="";
    $query = new WP_Query($params);
    $output.="<ul class='".$class."' style='width:{$params['width']};padding-left:0;margin-left:0'>";
    while ($query->have_posts()):
      $query->the_post();
    $output.='<li>';
    $output.= "<a title='".get_the_title()."' href='".get_permalink()."'>";
    $output.=$params['thumbnails']?get_the_post_thumbnail(null,array($twidth,$theight),array('title'=>get_the_title())):"";
    $output.= "<span style='width:$twidth;font-size:{$params['font_size']}'>".get_the_title()."</span></a>";
    $output.='</li>';
endwhile;
$output.= "<ul>";
wp_reset_postdata();
return $output;
  }
  //[MP_LANDED_ARTIST_LIST_THUMBNAILS]
  //[MP_PAGE_LIST class="page-artists" post_parent="11"  orderby='menu_order' order='ASC' sort_column='menu_order'  title_li=''  show_thumbnails="true" ]
  static function landed_artist_page_list($params=array()){
    //$params=is_array($params)?$params:array();
    $p=array("post_parent"=>11,"orderby"=>'menu_order',"order"=>'ASC',"sort_column"=>'menu_order',"thumbnails"=>true);
    return MP_Shortcode::page_list(array_merge($p,$params));
  }

}
add_shortcode('TEST','MP_Shortcode::test_function');
add_shortcode("MP_LANDED_ARTIST_PAGE_LIST", "MP_Shortcode::landed_artist_page_list");
add_shortcode("MP_BASIC_SWF", "MP_Shortcode::basic_swf");
add_shortcode("MP_PAGE_LIST","MP_Shortcode::page_list");
