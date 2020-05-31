<?php
  require "dbConnect.php";
  $db = get_db();

  // $gender   = $_POST['gender'];
  // $species  = $_POST['species'];
?>

<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

<!-- Styling -->

<body>

  <header>
    <h1><b>PETSVILLE ANIMAL SHELTER</b></h1>
    <p>Welcome to the shelter! See which animals are currently looking for forever homes!</p>
    <p><a href="dataAccess.php">Return Home</a></p>
    <p><a href="https://serene-inlet-46314.herokuapp.com/w01/homepage.php">Return Landing Page</a></p>
  </header>

  <h2><b>Sign Up to Volunteer!</b></h2>

    <form action="volunteers.php" method="post">
      <p>Become a Volunteer Today!</p>
      <input type="text" id="firstName" name="firstName" value="">
      <label for="firstname">First Name</label>
      <input type="text" id="lastName" name="lastName" value="">
      <label for="lastName">Last Name</label><br>
      <input type="text" id="addressZip" name="addressZip" value="">
      <label for="addressZip">Zip Code</label><br>


    <input type="submit">
    </form>

  <!-- Grid -->
  <?php

      $statement = $db->prepare("SELECT firstName, lastName, addressZip FROM people WHERE role = 'Volunteer'");
      $statement->execute();

      while ($volunteer = $statement->fetch(PDO::FETCH_ASSOC))
      {
        $firstName          = $volunteer['firstName'];
        $lastName           = $volunteer['lastName'];
        $addressZip         = $volunteer['addressZip'];

        echo "<p><b>Name:</b> $firstName $lastName <br> <b>From:</b> $addressZip ";
      }
  ?>

  <!-- Footer -->
  <footer>
    <p>Posted for CSE 341: Backend Web Development II<br>
    <p>Assignment Due: 05/23/2020<br></p>
    <p><a href="https://serene-inlet-46314.herokuapp.com/w01/homepage.php">Return Home</a></p>
  </footer>

</body>
</html>
