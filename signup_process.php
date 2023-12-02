<?php
require_once('Connections/db_details.php');
$con = mysqli_connect($db_host, $db_user, $db_pass, $db_table);
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password

    // SQL query to insert data into the database
    $sql = "INSERT INTO Users (username, password, email) VALUES ('$username', '$password', '$email')";

    // Execute the query
    if (mysqli_query($con, $sql)) {
      $_SESSION['username'] = $username; // Set the session variable
      header("Location: Search.php"); // Redirect to Search.php
      exit();
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>
