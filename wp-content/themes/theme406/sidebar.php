			<!--side_bar -->
			<div id="side_bar" class="column">				
				<div class="indent">
					<div class="widget_style" id="statusbar">
						<?php /* If this is a 404 page */ if (is_404()) { ?>
						<?php /* If this is a category archive */ } elseif (is_category()) { ?>
						<p>You are currently browsing the archives for the <?php single_cat_title(''); ?> category.</p>
			
						<?php /* If this is a yearly archive */ } elseif (is_day()) { ?>
						<p>You are currently browsing the <a href="<?php bloginfo('home'); ?>/"><?php echo bloginfo('name'); ?></a> weblog archives
						for the day <?php the_time('l, F jS, Y'); ?>.</p>
			
						<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
						<p>You are currently browsing the <a href="<?php bloginfo('home'); ?>/"><?php echo bloginfo('name'); ?></a> weblog archives
						for <?php the_time('F, Y'); ?>.</p>
			
						<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
						<p>You are currently browsing the <a href="<?php bloginfo('home'); ?>/"><?php echo bloginfo('name'); ?></a> weblog archives
						for the year <?php the_time('Y'); ?>.</p>
			
						<?php /* If this is a monthly archive */ } elseif (is_search()) { ?>
						<p>You have searched the <a href="<?php echo bloginfo('home'); ?>/"><?php echo bloginfo('name'); ?></a> weblog archives
						for <strong>'<?php the_search_query(); ?>'</strong>. If you are unable to find anything in these search results, you can try one of these links.</p>
			
						<?php /* If this is a monthly archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
						<p>You are currently browsing the <a href="<?php echo bloginfo('home'); ?>/"><?php echo bloginfo('name'); ?></a> weblog archives.</p>
			
						<?php } ?>
					</div>
					<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(__('Sidebar','theme406')) ) : else : ?>	
					<div id="categories" class="widget_style">
						<h2><?php _e('Categories','theme406'); ?></h2>
						<ul  >
							 <?php wp_list_categories('show_count=0&title_li=0'); ?>
						</ul>						
					</div>											
					<div class="widget_style" id="archives">
						<h2><?php _e('Archives','theme406'); ?></h2>
						<ul  >
							<?php get_archives('monthly','10','custom','<li>','</li>'); ?>
						</ul>						
					</div>
					<div class="widget_style" id="recent-comments">
						<h2><?php _e('Recent Comments','theme406'); ?></h2>
						<ul><?php
$comments = $wpdb->get_results("SELECT comment_author, comment_author_url, comment_ID, comment_post_ID FROM $wpdb->comments WHERE comment_approved = '1' ORDER BY comment_date_gmt DESC LIMIT 5");
if ( $comments ) : foreach ($comments as $comment) :
echo  '<li class="recentcomments">' . sprintf(__('%1$s on %2$s'), get_comment_author_link(), '<a href="'. get_permalink($comment->comment_post_ID) . '#comment-' . $comment->comment_ID . '">' . get_the_title($comment->comment_post_ID) . '</a>') . '</li>';
endforeach; endif;?></ul>
					</div>					
					<div class="widget_style" id="meta">
						<h2><?php _e('Meta','theme406'); ?></h2>
						<ul  >
							<?php wp_register('<li>', '</li>'); ?>
							<li><?php wp_loginout(); ?></li>
							<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
							<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
							<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
							<?php wp_meta(); ?>
						</ul>						
					</div>							
					<div class="widget_style" id="links_with_style">
						<ul  >
							<li>
							<?php wp_list_bookmarks(); ?>
							</li>
						</ul>				
					</div>									
					<?php endif; ?>
					</div>						
			</div>
			<!--side_bar end-->