<?php
/*
Template Name: Documents
*/

get_header(); ?>

<section id="documents">
	<div class="container">

		<div class="title"> Documents
			<img src="<?= get_template_directory_uri(); ?>/assets/blue-line.png" class="blue-line">
		</div>

		<!-- First row -->
		<div class="card-deck">
		  <div class="card">
		  	<div class="img-wrap">
		  		<a href="<?= get_template_directory_uri(); ?>/assets/docs/EVALUATION_SiteCiao_GRSA_RdS249.pdf" target="_blank">
		    		<img class="card-img-top" src="<?= get_template_directory_uri(); ?>/assets/img-docs/1.png" alt="Card image cap">
		      	</a>
		  	</div>
		    <div class="card-body">
		      <h5 class="card-title">Rapport d’évaluation 2015 du site ciao.ch</h5>
		      <p class="card-text">Rapport complet</p>
		    </div>
		    <div class="card-footer">
		      <small class="text-muted">Téléchargement : </small>
		      <a href="<?= get_template_directory_uri(); ?>/assets/docs/EVALUATION_SiteCiao_GRSA_RdS249.pdf" target="_blank">
		      	<small class="text-muted right"><i class="zmdi zmdi-download"></i></small>
		      </a>
		    </div>
		  </div>
		  <div class="card">
		  	<div class="img-wrap">
		  		<a href="<?= get_template_directory_uri(); ?>/assets/docs/EVALUATION_SiteCiao_GRSA_RdS249.pdf" target="_blank">
		  			<img class="card-img-top" src="<?= get_template_directory_uri(); ?>/assets/img-docs/2.png" alt="Card image cap">
		  		</a>
		  	</div>
		    <div class="card-body">
		      <h5 class="card-title">Rapport d’évaluation 2015 du site ciao.ch</h5>
		      <p class="card-text">L'essentiel en bref</p>
		    </div>
		    <div class="card-footer">
		      <small class="text-muted">Téléchargement : </small>
		      <a href="<?= get_template_directory_uri(); ?>/assets/docs/Evaluation-ciao.ch_Lessentiel-en-bref.pdf" target="_blank">
		      	<small class="text-muted right"><i class="zmdi zmdi-download"></i></small>
		      </a>
		    </div>
		  </div>
		  <div class="card">
		  	<div class="img-wrap">
		  		<img class="card-img-top" src="<?= get_template_directory_uri(); ?>/assets/img-docs/3.jpeg" alt="Card image cap">
		  	</div>
		    <div class="card-body">
		      <h5 class="card-title">Rapport annuel 2016</h5>
		      <p class="card-text"></p>
		    </div>
		    <div class="card-footer">
		      <small class="text-muted">Téléchargement : </small>
		      <a href="<?= get_template_directory_uri(); ?>/assets/docs/RapportAnnuelCIAO_2016.pdf" target="_blank">
		      	<small class="text-muted right"><i class="zmdi zmdi-download"></i></small>
		      </a>
		    </div>

		  </div>
		</div>

		<!-- Second row -->
		<div class="card-deck">
		  <div class="card">
		  	<div class="img-wrap">
		  		<img class="card-img-top" src="<?= get_template_directory_uri(); ?>/assets/img-docs/4.png" alt="Card image cap">
		  	</div>
		    <div class="card-body">
		      <h5 class="card-title">Rapport annuel 2015</h5>
		      <p class="card-text"></p>
		    </div>
		    <div class="card-footer">
		      <small class="text-muted">Téléchargement : </small>
		      <a href="<?= get_template_directory_uri(); ?>/assets/docs/EVALUATION_SiteCiao_GRSA_RdS249.pdf" target="_blank">
		      	<small class="text-muted right"><i class="zmdi zmdi-download"></i></small>
		      </a>
		    </div>
		  </div>
		  <div class="card">
		  	<div class="img-wrap">
		  		<img class="card-img-top" src="<?= get_template_directory_uri(); ?>/assets/img-docs/5.jpg" alt="Card image cap">
		  	</div>
		    <div class="card-body">
		      <h5 class="card-title">Status de l'association romande CIAO</h5>
		      <p class="card-text"></p>
		    </div>
		    <div class="card-footer">
		      <small class="text-muted">Téléchargement : </small>
		      <a href="<?= get_template_directory_uri(); ?>/assets/docs/STATUTS-CIAO.pdf" target="_blank">
		      	<small class="text-muted right"><i class="zmdi zmdi-download"></i></small>
		      </a>
		    </div>
		  </div>
		  <div class="card">
		  	<div class="img-wrap">
		  		<img class="card-img-top" src="<?= get_template_directory_uri(); ?>/assets/img-docs/6.png" alt="Card image cap">
		  	</div>
		    <div class="card-body">
		      <h5 class="card-title">Charte éthique de l'association</h5>
		      <p class="card-text"></p>
		    </div>
		    <div class="card-footer">
		      <small class="text-muted">Téléchargement : </small>
		      <a href="<?= get_template_directory_uri(); ?>/assets/docs/Charte-ethique_CIAO.pdf" target="_blank">
		      	<small class="text-muted right"><i class="zmdi zmdi-download"></i></small>
		      </a>
		    </div>

		  </div>
		</div>


	</div>
</section>

<?php get_footer(); ?>