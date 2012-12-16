<!-- 
************************
FEATURED 
************************
-->
<?php
$sticky =get_option('sticky_posts');
$featured = new WP_Query(array('post__in'=>$sticky));
if($featured->post_count>0):
echo '<div id="block_featuredblog" class="block"> <img src="';
  bloginfo('template_directory',true);
  echo '/images/ribbon_featuredblog.png" class="ribbon" alt="Featured Project"/><div class="block_inside">';
    while($featured->have_posts()): // tant qu'il y a des posts
    $featured->the_post(); // le post
    $wp_query->in_the_loop=true; // fait fonction les tags
    $GLOBALS['featured_ID']=$post->ID; // affect l'id featured 
    if(get_post_meta($post->ID,'large_preview',true)):
    // si il existe un meta large_preview défini
    echo '<div class="image_block"> <img width="325px" src="';
      echo get_post_meta($post->ID,'large_preview',true);
      echo '" alt="Featured Post"></div>';
    endif; 
    echo '
    <div class="text_block">
      <h2> <a href="';
          the_permalink();
          echo'title="';
          the_title();
          echo'">';
          the_title();
          echo'
      </a> </h2>
      <small>on';
        the_time('M d');
        echo'in';
        the_category(',');
        echo'tagged';
        the_tags(' ');
        echo'by';
        the_author_posts_link();
        echo'</small>';
      the_content('Read More');
      echo'</div> <div style="width:100%;display:block;clear:both;">&nbsp;</div>';
    endwhile;
    endif;
    echo'
  </div>
</div>';
wp_reset_postdata();
