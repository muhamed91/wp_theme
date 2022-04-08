<section class="visual-section<?php if (is_page_template('pages/template-pv-ausbau.php')):?> add<?php endif?>"<?php if (has_post_thumbnail()): ?> style="background-image: url(<?php echo get_thumbnail_src('full') ?>);"<?php endif ?>>
	<div class="container">
		<div class="holder">
			<?php the_title('<h1>','</h1>') ?>
			<?php if (is_page_template('pages/template-pv-ausbau.php')): the_field( 'description' ); endif?>
			<?php if ( have_rows( 'links' )  and !is_page_template('pages/template-pv-ausbau.php')) : ?>
				<div class="row-btn">
					<?php while ( have_rows( 'links' ) ) { the_row(); 
						if ($link = get_sub_field( 'link' )) {
							echo wps_get_link($link,'btn btn-default btn-white');
						}
					} ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>