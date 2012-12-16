<!-- 
************************
*       SIDE BAR       *
************************
-->
<div id="sidebar">
<img src="<? bloginfo('template_directory')?>/images/ribbon_browse.png" class="ribbon" alt="Featured Project"/>
<div class="block_inside">
<ul>
<?
echo "<li id='switch' class='widget'>";
if(function_exists('sidebar_switcher')):
  echo "<h3>Switch Colours</h3>";
sidebar_switcher();
endif;
?>
<?php
// @snippet si la dynamic_sidebar est nulle
//if(!function_exists('dynamic_sidebar')||!dynamic_sidebar()):
if(function_exists('dynamic_sidebar')){
  dynamic_sidebar();

}
?>
<li id="search" class="widget">
  <h3>Search</h3>
  <? include(TEMPLATEPATH.'/searchform.php'); ?>
  <!-- feed url: http://feeds.feedburner.com/FlashFlexPhpXhtmlGraphicDesign --> 
</li>
<li id="widget">
<h3>Suscribe</h3>
<ul>
  <li><a href="http://feeds.feedburner.com/FlashFlexPhpXhtmlGraphicDesign">RSS Feed</a> </li>
  <li><a href="http://feeds.feedburner.com/FlashFlexPhpXhtmlGraphicDesign"><img src="http://feeds.feedburner.com/~fc/FlashFlexPhpXhtmlGraphicDesign?bg=99CCFF&amp;fg=444444&amp;anim=0&amp;label=listeners""height="26""width="88""style="border:0""alt="" /></a></li>
 </ul> 
  </li>
  <li id="recent_posts" class="widget">
        <h3>Recent Posts</h3>
        <ul>
<? $recent = new WP_Query();
$recent->query('showpost5');
while($recent->have_posts()):$recent->the_post();
?>
                <li><a href="<? the_permalink()?>"><? the_title()?></a></li>
        <? endwhile; ?>
        </ul>
  </li>
<li id="special-plugin" class="widget">
<?
// snippet
// verifier si un plugin ou une fonction existe
if(function_exists('special_plugin')):
  echo "<h3>Special plugin</h3>{${special_plugin()}}";
else:
  echo "<h3 style='color:red;'>special_plugin n'existe pas</h3>";
endif;
?>
</li>
  <li id="archive" class="widget">
    <h3>Archives</h3>
    <ul>
<? 
//@snippet archives
wp_get_archives('type=monthly&limit=5')
?>
    </ul>
  </li>
  <li id="categories" class="widget">
        <h3>Categories</h3>
        <ul><? wp_list_categories('title_li=&orderby=name&number=7')?></ul>
  </li>
<?php 
//endif;
?>
</ul>
</div>
</div>
