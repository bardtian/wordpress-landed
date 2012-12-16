<!-- 
************************
FEATURED 
************************
-->
<div id="block_featuredblog" class="block"> <img src="<? bloginfo('template_directory')?>/images/ribbon_featuredblog.png" class="ribbon" alt="Featured Project"/>
  <div class="block_inside">
    <?php
$featured = new WP_Query(); // objet query
query_posts('posts_per_page=5'); // limite à 5 le nombre de posts
$featured->query('showposts=1'); // demande le premier post
while($featured->have_posts()): // tant qu'il y a des posts
  $featured->the_post(); // le post
$wp_query->in_the_loop=true; // fait fonction les tags
$GLOBALS['featured_ID']=$post->ID; // affect l'id featured 
if(get_post_meta($post->ID,'large_preview',true)):
  // si il existe un meta large_preview défini
?>
    <div class="image_block"> <img width='325px' src="<? echo get_post_meta($post->ID,'large_preview',true)?>" alt="Featured Post"> </div>
    <?
endif;
?>
    <div class="text_block">
      <h2> <a href="<? the_permalink()?>" title="<? the_title() ?>">
        <? the_title() ?>
        </a> </h2>
      <small>on
      <? the_time('M d')?>
      in
      <? the_category(',') ?>
      tagged
      <? the_tags(' ')?>
      by
      <? the_author_posts_link() ?>
      </small>
      <? the_content('Read More') ?>
    </div>
    <?
endwhile;
?>
  </div>
</div>
