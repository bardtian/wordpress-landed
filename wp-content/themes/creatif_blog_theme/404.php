<?
/*********************/
/* 404.php           */
/*********************/
?>
<? get_header()?>
<!-- 
************************
ARTICLES
************************
-->
<div id="block_content">
<div id="content_area" class="block">
  <div class="block_inside">
<h1>404 - page not found</h1>
<p>Sorry , the page you are looking for doesnt exists</p>
<div class="separator"></div>
<h3>Sitemap</h3>
<ul>
        
<li>
<? 
wp_get_archives('type=postbypost');?>
</li>
</ul>
  </div>
</div>
<? get_sidebar()?>
<!-- a Clearing DIV to clear the DIV's because overflow:auto doesn't work here -->
<div style="clear:both"></div>
</div>
</div>
</div>
</div>
<? get_footer(); // inclut footer.php ?>
