<?php
@author [Ridita Hossain] [<rnh202@exeter.ac.uk>]

session_start()

// initializing variables
$Forename = "";
$Surname = "";
$username = "";
$emailID  = "";
$occupation  = "";


// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'Registration');

//Recieve input from form

if(isset($_POST['Create'])) {
	$Forename = mysqli_real_escape_string($db, $_POST['Forename']);
	$Surname = mysqli_real_escape_string($db, $_POST['Surname']);
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password = mysqli_real_escape_string($db, $_POST['password_1']);
	$email = mysqli_real_escape_string($db, $_POST['emailID']);
	$occupation = mysqli_real_escape_string($db, $_POST['occupation']);
 
}

//Register user
$query = "INSERT INTO Users(Forename,Lastname,username,password,emailID, occupation)
		VALUES('$Forename','$Surname','$username','$password', '$emailID', $occupation)";
mysqli_query($db, $query);		
$_SESSION['username'] = $username;

//Add link to the challenge page
$_SESSION['success'] = "You are now logged in";
  
	
