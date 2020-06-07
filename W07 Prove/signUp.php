<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="2column.css" media="screen" />
</head>

<body>


	<div id="header">
		<h1><b>PETSVILLE ANIMAL SHELTER</b></h1>
		<h2>Create an Account or Sign In</h2>
		<h3><a href="dataAccess.php">Return Home</a></h3>
	</div>

	<div class="colmask rightmenu">
		<div class="colleft">
			<div class="col1">
				<div class="border">
					<form id="signUpForm" action="createAccount.php" method="POST">

						<input type="text" id="username" name="username" placeholder="Username">
						<label for="username">Username</label>
						<br /><br />

						<input type="password" id="password" name="password" placeholder="Password"></input>
						<label for="password">Password</label>
						<br /><br />

						<input type="submit" value="Create Account" />

					</form>

					Or <a href="signIn.php">Already Have an Account? Sign In</a> for a new account.

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
