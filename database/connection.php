<?php

/**
* This file establish a connection to a specific database in a specific serevr.
* @author kenta
*
*/

require_once "./configure.php";
require("./connect.php");

$conn = new mysqli(server, user, pass, database);

if ($conn->connect_errno) {
  //if it failsto connect, error meesage showu up.
  echo "Connection fail...".$conn->connect_error."<br/>";
}else {
  //echo "Successfully connected! <br/>";
}

 ?>
