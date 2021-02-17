<?php
$servername = "localhost";
$username = "root";
$password = "";
//$username = "pooja";
//$password = "Hello@1234";
$dbname="vadhuvardb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}

//echo "Connected successfully";
?>