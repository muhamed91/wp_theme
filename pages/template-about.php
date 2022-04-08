<?php
/*
Template Name: About Template
*/
get_header(); 
get_template_part('blocks/visual-section');
?>
<?php if ($content = get_field( 'content' )): ?>
	<div class="content-holder container">
		<section id="content">
			<div class="text-box">
				<?php echo $content ?>
			</div>
		</section>
	</div>
<?php endif ?>
<?php 
$title = get_field( 'title' );
$image = get_field( 'image' );
$add_image = get_field( 'add_image' );
?>
<?php if ($title or $image): ?>
	<section class="figure-section">
		<div class="container">
			<?php if ($title): ?>
				<h3><?php echo $title ?></h3>
			<?php endif ?>
			<?php if ($image || $add_image): ?>
				<div class="image row">
					<?php if ($image): ?>
						<div class="col-sm-3 col-md-offset-2 col-sm-offset-1">
							<img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>">
						</div>
					<?php endif ?>
					<?php if ($add_image): ?>
						<div class="col-sm-8 col-md-6">
							<img src="<?php echo $add_image['url'] ?>" alt="<?php echo $add_image['alt'] ?>">
						</div>
					<?php endif ?>
				</div>
			<?php endif ?>
		</div>
	</section>
<?php endif ?>
<?php if ( have_rows( 'history_list' ) ) : ?>
	<section class="history-section" <?php if ($background_image = get_field( 'background_image_history' )): ?> style="background-image: url(<?php echo $background_image ?>);"<?php endif ?>>
		<div class="container-fluid">
			<?php if ($title = get_field( 'title_history' )): ?>
				<h2 class="text-center"><?php echo $title ?></h2>
			<?php endif ?>
			<?php if ( have_rows( 'history_list' ) ) : ?>
				<div class="history-holder">
					<ul class="history-list">
						<?php $i = 1; ?>
						<?php while ( have_rows( 'history_list' ) ) : the_row(); ?>
							<?php if ($i % 2 == 1): ?>
								<li>
									<?php if ($year = get_sub_field( 'year' )): ?>
										<span class="year"><?php echo $year ?></span>
									<?php endif ?>
									<?php the_sub_field( 'description' ); ?>
								</li>
							<?php endif ?>
							<?php $i++ ?>
						<?php endwhile; ?>
					</ul>
					<span class="line">line</span>
					<ul class="history-list">
						<?php $i = 1; ?>
						<?php while ( have_rows( 'history_list' ) ) : the_row(); ?>
							<?php if ($i % 2 == 0): ?>
								<li>
									<?php if ($year = get_sub_field( 'year' )): ?>
										<span class="year"><?php echo $year ?></span>
									<?php endif ?>
									<?php the_sub_field( 'description' ); ?>
								</li>
							<?php endif ?>
							<?php $i++ ?>
						<?php endwhile; ?>
					</ul>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>
<?php if ( have_rows( 'awards_list' ) ) : ?>
	<section class="projects-section">
		<div class="container">
			<?php if ($title = get_field( 'title_awards' )): ?>
				<h2 class="text-center"><?php echo $title ?></h2>
			<?php endif ?>
			<ul class="project-list">
				<?php while ( have_rows( 'awards_list' ) ) : the_row(); ?>
					<?php if ($image = get_sub_field( 'image' )): ?>
						<?php $link = get_sub_field( 'link' ); ?>
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
<?php if ( have_rows( 'partners_list' ) ) : ?>
	<section class="projects-section add-blue-bg">
		<div class="container">
			<?php if ($title = get_field( 'title_partners' )): ?>
				<h2 class="text-center"><?php echo $title ?></h2>
			<?php endif ?>
			<ul class="project-list">
				<?php while ( have_rows( 'partners_list' ) ) : the_row(); ?>
					<?php if ($image = get_sub_field( 'image' )): ?>
						<?php $link = get_sub_field( 'link' ); ?>
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

<div id="team">
<?php if ( have_rows( 'contacts_list_about' ) ) : ?>
	<?php while ( have_rows( 'contacts_list_about' ) ) : the_row(); ?>
		<section class="contactpost-section container text-center"<?php if ($id = get_sub_field( 'id' )): ?> id="<?php echo $id ?>"<?php endif ?>>
			<?php if ($title = get_sub_field( 'title' )): ?>
				<h3><?php echo $title ?></h3>
			<?php endif ?>
			<div class="row contact-post-hold">
				<?php if ( have_rows( 'list' ) ) : ?>
					<?php while ( have_rows( 'list' ) ) : the_row(); ?>
						<article class="contact-post col-sm-3">
							<?php if ($photo = get_sub_field( 'photo' )): ?>
								<div class="photo">
									<img src="<?php echo $photo['sizes']['121x121'] ?>" alt="<?php echo $photo['alt'] ?>">
								</div>
							<?php endif ?>
							<?php if ($info = get_sub_field( 'info' )): ?>
								<?php if ($full_name = $info['full_name']): ?>
									<strong class="ttlabout"><?php echo $full_name ?></strong>
								<?php endif ?>
								<?php if ($position = $info['position']): ?>
									<strong class="posabout"><?php echo $position ?></strong>
								<?php endif ?>
							<?php endif ?>
						</article>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</section>
	<?php endwhile; ?>
<?php endif; ?>
</div>

<?php get_template_part('blocks/testimonials') ?>
<?php if ( have_rows( 'accordion' ) ) : ?>
	<section class="accordion-section container">
		<?php if ($title = get_field( 'title_accordion' )): ?>
			<h3><?php echo $title ?></h3>
		<?php endif ?>
		<?php get_template_part('blocks/accordion') ?>
	</section>
<?php endif; ?>
<?php get_footer();?>