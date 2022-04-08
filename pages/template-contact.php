<?php
/*
Template Name: Contact Template
*/
get_header(); 
get_template_part('blocks/visual-section');
?>
<?php if ( have_rows( 'contact_list' ) ) : ?>
	<section class="contact-section container">
		<div class="row">
			<?php while ( have_rows( 'contact_list' ) ) : the_row(); ?>
				<div class="col-sm-4">
					<?php if ( have_rows( 'list' ) ) : ?>
						<ul class="contact-list">
							<?php while ( have_rows('list' ) ) : the_row();?>
								<li<?php if(get_row_layout() == 'text'):?> class="mark"<?php endif?>>
								<?php if ($icon_image = get_sub_field( 'icon_image' )):
									if($icon_image['caption'] == '50') { $size = '50'; } else {  $size = '40'; }
								?>
									<img class="<?php if ($icon = get_sub_field( 'icon' )) echo $icon;?>" src="<?php echo $icon_image['url'] ?>" alt="image description" width="<?php echo $size;?>" height="<?php echo $size;?>">
								<?php endif ?>
								<?php if ($address = get_sub_field( 'address' )): ?>
									<address><?php echo $address ?></address>
								<?php endif ?>
								<?php if ($phone = get_sub_field( 'phone' )): ?>
									<a href="tel:<?php echo clean_phone($phone) ?>"><?php echo $phone ?></a>
								<?php endif ?>
								<?php if ($email = antispambot(get_sub_field( 'email' ))): ?>
									<a href="mailto:<?php echo $email ?>"><?php echo $email ?></a>
								<?php endif ?>
								<?php if ($text = get_sub_field( 'text' )): ?>
									<span><?php echo $text ?></span>
								<?php endif ?>
							</li>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>
			</div>
		<?php endwhile; ?>
	</div>
</section>
<?php endif; ?>
<?php if ( have_rows( 'contacts_list' ) ) : ?>
	<?php while ( have_rows( 'contacts_list' ) ) : the_row(); ?>
		<section class="contactpost-section container text-center"<?php if ($id = get_sub_field( 'id' )): ?> id="<?php echo $id ?>"<?php endif ?>>
			<?php if ($title = get_sub_field( 'title' )): ?>
				<h3><?php echo $title ?></h3>
			<?php endif ?>
			<div class="row contact-post-hold">
				<?php if ( have_rows( 'list' ) ) : ?>
					<?php while ( have_rows( 'list' ) ) : the_row(); ?>
						<article class="contact-post col-sm-4">
							<?php if ($photo = get_sub_field( 'photo' )): ?>
								<div class="photo">
									<img src="<?php echo $photo['sizes']['121x121'] ?>" alt="<?php echo $photo['alt'] ?>">
								</div>
							<?php endif ?>
							<?php if ($info = get_sub_field( 'info' )): ?>
								<?php if ($full_name = $info['full_name']): ?>
									<strong class="ttl"><?php echo $full_name ?></strong>
								<?php endif ?>
								<?php if ($position = $info['position']): ?>
									<strong class="pos"><?php echo $position ?></strong>
								<?php endif ?>
								<?php if ($phone = $info['phone']): ?>
									<span>T: <a href="tel:<?php echo clean_phone($phone) ?>"><?php echo $phone ?></a></span>
								<?php endif ?>
								<?php if ($email = antispambot($info['email'])): ?>
									<span><a class="btn btn-primary" href="mailto:<?php echo $email ?>">Contact Me</a></span>
								<?php endif ?>
							<?php endif ?>
						</article>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</section>
	<?php endwhile; ?>
<?php endif; ?>
<?php get_footer();?>