<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include 'database.php';

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $blood_type = $_POST['blood_type'];
    $contact = $_POST['contact'];
    
    $sql = "INSERT INTO donors (name, age, blood_type, contact) VALUES ('$name', '$age', '$blood_type', '$contact')";
    $conn->query($sql);
    header("Location: view.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Donor</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <h2>Add New Donor</h2>
    <form method="POST">
        <input type="text" name="name" placeholder="Donor Name" required>
        <input type="number" name="age" placeholder="Age" required>
        <select name="blood_type" required>
            <option value="" disabled selected>Select Blood Group</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
        </select>
        <input type="text" name="contact" placeholder="Contact" required>
        <button type="submit" name="add">Add Donor</button>
    </form>
    </div>
    <a href="home.php" class="back-btn">◀️ Back to Home</a>
</body>
</html>
