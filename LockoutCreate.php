<?php
require_once('Connections/db_details.php');
$con = mysqli_connect($db_host, $db_user, $db_pass, $db_table);
if (mysqli_connect_errno()){
  header("Location: /RR_Error201.php"); exit();
}
session_start();
if(isset($_SESSION['username']))
{
  require 'Scripts/Recordsets.php';
}
else{
	header('Location: index.php?reason="login"');
}

$result_UserInfo = UserInfo($con, $User);
$row_UserInfo = mysqli_fetch_assoc($result_UserInfo);

$Position = $row_UserInfo['Position'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Page Title</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    min-height: 115vh; /* Set minimum height to viewport height */
    overflow-y: auto; /* Enable vertical scrolling if content exceeds viewport height */
}
.red-block {
    background-color: red;
    width: 100%;
    height: 80px; /* Increased height */
}
.image-row {
    display: flex;
    align-items: flex-start; /* Adjust alignment */
    height: 300px; /* Increased height */
}
.image {
    max-width: 100%;
    max-height: 100%;
}
.red-block-2 {
    background-color: red;
    width: 100%;
    height: 80px; /* Increased height */
    display: flex;
    padding:5px;
    text-align: left;
    margin-top:-9%;
}
.login-container {
    margin: 0 auto;
    width: 500px;
    height:400px; /* Increased height */
    text-align: center;
    margin-top: 20px;
    padding:30px;
}
input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}
.black-row {
    background-color: black;
    width: 100%;
    height: 50px; /* Increased height */
    position: fixed; /* Fixed position to stick at the bottom */
    bottom: 0; /* Stick to the bottom */
    left: 0; /* Align to the left */
    z-index: 999; /* Ensure it's above other content */
}
#SubmitButton{
  width:100px;
  font-size:20pt;
  border-radius: 20pt;
  margin-top:10px; /* Adjust spacing between button and the black line */
}
.function-button {
    background-color: #8a1f28; /* Green */
    border: none;
    color: white;
    padding: 10px 20px; /* Adjust padding */
    text-align: center;
    text-decoration: none;
    font-size: 16px;
    margin-right: 10px; /* Adjust margin between buttons */
    cursor: pointer;
    border-radius: 8px;
    width: 150px; /* Adjust button width */
    box-sizing: border-box; /* Ensure padding and border included in width */
}

.login-container {
    text-align: left; /* Align buttons left */
    display: flex; /* Change display to flex */
    flex-wrap: nowrap; /* Prevent wrapping */
}
.logout-button {
    background-color: transparent;
    color: white;
    border: none;
    float: right;
}
#SubmitButton {
    width: 29%;
    font-size: 20pt;
    border-radius: 20pt;
    margin-top: 10px; /* Adjust spacing between button and the black line */
    background-color: #8a1f28; /* Apply the desired color */
    color: white; /* Text color */
    border: none; /* Remove border */
    padding: 10px 20px; /* Adjust padding */
    cursor: pointer;
    transition: background-color 0.3s; /* Smooth transition on hover */
}

#SubmitButton:hover {
    background-color: #75191f; /* Darken the color slightly on hover */
}
.form-wrapper {
    border: 1px solid #ccc; /* Gray border */
    padding: 20px; /* Add padding for spacing */
    margin-top: 20px; /* Add margin for spacing */
    width: 100%; /* Match the width of the form */
    height:168%;
    margin: 0 auto; /* Center the form */
}
</style>
</head>
<body>

<div class="red-block">
    <button onclick="location.href='AJAX/Logout.php'" id="logoutBtn" class="function-button logout-button">Logout</button>
</div>


<div class="image-row">
    <img src="Images/primaryLogo.png" width="300px" alt="Your Image" class="image">
</div>

<div class="red-block-2">
    <h2 style="color: white;">Welcome <?php echo $User?></h2>
</div>


<div class="login-container">
  <div class="form-wrapper">
    <form id="myForm" action="process_lockout.php" method="post">
      <label for="full-name">Full Name:</label>
      <input type="text" id="full-name" name="full-name" required>

      <label for="s0-number">S0 Number:</label>
      <input type="text" id="s0-number" name="s0-number" required>

      <label>Is this a replacement key?</label><br><br>
      <label><input type="radio" name="replacement-key" value="1"> Yes</label>
      <label><input type="radio" name="replacement-key" value="0" checked> No</label>
      <br><br>

      <label for="building">Building:</label>
      <input type="text" id="building" name="building" required>

      <label for="room-number">Room Number:</label>
      <input type="text" id="room-number" name="room-number" required>

      <label>Check In or Check Out?</label><br><br>
      <label><input type="radio" name="check-type" value="1" checked> Check In</label>
      <label><input type="radio" name="check-type" value="0"> Check Out</label><br><br>

      <label for="key-card-number">Key Card Number:</label>
      <input type="text" id="key-card-number" name="key-card-number" required>

      <label for="ra-name">RA's Name:</label>
      <input type="text" id="ra-name" name="ra-name" required>

      <label for="additional-comments">Additional Comments:</label><br><br>
      <textarea id="additional-comments" name="additional-comments" rows="7" cols="70"></textarea>

      <button type="button" id="submitButton">Submit</button>
      <br><br>
  </form>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
  $(document).ready(function(){
      $('#submitButton').click(function(){
        var s0Number = document.getElementById("s0-number").value.trim();
          if (!/^\d{7}$/.test(s0Number)) {
              alert("S0 Number must be exactly 7 digits.");
              return;
          }

          // Validate other fields
          var fullName = document.getElementById("full-name").value.trim();
          var building = document.getElementById("building").value.trim();
          var roomNumber = document.getElementById("room-number").value.trim();
          var raName = document.getElementById("ra-name").value.trim();
          var keycardnumber = document.getElementById("key-card-number").value.trim();

          if (fullName === "" || building === "" || roomNumber === "" || raName === "" || keycardnumber === "") {
              alert("Please fill out all required fields.");
              return;
          }

          var formData = {
              full_name: $('#full-name').val(),
              s0_number: $('#s0-number').val(),
              replacement_key: $('input[name=replacement-key]:checked').val(),
              building: $('#building').val(),
              room_number: $('#room-number').val(),
              check_type: $('input[name=check-type]:checked').val(),
              key_card_number: $('#key-card-number').val(),
              ra_name: $('#ra-name').val(),
              additional_comments: $('#additional-comments').val()
          };

          $.ajax({
              url: 'AJAX/LockoutSubmit.php',
              type: 'POST',
              data: formData,
              dataType: 'text',
              success: function(res) {
                  alert(res);
              },
              complete: function() {
                  // Schedule the next request when the current one has been completed
                  setTimeout(ajaxInterval, 4000);
              }
          });
      });
  });
  </script>
</div>
</div>


<div class="black-row"></div>


</body>
</html>
