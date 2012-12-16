<!--
/*
 * template pour le contenu du post
 */
-->
    <h3><a title='<? the_title()?>' href="<? the_permalink()?>">
    <!-- <?=get_post_type()?>:-->  <? the_title()?>
      </a></h3>
    <small>on
    <? the_time('M d') ?>
    in
    <? the_category(',')?>
    tagged
    <? the_tags(' ') ?>
    by
    <? the_author_posts_link()?>
    </small>
<? print substr(get_the_excerpt(),0,100)?>(...)

