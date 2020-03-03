<?php
/**
* This file creates tables that are needed for treasure hunt game.
* @author kenta
*
*/

require('./connection.php');

$sql = [
  "CREATE TABLE IF NOT EXISTS quiz (
    quizID INT PRIMARY KEY AUTO_INCREMENT,
    contents VARCHAR(250),
    points int NOT NULL
  );",
  "CREATE TABLE IF NOT EXISTS locations(
    id INT PRIMARY KEY AUTO_INCREMENT,
    building_name VARCHAR(30)
  );",
  "CREATE TABLE IF NOT EXISTS users (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    fName VARCHAR(45) NOT NULL,
    lName VARCHAR(45) NOT NULL,
    username VARCHAR(45) NOT NULL,
    password VARCHAR(45) NOT NULL,
    email VARCHAR(45) NOT NULL,
    score INT DEFAULT 0
  );",
  "CREATE TABLE IF NOT EXISTS team(
    groupID INT PRIMARY KEY AUTO_INCREMENT,
    groupScore INT,
    groupName VARCHAR(30),
    member1 INT,
    member2 INT,
    member3 INT,
    member4 INT,
    member5 INT,
    FOREIGN KEY(member1) REFERENCES users(ID),
    FOREIGN KEY(member2) REFERENCES users(ID),
    FOREIGN KEY(member3) REFERENCES users(ID),
    FOREIGN KEY(member4) REFERENCES users(ID),
    FOREIGN KEY(member5) REFERENCES users(ID)
  );"
];

$len= count($sql);

for($i = 0; $i < $len; $i++){
  if ($conn->query($sql[$i]) === TRUE)
  {
      //echo "Table created successfully <br/>";
  }
  else
  {
      echo "Error creating table: " . $conn->error;
  }
}

$conn->close();


 ?>
