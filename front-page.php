<?php get_header(); 

get_template_part('slider', 'home');

$args_blog = array(
	'post_type' => 'post',
	'posts_per_page' => 2
);
$req_blog = new WP_Query($args_blog); ?>

<?php if($req_blog->have_posts()): ?>
	<section>
		<div class="container">
			<div class="row">
				<?php while($req_blog->have_posts()): $req_blog->the_post(); ?>
					<div class="col-xs-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h2><?php the_title(); ?></h2>
							</div>
							<div class="panel-body">
								

								<?php the_post_thumbnail('medium', 
								array('class' => 'img-responsive alignecenter')); ?>

								<?php the_excerpt(); ?>
							</div>
							<div class="panel-footer">
								<p>
									<?= vk_give_me_meta_01(
											esc_attr(get_the_date('c')),
											esc_html(get_the_date()),
											get_the_category_list(', '),
											get_the_tag_list('', ', ')
										); ?>
								</p>
							</div>
						</div>
					</div>
				<?php endwhile; wp_reset_postdata(); ?>
			</div> <!-- /row -->
		</div>												
	</section>
	<?php endif; ?>


	<section>
		<div class="container">
			<?php if (have_posts()): ?>
					<?php while (have_posts()): the_post(); ?>
						<div class="row">
							<div class="col-xs-12">
								<?php the_title('<h1 class="text-center">', '</h1>'); ?>
								<?php the_content(); ?>
							</div>
						</div>

					<?php endwhile; ?>
			
			<?php else: ?>
					<div class="row">
						<div class="col-sx-12">
							<p>Aucun résultat</p>
						</div>
					</div>
			<?php endif; ?>
		</div> <!-- /container -->
	</section>

<?php get_footer(); ?>