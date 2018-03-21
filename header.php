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

			<?php $theme_opts = get_option('vk_opts'); ?>

			<div class="row">
				<div class="col-xs-4">
					<img class="img-responsive" src="<?= $theme_opts['image_01_url']; ?>" alt=""></img>
					<p class="text-center"><?= stripslashes($theme_opts['legend_01']); ?></p>
				</div>
				<div class="col-xs-8">
					<h1 class="m-up-reset">Coucou c'est nous</h1>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</p>
				</div>
			</div>
		</div>
	</div> <!-- /container -->