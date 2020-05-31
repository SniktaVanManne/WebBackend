<?php
  //Get Form data
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $addressZip = $_POST['addressZip'];

  require("dbConnect.php");
  $db = get_db();

  try
    {
    	// Create query and placeholders
    	$query = 'INSERT INTO people(firstName, lastName, role, addressZip) VALUES(:firstName, :lastName, 'Volunteer', :addressZip)';
    	$statement = $db->prepare($query);

    	// Now we bind the values to the placeholders. This does some nice things
    	// including sanitizing the input with regard to sql commands.
    	$statement->bindValue(':firstName', $firstName);
    	$statement->bindValue(':lastName', $lastName);
    	$statement->bindValue(':addressZip', $addressZip);

    	$statement->execute();
    }
    catch (Exception $ex)
    {
    	// Please be aware that you don't want to output the Exception message in
    	// a production environment
    	echo "Error with DB. Details: $ex";
    	die();
    }

    // finally, redirect them to a new page to actually show the topics
    header("Location: volunteers.php");

    die();

?>
