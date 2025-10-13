<?php
include('connection.php');

// Get the recipe ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "Invalid recipe ID.";
    exit();
}

$id = $_GET['id'];

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $image = $_POST['image'];
    $time = $_POST['time'];
    $type = $_POST['type'];
    $rating = $_POST['rating'];
    $nutrition = $_POST['nutrition'];
    $ingredients = nl2br($_POST['ingredients']);
    $description = $_POST['description'];
    $instructions = nl2br($_POST['instructions']);

    $update_query = "UPDATE add_recipe SET 
        title='$title',
        image='$image',
        time='$time',
        type='$type',
        rating='$rating',
        nutrition='$nutrition',
        ingredients='$ingredients',
        discription='$description',
        instructions='$instructions'
        WHERE id=$id";

    if (mysqli_query($con, $update_query)) {
        header("Location: recipe_data.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
}

// Fetch existing recipe
$result = mysqli_query($con, "SELECT * FROM add_recipe WHERE id=$id");
if (mysqli_num_rows($result) == 0) {
    echo "Recipe not found.";
    exit();
}

$row = mysqli_fetch_assoc($result);

// Remove <br> tags to populate textarea
$ingredients = str_replace('<br />', '', $row['ingredients']);
$instructions = str_replace('<br />', '', $row['instructions']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Edit Recipe</title>
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
  <h2 style="text-align:center;">Edit Recipe</h2>
  <form method="POST" class="add-recipe-form">
    <input type="text" name="title" value="<?= htmlspecialchars($row['title']) ?>" placeholder="Recipe Title" required class="input-field" />
    <input type="text" name="image" value="<?= htmlspecialchars($row['image']) ?>" placeholder="Image Path" required class="input-field" />
    <input type="text" name="time" value="<?= htmlspecialchars($row['time']) ?>" placeholder="Time" required class="input-field" />

    <select name="type" required class="select-field">
      <option value="">Select Type</option>
      <?php
      $types = ["Vegetarian", "Vegan", "Non-Vegetarian", "Dessert", "Drink", "Quick_and_easy", "Asian"];
      foreach ($types as $type) {
          $selected = $row['type'] == $type ? "selected" : "";
          echo "<option value='$type' $selected>$type</option>";
      }
      ?>
    </select>

    <input type="text" name="rating" value="<?= htmlspecialchars($row['rating']) ?>" placeholder="Rating" required class="input-field" />

    <select name="nutrition" required class="select-field">
      <option value="">Select Nutrition Info</option>
      <?php
      $nutritions = ["Gluten-Free", "Low-Carb", "High-Protein", "Dairy-Free", "Keto", "Paleo"];
      foreach ($nutritions as $n) {
          $selected = $row['nutrition'] == $n ? "selected" : "";
          echo "<option value='$n' $selected>$n</option>";
      }
      ?>
    </select>

    <textarea name="ingredients" required class="textarea-field"><?= htmlspecialchars($ingredients) ?></textarea>
    <textarea name="description" required class="textarea-field"><?= htmlspecialchars($row['discription']) ?></textarea>
    <textarea name="instructions" required class="textarea-field"><?= htmlspecialchars($instructions) ?></textarea>
    
    <button type="submit" class="submit-btn">Update Recipe</button>
  </form>
</body>
</html>
