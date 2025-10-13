<?php
include('connection.php');

// Delete logic
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    mysqli_query($con, "DELETE FROM contactmessages WHERE id=$id");
    header("Location: contact_messages_ data.php");
    exit();
}

// Update logic
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id      = intval($_POST['id']);
    $name    = mysqli_real_escape_string($con, $_POST['name']);
    $email   = mysqli_real_escape_string($con, $_POST['email']);
    $subject = mysqli_real_escape_string($con, $_POST['subject']);
    $message = mysqli_real_escape_string($con, $_POST['message']);

    mysqli_query($con, "UPDATE contactmessages SET name='$name', email='$email', subject='$subject', message='$message' WHERE id=$id");
    header("Location: contact_messages_data.php");
    exit();
}

// Fetch record to edit
$editData = null;
if (isset($_GET['edit'])) {
    $id = intval($_GET['edit']);
    $editQuery = mysqli_query($con, "SELECT * FROM contactmessages WHERE id=$id");
    $editData = mysqli_fetch_assoc($editQuery);
}

// Fetch all messages
$result = mysqli_query($con, "SELECT * FROM contactmessages ORDER BY submitted_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Messages</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f9f9f9;
            padding: 40px;
        }
        table {
            border-collapse: collapse;
            width: 95%;
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
            width: 60%;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container textarea {
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
    </style>
</head>
<body>

<h2>Contact Form Submissions</h2>

<?php if ($editData): ?>
    <div class="form-container">
        <h3>Edit Message ID <?= $editData['id']; ?></h3>
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?= $editData['id']; ?>">
            <input type="text" name="name" value="<?= htmlspecialchars($editData['name']); ?>" required>
            <input type="email" name="email" value="<?= htmlspecialchars($editData['email']); ?>" required>
            <input type="text" name="subject" value="<?= htmlspecialchars($editData['subject']); ?>" required>
            <textarea name="message" rows="5" required><?= htmlspecialchars($editData['message']); ?></textarea>
            <button type="submit" name="update">Update</button>
        </form>
    </div>
<?php endif; ?>

<table>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Subject</th>
        <th>Message</th>
        <th>Submitted At</th>
        <th>Actions</th>
    </tr>

    <?php if (mysqli_num_rows($result) > 0): ?>
        <?php $count = 1; ?>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $count++; ?></td>
            <td><?= htmlspecialchars($row['name']); ?></td>
            <td><?= htmlspecialchars($row['email']); ?></td>
            <td><?= htmlspecialchars($row['subject']); ?></td>
            <td><?= nl2br(htmlspecialchars($row['message'])); ?></td>
            <td><?= $row['submitted_at']; ?></td>
            <td>
                <a href="?edit=<?= $row['id']; ?>">
                    <button class="action-btn edit-btn">Edit</button>
                </a>
                <a href="?delete=<?= $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this message?');">
                    <button class="action-btn delete-btn">Delete</button>
                </a>
            </td>
        </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr><td colspan="7">No contact messages found.</td></tr>
    <?php endif; ?>
</table>

</body>
</html>
