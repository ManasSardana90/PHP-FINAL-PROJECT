<?php
include './CRUD/db.php';

// Ensure the user is logged in
if (!isset($_SESSION['logged_in'])) {
    header('Location: index.php');
    exit;
}

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("DELETE FROM admin WHERE id = ?");
    $stmt->execute([$_GET['id']]);
}

header('Location: users.php');
