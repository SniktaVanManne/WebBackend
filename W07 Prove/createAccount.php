<?php
// get the data from the POST
$username = $_POST['username'];
$password = $_POST['password'];

if (!isset($username) || $username == ""
	|| !isset($password) || $password == "")
{
	header("Location: signUp.php");
	die();
	// Always die after redirect
}

// Filter unwatned characters
$username = htmlspecialchars($username);

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Connect to database
require("dbConnect.php");
$db = get_db();

$query = 'INSERT INTO login(username, password) VALUES(:username, :password)';
$statement = $db->prepare($query);
$statement->bindValue(':username', $username);

// **********************************************
// NOTICE: We are submitting the hashed password!
// **********************************************
$statement->bindValue(':password', $hashedPassword);

$statement->execute();


// finally, redirect them to the sign in page
header("Location: signIn.php");
die();

?>
