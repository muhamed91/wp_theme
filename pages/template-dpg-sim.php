<?php
/*
Template Name: DPGsim Template
*/
get_header(); 
get_template_part('blocks/visual-section');
$content = get_field( 'content' );
$image = get_field( 'image' );
$link = get_field( 'link' );
?>
<?php if ($link or $image or $content): ?>
	<section class="info-section container">
		<?php if ($image or $content): ?>
			<div class="holder">
				<?php if ($content): ?>
					<div class="text-area">
						<?php echo $content ?>
					</div>
				<?php endif ?>
				<?php if ($image): ?>
					<div class="image">
						<img src="<?php echo $image['sizes']['499x269']?>" alt="<?php echo $image['alt'] ?>">
					</div>
				<?php endif ?>
			</div>
		<?php endif ?>
		<?php if ($link = get_field( 'link' )): ?>
			<div class="text-center">
				<?php echo wps_get_link($link , 'btn btn-primary btn-big') ?>
			</div>
		<?php endif ?>
	</section>
<?php endif ?>
<?php if ( have_rows( 'accordion' ) or have_rows( 'features_list' )) : ?>
	<section class="features-section container">
		<?php if ($title = get_field( 'title' )): ?>
			<h2><?php echo $title ?></h2>
		<?php endif ?>
		<?php if ( have_rows( 'features_list' ) ) : ?>
			<ul class="features-list">
				<?php while ( have_rows( 'features_list' ) ) : the_row(); ?>
					<li>
						<?php if ($icon = get_sub_field( 'icon' )): ?>
							<div class="ico">
								<img src="<?php echo $icon['sizes']['70x60'] ?>" alt="<?php echo $icon['alt'] ?>" width="70" height="70">
							</div>
						<?php endif ?>
						<?php the_sub_field( 'description' ); ?>
					</li>
				<?php endwhile; ?>
			</ul>
		<?php endif ?>
		<?php get_template_part('blocks/accordion') ?>
	</section>
<?php endif ?>
<?php 
$content = get_field( 'content_service' );
$image = get_field( 'image_service' );
?>
<?php if ($content or $image): ?>
	<section class="service-section container text-center">
		<?php echo $content ?>
		<?php if ($image): ?>
			<div class="image">
				<img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>">
			</div>
		<?php endif ?>
	</section>
<?php endif ?>
<?php 
$content = get_field( 'content_map' );
$additional_content = get_field( 'additional_content' );
$link = get_field( 'link_map' );
?>
<?php if ($content or $additional_content): ?>
	<section class="maps-section">
		<?php if ($content): ?>
			<div class="maps-holder text-center">
				<div class="container">
					<?php echo $content ?>
					<?php if ($wps_json = wps_json()): ?>
						<div class="maps-box">
							<div class="map-block">
								<div class="map-holder" rel="<?php echo get_template_directory_uri(); ?>/json/map-styles.json" data-map='<?php echo $wps_json ?>'>
									<div class="map-wrap"></div>
									<span class="overlay"></span>
								</div>
							</div>
						</div>
					<?php endif ?>
				</div>
			</div>
		<?php endif ?>
		<?php if ($additional_content or $link): ?>
			<div class="container text-area">
				<?php echo $additional_content ?>
				<?php if ($link): ?>
					<div class="text-center">
						<?php echo wps_get_link($link,'btn btn-primary btn-big') ?>
					</div>
				<?php endif ?>
			</div>
		<?php endif ?>
	</section>
<?php endif ?>
<?php get_footer();?>