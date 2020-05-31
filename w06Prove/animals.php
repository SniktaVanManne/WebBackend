<?php
  require "dbConnect.php";
  $db = get_db();

  $gender   = $_POST['gender'];
  $species  = $_POST['species'];
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

  <h2><b>Meet Our Animals</b></h2>
  <hr>
    <form action="animals.php" method="post">
      <p>Gender</p>
      <input type="radio" id="genderMale" name="gender" value="true">
      <label for="genderMale">Male</label>
      <input type="radio" id="genderFemale" name="gender" value="false">
      <label for="genderFemale">Female</label><br>

      <p>Species</p>
      <input type="radio" id="speciesDog" name="species" value="Dog">
      <label for="speciesDog">Dogs</label>
      <input type="radio" id="speciesCat" name="species" value="Cat">
      <label for="speciesCat">Cats</label>
      <input type="radio" id="speciesRabbit" name="species" value="Rabbit">
      <label for="speciesRabbit">Rabbits</label><br>


    <input type="submit">
    </form>

  <!-- Grid -->
  <?php

      if(isset($_POST['species']) && isset($_POST['gender'])){
        // Do something
        $statement = $db->prepare("SELECT name, species, breed, notes FROM animals WHERE isMale = $gender AND species = '$species'");
        $statement->execute();

        while ($animal = $statement->fetch(PDO::FETCH_ASSOC))
        {
          $name     = $animal['name'];
          $species  = $animal['species'];
          $breed    = $animal['breed'];
          $notes    = $animal['notes'];

          echo "<p><b>Name:</b> $name <br> <b>Species:</b> $species <br> <b>Breed:</b> $breed <br> <b>Notes:</b> $notes</strong><p>";
        }
      }
    else if(isset($_POST['gender'])){
      // Do something
      $statement = $db->prepare("SELECT name, species, breed, notes FROM animals WHERE isMale = $gender");
      $statement->execute();

      while ($animal = $statement->fetch(PDO::FETCH_ASSOC))
      {
        $name     = $animal['name'];
        $species  = $animal['species'];
        $breed    = $animal['breed'];
        $notes    = $animal['notes'];

        echo "<p><b>Name:</b> $name <br> <b>Species:</b> $species <br> <b>Breed:</b> $breed <br> <b>Notes:</b> $notes</strong><p>";
      }
    }
    else if(isset($_POST['species'])){
      // Do something
      $statement = $db->prepare("SELECT name, species, breed, notes FROM animals WHERE species = '$species'");
      $statement->execute();

      while ($animal = $statement->fetch(PDO::FETCH_ASSOC))
      {
        $name     = $animal['name'];
        $species  = $animal['species'];
        $breed    = $animal['breed'];
        $notes    = $animal['notes'];

        echo "<p><b>Name:</b> $name <br> <b>Species:</b> $species <br> <b>Breed:</b> $breed <br> <b>Notes:</b> $notes</strong><p>";
      }
    }
    else{
      $statement = $db->prepare("SELECT name, species, breed, notes FROM animals");
      $statement->execute();

      while ($animal = $statement->fetch(PDO::FETCH_ASSOC))
      {
        $name     = $animal['name'];
        $species  = $animal['species'];
        $breed    = $animal['breed'];
        $notes    = $animal['notes'];

        echo "<p><b>Name:</b> $name <br> <b>Species:</b> $species <br> <b>Breed:</b> $breed <br> <b>Notes:</b> $notes</strong><p>";
      }
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
