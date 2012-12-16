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
