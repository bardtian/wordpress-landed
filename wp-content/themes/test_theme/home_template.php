<?php 

/*
 Template Name:HomeTemplate
 */
get_header(); // get header.php ?>
<!-- contenu temporaire @TODO à supprimer -->
Home page template
<!-- fin contenu temporaire -->
<div class="content">
<?php
get_template_part('loop','home_template');
?>
</div>
<div class="sidebar">
</div>
<?php get_footer();// get footer.php ?>
