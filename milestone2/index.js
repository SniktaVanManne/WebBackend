const express = require("express");
const path = require("path");
require('dotenv').config();

const drugController = require("./controllers/drugController.js");

const PORT = process.env.PORT || 5000;

var app = express();

app.use(express.static(path.join(__dirname, "public")));
app.use(express.json()); // support json encoded bodies
app.use(express.urlencoded({extended: true})); // support url encoded bodies

app.get("/search", drugController.search);
app.get("/drugs", drugController.getDrugList);
app.post("/drug", drugController.insertNewDrug);

app.listen(PORT, function() {
	console.log("Server listening on port " + PORT);
});
