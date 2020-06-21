const express = require('express')
const app = express();
const path = require('path')
const PORT = process.env.PORT || 5000
const cool = require('cool-ascii-faces');

express()
  .use(express.static(path.join(__dirname, 'public')))
  .set('views', path.join(__dirname, 'views'))
  .set('view engine', 'ejs')
  .get('/', function(req, res){
    console.log("Received a request for /");

    res.write("This is the root");
    res.end();
  })
  .get('/home', function(req, res){
    console.log("Received a request for /home");

    res.write("This is the home page");
    res.end();
  })
  .get('/input', function(req, res){
    console.log("Received a request for /input");

    res.render('pages/input');
  })
  .get('/cool', (req, res) => res.send(cool()))
  .listen(PORT, () => console.log(`Listening on ${ PORT }`))

// app.get("/", function(req, res){
//     console.log("Received a request for /");
//
//     res.write("This is the root");
//     res.end();
// });

// app.get("/home", function(req, res){
//     console.log("Received a request for /home");
//
//     res.write("This is the home page");
//     res.end();
// });

//Includes express library
// const cool = require('cool-ascii-faces');
// var express = require("express");

// Create an app of datatype express()
// This is actually object instatiation
// var app = express();

// Accessing static files that do not require dynamic server logic
// Static files are located in a folder called public
// app.use(express.static("public"));

// Access view files via view engine (other engines exist probably)
// Usually .egs extensions
// Can include partials or pages subdirectory
// app.set("views", "views"); // This tells the directory to look in
// app.set("view engine", "ejs"); // this tells the file type to look for

// app.get('/cool', (req, res) => res.send(cool()));

// app.get("/", function(req, res){
//     console.log("Received a request for /");
//
//     res.write("This is the root");
//     res.end();
// });
//
// app.get("/home", function(req, res){
//     console.log("Received a request for /home");
//
//     res.write("<h1>This is the home page</h1>");
//     res.end();
// });

// app.get("/home", function(req, res){
//   console.log("Received a request for the home page");
//   var user = "Larry";
//   var emailAddress = "Larry@Larry.Larry";
//
//   var params = {username: user, email: emailAddress};
//
//   res.render("home", params);
// });

// app.listen(5000, function(){
//   console.log("There server now currently listening on port 5000");
// });
