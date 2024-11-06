<?php
include('db.php');


$blog_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($blog_id) {
    $sql = "SELECT * FROM blogs WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $blog_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $blog = $result->fetch_assoc();
    } else {
        echo "Blog not found.";
        exit();
    }

    $stmt->close();
} else {
    echo "Invalid blog ID.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $blog['title']; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include('navbar.php'); ?> 
    <h1><?php echo $blog['title']; ?></h1>
    <p><strong>By <?php echo $blog['author']; ?></strong></p>
    <div class="blog-detail">
        <p><?php echo nl2br($blog['content']); ?></p>
        <h3>Details:</h3>
        <p><?php echo nl2br($blog['detail']); ?></p>
    </div>

    <p><a href="blog.php">Back to Blog Section</a></p> 
    <?php include('footer.php'); ?>
</body>
</html>

<?php
$conn->close();
?>
