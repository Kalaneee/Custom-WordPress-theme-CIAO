<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<?php if(is_home()): ?>
		<meta name="description" content="Page du blog du site regroupant tous les articles postés."/>
	<?php endif; ?>
	<?php if(is_front_page()): ?>
		<meta name="description" content="Page statique d'accueil et de présentation du site."/>
	<?php elseif(is_page()): ?>
		<meta name="description" content="Le site présente un contenu de type page."/>
	<?php endif; ?>	

	<?php if(is_category()): ?>
		<meta name="description" content="Liste des articles pour la catégorie <?= single_cat_title('', false) ?>."/>
	<?php endif; ?>
	<?php if(is_tag()): ?>
		<meta name="description" content="Liste des articles reliés avec l'étiquette [<?= single_tag_title('', false) ?>]."/>
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<body>

	<header>
		<nav class="navbar navbar-default navbar-static-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="/">Accueil</a>
				</div>

				<?php 
					wp_nav_menu(array(
						'menu'				=> 'top-menu',
						'theme_location' 	=> 'primary',
						'depth'				=> 2,
						'container'			=> 'div',
						'container_class'	=> 'navbar-collapse collapse',
						'container_id'		=> 'navbar',
						'menu_class'		=> 'nav navbar-nav',
						'fallback_cb'		=> 'wp_bootstrap_navwalker::fallback',
						'walker'			=> new wp_bootstrap_navwalker()
						)
					);
				?>

			</div>
		</nav>
	</header>


	<div class="container">
		<div class="jumbotron">
			<h1>Coucou c'est nous</h1>
		</div>
	</div> <!-- /container -->