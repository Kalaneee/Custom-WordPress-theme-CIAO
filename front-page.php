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
							<a href="<?= get_page_link(get_page_by_title(association)->ID); ?>" class="btn btn-primary more-news" style="max-width: 100%;">
								<span class="" style="line-height: 43px; vertical-align: middle;">En savoir plus »</span>
							</a>
						</div>

						<div class="contener" style="">
  							<div class="ed"></div>
						</div>
						
					</div>
				</div>
			</div>

			<?php 
			if($req_blog->have_posts()): 
				$links = array();
			?>
			<div class="title">
				Les 3 derniers articles
				<img src="<?= get_template_directory_uri(); ?>/assets/blue-line.png" class="blue-line">
			</div>
			<div class="row">
				<?php $counter = 1; while($req_blog->have_posts()): $req_blog->the_post(); ?>
					<?php if ($counter===1) {
						?>
							<div class="col-md-12 col-lg-6 avoid-right-pad mb-4">
								<div class="img-news-1 <?= $counter . '-img'?>"></div>
								
								<?php //the_post_thumbnail('medium', array('class' => 'img-fluid alignecenter')); ?>

								<?php 
								if ($thumbnail_html = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large')) :
									$thumbnail_src = $thumbnail_html['0'];
									$link = $thumbnail_src;
								else:
									$link = get_template_directory_uri() . '/assets/articles-sans-img.png';
									endif; 
								array_push($links, $link);
									?>

							</div>
							<div class="col-md-12 col-lg-6 avoid-left-pad mb-4">
								<div class="white-card-front p-5">
									<h2 class="news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<?php the_excerpt(); ?>
								</div>
							</div>


						<?php
					}
					else {
						?>

							<div class="col-md-12 col-lg-6 mb-4 sec-third-news">
								<div class="img-wrap-<?= $counter; ?> <?= $counter . '-img'?>"></div>


								<?php 
								if ($thumbnail_html = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large')) :
									$thumbnail_src = $thumbnail_html['0']; 
									$link = $thumbnail_src;
								else:
									$link = get_template_directory_uri() . '/assets/articles-sans-img.png';
									endif; 
								array_push($links, $link);
									?>


								<div class="white-card p-5 news-content">
									<h2 class="news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
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
							<a href="<?= get_page_link(get_page_by_title(articles)->ID); ?>" class="btn btn-primary more-news" style="max-width: 100%;">
								<span class="" style="line-height: 43px; vertical-align: middle;">Voir plus d'articles</span>
							</a>
						</div>
					</div>
					<div class="col-md-12 col-lg-6">
						<div class="h-100 p-5 wrap-button">
							<a href="http://ciao.ch" class="btn btn-primary more-news" style="max-width: 100%;">
								<span class="" style="line-height: 43px; vertical-align: middle;">Visiter ciao.ch</span>
							</a>
						</div>
					</div>
				</div>
			</div>

		</div>	 <!-- /container -->											
	</section>
	<?php endif; ?>



	<script type="text/javascript">
		
		var links_js = <?= json_encode($links)?>;
		if (links_js != null) {
			
			links_js.forEach( function(element, index) {

				var class_name = "." + (1 + index) + "-img";
				var url = "url(" + element + ")";
				if (index === 0) {
					jQuery(class_name).css({
						width: '100%',
						height: '100%',
						background: url,
						"background-size" : "cover",
						"background-position" : "center"
					});
				}
				else {
					jQuery(class_name).css({
						width: '100%',
						height: '370px',
						background: url,
						"background-size" : "cover",
						"background-position" : "center"
					});
				}
				
			});
		}
		
	</script>

<?php get_footer(); ?>