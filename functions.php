<?php

//=====================================================
// 		    Chargement des styles/scripts
//=====================================================

define('VK_VERSION', '1.0.2');

function vk_scripts() {

	// Chargement des styles
	wp_enqueue_style('vk_bootstrap-core', get_template_directory_uri() . '/css/bootstrap.min-4-0.css', array(), VK_VERSION, 'all');

	wp_enqueue_style('vk_animate', get_template_directory_uri() . '/css/animate.css', array(), VK_VERSION, 'all');

	wp_enqueue_style('vk_custom', get_template_directory_uri() . '/style.css', array('vk_bootstrap-core', 'vk_animate'), VK_VERSION, 'all');


	// Chargement des fonts
	wp_enqueue_style('vk_font_open-sans', 'https://fonts.googleapis.com/css?family=Open+Sans', array(), VK_VERSION, 'all');
	wp_enqueue_style('vk_font_gochi-hand', 'https://fonts.googleapis.com/css?family=Gochi+Hand', array(), VK_VERSION, 'all');

	wp_enqueue_style('vk_material-design', 'https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css', array(), VK_VERSION, 'all');


	// Chargement des scripts
	wp_enqueue_script('popper-js', get_template_directory_uri() . '/js/popper.min.js', array(), VK_VERSION, true);
	wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min-4-0.js', array('popper-js'), VK_VERSION, true);

	wp_enqueue_script('vk_admin_script', get_template_directory_uri() . '/js/custom.js', array('bootstrap-js'), VK_VERSION, true);


	// Chargment de fontawesome
	wp_enqueue_script('vk_font-awesome', 'https://use.fontawesome.com/4bfaacc9de.js', array(), VK_VERSION, true);


	if (is_page()):
		wp_enqueue_script('vk_ajax_test_script', get_template_directory_uri() . '/js/ajax-test.js', array(), VK_VERSION, true);

		wp_localize_script('vk_ajax_test_script', 'ajaxVars', array('url' => admin_url('admin-ajax.php')));
	endif;


} // fin function vk_scripts

add_action('wp_enqueue_scripts', 'vk_scripts');




//=====================================================
// 	   Chargement des styles/scripts dashboard
//=====================================================

function vk_admin_init() {
	// ******************* action 1
	function vk_admin_scripts() {

		if (!isset($_GET['page']) || $_GET['page'] != "vk_theme_opts") {
			return;
		}

		// chargement des styles admin
		wp_enqueue_style('bootstrap-adm-core', get_template_directory_uri() . '/css/bootstrap.min-3-3.css', array(), VK_VERSION);


		// chargement des scripts admin
		wp_enqueue_media();
		wp_enqueue_script('vk-admin-init', get_template_directory_uri() . '/js/admin-options.js', array(), VK_VERSION, true);

	} // fin function vk_admin_scripts

	add_action('admin_enqueue_scripts', 'vk_admin_scripts');


	// ******************* action 2
	include ('includes/save-options-page.php'); // contient la fonction vk_save_options
	add_action('admin_post_vk_save_options', 'vk_save_options');


} // fin function vk_admin_init

add_action('admin_init', 'vk_admin_init');




//=====================================================
// Associer fonctions à exécuter après les actions ajax
//=====================================================

add_action('wp_ajax_mon_test_ajax', 'fn_mon_test_ajax'); // dispo only aux loggés
add_action('wp_ajax_nopriv_mon_test_ajax', 'fn_mon_test_ajax'); // dispo ceux non loggés
function fn_mon_test_ajax() {

	global $wpdb;
	$mot_recup = $_POST['data1'];
	$mot_test = "%$mot_recup%";
	$table_name = $wpdb->prefix . "posts";

	$data_fetch = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $table_name WHERE post_content LIKE %s AND post_status='publish'",
			$mot_test
		)
	);

	$results_query = array();
	$final_array = array();

	if ($data_fetch):
		$final_array["success"] = "true";
		foreach ($data_fetch as $data_line) {
			$results_query[] = array($data_line->post_title, $data_line->post_name, $data_line->guid);
		}
	else:
		$final_array["success"] = "false";
		$results_query[] = "pas de résultats";
	endif;

	$final_array["mot"] = $mot_recup;
	$final_array["results"] = $results_query;

	echo stripslashes(json_encode($final_array));

	die();

} // fin function fn_mon_test_ajax



//=====================================================
// 			    Activation des options
//=====================================================

function vk_active_options() {
	$theme_opts = get_option('vk_opts');
	if (!$theme_opts) {
		$opts = array(
			'image_01_url'	=> '',
			'legend_01'		=> ''
		);

		add_option('vk_opts', $opts);
	}
}

add_action('after_switch_theme', 'vk_active_options');




//=====================================================
// 			     Menu options du thème
//=====================================================

function vk_admin_menus() {
	add_menu_page(
		'Valentin Options', // title
		'Options du thème', // nom sidebar
		'publish_pages', // accessible depuis le rôle éditeur
		'vk_theme_opts', // slug dans l'url
		'vk_build_options_page' // unction lancée
	);

	include ('includes/build-options-page.php'); // contient la fonction vk_build_options_page

} // fin function vk_admin_menus

add_action('admin_menu', 'vk_admin_menus');




//=====================================================
// 			     Sidebars and widgetized
//=====================================================

