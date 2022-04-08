<?php
/*
Template Name: PV-Ausbau Template
*/
get_header(); 
get_template_part('blocks/visual-section');
?>
<div class="content-holder container">
	<section id="content">
		<?php if ($wysiwyg = get_field( 'wysiwyg' )): ?>
			<div class="text-box">
				<?php echo $wysiwyg ?>
			</div>
		<?php endif ?>
		<?php if ( have_rows( 'features_list' ) ) : ?>
			<ul class="features-list add">
				<?php while ( have_rows( 'features_list' ) ) : the_row(); ?>
					<li>
						<?php if ($icon = get_sub_field( 'icon' )): ?>
							<div class="ico">
								<img src="<?php echo $icon['sizes']['34x35'] ?>" alt="<?php echo $icon['alt'] ?>">
							</div>
						<?php endif ?>
						<?php if ($title = get_sub_field( 'title' )): ?>
							<strong class="ttl"><?php echo $title ?></strong>
						<?php endif ?>
						<?php the_sub_field( 'description' ); ?>
					</li>
				<?php endwhile; ?>
			</ul>
		<?php endif; ?>
		<?php if ($wysiwyg_1 = get_field( 'wysiwyg_1' )): ?>
			<div class="text-box">
				<?php echo $wysiwyg_1 ?>
			</div>
		<?php endif ?>
		<?php if ($wysiwyg_and_image = get_field( 'wysiwyg_and_image' )): ?>
			<div class="text-box">
				<?php if ($image = $wysiwyg_and_image['image']): ?>
					<div class="image pull-right">
						<img src="<?php echo $image['sizes']['345x408'] ?>" alt="<?php echo $image['alt'] ?>">
					</div>
				<?php endif ?>
				<?php if ($wysiwyg = $wysiwyg_and_image['wysiwyg']): echo $wysiwyg; endif?>
			</div>
		<?php endif ?>
	</section>
</div>
<?php if ($background_image_1 = get_field( 'background_image_1' )): ?>
	<section class="visul-bg" style="background-image: url(<?php echo $background_image_1 ?>);"></section>
<?php endif ?>
<?php if ( have_rows( 'links' ) ) : ?>
	<section class="btn-container container">
		<?php while ( have_rows( 'links' ) ) : the_row(); ?>
			<?php if ($link = get_sub_field( 'link' )) { echo wps_get_link($link,'btn btn-default');} ?>
		<?php endwhile; ?>
	</section>
<?php endif; ?>
<?php 
get_template_part('blocks/testimonials');
get_footer();?>