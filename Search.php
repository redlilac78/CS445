<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" type="text/css" href="CSS/Style.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Search</title>
</head>
<body>
    <h1>Recipe Search</h1>

    <form method="POST" action="search_results.php">
        <label for="category">Category:</label>
        <select name="category" id="category">
            <option value="breakfast">Breakfast</option>
            <option value="dessert">Dessert</option>
            <!-- Add more options as needed -->
        </select>

        <label for="genre">Genre:</label>
        <select name="genre" id="genre">
            <option value="italian">Italian</option>
            <option value="mexican">Mexican</option>
            <!-- Add more options as needed -->
        </select>

        <input type="submit" value="Search">
    </form>
</body>
</html>
