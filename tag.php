<?php get_header(); ?>

	<section>
		<div class="container">

			<div class="row">
				<div class="col-12">
					<p class="lead">Articles avec l'étiquette <?php single_tag_title(''); ?> </p>
				</div>
			</div>


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
		</div> <!-- /container -->
	</section>

<?php get_footer(); ?>