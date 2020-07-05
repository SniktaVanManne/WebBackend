
function searchByBrand() {
	console.log("Searching by brand name...");

	var brand = $("#brand").val();
	console.log("Brand Name: " + brand);

	$.get("/search", {brand:brand}, function(data) {
		console.log("Back from the server with:");
		console.log(data);

		for (var i = 0; i < data.list.length; i++) {
			var drugs = data.list[i];

			$("#medications").append("<li>" + drugs.brand + " " + drugs.generic + ":" + drugs.treats + "</li>");
		}

	})
}

function searchByGeneric() {
	console.log("Searching by generic name...");

	var generic = $("#generic").val();
	console.log("Generic Name: " + generic);

	$.get("/search", {generic:generic}, function(data) {
		console.log("Back from the server with:");
		console.log(data);

		for (var i = 0; i < data.list.length; i++) {
			var drugs = data.list[i];

			$("#medications").append("<li>" + drugs.brand + " " + drugs.generic + ":" + drugs.treats + "</li>");
		}

	})
}
