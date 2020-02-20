<?php

session_start()

// initializing variables

$Forename = "";
$Surname = "";
$username = "";
$emailID  = "";

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'Registration');

//Recieve input from form

if(isset($_POST['Create'])) {
	$Forename = mysqli_real_escape_string($db, $_POST['Forename']);
	$Surname = mysqli_real_escape_string($db, $_POST['Surname']);
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password = mysqli_real_escape_string($db, $_POST['password_1']);
	$email = mysqli_real_escape_string($db, $_POST['emailID']);
 
}

//Register user
$query = "INSERT INTO Users(username,password,emailID)
		VALUES('$Forename','$Surname','$username','$password', '$emailID')";
mysqli_query($db, $query);		
$_SESSION['username'] = $username;
$_SESSION['success'] = "You are now logged in";

	
