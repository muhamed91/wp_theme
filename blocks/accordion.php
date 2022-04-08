<?php if ( have_rows( 'accordion' ) ) : ?>
	<div class="accordion-box">
		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			<?php $i = 1; ?>
			<?php while ( have_rows( 'accordion' ) ) : the_row(); ?>
				<div class="panel panel-<?php if(is_page_template('pages/template-dpg-sim.php')):?>primary<?php else:?>default<?php endif?>">
					<div class="panel-heading" role="tab" id="heading<?php echo $i?>">
						<h4 class="panel-title">
							<a<?php if($i != 1):?> class="collapsed"<?php endif?> role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i?>" aria-expanded="true" aria-controls="collapse<?php echo $i?>"><?php the_sub_field( 'title' ); ?></a>
						</h4>
					</div>
					<div id="collapse<?php echo $i?>" class="panel-collapse collapse<?php if($i == 1):?> in<?php endif?>" role="tabpanel" aria-labelledby="heading<?php echo $i?>">
						<div class="panel-body">
							<?php the_sub_field( 'content' ); ?>
							<?php if ( $images = get_sub_field( 'gallery' ) ) : ?>
								<div class="row">
									<?php foreach ( $images as $image ) : ?>
										<div class="img col-xs-4">
											<img src="<?php echo $image['sizes']['319x179'] ?>" alt="<?php echo $image['alt'] ?>">
										</div>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<?php $i++ ?>
			<?php endwhile; ?>
		</div>
	</div>
<?php endif ?>