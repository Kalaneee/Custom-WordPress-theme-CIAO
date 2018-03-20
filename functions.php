<?php

//========================================
// 			Chargement des scripts
//========================================

define('VK_VERSION', '1.0.2');

function vk_scripts() {

	// Chargement des styles
	wp_enqueue_style('vk_bootstrap-core', get_template_directory_uri() . '/css/bootstrap.min.css', array(), VK_VERSION, 'all');
	wp_enqueue_style('vk_custom', get_template_directory_uri() . '/style.css', array('vk_bootstrap-core'), VK_VERSION, 'all');

	// Chargement des scripts
	wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), VK_VERSION, true);
	wp_enqueue_script('vk_admin_script', get_template_directory_uri() . '/js/custom.js', array('bootstrap-js'), VK_VERSION, true);


} // fin function vk_scripts

add_action('wp_enqueue_scripts', 'vk_scripts');


function vk_admin_scripts() {
	wp_enqueue_style('bootstrap-adm-core', get_template_directory_uri() . '/css/bootstrap.min.css', array(), VK_VERSION);
} // fin function vk_admin_scripts

//add_action('admin_enqueue_scripts', 'vk_admin_scripts');




//========================================
// 			 	Utilitaires
//========================================

function vk_setup() {

	//support des vignettes
	add_theme_support('post-thumbnails');

	//enlève générateur de version
	remove_action('wp_head', 'wp_generator');

	//enlève les guillemets à la française
	remove_action('the_excerpt', 'wptexturize');
	remove_action('the_content', 'wptexturize');

	// support du titre
	add_theme_support('title-tag');


	// regiser custom navigation walker
	require_once('includes/wp_bootstrap_navwalker.php');


	// active la gestion des menus
	register_nav_menus(array('primary' => 'principal'));


} // fin function vk_setup

add_action('after_setup_theme', 'vk_setup');




//========================================
//		Affichage date + catégorie(s)
//========================================

// Modèle du résultat : <time class="entry-date" datetime="2017-02-20T16:20:08+00:00">20 février 2017</time>

function vk_give_me_meta_01($date1, $date2, $cat, $tags = NULL) {

	$chaine = 'publié le <time class="entry-date" datetime="';
	$chaine .= $date1;
	$chaine .= '">';
	$chaine	.= $date2;
	$chaine .= '</time> dans la catégorie ';
	$chaine .= $cat;

	if ($tags != NULL) {
		$chaine .= ' avec les étiquettes: ' . $tags;
	}
	return $chaine;
}




//========================================
// Modifie le texte de suite de l'excerpt
//========================================

function vk_excerpt_more($more) {
	return '<a class="more-link" href="' . get_permalink() . '">' . ' [lire la suite]' . '</a>';
}
add_filter('excerpt_more', 'vk_excerpt_more');