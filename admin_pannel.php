<?php
session_start(); // Start the session

// Check if admin session is set
if(!isset($_SESSION['admin_id'])) {
    // If session is not set, redirect to login page
    header("Location: admin_login.php");
    exit();
}

// If session is set, the admin panel content will load
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
</head>
<body>
    <!-- <h1>Welcome to Admin Panel</h1>
    <a href="logout.php">Logout</a> -->
</body>
</html>




<?php
include('connection.php');

// Get total users
$sql = "SELECT COUNT(*) as total_users FROM signup";
$result = mysqli_query($con, $sql);

$recipeSql = "SELECT COUNT(*) as total_recipes FROM add_recipe";
$recipeResult = mysqli_query($con, $recipeSql);

if (!$result) {
    die("Total Users Query Error: " . mysqli_error($con));
}

$row = mysqli_fetch_assoc($result);
$totalUsers = $row['total_users'];

$recipeRow = mysqli_fetch_assoc($recipeResult);
$totalRecipes = $recipeRow['total_recipes'];

// Get new users in last 7 days
$newSql = "SELECT COUNT(*) as new_users FROM signup WHERE signup_date >= DATE_SUB(NOW(), INTERVAL 7 DAY)";
$newResult = mysqli_query($con, $newSql);

if (!$newResult) {
    die("New Users Query Error: " . mysqli_error($con));
}

$newRow = mysqli_fetch_assoc($newResult);
$newUsers = $newRow['new_users'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Panel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }

    body {
      display: flex;
      min-height: 100vh;
      background-color: #f4f6f8;
    }

    /* Sidebar */
    .sidebar {
      width: 240px;
      background-color: #2f3542;
      color: white;
      padding: 20px;
      position: fixed;
      height: 100vh;
    }

    .sidebar h2 {
      margin-bottom: 30px;
      font-size: 24px;
      text-align: center;
    }

    .sidebar a {
      display: block;
      color: white;
      text-decoration: none;
      margin: 15px 0;
      padding: 10px;
      border-radius: 5px;
      transition: background 0.3s ease;
    }

    .sidebar a:hover {
      background-color: #57606f;
    }

    /* Main Content */
    .main {
      margin-left: 240px;
      flex: 1;
      padding: 20px;
    }

    .header {
      background-color: #ffffff;
      padding: 15px 20px;
      margin-bottom: 20px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.05);
      border-radius: 5px;
      font-size: 20px;
      font-weight: bold;
    }

    .cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 20px;
    }

    .card {
      background-color: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .card h3 {
      margin-bottom: 10px;
      color: #333;
    }

    .card p {
      font-size: 18px;
      font-weight: bold;
      color: #2ed573;
    }
    .cards .card h3 a{
        text-decoration: none;
        color: black;
      }

    @media (max-width: 768px) {
      .sidebar {
        width: 100%;
        height: auto;
        position: relative;
      }

      .main {
        margin-left: 0;
      }


      
    }
  </style>
</head>
<body>

  <div class="sidebar">
    <h2>Admin Panel</h2>
    <a href="#">Dashboard</a>
    <a href="logout.php">Logout</a>
  </div>

  <div class="main">
    <div class="header">
      Welcome, Admin!
    </div>

    <div class="cards">
      <div class="card">
        <h3><a href="add-recipe.php">Add Recipe</a></h3>
      </div>
      <div class="card">
        <h3><a href="recipe_data.php">View Recipes</a></h3>
        <p><?php echo $totalRecipes; ?></p>
      </div>
      <div class="card">
        <h3><a href="signup_data.php">Total Users</a></h3>
        <p><?php echo $totalUsers; ?></p>
      </div>
      <div class="card">
        <h3>New Signups</h3>
         <p><?php echo $newUsers; ?></p>
      </div>
      
    </div>
  </div>

</body>
</html>
