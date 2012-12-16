					<?php get_header(); ?>
					<?php get_sidebar(); ?>
					<div id="content" class="column">						
						<div class="search search1">
							<strong>Site Search:</strong><br />							
							<?php include (TEMPLATEPATH . "/searchform.php"); ?>							
						</div>
						<div class="indent">
							<?php if (have_posts()) : ?>
							<?php while (have_posts()) : the_post(); ?>
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
									<?php the_content('Read the rest of this entry &raquo;'); ?>
<br />
<br />
										<!--comment -->
										<div class="comment"><a href="<?php comments_link(); ?>" >read comments</a> (<?php comments_number('0', '1', '%', 'number'); ?>)</div>
										<!--comment end-->
									<div class="clear"></div>
								</div>
								<!--content text end-->								
							<!--block end-->
							<?php endwhile; ?>
							<div class="navigation">
								<div class="left"><?php next_posts_link('&laquo; Previous Entries') ?></div>
								<div class="right"><?php previous_posts_link('Next Entries &raquo;') ?></div>
								<div class="clear"></div>
							</div>						
							<?php else : ?>
							<!--title -->									
								<h3 id="respond">Not Found</h3>	
							<!--title end-->
							<!--content text -->																				
							<div class="content_text">																		
								<p>Sorry, but you are looking for something that isn't here.</p>
								<div class="search"><?php include (TEMPLATEPATH . "/searchform.php"); ?></div>														
							</div>					
							<!--content text end-->
							<?php endif; ?>													
						</div>
					</div>
					<?php get_footer(); ?>