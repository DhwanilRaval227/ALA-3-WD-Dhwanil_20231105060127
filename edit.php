<?php include 'db.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM book WHERE id=$id");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $conn->query("UPDATE book SET title='$title', author='$author' WHERE id=$id");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Book</h2>
    <form method="POST">
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" value="<?= $row['title'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Author</label>
            <input type="text" name="author" value="<?= $row['author'] ?>" class="form-control" required>
        </div>
        <button class="btn btn-primary">Update Book</button>
        <a href="index.php" class="btn btn-secondary">Back</a>
    </form>
</div>
</body>
</html>