function vk_widgets_init() {
	register_sidebar(array(
		'name'			=> 'Footer Widget Zone',
		'description'	=> 'Widgets affichés dans le footer : 4 au maximum',
		'id'			=> 'widgetized-footer',
		'before_widget'	=> '<div id="%1$s" class="col-12 col-sm-6 col-lg-3 wrap-widget %2$s d-flex"><div class="inside-widget w-100 pb-3">',
		'after_widget'	=> '</div></div>',
		'before_title'	=> '<h2 class="h3 text-center">',
		'after_title'	=> '</h2>',
	));
}

add_action('widgets_init', 'vk_widgets_init');




//=====================================================
// 			 		  Utilitaires
//=====================================================

function vk_setup() {

	//support des vignettes
	add_theme_support('post-thumbnails');

	// créer format image slider front-page
	add_image_size('front-page-slider', 1140, 420, true);

	//enlève générateur de version
	remove_action('wp_head', 'wp_generator');

	//enlève les guillemets à la française
	remove_action('the_excerpt', 'wptexturize');
	remove_action('the_content', 'wptexturize');

	// support du titre
	add_theme_support('title-tag');


	// regiser custom navigation walker
	require_once('includes/class-wp-bootstrap-navwalker.php');


	// active la gestion des menus
	register_nav_menus(array('primary' => 'principal'));


} // fin function vk_setup

add_action('after_setup_theme', 'vk_setup');




//=====================================================
//    Ajouter classe img-fluid à toutes les img
//=====================================================

function vk_add_img_class($class) {
	$class .= ' img-fluid';
	return $class;
}

add_filter('get_image_tag_class', 'vk_add_img_class');




//=====================================================
//  Ajoute la taille Medium Large dans la sélection
//=====================================================

function my_images_sizes($sizes) {
	$addsizes = array(
		"medium_large" => "Medium Large"
	);

	$newsizes = array_merge($sizes, $addsizes);
	return $newsizes;
}

add_filter('image_size_names_choose', 'my_images_sizes');




//=====================================================
//			 Affichage date + catégorie(s)
//=====================================================

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




//=====================================================
// 	 	Modifie le texte de suite de l'excerpt
//=====================================================

function vk_excerpt_more($more) {
	return '<p><a class="more-link" href="' . get_permalink() . '">' . ' <b>Lire la suite »</b>' . '</a></p>';
}
add_filter('excerpt_more', 'vk_excerpt_more');




//=====================================================
// 	 	Donne le l'url du dossier uploads
//=====================================================

function wp_upload_dir_url() {
  $upload_dir = wp_upload_dir();
  $upload_dir = $upload_dir['baseurl'];
  return preg_replace('/^https?:/', '', $upload_dir);
};




//=====================================================
// 	 	 CPT slider frontal page d'accueil
//=====================================================

function vk_slider_init() {

	$labels = array(
		'name'					=> 'Images Carousel Accueil',
		'singular_name'			=> 'Image accueil',
		'add_new'				=> 'Ajouter une image',
		'add_new_item'			=> 'Ajouter une image accueil',
		'edit_item'				=> 'Modifier une image accueil',
		'new_item'				=> 'Nouveau',
		'all_items'				=> 'Voir la liste',
		'view_item'				=> 'Voir l\'élément',
		'search_item'			=> 'Chercher une image acceuil',
		'not_found'				=> 'Aucun élément trouvé',
		'not_found_in_trash'	=> 'Aucun élément dans la corbeille',
		'menu_name'				=> 'Slider Frontal'
	);

	$args = array(
		'labels'				=> $labels,
		'public'				=> true,
		'publicly_queryable'	=> true,
		'show_ui'				=> true,
		'show_in_menu'			=> true,
		'query_var'				=> true,
		'rewrite'				=> true,
		'capability_type'		=> 'post',
		'has_archive'			=> false,
		'hierachical'			=> false,
		'menu_position'			=> 20,
		'menu_icon'				=> get_stylesheet_directory_uri() . '/assets/camera_16.png',
		'publicly_queryable'	=> false,
		'exclude_from_search'	=> true,
		'supports'				=> array('title', 'page-attributes', 'thumbnail')
	);

	register_post_type('vk_slider', $args);

} // end function vk_slider_init

add_action('init', 'vk_slider_init');




//=====================================================
// Ajout image et ordre dans la colonne admin : slider
//=====================================================

add_filter('manage_edit-vk_slider_columns', 'vk_col_change'); // change nom colonnes

function vk_col_change($columns) {
	$columns['vk_slider_image_order'] = "Ordre";
	$columns['vk_slider_image'] = "Image affichée";

	return $columns;
}

add_action('manage_vk_slider_posts_custom_column', 'vk_content_show', 10, 2); // affiche contenu

function vk_content_show($column, $post_id) {
	global $post;
	if ($column == 'vk_slider_image') {
		echo the_post_thumbnail(array(100,100));
	}
	if ($column == 'vk_slider_image_order') {
		echo $post->menu_order;
	}
}




//=====================================================
// 		Tri auto ordre colonne admin pour le slider
//=====================================================

function vk_change_slides_order($query) {
	global $post_type, $pagenow;

	if ($pagenow == 'edit.php' && $post_type == 'vk_slider') {
		$query->query_vars['orderby'] = 'menu_order';
		$query->query_vars['order'] = 'asc';
	}
}

add_action('pre_get_posts', 'vk_change_slides_order');
