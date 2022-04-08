<?php
/*
Template Name: Products Template
*/
get_header(); 
get_template_part('blocks/visual-section');
?>
<?php if ( have_rows( 'posts' ) ) : ?>
	<section id="vps" class="visual-post-section">
		<div class="container">
			<div class="row">
				<?php while ( have_rows( 'posts' ) ) : the_row(); ?>
					<article class="info-post">
						<div class="holder"<?php if ($image = get_sub_field( 'background_image' )): ?> style="background-image: url(<?php echo $image ?>);"<?php endif ?>>
							<div class="wrap">
								<?php the_sub_field( 'content' ); ?>
								<?php if ($link = get_sub_field( 'link' )) { echo wps_get_link($link,'btn btn-default btn-white');} ?>
							</div>
						</div>
					</article>
				<?php endwhile; ?>
			</div>
		</div>
	</section>
<?php endif; ?>
<?php 
$content = get_field( 'content' );
$additional_content = get_field( 'additional_content' );
?>
<?php if ($content or $additional_content): ?>
	<section id="dpg" class="page-section">
		<div class="container">
			<div class="content-wrap">
				<?php echo $content ?>
				<?php if ($additional_content): ?>
					<div class="holder">
						<div class="text-area">
							<?php if ($title = $additional_content['title']): ?>
								<strong class="ttl"><?php echo $title ?></strong>
							<?php endif ?>
							<?php if ($list = $additional_content['list']): ?>
								<ul class="list">
									<?php foreach ($list as $value): ?>
										<li> <?php echo $value['text'] ?></li>
									<?php endforeach ?>
								</ul>
							<?php endif ?>
						</div>
						<?php if ($image = $additional_content['image']): ?>
							<div class="image">
								<img src="<?php echo $image['sizes']['249x238'] ?>" alt="<?php echo $image['alt'] ?>">
							</div>
						<?php endif ?>
					</div>
				<?php endif ?>
			</div>
			<?php if ($link = get_field( 'link' )) { echo wps_get_link($link , 'btn btn-default');} ?>
		</div>
	</section>
<?php endif ?>
<?php get_footer();?>