<?php

session_start();

$firstName = $_POST['firstname'];
$lastName = $_POST['lastname'];
$addressZip = $_POST['addresszip'];
$role = 'Volunteer';

// Clean enteries 
$firstName = htmlspecialchars($firstName);
$lastName = htmlspecialchars($lastName);
$addressZip = htmlspecialchars($addressZip);

// Connect to database (this late?)
require("dbConnect.php");
$db = get_db();

// Create Query
$query = 'INSERT INTO people(firstname, lastname, addresszip, role) VALUES(:firstname, :lastname, :addresszip, :role)';

// Prepare Statement
$statement = $db->prepare($query);

// Bind Values
$statement->bindValue(':firstname', $firstName);
$statement->bindValue(':lastname', $lastName);
$statement->bindValue(':addresszip', $addressZip);
$statement->bindValue(':role', $role);

// Execute Statement
$statement->execute();

// Redirect and die();
header("Location: thankYou.php");
die();
?>
