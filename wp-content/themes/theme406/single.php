					<?php get_header(); ?>
					<?php get_sidebar(); ?>
					<div id="content" class="column">						
						<div class="search search1">
							<strong>Site Search:</strong><br />							
							<?php include (TEMPLATEPATH . "/searchform.php"); ?>							
						</div>
						<div class="indent">
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?><div class="article">
							<!--block -->
								<!--title -->
								<div class="title">
									<div class="left">
										<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
										<span class="author">Author: <?php the_author() ?></span>
									</div>
									<div class="right date"><?php tm_date() ?></div>
									<div class="clear"></div>
								</div>
								<!--title end-->
								<!--content text -->
								<div class="content_text">
									<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
								<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?><br/>
								<div class="navigation">
									<div class="left"><?php previous_post_link('&laquo; %link') ?></div>
									<div class="right"><?php next_post_link('%link &raquo;') ?></div>
									<div class="clear"></div>
								</div>							
								<div class="post" id="post-<?php the_ID(); ?>">
								<p class="postmetadataalt">
										This entry was posted
										<?php /* This is commented, because it requires a little adjusting sometimes.
											You'll need to download this plugin, and follow the instructions:
											http://binarybonsai.com/archives/2004/08/17/time-since-plugin/ */
											/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */ ?> 
										on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?>
										and is filed under <?php the_category(', ') ?>.
										You can follow any responses to this entry through the <?php comments_rss_link('RSS 2.0'); ?> feed. 
										
										<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
											// Both Comments and Pings are open ?>
											You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(true); ?>" rel="trackback">trackback</a> from your own site.
										
										<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
											// Only Pings are Open ?>
											Responses are currently closed, but you can <a href="<?php trackback_url(true); ?> " rel="trackback">trackback</a> from your own site.
										
										<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
											// Comments are open, Pings are not ?>
											You can skip to the end and leave a response. Pinging is currently not allowed.
							
										<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
											// Neither Comments, nor Pings are open ?>
											Both comments and pings are currently closed.			
										
										<?php } edit_post_link('Edit this entry.','',''); ?>
										</p>
									</div>
<br />
<br />
										<!--comment -->
										<div class="comment"><a href="<?php comments_link(); ?>" >read comments</a> (<?php comments_number('0', '1', '%', 'number'); ?>)</div>
										<!--comment end-->
									<div class="clear"></div>
								</div>
								<!--content text end-->								
							<!--block end-->
							<?php comments_template(); ?>
							</div>									
							<br style="clear:both;" />
							<?php endwhile; else: ?>
								<p>Sorry, no posts matched your criteria.</p>
							<?php endif; ?>												
						</div>
					</div>
					<?php get_footer(); ?>