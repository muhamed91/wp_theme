<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="<?php bloginfo( 'charset' ); ?>">		
	<script type="text/javascript">
		var pathInfo = {
			base: '<?php echo get_template_directory_uri(); ?>/',
			css: 'css/',
			js: 'js/',
			swf: 'swf/',
		}
	</script>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="wrapper">
	
	
		<header id="header"<?php if (!is_single() and is_page_template() || is_blog()): ?> class="absolute-header"<?php endif ?> >
			<div class="container">	
				<?php if ($logo = get_field( 'logo', 'options' )): ?>
					<div class="logo"><a href="<?php echo home_url() ?>"><img src="<?php echo $logo['sizes']['193x32'] ?>" alt="<?php echo $logo['alt'] ?>"></a></div>
				<?php endif ?>
				<div class="drop">
					<span class="btn-demo">
						<?php if ($link = get_field( 'link', 'options' )) { echo wps_get_link($link,''); } ?>
						<span>/</span>
						<?php if ($link_two = get_field( 'link_two', 'options' )) { echo wps_get_link($link_two,''); } ?>
					</span>	
					<?php if( has_nav_menu( 'primary' ) ):?>
						<?php wp_nav_menu( array(
							'container' 	 => 'nav',
							'container_id' 	 => 'main-nav',
							'theme_location' => 'primary',
							'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							)
						);
						?>
					<?php endif ?>
				</div>
				<a href="#" class="nav-opener"><span><?php _e('Menu','adaptricity') ?></span></a>
			</div>
		</header>
		<main id="main" role="main">