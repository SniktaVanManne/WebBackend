const express = require("express");
const path = require("path");

const PORT = process.env.PORT || 5000;

var app = express();

app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'ejs');

app.get('/', function(req, res){
  console.log("Received a request for /");

  res.write("This is the root");
  res.end();
});

app.get('/card', function(req, res){
  console.log("Received a request for /card");

  res.render('pages/card');
});

app.use(express.static(path.join(__dirname, "public")));


app.post("/card", function(req, res){
  console.log('Post received');
});

app.listen(PORT, function(){
  console.log("Server listening on Port " + PORT);
});
