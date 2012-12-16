<? get_header()?>
<!-- 
************************
ARTICLES
************************
-->
<div id="block_content">
<div id="content_area" class="block">
  <div class="block_inside">
  <h3>Archive of &#8220; <?wp_title(' ',true,'')?> &#8221;</h3>
<?
if(is_archive() && get_query_var('category_name')!=null):
?>
<!-- 
************************
BREAD CRUMB
************************
-->
<h4>
<?
$catId = get_category_by_slug(get_query_var('category_name'));
echo get_category_parents($catId,true," >> ",true);
?></h4>
<?
endif;
?>
<? get_template_part('loop','archive') ?>
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
