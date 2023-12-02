<?php
// Require the database login credentials
require_once('db_details.php');

// Create connection to database
$con = mysqli_connect($db_host, $db_user, $db_pass, $db_table);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
