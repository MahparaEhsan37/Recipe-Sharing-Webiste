<?php
include('connection.php');

// Delete logic
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($con, "DELETE FROM add_recipe WHERE id=$id");
    header("Location: recipe_data.php");
    exit();
}

// Fetch all records
$result = mysqli_query($con, "SELECT * FROM add_recipe ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Recipe Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f0f2f5;
            margin: 0;
            padding: 20px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding: 10px 20px;
        }
        .header h2 {
            color: #333;
        }
        .add-recipe-btn {
            background: #4CAF50;
            color: #fff;
            padding: 10px 16px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            transition: background 0.3s ease;
        }
        .add-recipe-btn:hover {
            background: #45a049;
        }
        .recipes-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 20px;
        }
        .card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            padding: 20px;
            transition: transform 0.2s ease;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card h3 {
            margin-top: 0;
            color: #333;
        }
        .card p {
            margin: 5px 0;
            color: #555;
            font-size: 14px;
        }
        .card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 10px;
        }
        .card-actions {
            margin-top: 15px;
        }
        .btn {
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            margin-right: 5px;
            color: #fff;
            cursor: pointer;
            font-size: 14px;
        }
        .btn.edit {
            background-color: #2196F3;
        }
        .btn.delete {
            background-color: #f44336;
        }
        .btn i {
            margin-right: 5px;
        }
    </style>
</head>
<body>

<div class="header">
    <h2>Recipe Dashboard</h2>
    <a href="add-recipe.php" class="add-recipe-btn"><i class="fas fa-plus"></i> Add Recipe</a>
</div>

<div class="recipes-container">
    <?php if (mysqli_num_rows($result) > 0): ?>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <div class="card">
                <!-- Recipe Image -->
                <?php if (!empty($row['image'])): ?>
                    <img src="<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['title']) ?>">
                <?php endif; ?>

                <!-- Recipe Info -->
                <h3><?= htmlspecialchars($row['title']) ?></h3>
                <p><strong>Type:</strong> <?= htmlspecialchars($row['type']) ?></p>
                <p><strong>Time:</strong> <?= htmlspecialchars($row['time']) ?> mins</p>
                <p><strong>Rating:</strong> <?= htmlspecialchars($row['rating']) ?>/5</p>
                <p><strong>Ingredients:</strong> <?= htmlspecialchars(substr(strip_tags($row['ingredients']), 0, 50)) ?>...</p>
                <p><strong>Description:</strong> <?= htmlspecialchars(substr(strip_tags($row['discription']), 0, 50)) ?>...</p>

                <!-- Buttons -->
                <div class="card-actions">
                    <a href="edit_recipe.php?id=<?= $row['id'] ?>"><button class="btn edit"><i class="fas fa-pen"></i>Edit</button></a>
                    <a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Delete this recipe?')">
                        <button class="btn delete"><i class="fas fa-trash"></i>Delete</button>
                    </a>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No recipes found.</p>
    <?php endif; ?>
</div>

</body>
</html>
