<?php get_header(); ?>

	<section>
		<div class="container white-card">
			<?php if(have_posts()): ?>
				<?php while(have_posts()): the_post(); ?>
					<div class="row mb-3">
						<div class="col-12">
							<h1 class="title"><a href="<?php the_permalink(); ?>">
								<?php 
								global $pagename;
								if ($pagename == "ciao-ch") {
									the_title(); 
									echo " offre";
								}
								else {
									the_title(); 
								}
						
							?></a></h1>
							<?php the_content(); ?>
						</div>
					</div> <!-- /row -->
				<?php endwhile; ?>

			<?php else: ?>
				<div class="row">
					<div class="col-12">
						<p>Il n'y a pas de résultats.</p>
					</div>
				</div>
			<?php endif; ?>
		</div> <!-- /container -->
	</section>

<?php get_footer(); ?>