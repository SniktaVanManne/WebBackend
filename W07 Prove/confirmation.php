<?php
session_start();

if (isset($_SESSION['username']))
{
	$username = $_SESSION['username'];
}
else
{
	header("Location: signIn.php");
	die(); // we always include a die after redirects.
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Confirmation</title>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="2column.css" media="screen" />
</head>

<body>
<div>
	<div id="header">
		<h1><b>PETSVILLE ANIMAL SHELTER</b></h1>
		<h2>Sign In Confirmed</h2>
		<h3><a href="dataAccess.php">Return Home</a></h3>
	</div>

	<div class="colmask rightmenu">
		<div class="colleft">
			<div class="col1">
				<div class="border">
					<h1>Welcome!</h1>

					Your username is: <?= $username ?><br /><br />

					<a href="signOut.php">Sign Out</a>
				</div>
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
