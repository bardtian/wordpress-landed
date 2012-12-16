<?php get_header(); // get header.php ?>
<div id="container" class='container alpha grid_8'>
<div class="content">
<?php
get_template_part('loop','index');// recupere loop.php
?>

  </div>
  </div>
  <?php get_sidebar(); // sidebar ?>
<?php get_footer();// get footer.php ?>
