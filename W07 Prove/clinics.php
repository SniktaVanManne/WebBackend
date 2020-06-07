<?php
  require "dbConnect.php";
  $db = get_db();
  session_start();

	$city   = $_POST['city'];
  $speciality  = $_POST['speciality'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-GB">
<head>
	<title>Clinics Near Petsville Animal Shelter</title>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="2column.css" media="screen" />
</head>
<body>

<div id="header">
	<h1><b>PETSVILLE ANIMAL SHELTER</b></h1>
	<h2>Welcome to the shelter! Find professional clinics to help your furry ones!</h2>
	<h3><a href="dataAccess.php">Return Home</a></h3>
</div>
<div class="colmask rightmenu">
	<div class="colleft">
		<div class="col1">
			<h2><b>Professional Clinics Near You!</b></h2>
			<?php

				if(isset($_POST['city']) && isset($_POST['speciality'])){

					$statement = $db->prepare("SELECT name, phonenumber, addressstreet, addresscity, speciality FROM clinics WHERE addresscity = '$city' AND speciality = '$speciality'");
					$statement->execute();
				}
				else if(isset($_POST['city'])){

					$statement = $db->prepare("SELECT name, phonenumber, addressstreet, addresscity, speciality FROM clinics WHERE addresscity = '$city'");
					$statement->execute();
				}
				else if(isset($_POST['speciality'])){

					$statement = $db->prepare("SELECT name, phonenumber, addressstreet, addresscity, speciality FROM clinics WHERE speciality = '$speciality'");
					$statement->execute();
				}
				else{
					$statement = $db->prepare("SELECT name, phonenumber, addressstreet, addresscity, speciality FROM clinics");
					$statement->execute();
				}
				while ($row = $statement->fetch(PDO::FETCH_ASSOC))
				{
					$name          = $row['name'];
					$phone         = $row['phonenumber'];
					$address       = $row['addressstreet'];
					$city          = $row['addresscity'];
					$speciality    = $row['speciality'];

					echo "<p class='solid'><b>Name:</b> $name <br> <b>Address:</b> $address <br> <b>City:</b> $city <br> <b>Clinic Speciality:</b> $speciality</strong><p>";
				}
			?>

			<!-- Column 1 end -->
		</div>
		<div class="col2">
			<!-- Column 2 start -->
			<div id="ads">
					<img src="animal_hospital.png" border="0" height="200" />
			</div>
			 <h3><strong>Search by Town and Clinic Speciality</strong></h3>
        <div class="border">
    			<form action="test.php" method="POST">
    	      <h3><b>City</b></h3>
						<input type="radio" id="animalville" name="city" value="Animalville">
						<label for="animalville">Animalville</label>
						<input type="radio" id="petstopia" name="city" value="Petstopia">
						<label for="petstopia">Petstopia</label>
						<input type="radio" id="cattlesdam" name="city" value="Cattlesdam">
						<label for="cattlesdam">Cattlesdam</label>
						<input type="radio" id="hamsterburg" name="city" value="Hamsterburg">
						<label for="hamsterburg">Hamsterburg</label>

    	      <h3><b>Speciality</b></h3>
						<input type="radio" id="catsAndDogs" name="speciality" value="Cats and Dogs">
						<label for="catsAndDogs">Cats and Dogs</label>
						<input type="radio" id="smallPets" name="speciality" value="Small Pets">
						<label for="smallPets">Small Pets</label>
						<input type="radio" id="largeAnimals" name="speciality" value="Large Animals">
						<label for="largeAnimals">Large Animals</label><br>


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
