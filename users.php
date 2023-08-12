<?php
include 'db.php';

// Ensure the user is logged in
if (!isset($_SESSION['logged_in'])) {
    header('Location: index.php');
    exit;
}

// Fetch all users
$stmt = $pdo->prepare("SELECT * FROM admin");
$stmt->execute();
$users = $stmt->fetchAll();

include 'header.php';
?>

<div class="container mt-4">
    <h1>Users</h1>
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Profile Picture</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['name'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><img src="<?= $user['profile_picture'] ?>" alt="Profile Picture" width="50"></td>
                <td>
                    <a href="edit_user.php?id=<?= $user['id'] ?>">Edit</a>
                    <a href="delete_user.php?id=<?= $user['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>
