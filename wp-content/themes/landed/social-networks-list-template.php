<?php
global $post;
// SOCIAL NETWORLS LIST -->
?>
<ul class='social-networks-list'>
<? if (get_post_meta($post->ID,"landed_artist_facebook")!=null):
?>
  <li>
    <a title="facebook link"  href="<?=get_post_meta($post->ID,"landed_artist_facebook",true)?>">
    <img src="<?=get_option('facebook_thumbnail_url')?>" alt="facebook link" />
    </a>
    </li>
<?endif;?>
<? if (get_post_meta($post->ID,"landed_artist_myspace")!=null):
?>
  <li>
    <a title="myspace link" href="<?=get_post_meta($post->ID,"landed_artist_myspace",true)?>">
    <img src="<?=get_option('myspace_thumbnail_url')?>" alt="myspace link" />
    </a>
    </li>
<?endif;?>
<? if (get_post_meta($post->ID,"landed_artist_soundcloud")!=null):
?>
  <li>
    <a title="soundcloud link" href="<?=get_post_meta($post->ID,"landed_artist_soundcloud",true)?>">
    <img src="<?=get_option('soundcloud_thumbnail_url')?>" alt="soundcloud link" />
    </a>
    </li>
<?endif;?>
<? if (get_post_meta($post->ID,"landed_artist_residentadvisor")!=null):
?>
  <li>
    <a title="residentadvisor link" href="<?=get_post_meta($post->ID,"landed_artist_residentadvisor",true)?>">
    <img src="<?=get_option('residentadvisor_thumbnail_url')?>" alt="residentadvisor link" />
    </a>
    </li>
<?endif;?>
</ul>
<!-- END SOCIAL NETWORLS LIST -->

