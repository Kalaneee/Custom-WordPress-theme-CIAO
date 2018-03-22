jQuery(document).ready(function($) {

	if (document.getElementById("form-ajax-test")) {

		$('form#form-ajax-test').on('submit', function(e) {

		e.preventDefault();

		var maValue = $("#send-value").val();

		$.ajax({
			url : ajaxVars.url,
			dataType : 'json',
			method : 'post',
			data : {
				action : 'mon_test_ajax',
				data1 : maValue,
				data2 : 'xxxxxxx'
			},
			success : function(response) {
				if (response.success == "true") {

					for (var i = 0; i < response.results.length; i++) {
						console.log("** " + response.results[i]);
					}
				} else {
					console.log("pas de résultats");
				}
			},
			error : function(xhr, error, exception) {
				console.log('message d\'erreur ' + error);
				console.log('message exception ' + exception);
				console.log('contenu de l\'objet xhr');
				console.log(xhr);
			}
		}); // fin ajax
		
	}); // fin du submit

	} // fin du document.getElementById("form-ajax-test")


}); // fin du ready