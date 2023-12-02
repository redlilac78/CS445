<?php
require_once('Connections/db_details.php');
$con = mysqli_connect($db_host, $db_user, $db_pass, $db_table);
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: LogIn.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" type="text/css" href="CSS/Style.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> Recipe</title>
</head>
<body>
    <br>
    <div><a href="logout.php">Log Out</a></div>
    <h1><?php echo $title; ?> Recipe</h1>
    <div>Log Out</div>
    <img src="<?php echo $image; ?>" alt="<?php echo $title; ?>">

    <p><strong>Description:</strong> <?php echo $description; ?></p>
    <p><strong>Cook Time:</strong> <?php echo $cookTime; ?> minutes</p>
    <p><strong>Prep Time:</strong> <?php echo $prepTime; ?> minutes</p>

    <h2>Ingredients:</h2>
    <p><?php echo nl2br($ingredients); ?></p>
</body>
</html>
