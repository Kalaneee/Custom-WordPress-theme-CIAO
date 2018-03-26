<?php
/*
Template Name: Contact
*/

get_header(); ?>

	<section id="contact">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12 contact-left d-flex">
					<div class="white-card">
						<div class="card">
							<div class="card-body">
								
								<h6 class="card-title mb-2">Si vous voulez contacter directement un membre de l’équipe : </h6>
								<ul>
									<li>Marjory Winkler, directrice ad intérim, responsable projet et communication</li>
									<li>Anne Dechambre, responsable de site</li>
								</ul>
								<p class="card-text">Vous pouvez également nous contacter à l’aide du formulaire ci-dessous.</p>
							</div>
							
						</div>
						<?php if(have_posts()): ?>
								<?php the_content(); ?>
						<?php endif; ?>
					</div>
				</div>
				<div class="col-lg-6 col-md-12 contact-right d-flex">
					<div class="white-card">
						<div class="card">
							<h1 class="mt-2"><a>Contact</a></h1>
							<p>Association Romande CIAO</br>
							Av. de Riant-Mont 1</br>
							1004 Lausanne</br>
							Tél: <a href="tel:+41213119206">+ 41 21 311 92 06</a></br>
							Email: <a href="mailto:info@ciao.ch">info@ciao.ch</a></br>
							CCP: 10-5261-6</p>
						</div>
						<hr>
						<iframe
								class=".embed-responsive-item"
							  	
							  	frameborder="0" style="border:0"
							  	src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBPI6J6kvlnEK3ALA-hJjzLzzDZ_32lyXs
							    &q=AvDeRiantMont+1,Lausanne+VD" allowfullscreen>
						</iframe>
					</div>
				</div>
			</div>
		</div> <!-- /container -->
	</section>

<?php get_footer(); ?>