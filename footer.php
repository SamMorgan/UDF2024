		</main>
		<footer class="site-footer" style="--section-color:<?php the_field('section_colour',20);?>">
			<?php wp_nav_menu( array(
				'container' => false,
				'menu' => 'Project Nav'
			) );?>
			<div class="subform">
				<div class="close-subform"></div>
				<form action="https://udf.us5.list-manage.com/subscribe/post?u=340b36fec9e8d11359e3786e8&amp;id=9cb3f0e66c" method="post" id="subscribe">
					<input id="name" type="text" name="NAME" id="mce-NAME" placeholder="First & Last Name">
					<input id="email" type="email" name="EMAIL" id="mce-EMAIL" placeholder="Email Address">
					<div style="position: absolute; left: -3000px;"><input type="text" name="b_340b36fec9e8d11359e3786e8_9cb3f0e66c" tabindex="-1" value=""></div>
					<button type="submit">Submit</button>
				</form>	
			</div>		
		</footer>
		<?php


		if( have_rows('news_updates','options') ):
			echo '<news-updates>
				<div class="curtain close"></div>
				<div class="popup">
				<div class="header"><h2>News & Updates</h2><button class="close close"></button></div>
				<div class="scroller">';
			while( have_rows('news_updates','options') ) : the_row();
				$headline = get_sub_field('headline');
				$image = get_sub_field('image');
				$text = get_sub_field('text');
				$link = get_sub_field('link');
				echo '<div class="news-item"><div>';
					if($link){ 
						$target = ""; 
						if(isexternal($link)){
							$target = ' target="_blank"';
						}

						echo '<a href="'.$link.'"'.$target.'>'; 
					}
					if($image){ echo '<img src="'.$image['url'].'" style="aspect-ratio:'.$image['width'].'/'.$image['height'].'">'; }
					if($headline){ echo '<h3>'.$headline.'</h3>'; }
					if($text){ echo '<div class="text">'.$text.'</div>'; }
					if($link){ echo '</a>'; }
				echo '</div></div>';

			endwhile;
			echo '</div></div></new-updates>';
		endif;

	wp_footer(); ?>
	</body>
</html>
