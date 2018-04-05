
<div id="newsletter-footer">

<?php /*
<script type="text/javascript">(function() {
	if (!window.mc4wp) {
		window.mc4wp = {
			listeners: [],
			forms    : {
				on: function (event, callback) {
					window.mc4wp.listeners.push({
						event   : event,
						callback: callback
					});
				}
			}
		}
	}
})();
</script>
<div class="container">
	
	<!-- MailChimp for WordPress v4.2 - https://wordpress.org/plugins/mailchimp-for-wp/ -->
	<form id="mc4wp-form-1" class="mc4wp-form mc4wp-form-29075 mc4wp-form-submitted mc4wp-form-success" method="post" data-id="29075" data-name="formulaire d&#039;inscription à la newsletter" >
		<div class="mc4wp-form-fields form-group">
			<p>
				<label>Prénom</label>
				<input class="form-control" type="text" name="FNAME" required>
			</p>
			<p>
				<label>Nom</label>
				<input class="form-control" type="text" name="LNAME" required>
			</p>
			<p>
				<label>Organisation</label>
				<input class="form-control" type="text" name="MMERGE3" required>
			</p>
			<p>
				<label>Email </label>
				<input class="form-control" type="email" name="EMAIL" required />
			</p>

			<p>
				<input class="form-control" type="submit" value="Abonnez-vous" />
			</p>
		</div>
		<label style="display: none !important;">Leave this field empty if you're human: 
			<input type="text" name="_mc4wp_honeypot" value="" tabindex="-1" autocomplete="off" />
		</label>
		<input type="hidden" name="_mc4wp_timestamp" value="1522933233" />
		<input type="hidden" name="_mc4wp_form_id" value="29075" />
		<input type="hidden" name="_mc4wp_form_element_id" value="mc4wp-form-1" />
		<div class="mc4wp-response"></div>
	</form> <!-- / MailChimp for WordPress Plugin -->


	</div> <!-- /container --> */?>

	<div class="container">
		<div class="white-card-light">
			<div class="row p-3">
			<div class="col-12 col-md-6">
				<div class="title"> Newsletter
					<img src="<?= get_template_directory_uri(); ?>/assets/blue-line.png" class="blue-line">
				</div>
				<p>
					La newsletter de CIAO paraît onze fois par année. Elle est destinée à toute personne intéressée à la thématique des jeunes. 
					Elle informe des nouveautés du domaine, des sujets qui font l’actualité, des actions politiques engagées.
				</p>
			</div>
			<div class="col-12 col-md-6 wrap-form">
				<?= do_shortcode('[mc4wp_form id="29075"]');?>
			</div>
			
		</div> <!-- /row -->
		</div>
		


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