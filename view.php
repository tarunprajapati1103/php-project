<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include 'database.php';
$donors = $conn->query("SELECT * FROM donors");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Donors</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Donor List</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Blood Group</th>
            <th>Contact</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $donors->fetch_assoc()): ?>
            <tr>
                <td><?= $row['name'] ?></td>
                <td><?= $row['age'] ?></td>
                <td><?= $row['blood_type'] ?></td>
                <td><?= $row['contact'] ?></td>
                <td>
                    <a href="update.php?id=<?= $row['id'] ?>">Edit</a>
                    <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    <a href="home.php" class="back-btn">◀️ Back to Home</a>
</body>
</html>