<?php
/*
affiche un seul post.
 */
get_header();
?>
<!-- 
************************
ARTICLES
************************
-->
<div id="block_content">
<div id="content_area" class="block">
  <div class="block_inside">
<?
get_template_part('loop');
?></div>
</div>
<? get_sidebar()?>
<!-- a Clearing DIV to clear the DIV's because overflow:auto doesn't work here -->
<div style="clear:both"></div>
</div>
</div>
</div>
</div>
<? get_footer(); // inclut footer.php ?>
