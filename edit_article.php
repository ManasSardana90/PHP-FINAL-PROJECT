<?php
include './CRUD/db.php';

// Ensure the user is logged in
if (!isset($_SESSION['logged_in'])) {
    header('Location: index.php');
    exit;
}

// Fetch article details
$stmt = $pdo->prepare("SELECT * FROM content WHERE id = ?");
$stmt->execute([$_GET['id']]);
$article = $stmt->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $stmt = $pdo->prepare("UPDATE content SET title = ?, body = ? WHERE id = ?");
    $stmt->execute([$title, $content, $_GET['id']]);
    header('Location: articles.php');
}

include 'header.php';
?>

<div class="container mt-4">
    <h1>Edit Article</h1>
    <form action="edit_article.php?id=<?= $article['id'] ?>" method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= $article['title'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5" required><?= $article['body'] ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<?php include 'footer.php'; ?>
