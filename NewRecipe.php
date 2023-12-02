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
    <title>Create Recipe</title>
</head>
<body>
    <br>
    <div><a href="logout.php">Log Out</a></div>
    <h1>Create a New Recipe</h1>

    <form method="POST" action="process_recipe.php" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required><br>

        <label for="description">Description:</label>
        <textarea name="description" id="description" rows="4" required></textarea><br>

        <label for="image">Image:</label>
        <input type="file" name="image" id="image" accept="image/*" required><br>

        <label for="cookTime">Cook Time (minutes):</label>
        <input type="number" name="cookTime" id="cookTime" required><br>

        <label for="prepTime">Prep Time (minutes):</label>
        <input type="number" name="prepTime" id="prepTime" required><br>

        <label for="ingredients">Ingredients:</label>
        <textarea name="ingredients" id="ingredients" rows="4" required></textarea><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
