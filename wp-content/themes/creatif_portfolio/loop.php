<?
if(have_posts()):
  while(have_posts()):
    the_post();/*fait une it�ration dans la liste des articles*/
if(isset($_GET['s'])):
  get_template_part('content','search');
elseif(is_archive()):
  get_template_part('content','archive');
else:
  get_template_part('content',get_post_type($post));
endif;
endwhile;
?>
    <div id="posts_navigation">
      <? previous_posts_link()?>
      <? next_posts_link() ?>
    </div>
    <? else: ?>
    <h2 class="center">Not Found</h2>
    <p class="center">Sorry , no post found</p>
<?
include(TEMPLATEPATH.'/searchform.php');
endif;
?>

