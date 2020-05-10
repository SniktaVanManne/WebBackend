<?php
    session_start();
    $_SESSION["address"];
    $_SESSION["city"];
    $_SESSION["zipcode"]
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
      <h2> Add Stuff Here</h2>

      <form action="shoppingCartD.php" method="post" id="myForm" onsubmit="return(validateSubmit());">
          <h2>Information</h2>

          <label for="address">Street Address</label><br>
          <input type="text" id="address" name="address" onchange="validateAddress();" autofocus><br>
          <p name="address_message"></p>

          <label for="city">City</label><br>
          <input type="text" id="city" name="city" onchange="validateCity();"><br>
          <p name="city_message"></p>

          <label for="zipcode">Zip Code</label><br>
          <input type="text" id="zipcode" name="zipcode" onchange="validateZip();"><br>
          <p name="zip_message"></p>

          <input type="submit" name="submit">
          <p name="submit_message"></p>
        </form>

        <input type = "button" value = "Back to Browsing" onclick="document.location = 'shoppingCart.php'">
        <input type = "button" value = "Back to Cart" onclick="document.location = 'shoppingCartB.php'">
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
