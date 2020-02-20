<?php

require("./connection.php");

addChallenge($conn);
setCheckPoints($conn);
exit();

function addChallenge($conn){
  $sql =
  "INSERT INTO challenges (challenge_name,description,stars) VALUES
  ('Quiz', 'What is the highest building the streatham campus?', 1);
  ";

  if ($conn->query($sql) === TRUE)
  {
      echo "New challenge created successfully <br/>";
  }
  else
  {
      echo "Error creating table: " . $conn->error;
  }
}

function setCheckPoints($conn){
  $sql =
  "INSERT INTO checkPoints (building_name, room) VALUES
  ('Old Library', ''),
  ('Peter chalk','RED'),
  ('Northcott theatre',''),
  ('Queens building','LT1'),
  ('Harrison','101');
  ";

  if ($conn->query($sql) === TRUE)
  {
      echo "CheckPoints are set successfully <br/>";
  }
  else
  {
      echo "Error creating table: " . $conn->error;
  }

}

$conn->close();

 ?>
