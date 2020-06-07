<?php
  session_start();
  require "dbConnect.php";
  $db = get_db();

  $gender   = $_POST['gender'];
  $species  = $_POST['species'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-GB">
<head>
	<title>Animals of Petsville Animal Shelter</title>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="2column.css" media="screen" />
</head>
<body>

<div id="header">
	<h1><b>PETSVILLE ANIMAL SHELTER</b></h1>
	<p>Welcome to the shelter! See which animals are currently looking for forever homes!</p>
	<p><a href="dataAccess.php">Return Home</a></p>
</div>
<div class="colmask rightmenu">
	<div class="colleft">
		<div class="col1">
			<h2><b>Meet Our Animals</b></h2>
			<?php

		      if(isset($_POST['species']) && isset($_POST['gender'])){
		        // Do something
		        $statement = $db->prepare("SELECT name, species, breed, notes FROM animals WHERE isMale = $gender AND species = '$species'");
		        $statement->execute();
		      }
		    else if(isset($_POST['gender'])){
		      // Do something
		      $statement = $db->prepare("SELECT name, species, breed, notes FROM animals WHERE isMale = $gender");
		      $statement->execute();
		    }
		    else if(isset($_POST['species'])){
		      // Do something
		      $statement = $db->prepare("SELECT name, species, breed, notes FROM animals WHERE species = '$species'");
		      $statement->execute();
		    }
		    else{
		      $statement = $db->prepare("SELECT name, species, breed, notes FROM animals");
		      $statement->execute();
		    }
		    while ($animal = $statement->fetch(PDO::FETCH_ASSOC))
		    {
		      $name     = $animal['name'];
		      $species  = $animal['species'];
		      $breed    = $animal['breed'];
		      $notes    = $animal['notes'];

		      echo "<p class='solid'> <b>Name:</b> $name <br> <b>Species:</b> $species <br> <b>Breed:</b> $breed <br> <b>Notes:</b> $notes</strong><p>";
		    }
		  ?>

			<!-- Column 1 end -->
		</div>
		<div class="col2">
			<!-- Column 2 start -->
			<div id="ads">
					<img src="cat_and_dog.jpg" border="0" height="200" />
			</div>
			 <h3><strong>Search by Species and Gender</strong></h3>
        <div class="border">
    			<form action="animals.php" method="post">
    	      <h3><b>Gender</b></h3>
    	      <input type="radio" id="genderMale" name="gender" value="true">
    	      <label for="genderMale">Male</label>
    	      <input type="radio" id="genderFemale" name="gender" value="false">
    	      <label for="genderFemale">Female</label><br>

    	      <h3><b>Species</b></h3>
    	      <input type="radio" id="speciesDog" name="species" value="Dog">
    	      <label for="speciesDog">Dogs</label>
    	      <input type="radio" id="speciesCat" name="species" value="Cat">
    	      <label for="speciesCat">Cats</label>
    	      <input type="radio" id="speciesRabbit" name="species" value="Rabbit">
    	      <label for="speciesRabbit">Rabbits</label><br><br>


    	    <input type="submit">
    	    </form>
        </div>
		</div>
	</div>
</div>
<div id="footer">
	<p>Posted for CSE 341: Backend Web Development II<br>
	<p>Assignment Due: 06/06/2020<br></p>
	<p><a href="https://serene-inlet-46314.herokuapp.com/w01/homepage.php">Return Home</a></p>
</div>

</body>
</html>
