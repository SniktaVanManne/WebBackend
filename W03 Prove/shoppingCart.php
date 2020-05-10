<?php
    session_start();

      $_SESSION["na"];
      $_SESSION["sa"];
      $_SESSION["eu"];
      $_SESSION["af"];
      $_SESSION["as"];
      $_SESSION["au"];
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Web Backend II</title>
    <link rel="stylesheet" href="shoppingCartStyle.css">
  </head>

  <body>

    <header>
      <h1>CSE 341: Backend Web Develoment II</h1>
      <h2>W03 Prove: Shopping Cart</h2>
    </header>

    <div class="row">
      <div id="assignmentWidget" class="column left">
        <h2>Assignments</h2>
        <ul>
          <li><a href="https://serene-inlet-46314.herokuapp.com/hello.html">Hello World!</a></li>
          <li><a href="https://serene-inlet-46314.herokuapp.com/w01/homepage.php">Home Page</a></li>
          <li><a href="https://serene-inlet-46314.herokuapp.com/w03/prove/shoppingCart.php">W03: Shopping Cart </a></li>
        </ul>
      </div>

    <div id="mainContent" class="column middle">
      <h2> Please Choose What to Add To Your Cart:</h2>

      <form action="shoppingCartB.php" method="post" id="usrform">
          <h2>Continents For Sale!</h2>
          <input type="checkbox" id="na" name="northAmerica" value="North America">
          <label for="na"> North America</label><br>
          <input type="checkbox" id="sa" name="southAmerica" value="South America">
          <label for="sa"> South America</label><br>
          <input type="checkbox" id="eu" name="europe" value="Europe">
          <label for="eu"> Europe</label><br>
          <input type="checkbox" id="af" name="africa" value="Africa">
          <label for="af"> Africa</label><br>
          <input type="checkbox" id="as" name="asia" value="Asia">
          <label for="as"> Asia</label><br>
          <input type="checkbox" id="au" name="australia" value="Australia">
          <label for="au"> Australia</label><br>

          <input type="submit" name="submit">

        </form>
    </div>

    <div class="column right" id="cartContents">
        <h2>Items Currently In Your Cart:</h2>
        <ul>
          <?php
          foreach($_SESSION as $continent)
          {
            if ($continent != "" || $continent != null){
            	$continent_parsed = htmlspecialchars($continent);
            	echo "<li>
                      <p>
                        $continent_parsed
                      </p>
                    </li>";
            }
          }
          ?>
        </ul>
      </div>


    </div>
    <footer>
      <p>Posted for CSE 341: Backend Web Development II<br>
      <p>Assignment Due: 05/09/2020<br>
      </p>
    </footer>

</body>
</html>
