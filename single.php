<?php get_header(); ?>

	<section>
		<div class="container">
			<?php if (have_posts()): ?>
					<?php while (have_posts()): the_post(); ?>

							<div class="row mb-5">
								<div class="col-12">
									<h1><?php the_title(); ?></h1>
									<p>
										<?= vk_give_me_meta_01(
												esc_attr(get_the_date('c')),
												esc_html(get_the_date()),
												get_the_category_list(', ')
											); ?>
									</p>
									<?php the_content(); ?>
								</div>
							</div> <!-- /row -->
					<?php endwhile; ?>

					<div class="row">
						<div class="col-12">
							<nav>
								<ul class="vk-pager">
									<li class="float-left"><?php previous_post_link(); ?></li>
									<li class="float-right"><?php next_post_link(); ?></li>
								</ul>
							</nav>
						</div> <!-- col-12 -->
					</div> <!-- /row -->


			
			<?php else: ?>
					<div class="row">
						<div class="col-12">
							<p>Aucun résultat</p>
						</div>
					</div>
			<?php endif; ?>
		</div> <!-- /container -->
	</section>

<?php get_footer(); ?>