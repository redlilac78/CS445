<?php
require_once('Connections/db_details.php');
session_start();

// Check connection
$con = mysqli_connect($db_host, $db_user, $db_pass, $db_table);

// Check if the connection is successful
if (!$con) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Retrieve values from the form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Perform your authentication logic here
    // For example, you might have a users table in your database

    $query = "SELECT * FROM Users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($con, $query);

    if (!$result) {
        // Query execution failed
        $error_message = mysqli_error($con);
        die("Error executing login query: $error_message. Query: $query");
    }

    // Check if a row was returned
    if (mysqli_num_rows($result) == 1) {
        // Valid login, set session variables and redirect to dashboard or home page
        $_SESSION['username'] = $username;
        header("Location: Search.php"); // Change 'dashboard.php' to your actual dashboard page
        exit();
    } else {
        // Invalid login, show an error message or redirect to the login page
        echo "Invalid username or password";
    }

    // Close the database connection
    mysqli_close($con);
} else {
    echo "Invalid request method";
}
?>
