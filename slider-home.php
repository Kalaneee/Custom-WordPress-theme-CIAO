<?php // requête our création du slider client

$args = array(
	'post_type'			=> 'vk_slider',
	'posts_per_page'	=> -1,
	'orderby'			=> 'menu_order',
	'order'				=> 'ASC'
);
$slider_query = new WP_Query($args);

if ($slider_query->have_posts()): ?>

	<section id="home-carousel" class="mb-3">
	<div class="container">
	<div id="slider-01" class="carousel slide">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<?php $indicator_index = 0;
			while ($slider_query->have_posts()): $slider_query->the_post(); 

				echo '<li data-target="#slider-01" data-slide-to="' . $indicator_index . '" 
				class="' . ($indicator_index == 0 ? "active" : "") . '"></li>'; ?>

				<?php $indicator_index++;
			endwhile; ?>
		</ol>

		<?php rewind_posts(); // on remet à 0 la boucle ?>


		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">


			<?php $active_test = true;
			while ($slider_query->have_posts()): $slider_query->the_post(); 

				if ($thumbnail_html = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'front-page-slider')):
					$thumbnail_src = $thumbnail_html['0'];
					$alt_val = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt');
					$is_alt_empty = true;
					if (!empty($alt_val)) {
							$is_alt_empty = false;
							$alt_val = $alt_val[0];
					} ?>

					<div class="carousel-item<?= ($active_test ? " active" : ""); ?>">
						<img class="d-block w-100" src="<?= $thumbnail_src; ?> " alt="<?= ($is_alt_empty ? "" : $alt_val); ?>">
						<div class="carousel-caption">
							<h3 data-animation="animated bounceInDown"><? the_title(); ?></h3>
							<p  data-animation="animated bounceInDown"><?php the_field('sous_titre'); ?></p>
						</div>
					</div>

					<?php $active_test = false;
				endif;
			endwhile; wp_reset_postdata(); ?>

		</div>

		<!-- Controls -->
		<a class="carousel-control-prev" href="#slider-01" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#slider-01" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div> <!-- /carousel -->
	</div> <!-- /container -->
	</section>

<?php endif; ?>
