<?php
while(have_posts()):
  // tant qu'il y a des articles , affiche les articles
  the_post() ?>
<? if(! is_front_page()):?>
<div id="post">
<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
<span class='entry-author'><?php the_author_posts_link(); ?></span>
<span class='entry-date'><?php the_date();?></span>
<div class='entry-excerpt'>
<?php the_excerpt(); ?>
</div>
<div class="entry-content">
<?php the_content() ; ?>
</div>
</div>
<? else: 
the_content();
endif;
?>

<?php endwhile; ?>
<!-- posts link nav -->
  <div class='page-nav'>
  <div class="next grid_1 alpha">
  <?php next_posts_link( 'next');?>
</div>

  <div class="previous grid_1 omega">
  <?php  previous_posts_link('previous');?>
</div>
  </div>
<!-- end posts link nav -->

