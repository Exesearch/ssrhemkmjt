<?php
require_once "./configure.php";

$conn = new mysqli(server, user, pass);

$ss = "CREATE DATABASE IF NOT EXISTS exesearch;";
$conn->query($ss);

 ?>
