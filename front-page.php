<?php get_header(); 

//get_template_part('slider', 'home');

$args_blog = array(
	'post_type' => 'post',
	'posts_per_page' => 3
);
$req_blog = new WP_Query($args_blog); ?>


	<section id="front-page">
		<div class="container">

			<div class="title">
				Association CIAO
				<img src="<?= get_template_directory_uri(); ?>/assets/blue-line.png" class="blue-line">
			</div>
			<div class="row present-ciao">
				<div class="col-md-12 col-lg-6 avoid-right-pad mb-4">
					<div class="img-maquette-1"></div>
				</div>
				<div class="col-md-12 col-lg-6 avoid-left-pad mb-4">
					<div class="white-card-front p-5">
						<h2 class="news-title">Qui sommes-nous ?</h2>
						<p>CIAO est une association qui met à disposition les compétences de professionnel·le·s reconnu·e·s dans leur domaine spécifique pour répondre aux besoins d’information et d’orientation des jeunes romands de 11-20 ans dans une multitude de domaines. A travers son site ciao.ch, elle offre une aide ponctuelle sans prise en charge thérapeutique et oriente, si nécessaire, vers une démarche plus approfondie auprès d’institutions actives au niveau local.</p>
						<div class="button-wrap" style="width: 100%;">
							<button type="button" class="btn btn-primary more-news" style="max-width: 100%;"><a href="<?= get_page_link(get_page_by_title(association)->ID); ?>">En savoir plus »</a></button>
						</div>
					</div>
				</div>
			</div>

			<?php if($req_blog->have_posts()): ?>
			<div class="title">
				Les 3 derniers articles
				<img src="<?= get_template_directory_uri(); ?>/assets/blue-line.png" class="blue-line">
			</div>
			<div class="row">
				<?php $counter = 1; while($req_blog->have_posts()): $req_blog->the_post(); ?>
					<?php if ($counter===1) {
						?>
							<div class="col-md-12 col-lg-6 avoid-right-pad mb-4">
								<div class="img-news-1"></div>
								
								<?php //the_post_thumbnail('medium', array('class' => 'img-fluid alignecenter')); ?>
							</div>
							<div class="col-md-12 col-lg-6 avoid-left-pad mb-4">
								<div class="white-card-front p-5">
									<h2 class="news-title"><?php the_title(); ?></h2>
									<?php the_excerpt(); ?>
								</div>
							</div>


						<?php
					}
					else {
						?>

							<div class="col-md-12 col-lg-6 mb-4 sec-third-news">
								<div class="img-wrap-<?= $counter; ?>"></div>
								<div class="white-card p-5 news-content">
									<h2 class="news-title"><?php the_title(); ?></h2>
									<?php the_excerpt(); ?>
								</div>
							</div>

						<?php
					}
					?>
					


				<?php $counter++; endwhile; wp_reset_postdata(); ?>
			</div> <!-- /row -->

			<div class="white-row">
				<div class="row">

					<div class="col-md-12 col-lg-6 border-resp">
						<div class="h-100 p-5 wrap-button">
							<button type="button" class="btn btn-primary more-news"><a href="<?= get_page_link(get_page_by_title(articles)->ID); ?>">Voir plus de news</a></button>
						</div>
					</div>
					<div class="col-md-12 col-lg-6">
						<div class="h-100 p-5 wrap-button">
							<button type="button" class="btn btn-primary more-news"><a href="http://ciao.ch">Visiter ciao.ch</a></button>
						</div>
					</div>
				</div>
			</div>

		</div>	 <!-- /container -->											
	</section>
	<?php endif; ?>

<?php get_footer(); ?>



<?php /*
<div class="col-12 col-sm-6 d-flex mb-3">


								
								<div class="card">
									<div class="card-header">
										<h2 class="text-center"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									</div>
									<div class="card-body">
										<a href="<?php the_permalink(); ?>">

											<img src="<?= get_template_directory_uri(); ?>/assets/tmp/img-<?= $counter; ?>.jpg" class="img-fluid alignecenter">
											

											<?php //the_post_thumbnail('medium', array('class' => 'img-fluid alignecenter')); ?>
										</a>
										<?php the_excerpt(); ?>
									</div>
									<div class="card-footer">
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