</main>
<footer id="footer">
	<div class="container">
		<div class="row">
			<?php if ($address = get_field( 'address', 'options' )): ?>
				<article class="block col-md-4">
					<?php if ($title = $address['title']): ?>
						<h3><?php echo $title ?></h3>
					<?php endif ?>
					<?php if ($address = $address['address']): ?>
						<address><?php echo $address ?></address>
					<?php endif ?>
				</article>
			<?php endif ?>
			<?php if ($contact = get_field( 'contact', 'options' )): ?>
				<article class="block col-md-4">
					<?php if ($content = $contact['content']) { echo $content; }  ?>
					<?php if ($text = $contact['text']): ?>
						<span class="text"><?php echo $text ?></span>
					<?php endif ?>
				</article>
			<?php endif ?>
			<?php if( has_nav_menu( 'primary' ) ):?>
				<article class="block col-md-3">
					<?php wp_nav_menu( array(
						'container' 	 => false,
						'theme_location' => 'footer',
						'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						)
					);
					?>
				</article>
			<?php endif ?>
			<?php if ($social_media = get_field( 'social_media', 'options' )): ?>
				<article class="block col-md-1">
					<?php if ($content = $social_media['content']) { echo $content; }  ?>
					<?php if ($text = $social_media['text']): ?>
						<span class="text"><?php echo $text ?></span>
					<?php endif ?>
				</article>
			<?php endif ?>
		</div>
		<div class="copyright">
		<p>© 2018 by ADAPTRICITY | Powered by <a href="https://www.bexeo.com" target="_blank">Bexeo GmbH</a></p>	
		</div>
	</div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>