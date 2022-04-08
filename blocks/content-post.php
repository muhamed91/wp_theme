<article class="preview-post">
	<?php if (has_post_thumbnail()): ?>
		<div class="image">
			<a class="titlehref" href="<?php the_permalink() ?>"><?php the_post_thumbnail( '346x227' ); ?></a>
		</div>
	<?php endif ?>
	<div class="text-area">
		<a class="titlehref" href="<?php the_permalink() ?>"><?php the_title('<h2>','</h2>') ?></a>
		<span class="info"><time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('d.m.Y'); ?></time> <?php _e( 'by', 'adaptricity' ); ?> <?php the_author(); ?></span>
		<?php the_excerpt(); ?>
		<a href="<?php the_permalink()?>" class="btn btn-default"><?php _e('Read more','adaptricity') ?></a>
	</div>
</article>