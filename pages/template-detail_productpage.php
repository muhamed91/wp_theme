<?php
/*
Template Name: Productpage Template
*/
get_header(); 
get_template_part('blocks/visual-section');
?>

<?php if ( have_rows( 'productpage_list' ) ) : ?>
	<?php while ( have_rows( 'productpage_list' ) ) : the_row(); ?>
		<section class="contactpost-section container text-center"<?php if ($id = get_sub_field( 'id' )): ?> id="<?php echo $id ?>"<?php endif ?>>
			<?php if ($title = get_sub_field( 'title' )): ?>
				<h3><?php echo $title ?></h3>
			<?php endif ?>
			<div class="row contact-post-hold">
				<?php if ( have_rows( 'anker' ) ) : ?>
					<?php while ( have_rows( 'anker' ) ) : the_row(); ?>
						<article class="contact-post detailbtn">
							<?php if ($linkname = get_sub_field( 'linkname' )): ?>
								<?php if ($link = $linkname['link']): echo wps_get_link($link,'btn btn-primary'); endif;?>
							<?php endif ?>
						</article>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</section>
	<?php endwhile; ?>
<?php endif; ?>


			<?php if($productpage_content = get_field('productpage_content')):?>
					<?php foreach($productpage_content as $row):?>
				<section id="<?php echo $row['productpage_link']?>" class="info-graphics-section" style=" background-color: <?php echo $row['productpage_color'] ?>;">
					<div class="container">
						<div class="col-md-12 container">
							<?php if(!empty($row['title'])) echo '<h2>' . $row['title'] . '</h2>';?>
							<?php if(!empty($row['productpage_text'])) echo '<p>' . $row['productpage_text'] . '</p>';?>
						</div>
					</div>
				</section>
					<?php endforeach;?>

			<?php endif; ?>
		
		
<?php get_footer();?>

