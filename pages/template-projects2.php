<?php
/*
Template Name: Products2 Template
*/
get_header(); ?>
<section class="visual-section" <?php if (has_post_thumbnail()): ?>style="background-image: url(<?php echo get_thumbnail_src('full') ?>);"<?php endif ?>>
	<div class="container">
		<div class="holder">
			<h1><?php the_title()?></h1>
		</div>
	</div>
</section>
<?php if( get_field('set_section') ): ?>
    <?php while ( has_sub_field('set_section') ) : ?>
		 <?php if( get_row_layout() == 'column_icon' ): ?>
        	
			<section class="text-down-section <?php if($text_layout = get_sub_field('text_layout')) echo  $text_layout ;?> container">
				<?php if($title = get_sub_field('title')) echo '<h2>' . $title . '</h2>';?>
				<?php if($sub_title = get_sub_field('sub_title')) echo '<p>' . $sub_title . '</p>';?>
				<?php if($column = get_sub_field('column')):?>
					<ul class="list-down">
						<?php foreach($column as $col):?>
							<li>
								<div class="ico-img">
									<?php if(!empty($col['icon']['url'])):?>
										<?php if(!empty($col['link'])):?><a href="<?php echo $col['link'];?>"><?php endif;?>
											<img src="<?php echo $col['icon']['url'];?>" height="78" width="78" alt="<?php echo $col['icon']['alt'];?>">
										<?php if(!empty($col['link'])):?></a><?php endif;?>
									<?php endif;?>
								</div>
								<?php if(!empty($col['title'])):?>
									<strong class="ttl">
										<?php if(!empty($col['link'])):?><a href="<?php echo $col['link'];?>"><?php endif;?>
											<?php echo $col['title'];?>
										<?php if(!empty($col['link'])):?></a><?php endif;?>
									</strong>
								<?php endif;?>
								<?php if(!empty($col['description'])) echo '<p>' . $col['description'] . '</p>';?>
							</li>
						<?php endforeach;?>
					</ul>
				<?php endif;?>
				<?php if($description = get_sub_field('description')) echo $description;?>
				
			</section>

        <?php elseif( get_row_layout() == 'info_graphics_section' ): ?>
		
			<section class="info-graphics-section">
				<div class="container">
					<?php if($title = get_sub_field('title')) echo '<h2>' . $title . '</h2>';?>
					<?php if($description_top = get_sub_field('description_top')) echo $description_top;?>
					
					<?php if($steps_list = get_sub_field('steps_list')):?>
						<div class="steps-list">
							<?php $count_step = 1;
							foreach($steps_list as $step):?>
								<div class="step">
									<div class="box-arrow">
										<strong class="ttl"><?php if(!empty($step['title'])) echo $step['title'];?></strong>
									</div>
									<div class="wrap">
										<span class="num"><?php echo $count_step;?></span>
										<div class="text">
											<?php if(!empty($step['description'])) echo $step['description'];?>
										</div>
									</div>
								</div>
							<?php $count_step++;
							endforeach;?>
						</div>
					<?php endif;?>
					<?php if($description_bottom = get_sub_field('description_bottom')) echo $description_bottom;?>
				</div>
			</section>
		
		<?php elseif( get_row_layout() == 'inpressionen_section' ): ?>
		
			<section class="inpressionen-section">
				<div class="container">
					<?php if($title = get_sub_field('title')) echo '<h2>' . $title . '</h2>';?>
					<?php if($image = get_sub_field('image')):?>
						<ul class="list-image">
							<?php foreach($image as $img):?>
								<li><a href="<?php echo $img['image']['url'];?>" title="<?php echo $img['image']['alt'];?>" class="lightbox"><img src="<?php echo $img['image']['sizes']['261x177'];?>" alt="<?php echo $img['image']['alt'];?>"></a></li>
							<?php endforeach;?>
						</ul>
					<?php endif;?>
				</div>
			</section>
			
		<?php elseif( get_row_layout() == 'info_row_section' ): ?>

			<?php if($info_row = get_sub_field('info_row')):?>
				<section class="text-block-section container">
					<?php foreach($info_row as $row):?>
						<div class="title-box">
							<?php if(!empty($row['title'])) echo '<h2>' . $row['title'] . '</h2>';?>
							<?php if(!empty($row['description'])) echo '<p>' . $row['description'] . '</p>';?>
							<?php if(!empty($row['text_link'])) { $text = $row['text_link']; } else { $text = _('read more'); } ?>
							<?php if(!empty($row['link'])) echo '<a href="' . $row['link'] . '" class="btn btn-default">' . $text . '</a>';?>
						</div>
					<?php endforeach;?>
				</section>
			<?php endif; ?>
		
        <?php endif; ?>

    <?php endwhile; ?>

<?php endif; ?>

<?php get_footer();?>