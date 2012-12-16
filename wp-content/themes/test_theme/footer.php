<div class="footer grid_12 alpha omega">
  <div class='grid_3 alpha'>
    &copy; 2009 M.Paraiso
  </div>
  <div class='grid_9 omega'>
  <?php
    wp_nav_menu(array('container_class'=>'menu-footer','theme_location'=>'footer'));
   ?>
  </div>
</div>
</div>
<?php wp_footer() //permet à certains plugins d'ajouter du javascript ?>
</body>
</html>
