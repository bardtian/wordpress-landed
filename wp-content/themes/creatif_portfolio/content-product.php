<!--template pour le contenu du post-->
    <h2><a title='<? the_title()?>' href="<? the_permalink()?>">
     <?=get_post_type()?> : <? the_title()?>
      </a></h2>
    <small>on
    <? the_time('M d') ?>
    in
    <? the_taxonomies($post->ID)?>
<?if (get_the_tags()):?>
    tagged
    <? the_tags(' ') ?>
<?endif;?>
    by
    <? the_author_posts_link()?>
    </small>
<? if(get_the_post_thumbnail()):?>
<div>
<?=get_the_post_thumbnail()?>
</div>
<? endif; ?>
<h3> $  
<?=get_post_meta($post->ID,"price",true) ?>
</h3>
<div style="display:block; float:right; "><? the_content('Readmore');?>
</div>
<?
if(!is_single()){ 
  echo '<div class="separator biggap"></div>';
}
