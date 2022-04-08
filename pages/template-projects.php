<?php
/*
Template Name: Projects Template
*/
get_header(); 
get_template_part('blocks/visual-section');
?>
<div class="content-holder container">
	<section id="content">
		<?php if ($content = get_field( 'content' )): ?>
			<div class="text-box">
				<?php echo $content ?>
			</div>
		<?php endif ?>
		<?php if ( have_rows( 'accordion' ) ) : ?>
			<?php get_template_part('blocks/accordion') ?>
		<?php endif; ?>
	</section>
</div>
<?php get_footer();?>