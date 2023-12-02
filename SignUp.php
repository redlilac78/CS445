<?php
require_once('Connections/db_details.php');
$con = mysqli_connect($db_host, $db_user, $db_pass, $db_table);
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" type="text/css" href="CSS/Style.css">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - Recipe Website</title>
<style>
body {
    font-family: Arial, sans-serif;
    background-image: url('Images/Background5.png'); /* Replace 'path/to/your/image.jpg' with the actual path to your image */
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    margin: 0;
    padding: 0;
    height: 100vh;
}
#SignInBox {
    padding: 20px 40px 20px 20px;
    position: absolute;
    -ms-transform: translate(-80%, -50%);
    transform: translate(-80%, -50%);
    width:33%;
    top:49.5%;
    height:65%;
    left:78%;
    background-color:white;
}
h2 {
    text-align: center;
}
form {
    text-align: left;
}
.form-group {
    margin-bottom: 20px;
}
label {
    font-weight: bold;
}
input[type="text"],
input[type="password"] {
    width: 70%;
    margin-left:15%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 19px;
    background-color: rgba(255, 255, 255, 0.7); /* Set the background color with transparency */
}
input[type="text"]::placeholder,
input[type="password"]::placeholder {
    color: #666; /* Set the placeholder text color */
}
#LogInButton {
    margin-top:20%;
    width: 78%;
    background-color: #e0b795;
    margin-left: 15%;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 17px;
    cursor: pointer;
    border:solid 2px white;
    font-size:20pt;
    box-shadow: 0 4px 40px rgba(0, 0, 0, 0.1); /* Add drop shadow */
}
#Title{
  position: absolute;
  text-align: center;
  top:14%;
  width:100%;
  font-size:30pt;
  color:black;
  font-family:Courier, monospace;

}
.OrWith{
  position: absolute;
  top:83%;
  width:28%;
  background-color:white;
  padding:14px;
  border-radius: 20pt;
  text-align: center;
  font-size:13pt;
  color:black;
}
#Left{
  position: absolute;
  top:0%;
  left:-1%;
}
#Right{
  position: absolute;
  top:0%;
  right:-1%;
}
#BLeft{
  position: absolute;
  top:74%;
  right:-1%;
  transform: scaleX(-1);
}
#BRight{
  position: absolute;
  top:74%;
  left:-1%;
  transform: scaleX(-1);
}
#CookingImage{
  position: absolute;
  top:15%;
  left:16%;
  width:33%;
  height:69%;
  background-image: url('Images/CookingImage.jpg'); /* Replace 'path/to/your/image.jpg' with the actual path to your image */
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
}
</style>
</head>
<body>
  <div id="Left">
    <img src="Images/OrnamentalL.png" width="300px"/>
  </div>
  <div id="Right">
    <img src="Images/OrnamentalR.png" width="300px"/>
  </div>

  <div id="BLeft">
    <img src="Images/OrnamentalLBottom.png" width="300px"/>
  </div>
  <div id="BRight">
    <img src="Images/OrnamentalRBottom.png" width="300px"/>
  </div>
  <div id="CookingImage">

  </div>
  <div id="SignInBox">
  <form method="POST" action="signup_process.php">
      <center style='font-size:20pt;'>Welcome to making recipes with style</center><br><br><br><br>
      <input type="text" id="username" name="username" placeholder="Username" required>
      <br><br>
      <input type="password" id="password" name="password" placeholder="Password" required>
      <br><br>
      <input type="text" id="email" name="email" placeholder="Email" required>
      <br><br><br><br>
      <button id="LogInButton" type="submit">Sign Up</button>


      <div class="checkbox-group" style="position:absolute;top:45%;left:15%;color:black;">
        <input type="checkbox" id="rememberMe" name="rememberMe"> I accept the Terms and Conditions
      </div>


      <div style="position:absolute;top:75%;left:20%;font-size:12pt;color:black;">
      Or continue with <span style="color:blue">Google</span> or <span style="color:blue">Facebook</span>
      </div>
  </form>
  </div>
</body>
</html>
