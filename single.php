<?php get_header(); ?>
<div class="content-holder container">
	<section <?php post_class(); ?> id="content">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php if (has_post_thumbnail()): ?>
				<div class="image-block">
					<?php the_post_thumbnail( 'full' ); ?>
				</div>
			<?php endif ?>
			<?php 
			the_title('<h1>','</h1>');
			the_content();
			comments_template(); ?>
		<?php endwhile; ?>
		<div class="text-center">
			<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ) ?>" class="btn btn-primary"><?php _e('back to news','adaptricity') ?></a>
		</div>
	</section>
</div>
<?php get_footer(); ?>