<?php
/**
 * Template Name: Artist Page Template
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>
<div class="image-title"><?echo wp_get_attachment_image(314,'full')?></div>
		<div id="primary" class="single-artist-template">
		
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'artist_page' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
			<?=MP_Shortcode::landed_artist_page_list(array('width'=>'120px','thumbnail_width'=>'100px','font_size'=>'10px'))?>
		</div><!-- #primary -->

<?php get_footer(); ?>
