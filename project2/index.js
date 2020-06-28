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
  .get('/card', function(req, res){
    console.log("Received a request for /card");

    res.render('pages/card');
  })
  .get('/cool', (req, res) => res.send(cool()))
  .listen(PORT, () => console.log(`Listening on ${ PORT }`))
