<?php
/*
Template Name: Home Template
*/
get_header();
get_template_part('blocks/visual-section');
?>
<?php if ( have_rows( 'infoposts' ) ) : ?>
	<section class="infopost-section container">
		<div class="row" id="infopost">
			<?php while ( have_rows( 'infoposts' ) ) : the_row(); ?>
				<article class="post col-sm-4" id="<?php the_sub_field('anker'); ?>" >
					<?php 
					$image = get_sub_field( 'image' );
					$title = get_sub_field( 'title' );
					?>
					<?php if ($image or $title): ?>
						<div class="image">
							<?php if ($image): ?>
								<img src="<?php echo $image['sizes']['346x269'] ?>" alt="<?php echo $image['alt'] ?>">
							<?php endif ?>
							<?php if ($title): ?>
								<strong class="ttl"><?php echo $title ?></strong>	
							<?php endif ?>
						</div>
					<?php endif ?>
					<?php the_sub_field( 'excerpt' ); ?>
					<?php if ($link = get_sub_field( 'link' )) { echo wps_get_link($link,'btn btn-default');} ?>
				</article>
			<?php endwhile; ?>
		</div>
	</section>
<?php endif; ?>
<?php get_template_part('blocks/testimonials') ?>
<?php if ( have_rows( 'projects' ) ) : ?>
	<section class="projects-section">
		<div class="container">
			<?php if ($title = get_field( 'title' )): ?>
				<h3><?php echo $title ?></h3>
			<?php endif ?>
			<ul class="project-list">
				<?php while ( have_rows( 'projects' ) ) : the_row(); ?>
					<?php 
					$image = get_sub_field( 'image' );
					$link  = get_sub_field( 'link' );
					?>
					<?php if ($image): ?>
						<li>
							<?php if ($link): ?>
								<a href="<?php echo esc_url($link) ?>">
								<?php endif ?>
								<img class="img-responsive" width="145" height="145" src="<?php echo $image['sizes']['210x210'] ?>" alt="<?php echo $image['alt'] ?>">
								<?php if ($link): ?>
								</a>
							<?php endif ?>
						</li>
					<?php endif ?>
				<?php endwhile; ?>
			</ul>
		</div>
	</section>
<?php endif; ?>
<?php $query = new WP_Query( array('post_type' => 'post','post_status' => 'publish','ignore_sticky_posts' => true,'posts_per_page' => 3) );?>
<?php if ( $query->have_posts() ) : ?>
	<section class="post-section">
		<div class="container">
			<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				<?php get_template_part('blocks/content-post' ); ?>
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
		</div>
	</section>
<?php endif; ?>
<?php 
get_template_part('blocks/events');
get_footer();
?>