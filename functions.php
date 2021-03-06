<?php

//=====================================================
// 		    Chargement des styles/scripts
//=====================================================

define('VK_VERSION', '1.0.2');

function vk_scripts()
{

    // Chargement des styles
    wp_enqueue_style('vk_bootstrap-core', get_template_directory_uri() . '/css/bootstrap.min-4-0.css', array(), VK_VERSION, 'all');
    wp_enqueue_style('vk_custom', get_template_directory_uri() . '/style.css', array('vk_bootstrap-core'), VK_VERSION, 'all');
    wp_enqueue_style('vk_custom-header', get_template_directory_uri() . '/css/components/header.css', array(), VK_VERSION, 'all');
    wp_enqueue_style('vk_custom-footer', get_template_directory_uri() . '/css/components/footer.css', array(), VK_VERSION, 'all');
    wp_enqueue_style('vk_custom-button', get_template_directory_uri() . '/css/components/button.css', array(), VK_VERSION, 'all');
    wp_enqueue_style('vk_custom-articles', get_template_directory_uri() . '/css/components/articles.css', array(), VK_VERSION, 'all');
    wp_enqueue_style('vk_custom-modal', get_template_directory_uri() . '/css/components/modal.css', array(), VK_VERSION, 'all');
    wp_enqueue_style('vk_custom-homepage', get_template_directory_uri() . '/css/pages/homepage.css', array(), VK_VERSION, 'all');
    wp_enqueue_style('vk_custom-contact', get_template_directory_uri() . '/css/pages/contact.css', array(), VK_VERSION, 'all');
    wp_enqueue_style('vk_custom-documents', get_template_directory_uri() . '/css/pages/documents.css', array(), VK_VERSION, 'all');
    wp_enqueue_style('vk_custom-newsletter', get_template_directory_uri() . '/css/pages/newsletter.css', array(), VK_VERSION, 'all');
    wp_enqueue_style('vk_custom-commander', get_template_directory_uri() . '/css/pages/commander.css', array(), VK_VERSION, 'all');
    wp_enqueue_style('vk_custom-devenir-membre', get_template_directory_uri() . '/css/pages/devenir-membre.css', array(), VK_VERSION, 'all');


    // Chargement des fonts
    wp_enqueue_style('vk_font_open-sans', 'https://fonts.googleapis.com/css?family=Open+Sans', array(), VK_VERSION, 'all');
    wp_enqueue_style('vk_font_gochi-hand', 'https://fonts.googleapis.com/css?family=Gochi+Hand', array(), VK_VERSION, 'all');


    // Chargement des scripts
    wp_enqueue_script('popper-js', get_template_directory_uri() . '/js/popper.min.js', array(), VK_VERSION, true);
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min-4-0.js', array('popper-js'), VK_VERSION, true);

    wp_enqueue_script('vk_custom_script', get_template_directory_uri() . '/js/custom.js', array('bootstrap-js'), VK_VERSION, true);

    // Chargment de fontawesome
    wp_enqueue_script('vk_font-awesome', 'https://kit.fontawesome.com/4ff7eb7a5d.js', array(), VK_VERSION, true);
} // fin function vk_scripts

add_action('wp_enqueue_scripts', 'vk_scripts');


//=====================================================
// 			 		  Utilitaires
//=====================================================

function vk_setup()
{
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

function vk_add_img_class($class)
{
    $class .= ' img-fluid';
    return $class;
}

add_filter('get_image_tag_class', 'vk_add_img_class');


//=====================================================
//  Ajoute la taille Medium Large dans la sélection
//=====================================================

function my_images_sizes($sizes)
{
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

/*function vk_give_me_meta_01($date1, $date2, $cat, $tags = NULL) {
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
}*/

function vk_give_me_meta_01($date1, $date2, $cat, $tags = NULL)
{
    $chaine = 'Publié le <time class="entry-date" datetime="';
    $chaine .= $date1;
    $chaine .= '">';
    $chaine    .= $date2;
    $chaine .= '</time>';

    return $chaine;
}


//=====================================================
// 	 	Modifie le texte de suite de l'excerpt
//=====================================================

function vk_excerpt_more($more)
{
    return '...<p><a class="more-link" href="' . get_permalink() . '">' . ' <b>Lire la suite »</b>' . '</a></p>';
}

add_filter('excerpt_more', 'vk_excerpt_more');


//=====================================================
// 	 	Donne le l'url du dossier uploads
//=====================================================

function wp_upload_dir_url()
{
    $upload_dir = wp_upload_dir();
    $upload_dir = $upload_dir['baseurl'];
    return preg_replace('/^https?:/', '', $upload_dir);
};


//=====================================================
// 		Ajout méthode pour get les url safe
//=====================================================

function add_get_val()
{
    global $wp;
    $wp->add_query_var('s');
}

add_action('init', 'add_get_val');


//=====================================================
// 	Méthode qui renvoie le lien de l'img d'un article
//=====================================================

function get_img_article()
{
    if ($thumbnail_html = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large')) {
        $thumbnail_src = $thumbnail_html['0'];
        $link = $thumbnail_src;
    } else {
        $link = get_template_directory_uri() . '/assets/articles-sans-img.png';
    }
    return $link;
}


//=====================================================
// 		Enlever le message JQMIGRATE de la console
//=====================================================

// Attention a comment ce code si vous voulez debug
// du JS dans la console

// silencer script
// function jquery_migrate_silencer() {
//     // create function copy
//     $silencer = '<script>window.console.logger = window.console.log; ';
//     // modify original function to filter and use function copy
//     $silencer .= 'window.console.log = function(tolog) {';
//     // bug out if empty to prevent error
//     $silencer .= 'if (tolog == null) {return;} ';
//     // filter messages containing string
//     $silencer .= 'if (tolog.indexOf("Migrate is installed") == -1) {';
//     $silencer .= 'console.logger(tolog);} ';
//     $silencer .= '}</script>';
//     return $silencer;
// }

// // for the frontend, use script_loader_tag filter
// add_filter('script_loader_tag','jquery_migrate_load_silencer', 10, 2);
// function jquery_migrate_load_silencer($tag, $handle) {
//     if ($handle == 'jquery-migrate') {
//         $silencer = jquery_migrate_silencer();
//         // prepend to jquery migrate loading
//         $tag = $silencer.$tag;
//     }
//     return $tag;
// }

// // for the admin, hook to admin_print_scripts
// add_action('admin_print_scripts','jquery_migrate_echo_silencer');
// function jquery_migrate_echo_silencer() {echo jquery_migrate_silencer();}
