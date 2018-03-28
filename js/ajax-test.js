jQuery(document).ready(function($) {

	if (document.getElementById("form-ajax-test")) {
		console.log("im in");

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

				var myOutput = "";
				myOutput += "<p>Articles contenant le mot: <b>" + response.mot + "</b></p>";

				if (response.success == "true") {

					myOutput += '<table class="table">'
					for (var i = 0; i < response.results.length; i++) {
						var guid = response.results[i][2];
						var v1 = guid.indexOf('?');
						var v2 = guid.slice(0, v1);
						var myLink = v2 + response.results[i][1];
						myOutput += '<tr><td>';
						myOutput += response.results[i][0];
						myOutput += '</td><td>';
						myOutput+= '<a href="' + myLink + '" target="_blank">' + myLink + '</a>';
						myOutput += '</td></tr>';
					}
					myOutput += '</table>';

				} else {
					myOutput += '<p>Il n\'y a pas de résultats à votre recherche</p>';
				}

				$("#result").html(myOutput);

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