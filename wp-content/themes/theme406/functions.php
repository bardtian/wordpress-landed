<?

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => __('Sidebar','theme406'),
		'before_widget' => '<div id="%1$s" class="widget_style">',  
		'after_widget' => '</div>', 
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));


// Links

function widget_links_with_style() {
			?>
			<div class="widget_style" id="links_with_style">
				<ul>
					<?php wp_list_bookmarks(); ?>
				</ul>				
			</div>						
   <?
   }
   if ( function_exists('register_sidebar_widget') )
   register_sidebar_widget(__(' Links With Style'), 'widget_links_with_style');


// Search 	
	function widget_theme406_search() {
?>

			<div class="widget_style search">																		
				<?php include (TEMPLATEPATH . "/searchform.php"); ?>										
			</div>						
					
<?php
}
if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('Search'), 'widget_theme406_search');
   
   

function tm_date($d='', $before='', $after='', $echo = true) {
	global $id, $post, $day, $previousday, $newday;
	$the_date = '';
	$the_date .= $before;
	if ( $d=='' )
		$the_date .= mysql2date(get_option('date_format'), $post->post_date);
	else
		$the_date .= mysql2date($d, $post->post_date);
	$the_date .= $after;
	$previousday = $day;
	$the_date = apply_filters('the_date', $the_date, $d, $before, $after);
	if ( $echo )
		echo $the_date;
	else
		return $the_date;
}
?>