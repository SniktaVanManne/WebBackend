const { Pool } = require("pg");

const db_url = process.env.DATABASE_URL;

// console.log("DB URL: " + db_url);
const pool = new Pool({connectionString: db_url});

function searchByBrand(brand, callback) {
	console.log("Searching the DB for drug: " + brand)

	var sql; // Query
	var params = [brand];

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


function searchByGeneric(generic, callback) {
	console.log("Searching the DB for drug: " + generic)

	var sql; // Query
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
	var results; // Query of all drugs on DB

	callback(null, results);
}

function insertNewDrug(callback) {
	// Stubbed Function for inserting new drugs into DB

	callback(null, results);
}

module.exports = {
	searchByBrand: searchByBrand,
	searchByGeneric: searchByGeneric,
	getAllDrugs: getAllDrugs,
	insertNewDrug: insertNewDrug
};
