<?php

  session_start();
  require "dbConnect.php";
  $db = get_db();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-GB">
<head>
	<title>Volunteer with Petsville Animal Shelter</title>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="2column.css" media="screen" />
</head>
<body>

<div id="header">
	<h1><b>PETSVILLE ANIMAL SHELTER</b></h1>
	<h2>We have many opportunities for those looking to volunteer!</h2>
	<h3><a href="dataAccess.php">Return Home</a></h3>
</div>
<div class="colmask rightmenu">
	<div class="colleft">
		<div class="col1">
			<h2><b>Meet Our Lovely and Selfless Volunteers!</b></h2>
			<?php

		      $statement = $db->prepare("SELECT firstname, lastname, addresszip FROM people WHERE role = 'Volunteer'");
		      $statement->execute();

		      while($row = $statement->fetch(PDO::FETCH_ASSOC)){
		          $firstName = $row['firstname'];
		          $lastName = $row['lastname'];
		          $addressZip = $row['addresszip'];

		          echo "<p class='solid'><b>Name:</b> $firstName $lastName <br> From: $addressZip<p>";

		      }

		  ?>

			<!-- Column 1 end -->
		</div>
		<div class="col2">
			<!-- Column 2 start -->
			<div id="ads">
					<img src="heart.jpg" border="0" height="200" />
			</div>
			 <h3><strong>Sign Up to Volunteer!</strong></h3>
        <div class="border">
    			<form action="volunteers_form_handler.php" method="POST">
    	      <h3><b>Become a Volunteer Today!</b></h3>
						<input type="text" id="firstname" name="firstname">
			      <label for="firstname">First Name</label>
			      <input type="text" id="lastname" name="lastname">
			      <label for="lastname">Last Name</label><br>
			      <input type="text" id="addresszip" name="addresszip">
			      <label for="addresszip">Zip Code</label><br>


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
