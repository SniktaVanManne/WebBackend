const express = require('express')
const drugController = require("./controllers/drugController.js");
const app = express();
const path = require('path')
const PORT = process.env.PORT || 5000
const { Pool } = require("pg");
const connectionString = process.env.DATABASE_URL ||
"postgres://mnxronieoasanh:1e5cf552a72145565aeb9a98e56d010fea4d5c79c64968b95b546b9e90859cf7@ec2-35-171-31-33.compute-1.amazonaws.com:5432/d1k4a7jhe9jg8";

const pool = new Pool({connectionString: connectionString});

app.use(express.static(path.join(__dirname, 'public')));
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'ejs');
app.get('/', function(req, res){
    console.log("Received a request for /");

    res.write("This is the root");
    res.end();
  });
app.get('/home', function(req, res){
    console.log("Received a request for /home");

    res.write("This is the home page");
    res.end();
  });
app.get('/card', function(req, res){
    console.log("Received a request for /card, loser");

    res.render('pages/card');
  });
app.get('/getCard', function(req, res){
    console.log("Received a request for /getCard");

    res.render('pages/getCard');
});
app.post('/getCard', function(req, res){
    console.log(req, res);
});
app.use(express.json()); // support json encoded bodies
app.use(express.urlencoded({extended: true})); // support url encoded bodies

app.get("/search", drugController.search);
app.get("/drugs", drugController.getDrugList);
app.post("/drug", drugController.insertNewDrug);

app.listen(PORT, () => console.log(`Listening on ${ PORT }`));

// CREATE TABLE medications
// (
// 	id SERIAL PRIMARY KEY NOT NULL,
// 	brand VARCHAR(100) NOT NULL,
// 	generic VARCHAR(100) NOT NULL,
//   common  VARCHAR(1000),
//   severe VARCHAR(1000),
//   routes VARCHAR(100)
// );

// INSERT INTO medications (brand, generic, common, severe, routes) VALUES
// ('Lexapro', 'Escitalopram', 'Headache Nausea Insomnia', 'Suicidal Ideation', 'Oral'),
// ('Plavix', 'Clopidogrel', 'Nasuea, Bruising', 'Hemorraghes, Hemophelia, Bloody Stools', 'Oral, Subdermal, SubQ'),
// ('Xanax', 'Alprazolam', 'Dizziness, Nausea', 'Everything', 'Oral, SubQ, IM, Rectal');
