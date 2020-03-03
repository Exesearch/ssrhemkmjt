<?php

session_start()
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'Registration';

// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	// If there is an error with the connection, stop the script and display the error.
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Now we check if the data was submitted, isset() function will check if the data exists.
if (!isset($_POST['forename'], $_POST['surname'], $_POST['username'], $_POST['password'], $_POST['email'], $_POST['occupation'])) {
	// Could not get the data that should have been sent.
	die ('Please complete the registration form!');
}
// Make sure the submitted registration values are not empty.
if (empty($_POST['forename'] || $_POST['surname'] || $_POST['username']) || empty($_POST['password']) || empty($_POST['email'] || $_POST['occupation'])) {
	// One or more values are empty.
	die ('Please complete the registration form');
}

// We need to check if the user with that username exists.
if ($stmt = $con->prepare('SELECT ID, password FROM users WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
	// Store the result so we can check if the user exists in the database.
	if ($stmt->num_rows > 0) {
		// Username already exists
		echo 'Username exists, please choose another!';
	} else {
		// Username doesnt exists, insert new user
		if ($stmt = $con->prepare('INSERT INTO users (forename, surname, username, password, email, occupation) VALUES (?, ?, ?, ?, ?, ?)')) {
		// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
			$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
			$stmt->bind_param('sss',$_POST['forename'],$_POST['surname'], $_POST['username'], $password, $_POST['email'],$_POST['occupation']);
			$stmt->execute();
			echo 'You have successfully registered, you can now login!';
		} else {
			// Something is wrong with the sql statement, check to make sure users table exists with all 6 fields.
			echo 'Could not prepare statement!';
		}
	}
	$stmt->close();
} else {
	// Something is wrong with the sql statement, check to make sure users table exists with all 6 fields.
	echo 'Could not prepare statement!';
}
$con->close();
?>
