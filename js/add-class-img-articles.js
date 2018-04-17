jQuery(document).ready(function($) {

	alert("yo 2");


	var this_js_script = jQuery('script[src*=add-class-img-articles]'); // or better regexp to get the file name..
	var links_js = this_js_script.attr('data-my_var_1');   

	console.log(links_js);


	if (links_js != null && (typeof links_js != "undefined")) {
		
		links_js.forEach( function(element, index) {

			var class_name = "." + (1 + index) + "-img";
			var url = "url(" + element + ")";

			if (index === 0)
				add_class_img('100%', class_name, url);
			else
				add_class_img('370px', class_name, url);
		});
	}



	function add_class_img(height_val, class_name, url) {
		jQuery(class_name).css({
			width: '100%',
			height: height_val,
			background: url,
			"background-size" : "cover",
			"background-position" : "center"
		});
	}


}); // fin du ready