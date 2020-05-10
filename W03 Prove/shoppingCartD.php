<?php
    session_start();
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
      <h2> Confirmation:</h2>
      <h3> The Following Items </h3>


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

      <h3> Will be Delivered To </h3>
      <p><?php echo $_POST['address']; ?><p>
      <p><?php echo $_POST['city']; ?><p>
      <p><?php echo $_POST['zipcode']; ?><p>
    </div>

    <div class="column right" id="cartContents">
      </div>


    </div>
    <footer>
      <p>Posted for CSE 341: Backend Web Development II<br>
      <p>Assignment Due: 05/09/2020<br>
      </p>
    </footer>

</body>
</html>
