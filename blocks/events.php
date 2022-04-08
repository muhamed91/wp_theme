<?php 

$posts_per_page = 0;

if(is_page_template('pages/template-home.php')){
	$posts_per_page = get_field( 'count_events' );
}else{
	$posts_per_page = get_field( 'count_events', 'options' );
}

$args = array(
	'post_status'	=>	'publish',
	'post_type'		=>	array(Tribe__Events__Main::POSTTYPE),
	'posts_per_page'=>	$posts_per_page,
	'meta_key'		=>	'_EventStartDate',
	'orderby'		=>	'_EventStartDate',
	'order'			=>	'ASC',
	'eventDisplay'	=>	'custom',
	);

$query = new WP_Query( $args );
?>
<?php if ($query->have_posts()): ?>
	<section class="post-section<?php if(is_page_template('pages/template-home.php')):?> grey-bg<?php endif?>">
		<div class="container">
			<?php if(is_page_template('pages/template-home.php')):?>
				<?php if ($title = get_field( 'title_events' )): ?>
					<h2><?php echo $title; ?></h2>
				<?php endif ?>
			<?php endif?>
			<?php while($query->have_posts()) : $query->the_post(); $id = get_the_id(); ?>
				<article class="preview-post">
					<?php if (has_post_thumbnail()): ?>
						<div class="image">
							<a class="titlehref" href="<?php the_permalink() ?>"><?php the_post_thumbnail( '346x227' ); ?></a>
						</div>
					<?php endif ?>
					<div class="text-area">
						<a class="titlehref" href="<?php the_permalink() ?>"><?php the_title('<h2>','</h2>') ?></a>
						<span class="info">
							<?php if(is_page_template('pages/template-home.php')):?>
								<em>
								<?php endif ?>
								<?php $start_date = tribe_get_start_date($id, false, 'd.m.Y'); ?>
								<?php if (tribe_get_start_date() !== tribe_get_end_date() and is_page_template('pages/template-home.php')): ?>
									<?php echo $start_date; ?> - <?php echo tribe_get_end_date($id, false, 'd.m.Y'); ?>
								<?php  else: ?>
									<?php echo $start_date ?>
								<?php endif ?>
								<?php if ($get_city = tribe_get_city()): ?>
									| <?php echo $get_city ?>
								<?php endif ?>
								<?php if(is_page_template('pages/template-home.php')):?>
								</em>
							<?php endif ?>
						</span>
						<?php the_excerpt() ?>
						<a href="<?php the_permalink() ?>" class="btn btn-default"><?php if(is_page_template('pages/template-home.php')): _e('Weiterlesen','adaptricity'); else: _e('More Info','adaptricity'); endif; ?></a>
					</div>
				</article>
			<?php endwhile; ?>
			<?php wp_reset_query();?>
		</div>
	</section>
<?php endif ?>