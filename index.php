<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include './CRUD/db.php';

// Fetch latest articles
$stmt = $pdo->prepare("SELECT * FROM content ORDER BY id DESC LIMIT 5");
$stmt->execute();
$articles = $stmt->fetchAll();

include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | My Website</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>

<div class="container mt-4">
    <h1>Welcome to My Website</h1>

    <?php if (isset($_SESSION['logged_in'])): ?>
        <p>Hello, <?= $_SESSION['user_name'] ?>! What would you like to do today?</p>
        <a href="./CRUD/create_article.php" class="btn btn-primary">Create New Article</a>
        <a href="users.php" class="btn btn-secondary">View Registered Users</a>
    <?php else: ?>
        <p>Please <a href="./HOME/register.php">register</a> or log in to access more features.</p>
    <?php endif; ?>

    <h2>Latest Articles</h2>
    <?php foreach ($articles as $article): ?>
        <div class="article">
            <h3><?= $article['title'] ?></h3>
            <p><?= substr($article['body'], 0, 200) ?>...</p>
            <a href="view_article.php?id=<?= $article['id'] ?>">Read More</a>
        </div>
    <?php endforeach; ?>
</div>

<?php include 'footer.php'; ?>

</body>
</html>