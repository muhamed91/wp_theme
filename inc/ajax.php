<?php
add_action( 'template_redirect', function(){
	if(  isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ! empty( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && strtolower( $_SERVER['HTTP_X_REQUESTED_WITH'] ) == 'xmlhttprequest'   ){
		if (is_blog()) {
			while ( have_posts() ) : the_post();
			get_template_part('blocks/content-post');
			endwhile;
			echo get_next_posts_link(__('load more','adaptricity'));
			exit;
		}
	}
}
);