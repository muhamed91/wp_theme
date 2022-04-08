<?php
/*
Template Name: Normal Template
*/
get_header(); 
get_template_part('blocks/visual-section');
?>
<div class="content-holder container">
	<section id="content">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
			<?php edit_post_link( __( 'Edit', 'adaptricity' ) ); ?>
		<?php endwhile; ?>
		<?php wp_link_pages(); ?>
		<?php comments_template(); ?>
	</section>
	<?php // get_sidebar(); ?>	
</div>
<?php get_footer(); ?>
<?php get_footer();?>