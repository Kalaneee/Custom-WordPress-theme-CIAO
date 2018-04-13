<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<?php if(is_home()): ?>
		<meta name="description" content="Page du blog du site regroupant tous les articles postés."/>
	<?php endif; ?>
	<?php if(is_front_page()): ?>
		<meta name="description" content="Bienvenue sur le site de l'Association romande CIAO."/>
	<?php elseif(is_page()): ?>
		<meta name="description" content="Le site présente un contenu de type page."/>
	<?php endif; ?>	

	<?php if(is_category()): ?>
		<meta name="description" content="Liste des articles pour la catégorie <?= single_cat_title('', false) ?>."/>
	<?php endif; ?>
	<?php if(is_tag()): ?>
		<meta name="description" content="Liste des articles reliés avec l'étiquette [<?= single_tag_title('', false) ?>]."/>
	<?php endif; ?>

	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">

	<?php wp_head(); ?>
</head>
<body>
<div class="wrapper">

	<div class="header">
		<div class="top">
			<div class="n-container">
				<a href="http://bourrédesavoir.ch" class="slogan">Association <b>CIAO</b></a>
				<div style="float: right;">
					<a href="https://twitter.com/associationciao" target="_blank">
						<i class="fa fa-twitter"></i>
					</a>
					<a href="https://www.facebook.com/ciao.ch/" target="_blank">
						<i class="fa fa-facebook"></i>
					</a>
					<a href="https://www.youtube.com/user/wwwciaoch/feed" target="_blank">
						<i class="fa fa-youtube"></i>
					</a>
					<a href="http://www.ciao.ch/f/" target="_blank">
						<i class="fa fa-globe"></i>
					</a>
					<a href="#" data-toggle="modal" data-target="#exampleModal" class="clickable">
						<i class="fa fa-search"></i>
					</a>
				</div>
			</div>
		</div>
		<div class="n-container">
			<div class="logo">
				<a href="http://bourrédesavoir.ch"><img src="<?= get_template_directory_uri(); ?>/assets/logo.png"></a>
			</div>
		</div>
	</div>


	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		  <div class="n-container">

		    <!--<a class="navbar-brand" href="<?= bloginfo('url'); ?>">Accueil</a>-->
		    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>

		    <?php 
		      wp_nav_menu(array(
		        'menu'            => 'top-menu',
		        'theme_location'  => 'primary',
		        'depth'           => 2,
		        'container'       => 'div',
		        'container_class' => 'collapse navbar-collapse',
		        'container_id'    => 'navbar',
		        'menu_class'      => 'nav navbar-nav ml-auto',
		        'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
		        'walker'          => new wp_bootstrap_navwalker()
		        )); 
		    ?>

		  </div> <!-- /container -->
		</nav>
	</header>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rechercher</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form role="search" method="get" id="searchform" class="searchform" action="http://monstress.ch/">
				<div class="form-row">
					<div class="col">
						<input class="form-control" type="text" value="" name="s" id="s">
					</div>
					<div class="col">
						<input class="btn btn-primary btn-search" type="submit" id="searchsubmit" value="Rechercher">
					</div>
				</div>
			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>