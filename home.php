<?php get_header(); ?>

	<section>
		<div class="container">


			<?php if (have_posts()): ?>
					<?php while (have_posts()): the_post(); 

						get_template_part('article', 'content');
						
					endwhile; ?>

			
			<?php else: ?>
					<div class="row">
						<div class="col-12">
							<p>Aucun résultat</p>
						</div>
					</div>
			<?php endif; ?>


			<div class="row">
				<?php global $wp_query;
				$big = 999999999; // need an unlikely integer
				$total_pages = $wp_query->max_num_pages;

				if ($total_pages > 1): ?>
					<div class="col-12 vk-pagination">
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
				<?php endif; // fin bloc pagination ?>
			</div>


		</div> <!-- /container -->
	</section>

<?php get_footer(); ?>