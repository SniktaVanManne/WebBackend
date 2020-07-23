const drugModel = require("../models/drugModel.js");


function search(req, res) {
	// TODO: check if book id or if topic id, and call the appropriate function...

	var generic = req.query.generic;
	var brand = req.query.brand;

	if (generic.exists){
		drugModel.searchByBrand(brand, function(error, results) {
			res.json(results);
		});
	}

	if (brand.exists){
		drugModel.searchByGeneric(generic, function(error, results) {
			res.json(results);
		});
	}
}

function getDrugList(req, res) {
	drugModel.getAllDrugs(function(error, results) {
		res.json(results);
	});
}

function insertNewDrug(req, res) {
	// Get these variables from User
	var brand;
	var generic;
	var treats;
	var adverseEffects;
	var dosingRoutes;

	drugModel.insertNewDrug(brand, generic, treats, adverseEffects, dosingRoutes, function(error, results) {
		res.json(results);
	});

}

module.exports = {
	search: search,
	getDrugList: getDrugList,
	insertNewDrug: insertNewDrug
};
