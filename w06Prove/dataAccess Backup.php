<?php
  require "dbConnect.php";
  $db = get_db();
?>

<!DOCTYPE html>
<html>
  <title>Web Backend Development II</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
  <link rel="stylesheet" href="prove5.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

  <!-- Styling -->
  <style>
  body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
  </style>

  <body class="w3-light-grey">

    <!-- w3-content defines a container for fixed size centered content,
    and is wrapped around the whole page content, except for the footer in this example -->
    <div class="Web Backend Development II" style="max-width:1400px">

    <header class="w3-container w3-center w3-padding-32"><h1><strong> Prove W05 Data Access </strong></h1></header>

    <!-- Header -->
    <header class="w3-container w3-center w3-padding-32">
      <h1><b>PETSVILLE ANIMAL SHELTER</b></h1>
      <p>Welcome to the shelter! You can volunteer, look up animals, or find a clinic near you!</p>
      <p><a href="https://serene-inlet-46314.herokuapp.com/w01/homepage.php">Return Home</a></p>
    </header>

    <!-- Grid -->
    <div class="w3-row">

    <!-- Blog entries -->
    <div class="w3-col l8">
      <!-- Blog entry -->
      <div class="w3-card-4 w3-margin w3-white">
        <img src="petsville_animal_shelter.jpg" style="width:100%">
        <div class="w3-container">
          <h3><b>Petsville Animal Shelter</b></h3>
          <h5>About Us</h5>
        </div>

        <div class="w3-container">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
            et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
            aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa
            qui officia deserunt mollit anim id est laborum.</p>
          <div class="w3-row">
            <div class=".w3-col m8 s12">
              <!-- <p><button class="w3-button w3-padding-large w3-white w3-border"><b>READ MORE »</b></button></p> -->
            </div>
          </div>
        </div>
      </div>
      <hr>

      <!-- Blog entry -->
      <div class="w3-card-4 w3-margin w3-white">
      <img src="volunteer.png" style="width:100%">
        <div class="w3-container">
          <h3><b>Volunteering</b></h3>
          <h5>Make a Difference!</h5>
        </div>

        <div class="w3-container">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
            et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
            aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa
            qui officia deserunt mollit anim id est laborum.</p>
          <div class="w3-row">
            <!-- <div class="w3-col m8 s12">
              <p><button class="w3-button w3-padding-large w3-white w3-border"><b>READ MORE »</b></button></p>
            </div> -->
          </div>
        </div>
      </div>
    <!-- END BLOG ENTRIES -->
    </div>

    <!-- Introduction menu -->
    <div class="colAnimalOfTheWeek">
      <!-- About Card -->
      <div class="w3-card w3-margin w3-margin-top">
      <img src="coming_soon.jpg" style="width:33.333%">
        <div class="w3-container w3-white">
          <h4><b>Animal of the Week!</b></h4>
          <?php

            $animalID = rand(1,4);
            $statement = $db->prepare("SELECT name, species, breed, notes FROM animals WHERE id = $animalID");
            $statement->execute();

            while ($animalOfTheWeek = $statement->fetch(PDO::FETCH_ASSOC))
            {
              $name     = $animalOfTheWeek['name'];
              $species  = $animalOfTheWeek['species'];
              $breed    = $animalOfTheWeek['breed'];
              $notes    = $animalOfTheWeek['notes'];

              echo "<p><b>Name:</b> $name <br> <b>Species:</b> $species <br> <b>Breed:</b> $breed <br> <b>Notes:</b> $notes</strong><p>";
            }

          ?>
        </div>
      </div>

      <hr>

      <!-- Popular Pages -->
      <div class="w3-card w3-margin">
        <div class="w3-container w3-padding">
          <h4>Popular Pages</h4>
        </div>
        <ul class="w3-ul w3-hoverable w3-white">
          <li class="w3-padding-16">
            <img src="/w3images/workshop.jpg" alt="Image" class="w3-left w3-margin-right" style="width:50px">
            <span class="w3-large">Animals</span><br>
            <span>Browse our rescue animals and find your critter companion!</span>
          </li>
          <li class="w3-padding-16">
            <img src="/w3images/gondol.jpg" alt="Image" class="w3-left w3-margin-right" style="width:50px">
            <span class="w3-large">Clinics</span><br>
            <span>Search Petsville Shelter-approved Clinics and Partners!</span>
          </li>
          <li class="w3-padding-16">
            <img src="/w3images/skies.jpg" alt="Image" class="w3-left w3-margin-right" style="width:50px">
            <span class="w3-large">Directory</span><br>
            <span>Petsville Employees and Volunteers</span>
          </li>
        </ul>
      </div>  <!-- Popular Pages -->

      <hr>


    <!-- END Introduction Menu -->
    </div>

    <!-- END GRID -->
    </div><br>

    <!-- END w3-content -->
    </div>

    <!-- Footer -->
    <footer class="w3-container w3-dark-grey w3-padding-32 w3-margin-top">
      <p>Posted for CSE 341: Backend Web Development II<br>
      <p>Assignment Due: 05/23/2020<br></p>
      <p><a href="https://serene-inlet-46314.herokuapp.com/w01/homepage.php">Return Home</a></p>
    </footer>

  </body>
</html>
