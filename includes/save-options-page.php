<?php

function vk_save_options() {

	if(!current_user_can('publish_pages')) {
		wp_die('Vous n\'êtes pas autorisé à effectuer cette opération !');
	}
	check_admin_referer('vk_options_verify');

	$opts = get_option('vk_opts');

	// sauvegarde légende
	$opts['legend_01'] = sanitize_text_field($_POST["vk_legend_01"]);

	// sauvegarde image
	$opts['image_01_url'] = sanitize_text_field($_POST["vk_image_url_01"]);

	update_option('vk_opts', $opts);

	wp_redirect(admin_url('admin.php?page=vk_theme_opts&status=1'));
	exit;

} // fin de vk_save_options