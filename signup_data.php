<?php
include('connection.php');

// Delete logic
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($con, "DELETE FROM signup WHERE id=$id");
    header("Location: signup_data.php");
    exit();
}

// Update logic
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id    = $_POST['id'];
    $name  = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);

    mysqli_query($con, "UPDATE signup SET name='$name', email='$email' WHERE id=$id");
    header("Location: signup_data.php");
    exit();
}

// Fetch record to edit
$editData = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $editQuery = mysqli_query($con, "SELECT * FROM signup WHERE id=$id");
    $editData = mysqli_fetch_assoc($editQuery);
}

// Fetch all records
$result = mysqli_query($con, "SELECT * FROM signup ORDER BY signup_date DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup Records</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f9f9f9;
            padding: 40px;
        }
        table {
            border-collapse: collapse;
            width: 90%;
            margin: auto;
            background-color: #fff;
            box-shadow: 0px 0px 15px rgba(0,0,0,0.1);
        }
        th, td {
            text-align: center;
            padding: 12px;
            border-bottom: 1px solid #eaeaea;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .action-btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
        }
        .edit-btn {
            background-color: #2196F3;
        }
        .delete-btn {
            background-color: #f44336;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }
        .form-container {
            width: 50%;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        .form-container input[type="text"],
        .form-container input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
        }
        .form-container button {
            padding: 10px 20px;
            background-color: #2196F3;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        .form-container h3 {
            margin-bottom: 20px;
        }


        /* add user button */
        .header-container {
    width: 90%;
    margin: auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
}

.add-user-btn {
    background-color: #4CAF50;
    color: white;
    padding: 10px 16px;
    text-decoration: none;
    border-radius: 4px;
    font-size: 14px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    transition: background 0.3s;
}

.add-user-btn:hover {
    background-color: #45a049;
}

    </style>
</head>
<body>
<div class="header-container">
    <h2>User Signup Records</h2>
    <a href="signup.php" class="add-user-btn">Add User</a>
</div>



<?php if ($editData): ?>
    <div class="form-container">
        <h3>Edit User ID <?= $editData['id']; ?></h3>
        <form method="POST">
            <input type="hidden" name="id" value="<?= $editData['id']; ?>">
            <input type="text" name="name" value="<?= htmlspecialchars($editData['name']); ?>" required>
            <input type="email" name="email" value="<?= htmlspecialchars($editData['email']); ?>" required>
            <button type="submit" name="update">Update</button>
        </form>
    </div>
<?php endif; ?>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Signup Date</th>
        <th>Actions</th>
    </tr>

    <?php if (mysqli_num_rows($result) > 0): ?>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= htmlspecialchars($row['name']); ?></td>
            <td><?= htmlspecialchars($row['email']); ?></td>
            <td><?= htmlspecialchars($row['password']); ?></td>
            <td><?= $row['signup_date']; ?></td>
            <td>
                <a href="?edit=<?= $row['id']; ?>">
                    <button class="action-btn edit-btn">Edit</button>
                </a>
                <a href="?delete=<?= $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this user?');">
                    <button class="action-btn delete-btn">Delete</button>
                </a>
            </td>
        </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr><td colspan="6">No signup records found.</td></tr>
    <?php endif; ?>
</table>

</body>
</html>
