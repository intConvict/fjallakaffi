<?php
  $host = "localhost";
  $username = "root";
  $password = "";
  $dbname = "fjallakaffi";

  // Connect to the database
  $conn = mysqli_connect($host, $username, $password, $dbname);

  // Check the connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  else{
    echo 'it works!';
  }
?>