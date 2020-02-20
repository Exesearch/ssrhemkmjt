<?php

require_once "./configure.php";
require("./connect.php");

$conn = new mysqli(server, user, pass, database);

if ($conn->connect_errno) {
  echo "Connection fail...".$conn->connect_error."<br/>";
}else {
  echo "Successfully connected! <br/>";
}

 ?>
