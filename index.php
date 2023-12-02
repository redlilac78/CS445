<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Recipe Website</title>
<style>
body {
    margin: 0;
    padding: 0;
    background: url('Images/RecipeImages/') no-repeat center center fixed;
    background-size: cover;
    background-color: #c7bebb;
}

#header {
    text-align: center;
    padding: 50px;
    position: relative;
    z-index: 10;
}

#slogan {
    font-size: 74px;
    color:#736e6c;
    padding-bottom: 40pt;
    border-bottom: dashed black 3px;
    text-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
    position: relative;
    z-index: 10;
}

#buttons {
    text-align: center;
    padding: 20px;
    position: relative;
    z-index: 10;
}

#searchButton,
#signUpButton {
    background-color: #d9d6d4;
    color: #736e6c;
    padding: 10px 20px;
    margin: 12px;
    margin-top:5%;
    font-size:29pt;
    width:16%;
    border: solid 2px black;
    border-radius: 15px;
    cursor: pointer;
    text-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
}

#searchButton a,
#signUpButton a {
    color: #736e6c;
    text-decoration: none;
}

#developers {
    text-align: center;
    width:33%;
    margin:auto;
    padding:10px;
    border-radius:20pt;
    font-size:20pt;
    background-color:#d9d6d4;
    margin-top: 50px;
    color: white;
    position: relative;
    z-index: 10;
    color:#736e6c;
}

#Slideshow {
    position: absolute;
    top: 20%;
    width: 100%;
    height: 100%;
    z-index: 5; /* Lowered the z-index */
    background-repeat: no-repeat; /* Added this line */
    background-size: cover;
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
</style>
</head>
<body>
    <div id="header">
        <div id="Left">
          <img src="Images/OrnamentalL.png" width="250px"/>
        </div>
        <div id="Right">
          <img src="Images/OrnamentalR.png" width="250px"/>
        </div>
        <div id="slogan">
            Welcome to our Recipe Website
        </div>
        <div id="buttons">
            <button id="searchButton"><a href="LogIn.php"/>Log In</a></button>
            <button id="signUpButton"><a href="SignUp.php"/>Sign Up</a></button>
        </div>
    </div>
    <div id="developers">
        Developers: London O'Connell, David Huddleston, Erica Helton, Akio Hamamura Junior
    </div>
<div id="Slideshow">
    <script>
      const images = [
          <?php
          $imageDirectory = 'Images/RecipeImages/';
          $imageFiles = scandir($imageDirectory);
          $imageFiles = array_diff($imageFiles, array('..', '.'));

          // Filter only .png files
          $pngFiles = array_filter($imageFiles, function($file) {
              return strtolower(pathinfo($file, PATHINFO_EXTENSION)) === 'png';
          });

          // Output the JavaScript array
          foreach ($pngFiles as $image) {
              echo "'$imageDirectory$image', ";
          }
          ?>
      ];

      let currentImageIndex = 0;
      const slideshowContainer = document.getElementById('Slideshow');

      function changeBackgroundImage() {
          slideshowContainer.style.backgroundImage = `url(${images[currentImageIndex]})`;
          currentImageIndex = (currentImageIndex + 1) % images.length;
      }

      // Change background image every 5 seconds
      setInterval(changeBackgroundImage, 5000);

      // Initially set the background image
      changeBackgroundImage();
  </script>
</div>
</body>
</html>
