<?php
require_once('../Connections/db_details.php');
$con = mysqli_connect($db_host, $db_user, $db_pass, $db_table);
if (mysqli_connect_errno()){
  header("Location: /RR_Error201.php"); exit();
}
session_start();

// Retrieve form data
$full_name = $_POST['full_name'];
$s0_number = $_POST['s0_number'];
$replacement_key = $_POST['replacement_key'];
$building = $_POST['building'];
$room_number = $_POST['room_number'];
$check_type = $_POST['check_type'];
$key_card_number = $_POST['key_card_number'];
$ra_name = $_POST['ra_name'];
$additional_comments = $_POST['additional_comments'];



// Prepare SQL statement
$sql = "INSERT INTO Lockouts (FullName, S0_Number, isReplacement, Building, RoomNumber, isCheckout, KeyCardNum, RecordedBy, Comments) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Prepare and bind parameters
$stmt = $con->prepare($sql);
$stmt->bind_param("sssssssss", $full_name, $s0_number, $replacement_key, $building, $room_number, $check_type, $key_card_number, $ra_name, $additional_comments);

// Execute query
if ($stmt->execute()) {
    echo "New record inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}


$con->close();
?>
