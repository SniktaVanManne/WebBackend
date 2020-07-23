const { Pool } = require("pg");

const db_url = process.env.DATABASE_URL;

// console.log("DB URL: " + db_url);
const pool = new Pool({connectionString: db_url});

function searchByBrand(brand, callback) {
	console.log("Searching the DB for drug: " + brand)

	var sql = "SELECT id, brand, generic, common, severe, routes FROM medications WHERE brand == $brand"; // Query
	var params = [brand];

	pool.query(sql, params, function(err, db_results) {

		if (err) {
			throw err;
		} else {


			var results = {
					success:true,
					list:db_results.rows
				};

			callback(null, results);
		}

	});

}


function searchByGeneric(generic, callback) {
	console.log("Searching the DB for drug: " + generic)

	var sql = "SELECT id, brand, generic, common, severe, routes FROM medications WHERE brand == $generic";
	var params = [generic];

	pool.query(sql, params, function(err, db_results) {

		if (err) {
			throw err;
		} else {
			// We got some successful results from the DB
			// console.log("Back from the DB with: ")
			// console.log(db_results);

			var results = {
					success:true,
					list:db_results.rows
				};

			callback(null, results);
		}

	});
}

function getAllDrugs(callback) {
	console.log("Searching the DB for drug: " + generic)

	var sql = "SELECT id, brand, generic, common, severe, routes FROM medications";
	var params = [generic];

	pool.query(sql, params, function(err, db_results) {

		if (err) {
			throw err;
		} else {
			// We got some successful results from the DB
			// console.log("Back from the DB with: ")
			// console.log(db_results);

			var results = {
					success:true,
					list:db_results.rows
				};

			callback(null, results);
		}

	});
}

function insertNewDrug(callback) {
	var results = {success:true, medications:{ book:book, chapter:chapter, verse:verse}};

	callback(null, results);
}

module.exports = {
	searchByBrand: searchByBrand,
	searchByGeneric: searchByGeneric,
	getAllDrugs: getAllDrugs,
	insertNewDrug: insertNewDrug
};
