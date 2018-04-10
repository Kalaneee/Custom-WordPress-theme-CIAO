<?php get_header(); ?>


<section id="error-404">
	<div class="container">

		<div class="title">Erreur 404
			<img src="<?= get_template_directory_uri(); ?>/assets/blue-line.png" class="blue-line">
		</div>
		<div class="alert alert-warning">
			Désolé la page que vous avez demandée est introuvable, si vous pensez que c'est une erreur veuillez contacter un administrateur.
		</div>

	</div> <!-- /container -->
</section>

<?php get_footer(); ?>