<?php
/*
 * template pour le contenu du post
 */
if($post->ID != $GLOBALS['featured_ID']):?>
    <h2><a title='<? the_title()?>' href="<? the_permalink()?>">
    <!-- <?=get_post_type()?>:-->  <? the_title()?>
      </a></h2>
    <small>on
    <? the_time('M d') ?>
    in
    <? the_category(',')?>
    tagged
    <? the_tags(' ') ?>
    by
    <? the_author_posts_link()?>
    </small>
<? the_content('Readmore');

  echo '<div class="separator biggap"></div>';

endif;
