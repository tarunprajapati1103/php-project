<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home - Blood Donation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Welcome, Admin!</h2>
    <a href="add.php">Add Donor</a>
    <a href="view.php">View Donors</a>
    <a href="logout.php">Logout</a>
</body>
</html>