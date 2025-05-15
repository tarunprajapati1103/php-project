<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include 'database.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM donors WHERE id=$id");
    header("Location: view.php");
} else {
    echo "Invalid Request!";
}
?>
