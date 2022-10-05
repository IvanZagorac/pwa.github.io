<?php

$servername = "sql309.epizy.com";
$username = "epiz_32722243";
$password = "gWWqp2UJgRmY";
$basename = "epiz_32722243_XXX";
// Create connection
$conn = new mysqli($servername, $username, $password,$basename);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


?>
