<?php ?>
<!DOCTYPE HTML>
<html <?php language_attributes(); ?> >
<head>
        <meta charset="UTF-8">
        <title>
<?php wp_title('|',true,'right')?>
<?php bloginfo('name')?>
</title>
<? Utilities::setCssFolder('css/960grid');?>
<?php echo Utilities::getStylesheetLink('reset.css'); ?>
<?php echo Utilities::getStylesheetLink('text.css'); ?>
<?php echo Utilities::getStylesheetLink('960.css'); ?>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url')?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url')?>" />
<?php
if(is_singular()&& get_option('thread_comments')):
  wp_enqueue_script('comment-reply');
endif;
wp_head();//utilisé par certains plugins
?>
  </head>
  <body>
  <div class="wrapper container_12">
  <div class="header clearfix">
  <h1 class='grid_12 alpha omega'><?php bloginfo('title'); ?></h1>
  <h5 class='grid_4 alpha'><?php bloginfo('description'); ?></h5>
<?php
wp_nav_menu(array('menu_class'=>'menu grid_8 omega','theme_location'=>'primary'));//le menu principal
?>
  </div>

