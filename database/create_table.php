<?php
/**
* This file creates tables that are needed for treasure hunt game.
* @author kenta
*
*/

require('./connection.php');

$sql = [
  "CREATE TABLE IF NOT EXISTS challenges (
    challengeID INT PRIMARY KEY AUTO_INCREMENT,
    challenge_name VARCHAR(30),
    description VARCHAR(250),
    stars int NOT NULL
  );",
  "CREATE TABLE IF NOT EXISTS checkPoints(
    id INT PRIMARY KEY AUTO_INCREMENT,
    building_name VARCHAR(30),
    room VARCHAR(30)
  );",
  "CREATE TABLE IF NOT EXISTS users (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    fName VARCHAR(45) NOT NULL,
    lName VARCHAR(45) NOT NULL,
    username VARCHAR(45) NOT NULL,
    password VARCHAR(45) NOT NULL,
    email VARCHAR(45) NOT NULL,
    score INT DEFAULT 0
  );"
];

$len= count($sql);

for($i = 0; $i < $len; $i++){
  if ($conn->query($sql[$i]) === TRUE)
  {
      echo "Table created successfully <br/>";
  }
  else
  {
      echo "Error creating table: " . $conn->error;
  }
}

$conn->close();


 ?>
