<?php get_header(); ?>

	<section class="list-articles">
		<div class="container">

			<div class="title">Tous les articles
				<img src="<?= get_template_directory_uri(); ?>/assets/blue-line.png" class="blue-line">
			</div>

			<?php if (have_posts()):
				$links = array();
			?>
					<?php $index = 1;
					while (have_posts()): the_post();
						//get_template_part('article', 'content');
						include(locate_template('article-content.php'));
						array_push($links, $link);
						$index++;
					endwhile; ?>


			<?php else: ?>
					<div class="row">
						<div class="col-12">
							<div class="white-card">
								<h1>Désolé, rien n'a été trouvé!</h1>
								<p>Nous ne pouvons trouver ce que vous recherchez. Utilisez éventuellement un autre mot clé pour votre recherche.</p>

								<form role="search" method="get" id="searchform" class="searchform" action="https://associationciao.ch/">
									<div class="form-row">
										<div class="col">
											<input class="form-control" type="text" value="" name="s" id="s">
										</div>
										<div class="col">
											<button class="btn btn-primary btn-search" type="submit" id="searchsubmit" value="Rechercher"><span>Rechercher</span></button>
										</div>
									</div>
								</form>

							</div>
						</div>
					</div>
			<?php endif; ?>


			<div class="row">
				<?php global $wp_query;
				$big = 999999999; // need an unlikely integer
				$total_pages = $wp_query->max_num_pages;

				if ($total_pages > 1): ?>
					<div class="col-12 vk-pagination">
						<div class="pagination-wrapper">
							<?= paginate_links(array(
								'base'		=> str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
								'format'	=> '/page/%#%',
								'current'	=> max(1, get_query_var('paged')),
								'total'		=> $total_pages,
								'prev_next'	=> True,
								'prev_text'	=> '« Page précédente',
								'next_text'	=> 'Page suivante »'
							)); ?>
						</div>
					</div>
				<?php endif; // fin bloc pagination ?>
			</div>


		</div> <!-- /container -->
	</section>

	<script type="text/javascript">

		var links_js = <?= json_encode($links)?>;
		if (links_js != null) {

			links_js.forEach( function(element, index) {

				var class_name = "." + (1 + index) + "-img";
				var url = "url(" + element + ")";

				jQuery(class_name).css({
					width: '100%',
					height: '100%',
					background: url,
					"background-size" : "cover",
					"background-position" : "center"
				});

			});
		}

	</script>

<?php get_footer(); ?>)
