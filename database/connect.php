<?php
require_once "./configure.php";

$conn = new mysqli(server, user, pass);

$ss = "CREATE DATABASE IF NOT EXISTS treasure_hunt;";
$conn->query($ss);

 ?>
