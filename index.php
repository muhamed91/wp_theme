<?php 
get_header(); 
$title = get_field( 'title', 'options' );
$image = get_field( 'header_image', 'options' );
?>
<?php if ( have_rows( 'links' , 'options') or $title or $image) : ?>
	<section class="visual-section"<?php if ($image): ?> style="background-image: url(<?php echo $image ?>);"<?php endif ?> >
		<div class="container">
			<div class="holder">
				<?php if ($title): ?>
					<h1><?php echo $title ?></h1>
				<?php endif ?>
				<?php if ( have_rows( 'links' , 'options') ) : ?>
					<div class="row-btn">
						<?php while ( have_rows( 'links' , 'options') ) : the_row(); ?>
							<?php if ($link = get_sub_field( 'link' )) { echo wps_get_link($link , 'btn btn-default btn-white');	} ?>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
<?php endif; ?>
<?php if ( have_posts() ) : ?>
	<section class="post-section load-more-holder" id="headline">
		<div class="container post-holder">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part('blocks/content-post') ?>
			<?php endwhile; ?>
		</div>
		<?php if ($load_more = get_next_posts_link(__('LOAD MORE','adaptricity'))): ?>
			<div class="load-more-box container">
				<?php echo $load_more ?>
				<div class="dots"><span></span></div>
			</div>
		<?php endif ?>
	</section>
<?php endif; ?>
<?php 
$title = get_field( 'title_for_events', 'options' );
$image = get_field( 'background_image_for_events', 'options' );
?>
<?php if ($title or $image): ?>
	<div class="title-section"<?php if ($image): ?> style="background-image: url(<?php echo $image ?>);"<?php endif ?> id="evens">
		<div class="container">
		<?php if ($title): ?>
				<h1><?php echo $title ?></h1>
			<?php endif ?>
		</div>
	</div>
<?php endif ?>
<?php 
get_template_part('blocks/events');?>
<div class="load-more-box container">
<a href="/events" class="load-more">ALLE EVENTS</a><div class="dots"><span></span></div>

<?php get_footer(); 
?>