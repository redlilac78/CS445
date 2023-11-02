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
        }

        #header {
            text-align: center;
            padding: 50px;
        }

        #slogan {
            font-size: 24px;
            color: white;
        }

        #buttons {
            text-align: center;
            padding: 20px;
        }

        #searchButton, #signUpButton {
            background-color: #ff6600;
            color: white;
            padding: 10px 20px;
            margin: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #developers {
            text-align: center;
            margin-top: 50px;
            color: white;
        }
    </style>
</head>
<body>
    <div id="header">
        <div id="slogan">
            Welcome to our Recipe Website
        </div>
        <div id="buttons">
            <button id="searchButton"><a href="Search.php"/>Search</a></button>
            <button id="signUpButton"><a href="SignUp.php"/>Sign Up</a></button>
        </div>
    </div>
    <div id="developers">
        Developers: Your Name 1, Your Name 2, Your Name 3
    </div>

    <script>
        const images = [
            <?php
            $imageDirectory = 'Images/RecipeImages/';
            $imageFiles = scandir($imageDirectory);
            $imageFiles = array_diff($imageFiles, array('..', '.'));
            foreach ($imageFiles as $image) {
                echo "'$imageDirectory$image', ";
            }
            ?>
        ];

        let currentImageIndex = 0;
        const body = document.body;

        function changeBackgroundImage() {
            body.style.backgroundImage = `url(${images[currentImageIndex]})`;
            currentImageIndex = (currentImageIndex + 1) % images.length;
        }

        // Change background image every 5 seconds
        setInterval(changeBackgroundImage, 5000);

        // Initially set the background image
        changeBackgroundImage();
    </script>
</body>
</html>
