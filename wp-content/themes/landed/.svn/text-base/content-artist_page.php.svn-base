<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

<article
	id="post-<?php the_ID(); ?>"  <?php post_class(); ?>>
	<header class="entry-header" style='overflow:hidden;'>
        <?the_post_thumbnail('full',array('style'=>'float:left;'))?>
<div style='float:left;margin-left:20px;overflow;'>
		<h1 class="entry-title" style='padding-top:0;' >
		<?=get_the_title(); ?>
		</h1>
		<h2 class='artist-location' >
		<?=get_post_meta($post->ID, "landed_artist_location",true)?>
		</h2>
		<!-- booking -->
		<h2 class='artist-booking'>
		<a href='<?=get_page_link(17)."&artist_id=".$post->ID?>' alt='booking' title='booking'>
		<img src='<?=get_option('booking_thumbnail_url',true)?>'alt='booking'/>
		</a></h2>
		<!--presskit -->
		<h2 class='presskit'>
		<?if(get_post_meta($post->ID, "presskit",true)!=null):?>
			<a href="<?=get_post_meta(get_the_ID(), "presskit",true) ?>"> 
				<img src="<?= get_option("presskit_thumbnail_url",true)?>" alt="presskit" />
			</a>
			<?endif;?>
		</h2>
		<?// SOCIAL NETWORLS LIST -->
		// affiche la list des liens sociaux définie dans les custom fields de l'artiste.
		get_template_part("social-networks-list-template");
		//END SOCIAL NETWORLS LIST -->
		?><div>
	</header>
	<!-- .entry-header -->

	<div class="entry-content"><?php the_content(); ?><?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div>
	<!-- .entry-content -->
	<footer class="entry-meta">
























	<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>
	<!-- .entry-meta -->
</article>
<!-- #post-<?php the_ID(); ?> -->
