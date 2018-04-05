<div class="row">
	<div class="d-none d-md-block col-md-2 col-lg-2 mb-4"> <!-- La vignette -->
		<?php if ($thumbnail_html = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail')) :
		$thumbnail_src = $thumbnail_html['0']; ?>
			<!--<img class="img-fluid img-thumbnail" src="<?= $thumbnail_src ?>" alt="">-->
			<!--<div class="img-maquette-1">-->
				<img  class="img-search-list" src="<?= $thumbnail_src ?>" alt="">
			<!--</div>-->
		<?php
	else: 
		?>
		<img  class="img-search-list" src="<?= get_template_directory_uri(); ?>/assets/articles-sans-img.png" alt="">
		<?php
		endif; ?>
	</div>
	<div class="col-12 col-md-10 avoid-left-pad mb-4">
		<div class="white-card-front p-3">
			<h3><a  class="title-article-list" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

			<p>
				<?= vk_give_me_meta_01(
						esc_attr(get_the_date('c')),
						esc_html(get_the_date()),
						get_the_category_list(', '),
						get_the_tag_list('', ', ')
					); ?>
			</p>

			<?php the_excerpt(); ?>
		</div>
	</div>
</div> <!-- /row -->



<?php /* OLD

<div class="row">
	<div class="col-2"> <!-- La vignette -->
		<?php if ($thumbnail_html = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail')) :
		$thumbnail_src = $thumbnail_html['0']; ?>
			<img class="img-fluid img-thumbnail" src="<?= $thumbnail_src ?>" alt="">
		<?php
		endif; ?>
	</div>
	<div class="col-10">
		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

		<p>
			<?= vk_give_me_meta_01(
					esc_attr(get_the_date('c')),
					esc_html(get_the_date()),
					get_the_category_list(', '),
					get_the_tag_list('', ', ')
				); ?>
		</p>

		<?php the_excerpt(); ?>
	</div>
</div> <!-- /row -->

?>