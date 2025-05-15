<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include 'database.php';

// Check if ID is set in URL
if (!isset($_GET['id'])) {
    die("Invalid request!");
}

$id = $_GET['id'];

// Fetch donor data
$result = $conn->query("SELECT * FROM donors WHERE id=$id");

if ($result->num_rows == 0) {
    die("Donor not found!");
}

$donor = $result->fetch_assoc();

// Handle form submission
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $blood_type = $_POST['blood_type'];
    $contact = $_POST['contact'];

    $sql = "UPDATE donors SET name='$name', age='$age', blood_type='$blood_type', contact='$contact' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: view.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Donor</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Update Donor</h2>
    <div class="container">
        <form method="POST">
            <input type="hidden" name="id" value="<?= $donor['id'] ?>">
            <input type="text" name="name" value="<?= $donor['name'] ?>" required>
            <input type="number" name="age" value="<?= $donor['age'] ?>" required>
            
            <!-- Blood Group Dropdown -->
            <select name="blood_type" required>
                <option value="">Select Blood Group</option>
                <option value="A+" <?= $donor['blood_type'] == "A+" ? "selected" : "" ?>>A+</option>
                <option value="A-" <?= $donor['blood_type'] == "A-" ? "selected" : "" ?>>A-</option>
                <option value="B+" <?= $donor['blood_type'] == "B+" ? "selected" : "" ?>>B+</option>
                <option value="B-" <?= $donor['blood_type'] == "B-" ? "selected" : "" ?>>B-</option>
                <option value="O+" <?= $donor['blood_type'] == "O+" ? "selected" : "" ?>>O+</option>
                <option value="O-" <?= $donor['blood_type'] == "O-" ? "selected" : "" ?>>O-</option>
                <option value="AB+" <?= $donor['blood_type'] == "AB+" ? "selected" : "" ?>>AB+</option>
                <option value="AB-" <?= $donor['blood_type'] == "AB-" ? "selected" : "" ?>>AB-</option>
            </select>

            <input type="text" name="contact" value="<?= $donor['contact'] ?>" required>
            <button type="submit" name="update">Update Donor</button>
        </form>
    </div>
    <a href="view.php" class="back-btn">⬅️ Back to Donors List</a>
</body>
</html>

