<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<title>
<?php bloginfo('name')?>
</title>
<link href="<? bloginfo('stylesheet_url')?>" rel="stylesheet" type="text/css" />
<!-- RSS -->
<link rel="alternate" type='application/rss+xml' title='RSS 2.0' href="http://feeds.feedburner.com/FlashFlexPhpXhtmlGraphicDesign" />
<!-- trackback -->
<link rel='pingback' href='<? bloginfo('pingback_url')?>'/>
<!--favicon.ico -->
<link rel="shortcut icon" href="<? bloginfo('stylesheet_directory')?>/<? bloginfo('template_directory')?>/images/favicon.ico" />
<!-- plugins -->
<? wp_head()?>
</head>
<body>
<div id="main">
<div class="container">
<!-- 
************************
HEADER
************************
-->
<div id="header">
  <ul id="menu">
<?php /** ancien menu 
<li> <a title='home' href="<? bloginfo('url')?>">Home</a> </li>
<? wp_list_pages('title_li=')?>
 */
/* test nouveau menu */
wp_nav_menu(array('theme_location'=>'primary'));
?>  </ul>
  <div id="logo"> <a href="<? bloginfo('url')?>">
    <h1>Creatif</h1>
    <small>A Family of Rockstar Wordpress Themes</small> </a></div>
</div>
