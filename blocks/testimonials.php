<?php if ( have_rows( 'testimonials' ) ) : ?>
	<section class="carousel-section<?php if(is_page_template('pages/template-about.php')):?> small<?php endif?>"<?php if ($background_image = get_field( 'background_image' )): ?> style="background-image: url(<?php echo $background_image ?>);"<?php endif ?>>
		<span class="overlay"<?php if ($overlay_color = get_field( 'overlay_color' )): ?> style="background-color: <?php echo $overlay_color ?>;"<?php endif ?>></span>
		<div class="container">
			<div class="carousel-blackquote">
				<div class="mask">
					<div class="slideset">
						<?php while ( have_rows( 'testimonials' ) ) : the_row(); ?>
							<?php 
							$photo = get_sub_field( 'photo' );
							$excerpt = get_sub_field( 'excerpt' );
							$text_1 = get_sub_field( 'text_1' );
							$text_2 = get_sub_field( 'text_2' );
							?>
							<div class="slide">
								<?php if ($photo): ?>
									<div class="image">
										<img src="<?php echo $photo['sizes']['210x210'] ?>" alt="<?php echo $photo['alt'] ?>">
									</div>
								<?php endif ?>
								<?php if ($text_1 or $text_2 or $excerpt ): ?>
									<blockquote>
										<?php echo $excerpt ?>
										<?php if ($text_1): ?>
											<cite><?php echo $text_1 ?></cite>
										<?php endif ?>
										<?php if ($text_2): ?>
											<span class="text"><?php echo $text_2 ?></span>
										<?php endif ?>
										<?php if ($link = get_sub_field( 'link' )): echo wps_get_link($link,'btn btn-default btn-white'); endif ?>
									</blockquote>
								<?php endif ?>	
							</div>
						<?php endwhile; ?>
					</div>
				</div>
				<a class="btn-prev" href="#"><?php _e('Previous','adaptricity') ?></a>
				<a class="btn-next" href="#"><?php _e('Next','adaptricity') ?></a>
				<div class="pagination"></div>
			</div>
		</div>
	</section>
<?php endif; ?>