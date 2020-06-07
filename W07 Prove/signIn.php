<?php
session_start();

$badLogin = false;

// Check that username and password were set
if (isset($_POST['username']) && isset($_POST['password']))
{
	// Set variables
	$username = $_POST['username'];
	$password = $_POST['password'];

	// Connect to database
	require("dbConnect.php");
	$db = get_db();

	$query = 'SELECT password FROM login WHERE username=:username';

	$statement = $db->prepare($query);
	$statement->bindValue(':username', $username);

	$result = $statement->execute();

	if ($result)
	{
		$row = $statement->fetch();
		$hashedPasswordFromDB = $row['password'];

		// now check to see if the hashed password matches
		if (password_verify($password, $hashedPasswordFromDB))
		{
			// password was correct, put the user on the session, and redirect to home
			$_SESSION['username'] = $username;
			header("Location: confirmation.php");
			die(); // we always include a die after redirects.
		}
		else
		{
			$badLogin = true;
		}

	}
	else
	{
		$badLogin = true;
	}
}

// If we get to this point without having redirected, then it means they
// should just see the login form.
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="2column.css" media="screen" />
</head>

<body>
<div>

	<div id="header">
		<h1><b>PETSVILLE ANIMAL SHELTER</b></h1>
		<h2>Create an Account or Sign In</h2>
		<h3><a href="dataAccess.php">Return Home</a></h3>
	</div>

<?php
if ($badLogin)
{
	echo "Incorrect username or password!<br /><br />\n";
}
?>

<h1>Please sign in below:</h1>
<div class="colmask rightmenu">
	<div class="colleft">
		<div class="col1">
			<div class="border">
				<form id="mainForm" action="signIn.php" method="POST">

					<input type="text" id="username" name="username" placeholder="Username">
					<label for="username">Username</label>
					<br /><br />

					<input type="password" id="password" name="password" placeholder="Password">
					<label for="password">Password</label>
					<br /><br />

					<input type="submit" value="Sign In" />

				</form>
			</div>
		</div>
	</div>
</div>

<br /><br />

Or <a href="signUp.php">Sign up</a> for a new account.

</div>

<div id="footer">
	<p>Posted for CSE 341: Backend Web Development II<br>
	<p>Assignment Due: 06/06/2020<br></p>
	<p><a href="https://serene-inlet-46314.herokuapp.com/w01/homepage.php">Return Home</a></p>
</div>
</body>
</html>
