<?php
include './CRUD/db.php';

// Ensure the user is logged in
if (!isset($_SESSION['logged_in'])) {
    header('Location: index.php');
    exit;
}

// Fetch user details
$stmt = $pdo->prepare("SELECT * FROM admin WHERE id = ?");
$stmt->execute([$_GET['id']]);
$user = $stmt->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $stmt = $pdo->prepare("UPDATE admin SET name = ? WHERE id = ?");
    $stmt->execute([$name, $_GET['id']]);
    header('Location: users.php');
}

include 'header.php';
?>

<div class="container mt-4">
    <h1>Edit User</h1>
    <form action="edit_user.php?id=<?= $user['id'] ?>" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $user['name'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<?php include 'footer.php'; ?>
