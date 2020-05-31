<?php
  require "dbConnect.php";
  $db = get_db();
?>

<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

<!-- Styling -->
<style>
body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>

<body class="w3-light-grey">

  <div class="w3-content" style="max-width:1400px">

  <!-- Header -->
  <header class="w3-container w3-center w3-padding-32">
    <h1><b>PETSVILLE ANIMAL SHELTER</b></h1>
    <p>Welcome to the shelter! You can volunteer, look up animals, or find a clinic near you!</p>
    <p><a href="https://serene-inlet-46314.herokuapp.com/w01/homepage.php">Return Home</a></p>
  </header>

  <!-- Grid -->
  <div class="w3-row">

  <!-- Main entries -->
  <div class="w3-col l8 s12">
    <!-- Article entry -->
    <div class="w3-card-4 w3-margin w3-white">
      <img src="petsville_animal_shelter.jpg" style="width:100%">
      <div class="w3-container">
        <h3><b>Petsville Animal Shelter</b></h3>
        <h5>About Us</h5>
      </div>   <!-- w3-Container -->

      <div class="w3-container">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
          et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
          aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa
          qui officia deserunt mollit anim id est laborum.</p>
        <div class="w3-row">
          <div class="w3-col m8 s12">
            <p><button class="w3-button w3-padding-large w3-white w3-border"><b>READ MORE »</b></button></p>
          </div>
        </div>
      </div>   <!-- About Us Description -->
    </div>      <!--About Us Article -->
    <hr>

    <!-- Article entry -->
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
          <div class="w3-col m8 s12">
            <p><a href="volunteers.php"><button class="w3-button w3-padding-large w3-white w3-border"><b>READ MORE »</b></button></a></p>
          </div>
        </div>
      </div>
    </div>    <!-- Volunteer Article entry -->

  </div>   <!-- End Articles -->


  <!-- Sub Sections -->
  <div class="w3-col l4">

    <div class="w3-card w3-margin w3-margin-top">
      <div class="w3-container w3-white">
        <h4><b>On Call Vet</b></h4>
        <h5>If you are needing a licensed vetinarian outside of normal business
           hours, we have on-call vets ready to meet your needs!</h5>
        <?php

          $onCallVet = $db->prepare("SELECT firstname, lastname, phonenumber, email FROM people WHERE id = 2");
          $onCallVet->execute();

          while ($vetInfo = $onCallVet->fetch(PDO::FETCH_ASSOC))
          {
            $firstName     = $vetInfo['firstname'];
            $lastName      = $vetInfo['lastname'];
            $phoneNumber   = $vetInfo['phonenumber'];
            $email         = $vetInfo['email'];

            echo "<p><b>Name:</b> Dr. $firstName $lastName <br> <b>Phone:</b> $phoneNumber <br> <b>Email:</b> $email</strong><p>";
          }

        ?>
      </div>
    </div>

    <!-- Animal of the Week -->
    <div class="w3-card w3-margin w3-margin-top">
    <img src="coming_soon.jpg" style="width:33.333%">
      <div class="w3-container w3-white">
        <h4><b>Animal of the Week!</b></h4>
        <?php

          $animalID = rand(1,13);
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
          <img src="coming_soon.jpg" alt="Image" class="w3-left w3-margin-right" style="width:50px">
          <span class="w3-large"><a href="animals.php">Animals</a></span><br>
          <span><a href="animals.php">Browse our rescue animals and find your critter companion!</a></span>
        </li>
        <li class="w3-padding-16">
          <img src="coming_soon.jpg" alt="Image" class="w3-left w3-margin-right" style="width:50px">
          <span class="w3-large">Clinics</span><br>
          <span>Search Petsville Shelter-approved Clinics and Partners!</span>
        </li>
        <li class="w3-padding-16">
          <img src="coming_soon.jpg" alt="Image" class="w3-left w3-margin-right" style="width:50px">
          <span class="w3-large">Directory</span><br>
          <span>Petsville Employees and Volunteers</span>
        </li>
      </ul>
    </div>  <!-- Popular Pages -->

    <hr>

</div>   <!-- End Sub Sections -->


</div>   <!-- End Grid -->
  <br>


</div>   <!-- End Main Body -->

  <!-- Footer -->
  <footer class="w3-container w3-dark-grey w3-padding-32 w3-margin-top">
    <p>Posted for CSE 341: Backend Web Development II<br>
    <p>Assignment Due: 05/23/2020<br></p>
    <p><a href="https://serene-inlet-46314.herokuapp.com/w01/homepage.php">Return Home</a></p>
  </footer>

</body>
</html>
