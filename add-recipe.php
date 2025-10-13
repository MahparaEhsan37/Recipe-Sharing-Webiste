<?php
include('connection.php');

// Only process the form if it was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch and sanitize POST data
    $title = $_POST['title'];
    $image = $_POST['image'];
    $time = $_POST['time'];
    $type = $_POST['type'];
    $rating = $_POST['rating'];
    $ingredients = nl2br($_POST['ingredients']);
    $description = $_POST['description'];
    $instructions = nl2br($_POST['instructions']);

    // SQL query (nutrition column removed)
    $sql_query = "INSERT INTO add_recipe (title, image, time, type, rating, ingredients, discription, instructions)
                  VALUES ('$title', '$image', '$time', '$type', '$rating', '$ingredients', '$description', '$instructions')";

    // Execute query
    if (mysqli_query($con, $sql_query)) {
        echo "Recipe added successfully!";
    } else {
        echo "Error: " . mysqli_error($con);
    }

    // Close connection
    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Add Recipe</title>
  <style>
    .add-recipe-form {
      max-width: 600px;
      margin: auto;
    }

    .add-recipe-form .input-field,
    .add-recipe-form .textarea-field,
    .add-recipe-form .select-field {
      width: 100%;
      margin-bottom: 1rem;
      padding: 0.7rem;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .add-recipe-form .submit-btn {
      padding: 0.7rem 1.5rem;
      background-color: #f26b4d;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .add-recipe-form .submit-btn:hover {
      background-color: #d95333;
    }
  </style>
</head>
<body>
  <h2 style="text-align:center;">Add a New Recipe</h2>
  <form action="add-recipe.php" method="POST" class="add-recipe-form">
    <input type="text" name="title" placeholder="Recipe Title" required class="input-field" />
    <input type="text" name="image" placeholder="Image Path (e.g. images/salad.jpg)" required class="input-field" />
    <input type="text" name="time" placeholder="Time (e.g. 20 minutes)" required class="input-field" />

    <!-- Merged Type + Nutrition Dropdown -->
    <select name="type" required class="select-field">
      <option value="">Select Type</option>
      <option value="Vegetarian">Vegetarian</option>
      <option value="Vegan">Vegan</option>
      <option value="Non-Vegetarian">Non-Vegetarian</option>
      <option value="Italian">Italian</option>
      <option value="Dessert">Dessert</option>
      <option value="Drink">Drink</option>
      <option value="Quick_and_easy">Quick and easy</option>
      <option value="Asian">Asian</option>
      <option value="Gluten-Free">Gluten-Free</option>
      <option value="Low-Carb">Low-Carb</option>
      <option value="High-Protein">High-Protein</option>
      <option value="Dairy-Free">Dairy-Free</option>
    </select>

    <input type="text" name="rating" placeholder="Rating (e.g. 4.8 (85 reviews))" required class="input-field" />

    <textarea name="ingredients" placeholder="Ingredients (one per line)" required class="textarea-field"></textarea>
    <textarea name="description" placeholder="Short description..." required class="textarea-field"></textarea>
    <textarea name="instructions" placeholder="Instructions (one per line)" required class="textarea-field"></textarea>

    <button type="submit" class="submit-btn">Add Recipe</button>
  </form>
</body>
</html>
