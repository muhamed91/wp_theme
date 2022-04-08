<?php get_header(); ?>
<div class="content-holder container">
	<section id="content">
		<?php if ( have_posts() ) : ?>
			<div class="title">
				<h1><?php printf( __( 'Search Results for: %s', 'adaptricity' ), '<span>' . get_search_query() . '</span>'); ?></h1>
			</div>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'blocks/content'); ?>
			<?php endwhile; ?>
			<?php get_template_part( 'blocks/pager' ); ?>
		<?php else : ?>
			<?php get_template_part( 'blocks/not_found' ); ?>
		<?php endif; ?>
	</section>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>