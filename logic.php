<?php

$servername = "localhost";
$username = "root";
$password = "Katter123";
$database = "harrypotter";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn){
  echo "FEL VID INHÄMTNING AV DATABAS";
}

?>