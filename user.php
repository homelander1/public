<?php
session_start();
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header("Location: index.php");
    exit();
}

$first_name = $_SESSION['first_name'] ?? '';
$last_name = $_SESSION['last_name'] ?? '';
$user_id = $_SESSION['user_id'] ?? ''; // Assuming user_id is stored in the session

// Fetch user articles from the database where user_id matches
include 'db.php';
$stmt = $pdo->prepare("SELECT article_id, title, publication_date, image_url FROM articles WHERE user_id = :user_id ORDER BY publication_date DESC");
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>User Dashboard</title>
</head>

<body>
    <?php include './header.php'; ?>

    <div class="container my-4">
        <h1>Welcome, <?php echo htmlspecialchars($first_name . ' ' . $last_name); ?>!</h1>
        <p class="text-muted"><?= date('d M Y') ?></p>

        <!-- Published Articles Section -->
        <h3>Your Published Articles</h3>
        <ul class="list-group mb-4">
            <?php if (count($articles) > 0): ?>
                <?php foreach ($articles as $article): ?>
                    <li class="list-group-item">
                        <strong><?= htmlspecialchars($article['title']) ?></strong> (<?= date('d M Y', strtotime($article['publication_date'])) ?>)
                        <div>
                            <?php if ($article['image_url']): ?>
                                <img src="<?= htmlspecialchars($article['image_url']) ?>" alt="Article Image" style="max-width: 100px;">
                            <?php endif; ?>
                        </div>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li class="list-group-item">You have not published any articles yet.</li>
            <?php endif; ?>
        </ul>

        <!-- New Article Button -->
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newArticleModal">New Article</button>

        <!-- Modal for New Article -->
        <div class="modal fade" id="newArticleModal" tabindex="-1" aria-labelledby="newArticleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newArticleModalLabel">Create New Article</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" enctype="multipart/form-data" action="save_article.php">
                            <div class="mb-3">
                                <label for="title" class="form-label">Article Title</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Upload Image (JPEG/JPG)</label>
                                <input type="file" class="form-control" id="image" name="image" accept=".jpeg,.jpg" required>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">Save</button>
                                <button type="submit" name="publish" class="btn btn-primary">Save and Publish</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <a href="logout.php">Log out</a>
</body>

</html>