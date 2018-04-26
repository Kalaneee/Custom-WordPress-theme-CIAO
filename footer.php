
<div id="newsletter-footer">

	<div class="container">
		<div class="white-card-light">
			<div class="row p-3">
			<div class="col-12 col-md-6">
				<div class="title"> Newsletter
					<img src="<?= get_template_directory_uri(); ?>/assets/blue-line.png" class="blue-line">
				</div>
				<p>
					La newsletter de CIAO paraît onze fois par année. Elle est destinée à toute personne intéressée à la thématique des jeunes.
					Elle informe des nouveautés du domaine, des sujets qui font l’actualité, des actions politiques engagées.<br> Pour vous inscrire, il suffit de remplir le formulaire.
				</p>
			</div>
			<div class="col-12 col-md-6 wrap-form">
				<?= do_shortcode('[mc4wp_form id="29075"]');?>
			</div>
		</div> <!-- /row -->

		<?php // PAGE NEWSLETTER
			if (isset($pagename)) {
				if ($pagename == "newsletter") {
					echo '<hr class="m-3">';
					echo '<div class="last-newsletters p-3">';
					echo '<h2 class="h2-articles mt-0">Les dernières newsletters</h2>';
					echo do_shortcode('[catlist name=newsletter]');
					echo '</div';
				}
			 } ?>

		</div> <!-- /white-card-light -->



	</div> <!-- /container -->
</div> <!-- /newsletter-footer -->


</div> <!-- /wrapper -->
<footer class="footer">
	<div class="n-container">
		<div class="footer-copyright">
        	<p>© 2018 Association romande CIAO - <small><a href="https://kalane.ch">Réalisé par Valentin Kaelin</a></small></p>
    	</div>
	</div>
</footer>

	<?php wp_footer(); ?>
</body>
</html>
