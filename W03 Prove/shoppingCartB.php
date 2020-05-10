<?php
  session_start();


  $northAmerica = htmlspecialchars($_POST["northAmerica"]);
  $southAmerica = htmlspecialchars($_POST["southAmerica"]);
  $europe       = htmlspecialchars($_POST["europe"]);
  $africa       = htmlspecialchars($_POST["africa"]);
  $asia         = htmlspecialchars($_POST["asia"]);
  $australia    = htmlspecialchars($_POST["australia"]);

  $_SESSION["na"] = $northAmerica;
  $_SESSION["sa"] = $southAmerica;
  $_SESSION["eu"] = $europe;
  $_SESSION["af"] = $africa;
  $_SESSION["as"] = $asia;
  $_SESSION["au"] = $australia;

  $functionName = "";

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
      <h2>W03 Prove: Shopping Cart View</h2>
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
        <h1>Welcome!</h2>
        <h2>Items In Your Cart:</h2>


        <form action="shoppingCartB.php" method="post" id="usrform">
          <ul>
            <?php
            foreach($_SESSION as $key => $continent)
            {
              if ($continent != "" || $continent != null){
              	$continent_parsed = htmlspecialchars($continent);
                if ($key == 'na'){
                   $functionName = "removeNA()";
                }
                // if ($key == 'sa'){
                //   $functionName = removeSA();
                // }
                // if ($key == 'eu'){
                //   $functionName = removeEU();
                // }
                // if ($key == 'af'){
                //   $functionName = removeAF();
                // }
                // if ($key == 'as'){
                //   $functionName = removeAS();
                // }
                // if ($key == 'au'){
                //   $functionName = removeAU();
                // }
                echo "
                        <li>
                        <p>
                          $continent_parsed
                        </p>

                      </li>
                      ";
              }
            }
            ?>
          </ul>

          <input type="submit" name="submit" value="Empty Cart">
        </form>

        <input type = "button" value = "Back to Browsing" onclick="document.location = 'shoppingCart.php'">
        <input type = "button" value = "Continue to Check Out" onclick="document.location = 'shoppingCartC.php'">
      </div>

      <div class="column right"></div>
   </div>

    </div>


    <footer>
      <p>Posted for CSE 341: Backend Web Development II<br>
      <p>Assignment Due: 05/09/2020<br>
      </p>
    </footer>

</body>

  <script type="text/javascript">
    function removeNA(){
      alert("Removing NA");
      $_SESSION["na"] = "";
      //location.reload();
    }
  </script>
</html>
